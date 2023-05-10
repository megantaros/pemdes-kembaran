<?php

namespace App\Http\Controllers;

use App\Models\SuratKetPindahDatang;
use App\Models\SuratPengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratKetPindahDatangController extends Controller
{
    //
    public function get($id_surat_pengajuan) {
        return view('form.form_surat_ket_pindah_datang', compact('id_surat_pengajuan'));
    }
    public function detail($id_warga){
        $data = SuratKetPindahDatang::where('id_warga', $id_warga)->firstOrFail();
        return view('user.detailsuratpindah_datang', compact('data'));
    }
    public function get_admin($id_warga){
        $data = DB::table('surat_ket_pindah_datang')
            ->join('surat_pengajuan', 'surat_pengajuan.id_warga', '=', 'surat_ket_pindah_datang.id_warga')
            ->join('warga', 'warga.id_warga', '=', 'surat_ket_pindah_datang.id_warga')
            ->where('surat_ket_pindah_datang.id_warga', $id_warga)
            ->where('surat_pengajuan.jenis_surat', 'Surat Keterangan Pindah Datang')
            ->first();
        return view('admin.detailsuratpindah_datang', compact('data'));
    }
    public function store(Request $request, $id_surat_pengajuan) {
        $request->validate([
            'id_warga' => 'required|unique:surat_ket_pindah_datang|max:1',
            'foto_surat_ket_pindah_capil' => 'required|image',
        ]);
        $data = SuratKetPindahDatang::create($request->all());
        if ($request->hasFile('foto_surat_ket_pindah_capil'))
            {
            $request->file('foto_surat_ket_pindah_capil')->move('berkaspemohon/', $request->file('foto_surat_ket_pindah_capil')->getClientOriginalName());
            $data->foto_surat_ket_pindah_capil = $request->file('foto_surat_ket_pindah_capil')->getClientOriginalName();
            $data->save();
            }
        $surat_pengajuan = SuratPengajuan::find($id_surat_pengajuan);
        $surat_pengajuan->update([
            'id_surat' => $data->id_surat_ket_pindah,
        ]);
        return redirect()->route('layanan')->with('success', 'Data Berhasil Dikirim');   
    }
    public function edit(Request $request, $id){
        $data = SuratKetPindahDatang::find($id);
        $data->update($request->all());
        if ($request->hasFile('foto_surat_ket_pindah_capil'))
            {
            $request->file('foto_surat_ket_pindah_capil')->move('berkaspemohon/', $request->file('foto_surat_ket_pindah_capil')->getClientOriginalName());
            $data->foto_surat_ket_pindah_capil = $request->file('foto_surat_ket_pindah_capil')->getClientOriginalName();
            $data->save();
            }
        return redirect('/profil/suratsaya')->with('success', 'Sukses Edit Data Surat!');
    }
}