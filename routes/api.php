<?php

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

Route::post("/login", [\App\Http\Controllers\API\Authentication\AuthController::class, 'login']);
Route::post("/register", [\App\Http\Controllers\API\Authentication\AuthController::class, 'register']);

Route::middleware("auth:sanctum")->group(function () {
    Route::get("/user", [\App\Http\Controllers\API\Authentication\AuthController::class, 'getUser']);
    Route::put("/user/{id_warga}", [\App\Http\Controllers\API\Authentication\AuthController::class, 'update']);
    Route::post("/logout", [\App\Http\Controllers\API\Authentication\AuthController::class, 'logout']);

    Route::prefix("surat")->group(function () {
        Route::resource("permohonan-surat", \App\Http\Controllers\API\Letters\PengajuanSurat::class);
        Route::resource("permohonan-kk", \App\Http\Controllers\API\Letters\PermohonanKK::class);
        Route::resource("permohonan-ktp", \App\Http\Controllers\API\Letters\PermohonanKTP::class);
        Route::resource("permohonan-skck", \App\Http\Controllers\API\Letters\PermohonanSKCK::class);
        Route::resource("permohonan-domisili", \App\Http\Controllers\API\Letters\PermohonanDomisili::class);
        Route::resource("permohonan-usaha", \App\Http\Controllers\API\Letters\PermohonanUsaha::class);
        Route::resource("permohonan-pindah", \App\Http\Controllers\API\Letters\PermohonanPindah::class);
        Route::resource("permohonan-datang", \App\Http\Controllers\API\Letters\PermohonanPindah::class);
    });

});

// Route::post('/cek_login', [AndroidController::class, 'sanctum']);
// Route::post('/cek_register', [AndroidController::class, 'sanctum_store']);
// Route::group(['middleware' => ['auth:sanctum']], function(){
//     Route::get('/user', function(Request $request) {
//         $user = auth('sanctum')->user();
//         // $user = $request->user();
//         return $user;
//     });
//     Route::post('/logout', [AndroidController::class, 'logout_sanctum']);
// });
// Route::get('/users', function () {
//     $users = User::all();
//     return $users;
// });

// Route::prefix('android')->group(function () {

//     Route::get('/', [AndroidController::class, 'start']);
//     Route::post('/login', [AndroidController::class, 'login']);
//     Route::post('/regist', [AndroidController::class, 'regist']);
//     Route::post('/update/{id_warga}', [AndroidController::class, 'update']);
//     Route::get('/profil/{id_warga}', [AndroidController::class, 'get_data_warga']);

//     Route::prefix('surat_pengajuan')->group(function () {
//         Route::post('/store', [AndroidController::class, 'store_surat_pengajuan']);
//         Route::get('/{id_warga}', [AndroidController::class, 'get_surat_pengajuan']);
//         Route::delete('/delete/{id_surat_pengajuan}', [AndroidController::class, 'delete_surat_pengajuan']);
//     });

//     Route::prefix('surat_ket_domisili')->group(function () {
//         Route::get('/{id_warga}', [AndroidController::class, 'get_surat_ket_domisili']);
//         Route::post('/store/{id_surat_pengajuan}', [AndroidController::class, 'store_surat_ket_domisili']);
//         Route::post('/edit/{id_surat_ket_domisili}', [AndroidController::class, 'update_surat_ket_domisili']);
//     });

//     Route::prefix('surat_peng_skck')->group(function () {
//         Route::get('/{id_warga}', [AndroidController::class, 'get_surat_peng_skck']);
//         Route::post('/store/{id_surat_pengajuan}', [AndroidController::class, 'store_surat_peng_skck']);
//         Route::post('/edit/{id_surat_peng_skck}', [AndroidController::class, 'update_surat_peng_skck']);
//     });
// });