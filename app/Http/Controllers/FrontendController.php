<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function beranda()
    {
        return view('beranda');
    }
    public function layanan()
    {
        return view('layanan');
    }
    public function kontak()
    {
        return view('kontak');
    }
    public function loginWarga()
    {
        return view('users.login');
    }
    public function registerWarga()
    {
        return view('users.register');
    }
}