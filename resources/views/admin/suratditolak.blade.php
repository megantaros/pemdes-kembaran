@extends('layout.admin')

@section('title', 'Surat Ditolak')

@section('rejectedActive', 'bg-[#e5e7eb] bg-opacity-20')

@section('content')
<div class="card bg-white shadow-lg mb-4">
  <div class="card-body p-4 grid lg:grid-cols-2 gap-4">

    <div class="p-4 bg-slate-200 rounded-lg">

      <div>
        <label for="" class="text-label text-sm">Cari</label>
        <input id="search" type="text" placeholder="Cari disini..." class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm"/>
      </div>

    </div>

    <div class="p-4 bg-slate-200 rounded-lg">
      <form action="{{ route('daftar.surat', ['status_surat' => 'terkirim']) }}" method="GET">
        @csrf
        @method('GET')
        <input type="hidden" name="startDate"/>
        <input type="hidden" name="endDate"/>
        <label for="" class="text-label text-sm">Tanggal</label>

        <div class="flex items-center gap-2">
          <input type="text" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="daterange" value="01/01/2023 - 01/15/2023" />
          <button type="submit" class="btn btn-primary capitalize font-normal text-white">Cek</button>
        </div>
      </form>

    </div>


    

    {{-- <div class="p-4">
      <div class="card-title">Surat Masuk</div>
      <div class="flex gap-2">
        <a href="{{ route('daftar.surat', ['status_surat' => 'terkirim']) }}" class="btn btn-info flex items-center gap-2" style="font-family: Poppins">
          <i class="fa fa-inbox" aria-hidden="true"></i>
          <span>Surat Masuk</span>
        </a>
        <a href="{{ route('daftar.surat', ['status_surat' => 'ditolak']) }}" class="btn btn-danger flex items-center gap-2" style="font-family: Poppins">
          <i class="fa fa-times" aria-hidden="true"></i>
          <span>Surat Ditolak</span>
        </a>
        <a href="{{ route('daftar.surat', ['status_surat' => 'diterima']) }}" class="btn btn-success flex items-center gap-2" style="font-family: Poppins">
          <i class="fa fa-check" aria-hidden="true"></i>
          <span>Surat Diterima</span>
        </a>
      </div>
    </div> --}}

      
  </div>
</div>

<div class="card bg-white shadow-lg">
  <div class="card-body p-4 gap-4">

      <div class="card-title p-4 bg-primary text-white rounded-lg font-normal block text-center">
        <h2 class="m-auto">
          Daftar Surat Ditolak
        </h2>
        <p class="font-normal text-sm" style="font-family: Poppins;">
          Berikut adalah daftar surat ditolak yang telah dikirimkan oleh warga
        </p>
      </div>

      <hr class="border-2">

      <div class="overflow-x-auto">

        <table id="listLetters" class="table w-full">

          <thead>
            <tr>
              <th class="bg-primary text-white capitalize font-normal">Nomor</th>
              <th class="bg-primary text-white capitalize font-normal">Nama</th>
              <th class="bg-primary text-white capitalize font-normal">NIK</th>
              <th class="bg-primary text-white capitalize font-normal">Jenis Surat</th>
              <th class="bg-primary text-white capitalize font-normal">Tanggal Diajukan</th>
              <th class="bg-primary text-white capitalize font-normal">Keterangan</th>
              <th class="bg-primary text-white capitalize font-normal">Aksi</th>
            </tr>
          </thead>

          <tbody>

            @php
            $no = 1;
            @endphp

            @foreach ($data as $item)

            @php
              $statusSurat = $item->status;
              
              if($statusSurat == "Terkirim"){
                  $statusSurat = "text-orange-500";
              } elseif($statusSurat == "Ditolak"){
                  $statusSurat = "text-red-800";
              } else {
                  $statusSurat = "text-green-800";
              }

              $jenisSurat = $item->jenis_surat;

              if($jenisSurat == "Surat Pengantar KTP") {
                  $jenisSurat = route("pengantar-ktp.show", ['pengantar_ktp' => $item->id_surat]);
              } elseif($jenisSurat == "Surat Pengantar KK") {
                  $jenisSurat = route("pengantar-kk.show", ['pengantar_kk' => $item->id_surat]);
              } elseif($jenisSurat == "Surat Pengantar SKCK") {
                  $jenisSurat = route("pengantar-skck.show", ['pengantar_skck' => $item->id_surat]);
              } elseif($jenisSurat == "Surat Keterangan Domisili") {
                  $jenisSurat = route("keterangan-domisili.show", ['keterangan_domisili' => $item->id_surat]);
              } elseif($jenisSurat == "Surat Keterangan Pindah") {
                  $jenisSurat = route("keterangan-pindah.show", ['keterangan_pindah' => $item->id_surat]);;
              } elseif($jenisSurat == "Surat Keterangan Pindah Datang") {
                  $jenisSurat = route("keterangan-datang.show", ['keterangan_datang' => $item->id_surat]);;
              } elseif($jenisSurat == "Surat Keterangan Usaha") {
                  $jenisSurat = route("keterangan-usaha.show", ['keterangan_usaha' => $item->id_surat]);
              }
            @endphp

            <tr class="border-b-2 border-primary font-semibold p-3 text-gray-800" style="font-family: Poppins;">
              <th class="text-sm">{{$no++}}</th>
              <td class="text-sm">{{ $item->name }}</td>
              <td class="text-sm">{{ $item->nik }}</td>
              <td class="text-sm">{{ $item->jenis_surat }}</td>
              <td class="text-sm">
                {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM Y') }}
              </td>
              <td>
                <textarea class="textarea textarea-primary w-full placeholder:text-sm" placeholder="Tulis disini..." disabled rows="1">{{ $item->keterangan_warga }}</textarea>
              </td>
              <td>
                <a href="{{ $jenisSurat }}" class="text-sm hover:underline btn btn-info flex capitalize gap-2" style="font-family: Poppins">
                  <i class="fa fa-info-circle"></i>
                  <span>Detail</span>
                </a>
              </td>
            </tr>

            @endforeach

          </tbody>
        </table>
      </div>
  </div>
</div>
@endsection