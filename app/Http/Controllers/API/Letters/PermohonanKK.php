<?php

namespace App\Http\Controllers\API\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermohonanKK extends Controller
{
    public function store(Request $request)
    {

        $id_warga = auth('sanctum')->user()->id_warga;

        $data = \App\Models\SuratPengKk::create([
            'id_warga' => $id_warga,
            'kk_lama' => $request->kk_lama,
            'shdk' => $request->shdk,
            'alasan_permohonan' => $request->alasan_permohonan,
            'jml_angg_keluarga' => $request->jml_angg_keluarga,
            'pengantar_rt' => $request->pengantar_rt,
            'foto_ktp' => $request->foto_ktp,
            'foto_kk' => $request->foto_kk,
            'fc_buku_nikah' => $request->fc_buku_nikah,
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
        ;
        if ($request->hasFile('fc_buku_nikah')) {
            $request->file('fc_buku_nikah')->move('berkaspemohon/', $request->file('fc_buku_nikah')->getClientOriginalName());
            $data->fc_buku_nikah = $request->file('fc_buku_nikah')->getClientOriginalName();
            $data->save();
        }
        ;
        if ($request->hasFile('pengantar_rt')) {
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
            $data->save();
        }

        \App\Models\SuratPengajuan::create([
            'id_warga' => $data->id_warga,
            'jenis_surat' => 'Surat Pengantar KK',
            'id_surat' => $data->id_surat_peng_kk,
        ]);

        return response()->json([
            'message' => 'Data berhasil dikirim',
            'data' => $data
        ]);
    }

    public function edit($id)
    {
        $data = \App\Models\SuratPengajuan::where('id_surat', $id)
            ->join('surat_peng_kk', 'surat_pengajuan.id_surat', '=', 'surat_peng_kk.id_surat_peng_kk')
            ->join('warga', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
            ->where('surat_pengajuan.jenis_surat', 'Surat Pengantar KK')
            ->select('surat_pengajuan.*', 'surat_peng_kk.*', 'warga.nama_warga', 'warga.nik', 'warga.alamat')
            ->first();

        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }
    // $rules = [
    //     'kk_lama' => 'required',
    //     'shdk' => 'required',
    //     'alasan_permohonan' => 'required',
    //     'jml_angg_keluarga' => 'required',
    //     'pengantar_rt' => 'required',
    //     'foto_ktp' => 'required',
    //     'foto_kk' => 'required',
    //     'fc_buku_nikah' => 'required',
    // ];

    // $validator = \Validator::make($request->all(), $rules);
    // if ($validator->fails()) {
    //     return response()->json([
    //         'message' => 'Data gagal diubah',
    //         'data' => $validator->errors()
    //     ]);
    // }
    public function update(Request $request, $id)
    {

        $data = \App\Models\SuratPengKk::find($id);
        $data->update($request->all());

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
        if ($request->hasFile('fc_buku_nikah')) {
            $request->file('fc_buku_nikah')->move('berkaspemohon/', $request->file('fc_buku_nikah')->getClientOriginalName());
            $data->fc_buku_nikah = $request->file('fc_buku_nikah')->getClientOriginalName();
            $data->save();
        }

        return response()->json([
            'message' => 'Data berhasil diubah',
            'data' => $data
        ]);
    }
}