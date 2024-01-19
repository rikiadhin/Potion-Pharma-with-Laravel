<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FullAksesAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
});

// Authentication
Route::get('/login', [UserController::class, 'login']);
Route::post('/loginPost', [UserController::class, 'loginPost']);
Route::get('/registrasiPembeli', [UserController::class, 'registrasiPembeli']);
Route::post('/registrasiPostPembeli', [UserController::class, 'registrasiPostPembeli']);
Route::get('/registrasiPenjual', [UserController::class, 'registrasiPenjual']);
Route::post('/registrasiPostPenjual', [UserController::class, 'registrasiPostPenjual']);
Route::get('/logout', [UserController::class, 'logout']);

// Dashboard
Route::get('/dashpembeli', [HomeController::class, 'dashpembeli']);
Route::get('/dashpenjual', [HomeController::class, 'dashpenjual']);

// Dashboard Admin
Route::get('/admin', [AdminController::class, 'admin']);
Route::get('/admin/data-user', [AdminController::class, 'dataUser']);
Route::get('/admin/data-toko', [AdminController::class, 'dataToko']);
Route::get('/admin/data-obat', [AdminController::class, 'dataObat']);
Route::get('/admin/data-pembeli', [AdminController::class, 'dataPembeli']);
Route::get('/admin/data-penjual', [AdminController::class, 'dataPenjual']);

// Profile
Route::get('/profile/{username}', [ProfileController::class, 'getbyUsernamePembeli'])->name('profile');
Route::post('/profileUpdate', [ProfileController::class, 'profileUpdate']);

// Route::get('/profiles', [ProfileController::class, 'profiles']);
Route::get('/profiles', [ProfileController::class, 'getbyUsernamePenjual']);
Route::post('/profilesUpdate', [ProfileController::class, 'profilesUpdate']);

// Obat
Route::get('/obat/add-obat', [ObatController::class, 'AddObat']);
Route::post('/obat/add-obat-post', [ObatController::class, 'create']);
Route::get('/obat/ubah-obat/{id}', [ObatController::class, 'updateObat']);
Route::post('/obat/ubah-obat-post', [ObatController::class, 'edit']);
Route::get('/obat/hapus-obat/{id}', [ObatController::class, 'destroy']);

// Shop menampilkan data obat
Route::get('/shop', [OrderController::class, 'showAllObat']);

// Shop-single product
Route::post('/shop-single', [OrderController::class, 'SelectedObatById']);

// Cart
Route::get('/cart', [OrderController::class, 'cart']);
Route::post('/Addcart', [OrderController::class, 'AddtoCart']);
Route::post('/makeOrder', [OrderController::class, 'makeOrder']);
Route::get('/cancelOrder/{id_keranjang}', [OrderController::class, 'cancelOrder']);

// About
Route::view('/about', '/Other/about');

// Contact
Route::view('/contact', '/Other/contact');



// Full Akses ======================================================

// USER
Route::get('/admin/add-user', [FullAksesAdminController::class, 'AddUser']);
Route::post('/admin/add-userPost', [FullAksesAdminController::class, 'AddUserPost']);
Route::get('/admin/update-user/{id}', [FullAksesAdminController::class, 'UpdateUser']);
Route::post('/admin/update-userPost', [FullAksesAdminController::class, 'UpdateUserPost']);
Route::get('/admin/hapus-user/{id}/{role}/{username}', [FullAksesAdminController::class, 'HapusData']);

// TOKO
Route::get('/admin/update-toko/{id}', [FullAksesAdminController::class, 'UpdateToko']);
Route::post('/admin/update-tokoPost', [FullAksesAdminController::class, 'UpdateTokoPost']);
Route::get('/admin/hapus-data-toko/{id}', [FullAksesAdminController::class, 'HapusDataToko']);
