<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HaloController extends Controller
{

    // public function getAllData(){
    //     // insert data ke table user
    //     $users = FacadesDB::table('tb_user')->get();
    //     // alihkan halaman ke halaman user
    //     return response()->json($users);
    // }

    public function index()
    {
        // mengambil data dari table students
        $students = DB::table('tb_user')->get();
        // mengirim data students ke view daftar
        return view('halo', ['user' => $students]);
    }

}


