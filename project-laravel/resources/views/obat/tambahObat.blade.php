<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Obat</title>
</head>

<body>
    <h1>Form Tambah Data Obat</h1>
    <h5>Nama Toko : {{ $DataToko->namatoko }}</h5>
    <form action="{{url('/obat/add-obat-post')}}" method="post">
        {{ csrf_field() }}
        <table>
            <?php 'foreach ($databentuk as $obat) :' ?>
            <tr>
                <td><input type="hidden" name="id_toko" value="{{ $DataToko->id_toko }}"></td>
            </tr>
            <tr>
                <td>File Gambar</td>
                <td><input type="file" name="gambar" id="gambar"></td>
            </tr>
            <tr>
                <td>Kode Obat</td>
                <td><input type="text" name="id_obat" id="id_obat"></td>
            </tr>
            <tr>
                <td>Nama Obat</td>
                <td><input type="text" name="nama_obat" id="nama_obat"></td>
            </tr>
            <tr>
                <td>Nama Standar MIMS</td>
                <td><input type="text" name="nama_standar_MIMS" id="nama_standar_MIMS"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi" id="deskripsi"></td>
            </tr>
            <tr>
                <td>Manfaat</td>
                <td><input type="text" name="manfaat" id="manfaat"></td>
            </tr>
            <tr>
                <td>Jumlah Kemasan</td>
                <td><input type="number" name="jumlah_kemasan" id="jumlah_kemasan"></td>
            </tr>
            <tr>
                <td>Kemasan</td>
                <!-- <td><input type="text" name="kemasan" id="kemasan"></td> -->
                <td><select name="kemasan">
                        @foreach ($DataKemasan as $detailkemasan)
                        <option value='{{$detailkemasan->id_kemasan}}'>{{$detailkemasan->kemasan}}</option>
                        @endforeach
                    </select></td>
            </tr>
            <tr>
                <td>Dosis</td>
                <!-- <td><input type="text" name="dosis" id="dosis"></td> -->
                <td><select name="dosis">
                        @foreach ($DataDosis as $detaildosis)
                        <option value='{{$detaildosis->id_dosis}}'>{{$detaildosis->dosis}}</option>
                        @endforeach
                    </select></td>
            </tr>
            <tr>
                <td>Penyajian</td>
                <!-- <td><input type="text" name="penyajian" id="penyajian"></td> -->
                <td><select name="penyajian">
                        @foreach ($DataPenyajian as $detailpenyajian)
                        <option value='{{$detailpenyajian->id_penyajian}}'>{{$detailpenyajian->penyajian}}</option>
                        @endforeach
                    </select></td>
            </tr>
            <tr>
                <td>Golongan</td>
                <!-- <td><input type="text" name="golongan" id="golongan"></td> -->
                <td><select name="golongan">
                        @foreach ($DataGolongan as $detailgolongan)
                        <option value='{{$detailgolongan->id_golongan}}'>{{$detailgolongan->golongan}}</option>
                        @endforeach
                    </select></td>
            </tr>
            <tr>
                <td>Bentuk</td>
                <!-- <td><input type="text" name="bentuk" id="bentuk"></td> -->
                <td><select name="bentuk">
                        @foreach ($DataBentuk as $detailbentuk)
                        <option value='{{$detailbentuk->id_bentuk}}'>{{$detailbentuk->bentuk}}</option>
                        @endforeach
                    </select></td>
            </tr>
            <tr>
                <td>Nomor Izin Edar</td>
                <td><input type="text" name="nomor_izin_edar" id="nomor_izin_edar"></td>
            </tr>
            <tr>
                <td>Komposisi</td>
                <td><input type="text" name="komposisi" id="komposisi"></td>
            </tr>
            <tr>
                <td>Jumlah Stok</td>
                <td><input type="number" name="jumlah_stok" id="jumlah_stok"></td>
            </tr>
            <tr>
                <td>Expired</td>
                <td><input type="date" name="expired" id="expired"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" id="harga"></td>
            </tr>
            <tr>
                <td>Referensi</td>
                <td><input type="text" name="referensi" id="referensi"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Simpan</button></td>
            </tr>
            <?php 'endforeach;' ?>
        </table>
    </form>
</body>

</html>
