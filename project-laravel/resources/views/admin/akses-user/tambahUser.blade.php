<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data User</title>
</head>

<body>
    <h1>Form Tambah Data User</h1>
    <br>
    <form action="{{url('/admin/add-userPost')}}" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="fullname" id="fullname"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td><input type="text" name="nomortelepon" minlength="10" maxlength="13" id="nomortelepon"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td>Role</td>
                <td><input type="text" name="role" id="role"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Simpan</button></td>
            </tr>
        </table>
    </form>
</body>

</html>
