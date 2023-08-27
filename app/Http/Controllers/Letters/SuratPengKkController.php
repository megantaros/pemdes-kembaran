<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratPengKkController extends Controller
{
    //
    public function create() {
        return view('form.form_surat_peng_kk');
    }
    public function store(Request $request){
        $this->validate($request, [
            'id_warga' => 'required|unique:surat_peng_kk|max:1',
            'kk_lama' => 'required',
            'jml_angg_keluarga' => 'required',
            'foto_ktp' => 'required|image',
            'foto_kk' => 'required|image',
            'fc_buku_nikah' => 'required|image',
            'pengantar_rt' => 'required|image',
        ]);
        $data = \App\Models\SuratPengKk::create($request->all());
        if ($request->hasFile('foto_ktp'))
            {
            $request->file('foto_ktp')->move('berkaspemohon/', $request->file('foto_ktp')->getClientOriginalName());
            $data->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();
            $data->save();
            }
        if ($request->hasFile('foto_kk'))
            {
            $request->file('foto_kk')->move('berkaspemohon/', $request->file('foto_kk')->getClientOriginalName());
            $data->foto_kk = $request->file('foto_kk')->getClientOriginalName();
            $data->save();
            };
        if ($request->hasFile('fc_buku_nikah'))
            {
            $request->file('fc_buku_nikah')->move('berkaspemohon/', $request->file('fc_buku_nikah')->getClientOriginalName());
            $data->fc_buku_nikah = $request->file('fc_buku_nikah')->getClientOriginalName();
            $data->save();
            };
        if ($request->hasFile('pengantar_rt'))
            {
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
            $data->save();
            };

        \App\Models\SuratPengajuan::create([
            'id_warga' => $request->id_warga,
            'jenis_surat' => 'Surat Pengantar KK',
            'id_surat' => $data->id_surat_peng_kk,
        ]);
        // dd($data);

        return redirect()->route('surat.warga')->with('success', 'Data Berhasil Dikirim');   
    }
    public function show($id) {
        $data = \App\Models\SuratPengKk::find($id)->firstOrFail();
        return view('users.detailsuratkk', compact('data'));
        // dd($data);
    }
    public function edit(Request $request, $id){
        $data = \App\Models\SuratPengKk::find($id);
        $data->update($request->all());
        if ($request->hasFile('foto_ktp'))
            {
            $request->file('foto_ktp')->move('berkaspemohon/', $request->file('foto_ktp')->getClientOriginalName());
            $data->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();
            $data->save();
            }
        if ($request->hasFile('foto_kk'))
            {
            $request->file('foto_kk')->move('berkaspemohon/', $request->file('foto_kk')->getClientOriginalName());
            $data->foto_kk = $request->file('foto_kk')->getClientOriginalName();
            $data->save();
            };
        if ($request->hasFile('pengantar_rt'))
            {
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
            $data->save();
            };
        if ($request->hasFile('fc_buku_nikah'))
            {
            $request->file('fc_buku_nikah')->move('berkaspemohon/', $request->file('fc_buku_nikah')->getClientOriginalName());
            $data->fc_buku_nikah = $request->file('fc_buku_nikah')->getClientOriginalName();
            $data->save();
            };
        return redirect('/profil/suratsaya')->with('success', 'Sukses Edit Data Surat!');
    }
}