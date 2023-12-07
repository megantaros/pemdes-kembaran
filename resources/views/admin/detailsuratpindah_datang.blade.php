
@extends('layout.admin')

@section('title', 'Detail Surat Keterangan Pindah Datang')

@section('content')
<div class="grid xl:grid-cols-6 lg:grid-cols-6 md:grid-cols-6 grid-cols-1 gap-4">

  <div class="xl:col-span-4 lg:col-span-4 md:col-span-4 col-span-1">
    <div class="card bg-white shadow-lg">
      <div class="card-body p-4">
        
        <div class="bg-slate-200 p-4 rounded-lg">
          <div class="gap-1 grid xl:grid-cols-2 lg:grid-cols-2 md:grid-cols-2 grid-cols-1">
  
            <div>
                <div class="text-label text-sm">Nama Lengkap *</div>
                <input type="text" class="input input-bordered input-primary w-full my-1 placeholder:text-sm read-only:bg-white" value="{{ $data->nama_warga }}" disabled/>
            </div>
  
            <div>
                <div class="text-label text-sm">NIK *</div>
                <input type="text" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" value="{{ $data->nik }}" disabled/>
            </div>
  
            <div class="lg:col-span-2">
                <div class="text-label text-sm">Alamat *</div>
                <textarea class="textarea textarea-primary w-full placeholder:text-sm" disabled style="background: #fff !important;">{{ $data->alamat }}</textarea>
            </div>
  
            <div class="p-4 bg-white rounded-lg relative lg:col-span-2 flex items-center border-[#9CB4CC] border-2 my-1">
  
                <div class="flex flex-1 items-center gap-4">
  
                  <div class="h-20 border-2 bg-primary rounded-lg overflow-hidden w-32">
                    <img src="{{ url('berkaspemohon/'. $data->foto_surat_ket_pindah_capil ) }}" alt="Surat Keterangan Pindah dari Capil" class="rounded-sm object-cover w-full h-full">
                  </div>
  
                  <div>
                    <h2 class="font-semibold">Surat Keterangan Pindah dari Capil</h2>
                    <p class="xl:text-sm lg:text-sm md:text-sm text-xs font-normal text-gray-500">{{ $data->foto_surat_ket_pindah_capil != null ? $data->foto_surat_ket_pindah_capil : 'Belum Upload File' }}</p>
                  </div>
  
                </div>
  
                <a href="{{ url('berkaspemohon/'. $data->foto_surat_ket_pindah_capil ) }}" target="__blank" class="text-sm hover:underline text-blue-600">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    <span>Lihat Gambar</span>
                </a>
  
            </div>
  
            <div class="p-4 bg-white rounded-lg relative xl:col-span-2 lg:col-span-2 md:col-span-2 col-span-1 flex items-center border-[#9CB4CC] border-2 my-1">
  
              @php
                  $keteranganWarga = $data->keterangan_warga;

                  if($keteranganWarga == null) {
                      $keteranganWarga = 'Belum ada keterangan dari warga';
                  }
              @endphp

              <div class="text-label text-sm">Keterangan Warga *</div>
              <textarea class="textarea textarea-primary w-full placeholder:text-sm my-1 disabled:bg-white" disabled>{{ $keteranganWarga  }}</textarea>

            </div>

            @if ($data->status == 6)
            <div class="p-4 bg-white rounded-lg relative xl:col-span-2 lg:col-span-2 md:col-span-2 col-span-1 flex items-center border-[#9CB4CC] border-2 my-1">

                @php
                    $keteranganAdmin = $data->keterangan_admin;

                    if($keteranganAdmin == '') {
                        $keteranganAdmin = 'Belum ada keterangan dari admin';
                    }
                @endphp

                <div class="text-label text-sm">Keterangan Admin *</div>
                <textarea class="textarea textarea-primary w-full placeholder:text-sm my-1" disabled>{{ $keteranganAdmin  }}</textarea>

            </div>
            @endif
          </div>
        </div>


      </div>
    </div>
  </div>

  <div class="col-span-2">
    <div class="card bg-white">
      <div class="card-body p-4">

        <form action="{{ route('validasi-surat.update', ['validasi_surat' => $data->id_permohonan_surat]) }}" method="POST" class="p-4 bg-slate-200 rounded-md">
          @csrf
          @method('PUT')
          
          <div id="keteranganAdmin" class="hidden">
            <div class="text-label text-sm">Tambah Keterangan *</div>
            <textarea class="textarea textarea-primary w-full placeholder:text-sm my-1" placeholder="Tambah Keterangan (Optional)" name="keterangan_admin">{{ $data->keterangan_admin }}</textarea>
          </div>

          @php
            $ketStatus = $data->status;
            if($ketStatus == 1) {
                $ketStatus = "Permohonan Surat Pending";
            } elseif($ketStatus == 2) {
                $ketStatus = "Dokumen Diterima dan Verifikasi Berkas";
            } elseif($ketStatus == 3) {
                $ketStatus = "Proses Surat";
            } elseif($ketStatus == 4) {
                $ketStatus = "Surat Telah Ditandatangani Kepala Desa";
            } elseif($ketStatus == 5) {
                $ketStatus = "Surat Dapat Diambil di Kantor Kepala Desa Kembaran";
            } elseif($ketStatus == 6) {
                $ketStatus = "Permohonan Ditolak";
            }
          @endphp
  
          <div class="text-label text-sm">Status Surat *</div>
          <select class="select select-bordered w-full select-primary" name="status" id="selectStatus">
            @if ($data->status == 2)
            <option value="{{ $data->status }}" selected disabled>{{$ketStatus}}</option>
            <option value="3">Proses Surat</option>
            <option value="6">Permohonan Ditolak</option>
            @else
            <option value="{{ $data->status }}" selected disabled>{{$ketStatus}}</option>
            @endif
          </select>

          @if ($data->status == 6)
          <div class="mt-4 hidden">
            <button type="submit" class="btn btn-success capitalize font-normal w-full flex items-center gap-2">
              <i class="fa fa-check" aria-hidden="true"></i>
              <span>Simpan</span>
            </button>
          </div>
          @else
          <div class="mt-4">
            <button type="submit" class="btn btn-success capitalize font-normal w-full flex items-center gap-2">
              <i class="fa fa-check" aria-hidden="true"></i>
              <span>Simpan</span>
            </button>
          </div>
          @endif

        </form>
        
      </div>
    </div>
  </div>

</div>
@endsection
