<?php

namespace App\Http\Controllers\API\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermohonanKTP extends Controller
{
    //
    public function store(Request $request)
    {
        $id_warga = auth('sanctum')->user()->id_warga;
        $permohonanSurat = \App\Models\SuratPengajuan::create([
            'id_warga' => $id_warga,
            'jenis_surat' => 'Surat Pengantar KTP',
            'tanggal' => date('Y-m-d'),
        ]);

        $data = \App\Models\KTP::create([
            'id_permohonan_surat' => $permohonanSurat->id_permohonan_surat,
            'jenis_permohonan' => $request->jenis_permohonan,
            // 'kk' => $request->kk,
            'foto_ktp' => $request->foto_ktp,
            'foto_kk' => $request->foto_kk,
            'pengantar_rt' => $request->pengantar_rt,
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

        if (!$data) {
            return response()->json([
                'message' => 'Data gagal dikirim',
                'data' => null
            ]);
        }

        return response()->json([
            'message' => 'Permohonan Surat Berhasil Dibuat!',
            'data' => $data
        ]);
    }
    public function edit($id)
    {
        $data = \App\Models\KTP::where('surat_peng_ktp.id_permohonan_surat', $id)
            ->join('permohonan_surat', 'surat_peng_ktp.id_permohonan_surat', '=', 'permohonan_surat.id_permohonan_surat')
            ->join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->select('permohonan_surat.*', 'surat_peng_ktp.*', 'warga.*')
            ->first();

        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = \App\Models\KTP::find($id);
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

        $keteranganWarga = $request->input('keterangan_warga');
        $idPermohonanSurat = $data->id_permohonan_surat;
        if ($keteranganWarga != null) {

            $suratPengajuan = \App\Models\SuratPengajuan::find($idPermohonanSurat);

            $suratPengajuan->update([
                'keterangan_warga' => $request->keterangan_warga,
            ]);
        }

        return response()->json([
            'message' => 'Data berhasil diubah',
            'data' => $data
        ]);
    }
}