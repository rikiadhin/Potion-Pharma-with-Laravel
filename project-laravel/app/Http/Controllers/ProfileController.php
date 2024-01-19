<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    // ProfileController.php

    public function getbyUsernamePembeli($username)
    {
        // Logika untuk mengambil data pengguna berdasarkan username
        $user = DB::table('tb_user')
            ->join('tb_pembeli', 'tb_pembeli.usernameUser', '=', 'tb_user.username')
            ->where('tb_user.username', $username)
            ->first();

        // Cek apakah pengguna ditemukan
        if (!$user) {
            return abort(404); // Tampilkan halaman 404 jika pengguna tidak ditemukan
        }

        // Tampilkan halaman profil dengan data pengguna
        Session::put('login', TRUE);
        return view('/profile/profile')->with('userdata', $user);
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'nullable',
            'username' => 'nullable',
            'nomortelepon' => 'nullable',
            'foto_profil' => 'nullable',
            'email' => 'nullable',
            'kota' => 'nullable',
            'provinsi' => 'nullable',
        ]);

        $userId = $request->id;

        // Persiapkan data yang akan diupdate pada tb_user
        $UpdateUser = [];
        if (!empty($request->fullname)) {
            $UpdateUser['fullname'] = $request->fullname;
        }
        if (!empty($request->username)) {
            $UpdateUser['username'] = $request->username;
        }
        if (!empty($request->nomortelepon)) {
            $UpdateUser['nomortelepon'] = $request->nomortelepon;
        }

        // Persiapkan data yang akan diupdate pada tb_pembeli
        $UpdateProfile = [];
        if (!empty($request->foto_profil)) {
            $UpdateProfile['foto_profil'] = $request->foto_profil;
        }
        if (!empty($request->email)) {
            $UpdateProfile['email'] = $request->email;
        }
        if (!empty($request->kota)) {
            $UpdateProfile['kota'] = $request->kota;
        }
        if (!empty($request->provinsi)) {
            $UpdateProfile['provinsi'] = $request->provinsi;
        }

        // Update data di tb_user
        DB::table('tb_user')->where('id', $userId)->update($UpdateUser);

        // Jika username diperbarui, lakukan update pada tb_pembeli
        if (isset($UpdateUser['username'])) {
            DB::table('tb_pembeli')->where('userid', $userId)->update(['usernameUser' => $UpdateUser['username']]);
        }
            DB::table('tb_pembeli')->where('userid', $userId)->update($UpdateProfile);

        // Redirect atau kembali ke halaman tertentu
        return redirect()->route('profile', ['username' => $request->username]);
    }

    public function profiles()
    {
        return view('/profile/profiles');
    }

    public function getbyUsernamePenjual(){
        Session::put('login', TRUE);
        $username = Session::get('username');
        $user = DB::table('tb_user')
        ->join('tb_penjual', 'tb_penjual.username', '=', 'tb_user.username')
        ->join('tb_toko', 'tb_toko.usernameUser', '=', 'tb_user.username')
        ->where('tb_user.username', $username)
        ->first();

        return view('/profile/profiles')->with('dataPenjual', $user);
    }

    public function profilesUpdate(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'nullable',
            'username' => 'nullable',
            'nomortelepon' => 'nullable',
            'foto_profil' => 'nullable',
            'email' => 'nullable',
            'kota' => 'nullable',
            'provinsi' => 'nullable',
            'namatoko' => 'nullable',
            'pemilik' => 'nullable',
            'alamat' => 'nullable',
        ]);

        $userId = $request->id;
        $username = $request->username;
        // Persiapkan data yang akan diupdate pada tb_user
        $UpdateUser = [];
        if (!empty($request->fullname)) {
            $UpdateUser['fullname'] = $request->fullname;
        }
        if (!empty($request->username)) {
            $UpdateUser['username'] = $request->username;
        }
        if (!empty($request->nomortelepon)) {
            $UpdateUser['nomortelepon'] = $request->nomortelepon;
        }

        // Persiapkan data yang akan diupdate pada tb_pembeli
        $UpdateProfile = [];
        if (!empty($request->foto_profil)) {
            $UpdateProfile['foto_profil'] = $request->foto_profil;
        }
        if (!empty($request->email)) {
            $UpdateProfile['email'] = $request->email;
        }
        if (!empty($request->kota)) {
            $UpdateProfile['kota'] = $request->kota;
        }
        if (!empty($request->provinsi)) {
            $UpdateProfile['provinsi'] = $request->provinsi;
        }

        $UpdateToko = [];
        if (!empty($request->namatoko)) {
            $UpdateToko['namatoko'] = $request->namatoko;
        }
        if (!empty($request->pemilik)) {
            $UpdateToko['pemilik'] = $request->pemilik;
        }
        if (!empty($request->alamat)) {
            $UpdateToko['alamat'] = $request->alamat;
        }
        // Update data di tb_user
        DB::table('tb_user')->where('id', $userId)->update($UpdateUser);
        if (!empty($UpdateToko)) {
            DB::table('tb_toko')->where('usernameUser', $username)->update($UpdateToko);
        }

        // Jika username diperbarui, lakukan update pada tb_penjual
        if (isset($UpdateUser['username'])) {
            DB::table('tb_penjual')->where('userid', $userId)->update(['username' => $UpdateUser['username']]);
        }
        if(!empty($UpdateProfile)){

            DB::table('tb_penjual')->where('userid', $userId)->update($UpdateProfile);
        }


        // Redirect atau kembali ke halaman tertentu
        return redirect('profiles');
    }

}
