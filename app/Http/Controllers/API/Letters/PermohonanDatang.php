<?php

namespace App\Http\Controllers\API\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermohonanDatang extends Controller
{
    public function store(Request $request)
    {
        $id_warga = auth('sanctum')->user()->id_warga;
        $permohonanSurat = \App\Models\SuratPengajuan::create([
            'id_warga' => $id_warga,
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

        return response()->json([
            'message' => 'Permohonan Surat Berhasil Dibuat!',
            'data' => $data
        ]);
    }

    public function edit($id)
    {
        $data = \App\Models\SuratKetPindahDatang::where('surat_ket_pindah_datang.id_permohonan_surat', $id)
            ->join('permohonan_surat', 'surat_ket_pindah_datang.id_permohonan_surat', '=', 'permohonan_surat.id_permohonan_surat')
            ->join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->select('permohonan_surat.*', 'surat_ket_pindah_datang.*', 'warga.*')
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

        $keteranganWarga = $request->keterangan_warga;
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