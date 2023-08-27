<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratPengKtpController extends Controller
{
    //
    public function create() {
        return view('form.form_surat_peng_ktp');
    }
    public function store(Request $request){
        $this->validate($request, [
            'id_warga' => 'required',
            'foto_ktp' => 'required|image',
            'foto_kk' => 'required|image',
            'pengantar_rt' => 'required|image'
        ]);
        $data = \App\Models\KTP::create($request->all());
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
        
        \App\Models\SuratPengajuan::create([
            'id_warga' => $request->id_warga,
            'jenis_surat' => 'Surat Pengantar KTP',
            'id_surat' => $data->id_surat_peng_ktp,
        ]);

        // return dd($data);
        return redirect()->route('surat.warga')->with('success', 'Data Berhasil Dikirim');   
    }
    public function show($id) {
        $data = \App\Models\KTP::findOrFail($id);

        return view('users.detailsuratktp', compact('data'));
    }
    public function update(Request $request, $id) {
        $data = \App\Models\KTP::find($id);
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
            
        return redirect('/profil/suratsaya')->with('success', 'Sukses Edit Data Surat!');
    }
}