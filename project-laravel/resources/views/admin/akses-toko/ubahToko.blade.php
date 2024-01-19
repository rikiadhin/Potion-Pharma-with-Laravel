<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Toko</title>
</head>

<body>
    <h1>Form Update Data Toko</h1>
    <br>
    <form action="{{url('/admin/update-tokoPost')}}" method="post">
        {{ csrf_field() }}
        <table>
            @foreach($dataToko as $DetailToko)
            <tr>
                <td>Nama Toko</td>
                <td><input type="text" name="namatoko" id="namatoko" value="{{$DetailToko->namatoko}}"></td>
                <td><input type="hidden" name="id_toko" id="id" value="{{$DetailToko->id_toko}}"></td>
            </tr>
            <tr>
                <td>Nama Pemilik</td>
                <td><input type="text" name="pemilik" id="pemilik" value="{{$DetailToko->pemilik}}"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" minlength="10" maxlength="13" id="alamat" value="{{$DetailToko->alamat}}"></td>
            </tr>
            <tr>
                <td>Admin Toko</td>
                <td>
                    <input type="text" name="usernameUser" id="usernameUser" value="{{$DetailToko->usernameUser}}" disabled>
                    <input type="hidden" name="username" id="username" value="{{$DetailToko->usernameUser}}">
                </td>
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
