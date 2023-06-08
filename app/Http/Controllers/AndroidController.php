<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Domisili;
use App\Models\KTP;
use App\Models\Skck;
use App\Models\SuratKetPindah;
use App\Models\SuratKetPindahDatang;
use App\Models\SuratKetUsaha;
use App\Models\SuratPengajuan;
use App\Models\SuratPengKk;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AndroidController extends Controller {
    public function start() {
        return ApiFormatter::createApi(200, 'Success');
    }
    public function login(Request $request){
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return ApiFormatter::createApi(400, 'Failed');
        }
        $data = Auth::user();
        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }     
    }

    public function regist(Request $request) {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return ApiFormatter::createApi(200, 'Register Berhasil');
    }
    public function store_surat_pengajuan(Request $request) {
        $data = SuratPengajuan::create([
            'jenis_surat' => $request->jenis_surat,
            'id_warga' => $request->id_warga,
        ]);

        $pemohon = DB::table('surat_pengajuan')->where('id_warga', $data->id_warga)->first();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $pemohon);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }     
    }

    public function get_surat_pengajuan($id_warga) {
        $data = DB::table('warga')
            ->join('surat_pengajuan', 'warga.id_warga', '=', 'surat_pengajuan.id_warga')
            ->where('warga.id_warga', $id_warga)
            ->where('surat_pengajuan.id_surat', '!=', NULL)
            ->select('warga.*', 'surat_pengajuan.*')
            ->get();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }     
    }

    public function delete_surat_pengajuan($id_surat_pengajuan){
        $data = SuratPengajuan::find($id_surat_pengajuan);
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

        if($data){
            return ApiFormatter::createApi(200, 'Success');
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }     
    }

    public function get_surat_ket_domisili($id_warga) {
        // $data = Domisili::where('id_warga', $id_warga)->first();

        $data = Domisili::join('surat_pengajuan', 'surat_ket_domisili.id_surat_ket_domisili', '=', 'surat_pengajuan.id_surat')
            ->where('surat_pengajuan.id_warga', $id_warga)
            ->where('surat_pengajuan.jenis_surat', 'Surat Keterangan Domisili')
            ->select('surat_ket_domisili.*', 'surat_pengajuan.*')
            ->first(); 

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }     
    }

    public function store_surat_ket_domisili(Request $request, $id_surat_pengajuan){
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
            
            $suratpengajuan = SuratPengajuan::find($id_surat_pengajuan);
            $suratpengajuan->update([
                'id_surat' => $data->id_surat_ket_domisili,
            ]);

            $keterangan = DB::table('surat_ket_domisili')->where('id_surat_ket_domisili', $data->id_surat_ket_domisili)->first();

            if($data){
                return ApiFormatter::createApi(200, 'Success', $keterangan);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }     
    }

    public function update_surat_ket_domisili(Request $request, $id_surat_ket_domisili) {
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
        
            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }   
    }
}