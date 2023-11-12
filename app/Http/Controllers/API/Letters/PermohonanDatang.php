<?php

namespace App\Http\Controllers\API\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermohonanDatang extends Controller
{
    public function store(Request $request)
    {
        $id_warga = auth('sanctum')->user()->id_warga;

        $data = \App\Models\SuratKetPindahDatang::create([
            'id_warga' => $id_warga,
            'foto_surat_ket_pindah_capil' => $request->foto_surat_ket_pindah_capil,
        ]);

        if ($request->hasFile('foto_surat_ket_pindah_capil')) {
            $request->file('foto_surat_ket_pindah_capil')->move('berkaspemohon/', $request->file('foto_surat_ket_pindah_capil')->getClientOriginalName());
            $data->foto_surat_ket_pindah_capil = $request->file('foto_surat_ket_pindah_capil')->getClientOriginalName();
            $data->save();
        }

        \App\Models\SuratPengajuan::create([
            'id_warga' => $data->id_warga,
            'jenis_surat' => 'Surat Keterangan Pindah Datang',
            'id_surat' => $data->id_surat_ket_pindah_datang,
        ]);

        return response()->json([
            'message' => 'Data berhasil dikirim',
            'data' => $data
        ]);
    }

    public function edit($id)
    {
        $data = \App\Models\SuratPengajuan::where('id_surat', $id)
            ->join('surat_ket_pindah_datang', 'surat_pengajuan.id_surat', '=', 'surat_ket_pindah_datang.id_surat_ket_pindah_datang')
            ->join('warga', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
            ->where('surat_pengajuan.jenis_surat', 'Surat Keterangan Pindah Datang')
            ->select('surat_pengajuan.*', 'surat_ket_pindah_datang.*', 'warga.nama_warga', 'warga.nik', 'warga.alamat')
            ->first();

        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
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

        if ($keteranganWarga != null) {

            $suratPengajuan = \App\Models\SuratPengajuan::where('id_surat', $id)
                ->where('jenis_surat', 'Surat Keterangan Pindah Datang')
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