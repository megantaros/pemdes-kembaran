<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratPengSkckController extends Controller
{
    //
    public function create() {
        return view('form.form_surat_peng_skck');
    }
    public function store(Request $request) {
        $this->validate($request, [
            'id_warga' => 'required|unique:surat_peng_skck|max:1',
            // 'nik' => 'required',
            'kk' => 'required',
            'fc_ktp' => 'required|image',
            'pengantar_rt' => 'required|image'
        ]);

        $data = \App\Models\Skck::create($request->all());
            if ($request->hasFile('fc_ktp'))
                {
                $request->file('fc_ktp')->move('berkaspemohon/', $request->file('fc_ktp')->getClientOriginalName());
                $data->fc_ktp = $request->file('fc_ktp')->getClientOriginalName();
                $data->save();
                }
            if ($request->hasFile('pengantar_rt'))
                {
                $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
                $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
                $data->save();
                };
                // dd($data);
            
            \App\Models\SuratPengajuan::create([
                'id_warga' => $request->id_warga,
                'jenis_surat' => 'Surat Pengantar SKCK',
                'id_surat' => $data->id_surat_peng_skck,
            ]);

            return redirect()->route('surat.warga')->with('success', 'Data Berhasil Dikirim');   
    }

    public function show($id) {
        $data = \App\Models\Skck::findOrFail($id);
        // dd($id_warga);
        return view('users.detailsuratskck', compact('data'));
    }

    public function update(Request $request, $id_surat_peng_skck) {
        $data = \App\Models\Skck::find($id_surat_peng_skck);
        $data->update($request->all());
        if ($request->hasFile('fc_ktp'))
            {
            $request->file('fc_ktp')->move('berkaspemohon/', $request->file('fc_ktp')->getClientOriginalName());
            $data->fc_ktp = $request->file('fc_ktp')->getClientOriginalName();
            $data->save();
            }
        if ($request->hasFile('pengantar_rt'))
            {
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
            $data->save();
            };

            // dd($data);
        return redirect()->route('surat.warga')->with('success', 'Sukses Edit Data Surat!');
    }
}