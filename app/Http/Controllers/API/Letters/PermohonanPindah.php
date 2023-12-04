<?php

namespace App\Http\Controllers\API\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermohonanPindah extends Controller
{
    public function store(Request $request)
    {

        $id_warga = auth('sanctum')->user()->id_warga;

        $permohonanSurat = \App\Models\SuratPengajuan::create([
            'id_warga' => $id_warga,
            'jenis_surat' => 'Surat Keterangan Pindah',
            'tanggal' => date('Y-m-d'),
        ]);

        $data = \App\Models\SuratKetPindah::create([
            'id_permohonan_surat' => $permohonanSurat->id_permohonan_surat,
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'alasan_pindah' => $request->alasan_pindah,
            'lainnya' => $request->lainnya,
            'alamat_tujuan' => $request->alamat_tujuan,
            'shdk' => $request->shdk,
            'pengantar_rt' => $request->pengantar_rt,
            'foto_ktp' => $request->foto_ktp,
            'foto_kk' => $request->foto_kk,
        ]);

        if ($request->hasFile('foto_ktp')) {
            $request->file('foto_ktp')->move('berkaspemohon/', $request->file('foto_ktp')->getClientOriginalName());
            $data->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();
            $data->save();
        }
        if ($request->hasFile('foto_kk')) {
            $request->file('foto_kk')->move('berkaspemohon/', $request->file('foto_kk')->getClientOriginalName());
            $data->foto_kk = $request->file('foto_kk')->getClientOriginalName();
            $data->save();
        }
        if ($request->hasFile('pengantar_rt')) {
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
            $data->save();
        }

        return response()->json([
            'message' => 'Permohonan Surat Berhasil Dibuat!',
            'data' => $data
        ]);
    }
    public function edit($id)
    {
        $data = \App\Models\SuratKetPindah::where('surat_ket_pindah.id_permohonan_surat', $id)
            ->join('permohonan_surat', 'surat_ket_pindah.id_permohonan_surat', '=', 'permohonan_surat.id_permohonan_surat')
            ->join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->select('permohonan_surat.*', 'surat_ket_pindah.*', 'warga.*')
            ->first();

        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = \App\Models\SuratKetPindah::find($id);
        $data->update($request->except(['keterangan_warga']));

        if ($request->hasFile('foto_ktp')) {
            $request->file('foto_ktp')->move('berkaspemohon/', $request->file('foto_ktp')->getClientOriginalName());
            $data->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();
            $data->save();
        }
        if ($request->hasFile('foto_kk')) {
            $request->file('foto_kk')->move('berkaspemohon/', $request->file('foto_kk')->getClientOriginalName());
            $data->foto_kk = $request->file('foto_kk')->getClientOriginalName();
            $data->save();
        }
        if ($request->hasFile('pengantar_rt')) {
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
            $data->save();
        }
        if ($data->alasan_pindah !== 'Lainnya') {
            $lainnya = \App\Models\SuratKetPindah::find($id);
            $lainnya->update([
                'lainnya' => null
            ]);
        }

        $keteranganWarga = $request->input('keterangan_warga');
        $idPermohonanSurat = $data->id_permohonan_surat;
        if ($keteranganWarga != null) {

            $suratPengajuan = \App\Models\SuratPengajuan::find($idPermohonanSurat);

            $suratPengajuan->update([
                'keterangan_warga' => $request->keterangan_warga,
            ]);
        }

        return response()->json([
            'message' => 'Data Permohonan Surat Berhasil Diubah!',
            'data' => $data
        ]);
    }
}