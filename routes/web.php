<?php

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

Route::get('/', [\App\Http\Controllers\FrontendController::class, 'beranda'])->name('home');
Route::get('/layanan', [\App\Http\Controllers\FrontendController::class, 'layanan'])->name('layanan');
Route::get('/kontak', [\App\Http\Controllers\FrontendController::class, 'kontak'])->name('kontak');

Route::prefix('auth')->group(function () {

    Route::get('/register', [\App\Http\Controllers\FrontendController::class, 'registerWarga'])->name('register.warga');
    Route::post('/register', [\App\Http\Controllers\Auth\AuthController::class, 'register'])->name('store.warga');
    Route::get('/login', [\App\Http\Controllers\FrontendController::class, 'loginWarga'])->name('login.warga');
    Route::post('/login', [\App\Http\Controllers\Auth\AuthController::class, 'loginWarga'])->name('attempt.warga');
    Route::get('/login-admin', [\App\Http\Controllers\FrontendController::class, 'loginAdmin'])->name('login.admin');
    Route::post('/login-admin', [\App\Http\Controllers\Auth\AuthController::class, 'loginAdmin'])->name('attempt.admin');
});

Route::middleware('auth:web')->group(function () {

    Route::prefix('auth-session')->group(function () {

        Route::resource('warga', \App\Http\Controllers\Auth\WargaController::class);
        Route::put('/update-profil/{id_warga}', [\App\Http\Controllers\Auth\WargaController::class, 'completedProfile'])->name('completed.profile');
        Route::get('/permohonan-surat', [\App\Http\Controllers\Auth\WargaController::class, 'suratWarga'])->name('surat.warga');
        Route::get('/info-akun', [\App\Http\Controllers\Auth\WargaController::class, 'infoAkun'])->name('info.warga');
        Route::resource('pengajuan-surat', \App\Http\Controllers\Letters\PengajuanSuratController::class);
        Route::resource('pengantar-ktp', \App\Http\Controllers\Letters\SuratPengKtpController::class);
        Route::resource('pengantar-kk', App\Http\Controllers\Letters\SuratPengKkController::class);
        Route::resource('pengantar-skck', App\Http\Controllers\Letters\SuratPengSkckController::class);
        Route::resource('keterangan-domisili', App\Http\Controllers\Letters\SuratKetDomisiliController::class);
        Route::resource('keterangan-usaha', App\Http\Controllers\Letters\SuratKetUsahaController::class);
        Route::resource('keterangan-pindah', App\Http\Controllers\Letters\SuratKetPindahController::class);
        Route::resource('keterangan-datang', App\Http\Controllers\Letters\SuratKetDatangController::class);

        Route::post('/logout-warga', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout.warga');
    });

});

Route::middleware('auth:admin')->group(function () {

    Route::prefix('admin')->group(function () {

        Route::resource('warga-admin', \App\Http\Controllers\Auth\WargaController::class);
        Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/daftar-surat/verifikasi-surat', [\App\Http\Controllers\Admin\AdminController::class, 'verifikasiSurat'])->name('verifikasi.surat');
        Route::get('/daftar-surat/{status_surat}/cetak', [\App\Http\Controllers\Admin\AdminController::class, 'cetakSurat'])->name('cetak.surat');
        Route::resource('admin', \App\Http\Controllers\Admin\AdminController::class);
        Route::resource('validasi-surat', \App\Http\Controllers\Letters\PengajuanSuratController::class);
        Route::resource('permohonan-kk', \App\Http\Controllers\Letters\SuratPengKkController::class);
        Route::resource('permohonan-ktp', \App\Http\Controllers\Letters\SuratPengKtpController::class);
        Route::resource('permohonan-skck', \App\Http\Controllers\Letters\SuratPengSkckController::class);
        Route::resource('permohonan-domisili', \App\Http\Controllers\Letters\SuratKetDomisiliController::class);
        Route::resource('permohonan-usaha', \App\Http\Controllers\Letters\SuratKetUsahaController::class);
        Route::resource('permohonan-pindah', \App\Http\Controllers\Letters\SuratKetPindahController::class);
        Route::resource('permohonan-datang', \App\Http\Controllers\Letters\SuratKetDatangController::class);

        Route::post('/logout-admin', [\App\Http\Controllers\Auth\AuthController::class, 'logoutAdmin'])->name('logout.admin');

    });
});


// Route::controller(AdminController::class)->group(function(){
//     Route::get('/loginadmin', 'login')->name('loginadmin');
//     Route::post('/loginadmin', 'attemp');
// });

// Route::group(['middleware' => ['auth', 'hakakses:user']], function(){

//     Route::controller(LoginController::class)->group(function() {
//         Route::get('/lengkapiprofil', 'get');
//         Route::put('/lengkapiprofil', 'update');
//         Route::get('/profil', 'detail')->name('profil');
//         Route::put('/profil/updateprofil', 'edit');
//     });  

//     Route::controller(SuratPengajuanController::class)->group(function() {
//         Route::post('/insertsuratpengajuan', 'store');
//         Route::get('/profil/suratsaya', 'get')->name('suratsaya');
//         Route::get('/delete-surat/{id}', 'delete');
//     });

//     Route::controller(SuratKetDomisiliController::class)->group(function() {
//         Route::get('/layanan/{id_surat_pengajuan}/surat_ket_domisili', 'get');
//         Route::post('/layanan/{id_surat_pengajuan}/surat_ket_domisili', 'store');
//         Route::get('/profil/suratsaya/detailsuratdomisili/{id_warga}', 'detail');
//         Route::put('/editsuratdomisili/{id}', 'edit');
//     });

//     Route::controller(SuratKetUsahaController::class)->group(function() {
//         Route::get('/layanan/{id_surat_pengajuan}/surat_ket_usaha', 'get');
//         Route::post('/layanan/{id_surat_pengajuan}/surat_ket_usaha', 'store');
//         Route::get('/profil/suratsaya/detailsuratusaha/{id_warga}', 'detail');
//         Route::put('/editsuratusaha/{id}', 'edit');
//     });

//     Route::controller(SuratKetPindahController::class)->group(function() {
//         Route::get('/layanan/{id_surat_pengajuan}/surat_ket_pindah', 'get');
//         Route::post('/layanan/{id_surat_pengajuan}/surat_ket_pindah', 'store');
//         Route::get('/profil/suratsaya/detailsuratpindah/{id_warga}', 'detail');
//         Route::put('/editsuratpindah/{id}', 'edit');
//     });

//     Route::controller(SuratKetPindahDatangController::class)->group(function() {
//         Route::get('/layanan/{id_surat_pengajuan}/surat_ket_pindah_datang', 'get');
//         Route::post('/layanan/{id_surat_pengajuan}/surat_ket_pindah_datang', 'store');
//         Route::get('/profil/suratsaya/detailsuratpindah_datang/{id_warga}', 'detail');
//         Route::put('/editsuratpindahdatang/{id}', 'edit');
//     });

//     Route::controller(SuratPengKTPController::class)->group(function() {
//         Route::get('/layanan/{id_surat_pengajuan}/surat_peng_ktp', 'get');
//         Route::post('/layanan/{id_surat_pengajuan}/surat_peng_ktp', 'store');
//         Route::get('/profil/suratsaya/detailsuratktp/{id_warga}', 'detail');
//         Route::put('/editsuratktp/{id}', 'edit');
//     });

//     Route::controller(SuratPengKKController::class)->group(function() {
//         Route::get('/layanan/{id_surat_pengajuan}/surat_peng_kk', 'get');
//         Route::post('/layanan/{id_surat_pengajuan}/surat_peng_kk', 'store');
//         Route::get('/profil/suratsaya/detailsuratkk/{id_warga}', 'detail');
//         Route::put('/editsuratkk/{id}', 'edit');
//     });

//     Route::controller(SuratPengSKCKController::class)->group(function() {
//         Route::get('/layanan/{id_surat_pengajuan}/surat_peng_skck', 'get');
//         Route::post('/layanan/{id_surat_pengajuan}/surat_peng_skck', 'store');
//         Route::get('/profil/suratsaya/detailsuratskck/{id_warga}', 'detail');
//         Route::put('/editsuratskck/{id}', 'edit');
//     });

// });

// Route::middleware('auth:admin')->group(function(){

//     Route::controller(AdminController::class)->group(function() {
//         Route::get('/dashboard', 'dashboard')->name('dashboard');
//         Route::get('/dashboard/suratmasuk', 'get_suratmasuk')->name('suratmasuk');
//         Route::get('/dashboard/suratmasuk/cetak_suratmasuk', 'cetak_suratmasuk')->name('cetaksuratmasuk');
//         Route::get('/dashboard/suratkeluar', 'get_suratkeluar')->name('suratkeluar');
//         Route::get('/dashboard/suratkeluar/cetak_suratkeluar', 'cetak_suratkeluar')->name('cetaksuratkeluar');
//         Route::get('/dashboard/suratditolak', 'get_suratditolak')->name('suratditolak');
//         Route::get('/logoutadmin', 'logout');
//     });

//     Route::controller(SuratPengajuanController::class)->group(function() {
//         Route::put('/dashboard/detailsurat/{id}/update', 'update');
//         Route::put('/dashboard/{id}/update', 'update');
//         Route::get('/deletesurat/{id}', 'delete');
//     });

//     Route::controller(SuratKetDomisiliController::class)->group(function() {
//         Route::get('/dashboard/detailsuratdomisili/{id_warga}', 'get_admin')->name('domisili');
//     });

//     Route::controller(SuratKetUsahaController::class)->group(function() {
//         Route::get('/dashboard/detailsuratusaha/{id_warga}', 'get_admin')->name('usaha');
//     });

//     Route::controller(SuratPengKKController::class)->group(function() {
//         Route::get('/dashboard/detailsuratkk/{id_warga}', 'get_admin')->name('kk');
//     });

//     Route::controller(SuratPengKTPController::class)->group(function() {
//         Route::get('/dashboard/detailsuratktp/{id_warga}', 'get_admin')->name('kk');
//     });

//     Route::controller(SuratPengSKCKController::class)->group(function() {
//         Route::get('/dashboard/detailsuratskck/{id_warga}', 'get_admin')->name('kk');
//     });

//     Route::controller(SuratKetPindahController::class)->group(function() {
//         Route::get('/dashboard/detailsuratpindah/{id_warga}', 'get_admin')->name('kk');
//     });

//     Route::controller(SuratKetPindahDatangController::class)->group(function() {
//         Route::get('/dashboard/detailsuratpindah_datang/{id_warga}', 'get_admin')->name('kk');
//     });

// });