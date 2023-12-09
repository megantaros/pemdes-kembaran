<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{
    //

    public function store(Request $request)
    {

        $jenisSurat = $request->jenis_surat;

        if ($jenisSurat == 'Surat Pengantar KTP') {
            return redirect()->route('pengantar-ktp.create')->with('success', 'Silahkan Masukkan Data Pengisian Surat!');
        }

        if ($jenisSurat == 'Surat Pengantar KK') {
            return redirect()->route('pengantar-kk.create')->with('success', 'Silahkan Masukkan Data Pengisian Surat!');
        }

        if ($jenisSurat == 'Surat Pengantar SKCK') {
            return redirect()->route('pengantar-skck.create')->with('success', 'Silahkan Masukkan Data Pengisian Surat!');
        }

        if ($jenisSurat == 'Surat Keterangan Domisili') {
            return redirect()->route('keterangan-domisili.create')->with('success', 'Silahkan Masukkan Data Pengisian Surat!');
        }

        if ($jenisSurat == 'Surat Keterangan Usaha') {
            return redirect()->route('keterangan-usaha.create')->with('success', 'Silahkan Masukkan Data Pengisian Surat!');
        }

        if ($jenisSurat == 'Surat Keterangan Pindah') {
            return redirect()->route('keterangan-pindah.create')->with('success', 'Silahkan Masukkan Data Pengisian Surat!');
        }

        if ($jenisSurat == 'Surat Keterangan Pindah Datang') {
            return redirect()->route('keterangan-datang.create')->with('success', 'Silahkan Masukkan Data Pengisian Surat!');
        }

    }

    // public function edit($id)
    // {
    //     $data = \App\Models\SuratPengajuan::find($id);
    //     return view('users.editsuratpengajuan', compact('data'));
    // }

    public function update(Request $request, $id)
    {
        $data = \App\Models\SuratPengajuan::find($id);
        $data->update($request->all());

        if ($request->status == '2') {
            return redirect()->route('verifikasi.surat')->with('success', 'Surat Diterima');
        }

        if ($request->status == '3') {
            return redirect()->route('proses.surat')->with('success', 'Surat Diproses');
        }

        if ($request->status == '4') {
            return redirect()->route('signed.surat')->with('success', 'Surat Telah Ditandatangani oleh Kepala Desa');
        }

        if ($request->status == '5') {
            return redirect()->route('selesai.surat')->with('success', 'Proses Surat Telah Selesai');
        }

        return redirect()->back()->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $data = \App\Models\SuratPengajuan::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data Surat Berhasil Dihapus');
    }
}