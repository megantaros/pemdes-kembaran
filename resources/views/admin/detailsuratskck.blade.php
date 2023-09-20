
@extends('layout.admin')

@section('title', 'Detail Surat Pengajuan SKCK')

@section('content')
<div class="grid lg:grid-cols-6 gap-4">

  <div class="lg:col-span-4 md:col-span-6 col-span-6">
    <div class="card bg-white shadow-lg">
      <div class="card-body p-4">
        
        <div class="bg-slate-200 p-4 rounded-lg">
          <div class="gap-1 grid lg:grid-cols-2">
  
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
                <textarea class="textarea textarea-primary w-full placeholder:text-sm">{{ $data->alamat }}</textarea>
            </div>
  
            <div>
                <div class="text-label text-sm">KK *</div>
                <input type="text" placeholder="Masukkan No. KK" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="kk" value="{{ $data->kk }}" disabled/>
            </div>
  
            <div>
                <div class="text-label text-sm">Kewarganegaraan *</div>
                <input type="text" placeholder="Masukkan No. KK" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="kewarganegaraan" value="{{ $data->kewarganegaraan }}" disabled/>
            </div>
  
            <div class="p-4 bg-white rounded-lg relative lg:col-span-2 flex items-center border-[#9CB4CC] border-2 my-1">
  
                <div class="flex flex-1 items-center gap-4">
  
                  <div class="h-20 border-2 bg-primary rounded-lg p-2 overflow-hidden w-32">
                    <img src="{{ url('berkaspemohon/'. $data->pengantar_rt ) }}" alt="Pengantar RT" class="rounded-sm h-20 object-cover m-auto">
                  </div>
  
                  <div>
                    <h2 class="font-semibold">Surat Pengantar RT</h2>
                    <p class="text-sm font-semibold text-gray-500">{{ $data->pengantar_rt != null ? $data->pengantar_rt : 'Belum Upload File' }}</p>
                  </div>
  
                </div>
  
                <a href="{{ url('berkaspemohon/'. $data->pengantar_rt ) }}" target="__blank" class="text-sm hover:underline text-blue-600">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    <span>Lihat Gambar</span>
                </a>
  
            </div>
  
            <div class="p-4 bg-white rounded-lg relative lg:col-span-2 flex items-center border-[#9CB4CC] border-2 my-1">
  
              <div class="flex flex-1 items-center gap-4">
  
                <div class="h-20 border-2 bg-primary rounded-lg p-2 overflow-hidden w-32">
                  <img src="{{ url('berkaspemohon/'. $data->fc_ktp ) }}" alt="Pengantar RT" class="rounded-sm h-20 object-cover m-auto">
                </div>
  
                <div>
                  <h2 class="font-semibold">Fotokopi KTP</h2>
                  <p class="text-sm font-semibold text-gray-500">{{ $data->fc_ktp != null ? $data->fc_ktp : 'Belum Upload File' }}</p>
                </div>
  
              </div>
  
              <a href="{{ url('berkaspemohon/'. $data->fc_ktp ) }}" target="__blank" class="text-sm hover:underline text-blue-600">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                  <span>Lihat Gambar</span>
              </a>
  
            </div>
  
            <div class="p-4 bg-white rounded-lg relative lg:col-span-2 flex items-center border-[#9CB4CC] border-2 my-1">
  
                @php
                    $keteranganWarga = $data->keterangan_warga;
  
                    if($keteranganWarga == null) {
                        $keteranganWarga = 'Belum ada keterangan dari warga';
                    }
                @endphp
  
                <div class="text-label text-sm">Keterangan Warga *</div>
                <textarea class="textarea textarea-primary w-full placeholder:text-sm my-1 disabled:bg-white">{{ $keteranganWarga  }}</textarea>
  
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>

  <div class="col-span-2">
    <div class="card bg-white">
      <div class="card-body p-4">

        <form action="{{ route('validasi-surat.update', ['validasi_surat' => $data->id_surat_pengajuan]) }}" method="POST" class="p-4 bg-slate-200 rounded-md">
          @csrf
          @method('PUT')
          
          <div class="text-label text-sm">Tambah Keterangan *</div>
          <textarea class="textarea textarea-primary w-full placeholder:text-sm my-1" placeholder="Tambah Keterangan (Optional)" name="keterangan_admin">{{ $data->keterangan_admin }}</textarea>
  
          <div class="text-label text-sm">Status Surat *</div>
          <select class="select select-bordered w-full select-primary" name="status">
            <option value="{{ $data->status }}" selected disabled>{{ $data->status }}</option>
            <option value="Diterima">Diterima</option>
            <option value="Ditolak">Ditolak</option>
          </select>

          <div class="mt-4">
            <button type="submit" class="btn btn-success capitalize font-normal w-full flex items-center gap-2">
              <i class="fa fa-check" aria-hidden="true"></i>
              <span>Simpan</span>
            </button>
          </div>

        </form>
        
      </div>
    </div>
  </div>

</div>
@endsection
