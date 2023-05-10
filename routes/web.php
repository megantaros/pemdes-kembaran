<?php

use App\Http\Controllers\SuratKetDomisiliController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KTPController;
use App\Http\Controllers\SkckController;
use App\Http\Controllers\SuratKetPindahController;
use App\Http\Controllers\SuratKetPindahDatangController;
use App\Http\Controllers\SuratKetUsahaController;
use App\Http\Controllers\SuratPengajuanController;
use App\Http\Controllers\SuratPengKkController;
use App\Http\Controllers\SuratPengKTPController;
use App\Http\Controllers\SuratPengSKCKController;
use App\Models\SuratPengajuan;
use Illuminate\Support\Facades\Route;

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
    return view('beranda');
})->name('home');

Route::get('/layanan', function () {
    return view('layanan');
})->name('layanan');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'attemp');
    Route::get('/daftar', 'regist');
    Route::post('/daftar', 'store');
    Route::post('/logout', 'logout');
});

Route::controller(AdminController::class)->group(function(){
    Route::get('/loginadmin', 'login')->name('loginadmin');
    Route::post('/loginadmin', 'attemp');
});

Route::group(['middleware' => ['auth', 'hakakses:user']], function(){
    
    Route::controller(LoginController::class)->group(function() {
        Route::get('/lengkapiprofil', 'get');
        Route::put('/lengkapiprofil', 'update');
        Route::get('/profil', 'detail')->name('profil');
        Route::put('/profil/updateprofil', 'edit');
    });

    Route::controller(SuratPengajuanController::class)->group(function() {
        Route::post('/insertsuratpengajuan', 'store');
        Route::get('/profil/suratsaya', 'get')->name('suratsaya');
        Route::get('/deletesurat/{id}', 'delete');
    });

    Route::controller(SuratKetDomisiliController::class)->group(function() {
        Route::get('/layanan/{id_surat_pengajuan}/surat_ket_domisili', 'get');
        Route::post('/layanan/{id_surat_pengajuan}/surat_ket_domisili', 'store');
        Route::get('/profil/suratsaya/detailsuratdomisili/{id_warga}', 'detail');
        Route::put('/editsuratdomisili/{id}', 'edit');
    });

    Route::controller(SuratKetUsahaController::class)->group(function() {
        Route::get('/layanan/{id_surat_pengajuan}/surat_ket_usaha', 'get');
        Route::post('/layanan/{id_surat_pengajuan}/surat_ket_usaha', 'store');
        Route::get('/profil/suratsaya/detailsuratusaha/{id_warga}', 'detail');
        Route::put('/editsuratusaha/{id}', 'edit');
    });

    Route::controller(SuratKetPindahController::class)->group(function() {
        Route::get('/layanan/{id_surat_pengajuan}/surat_ket_pindah', 'get');
        Route::post('/layanan/{id_surat_pengajuan}/surat_ket_pindah', 'store');
        Route::get('/profil/suratsaya/detailsuratpindah/{id_warga}', 'detail');
        Route::put('/editsuratpindah/{id}', 'edit');
    });

    Route::controller(SuratKetPindahDatangController::class)->group(function() {
        Route::get('/layanan/{id_surat_pengajuan}/surat_ket_pindah_datang', 'get');
        Route::post('/layanan/{id_surat_pengajuan}/surat_ket_pindah_datang', 'store');
        Route::get('/profil/suratsaya/detailsuratpindah_datang/{id_warga}', 'detail');
        Route::put('/editsuratpindahdatang/{id}', 'edit');
    });

    Route::controller(SuratPengKTPController::class)->group(function() {
        Route::get('/layanan/{id_surat_pengajuan}/surat_peng_ktp', 'get');
        Route::post('/layanan/{id_surat_pengajuan}/surat_peng_ktp', 'store');
        Route::get('/profil/suratsaya/detailsuratktp/{id_warga}', 'detail');
        Route::put('/editsuratktp/{id}', 'edit');
    });

    Route::controller(SuratPengKKController::class)->group(function() {
        Route::get('/layanan/{id_surat_pengajuan}/surat_peng_kk', 'get');
        Route::post('/layanan/{id_surat_pengajuan}/surat_peng_kk', 'store');
        Route::get('/profil/suratsaya/detailsuratkk/{id_warga}', 'detail');
        Route::put('/editsuratkk/{id}', 'edit');
    });

    Route::controller(SuratPengSKCKController::class)->group(function() {
        Route::get('/layanan/{id_surat_pengajuan}/surat_peng_skck', 'get');
        Route::post('/layanan/{id_surat_pengajuan}/surat_peng_skck', 'store');
        Route::get('/profil/suratsaya/detailsuratskck/{id_warga}', 'detail');
        Route::put('/editsuratskck/{id}', 'edit');
    });

});

Route::middleware('auth:admin')->group(function(){

    Route::controller(AdminController::class)->group(function() {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/dashboard/suratmasuk', 'get_suratmasuk')->name('suratmasuk');
        Route::get('/dashboard/suratmasuk/cetak_suratmasuk', 'cetak_suratmasuk')->name('cetaksuratmasuk');
        Route::get('/dashboard/suratkeluar', 'get_suratkeluar')->name('suratkeluar');
        Route::get('/dashboard/suratkeluar/cetak_suratkeluar', 'cetak_suratkeluar')->name('cetaksuratkeluar');
        Route::get('/dashboard/suratditolak', 'get_suratditolak')->name('suratditolak');
        Route::get('/logoutadmin', 'logout');
    });

    Route::controller(SuratPengajuanController::class)->group(function() {
        Route::put('/dashboard/detailsurat/{id}/update', 'update');
        Route::put('/dashboard/{id}/update', 'update');
        Route::get('/deletesurat/{id}', 'delete');
    });

    Route::controller(SuratKetDomisiliController::class)->group(function() {
        Route::get('/dashboard/detailsuratdomisili/{id_warga}', 'get_admin')->name('domisili');
    });

    Route::controller(SuratKetUsahaController::class)->group(function() {
        Route::get('/dashboard/detailsuratusaha/{id_warga}', 'get_admin')->name('usaha');
    });

    Route::controller(SuratPengKKController::class)->group(function() {
        Route::get('/dashboard/detailsuratkk/{id_warga}', 'get_admin')->name('kk');
    });

    Route::controller(SuratPengKTPController::class)->group(function() {
        Route::get('/dashboard/detailsuratktp/{id_warga}', 'get_admin')->name('kk');
    });

    Route::controller(SuratPengSKCKController::class)->group(function() {
        Route::get('/dashboard/detailsuratskck/{id_warga}', 'get_admin')->name('kk');
    });
    
    Route::controller(SuratKetPindahController::class)->group(function() {
        Route::get('/dashboard/detailsuratpindah/{id_warga}', 'get_admin')->name('kk');
    });

    Route::controller(SuratKetPindahDatangController::class)->group(function() {
        Route::get('/dashboard/detailsuratpindah_datang/{id_warga}', 'get_admin')->name('kk');
    });

});

// Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
// Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');
// Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');
// Route::post('/updatedata/{id}', [EmployeeController::class, 'updatedata'])->name('updatedata');
// Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');
// Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');