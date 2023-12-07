<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratPengSkckController extends Controller
{
    //
    public function create()
    {
        return view('form.form_surat_peng_skck');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_warga' => 'required',
            'fc_ktp' => 'required|image',
            'pengantar_rt' => 'required|image'
        ]);

        $permohonanSurat = \App\Models\SuratPengajuan::create([
            'id_warga' => $request->id_warga,
            'jenis_surat' => 'Surat Pengantar SKCK',
            'tanggal' => date('Y-m-d'),
        ]);

        $data = \App\Models\Skck::create([
            'id_permohonan_surat' => $permohonanSurat->id_permohonan_surat,
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

        return redirect()->route('surat.warga')->with('success', 'Data Berhasil Dikirim');
    }

    public function show($id)
    {

        $data = \App\Models\SuratPengajuan::where('permohonan_surat.id_permohonan_surat', $id)
            ->join('surat_peng_skck', 'permohonan_surat.id_permohonan_surat', '=', 'surat_peng_skck.id_permohonan_surat')
            ->join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->where('permohonan_surat.jenis_surat', 'Surat Pengantar SKCK')
            ->select('permohonan_surat.*', 'surat_peng_skck.*', 'warga.*')
            ->first();

        return view('admin.detailsuratskck', compact('data'));
    }
    public function edit($id)
    {

        $data = \App\Models\Skck::where('surat_peng_skck.id_permohonan_surat', $id)
            ->join('permohonan_surat', 'surat_peng_skck.id_permohonan_surat', '=', 'permohonan_surat.id_permohonan_surat')
            ->join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->select('permohonan_surat.*', 'surat_peng_skck.*', 'warga.*')
            ->first();

        return view('users.detailsuratskck', compact('data'));
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

        $keteranganWarga = $request->input('keterangan_warga');
        $idPermohonanSurat = $data->id_permohonan_surat;
        if ($keteranganWarga != null) {
            $suratPengajuan = \App\Models\SuratPengajuan::find($idPermohonanSurat);

            $suratPengajuan->update([
                'keterangan_warga' => $keteranganWarga,
            ]);
        }

        return redirect()->back()->with('success', 'Sukses Edit Data Surat!');
    }
}