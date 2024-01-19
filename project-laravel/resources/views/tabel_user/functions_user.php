<?php

$conn = mysqli_connect('localhost', 'root', '', 'potion_pharma');

function queryUser($queryuser){

     global $conn;
     $resultuser = mysqli_query($conn, $queryuser);
     $rowuser = [];
     while ($rowuser = mysqli_fetch_assoc($resultuser)){
          $rowsuser [] = $rowuser; 
     }
     return $rowsuser;
}

function tambahUser($data){

     global $conn;
     $fullname = $data["fullname"];
     $username = $data["username"];
     $nomortelepon = $data["nomortelepon"];
     $password = $data["password"];
     $role = $data["role"];

     $queryuser = "INSERT INTO tb_user VALUES('','$fullname', '$username', '$nomortelepon', '$password', '$role')";
     
     mysqli_query($conn, $queryuser);
     return mysqli_affected_rows($conn);
}

function hapusUser($username){
     global $conn;
     $queryuser = "DELETE FROM tb_user WHERE username = $username";
     mysqli_query($conn, $queryuser);

     return mysqli_affected_rows($conn);
}

function ubahUser($data){

     global $conn;
     $username = $data["username"];
     $fullname = $_POST["fullname"];
     $nomortelepon = $_POST["nomortelepon"];
     $role = $_POST["role"];

     $queryuser = "UPDATE tb_user SET
               fullname = '$fullname',
               nomortelepon = '$nomortelepon',
               role = '$role'
               WHERE username ='$username'
     ";

     mysqli_query($conn, $queryuser);
     return mysqli_affected_rows($conn);
}

function registrasiUser($data){

     global $conn;
     $fullname = $data["fullname"];
     $username = strtolower($data["username"]);
     $nomortelepon = $data["nomortelepon"];
     $password = mysqli_escape_string($conn, $data["password"]);
     $password2= mysqli_escape_string($conn, $data["password2"]);
     
     $result = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username'");

     if(mysqli_fetch_assoc($result)){
          echo "
          <script>
               alert('Username sudah terdaftar');
          </script>
          ";

          return false;
     }

     if($password != $password2){
          echo "
          <script>
               alert('Konfirmasi password tidak sama');
          </script>
          ";
          
          return false;
     }else{
          $password = password_hash($password, PASSWORD_DEFAULT);
          $result = mysqli_query($conn, "INSERT INTO tb_user VALUES ('', '$fullname', '$username', '$nomortelepon', '$password', 'pembeli')");
          return mysqli_affected_rows($conn);
     }
}

function cariUser($keyworduser){
     $queryuser = "SELECT * FROM tb_user WHERE username LIKE '%$keyworduser%'";
     
     return queryuser($queryuser);
}
