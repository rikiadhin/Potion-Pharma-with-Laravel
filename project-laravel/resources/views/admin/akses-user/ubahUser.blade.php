<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data User</title>
</head>

<body>
    <h1>Form Update Data User</h1>
    <br>
    <form action="{{url('/admin/update-userPost')}}" method="post">
        {{ csrf_field() }} 
        <table>
            @foreach($dataUser as $DetailUser)
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="fullname" id="fullname" value="{{$DetailUser->fullname}}"></td>
                <td><input type="hidden" name="id" id="id" value="{{$DetailUser->id}}"></td>
                <td><input type="hidden" name="password" id="password" value="{{$DetailUser->password}}"></td>
                <td><input type="hidden" name="username2" id="username2" value="{{$DetailUser->username}}"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" id="username" value="{{$DetailUser->username}}"></td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td><input type="text" name="nomortelepon" minlength="10" maxlength="13" id="nomortelepon" value="{{$DetailUser->nomortelepon}}"></td>
            </tr>
            <tr>
                <td>Role</td>
                <td><input type="text" name="role" id="role" value="{{$DetailUser->role}}"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Simpan</button></td>
            </tr>
            @endforeach
        </table>
    </form>
</body>

</html>
