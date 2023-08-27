<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Domisili;
use App\Models\SuratPengajuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login () {
        if(Auth::check()){
            return redirect('/login');
        } else {
            return view('user.login');
        }
    }
    public function attemp(Request $request) {
        if(Auth::attempt($request->only('email', 'password'))){
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
    public function regist() {
        $auth = Auth::user();
        if( $auth ) {
            return redirect('/');  
        }
        return view('user.register');   
    }
    public function store(Request $request) {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'confirmed_pass' => 'required|min:8|same:password',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return redirect('/login')->with('success', 'Register Berhasil !');
    }
    public function get(Request $request) {
        $auth = Auth::user();
        if( $auth->notelpon && $auth->nik && $auth->ttl ) {
            return redirect('/');  
        }
        return view('user.afterlogin');
    }
    public function update(Request $request) {
        $user = $request->user();
        $values = [
            'notelpon' => $request->notelpon,
            'nik' => $request->nik,
            'ttl' => $request->ttl,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan' => $request->pekerjaan,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
        ];
        User::query()->find($user->id_warga)->updateOrFail($values);
        return redirect('/')->with('success', 'Berhasil Melengkapi Profil');
    }
    public function detail() {
        return view('user.infoprofil');
    }
    public function edit(Request $request){ 
        $values = [
            'name' => $request->name,
            'email' => $request->email,
            'notelpon' => $request->notelpon,
            'nik' => $request->nik,
            'ttl' => $request->ttl,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan' => $request->pekerjaan,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
        ];
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'notelpon' => 'required',
            'nik' => 'required',
            'ttl' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
        ]);
        $user = $request->user();
        User::query()->find($user->id_warga)->updateOrFail($values);
        if(!$user->name && !$user->email && !$user->notelpon && !$user->jenis_kelamin && !$user->pekerjaan && !$user->alamat){
            return redirect('/profil');
        } else {
            return redirect('/profil')->with('success', 'Data Berhasil Diupdate');
        }
    }
    public function logout() {
        Auth::logout();
        // SuratPengajuan::where('id_surat', NULL)->delete();
        return \redirect('/login');
    }
}