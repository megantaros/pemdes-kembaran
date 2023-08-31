@extends('layout.admin')

@section('title', 'Dashboard')

@section('dashboardActive', 'bg-[#e5e7eb] bg-opacity-20')

@section('content')
<div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-2 gap-4">

  <div class="card bg-white rounded-none border-l-4 border-primary shadow-lg">
    <div class="card-body p-4">
      <div class="card-title">Surat Masuk</div>
      <div class="p-4 bg-slate-200 rounded-md flex items-center justify-between">
        <i class="fas fa-inbox fa-2x text-slate-500"></i>
        <h2 class="font-bold text-xl">{{ $suratMasuk }}</h2>
      </div>
    </div>
  </div>

  <div class="card bg-white rounded-none border-l-4 border-success shadow-lg">
    <div class="card-body p-4">
      <div class="card-title text-green-900">Surat Keluar</div>
      <div class="p-4 bg-green-200 rounded-md flex items-center justify-between">
        <i class="fas fa-list-alt fa-2x text-success"></i>
        <h2 class="font-bold text-xl text-success">{{ $suratKeluar }}</h2>
      </div>
    </div>
  </div>

  <div class="card bg-white rounded-none border-l-4 border-error shadow-lg">
    <div class="card-body p-4">
      <div class="card-title text-red-900">Surat Ditolak</div>
      <div class="p-4 bg-red-200 rounded-md flex items-center justify-between">
        <i class="fas fa-times fa-2x text-error"></i>
        <h2 class="font-bold text-xl text-error">{{ $suratDitolak }}</h2>
      </div>
    </div>
  </div>

  <div class="card bg-white rounded-none border-l-4 border-warning shadow-lg">
    <div class="card-body p-4">
      <div class="card-title text-yellow-900">Warga</div>
      <div class="p-4 bg-yellow-200 rounded-md flex items-center justify-between">
        <i class="fas fa-users fa-2x text-warning"></i>
        <h2 class="font-bold text-xl text-warning">{{ $warga }}</h2>
      </div>
    </div>
  </div>


</div>
@endsection

