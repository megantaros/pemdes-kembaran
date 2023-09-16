<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    //
    public function index()
    {
        $data = \App\Models\User::all();
        return view('admin.daftar-warga', compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:warga',
            'password' => 'required',
            'conf_pass' => 'required',
        ]);

        if ($request->password != $request->conf_pass) {
            return redirect()->back()->with('error', 'Password Tidak Sama !');
        }

        $data = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'id_warga' => $request->id_warga,
            'password' => bcrypt($request->password),
        ]);
        $data->save();

        if ($data) {
            return redirect()->back()->with('success', 'Data Berhasil Ditambahkan !');
        } else {
            return redirect()->back()->with('error', 'Data Gagal Ditambahkan !');
        }
    }
    public function show($id_warga)
    {
        $data = \App\Models\User::find($id_warga);
        $pengajuanSurat = \App\Models\SuratPengajuan::where('id_warga', $id_warga)->get();

        return view('admin.detail-warga', ['data' => $data, 'pengajuanSurat' => $pengajuanSurat]);
    }
    public function suratWarga()
    {
        $id_warga = \Illuminate\Support\Facades\Auth::user()->id_warga;
        $data = \App\Models\User::join('surat_pengajuan', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
            ->where('surat_pengajuan.id_warga', $id_warga)
            ->select('warga.nama_warga', 'surat_pengajuan.*')
            ->get();

        return view('users.suratpengajuan', compact('data'));
    }
    public function infoAkun()
    {
        return view('users.infoprofil');
    }
    public function edit($id_warga)
    {
        $data = \App\Models\User::find($id_warga);

        return view('users.updateprofile', ['id_warga' => $data->id_warga]);
    }
    public function update(Request $request, $id_warga)
    {
        $data = \App\Models\User::find($id_warga);
        $data->update($request->except(['password', 'conf_pass']));

        if ($request->password != $request->conf_pass) {
            return redirect()->back()->with('error', 'Password Tidak Sama !');
        } else {
            $data->password = bcrypt($request->password);
            $data->save();
        }

        return redirect()->back()->with('success', 'Data Berhasil Diupdate !');
    }
}