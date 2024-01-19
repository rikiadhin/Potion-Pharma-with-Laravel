<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin()
    {
        $jumlahPembeli = DB::table('tb_user')->where('role', 'pembeli')->get();
        $jumlahPenjual = DB::table('tb_user')->where('role', 'penjual')->get();
        $jumlahAdmin = DB::table('tb_user')->where('role', 'admin')->get();
        $jumlahUser = DB::table('tb_user')->get();
        $jumlahAddtoCart = DB::table('tb_pesanan')->where('status', 'Add to Cart')->get();
        $jumlahInOrder = DB::table('tb_pesanan')->where('status', 'In Order')->get();
        // $dataToko = DB::table('tb_toko')->get();
        // $dataObat = DB::table('tb_obat')->get();
        // $dataPembeli = DB::table('tb_pembeli')->get();
        // $dataPenjual = DB::table('tb_penjual')->get();

        return view('admin/admin')
            ->with('jumlahPembeli', $jumlahPembeli)
            ->with('jumlahPenjual', $jumlahPenjual)
            ->with('jumlahAdmin', $jumlahAdmin)
            ->with('jumlahUser', $jumlahUser)
            ->with('jumlahAddtoCart', $jumlahAddtoCart)
            ->with('jumlahInOrder', $jumlahInOrder);
        // ->with('dataToko', $dataToko)
        // ->with('dataObat', $dataObat)
        // ->with('dataPembeli', $dataPembeli)
        // ->with('dataPenjual', $dataPenjual);
    }

    public function dataUser()
    {
        $dataUser = DB::table('tb_user')->select('id', 'fullname', 'username', 'nomortelepon', 'role')->get();
        return view('admin/adminUser')->with('dataUser', $dataUser);
    }

    public function dataToko()
    {
        $dataToko = DB::table('tb_toko')->get();
        return view('admin/adminToko')->with('dataToko', $dataToko);
    }

    public function dataObat()
    {
        $dataObat = DB::table('tb_obat')
            ->join('tb_kemasan', 'tb_kemasan.id_kemasan', '=', 'tb_obat.id_kemasan')
            ->join('tb_dosis', 'tb_dosis.id_dosis', '=', 'tb_obat.id_dosis')
            ->join('tb_penyajian', 'tb_penyajian.id_penyajian', '=', 'tb_obat.id_penyajian')
            ->join('tb_golongan', 'tb_golongan.id_golongan', '=', 'tb_obat.id_golongan')
            ->join('tb_bentukobat', 'tb_bentukobat.id_bentuk', '=', 'tb_obat.id_bentuk')
            ->join('tb_toko', 'tb_toko.id_toko', '=', 'tb_obat.id_toko')
            ->get();
        return view('admin/adminObat')->with('dataObat', $dataObat);
    }

    public function dataPembeli()
    {
        $dataPembeli = DB::table('tb_pembeli')->get();
        return view('admin/adminPembeli')->with('dataPembeli', $dataPembeli);
    }

    public function dataPenjual()
    {
        $dataPenjual = DB::table('tb_penjual')->get();
        return view('admin/adminPenjual')->with('dataPenjual', $dataPenjual);
    }

}
