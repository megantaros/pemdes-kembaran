<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    //
    public function index(Request $request)
    {
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        if ($startDate && $endDate) {
            $data = \App\Models\User::whereBetween('created_at', [$startDate, $endDate])->get();

            if ($data == '[]') {
                return redirect()->route('warga-admin.index')->with('error', 'Data Tidak Ditemukan !');
            }

            return view('admin.daftar-warga', compact('data'));
        } else {
            $data = \App\Models\User::all();
            return view('admin.daftar-warga', compact('data'));
        }
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
        $data = \App\Models\User::join('permohonan_surat', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->where('permohonan_surat.id_warga', $id_warga)
            ->orderBy('permohonan_surat.created_at', 'DESC')
            ->select('warga.nama_warga', 'permohonan_surat.*')
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

    public function completedProfile(Request $request, $id_warga)
    {
        $data = \App\Models\User::find($id_warga);
        $data->update($request->all());

        return redirect()->route('info.warga')->with('success', 'Data Berhasil Dilengkapi !');
    }
}