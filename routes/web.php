<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;
use App\Models\Barang;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $jumlahbarang = Barang::count();
    return view('welcome', compact('jumlahbarang'));
})->middleware('auth');

Route::get('/barang', [BarangController::class, 'index'])->name('barang')->middleware('auth');

Route::get('/tambahbarang', [BarangController::class, 'tambahbarang'])->name('tambahbarang');
Route::post('/insertdata', [BarangController::class, 'insertdata'])->name('insertdata');

Route::get('/tampildata/{id}', [BarangController::class, 'tampildata'])->name('tampildata');
Route::post('/updatedata/{id}', [BarangController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}', [BarangController::class, 'delete'])->name('delete');

Route::get('/eksporpdf', [BarangController::class, 'eksporpdf'])->name('eksporpdf');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

Route::get('/register', [LoginController::class, 'register'])->name('register');

Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');