<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Domisili;
use App\Models\Skck;
use App\Models\SuratPengajuan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/dashboard');
        } else {
            return view('admin.login');
        }
    }
    public function attemp(Request $request)
    {
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            SuratPengajuan::where('id_surat', NULL)->delete();
            return redirect('/dashboard')->with('success', 'Anda Berhasil Login sebagai Admin');
        }
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        return redirect('/loginadmin')->with('error', 'Email atau Password Salah !');
    }
    public function dashboard(Request $request)
    {
        if ($request->search) {
            // $data = SuratPengajuan::where('name', 'LIKE', '%' .$request->search. '%')->paginate(10);
            $data = DB::table('permohonan_surat')
                ->join('warga', 'warga.id_warga', '=', 'permohonan_surat.id_warga')
                ->select('warga.*', 'permohonan_surat.*')
                ->where('name', 'LIKE', '%' . $request->search . '%')
                ->paginate(10);
        } else {
            $data = DB::table('permohonan_surat')
                ->join('warga', 'warga.id_warga', '=', 'permohonan_surat.id_warga')
                ->select('warga.*', 'permohonan_surat.*')
                ->where('status', 'Diajukan')
                ->paginate(10);
        }
        $surat_masuk = DB::table('permohonan_surat')->where('status', 'Diajukan')->count();
        $surat_keluar = DB::table('permohonan_surat')->where('status', 'Selesai')->count();
        $surat_ditolak = DB::table('permohonan_surat')->where('status', 'Ditolak')->count();

        return view('admin.dashboard', compact('data', 'surat_masuk', 'surat_keluar', 'surat_ditolak'));
    }
    public function get_suratmasuk(Request $request)
    {
        if ($request->search) {
            $data = DB::table('surat_pengajuan')
                ->join('warga', 'warga.id_warga', '=', 'surat_pengajuan.id_warga')
                ->select('warga.*', 'surat_pengajuan.*')
                ->where('surat_pengajuan.status', 'Terkirim')
                ->where('surat_pengajuan.id_surat', '!=', NULL)
                ->where('name', 'LIKE', '%' . $request->search . '%')
                ->paginate(10);
            // SuratPengajuan::where('id_surat', NULL)->delete();
        } else {
            $data = DB::table('surat_pengajuan')
                ->join('warga', 'warga.id_warga', '=', 'surat_pengajuan.id_warga')
                ->select('warga.*', 'surat_pengajuan.*')
                ->where('surat_pengajuan.status', 'Terkirim')
                ->where('surat_pengajuan.id_surat', '!=', NULL)
                ->paginate(10);
            // SuratPengajuan::where('id_surat', NULL)->delete();
        }
        return view('admin.suratmasuk', compact('data'));
    }
    public function cetak_suratmasuk()
    {
        $data = DB::table('surat_pengajuan')
            ->join('warga', 'warga.id_warga', '=', 'surat_pengajuan.id_warga')
            ->select('warga.*', 'surat_pengajuan.*')
            ->where('surat_pengajuan.status', 'Terkirim')
            ->where('surat_pengajuan.id_surat', '!=', NULL)
            ->get();
        // return view('admin.cetak_suratmasuk', compact('data'));
        $pdf = Pdf::loadview('admin.cetak_suratmasuk', compact('data'));
        return $pdf->download('surat_masuk.pdf');
    }
    public function get_suratkeluar(Request $request)
    {
        if ($request->search) {
            $data = DB::table('surat_pengajuan')
                ->join('warga', 'warga.id_warga', '=', 'surat_pengajuan.id_warga')
                ->where('status', 'Diterima')
                ->where('surat_pengajuan.id_surat', '!=', NULL)
                ->select('warga.*', 'surat_pengajuan.*')
                ->where('name', 'LIKE', '%' . $request->search . '%')
                ->paginate(10);
            // SuratPengajuan::where('id_surat', NULL)->delete();
        } else {
            $data = DB::table('surat_pengajuan')
                ->join('warga', 'warga.id_warga', '=', 'surat_pengajuan.id_warga')
                ->where('status', 'Diterima')
                ->where('surat_pengajuan.id_surat', '!=', NULL)
                ->select('warga.*', 'surat_pengajuan.*')
                ->paginate(10);
        }
        return view('admin.suratkeluar', compact('data'));
    }
    public function cetak_suratkeluar()
    {
        $data = DB::table('surat_pengajuan')
            ->join('warga', 'warga.id_warga', '=', 'surat_pengajuan.id_warga')
            ->where('status', 'Diterima')
            ->where('surat_pengajuan.id_surat', '!=', NULL)
            ->select('warga.*', 'surat_pengajuan.*')
            ->get();
        return view('admin.cetak_suratkeluar', compact('data'));
        // $pdf = Pdf::loadview('admin.cetak_suratkeluar', compact('data'));
        // return $pdf->download('surat_keluar.pdf');
    }
    public function get_suratditolak(Request $request)
    {
        if ($request->search) {
            $data = DB::table('surat_pengajuan')
                ->join('warga', 'warga.id_warga', '=', 'surat_pengajuan.id_warga')
                ->where('status', 'Ditolak')
                ->where('surat_pengajuan.id_surat', '!=', NULL)
                ->select('warga.*', 'surat_pengajuan.*')
                ->where('name', 'LIKE', '%' . $request->search . '%')
                ->paginate(10);
            // SuratPengajuan::where('id_surat', NULL)->delete();
        } else {
            $data = DB::table('surat_pengajuan')
                ->join('warga', 'warga.id_warga', '=', 'surat_pengajuan.id_warga')
                ->where('status', 'Ditolak')
                ->where('surat_pengajuan.id_surat', '!=', NULL)
                ->select('warga.*', 'surat_pengajuan.*')
                ->paginate(10);
        }
        // $data = DB::table('surat_pengajuan')
        //     ->join('warga', 'warga.id_warga', '=', 'surat_pengajuan.id_warga')
        //     ->where('status', 'Ditolak')
        //     ->where('surat_pengajuan.id_surat', '!=', NULL)
        //     ->select('warga.*', 'surat_pengajuan.*')
        //     ->paginate(10);
        return view('admin.suratditolak', compact('data'));
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/loginadmin');
    }
}