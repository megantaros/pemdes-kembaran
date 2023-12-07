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
        $suratMasuk = \App\Models\SuratPengajuan::where('status', 1)->count();
        $suratKeluar = \App\Models\SuratPengajuan::where('status', 5)->count();
        $suratDitolak = \App\Models\SuratPengajuan::where('status', 6)->count();
        $warga = \App\Models\User::count();
        $statusSurat = \App\Models\SuratPengajuan::select('status')->groupBy('status')->get();

        $data = \App\Models\SuratPengajuan::join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->where('permohonan_surat.status', 1)
            ->orderBy('permohonan_surat.created_at', 'DESC')
            ->get();

        return view('admin.dashboard', [
            'suratMasuk' => $suratMasuk,
            'suratKeluar' => $suratKeluar,
            'suratDitolak' => $suratDitolak,
            'warga' => $warga,
            'data' => $data,
            'statusSurat' => $statusSurat
        ]);
    }

    public function verifikasiSurat()
    {
        $data = \App\Models\SuratPengajuan::join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->where('permohonan_surat.status', 2)
            ->orderBy('permohonan_surat.created_at', 'DESC')
            ->get();

        return view('admin.suratmasuk', compact('data'));
    }

    public function prosesSurat()
    {
        $data = \App\Models\SuratPengajuan::join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->where('permohonan_surat.status', 3)
            ->orderBy('permohonan_surat.created_at', 'DESC')
            ->get();

        return view('admin.suratproses', compact('data'));
    }
    public function signedSurat()
    {
        $data = \App\Models\SuratPengajuan::join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->where('permohonan_surat.status', 4)
            ->orderBy('permohonan_surat.created_at', 'DESC')
            ->get();

        return view('admin.suratsigned', compact('data'));
    }
    public function selesaiSurat()
    {
        $data = \App\Models\SuratPengajuan::join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->where('permohonan_surat.status', 5)
            ->orderBy('permohonan_surat.updated_at', 'DESC')
            ->get();

        return view('admin.suratkeluar', compact('data'));
    }
    public function ditolakSurat()
    {
        $data = \App\Models\SuratPengajuan::join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
            ->where('permohonan_surat.status', 6)
            ->orderBy('permohonan_surat.updated_at', 'DESC')
            ->get();

        return view('admin.suratditolak', compact('data'));
    }
    public function cetakSurat(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        if ($startDate && $endDate) {
            $data = \App\Models\SuratPengajuan::join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
                ->where('permohonan_surat.status', 5)
                ->whereBetween('permohonan_surat.updated_at', [$startDate, $endDate])
                ->orderBy('permohonan_surat.created_at', 'DESC')
                ->get();

            return view('admin.cetak_suratkeluar', compact('data'));
        } else {
            $data = \App\Models\SuratPengajuan::join('warga', 'permohonan_surat.id_warga', '=', 'warga.id_warga')
                ->where('permohonan_surat.status', 5)
                ->orderBy('permohonan_surat.updated_at', 'DESC')
                ->get();

            return view('admin.cetak_suratkeluar', compact('data'));
        }

    }
}