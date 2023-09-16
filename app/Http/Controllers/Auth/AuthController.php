<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $this->validate($request, [
            'nama_warga' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'confirmed_pass' => 'required|min:8|same:password',
        ]);
        \App\Models\User::create([
            'nama_warga' => $request->nama_warga,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => \Illuminate\Support\Str::random(60),
        ]);
        return redirect()->route('login.warga')->with('success', 'Register Berhasil !');
    }

    public function loginWarga(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (\Illuminate\Support\Facades\Auth::attempt($request->only('email', 'password'))) {
            $user = $request->user();
            if (!$user->jenis_kelamin && !$user->notelpon && !$user->alamat) {
                return redirect()->route('warga.edit', ['warga' => $user->id_warga])->with('success', 'Anda Berhasil Login !');
            }

            return redirect()->route('surat.warga')->with('success', 'Anda Berhasil Login');
        }

        return redirect()->back()->with('error', 'Email atau Password Salah !');
    }

    public function loginAdmin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (\Illuminate\Support\Facades\Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard')->with('success', 'Anda Berhasil Login Sebagai Admin');
        }

        return redirect()->back()->with('error', 'Email atau Password Salah !');
    }

    public function logout()
    {
        \Illuminate\Support\Facades\Auth::logout();
        return redirect()->route('home')->with('success', 'Anda Berhasil Logout !');
    }
}