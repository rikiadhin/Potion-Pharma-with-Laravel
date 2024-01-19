<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function showAllObat()
    {
        $dataobat = DB::table('tb_obat')
            ->select('gambar', 'id_obat', 'nama_obat', 'harga')
            ->get();

        return view('/Order_Proses/shop')->with('dataobat', $dataobat);
    }

    public function SelectedObatById(Request $request)
    {
        $idObat = $request->id_obat;
        $selectedbyId = DB::table('tb_obat')
            ->join('tb_kemasan', 'tb_kemasan.id_kemasan', '=', 'tb_obat.id_kemasan')
            ->join('tb_dosis', 'tb_dosis.id_dosis', '=', 'tb_obat.id_dosis')
            ->join('tb_penyajian', 'tb_penyajian.id_penyajian', '=', 'tb_obat.id_penyajian')
            ->join('tb_golongan', 'tb_golongan.id_golongan', '=', 'tb_obat.id_golongan')
            ->join('tb_bentukobat', 'tb_bentukobat.id_bentuk', '=', 'tb_obat.id_bentuk')
            ->join('tb_toko', 'tb_toko.id_toko', '=', 'tb_obat.id_toko')
            ->where('tb_obat.id_obat', $idObat)
            ->get();
        return view('/Order_Proses/shop-single')->with('selectedbyId', $selectedbyId);
    }

    public function cart()
    {
        // Mengambil nilai username dari session
        $username = Session::get('username');

        $selectedCartbyId = DB::table('tb_keranjang')->where('username', $username)->get();
        return view('/Order_Proses/cart')->with('selectedCartbyId', $selectedCartbyId);
    }

    public function AddtoCart(Request $request)
    {
        $idObat = $request->id_obat;
        $selectedObatbyId = DB::table('tb_obat')->where('id_obat', $idObat)->first();
        $dataAddCart = [
            'username' => $request->username,
            'id_obat' => $idObat,
            'gambar' => $selectedObatbyId->gambar,
            'nama_obat' => $selectedObatbyId->nama_obat,
            'jumlah' => $request->jumlah,
            'harga' => $selectedObatbyId->harga * $request->jumlah,
        ];

        $idCart = DB::table('tb_keranjang')->insertGetId($dataAddCart);

        $dataOrder =
            [
                'id_pesanan' => $idCart,
                'username' => $request->username,
                'id_obat' => $idObat,
                'jumlah' => $request->jumlah,
                'harga' => $request->jumlah * $selectedObatbyId->harga,
                'waktu' => now(),
                'status' => 'Add to Cart'
            ];

        DB::table('tb_pesanan')->insert($dataOrder);

        return redirect('cart');
    }

    public function makeOrder(Request $request)
    {
        $idObat = $request->id_obat;
        $idkeranjang = $request->id_keranjang;
        $username = Session::get('username');
        $selectedObatbyId = DB::table('tb_obat')->where('id_obat', $idObat)->first();
        // Pastikan idObat dan username memiliki nilai sebelum melakukan update
        if ($idObat && $username) {
            $dataOrder = [
                'status' => 'In Order',
                'jumlah' => $request->jumlah,
                'harga' => $request->jumlah * $selectedObatbyId->harga
            ];
            DB::table('tb_pesanan')
                ->where('id_pesanan', $idkeranjang)
                ->where('username', $username)
                ->update($dataOrder);

            $dataCart = [
                'jumlah' => $request->jumlah,
                'harga' => $request->jumlah * $selectedObatbyId->harga
            ];

            DB::table('tb_keranjang')
                ->where('id_keranjang', $idkeranjang)
                ->where('username', $username)
                ->update($dataCart);
        }

        return redirect('cart');
    }

    public function cancelOrder($idkeranjang)
    {
            // Hapus data berdasarkan id_keranjang pada tb_keranjang
            DB::table('tb_keranjang')->where('id_keranjang', $idkeranjang)->delete();

            // Hapus data berdasarkan id_pesanan pada tb_pesanan
            DB::table('tb_pesanan')->where('id_pesanan', $idkeranjang)->delete();

            // Redirect atau berikan respons sesuai kebutuhan
            return redirect('cart');

    }



}
