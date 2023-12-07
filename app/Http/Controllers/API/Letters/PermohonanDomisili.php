<?php

namespace App\Http\Controllers\API\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermohonanDomisili extends Controller
{
    public function store(Request $request)
    {
        $id_warga = auth('sanctum')->user()->id_warga;
        $permohonanSurat = \App\Models\SuratPengajuan::create([
            'id_warga' => $id_warga,
            'jenis_surat' => 'Surat Keterangan Domisili',
            'tanggal' => date('Y-m-d'),
        ]);

        $data = \App\Models\Domisili::create([
            'id_permohonan_surat' => $permohonanSurat->id_permohonan_surat,
            'alamat_domisili' => $request->alamat_domisili,
            'pengantar_rt' => $request->pengantar_rt,
            'fc_ktp' => $request->fc_ktp,
            'fc_kk' => $request->fc_kk,
            'foto_lokasi' => $request->foto_lokasi,
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

        if ($request->hasFile('foto_lokasi')) {
            $request->file('foto_lokasi')->move('berkaspemohon/', $request->file('foto_lokasi')->getClientOriginalName());
            $data->foto_lokasi = $request->file('foto_lokasi')->getClientOriginalName();
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
        $data = \App\Models\Domisili::where('surat_ket_domisili.id_permohonan_surat', $id)
            ->join('permohonan_surat', 'surat_ket_domisili.id_permohonan_surat', '=', 'permohonan_surat.id_permohonan_surat')
            ->join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->select('permohonan_surat.*', 'surat_ket_domisili.*', 'warga.*')
            ->first();

        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = \App\Models\Domisili::find($id);
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
        if ($request->hasFile('foto_lokasi')) {
            $request->file('foto_lokasi')->move('berkaspemohon/', $request->file('foto_lokasi')->getClientOriginalName());
            $data->foto_lokasi = $request->file('foto_lokasi')->getClientOriginalName();
            $data->save();
        }
        if ($request->hasFile('pengantar_rt')) {
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
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
            'message' => 'Permohonan Surat Berhasil Diubah!',
            'data' => $data
        ]);
    }
}