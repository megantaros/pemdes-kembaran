@extends('layout.admin')

@section('title', 'Daftar Warga')

@section('wargaActive', 'bg-[#e5e7eb] bg-opacity-20')

@section('content')
<dialog class="modal w-full h-full" id="modalAddWarga">
  <div class="modal-box font-normal">
      <div class="flex flex-col gap-4">

          <div class="p-4 rounded-lg bg-warning text-center">
              <h2 class="text-lg font-semibold">
                <i class="fas fa-info-circle"></i>
                <span>Tambah Warga</span>
              </h2>
              <p class="text-sm mt-2" style="font-family: Poppins">
                Tambahkan warga baru ke dalam sistem
              </p>
          </div>

          <div class="card bg-white text-left border-0">
              <form action="{{ route('warga-admin.store') }}" class="card-body bg-slate-200 rounded-lg text-sm" style="font-family: Poppins" method="POST">
                  @csrf
                  @method('POST')

                  <div class="text-label text-sm">Nama *</div>
                  <input type="text" placeholder="Masukkan Nama" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="name"/>
                  @error('name')
                  <div class="alert alert-error shadow-lg text-white w-full m-auto my-2">
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    {{-- <span>{{ $message }}</span> --}}
                    <span>Kolom Nama Wajib Diisi!</span>
                    </div>
                  </div>
                  @enderror
                  
                  <div class="text-label text-sm">Email *</div>
                  <input type="email" placeholder="Masukkan Email" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="email"/>
                  @error('email')
                  <div class="alert alert-error shadow-lg text-white w-full m-auto my-2">
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    {{-- <span>{{ $message }}</span> --}}
                    <span>Kolom Email Wajib Diisi!</span>
                    </div>
                  </div>
                  @enderror

                  <div class="text-label text-sm">Password *</div>
                  <input type="password" placeholder="Masukkan Password" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="password"/>
                  @error('password')
                  <div class="alert alert-error shadow-lg text-white w-full m-auto my-2">
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    {{-- <span>{{ $message }}</span> --}}
                    <span>Kolom Password Wajib Diisi!</span>
                    </div>
                  </div>
                  @enderror

                  <div class="text-label text-sm">Konfirmasi Password *</div>
                  <input type="password" placeholder="Masukkan Konfirmasi Password" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="conf_pass"/>
                  @error('conf_pass')
                  <div class="alert alert-error shadow-lg text-white w-full m-auto my-2">
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    {{-- <span>{{ $message }}</span> --}}
                    <span>Kolom Konfirmasi Password Wajib Diisi!</span>
                    </div>
                  </div>
                  @enderror

                  <button type="submit" class="btn btn-primary capitalize font-normal text-white mt-4">Tambah Warga</button>
                  
              </form>
          </div>
      </div>
      <div class="modal-action">
          <a href="#headerService" class="btn btn-primary text-white font-normal capitalize">Tutup</a>
      </div>
  </div>
</dialog>

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
  
      <div class="flex gap-4">
          <a href="" target="__blank" class="btn btn-success capitalize font-normal flex items-center gap-2 lg:w-2/5">
            <i class="fa fa-print" aria-hidden="true"></i>
            <span>Cetak Laporan</span>
          </a>
          <a href="#modalAddWarga" class="btn btn-success capitalize font-normal flex items-center gap-2 lg:w-2/5">
            <i class="fa fa-user-plus" aria-hidden="true"></i>
            <span>Tambah Warga</span>
          </a>
      </div>
    </div>
</div>
<div class="card bg-white shadow-lg">
    <div class="card-body p-4 gap-4">
  
      <div class="card-title p-4 bg-primary text-white rounded-lg font-normal block text-center">
        <h2 class="m-auto">
          Daftar Warga
        </h2>
        <p class="text-sm" style="font-family: Poppins">
          Daftar warga yang terdaftar di sistem
        </p>
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
                <a href="{{ route('warga-admin.show', ['warga_admin' => $item->id_warga]) }}" class="text-sm hover:underline btn btn-info flex capitalize gap-2" style="font-family: Poppins">
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

