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

        $data = \App\Models\KTP::create([
            'id_warga' => $id_warga,
            'jenis_permohonan' => $request->jenis_permohonan,
            'kk' => $request->kk,
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
        ;
        if ($request->hasFile('pengantar_rt')) {
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
            $data->save();
        }
        ;

        \App\Models\SuratPengajuan::create([
            'id_warga' => $data->id_warga,
            'jenis_surat' => 'Surat Pengantar KTP',
            'id_surat' => $data->id_surat_peng_ktp,
        ]);

        if (!$data) {
            return response()->json([
                'message' => 'Data gagal dikirim',
                'data' => null
            ]);
        }

        return response()->json([
            'message' => 'Data berhasil dikirim',
            'data' => $data
        ]);
    }
    public function edit($id)
    {

        $data = \App\Models\SuratPengajuan::where('id_surat', $id)
            ->join('surat_peng_ktp', 'surat_pengajuan.id_surat', '=', 'surat_peng_ktp.id_surat_peng_ktp')
            ->join('warga', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
            ->where('surat_pengajuan.jenis_surat', 'Surat Pengantar KTP')
            ->select('surat_pengajuan.*', 'surat_peng_ktp.*', 'warga.nama_warga', 'warga.nik', 'warga.alamat')
            ->first();

        // $data->tanggal_surat = date('d-m-Y', strtotime($data->tanggal_surat));
        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = \App\Models\KTP::find($id);
        $data->update($request->except([
            'keterangan_warga'
        ]));

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
        if ($request->hasFile('pengantar_rt')) {
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
            $data->save();
        }
        ;

        $keteranganWarga = $request->input('keterangan_warga');

        if ($keteranganWarga != null) {

            $suratPengajuan = \App\Models\SuratPengajuan::where('id_surat', $id)
                ->where('jenis_surat', 'Surat Pengantar KTP')
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