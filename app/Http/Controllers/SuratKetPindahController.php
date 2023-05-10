<?php

namespace App\Http\Controllers;

use App\Models\SuratKetPindah;
use App\Models\SuratPengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratKetPindahController extends Controller
{
    //
    public function get($id_surat_pengajuan){
        return view('form.form_surat_ket_pindah', compact('id_surat_pengajuan'));
    }
    public function get_admin($id_warga){
        $data = DB::table('surat_ket_pindah')
            ->join('surat_pengajuan', 'surat_pengajuan.id_warga', '=', 'surat_ket_pindah.id_warga')
            ->join('warga', 'warga.id_warga', '=', 'surat_ket_pindah.id_warga')
            ->where('surat_ket_pindah.id_warga', $id_warga)
            ->where('surat_pengajuan.jenis_surat', 'Surat Keterangan Pindah')
            ->first();
        return view('admin.detailsuratpindah', compact('data'));
    }
    public function detail($id_warga) {
        $data = SuratKetPindah::where('id_warga', $id_warga)->firstOrFail();
        return view('user.detailsuratpindah', compact('data'));
    }
    public function store(Request $request, $id_surat_pengajuan) {
        $this->validate($request, [
            'id_warga' => 'required|unique:surat_ket_pindah|max:1',
            // 'nik' => 'required',
            'kk' => 'required',
            'nama_kepala_keluarga' => 'required',
            'alamat_tujuan' => 'required',
            'jml_angg_pindah' => 'required',
            'shdk' => 'required',
            'foto_ktp' => 'required|image',
            'foto_kk' => 'required|image',
            'pengantar_rt' => 'required|image'
        ]);
        $data = SuratKetPindah::create($request->all());
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
            }
        if ($request->hasFile('pengantar_rt'))
            {
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
            $data->save();
            };
            $surat_pengajuan = SuratPengajuan::find($id_surat_pengajuan);
            $surat_pengajuan->update([
                'id_surat' => $data->id_surat_ket_pindah,
            ]);
            // dd($data);
            return redirect()->route('layanan')->with('success', 'Data Berhasil Dikirim');   
    }
    public function edit(Request $request, $id_surat_ket_pindah) {
        $data = SuratKetPindah::find($id_surat_ket_pindah);
        $data->update($request->all());
        if($request->hasFile('foto_ktp')){
            $request->file('foto_ktp')->move('berkaspemohon/', $request->file('foto_ktp')->getClientOriginalName());
            $data->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();
            $data->save();
        }
        if($request->hasFile('foto_kk')){
            $request->file('foto_kk')->move('berkaspemohon/', $request->file('foto_kk')->getClientOriginalName());
            $data->foto_kk = $request->file('foto_kk')->getClientOriginalName();
            $data->save();
        }
        if($request->hasFile('pengantar_rt')){
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
            $data->save();
        }
        if($data->alasan_pindah !== 'Lainnya'){
            $lainnya = SuratKetPindah::find($id_surat_ket_pindah);
            $lainnya->update([
                'lainnya' => null
            ]);
        }
        return redirect('/profil/suratsaya')->with('success', 'Sukses Edit Data Surat!');
    }
}