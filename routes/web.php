<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TipeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAdminController;
use App\Http\Controllers\WebAsetController;
use App\Http\Controllers\WebCustomerController;
use App\Http\Controllers\WebTransaksiController;
use App\Http\Controllers\WebProfileController;
use App\Http\Controllers\LoginController;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\HomeController;


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
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('login_proses');

Route::group(['prefix' => 'pdam', 'middleware' => ['auth'], 'as' => 'admin.'], function () {

    Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    

    Route::get('/pageadmin', [WebAdminController::class, 'page'])->name('PageAdmin');
    Route::get('/admin', [WebAdminController::class, 'index'])->name('admins');
    Route::get('/admintambah', [WebAdminController::class, 'tambah'])->name('tambahadmin');
    Route::post('/insertdata', [WebAdminController::class, 'insert'])->name('insertdata');
    Route::get('/tampildata/{id}', [WebAdminController::class, 'tampil'])->name('tampildata');
    Route::post('/updatedata/{id}', [WebAdminController::class, 'update'])->name('updatedata');
    Route::get('/delete/{id}', [WebAdminController::class, 'delete'])->name('deletedata');


    Route::get('/pageaset', [WebAsetController::class, 'page'])->name('PageAset');
    Route::get('/aset', [WebAsetController::class, 'index'])->name('aset');
    Route::get('/asettambah', [WebAsetController::class, 'tambah'])->name('tambahaset');
    Route::get('/asettambah', [WebAsetController::class, 'dropdown'])->name('dropdown');
    Route::post('/asetinsertdata', [WebAsetController::class, 'insert'])->name('asetinsertdata');
    // Route::get('/asettampildata/{idAset}', [WebAsetController::class, 'dropdown'])->name('asettampildata');
    Route::get('/asettampildata/{id}', [WebAsetController::class, 'tampil'])->name('asettampildata');
    Route::post('/asetupdatedata/{id}', [WebAsetController::class, 'update'])->name('asetupdatedata');
    Route::get('/asetdelete/{id}', [WebAsetController::class, 'delete'])->name('asetdeletedata');

    Route::get('/pagetipe', [TipeController::class, 'page'])->name('PageTipe');
    Route::get('/tipe', [TipeController::class, 'index'])->name('tipe');
    Route::get('/tipetambah', [TipeController::class, 'tambah'])->name('tambahtipe');
    Route::get('/tipetambah', [TipeController::class, 'dropdown'])->name('dropdown');
    Route::post('/tipeinsertdata', [TipeController::class, 'insert'])->name('tipeinsertdata');
    Route::get('/tipetampildata/{idTipe}', [TipeController::class, 'tampil'])->name('tipetampildata');
    Route::post('/tipeupdatedata/{idTipe}', [TipeController::class, 'update'])->name('tipeupdatedata');
    Route::get('/tipedelete/{idTipe}', [TipeController::class, 'delete'])->name('tipedeletedata');

    Route::get('/pagekategori', [KategoriController::class, 'page'])->name('PageKategori');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('/kategoritambah', [KategoriController::class, 'tambah'])->name('tambahKategori');
    Route::get('/kategoritambah', [KategoriController::class, 'dropdown'])->name('dropdown');
    Route::post('/kategoriinsertdata', [KategoriController::class, 'insert'])->name('kategoriinsertdata');
    Route::get('/kategoritampildata/{idKategori}', [KategoriController::class, 'tampil'])->name('kategoritampildata');
    Route::post('/kategoriupdatedata/{idKategori}', [KategoriController::class, 'update'])->name('kategoriupdatedata');
    Route::get('/kategoridelete/{idKategori}', [KategoriController::class, 'delete'])->name('kategorideletedata');

    Route::get('/pagecust', [WebCustomerController::class, 'page'])->name('PageCustomers');
    Route::get('/customers', [WebCustomerController::class, 'index'])->name('customers');
    // Route::get('/countcustomers', [WebCustomerController::class, 'count'])->name('countcustomers');

    Route::get('/transaksi', [WebTransaksiController::class, 'index'])->name('transaksi');
    // Route::get('/indextransaksi', [WebTransaksiController::class, 'index'])->name('indextransaksi');

    Route::get('/profile', [WebProfileController::class, 'page'])->name('PageProfile');

});

// Route::get('profil', function () {
//     return view('profile');
// })->name('profil');


// Route::get('/', function () {
//     return view('welcome');
// });




// Route::get('login', function () {
//     return view('login');
// });
// Route::get('register', function () {
//     return view('register');
// });