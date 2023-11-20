<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratKetUsahaController extends Controller
{
    //
    public function create()
    {
        return view('form.form_surat_ket_usaha');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_warga' => 'required',
            'jenis_usaha' => 'required',
            'tempat_usaha' => 'required',
            'fc_ktp' => 'required|image',
            'fc_kk' => 'required|image',
            'foto_usaha' => 'required|image',
            'pengantar_rt' => 'required|image'
        ]);

        $permohonanSurat = \App\Models\SuratPengajuan::create([
            'id_warga' => $request->id_warga,
            'jenis_surat' => 'Surat Keterangan Usaha',
            'tanggal' => date('Y-m-d'),
        ]);

        $data = \App\Models\SuratKetUsaha::create([
            'id_permohonan_surat' => $permohonanSurat->id_permohonan_surat,
            'kewarganegaraan' => $request->kewarganegaraan,
            'status_pernikahan' => $request->status_pernikahan,
            'jenis_usaha' => $request->jenis_usaha,
            'tempat_usaha' => $request->tempat_usaha,
            'lama_usaha' => $request->lama_usaha,
            'pengantar_rt' => $request->pengantar_rt,
            'fc_ktp' => $request->fc_ktp,
            'fc_kk' => $request->fc_kk,
            'foto_usaha' => $request->foto_usaha,
        ]);

        if ($request->hasFile('fc_ktp')) {
            $request->file('fc_ktp')->move('berkaspemohon/', $request->file('fc_ktp')->getClientOriginalName());
            $data->fc_ktp = $request->file('fc_ktp')->getClientOriginalName();
            $data->save();
        }
        if ($request->hasFile('fc_kk')) {
            $request->file('fc_kk')->move('berkaspemohon/', $request->file('fc_kk')->getClientOriginalName());
            $data->fc_kk = $request->file('fc_kk')->getClientOriginalName();
            $data->save();
        }
        if ($request->hasFile('foto_usaha')) {
            $request->file('foto_usaha')->move('berkaspemohon/', $request->file('foto_usaha')->getClientOriginalName());
            $data->foto_usaha = $request->file('foto_usaha')->getClientOriginalName();
            $data->save();
        }
        if ($request->hasFile('pengantar_rt')) {
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('surat.warga')->with('success', 'Data Berhasil Dikirim');
    }

    public function show($id)
    {
        $data = \App\Models\SuratPengajuan::where('permohonan_surat.id_permohonan_surat', $id)
            ->join('surat_ket_usaha', 'permohonan_surat.id_permohonan_surat', '=', 'surat_ket_usaha.id_permohonan_surat')
            ->join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->where('permohonan_surat.jenis_surat', 'Surat Keterangan Usaha')
            ->select('permohonan_surat.*', 'surat_ket_usaha.*', 'warga.*')
            ->first();

        return view('admin.detailsuratusaha', compact('data'));
    }
    public function edit($id)
    {
        $data = \App\Models\SuratKetUsaha::where('surat_ket_usaha.id_permohonan_surat', $id)
            ->join('permohonan_surat', 'surat_ket_usaha.id_permohonan_surat', '=', 'permohonan_surat.id_permohonan_surat')
            ->join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->select('permohonan_surat.*', 'surat_ket_usaha.*', 'warga.*')
            ->first();

        return view('users.detailsuratusaha', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = \App\Models\SuratKetUsaha::find($id);
        $data->update($request->except(['keterangan_warga']));

        if ($request->hasFile('fc_ktp')) {
            $request->file('fc_ktp')->move('berkaspemohon/', $request->file('fc_ktp')->getClientOriginalName());
            $data->fc_ktp = $request->file('fc_ktp')->getClientOriginalName();
            $data->save();
        }
        if ($request->hasFile('fc_kk')) {
            $request->file('fc_kk')->move('berkaspemohon/', $request->file('fc_kk')->getClientOriginalName());
            $data->fc_kk = $request->file('fc_kk')->getClientOriginalName();
            $data->save();
        }
        ;
        if ($request->hasFile('foto_usaha')) {
            $request->file('foto_usaha')->move('berkaspemohon/', $request->file('foto_usaha')->getClientOriginalName());
            $data->foto_usaha = $request->file('foto_usaha')->getClientOriginalName();
            $data->save();
        }
        ;
        if ($request->hasFile('pengantar_rt')) {
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
            $data->save();
        }
        ;

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