@extends('layout.admin')

@section('title', 'Surat Dalam Proses')

@section('processedActive', 'bg-[#e5e7eb] bg-opacity-20')

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

      <input type="hidden" name="startDate"/>
      <input type="hidden" name="endDate"/>

      <div class="flex items-center gap-2">
        <input type="text" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="daterange" value="01/01/2023 - 01/15/2023" />
      </div>

    </div>
  </div>
</div>

<div class="card bg-white shadow-lg">
  <div class="card-body p-4 gap-4">

    <div class="card-title p-4 bg-primary text-white rounded-lg font-normal block text-center">
      <h2 class="m-auto">
        Daftar Surat yang Diproses
      </h2>
      <p class="font-normal text-sm" style="font-family: Poppins;">
        Berikut adalah daftar surat yang sedang diproses oleh admin
      </p>
    </div>

    <hr class="border-2">

    <div class="overflow-x-auto">
      <table class="table w-full">

        <thead>
          <tr>
            <th class="bg-primary text-white capitalize font-normal">Nomor</th>
            <th class="bg-primary text-white capitalize font-normal">Kode Surat</th>
            <th class="bg-primary text-white capitalize font-normal">Nama</th>
            {{-- <th class="bg-primary text-white capitalize font-normal">Nama</th>
            <th class="bg-primary text-white capitalize font-normal">NIK</th> --}}
            <th class="bg-primary text-white capitalize font-normal">Jenis Surat</th>
            <th class="bg-primary text-white capitalize font-normal">Tanggal Diajukan</th>
            <th class="bg-primary text-white capitalize font-normal">Aksi</th>
          </tr>
        </thead>

        <tbody>

          @php
          $no = 1;
          @endphp

          @foreach ($data as $item)
          {{-- Modal Reject Kades --}}
            <dialog class="modal w-full h-full" id="modalRejectKades">
                <div class="modal-box font-normal">
                    <div class="flex flex-col gap-4">
                        <div class="p-4 rounded-lg bg-error text-center text-white">
                            <h2 class="text-lg font-normal">
                                <i class="fas fa-info-circle"></i>
                                <span>Permohonan Ditolak</span>
                            </h2>
                            <p class="text-sm mt-2" style="font-family: Poppins">
                                Tambahkan keterangan
                            </p>
                        </div>
            
                        <div class="card bg-white text-left border-0">
                            <div class="card-body bg-slate-200 rounded-lg text-sm p-4" style="font-family: Poppins">
                                <form action="{{ route('validasi-surat.update', ['validasi_surat' => $item->id_permohonan_surat]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="6" />
                
                                    <div class="text-label text-sm">Keterangan Admin *</div>
                                    <textarea name="keterangan_admin" cols="30"class="input input-bordered input-primary w-full read-only:bg-[#9cb4cc] placeholder:text-sm h-20 font-semibold p-2 text-primary"></textarea>
                
                                    <button type="submit" class="btn btn-primary capitalize font-normal text-white mt-4" style="font-family: Viga">Tambah Keterangan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-action">
                        <a href="#"
                            class="btn btn-outline btn-ghost font-normal capitalize">Tutup</a>
                    </div>
                </div>
            </dialog>
          {{-- End Modal Reject Kades --}}


          <tr id="listLetters" class="border-b-2 border-primary font-semibold p-3 text-gray-800" style="font-family: Poppins;">
            <th class="text-sm">{{$no++}}</th>
            <td class="text-sm uppercase">{{ substr($item->id_permohonan_surat, 0, 6) }}</td>
            <td class="text-sm">{{ $item->nama_warga }}</td>
            {{-- <td class="text-sm">{{ $item->nik }}</td> --}}
            <td class="text-sm">{{ $item->jenis_surat }}</td>
            <td class="text-sm">
              {{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('DD MMMM YYYY') }}
            </td>
            <td>
                <form action="{{ route('validasi-surat.update', ['validasi_surat' => $item->id_permohonan_surat]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="4">
                
                    <button type="submit" class="btn btn-outline btn-success capitalize" style="font-family: Poppins">
                      <span class="flex items-center justify-center text-sm gap-1">
                        <i class="fa fa-check"></i>
                        Acc Kades
                      </span>
                    </button>

                    <a href="#modalRejectKades" class="btn btn-outline btn-error capitalize" style="font-family: Poppins">
                      <span class="flex items-center justify-center text-sm gap-1">
                        <i class="fa fa-x"></i>
                        Reject Kades
                      </span>
                    </a>
                </form>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection