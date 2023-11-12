<?php

namespace App\Http\Controllers\API\Letters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengajuanSurat extends Controller
{
    public function index()
    {
        $id_warga = auth('sanctum')->user()->id_warga;

        $data = \App\Models\SuratPengajuan::where('id_warga', $id_warga)->get();

        return response()->json([
            'message' => 'Berhasil menampilkan data',
            'data' => $data
        ]);
    }

    public function edit($id)
    {
        $data = \App\Models\SuratPengajuan::find($id);

        return response()->json([
            'message' => 'Berhasil menampilkan data',
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = \App\Models\SuratPengajuan::find($id);
        $data->update($request->all());

        return response()->json([
            'message' => 'Data berhasil diubah',
            'data' => $data
        ]);
    }
    public function destroy($id)
    {
        $data = \App\Models\SuratPengajuan::find($id);
        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
        ]);
    }
}