<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AddObat()
    {
        $username = Session::get('username');
        $dataToko = DB::table('tb_toko')
            ->where('usernameUser', $username)
            ->first();
        $dataToko1 = DB::table('tb_toko')
            ->where('usernameUser', $username)
            ->get();
        $dataKemasan = DB::table('tb_kemasan')->get();
        $dataDosis = DB::table('tb_dosis')->get();
        $dataPenyajian = DB::table('tb_penyajian')->get();
        $dataGolongan = DB::table('tb_golongan')->get();
        $dataBentukObat = DB::table('tb_bentukobat')->get();

        // $dataobat = DB::table('tb_obat')
        // ->join()
        return view('/obat/tambahObat')
            ->with('DataToko', $dataToko)
            ->with('DataToko1', $dataToko1)
            ->with('DataKemasan', $dataKemasan)
            ->with('DataDosis', $dataDosis)
            ->with('DataPenyajian', $dataPenyajian)
            ->with('DataGolongan', $dataGolongan)
            ->with('DataBentuk', $dataBentukObat);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'id_toko' => 'required',
            'gambar' => 'required',
            'id_obat' => 'required',
            'nama_obat' => 'required',
            'nama_standar_MIMS' => 'required',
            'deskripsi' => 'required',
            'manfaat' => 'required',
            'jumlah_kemasan' => 'required',
            'kemasan' => 'required',
            'dosis' => 'required',
            'penyajian' => 'required',
            'golongan' => 'required',
            'bentuk' => 'required',
            'nomor_izin_edar' => 'required',
            'komposisi' => 'required',
            'jumlah_stok' => 'required',
            'expired' => 'required',
            'harga' => 'required',
            'referensi' => 'required',
        ]);

        $dataobat = [
            'gambar' => $request->gambar,
            'id_toko' => $request->id_toko,
            'id_obat' => $request->id_obat,
            'nama_obat' => $request->nama_obat,
            'nama_standar_MIMS' => $request->nama_standar_MIMS,
            'deskripsi' => $request->deskripsi,
            'manfaat' => $request->manfaat,
            'jumlah_kemasan' => $request->jumlah_kemasan,
            'id_kemasan' => $request->kemasan,
            'id_dosis' => $request->dosis,
            'id_penyajian' => $request->penyajian,
            'id_golongan' => $request->golongan,
            'id_bentuk' => $request->bentuk,
            'nomor_izin_edar' => $request->nomor_izin_edar,
            'komposisi' => $request->komposisi,
            'jumlah_stok' => $request->jumlah_stok,
            'expired' => $request->expired,
            'harga' => $request->harga,
            'referensi' => $request->referensi
        ];

        DB::table('tb_obat')->insert($dataobat);
        return redirect('dashpenjual');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'nullable',
            'gambarAwal' => 'required',
            'nomor' => 'required',
            'id_toko' => 'required',
            'id_obat' => 'required',
            'nama_obat' => 'required',
            'nama_standar_MIMS' => 'required',
            'deskripsi' => 'required',
            'manfaat' => 'required',
            'jumlah_kemasan' => 'required',
            'kemasan' => 'required',
            'dosis' => 'required',
            'penyajian' => 'required',
            'golongan' => 'required',
            'bentuk' => 'required',
            'nomor_izin_edar' => 'required',
            'komposisi' => 'required',
            'jumlah_stok' => 'required',
            'expired' => 'required',
            'harga' => 'required',
            'referensi' => 'required',
        ]);

        $Nomor = $request->nomor;

        $dataobat = [
            'id_toko' =>  $request->id_toko,
            'id_obat' => $request->id_obat,
            'nama_obat' => $request->nama_obat,
            'nama_standar_MIMS' => $request->nama_standar_MIMS,
            'deskripsi' => $request->deskripsi,
            'manfaat' => $request->manfaat,
            'jumlah_kemasan' => $request->jumlah_kemasan,
            'id_kemasan' => $request->kemasan,
            'id_dosis' => $request->dosis,
            'id_penyajian' => $request->penyajian,
            'id_golongan' => $request->golongan,
            'id_bentuk' => $request->bentuk,
            'nomor_izin_edar' => $request->nomor_izin_edar,
            'komposisi' => $request->komposisi,
            'jumlah_stok' => $request->jumlah_stok,
            'expired' => $request->expired,
            'harga' => $request->harga,
            'referensi' => $request->referensi
        ];

        if (!empty($request->gambar)) {
            $dataobat['gambar'] = $request->gambar;
        } else {
            // Jika gambar tidak diupload, hilangkan kolom gambar dari data obat
            $dataobat['gambar'] = $request->gambarAwal;
        }

        // Lakukan update data obat
        DB::table('tb_obat')->where('numbering', $Nomor)->update($dataobat);

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect('dashpenjual');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateObat($id)
    {
        $selectedbyId = DB::table('tb_obat')
            ->join('tb_kemasan', 'tb_kemasan.id_kemasan', '=', 'tb_obat.id_kemasan')
            ->join('tb_dosis', 'tb_dosis.id_dosis', '=', 'tb_obat.id_dosis')
            ->join('tb_penyajian', 'tb_penyajian.id_penyajian', '=', 'tb_obat.id_penyajian')
            ->join('tb_golongan', 'tb_golongan.id_golongan', '=', 'tb_obat.id_golongan')
            ->join('tb_bentukobat', 'tb_bentukobat.id_bentuk', '=', 'tb_obat.id_bentuk')
            ->join('tb_toko', 'tb_toko.id_toko', '=', 'tb_obat.id_toko')
            ->where('tb_obat.id_obat', $id)
            ->get();

        $dataKemasan = DB::table('tb_kemasan')->get();
        $dataDosis = DB::table('tb_dosis')->get();
        $dataPenyajian = DB::table('tb_penyajian')->get();
        $dataGolongan = DB::table('tb_golongan')->get();
        $dataBentukObat = DB::table('tb_bentukobat')->get();

        return view('/obat/ubahObat')
            ->with('DataKemasan', $dataKemasan)
            ->with('DataDosis', $dataDosis)
            ->with('DataPenyajian', $dataPenyajian)
            ->with('DataGolongan', $dataGolongan)
            ->with('DataBentuk', $dataBentukObat)
            ->with('selectedObatbyId', $selectedbyId);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('tb_obat')->where('numbering', $id)->delete();

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect('dashpenjual');
    }
}
