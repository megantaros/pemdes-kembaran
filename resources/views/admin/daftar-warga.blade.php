@extends('layout.admin')

@section('title', 'Daftar Warga')

@section('wargaActive', 'bg-[#e5e7eb] bg-opacity-20')

@section('content')
<div class="card bg-white shadow-lg mb-4">
    <div class="card-body p-4 grid lg:grid-cols-2 gap-4">
  
      <div class="p-4 bg-slate-200 rounded-lg">
  
          <div>
              <label for="" class="text-label text-sm">Cari</label>
              <input id="searchWarga" type="text" placeholder="Cari disini..." class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm"/>
          </div>
  
      </div>
  
      <div class="p-4 bg-slate-200 rounded-lg">
        <form action="{{ route('daftar.surat', ['status_surat' => 'keluar']) }}" method="GET">
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
  
      <div>
          <a href="" target="__blank" class="btn btn-success capitalize font-normal flex items-center gap-2 lg:w-2/5">
              <i class="fa fa-print" aria-hidden="true"></i>
              <span>Cetak Laporan</span>
          </a>
      </div>
    </div>
</div>
<div class="card bg-white shadow-lg">
    <div class="card-body p-4 gap-4">
  
      <div class="card-title p-4 bg-primary text-white rounded-lg font-normal">
        <h2 class="m-auto">
          Daftar Warga
        </h2>
      </div>
  
      <hr class="border-2">
  
      <div class="overflow-x-auto">
        <table id="listWarga" class="table w-full">
  
          <thead>
            <tr>
              <th class="bg-primary text-white capitalize font-normal">Nomor</th>
              <th class="bg-primary text-white capitalize font-normal">NIK</th>
              <th class="bg-primary text-white capitalize font-normal">Nama</th>
              <th class="bg-primary text-white capitalize font-normal">Email</th>
              <th class="bg-primary text-white capitalize font-normal">Nomor Telephone</th>
              <th class="bg-primary text-white capitalize font-normal">Jenis Kelamin</th>
              <th class="bg-primary text-white capitalize font-normal">Tanggal Daftar</th>
              <th class="bg-primary text-white capitalize font-normal">Aksi</th>
            </tr>
          </thead>
  
          <tbody>
  
            @php
            $no = 1;
            @endphp
  
            @foreach ($data as $item)
            <tr class="border-b-2 border-primary font-semibold p-3 text-gray-800" style="font-family: Poppins;">
              <th class="text-sm">{{$no++}}</th>
              <td class="text-sm">{{ $item->nik }}</td>
              <td class="text-sm">{{ $item->name }}</td>
              <td class="text-sm">{{ $item->email }}</td>
              <td class="text-sm">{{ $item->notelpon }}</td>
              <td class="text-sm">{{ $item->jenis_kelamin }}</td>
              <td class="text-sm">
                {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM Y') }}
              </td>
              <td>
                <a href="{{ route('warga.show', ['warga' => $item->id_warga]) }}" class="text-sm hover:underline btn btn-info flex capitalize gap-2" style="font-family: Poppins">
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
