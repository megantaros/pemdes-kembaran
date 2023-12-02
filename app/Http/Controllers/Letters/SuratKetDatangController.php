<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratKetDatangController extends Controller
{
    //
    public function create()
    {
        return view('form.form_surat_ket_pindah_datang');
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_warga' => 'required',
            'foto_surat_ket_pindah_capil' => 'required|image',
        ]);

        $permohonanSurat = \App\Models\SuratPengajuan::create([
            'id_warga' => $request->id_warga,
            'jenis_surat' => 'Surat Keterangan Pindah Datang',
            'tanggal' => date('Y-m-d'),
        ]);

        $data = \App\Models\SuratKetPindahDatang::create([
            'id_permohonan_surat' => $permohonanSurat->id_permohonan_surat,
            'foto_surat_ket_pindah_capil' => $request->foto_surat_ket_pindah_capil,
        ]);

        if ($request->hasFile('foto_surat_ket_pindah_capil')) {
            $request->file('foto_surat_ket_pindah_capil')->move('berkaspemohon/', $request->file('foto_surat_ket_pindah_capil')->getClientOriginalName());
            $data->foto_surat_ket_pindah_capil = $request->file('foto_surat_ket_pindah_capil')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('surat.warga')->with('success', 'Data Berhasil Dikirim');
    }
    public function show($id)
    {
        $data = \App\Models\SuratPengajuan::where('permohonan_surat.id_permohonan_surat', $id)
            ->join('surat_ket_pindah_datang', 'permohonan_surat.id_permohonan_surat', '=', 'surat_ket_pindah_datang.id_permohonan_surat')
            ->join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->where('permohonan_surat.jenis_surat', 'Surat Keterangan Pindah Datang')
            ->select('permohonan_surat.*', 'surat_ket_pindah_datang.*', 'warga.*')
            ->first();

        return view('admin.detailsuratpindah_datang', compact('data'));
    }
    public function edit($id)
    {
        $data = \App\Models\SuratKetPindahDatang::where('surat_ket_pindah_datang.id_permohonan_surat', $id)
            ->join('permohonan_surat', 'surat_ket_pindah_datang.id_permohonan_surat', '=', 'permohonan_surat.id_permohonan_surat')
            ->join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->select('permohonan_surat.*', 'surat_ket_pindah_datang.*', 'warga.*')
            ->first();

        return view('users.detailsuratpindah_datang', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data = \App\Models\SuratKetPindahDatang::find($id);
        $data->update($request->except(['keterangan_warga']));

        if ($request->hasFile('foto_surat_ket_pindah_capil')) {
            $request->file('foto_surat_ket_pindah_capil')->move('berkaspemohon/', $request->file('foto_surat_ket_pindah_capil')->getClientOriginalName());
            $data->foto_surat_ket_pindah_capil = $request->file('foto_surat_ket_pindah_capil')->getClientOriginalName();
            $data->save();
        }

        $keteranganWarga = $request->input('keterangan_warga');
        $idPermohonanSurat = $data->id_permohonan_surat;
        if ($keteranganWarga != null) {
            $suratPengajuan = \App\Models\SuratPengajuan::find($idPermohonanSurat);

            $suratPengajuan->update([
                'keterangan_warga' => $keteranganWarga,
            ]);
        }

        return redirect()->back()->with('success', 'Sukses Edit Data Surat!');
    }
}