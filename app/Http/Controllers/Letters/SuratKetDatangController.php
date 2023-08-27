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
        $data = \App\Models\SuratKetPindahDatang::find($id);
        return view('users.detailsuratpindah_datang', compact('data'));
    }
    public function update(Request $request, $id){
        $data = \App\Models\SuratKetPindahDatang::find($id);
        $data->update($request->all());
        if ($request->hasFile('foto_surat_ket_pindah_capil'))
            {
            $request->file('foto_surat_ket_pindah_capil')->move('berkaspemohon/', $request->file('foto_surat_ket_pindah_capil')->getClientOriginalName());
            $data->foto_surat_ket_pindah_capil = $request->file('foto_surat_ket_pindah_capil')->getClientOriginalName();
            $data->save();
            }
        return redirect()->route('surat.warga')->with('success', 'Sukses Edit Data Surat!');
    }
}