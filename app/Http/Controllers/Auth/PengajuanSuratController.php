<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{
    //

    public function store(Request $request) {

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

    public function edit($id) {
        $data = \App\Models\SuratPengajuan::find($id);
        return view('users.editsuratpengajuan', compact('data'));
    }

    public function update(Request $request, $id) {
        $data = \App\Models\SuratPengajuan::find($id);
        $data->update($request->all());

        return redirect()->back()->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id) {
        $data = \App\Models\SuratPengajuan::find($id);
        $data->delete();

        if ($data->jenis_surat == 'Surat Pengantar KTP') {
            $ktp = \App\Models\KTP::find($data->id_surat);
            $ktp->delete();
        }

        if ($data->jenis_surat == 'Surat Pengantar KK') {
            $kk = \App\Models\SuratPengKk::find($data->id_surat);
            $kk->delete();
        }

        if ($data->jenis_surat == 'Surat Pengantar SKCK') {
            $skck = \App\Models\Skck::find($data->id_surat);
            $skck->delete();
        }

        if ($data->jenis_surat == 'Surat Keterangan Domisili') {
            $domisili = \App\Models\Domisili::find($data->id_surat);
            $domisili->delete();
        }

        if ($data->jenis_surat == 'Surat Keterangan Usaha') {
            $usaha = \App\Models\SuratKetUsaha::find($data->id_surat);
            $usaha->delete();
        }

        if ($data->jenis_surat == 'Surat Keterangan Pindah') {
            $pindah = \App\Models\SuratKetPindah::find($data->id_surat);
            $pindah->delete();
        }

        if ($data->jenis_surat == 'Surat Keterangan Pindah Datang') {
            $datang = \App\Models\SuratKetPindahDatang::find($data->id_surat);
            $datang->delete();
        }
        
        return redirect()->route('surat.warga')->with('success', 'Data Berhasil Dihapus');
    }
}