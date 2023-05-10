<?php

namespace App\Http\Controllers;

use App\Models\KTP;
use App\Models\SuratPengajuan;
use Illuminate\Http\Request;

class SuratPengKTPController extends Controller
{
    //
    public function get($id_surat_pengajuan){
        return view('form.form_surat_peng_ktp', compact('id_surat_pengajuan'));
    }
    public function get_admin($id_warga){
        $data = KTP::join('warga', 'warga.id_warga', '=', 'surat_peng_ktp.id_warga')
            ->join('surat_pengajuan', 'surat_pengajuan.id_warga', '=', 'surat_peng_ktp.id_warga')
            ->where('surat_peng_ktp.id_warga', '=', $id_warga)
            ->where('surat_pengajuan.jenis_surat', '=', 'Surat Pengantar KTP')
            ->first();
            // dd($data);
        return view('admin.detailsuratktp', compact('data'));
    }
    public function store(Request $request, $id_surat_pengajuan){
        $this->validate($request, [
            'id_warga' => 'required|unique:surat_peng_ktp|max:1',
            // 'kk' => 'required',
            // 'nik' => 'required',
            // 'alamat' => 'required',
            // 'rt' => 'required',
            // 'rw' => 'required',
            'foto_ktp' => 'required|image',
            'foto_kk' => 'required|image',
            'pengantar_rt' => 'required|image'
        ]);
        $data = KTP::create($request->all());
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
        $surat_pengajuan = SuratPengajuan::find($id_surat_pengajuan);
        $surat_pengajuan->update([
            'id_surat' => $data->id_surat_peng_ktp,
        ]);
        // return dd($data);
        return redirect()->route('layanan')->with('success', 'Data Berhasil Dikirim');   
    }
    public function detail($id_warga){
        $data = KTP::where('id_warga', $id_warga)->first();
        // dd($data);
        return view('user.detailsuratktp', compact('data'));
    }
    public function edit(Request $request, $id) {
        $data = KTP::find($id);
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