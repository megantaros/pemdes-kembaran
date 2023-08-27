<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function beranda() {
        return view('beranda');
    }
    public function layanan() {
        return view('layanan');
    }
    public function kontak() {
        return view('kontak');
    }
    public function loginWarga() {
        return view('users.login');
    }
    public function registerWarga() {
        return view('users.register');
    }
    public function updateProfile() {
        return view('users.updateprofile');
    }
    public function suratWarga() {
        $id_warga = \Illuminate\Support\Facades\Auth::user()->id_warga;
        $data = \App\Models\User::join('surat_pengajuan', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
        ->where('surat_pengajuan.id_warga', $id_warga)
        ->select('warga.name', 'surat_pengajuan.*')
        ->get();

        return view('users.suratpengajuan', compact('data'));
    }
    public function infoAkun() {
        return view('users.infoprofil');
    }
}