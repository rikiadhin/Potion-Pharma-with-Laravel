<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class FullAksesAdminController extends Controller
{

    // DATA USER ==================================================
    public function AddUser()
    {
        return view('admin/akses-user/tambahUser');
    }

    public function AddUserPost(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'username' => 'required|min:4|unique:tb_user',
            'nomortelepon' => 'required|min:10|max:13',
            'password' => 'required',
            'role' => 'required',
        ]);

        // Menggunakan Query Builder untuk langsung mengakses tabel tb_user
        $role = strtolower($request->role);
        if ($role == 'pembeli') {
            $dataUser = [
                'fullname' => $request->fullname,
                'username' => $request->username,
                'nomortelepon' => $request->nomortelepon,
                'password' => bcrypt($request->password),
                'role' => 'pembeli',
            ];
            $idUser = DB::table('tb_user')->insertGetId($dataUser);
            $dataPembeli = [
                'userid' => $idUser,
                'foto_profil' => '',
                'usernameUser' => $request->username,
                'email' => '',
                'kota' => '',
                'provinsi' => ''
            ];

            DB::table('tb_pembeli')->insert($dataPembeli);
            return redirect('/admin/data-user');
        } else if ($role == 'penjual') {
            $dataUser = [
                'fullname' => $request->fullname,
                'username' => $request->username,
                'nomortelepon' => $request->nomortelepon,
                'password' => bcrypt($request->password),
                'role' => 'penjual',
            ];
            $idUser = DB::table('tb_user')->insertGetId($dataUser);
            $dataPenjual = [
                'userid' => $idUser,
                'foto_profil' => '',
                'username' => $request->username,
                'email' => '',
                'kota' => '',
                'provinsi' => ''
            ];
            $dataToko = [
                'namatoko' => '',
                'alamat' => '',
                'pemilik' => '',
                'usernameUser' => $request->username
            ];

            DB::table('tb_penjual')->insert($dataPenjual);
            DB::table('tb_toko')->insert($dataToko);
        } else {
            $dataUser = [
                'fullname' => $request->fullname,
                'username' => $request->username,
                'nomortelepon' => $request->nomortelepon,
                'password' => bcrypt($request->password),
                'role' => 'admin',
            ];
            $idUser = DB::table('tb_user')->insertGetId($dataUser);
        }

        return redirect('/admin/data-user');
    }

    public function UpdateUser($id)
    {
        $dataUserbyId = DB::table('tb_user')->where('id', $id)->get();
        return view('admin/akses-user/ubahUser')->with('dataUser', $dataUserbyId);
    }

    public function UpdateUserPost(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'username' => 'required|min:4|unique:tb_user',
            'nomortelepon' => 'required|min:10|max:13',
            'role' => 'required',
        ]);
        $idUser = $request->id;
        $role = strtolower($request->role);
        if ($role == 'pembeli') {
            $dataUser = [
                'fullname' => $request->fullname,
                'username' => $request->username,
                'nomortelepon' => $request->nomortelepon,
                'password' => $request->password,
                'role' => $request->role,
            ];
            DB::table('tb_user')->where('id', $idUser)->update($dataUser);
            $dataPembeli = [
                'foto_profil' => '',
                'usernameUser' => $request->username,
                'email' => '',
                'kota' => '',
                'provinsi' => ''
            ];

            DB::table('tb_pembeli')->where('userid', $idUser)->update($dataPembeli);
            return redirect('/admin/data-user');
        } else if ($role == 'penjual') {
            $dataUser = [
                'fullname' => $request->fullname,
                'username' => $request->username,
                'nomortelepon' => $request->nomortelepon,
                'password' => $request->password,
                'role' => $request->role,
            ];
            $idUser = DB::table('tb_user')->where('id', $idUser)->update($dataUser);
            $dataPenjual = [
                'foto_profil' => '',
                'username' => $request->username,
                'email' => '',
                'kota' => '',
                'provinsi' => ''
            ];
            $dataToko = [
                'namatoko' => '',
                'alamat' => '',
                'pemilik' => '',
                'usernameUser' => $request->username
            ];

            DB::table('tb_penjual')->where('userid', $idUser)->update($dataPenjual);
            DB::table('tb_toko')->where('usernameUser', $request->username2)->update($dataToko);
            return redirect('/admin/data-user');
        }
    }


    public function HapusData($id, $role, $username)
    {
        if ($role == 'pembeli') {
            DB::table('tb_user')->where('id', $id)->delete();
            DB::table('tb_pembeli')->where('userid', $id)->delete();
        } else if ($role == 'penjual') {
            DB::table('tb_user')->where('id', $id)->delete();
            DB::table('tb_penjual')->where('userid', $id)->delete();
            DB::table('tb_toko')->where('UsernameUser', $username)->delete();
        }

        return redirect('/admin/data-user');
    }

    // DATA TOKO ==================================================

    public function UpdateToko($id)
    {
        $dataTokobyId = DB::table('tb_toko')->where('id_toko', $id)->get();
        return view('admin/akses-toko/ubahToko')->with('dataToko', $dataTokobyId);
    }

    public function UpdateTokoPost(Request $request)
    {
        $dataToko = [
            'namatoko' => $request->namatoko,
            'pemilik' => $request->pemilik,
            'alamat' => $request->alamat,
            'usernameUser' => $request->username,
        ];
        DB::table('tb_toko')->where('id_toko', $request->id_toko)->update($dataToko);
        return redirect('/admin/data-toko');
    }

    public function HapusDataToko($id)
    {
        // Tentukan kolom-kolom yang ingin dihapus
        $kolomYangAkanDihapus = ['namatoko', 'pemilik', 'alamat'];

        // Update baris dengan menghapus kolom-kolom yang diinginkan
        DB::table('tb_toko')->where('id_toko', $id)->update(array_fill_keys($kolomYangAkanDihapus, null));

        return redirect('/admin/data-toko');
    }
}
