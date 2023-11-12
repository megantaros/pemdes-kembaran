<?php

namespace App\Http\Controllers\API\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermohonanPindah extends Controller
{
    public function store(Request $request)
    {

        $id_warga = auth('sanctum')->user()->id_warga;

        $data = \App\Models\SuratKetPindah::create([
            'id_warga' => $id_warga,
            'kk' => $request->kk,
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'alasan_pindah' => $request->alasan_pindah,
            'lainnya' => $request->lainnya,
            'alamat_tujuan' => $request->alamat_tujuan,
            'jml_angg_pindah' => $request->jml_angg_pindah,
            'pengantar_rt' => $request->pengantar_rt,
            'shdk' => $request->shdk,
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
        ;

        \App\Models\SuratPengajuan::create([
            'id_warga' => $data->id_warga,
            'jenis_surat' => 'Surat Keterangan Pindah',
            'id_surat' => $data->id_surat_ket_pindah,
        ]);

        return response()->json([
            'message' => 'Data berhasil dikirim',
            'data' => $data
        ]);
    }
    public function edit($id)
    {
        $data = \App\Models\SuratPengajuan::where('id_surat', $id)
            ->join('surat_ket_pindah', 'surat_pengajuan.id_surat', '=', 'surat_ket_pindah.id_surat_ket_pindah')
            ->join('warga', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
            ->where('surat_pengajuan.jenis_surat', 'Surat Keterangan Pindah')
            ->select('surat_pengajuan.*', 'surat_ket_pindah.*', 'warga.nama_warga', 'warga.nik', 'warga.alamat')
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

        if ($keteranganWarga != null) {

            $suratPengajuan = \App\Models\SuratPengajuan::where('id_surat', $id)
                ->where('jenis_surat', 'Surat Keterangan Pindah')
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