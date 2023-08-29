<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratKetDatangController extends Controller
{
    //
    public function create() {
        return view('form.form_surat_ket_pindah_datang');
    }
    public function store(Request $request) {
        $request->validate([
            'id_warga' => 'required',
            'foto_surat_ket_pindah_capil' => 'required|image',
        ]);

        $data = \App\Models\SuratKetPindahDatang::create($request->all());

        if ($request->hasFile('foto_surat_ket_pindah_capil'))
            {
            $request->file('foto_surat_ket_pindah_capil')->move('berkaspemohon/', $request->file('foto_surat_ket_pindah_capil')->getClientOriginalName());
            $data->foto_surat_ket_pindah_capil = $request->file('foto_surat_ket_pindah_capil')->getClientOriginalName();
            $data->save();
            }
        
        \App\Models\SuratPengajuan::create([
            'id_warga' => $request->id_warga,
            'jenis_surat' => 'Surat Keterangan Pindah Datang',
            'id_surat' => $data->id_surat_ket_pindah_datang,
        ]);

        return redirect()->route('surat.warga')->with('success', 'Data Berhasil Dikirim');   
    }
    public function show($id){
        $data = \App\Models\SuratPengajuan::where('id_surat', $id)
            ->join('surat_ket_pindah_datang', 'surat_pengajuan.id_surat', '=', 'surat_ket_pindah_datang.id_surat_ket_pindah_datang')
            ->join('warga', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
            ->where('surat_pengajuan.jenis_surat', 'Surat Keterangan Pindah Datang')
            ->select('surat_pengajuan.*', 'surat_ket_pindah_datang.*', 'warga.name', 'warga.nik', 'warga.alamat')
            ->first();   

        return view('users.detailsuratpindah_datang', compact('data'));
    }
    public function update(Request $request, $id){
        $data = \App\Models\SuratKetPindahDatang::find($id);
        $data->update($request->except(['keterangan_warga']));

        if ($request->hasFile('foto_surat_ket_pindah_capil'))
            {
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

        return redirect()->back()->with('success', 'Sukses Edit Data Surat!');
    }
}