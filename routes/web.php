<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PetugasController;
use App\Models\Buku;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RegisterController;

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

// Route dashboard
Route::get('/', function () {
    $totalBuku = Buku::count();
    return view('layouts.home',compact('totalBuku')); // Pastikan file home.blade.php ada di resources/views/
})->name('login'); 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/buku',[BukuController::class,'index'])->name( 'buku.index');
Route::get('/buku/create',[BukuController::class,'create'])->name('buku.create');
Route::post('/buku',[BukuController::class,'store'])->name('buku.store');
Route::get('/buku/{id}/edit',[BukuController::class,'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

Route::get('/member',[MemberController::class,'index'])->name( 'member.index');
Route::get('/member/create',[MemberController::class,'create'])->name('member.create');
Route::post('/member',[MemberController::class,'store'])->name('member.store');
Route::get('/member/{id}/edit',[MemberController::class,'edit'])->name('member.edit');
Route::put('/member/{id}', [MemberController::class, 'update'])->name('member.update');
Route::delete('/member/{id}', [MemberController::class, 'destroy'])->name('member.destroy');

Route::get('/kategori',[KategoriController::class,'index'])->middleware('auth')->name( 'kategori.index');
Route::get('/kategori/create',[KategoriController::class,'create'])->name('kategori.create');
Route::post('/kategori',[KategoriController::class,'store'])->name('kategori.store');
Route::get('/kategori/{id}/edit',[KategoriController::class,'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');


Route::get('/petugas',[PetugasController::class,'index'])->name( 'petugas.index');
Route::get('/petugas/create',[PetugasController::class,'create'])->name('petugas.create');
Route::post('/petugas',[PetugasController::class,'store'])->name('petugas.store');
Route::get('/petugas/{id}/edit',[PetugasController::class,'edit'])->name('petugas.edit');
Route::put('/petugas/{id}', [PetugasController::class, 'update'])->name('petugas.update');
Route::delete('/petugas/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');


Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::post('/transaksi/{id}/pengembalian', [TransaksiController::class, 'pengembalian'])->name('transaksi.pengembalian');
Route::get('/register', [RegisterController::class, 'showForm']);
Route::post('/register', [RegisterController::class, 'processForm']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

