<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    //
    public function edit($id_warga) {
        $data = \App\Models\User::find($id_warga);

        return view('users.updateprofile', ['id_warga' => $data->id_warga]);
    }
    public function update(Request $request, $id_warga) {
        $data = \App\Models\User::find($id_warga);
        $data->update($request->except(['password', 'conf_pass']));

        if ($request->password != $request->conf_pass) {
            return redirect()->back()->with('error', 'Password Tidak Sama !');
        } else{
            $data->password = bcrypt($request->password);
            $data->save();
        }
        
        return redirect()->back()->with('success', 'Data Berhasil Diupdate !');
    }
}