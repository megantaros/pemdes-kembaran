<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratKetUsahaController extends Controller
{
    //
    public function create()
    {
        return view('form.form_surat_ket_usaha');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_warga' => 'required',
            'jenis_usaha' => 'required',
            'tempat_usaha' => 'required',
            'fc_ktp' => 'required|image',
            'fc_kk' => 'required|image',
            'foto_usaha' => 'required|image',
            'pengantar_rt' => 'required|image'
        ]);

        $data = \App\Models\SuratKetUsaha::create($request->all());

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

        \App\Models\SuratPengajuan::create([
            'id_warga' => $request->id_warga,
            'jenis_surat' => 'Surat Keterangan Usaha',
            'id_surat' => $data->id_surat_ket_usaha,
        ]);

        // return dd($data);
        return redirect()->route('surat.warga')->with('success', 'Data Berhasil Dikirim');
    }

    public function show($id)
    {
        $data = \App\Models\SuratPengajuan::where('id_surat', $id)
            ->join('surat_ket_usaha', 'surat_pengajuan.id_surat', '=', 'surat_ket_usaha.id_surat_ket_usaha')
            ->join('warga', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
            ->where('surat_pengajuan.jenis_surat', 'Surat Keterangan Usaha')
            ->select('surat_pengajuan.*', 'surat_ket_usaha.*', 'warga.nama_warga', 'warga.nik', 'warga.alamat')
            ->first();

        return view('admin.detailsuratusaha', compact('data'));
    }
    public function edit($id)
    {
        $data = \App\Models\SuratPengajuan::where('id_surat', $id)
            ->join('surat_ket_usaha', 'surat_pengajuan.id_surat', '=', 'surat_ket_usaha.id_surat_ket_usaha')
            ->join('warga', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
            ->where('surat_pengajuan.jenis_surat', 'Surat Keterangan Usaha')
            ->select('surat_pengajuan.*', 'surat_ket_usaha.*', 'warga.nama_warga', 'warga.nik', 'warga.alamat')
            ->first();

        return view('users.detailsuratusaha', compact('data'));
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

        return redirect()->back()->with('success', 'Sukses Edit Data Surat!');
    }
}