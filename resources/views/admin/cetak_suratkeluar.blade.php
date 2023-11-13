
@extends('layout.cetaksurat')

@section('content')
    <div class="container-fluid">
        <h4 class="text-center my-4">Laporan Surat Keluar</h4>
        <table class="table table-bordered border-dark border">
            <thead class="table-active">
              <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIK</th>
                <th scope="col">Jenis Surat</th>
                <th scope="col">Tanggal Diterbitkan</th>
              </tr>
            </thead>
            <tbody>
              @php
              $no = 1;
              @endphp  
              @foreach ($data as $index => $surat)
              <tr>
                <th scope="row" class="text-center">{{ $no++ }}</th>
                <td>{{ $surat->nama_warga }}</td>
                <td>{{ $surat->nik }}</td>
                <td>{{ $surat->jenis_surat }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($surat->updated_at)->isoFormat('DD MMMM YYYY') }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection