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

<div class="card bg-white shadow-lg mt-4">
  <div class="card-body p-4 gap-4">

    <div class="card-title p-4 bg-primary text-white rounded-lg font-normal block text-center">
      <h2 class="m-auto">
        Permohonan Surat
      </h2>
      <p class="font-normal text-sm" style="font-family: Poppins;">
        Permohonan surat yang masuk pada aplikasi ini
      </p>
    </div>

    <hr class="border-2">

    <div class="overflow-x-auto">
      <table class="table w-full">

        <thead>
          <tr>
            <th class="bg-primary text-white capitalize font-normal">Nomor</th>
            <th class="bg-primary text-white capitalize font-normal">Nama</th>
            <th class="bg-primary text-white capitalize font-normal">NIK</th>
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

          <tr id="listLetters" class="border-b-2 border-primary font-semibold p-3 text-gray-800" style="font-family: Poppins;">
            <th class="text-sm">{{$no++}}</th>
            <td class="text-sm">{{ $item->nama_warga }}</td>
            <td class="text-sm">{{ $item->nik }}</td>
            <td class="text-sm">{{ $item->jenis_surat }}</td>
            <td class="text-sm">
              {{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('dddd, D MMMM Y') }}
            </td>
            <td>
              <form action="{{ route('validasi-surat.update', ['validasi_surat' => $item->id_permohonan_surat]) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="2">

                <button type="submit" class="btn btn-outline btn-success" style="font-family: Poppins">
                  <span class="text-sm capitalize flex items-center justify-center gap-1">
                    <i class="fa fa-check"></i>
                    Terima & Verifikasi Berkas
                  </span>
                </button>
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

@section('scripts')
  {{-- <script>
    const listLetters = document.querySelector('#listLetters');
    const data = @json($data);

    function dateFormatted(date) {
      const dateObj = new Date(date);
      const day = dateObj.getDate();
      // const month = dateObj.getMonth() + 1;
      const month = dateObj.toLocaleString('default', { month: 'long' });
      const year = dateObj.getFullYear();
      return `${day} ${month} ${year}`;
    }

    function href(id_permohonan_surat, jenis_surat) {
      switch(jenis_surat) {
        case 'Surat Pengantar KTP':
          return `/admin/permohonan-ktp/${id_permohonan_surat}`;
        case 'Surat Pengantar KK':
          return `/admin/permohonan-kk/${id_permohonan_surat}`;
        case 'Surat Pengantar SKCK':
          return `/admin/permohonan-skck/${id_permohonan_surat}`;
        case 'Surat Keterangan Domisili':
          return `/admin/permohonan-domisili/${id_permohonan_surat}`;
        case 'Surat Keterangan Pindah':
          return `/admin/permohonan-pindah/${id_permohonan_surat}`;
        case 'Surat Keterangan Pindah Datang':
          return `/admin/permohonan-datang/${id_permohonan_surat}`;
        case 'Surat Keterangan Usaha':
          return `/admin/permohonan-usaha/${id_permohonan_surat}`;
        default:
          return '#';
      }
    }

    function status(statusSurat) {
      switch(statusSurat) {
        case '1': 
          return 'Permohonan Surat Pending';
        case '2':
          return 'Dokumen Diterima dan Verifikasi Berkas';
        case '3':
          return 'Proses Cetak Surat';
        case '4':
          return 'Ditandatangani Kepala Desa';
        case '5':
          return 'Surat Dapat Diambil di Kantor Kepala Desa Kembaran';
        case '6':
          return 'Permohonan Ditolak';
        default:
          return 'Status tidak diketahui';
      }
    }


    const itemLetters = data
      .filter(item => item.status === '1')
      .map((item, index) => {
      return `
        <tr class="border-b-2 border-primary font-semibold p-3 text-gray-800" style="font-family: Poppins;">
          <th class="text-sm">${index + 1}</th>
          <td class="text-sm">${item.nama_warga}</td>
          <td class="text-sm">${item.nik}</td>
          <td class="text-sm">${item.jenis_surat}</td>
          <td class="text-sm">${dateFormatted(item.tanggal)}</td>
          <td>
            <select class="select select-bordered w-full select-primary">
              <option value="${item.status}" selected disabled>${status(item.status)}</option>
              <option value="2">Dokumen Diterima dan Verifikasi Berkas</option>
              <option value="3">Proses Cetak Surat</option>
              <option value="4">Ditandatangani Kepala Desa</option>
              <option value="5">Surat Dapat Diambil di Kantor Kepala Desa Kembaran</option>
              <option value="6">Permohonan Ditolak</option>
            </select>
          </td>
          <td>
            <a href="${href(item.id_permohonan_surat, item.jenis_surat)}" class="text-sm hover:underline p-4 rounded-lg btn-info capitalize flex items-center justify-center gap-1" style="font-family: Poppins">
              <i class="fa fa-info-circle"></i>
              <span>Info</span>
            </a>
          </td>
        </tr>
      `
    }).join('');

    listLetters.innerHTML = itemLetters;
  </script> --}}
@endsection

