<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function dashpembeli()
    {
        return view('dashboard/dashpembeli');
    }

    public function dashpenjual()
    {
        $username = Session::get('username');

        $dataToko = DB::table('tb_toko')->where('usernameUser', $username)->get();

        $dataPesanan = DB::table('tb_obat')
            ->join('tb_pesanan', 'tb_pesanan.id_obat', '=', 'tb_obat.id_obat')
            ->join('tb_toko', 'tb_toko.id_toko', '=', 'tb_obat.id_toko')
            ->where('tb_toko.usernameUser', $username)->get();

        $dataObat = DB::table('tb_obat')
            ->join('tb_kemasan', 'tb_kemasan.id_kemasan', '=', 'tb_obat.id_kemasan')
            ->join('tb_dosis', 'tb_dosis.id_dosis', '=', 'tb_obat.id_dosis')
            ->join('tb_penyajian', 'tb_penyajian.id_penyajian', '=', 'tb_obat.id_penyajian')
            ->join('tb_golongan', 'tb_golongan.id_golongan', '=', 'tb_obat.id_golongan')
            ->join('tb_bentukobat', 'tb_bentukobat.id_bentuk', '=', 'tb_obat.id_bentuk')
            ->join('tb_toko', 'tb_toko.id_toko', '=', 'tb_obat.id_toko')
            ->where('tb_toko.usernameUser', $username)->get();

        return view('dashboard/dashpenjual')->with('dataObat', $dataObat)->with('dataToko', $dataToko)->with('dataPesanan', $dataPesanan);
    }

}
