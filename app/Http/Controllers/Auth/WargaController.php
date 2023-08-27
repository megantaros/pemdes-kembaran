<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    //
    public function update(Request $request, $id_warga) {
        $data = User::find($id_warga)->first();
        $data->update($request->all());

        return redirect()->route('info.warga')->with('success', 'Data Berhasil Diupdate !');
    }
}