<?php

namespace App\Http\Controllers;

use App\Models\SuratPengajuan;
use App\Models\SuratPengKk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratPengKKController extends Controller
{
    //
    public function get($id_surat_pengajuan){
        return view('form.form_surat_peng_kk', compact('id_surat_pengajuan'));
    }
    public function get_admin($id_warga){
        $data = DB::table('surat_peng_kk')
            ->join('warga', 'warga.id_warga', '=', 'surat_peng_kk.id_warga')
            ->join('surat_pengajuan', 'surat_pengajuan.id_warga', '=', 'surat_peng_kk.id_warga')
            ->where('surat_peng_kk.id_warga', $id_warga)
            ->where('surat_pengajuan.jenis_surat', 'Surat Pengantar KK')
            ->first();
        return view('admin.detailsuratkk', compact('data'));
    }
    public function detail($id_warga) {
        $data = SuratPengKk::where('id_warga', $id_warga)->firstOrFail();
        return view('user.detailsuratkk', compact('data'));
        // dd($data);
    }
    public function store(Request $request, $id_surat_pengajuan){
        $this->validate($request, [
            'id_warga' => 'required|unique:surat_peng_kk|max:1',
            'kk_lama' => 'required',
            // 'shdk' => 'required',
            // 'alasan_permohonan' => 'required',
            'jml_angg_keluarga' => 'required',
            'foto_ktp' => 'required|image',
            'foto_kk' => 'required|image',
            'fc_buku_nikah' => 'required|image',
            'pengantar_rt' => 'required|image',
        ]);
        $data = SuratPengKk::create($request->all());
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

        $surat_pengajuan = SuratPengajuan::find($id_surat_pengajuan);
        $surat_pengajuan->update([
            'id_surat' => $data->id_surat_peng_kk,
        ]);
        // dd($data);
        return redirect()->route('layanan')->with('success', 'Data Berhasil Dikirim');   
    }
    public function edit(Request $request, $id){
        $data = SuratPengKk::find($id);
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