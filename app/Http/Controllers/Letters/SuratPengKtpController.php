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

        return redirect()->route('surat.warga')->with('success', 'Data Berhasil Dikirim');   
    }
    public function show($id) {

        $data = \App\Models\SuratPengajuan::where('id_surat', $id)
            ->join('surat_peng_ktp', 'surat_pengajuan.id_surat', '=', 'surat_peng_ktp.id_surat_peng_ktp')
            ->join('warga', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
            ->where('surat_pengajuan.jenis_surat', 'Surat Pengantar KTP')
            ->select('surat_pengajuan.*', 'surat_peng_ktp.*', 'warga.name', 'warga.nik', 'warga.alamat')
            ->first();    

        // $data->tanggal_surat = date('d-m-Y', strtotime($data->tanggal_surat));
        return view('users.detailsuratktp', compact('data'));
        // dd($data);
    }
    public function update(Request $request, $id) {
        $data = \App\Models\KTP::find($id);
        $data->update($request->except([
            'keterangan_warga'
        ]));

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

        $keteranganWarga = $request->input('keterangan_warga');

        if ($keteranganWarga != null) {

            $suratPengajuan = \App\Models\SuratPengajuan::where('id_surat', $id)
                ->where('jenis_surat', 'Surat Pengantar KTP')
                ->first();
                
            $suratPengajuan->update([
                'keterangan_warga' => $request->keterangan_warga,
            ]);

        }
            
        return redirect()->back()->with('success', 'Sukses Edit Data Surat!');
    }
}