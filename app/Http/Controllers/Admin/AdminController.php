<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function profileAdmin()
    {
        return view('admin.profile');
    }
    public function dashboard()
    {
        $suratMasuk = \App\Models\SuratPengajuan::where('status', 'Terkirim')->count();
        $suratKeluar = \App\Models\SuratPengajuan::where('status', 'Diterima')->count();
        $suratDitolak = \App\Models\SuratPengajuan::where('status', 'Ditolak')->count();
        $warga = \App\Models\User::count();

        return view('admin.dashboard', ['suratMasuk' => $suratMasuk, 'suratKeluar' => $suratKeluar, 'suratDitolak' => $suratDitolak, 'warga' => $warga]);
    }
    public function update(Request $request)
    {
        $idAdmin = \Illuminate\Support\Facades\Auth::guard('admin')->user()->id_admin;
    }

    public function surat(Request $request, $statusSurat)
    {
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        if ($startDate && $endDate) {
            $this->getDate($startDate, $endDate, $statusSurat);
        }

        // $query = $request->query;

        // if ($query != '') {
        //     $this->getSearch($query, $statusSurat);
        // }

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

    // public function getDate($startDate, $endDate, $statusSurat)
    // {
    //     $data = \App\Models\SuratPengajuan::join('warga', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
    //         ->whereBetween('surat_pengajuan.created_at', [$startDate, $endDate])
    //         ->where('surat_pengajuan.status', $statusSurat)->get();

    //     if ($statusSurat == 'Terkirim') {
    //         return view('admin.suratmasuk', compact('data'));
    //     } elseif ($statusSurat == 'Diterima') {
    //         return view('admin.suratkeluar', compact('data'));
    //     } else {
    //         return view('admin.suratditolak', compact('data'));
    //     }

    // }

    // public function getSearch($searchQuery, $statusSurat)
    // {
    //     $data = \App\Models\SuratPengajuan::join('warga', 'surat_pengajuan.id_warga', '=', 'warga.id_warga')
    //         ->where(function ($query) use ($searchQuery) {
    //             $query->where('warga.name', 'LIKE', '%' . $searchQuery . '%')
    //                 ->orWhere('warga.nik', 'LIKE', '%' . $searchQuery . '%')
    //                 ->orWhere('surat_pengajuan.jenis_surat', 'LIKE', '%' . $searchQuery . '%');
    //         })
    //         ->where('surat_pengajuan.status', $statusSurat)
    //         ->get();

    //     if ($statusSurat == 'Terkirim') {
    //         return view('admin.suratmasuk', compact('data'));
    //     } elseif ($statusSurat == 'Diterima') {
    //         return view('admin.suratkeluar', compact('data'));
    //     } else {
    //         return view('admin.suratditolak', compact('data'));
    //     }
    // }
}