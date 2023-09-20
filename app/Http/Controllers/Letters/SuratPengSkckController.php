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
            'id_warga' => 'required|unique:surat_peng_skck|max:1',
            // 'nik' => 'required',
            'kk' => 'required',
            'fc_ktp' => 'required|image',
            'pengantar_rt' => 'required|image'
        ]);

        $data = \App\Models\Skck::create($request->all());
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
        // dd($data);

        \App\Models\SuratPengajuan::create([
            'id_warga' => $request->id_warga,
            'jenis_surat' => 'Surat Pengantar SKCK',
            'id_surat' => $data->id_surat_peng_skck,
        ]);

        return redirect()->route('surat.warga')->with('success', 'Data Berhasil Dikirim');
    }

    public function show($id)
    {

        $data = \App\Models\SuratPengajuan::where('id_surat', $id)
            ->join('surat_peng_skck', 'surat_pengajuan.id_surat', '=', 'surat_peng_skck.id_surat_peng_skck')
            ->join('warga', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
            ->where('surat_pengajuan.jenis_surat', 'Surat Pengantar SKCK')
            ->select('surat_pengajuan.*', 'surat_peng_skck.*', 'warga.nama_warga', 'warga.nik', 'warga.alamat')
            ->first();

        return view('admin.detailsuratskck', compact('data'));
        // $data->tanggal_surat = date('d-m-Y', strtotime($data->tanggal_surat));
        // dd($data);
    }
    public function edit($id)
    {

        $data = \App\Models\SuratPengajuan::where('id_surat', $id)
            ->join('surat_peng_skck', 'surat_pengajuan.id_surat', '=', 'surat_peng_skck.id_surat_peng_skck')
            ->join('warga', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
            ->where('surat_pengajuan.jenis_surat', 'Surat Pengantar SKCK')
            ->select('surat_pengajuan.*', 'surat_peng_skck.*', 'warga.nama_warga', 'warga.nik', 'warga.alamat')
            ->first();

        return view('users.detailsuratskck', compact('data'));
        // $data->tanggal_surat = date('d-m-Y', strtotime($data->tanggal_surat));
        // dd($data);
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

        // dd($data);
        return redirect()->back()->with('success', 'Sukses Edit Data Surat!');
    }
}