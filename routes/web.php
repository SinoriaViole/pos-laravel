<?php

use App\Http\Controllers\DaftarbeliController;
use App\Http\Controllers\DaftarJualController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiBeliController;
use App\Http\Controllers\TransaksijualController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;

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
    return view('user.login');
});

Route::get('/login', function() {
    return view('user.login');
})->name('login');

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function() {

    
    Route::resource('dashboard', DashboardController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('member', MemberController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('pengeluaran', PengeluaranController::class);
    Route::resource('daftarjual', DaftarJualController::class);
    Route::resource('transaksijual', TransaksijualController::class);
    Route::resource('user', UserController::class);
    
    // Route::get('/daftarbeli/{id}/create', DaftarbeliController::class, 'create')->name('daftarbeli.create');
    // Route::get('/daftarbeli', 'DaftarbeliController@create');
    // Route::get('/daftarbeli/create/{id}', 'DaftarbeliController@create')->name('daftarbeli.create');
    Route::get('/daftarbeli/create/{id}', [DaftarbeliController::class, 'create'])->name('daftarbeli.create');
    Route::resource('daftarbeli', DaftarbeliController::class);
    
    Route::resource('transaksibeli',TransaksiBeliController::class);
    
});









