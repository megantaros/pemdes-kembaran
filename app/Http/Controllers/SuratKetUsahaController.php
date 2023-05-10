<?php

namespace App\Http\Controllers;

use App\Models\SuratKetUsaha;
use App\Models\SuratPengajuan;
use Illuminate\Http\Request;

class SuratKetUsahaController extends Controller
{
    //
    public function get($id_surat_pengajuan){
        return view('form.form_surat_ket_usaha', compact('id_surat_pengajuan'));
    }
    public function detail($id_warga){
        $data = SuratKetUsaha::where('id_warga', $id_warga)->firstOrFail();
        return view('user.detailsuratusaha', compact('data'));
    }
    public function get_admin($id_warga){
        $data = SuratKetUsaha::join('surat_pengajuan', 'surat_pengajuan.id_warga', '=', 'surat_ket_usaha.id_warga')
            ->join('warga', 'warga.id_warga', '=', 'surat_ket_usaha.id_warga')
            ->where('surat_ket_usaha.id_warga', $id_warga)
            ->where('surat_pengajuan.jenis_surat', 'Surat Keterangan Usaha')
            ->first();
        return view('admin.detailsuratusaha', compact('data'));
    }
    public function store(Request $request, $id_surat_pengajuan) {
        $this->validate($request, [
            'id_warga' => 'required|unique:surat_ket_usaha|max:1',
            'jenis_usaha' => 'required',
            'tempat_usaha' => 'required',
            'fc_ktp' => 'required|image',
            'fc_kk' => 'required|image',
            'foto_usaha' => 'required|image',
            'pengantar_rt' => 'required|image'
        ]);
        $data = SuratKetUsaha::create($request->all());
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
        $surat_pengajuan = SuratPengajuan::find($id_surat_pengajuan);
        $surat_pengajuan->update([
            'id_surat' => $data->id_surat_ket_usaha,
        ]);
        // return dd($data);
        return redirect()->route('layanan')->with('success', 'Data Berhasil Dikirim'); 
    }
    public function edit(Request $request, $id) {
        $data = SuratKetUsaha::find($id);
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
            // dd($data);
            return redirect('/profil/suratsaya')->with('success', 'Sukses Edit Data Surat!');
    }
}