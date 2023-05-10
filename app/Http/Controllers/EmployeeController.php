<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $data = Employee::all();
        return view('homepage', compact('data'));
    }

    public function tampilpegawai(){
        $data = Employee::all();
        return $data;
    }
    
    public function tambahpegawai(){
        return view('tambahdata');
    }
    public function insertdata(Request $request){
        // dd($request->all());
        // Employee::create($request->all());
        $data = Employee::create($request->all());
        if ($request->hasFile('foto'))
            {
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
            };
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function tampilkandata($id){
        $data = Employee::find($id);
        // dd($data); 
        return view('tampildata', compact('data'));
    }
    public function updatedata(Request $request, $id){
        $data = Employee::find($id);
        $data->update($request->all());
        if ($request->hasFile('foto'))
            {
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
            };
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Diupdate');
    }
    public function delete($id){
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data Berhasil Dihapus');
    }
}