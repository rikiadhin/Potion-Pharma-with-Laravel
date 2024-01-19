<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Obat</title>
</head>

<body>
    <h1>Form Ubah Data Obat</h1>
    <form action="{{url('/obat/ubah-obat-post')}}" method="post">
        {{ csrf_field() }}
        <table>
            @foreach ($selectedObatbyId as $DetailObat)
            <!-- <p>{{$selectedObatbyId}}</p> -->
            <tr>
                <td>
                    <h5>{{$DetailObat->id_toko}} : {{$DetailObat->namatoko}}</h5>
                    <input type="text" name="nomor" value="{{$DetailObat->numbering}}">
                    <input type="hidden" name="id_toko" value="{{$DetailObat->id_toko}}">
                </td>
            </tr>
            <tr>
                <td>File Gambar</td>
                <td>
                    <input type="file" name="gambar"  >
                    <input type="hidden" name="gambarAwal" value="{{$DetailObat->gambar}}">
                    {{$DetailObat->gambar}}
                </td>
            </tr>
            <tr>
                <td>Kode Obat</td>
                <td><input type="text" name="id_obat" id="id_obat" value="{{$DetailObat->id_obat}}"></td>
            </tr>
            <tr>
                <td>Nama Obat</td>
                <td><input type="text" name="nama_obat" id="nama_obat" value="{{$DetailObat->nama_obat}} "></td>
            </tr>
            <tr>
                <td>Nama Standar MIMS</td>
                <td><input type="text" name="nama_standar_MIMS" id="nama_standar_MIMS" value="{{$DetailObat->nama_standar_MIMS}}"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi" id="deskripsi" value="{{$DetailObat->deskripsi}}"></td>
            </tr>
            <tr>
                <td>Manfaat</td>
                <td><input type="text" name="manfaat" id="manfaat" value="{{$DetailObat->manfaat}}"></td>
            </tr>
            <tr>
                <td>Jumlah Kemasan</td>
                <td><input type="text" name="jumlah_kemasan" id="jumlah_kemasan" value="{{$DetailObat->jumlah_kemasan}}"></td>
            </tr>
            <tr>
                <td>Kemasan</td>
                <td>
                    <select name="kemasan">
                        @foreach ($DataKemasan as $detailkemasan)
                        <option value='{{ $DetailObat->id_kemasan}}'>{{$detailkemasan->kemasan}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Dosis</td>
                <td>
                    <select name="dosis">
                        @foreach ($DataDosis as $detaildosis)
                        <option value='{{ $DetailObat->id_dosis}}'>{{$detaildosis->dosis}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Penyajian</td>
                <td>
                    <select name="penyajian">
                        @foreach ($DataPenyajian as $detailpenyajian)
                        <option value='{{ $DetailObat->id_penyajian}}'>{{$detailpenyajian->penyajian}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Golongan</td>
                <td><select name="golongan">
                        @foreach ($DataGolongan as $detailgolongan)
                        <option value='{{ $DetailObat->id_golongan}}'>{{$detailgolongan->golongan}}</option>
                        @endforeach
                    </select></td>
            </tr>
            <tr>
                <td>Bentuk</td>
                <td><select name="bentuk">
                        @foreach ($DataBentuk as $detailbentuk)
                        <option value='{{ $DetailObat->id_bentuk}}'>{{$detailbentuk->bentuk}}</option>
                        @endforeach
                    </select></td>
            </tr>
            <tr>
                <td>Nomor Izin Edar</td>
                <td><input type="text" name="nomor_izin_edar" id="nomor_izin_edar" value="{{$DetailObat->nomor_izin_edar}}"></td>
            </tr>
            <tr>
                <td>Komposisi</td>
                <td><input type="text" name="komposisi" id="komposisi" value="{{$DetailObat->komposisi}}"></td>
            </tr>
            <tr>
                <td>Jumlah Stok</td>
                <td><input type="text" name="jumlah_stok" id="jumlah_stok" value="{{$DetailObat->jumlah_stok}}"></td>
            </tr>
            <tr>
                <td>Expired</td>
                <td><input type="date" name="expired" id="expired" value="{{$DetailObat->expired}}"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" id="harga" value="{{$DetailObat->harga}}"></td>
            </tr>
            <tr>
                <td>Referensi</td>
                <td><input type="text" name="referensi" id="referensi" value="{{$DetailObat->referensi}}"></td>
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
