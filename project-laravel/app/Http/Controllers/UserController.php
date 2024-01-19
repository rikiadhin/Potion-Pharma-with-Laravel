<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    // LOGIN
    public function login()
    {
        return view('/Auth/login');
    }
    public function loginPost(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        // Menggunakan Query Builder untuk langsung mengakses tabel tb_user
        $data = DB::table('tb_user')->where('username', $username)->first();

        if ($data) { //apakah email tersebut ada atau tidak
            if (Hash::check($password, $data->password)) {
                if($data->role == 'pembeli'){
                    Session::put('username', $data->username);
                    Session::put('login', TRUE);
                    return redirect('dashpembeli');
                }else if($data->role == 'penjual'){
                    Session::put('username', $data->username);
                    Session::put('login', TRUE);
                    return redirect('dashpenjual');
                }else if($data->role == 'admin'){
                    Session::put('username', $data->username);
                    Session::put('login', TRUE);
                    return redirect('admin');
                }
            } else {
                return redirect('login')->with('alert-failed', 'Email atau Password anda salah!');
            }
        } else {
            return redirect('login')->with('alert-failed', 'Email atau Password anda salah!');
        }
    }

    // REGISTER
    public function registrasiPembeli()
    {
        return view('/Auth/registrasi');
    }

    public function registrasiPostPembeli(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'username' => 'required|min:4|unique:tb_user',
            'nomortelepon' => 'required|min:10|max:13',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);
        // $name = ;
        // Menggunakan Query Builder untuk langsung mengakses tabel tb_user
        $dataUser = [
            'fullname' => $request->fullname,
            'username' => $request->username,
            'nomortelepon' => $request->nomortelepon,
            'password' => bcrypt($request->password),
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
        return redirect('login')->with('alert-success', 'You have successfully registered');
    }

    public function registrasiPenjual()
    {
        return view('/Auth/registrasiPenjual');
    }


    public function registrasiPostPenjual(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'username' => 'required|min:4|unique:tb_user',
            'nomortelepon' => 'required|min:10|max:13',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);
        // Menggunakan Query Builder untuk langsung mengakses tabel tb_user
        $dataUser = [
            'fullname' => $request->fullname,
            'username' => $request->username,
            'nomortelepon' => $request->nomortelepon,
            'password' => bcrypt($request->password),
            'role' => 'penjual'
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
        return redirect('login')->with('alert-success', 'You have successfully registered');
    }

    // LOGOUT
    public function logout()
    {
        Session::flush();
        return redirect('/')->with('alert', 'You are logged out');
    }
}
