@extends('layout.admin')

@section('title', 'Surat Keluar')

@section('doneActive', 'bg-[#e5e7eb] bg-opacity-20')

@section('content')
<div class="card bg-white shadow-lg mb-4">
  <div class="card-body p-4 grid lg:grid-cols-2 gap-4">

    <div class="p-4 bg-slate-200 rounded-lg">

      <div>
        <label class="text-label text-sm">Cari</label>
        <input id="search" type="text" placeholder="Cari disini..." class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm"/>
      </div>

    </div>


    <div class="p-4 bg-slate-200 rounded-lg">
      <label for="" class="text-label text-sm">Tanggal</label>

      <div class="flex items-center gap-2">
        <input type="text" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="daterange" value="11/01/2023 - 11/30/2023" />
      </div>

    </div>

    <div>
        <form action="{{ route('cetak.surat', request()->query()) }}" method="GET" target="_blank">
          @csrf
          @method('GET')

          <input type="hidden" name="startDate"/>
          <input type="hidden" name="endDate"/>

          <button type="submit" class="btn btn-success capitalize font-normal flex items-center gap-2 lg:w-2/5">
              <i class="fa fa-print" aria-hidden="true"></i>
              <span>Cetak Laporan</span>
          </button>
        </form>
    </div>  
  </div>
</div>

<div class="card bg-white shadow-lg">
  <div class="card-body p-4 gap-4">

    <div class="card-title p-4 bg-primary text-white rounded-lg font-normal block text-center">
        <h2 class="m-auto">
            Daftar Surat Keluar
        </h2>
        <p class="font-normal text-sm" style="font-family: Poppins;">
          Berikut adalah daftar surat keluar yang telah diproses oleh admin
        </p>
    </div>

    <hr class="border-2">

    <div class="overflow-x-auto">
      <table id="listLetters" class="table w-full">

        <thead>
          <tr>
            <th class="bg-primary text-white capitalize font-normal">Nomor</th>
            <th class="bg-primary text-white capitalize font-normal">Kode Surat</th>
            <th class="bg-primary text-white capitalize font-normal">Nama</th>
            {{-- <th class="bg-primary text-white capitalize font-normal">Nama</th>
            <th class="bg-primary text-white capitalize font-normal">NIK</th> --}}
            <th class="bg-primary text-white capitalize font-normal">Jenis Surat</th>
            <th class="bg-primary text-white capitalize font-normal">Tanggal Diterbitkan</th>
            {{-- <th class="bg-primary text-white capitalize font-normal">Keterangan</th> --}}
            <th class="bg-primary text-white capitalize font-normal">Aksi</th>
          </tr>
        </thead>

        <tbody>

          @php
          $no = 1;
          @endphp

          @foreach ($data as $item)

          @php
            $jenisSurat = $item->jenis_surat;

            if($jenisSurat == "Surat Pengantar KTP") {
                $jenisSurat = route("permohonan-ktp.show", ['permohonan_ktp' => $item->id_permohonan_surat]);
            } elseif($jenisSurat == "Surat Pengantar KK") {
                $jenisSurat = route("permohonan-kk.show", ['permohonan_kk' => $item->id_permohonan_surat]);
            } elseif($jenisSurat == "Surat Pengantar SKCK") {
                $jenisSurat = route("permohonan-skck.show", ['permohonan_skck' => $item->id_permohonan_surat]);
            } elseif($jenisSurat == "Surat Keterangan Domisili") {
                $jenisSurat = route("permohonan-domisili.show", ['permohonan_domisili' => $item->id_permohonan_surat]);
            } elseif($jenisSurat == "Surat Keterangan Pindah") {
                $jenisSurat = route("permohonan-pindah.show", ['permohonan_pindah' => $item->id_permohonan_surat]);
            } elseif($jenisSurat == "Surat Keterangan Pindah Datang") {
                $jenisSurat = route("permohonan-datang.show", ['permohonan_datang' => $item->id_permohonan_surat]);
            } elseif($jenisSurat == "Surat Keterangan Usaha") {
                $jenisSurat = route("permohonan-usaha.show", ['permohonan_usaha' => $item->id_permohonan_surat]);
            }
          @endphp

          <tr id="listLetters" class="border-b-2 border-primary font-semibold p-3 text-gray-800" style="font-family: Poppins;">
            <th class="text-sm">{{$no++}}</th>
            <td class="text-sm uppercase">{{ substr($item->id_permohonan_surat, 0, 6) }}</td>
            <td class="text-sm">{{ $item->nama_warga }}</td>
            <td class="text-sm">{{ $item->jenis_surat }}</td>
            <td class="text-sm">
              {{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('DD MMMM YYYY') }}
            </td>
            {{-- <td>
              <textarea class="textarea textarea-primary w-full placeholder:text-sm" placeholder="Tulis disini..." disabled rows="1">{{ $item->keterangan_warga ? $item->keterangan_warga : 'Belum ada keterangan' }}</textarea>
            </td> --}}
            <td>
              <a href="{{ $jenisSurat }}" class="btn btn-outline btn-info gap-2 capitalize" style="font-family: Poppins">
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