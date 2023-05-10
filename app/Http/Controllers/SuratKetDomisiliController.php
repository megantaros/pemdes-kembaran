<?php

namespace App\Http\Controllers;

use App\Models\Domisili;
use App\Models\SuratPengajuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuratKetDomisiliController extends Controller
{
    public function get($id_surat_pengajuan){
        return view('form.form_surat_ket_domisili', compact('id_surat_pengajuan'));
    }
    public function get_admin(Request $request, $id_warga) {
        $surat = DB::table('surat_ket_domisili')
            ->join('warga', 'warga.id_warga', '=', 'surat_ket_domisili.id_warga')
            ->join('surat_pengajuan', 'surat_pengajuan.id_warga', '=', 'surat_ket_domisili.id_warga')
            ->where('surat_pengajuan.id_warga', '=', $id_warga)
            ->where('surat_pengajuan.jenis_surat', 'Surat Keterangan Domisili')
            ->first();
        // dd($surat);
        return view('admin.detailsuratdomisili', compact('surat'));
    }
    public function detail($id_warga) {
        // $id_warga = Auth::user()->id_warga;
        // $s = Domisili::suratByUserId($id_warga)->where('id_warga', $id_warga)->firstOrFail();
        // $user = $request->user();
        $s = Domisili::where('id_warga', $id_warga)->firstOrFail();
        // dd($s);
        return view('user.detailsuratdomisili', compact('s'));
    }
    public function store(Request $request, $id_surat_pengajuan){
        $this->validate($request, [
            'id_warga' => 'required|unique:surat_ket_domisili|max:1',
            'kk' => 'required',
            'alamat_domisili' => 'required',
            'fc_ktp' => 'required|image',
            'fc_kk' => 'required|image',
            'pengantar_rt' => 'required|image',
            'foto_lokasi' => 'required|image'
        ]);
        $data = Domisili::create($request->all());
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
            if ($request->hasFile('foto_lokasi'))
                {
                $request->file('foto_lokasi')->move('berkaspemohon/', $request->file('foto_lokasi')->getClientOriginalName());
                $data->foto_lokasi = $request->file('foto_lokasi')->getClientOriginalName();
                $data->save();
                };
            if ($request->hasFile('pengantar_rt'))
                {
                $request->file('pengantar_rt')->move('berkaspemohon/', $request->file('pengantar_rt')->getClientOriginalName());
                $data->pengantar_rt = $request->file('pengantar_rt')->getClientOriginalName();
                $data->save();
                };
            // return dd($data);
            $suratpengajuan = SuratPengajuan::find($id_surat_pengajuan);
            $suratpengajuan->update([
                'id_surat' => $data->id_surat_ket_domisili,
            ]);
            return redirect()->route('layanan')->with('success', 'Data Berhasil Dikirim');   
    }
    public function edit(Request $request, $id_surat_ket_domisili) {
        $data = Domisili::find($id_surat_ket_domisili);
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
        if ($request->hasFile('foto_lokasi'))
            {
            $request->file('foto_lokasi')->move('berkaspemohon/', $request->file('foto_lokasi')->getClientOriginalName());
            $data->foto_lokasi = $request->file('foto_lokasi')->getClientOriginalName();
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