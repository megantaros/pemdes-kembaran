<?php

namespace App\Http\Controllers;

use App\Models\skck;
use App\Models\SuratPengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuratPengSKCKController extends Controller
{
    public function get($id_surat_pengajuan){
        return view('form.form_surat_peng_skck', compact('id_surat_pengajuan'));
    }
    public function get_admin(Request $request, $id_warga) {
        $data = DB::table('surat_peng_skck')
            ->join('warga', 'warga.id_warga', '=', 'surat_peng_skck.id_warga')
            ->join('surat_pengajuan', 'surat_pengajuan.id_warga', '=', 'surat_peng_skck.id_warga')
            ->where('surat_peng_skck.id_warga', '=', $id_warga)
            ->where('surat_pengajuan.jenis_surat', '=', 'Surat Pengantar SKCK')
            ->first();
        // dd($data);
        return view('admin.detailsuratskck', compact('data'));
    }
    public function detail(Request $request, $id_warga) {
        $data = Skck::where('id_warga', $id_warga)->firstOrFail();
        // dd($id_warga);
        return view('user.detailsuratskck', compact('data'));
    }
    public function store(Request $request, $id_surat_pengajuan) {
        $this->validate($request, [
            'id_warga' => 'required|unique:surat_peng_skck|max:1',
            // 'nik' => 'required',
            'kk' => 'required',
            // 'ttl' => 'required',
            // 'pekerjaan' => 'required',
            // 'alamat' => 'required',
            'fc_ktp' => 'required|image',
            'pengantar_rt' => 'required|image'
        ]);
        $data = Skck::create($request->all());
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
            $suratpengajuan = SuratPengajuan::find($id_surat_pengajuan);
            $suratpengajuan->update([
                'id_surat' => $data->id_surat_peng_skck,
            ]);
            return redirect()->route('layanan')->with('success', 'Data Berhasil Dikirim');   
    }
    public function edit(Request $request, $id_surat_peng_skck) {
        $data = Skck::find($id_surat_peng_skck);
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
        return redirect('/profil/suratsaya')->with('success', 'Sukses Edit Data Surat!');
    }
}