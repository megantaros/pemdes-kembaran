<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratKetDomisiliController extends Controller
{
    //
    public function create()
    {
        return view('form.form_surat_ket_domisili');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_warga' => 'required',
            // 'kk' => 'required',
            'alamat_domisili' => 'required',
            'fc_ktp' => 'required|image',
            'fc_kk' => 'required|image',
            'pengantar_rt' => 'required|image',
            'foto_lokasi' => 'required|image'
        ]);

        $permohonanSurat = \App\Models\SuratPengajuan::create([
            'id_warga' => $request->id_warga,
            'jenis_surat' => 'Surat Keterangan Domisili',
            'tanggal' => date('Y-m-d'),
        ]);

        $data = \App\Models\Domisili::create([
            'id_permohonan_surat' => $permohonanSurat->id_permohonan_surat,
            // 'kk' => $request->kk,
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
        ;
        if ($request->hasFile('foto_lokasi')) {
            $request->file('foto_lokasi')->move('berkaspemohon/', $request->file('foto_lokasi')->getClientOriginalName());
            $data->foto_lokasi = $request->file('foto_lokasi')->getClientOriginalName();
            $data->save();
        }
        ;
        if ($request->hasFile('pengantar_rt')) {
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
            $data->save();
        }
        ;
        // return dd($data);

        return redirect()->route('surat.warga')->with('success', 'Data Berhasil Dikirim');
    }

    public function show($id)
    {
        $data = \App\Models\SuratPengajuan::where('permohonan_surat.id_permohonan_surat', $id)
            ->join('surat_ket_domisili', 'permohonan_surat.id_permohonan_surat', '=', 'surat_ket_domisili.id_permohonan_surat')
            ->join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->where('permohonan_surat.jenis_surat', 'Surat Keterangan Domisili')
            ->select('permohonan_surat.*', 'surat_ket_domisili.*', 'warga.*')
            ->first();

        return view('admin.detailsuratdomisili', compact('data'));
    }
    public function edit($id)
    {
        $data = \App\Models\Domisili::where('surat_ket_domisili.id_permohonan_surat', $id)
            ->join('permohonan_surat', 'surat_ket_domisili.id_permohonan_surat', '=', 'permohonan_surat.id_permohonan_surat')
            ->join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->select('permohonan_surat.*', 'surat_ket_domisili.*', 'warga.*')
            ->first();

        return view('users.detailsuratdomisili', compact('data'));
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