<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratKetUsahaController extends Controller
{
    //
    public function create() {
        return view('form.form_surat_ket_usaha');
    }
    public function store(Request $request) {
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

        if ($request->hasFile('fc_ktp'))
            {
            $request->file('fc_ktp')->move('berkaspemohon/', $request->file('fc_ktp')->getClientOriginalName());
            $data->fc_ktp = $request->file('fc_ktp')->getClientOriginalName();
            $data->save();
            }
        if ($request->hasFile('fc_kk'))
            {
            $request->file('fc_kk')->move('berkaspemohon/', $request->file('fc_kk')->getClientOriginalName());
            $data->fc_kk = $request->file('fc_kk')->getClientOriginalName();
            $data->save();
            };
        if ($request->hasFile('foto_usaha'))
            {
            $request->file('foto_usaha')->move('berkaspemohon/', $request->file('foto_usaha')->getClientOriginalName());
            $data->foto_usaha = $request->file('foto_usaha')->getClientOriginalName();
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
            'jenis_surat' => 'Surat Keterangan Usaha',
            'id_surat' => $data->id_surat_ket_usaha,
        ]);
        
        // return dd($data);
        return redirect()->route('surat.warga')->with('success', 'Data Berhasil Dikirim'); 
    }

    public function show($id){
        $data = \App\Models\SuratKetUsaha::find($id);
        return view('users.detailsuratusaha', compact('data'));
    }

    public function update(Request $request, $id) {
        $data = \App\Models\SuratKetUsaha::find($id);
        $data->update($request->all());
        
        if ($request->hasFile('fc_ktp'))
            {
            $request->file('fc_ktp')->move('berkaspemohon/', $request->file('fc_ktp')->getClientOriginalName());
            $data->fc_ktp = $request->file('fc_ktp')->getClientOriginalName();
            $data->save();
            }
        if ($request->hasFile('fc_kk'))
            {
            $request->file('fc_kk')->move('berkaspemohon/', $request->file('fc_kk')->getClientOriginalName());
            $data->fc_kk = $request->file('fc_kk')->getClientOriginalName();
            $data->save();
            };
        if ($request->hasFile('foto_usaha'))
            {
            $request->file('foto_usaha')->move('berkaspemohon/', $request->file('foto_usaha')->getClientOriginalName());
            $data->foto_usaha = $request->file('foto_usaha')->getClientOriginalName();
            $data->save();
            };
        if ($request->hasFile('pengantar_rt'))
            {
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
            $data->save();
            };
 
        return redirect()->route('surat.warga')->with('success', 'Sukses Edit Data Surat!');
    }
}