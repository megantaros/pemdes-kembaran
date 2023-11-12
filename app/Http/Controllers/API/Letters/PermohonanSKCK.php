<?php

namespace App\Http\Controllers\API\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermohonanSKCK extends Controller
{
    public function store(Request $request)
    {
        $id_warga = auth('sanctum')->user()->id_warga;

        $data = \App\Models\Skck::create([
            'id_warga' => $id_warga,
            'kk' => $request->kk,
            'kewarganegaraan' => $request->kewarganegaraan,
            'keperluan' => $request->keperluan,
            'pengantar_rt' => $request->pengantar_rt,
            'fc_ktp' => $request->fc_ktp,
        ]);

        if ($request->hasFile('fc_ktp')) {
            $request->file('fc_ktp')->move('berkaspemohon/', $request->file('fc_ktp')->getClientOriginalName());
            $data->fc_ktp = $request->file('fc_ktp')->getClientOriginalName();
            $data->save();
        }

        if ($request->hasFile('pengantar_rt')) {
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
            $data->save();
        }

        \App\Models\SuratPengajuan::create([
            'id_warga' => $data->id_warga,
            'jenis_surat' => 'Surat Pengantar SKCK',
            'id_surat' => $data->id_surat_peng_skck,
        ]);

        return response()->json([
            'message' => 'Data berhasil dikirim',
            'data' => $data
        ]);
    }
    public function edit($id)
    {

        $data = \App\Models\SuratPengajuan::where('id_surat', $id)
            ->join('surat_peng_skck', 'surat_pengajuan.id_surat', '=', 'surat_peng_skck.id_surat_peng_skck')
            ->join('warga', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
            ->where('surat_pengajuan.jenis_surat', 'Surat Pengantar SKCK')
            ->select('surat_pengajuan.*', 'surat_peng_skck.*', 'warga.nama_warga', 'warga.nik', 'warga.alamat')
            ->first();

        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = \App\Models\Skck::find($id);
        $data->update($request->except(['keterangan_warga']));


        if ($request->hasFile('fc_ktp')) {
            $request->file('fc_ktp')->move('berkaspemohon/', $request->file('fc_ktp')->getClientOriginalName());
            $data->fc_ktp = $request->file('fc_ktp')->getClientOriginalName();
            $data->save();
        }
        if ($request->hasFile('pengantar_rt')) {
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
            $data->save();
        }
        ;

        $keteranganWarga = $request->input('keterangan_warga');

        if ($keteranganWarga != null) {

            $suratPengajuan = \App\Models\SuratPengajuan::where('id_surat', $id)
                ->where('jenis_surat', 'Surat Pengantar SKCK')
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