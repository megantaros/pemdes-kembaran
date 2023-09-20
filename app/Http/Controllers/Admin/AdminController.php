<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function edit($id_admin)
    {
        return view('admin.profile');
    }
    public function update(Request $request, $id_admin)
    {
        $data = \App\Models\Admin::find($id_admin);
        $data->update($request->except('password', 'confirmPassword'));

        $password = $request->password;
        $confirmPassword = $request->confirmPassword;

        if ($password != '') {
            if ($password == $confirmPassword) {
                $data->update([
                    'password' => bcrypt($password)
                ]);
            } else {
                return redirect()->back()->with('error', 'Password tidak sama!');
            }
        }

        return redirect()->back()->with('success', 'Data anda berhasil diupdate!');
    }
    public function dashboard()
    {
        $suratMasuk = \App\Models\SuratPengajuan::where('status', 'Terkirim')->count();
        $suratKeluar = \App\Models\SuratPengajuan::where('status', 'Diterima')->count();
        $suratDitolak = \App\Models\SuratPengajuan::where('status', 'Ditolak')->count();
        $warga = \App\Models\User::count();

        $data = \App\Models\SuratPengajuan::join('warga', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
            ->get();

        return view('admin.dashboard', [
            'suratMasuk' => $suratMasuk,
            'suratKeluar' => $suratKeluar,
            'suratDitolak' => $suratDitolak,
            'warga' => $warga,
            'data' => $data
        ]);

        // $statistik = \App\Models\SuratPengajuan::selectRaw('count(*) as jumlah, DATE_FORMAT(tanggal_permohonan, "%M") as bulan')
        //     ->where('status', 'Terkirim')
        //     ->whereYear('tanggal_permohonan', date('Y'))
        //     ->groupBy('bulan')
        //     ->get();

        // $statsInMonthIncoming = \App\Models\SuratPengajuan::selectRaw('count(*) as jumlah, DATE_FORMAT(tanggal_permohonan, "%M") as bulan')
        //     ->where('status', 'Terkirim')
        //     ->whereYear('tanggal_permohonan', date('Y'))
        //     ->groupBy('bulan')
        //     ->get();

        // $statisInMonthOutgoing = \App\Models\SuratPengajuan::selectRaw('count(*) as jumlah, DATE_FORMAT(tanggal_permohonan, "%M") as bulan')
        //     ->where('status', 'Diterima')
        //     ->whereYear('tanggal_permohonan', date('Y'))
        //     ->groupBy('bulan')
        //     ->get();

        // $statisInMonthRejected = \App\Models\SuratPengajuan::selectRaw('count(*) as jumlah, DATE_FORMAT(tanggal_permohonan, "%M") as bulan')
        //     ->where('status', 'Ditolak')
        //     ->whereYear('tanggal_permohonan', date('Y'))
        //     ->groupBy('bulan')
        //     ->get();

        // $statsInMonthCivil = \App\Models\User::selectRaw('count(*) as jumlah, DATE_FORMAT(created_at, "%M") as bulan')
        //     ->whereYear('created_at', date('Y'))
        //     ->groupBy('bulan')
        //     ->get();

        // return view('admin.dashboard', [
        //     'suratMasuk' => $suratMasuk,
        //     'suratKeluar' => $suratKeluar,
        //     'suratDitolak' => $suratDitolak,
        //     'warga' => $warga,
        //     'statistikIncoming' => $statsInMonthIncoming,
        //     'statistikOutgoing' => $statisInMonthOutgoing,
        //     'statistikRejected' => $statisInMonthRejected,
        //     'statistikCivil' => $statsInMonthCivil
        // ]);
    }

    public function surat(Request $request, $statusSurat)
    {
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        if ($startDate && $endDate) {
            $data = \App\Models\SuratPengajuan::join('warga', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
                ->whereBetween('surat_pengajuan.tanggal_permohonan', [$startDate, $endDate])
                ->where('surat_pengajuan.status', $statusSurat)->get();

            if ($data == '[]') {
                return redirect()->route('daftar.surat', $statusSurat)->with('error', 'Data Tidak Ditemukan !');
            }

            if ($statusSurat == 'terkirim') {
                return view('admin.suratmasuk', compact('data'));
            } elseif ($statusSurat == 'diterima') {
                return view('admin.suratkeluar', compact('data'));
            } else {
                return view('admin.suratditolak', compact('data'));
            }
        } else {
            $data = \App\Models\SuratPengajuan::join('warga', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
                ->where('surat_pengajuan.status', $statusSurat)->get();

            if ($statusSurat == 'terkirim') {
                return view('admin.suratmasuk', compact('data'));
            } elseif ($statusSurat == 'diterima') {
                return view('admin.suratkeluar', compact('data'));
            } else {
                return view('admin.suratditolak', compact('data'));
            }
        }

    }
}