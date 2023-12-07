<?php

namespace App\Http\Controllers\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratKetPindahController extends Controller
{
    //
    public function create()
    {
        return view('form.form_surat_ket_pindah');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_warga' => 'required',
            'nama_kepala_keluarga' => 'required',
            'alasan_pindah' => 'required',
            'alamat_tujuan' => 'required',
            'shdk' => 'required',
            'foto_ktp' => 'required|image',
            'foto_kk' => 'required|image',
            'pengantar_rt' => 'required|image'
        ]);

        $permohonanSurat = \App\Models\SuratPengajuan::create([
            'id_warga' => $request->id_warga,
            'jenis_surat' => 'Surat Keterangan Pindah',
            'tanggal' => date('Y-m-d'),
        ]);

        $data = \App\Models\SuratKetPindah::create([
            'id_permohonan_surat' => $permohonanSurat->id_permohonan_surat,
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'alasan_pindah' => $request->alasan_pindah,
            'lainnya' => $request->lainnya,
            'alamat_tujuan' => $request->alamat_tujuan,
            'shdk' => $request->shdk,
            'foto_ktp' => $request->foto_ktp,
            'foto_kk' => $request->foto_kk,
            'pengantar_rt' => $request->pengantar_rt,
        ]);

        if ($request->hasFile('foto_ktp')) {
            $request->file('foto_ktp')->move('berkaspemohon/', $request->file('foto_ktp')->getClientOriginalName());
            $data->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();
            $data->save();
        }
        if ($request->hasFile('foto_kk')) {
            $request->file('foto_kk')->move('berkaspemohon/', $request->file('foto_kk')->getClientOriginalName());
            $data->foto_kk = $request->file('foto_kk')->getClientOriginalName();
            $data->save();
        }
        if ($request->hasFile('pengantar_rt')) {
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
            $data->save();
        }

        // dd($data);
        return redirect()->route('surat.warga')->with('success', 'Data Berhasil Dikirim');
    }
    public function show($id)
    {
        $data = \App\Models\SuratPengajuan::where('permohonan_surat.id_permohonan_surat', $id)
            ->join('surat_ket_pindah', 'permohonan_surat.id_permohonan_surat', '=', 'surat_ket_pindah.id_permohonan_surat')
            ->join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->where('permohonan_surat.jenis_surat', 'Surat Keterangan Pindah')
            ->select('permohonan_surat.*', 'surat_ket_pindah.*', 'warga.*')
            ->first();

        return view('admin.detailsuratpindah', compact('data'));
    }
    public function edit($id)
    {
        $data = \App\Models\SuratKetPindah::where('surat_ket_pindah.id_permohonan_surat', $id)
            ->join('permohonan_surat', 'surat_ket_pindah.id_permohonan_surat', '=', 'permohonan_surat.id_permohonan_surat')
            ->join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->select('permohonan_surat.*', 'surat_ket_pindah.*', 'warga.*')
            ->first();

        return view('users.detailsuratpindah', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data = \App\Models\SuratKetPindah::find($id);
        $data->update($request->except(['keterangan_warga']));
        if ($request->hasFile('foto_ktp')) {
            $request->file('foto_ktp')->move('berkaspemohon/', $request->file('foto_ktp')->getClientOriginalName());
            $data->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();
            $data->save();
        }
        if ($request->hasFile('foto_kk')) {
            $request->file('foto_kk')->move('berkaspemohon/', $request->file('foto_kk')->getClientOriginalName());
            $data->foto_kk = $request->file('foto_kk')->getClientOriginalName();
            $data->save();
        }
        if ($request->hasFile('pengantar_rt')) {
            $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
            $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
            $data->save();
        }
        if ($data->alasan_pindah !== 'Lainnya') {
            $lainnya = \App\Models\SuratKetPindah::find($id);
            $lainnya->update([
                'lainnya' => null
            ]);
        }

        $keteranganWarga = $request->input('keterangan_warga');
        $idPermohonanSurat = $data->id_permohonan_surat;
        if ($keteranganWarga != null) {
            $suratPengajuan = \App\Models\SuratPengajuan::find($idPermohonanSurat);

            $suratPengajuan->update([
                'keterangan_warga' => $keteranganWarga,
            ]);
        }

        return redirect()->back()->with('success', 'Sukses Edit Data Surat!');
    }
}