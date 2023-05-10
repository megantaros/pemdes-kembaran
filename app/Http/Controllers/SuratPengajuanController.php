<?php

namespace App\Http\Controllers;

use App\Models\Domisili;
use App\Models\KTP;
use App\Models\Skck;
use App\Models\SuratKetPindah;
use App\Models\SuratKetPindahDatang;
use App\Models\SuratKetUsaha;
use App\Models\SuratPengajuan;
use App\Models\SuratPengKk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;

class SuratPengajuanController extends Controller
{
    //
    public function get() {
        $id_warga = Auth::user()->id_warga;
        $data = DB::table('warga')
        ->join('surat_pengajuan', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
        ->where('surat_pengajuan.id_warga', $id_warga)
        ->where('surat_pengajuan.id_surat', '!=', NULL)
        ->select('warga.*', 'surat_pengajuan.*')
        ->get();
        // dd($data);
        return view('user.suratpengajuan', compact('data'));
    }
    public function store(Request $request) {
        $this->validate($request, [
            'jenis_surat' => 'required',
            'id_warga' => 'required',
        ]);
        $data = SuratPengajuan::create([
            'jenis_surat' => $request->jenis_surat,
            'id_warga' => $request->id_warga,
        ]);
        if ($request->jenis_surat == 'Surat Keterangan Domisili') {
            return redirect('/layanan/'.$data->id.'/surat_ket_domisili')->with('success', 'Silahkan Masukkan Data Pengisian Surat!');
        }
        if ($request->jenis_surat == 'Surat Keterangan Usaha') {
            return redirect('/layanan/'.$data->id.'/surat_ket_usaha')->with('success', 'Silahkan Masukkan Data Pengisian Surat!');
        }
        if ($request->jenis_surat == 'Surat Keterangan Pindah') {
            return redirect('/layanan/'.$data->id.'/surat_ket_pindah')->with('success', 'Silahkan Masukkan Data Pengisian Surat!');
        }
        if ($request->jenis_surat == 'Surat Keterangan Pindah Datang') {
            return redirect('/layanan/'.$data->id.'/surat_ket_pindah_datang')->with('success', 'Silahkan Masukkan Data Pengisian Surat!');
        }
        if ($request->jenis_surat == 'Surat Pengantar SKCK') {
            return redirect('/layanan/'.$data->id.'/surat_peng_skck')->with('success', 'Silahkan Masukkan Data Pengisian Surat!');
        }
        if ($request->jenis_surat == 'Surat Pengantar KTP') {
            return redirect('/layanan/'.$data->id.'/surat_peng_ktp')->with('success', 'Silahkan Masukkan Data Pengisian Surat!');
        }
        if ($request->jenis_surat == 'Surat Pengantar KK') {
            return redirect('/layanan/'.$data->id.'/surat_peng_kk')->with('success', 'Silahkan Masukkan Data Pengisian Surat!');
        }
        // dd($data);
        return redirect('/layanan')->with('success', 'Silahkan Masukkan Data Pengisian Surat!');
    }
    public function delete($id){
        $data = SuratPengajuan::find($id);
        if ( $data->jenis_surat == 'Surat Keterangan Domisili' ) {
            Domisili::find($data->id_surat)->delete();
        }
        if ( $data->jenis_surat == 'Surat Keterangan Usaha' ) {
            SuratKetUsaha::find($data->id_surat)->delete();
        }
        if ( $data->jenis_surat == 'Surat Keterangan Pindah' ) {
            SuratKetPindah::find($data->id_surat)->delete();
        }
        if ( $data->jenis_surat == 'Surat Keterangan Pindah Datang' ) {
            SuratKetPindahDatang::find($data->id_surat)->delete();
        }
        if ( $data->jenis_surat == 'Surat Pengantar SKCK' ) {
            Skck::find($data->id_surat)->delete();
        }
        if ( $data->jenis_surat == 'Surat Pengantar KTP' ) {
            KTP::find($data->id_surat)->delete();
        }
        if ( $data->jenis_surat == 'Surat Pengantar KK' ) {
            SuratPengKk::find($data->id_surat)->delete();
        }
        $data->delete();
        return redirect()->back()->with('success', 'Surat Berhasil Dihapus');
    }
    public function update(Request $request, $id) {
        $values = [
            'status' => $request->status,
        ];
        SuratPengajuan::query()->findOrFail($id)->update($values);
        // dd($data);
        return redirect()->route('dashboard')->with('success', 'Status surat telah diedit!');
    }
}