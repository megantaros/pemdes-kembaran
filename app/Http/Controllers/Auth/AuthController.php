<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function register(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'confirmed_pass' => 'required|min:8|same:password',
        ]);
        \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => \Illuminate\Support\Str::random(60),
        ]);
        return redirect()->route('login.warga')->with('success', 'Register Berhasil !');
    }
    
    public function loginWarga(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if(\Illuminate\Support\Facades\Auth::attempt($request->only('email', 'password'))){
            $user = $request->user();
            if (!$user->jenis_kelamin && !$user->notelpon && !$user->alamat){
                return redirect()->route('update.profile')->with('success', 'Anda Berhasil Login !');
            }
            return redirect()->route('home')->with('success', 'Anda Berhasil Login');
        }
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        return redirect()->back()->with('error', 'Email atau Password Salah !');
    }

    public function loginAdmin(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if(\Illuminate\Support\Facades\Auth::attempt($request->only('email', 'password'))){
            $user = $request->user();
            if (!$user->jenis_kelamin && !$user->notelpon && !$user->alamat){
                return redirect('/lengkapiprofil')->with('success', 'Anda Berhasil Login !');
            }
            // dd($request->all());
            return redirect('/')->with('success', 'Anda Berhasil Login');
        }
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        return redirect('/login')->with('error', 'Email atau Password Salah !');
    }

    public function logout() {
        \Illuminate\Support\Facades\Auth::logout();
        return redirect('/login')->with('success', 'Anda Berhasil Logout !');
    }
}