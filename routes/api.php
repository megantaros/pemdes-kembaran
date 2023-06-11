<?php

use App\Http\Controllers\AndroidController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', function () {
    $users = User::all();
    return $users;
});

Route::prefix('android')->group(function () {
    
    Route::get('/', [AndroidController::class, 'start'])->name('start.android');
    Route::post('/login', [AndroidController::class, 'login'])->name('login.android');
    Route::post('/regist', [AndroidController::class, 'regist'])->name('regist.android');
    Route::post('/update/{id_warga}', [AndroidController::class, 'update'])->name('update.android');
    Route::get('/profil/{id_warga}', [AndroidController::class, 'get_data_warga'])->name('profil.android');

    Route::prefix('surat_pengajuan')->group(function () {
        Route::post('/store', [AndroidController::class, 'store_surat_pengajuan'])->name('store.surat_pengajuan.android');
        Route::get('/{id_warga}', [AndroidController::class, 'get_surat_pengajuan'])->name('get_surat_pengajuan.android');
        Route::delete('/delete/{id_surat_pengajuan}', [AndroidController::class, 'delete_surat_pengajuan'])->name('delete_surat_pengajuan.android');
    });

    Route::prefix('surat_ket_domisili')->group(function () {
        Route::get('/{id_warga}', [AndroidController::class, 'get_surat_ket_domisili'])->name('get_surat_ket_domisili.android');
        Route::post('/store/{id_surat_pengajuan}', [AndroidController::class, 'store_surat_ket_domisili'])->name('store_surat_ket_domisili.android');
        Route::post('/edit/{id_surat_ket_domisili}', [AndroidController::class, 'update_surat_ket_domisili'])->name('update_surat_ket_domisili.android');
    });

    Route::prefix('surat_peng_skck')->group(function () {
        Route::get('/{id_warga}', [AndroidController::class, 'get_surat_peng_skck'])->name('get_surat_peng_skck.android');
        Route::post('/store/{id_surat_pengajuan}', [AndroidController::class, 'store_surat_peng_skck'])->name('store_surat_peng_skck.android');
        Route::post('/edit/{id_surat_peng_skck}', [AndroidController::class, 'update_surat_peng_skck'])->name('update_surat_peng_skck.android');
    });
});