<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratKetPindahController extends Controller
{
    //
    public function create() {
        return view('form.form_surat_ket_pindah');
    }
    public function store(Request $request) {
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

        $data = \App\Models\SuratKetPindah::create($request->all());
        
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
            
            \App\Models\SuratPengajuan::create([
                'id_warga' => $request->id_warga,
                'jenis_surat' => 'Surat Keterangan Pindah',
                'id_surat' => $data->id_surat_ket_pindah,
            ]);

            // dd($data);
        return redirect()->route('surat.warga')->with('success', 'Data Berhasil Dikirim');   
    }
    public function show($id) {
        $data = \App\Models\SuratPengajuan::where('id_surat', $id)
            ->join('surat_ket_pindah', 'surat_pengajuan.id_surat', '=', 'surat_ket_pindah.id_surat_ket_pindah')
            ->join('warga', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
            ->where('surat_pengajuan.jenis_surat', 'Surat Keterangan Pindah')
            ->select('surat_pengajuan.*', 'surat_ket_pindah.*', 'warga.name', 'warga.nik', 'warga.alamat')
            ->first();   

        return view('users.detailsuratpindah', compact('data'));
    }
    public function update(Request $request, $id) {
        $data = \App\Models\SuratKetPindah::find($id);
        $data->update($request->except(['keterangan_warga']));

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
            $lainnya = \App\Models\SuratKetPindah::find($id);
            $lainnya->update([
                'lainnya' => null
            ]);
        }

        $keteranganWarga = $request->input('keterangan_warga');

        if ($keteranganWarga != null) {

            $suratPengajuan = \App\Models\SuratPengajuan::where('id_surat', $id)
                ->where('jenis_surat', 'Surat Keterangan Pindah')
                ->first();
                
            $suratPengajuan->update([
                'keterangan_warga' => $request->keterangan_warga,
            ]);

        }
        return redirect()->back()->with('success', 'Sukses Edit Data Surat!');
    }
}