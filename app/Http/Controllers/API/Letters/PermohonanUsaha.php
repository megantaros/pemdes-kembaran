<?php

namespace App\Http\Controllers\API\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermohonanUsaha extends Controller
{
    public function store(Request $request)
    {
        $id_warga = auth('sanctum')->user()->id_warga;

        $data = \App\Models\SuratKetUsaha::create([
            'id_warga' => $id_warga,
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

        \App\Models\SuratPengajuan::create([
            'id_warga' => $data->id_warga,
            'jenis_surat' => 'Surat Keterangan Usaha',
            'id_surat' => $data->id_surat_ket_usaha,
        ]);

        return response()->json([
            'message' => 'Data berhasil dikirim',
            'data' => $data
        ]);
    }

    public function edit($id)
    {
        $data = \App\Models\SuratPengajuan::where('id_surat', $id)
            ->join('surat_ket_usaha', 'surat_pengajuan.id_surat', '=', 'surat_ket_usaha.id_surat_ket_usaha')
            ->join('warga', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
            ->where('surat_pengajuan.jenis_surat', 'Surat Keterangan Usaha')
            ->select('surat_pengajuan.*', 'surat_ket_usaha.*', 'warga.nama_warga', 'warga.nik', 'warga.alamat')
            ->first();

        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
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

        if ($keteranganWarga != null) {

            $suratPengajuan = \App\Models\SuratPengajuan::where('id_surat', $id)
                ->where('jenis_surat', 'Surat Keterangan Usaha')
                ->first();

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