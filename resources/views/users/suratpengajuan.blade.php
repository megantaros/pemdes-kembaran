
@extends('layout.profil')

@section('title', 'Permohonan Surat')

@section('content')
<div class="lg:col-span-3">
    <div class="card bg-white min-h-screen shadow-lg">
        <div class="card-body">
            <div>
                <h2 class="lg:text-lg md:text-sm text-sm font-semibold">Permohonan Surat</h2>
                <div class="flex">
                    <p class="lg:text-md md:text-sm text-sm" style="font-family: Poppins">Tunggu validasi dari KASI Pelayanan</p>
                </div>
            </div>

            <hr class="my-4">

            @foreach($data as $row)

            @php
                $statusSurat = $row->status;
                
                if($statusSurat == "Terkirim"){
                    $statusSurat = "text-orange-500";
                } elseif($statusSurat == "Ditolak"){
                    $statusSurat = "text-red-800";
                } else {
                    $statusSurat = "text-green-800";
                }

                $jenisSurat = $row->jenis_surat;

                if($jenisSurat == "Surat Pengantar KTP") {
                    $jenisSurat = route("pengantar-ktp.edit", ['pengantar_ktp' => $row->id_surat]);
                } elseif($jenisSurat == "Surat Pengantar KK") {
                    $jenisSurat = route("pengantar-kk.edit", ['pengantar_kk' => $row->id_surat]);
                } elseif($jenisSurat == "Surat Pengantar SKCK") {
                    $jenisSurat = route("pengantar-skck.edit", ['pengantar_skck' => $row->id_surat]);
                } elseif($jenisSurat == "Surat Keterangan Domisili") {
                    $jenisSurat = route("keterangan-domisili.edit", ['keterangan_domisili' => $row->id_surat]);
                } elseif($jenisSurat == "Surat Keterangan Pindah") {
                    $jenisSurat = route("keterangan-pindah.edit", ['keterangan_pindah' => $row->id_surat]);;
                } elseif($jenisSurat == "Surat Keterangan Pindah Datang") {
                    $jenisSurat = route("keterangan-datang.edit", ['keterangan_datang' => $row->id_surat]);;
                } elseif($jenisSurat == "Surat Keterangan Usaha") {
                    $jenisSurat = route("keterangan-usaha.edit", ['keterangan_usaha' => $row->id_surat]);
                }

            @endphp

            <div class="card bg-slate-200 border-l-4 border-primary rounded-none">
                <div class="card-body p-4">
                    <div class="grid grid-cols-3">
                        <div class="col-span-2">
                            <h2 class="mb-2">{{ $row->jenis_surat }}</h2>
        
                            <div class="text-xs" style="font-family: Poppins">
                                Diajukan pada: <span class="font-semibold">{{ $row->created_at }}</span>
                            </div>

                            <div class="text-xs" style="font-family: Poppins">
                                Status: <span class="font-semibold {{ $statusSurat }}">{{ $row->status }}</span>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-end items-center h-full gap-4">
                                <a href="{{ $jenisSurat }}" class="text-sm hover:underline" style="font-family: Poppins">
                                    <i class="fa fa-info-circle"></i>
                                    <span>Detail</span>
                                </a>

                                <form id="formHapus" action="{{ route('pengajuan-surat.destroy', ['pengajuan_surat' => $row->id]) }}" method="POST" data-id="{{ $row->id }}" data-jenis="{{ $row->jenis_surat }}" class="{{ $row->status == 'Diterima' ? 'hidden' : '' }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm hover:underline text-error" style="font-family: Poppins">
                                        <i class="fa fa-trash"></i>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- <div class="overflow-x-auto">
                <table class="table w-full tabel-surat shadow-md">
                    <!-- head -->
                    <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Surat</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status Surat</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no=1 ?>
                    @foreach($data as $row)
                    <tr>
                        <th class="text-center">{{ $no++ }}</th>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->jenis_surat }}</td>
                        <td class="text-center">{{ $row->created_at }}</td>
                        <td>
                            @if($row->status == "Terkirim")
                            <div class="p-2 bg-orange-500 rounded-lg text-white text-center font-normal">{{ $row->status }}</div>
                            @elseif ($row->status == "Ditolak") 
                            <div class="p-2 bg-red-800 rounded-lg text-white text-center font-normal">{{ $row->status }}</div>
                            @else
                            <div class="p-2 bg-green-800 rounded-lg text-white text-center font-normal">{{ $row->status }}</div>
                            @endif
                        </td>
                        @if($row->status == "Terkirim")
                        <td class="flex gap-2">
                            @if($row->jenis_surat == 'Surat Keterangan Domisili')
                            <a href="{{ route('keterangan-domisili.show', ['keterangan_domisili' => $row->id_surat]) }}" class="btn btn-warning border-none w-50">
                                <i class="bi bi-envelope-paper text-2xl"></i>
                            </a>
                            @elseif($row->jenis_surat == 'Surat Pengantar SKCK')
                            <a href="{{ route('pengantar-skck.show', ['pengantar_skck' => $row->id_surat]) }}" class="btn btn-warning border-none w-50">
                                <i class="bi bi-envelope-paper text-2xl"></i>
                            </a>
                            @elseif($row->jenis_surat == 'Surat Pengantar KTP')
                            <a href="{{ route('pengantar-ktp.show', ['pengantar_ktp' => $row->id_surat]) }}" class="btn btn-warning border-none w-50">
                                <i class="bi bi-envelope-paper text-2xl"></i>
                            </a>
                            @elseif($row->jenis_surat == 'Surat Pengantar KK')
                            <a href="{{ route('pengantar-kk.show', ['pengantar_kk' => $row->id_surat]) }}" class="btn btn-warning border-none w-50">
                                <i class="bi bi-envelope-paper text-2xl"></i>
                            </a>
                            @elseif($row->jenis_surat == 'Surat Keterangan Pindah')
                            <a href="{{ route('keterangan-pindah.show', ['keterangan_pindah' => $row->id_surat]) }}" class="btn btn-warning border-none w-50">
                                <i class="bi bi-envelope-paper text-2xl"></i>
                            </a>
                            @elseif($row->jenis_surat == 'Surat Keterangan Pindah Datang')
                            <a href="{{ route('keterangan-datang.show', ['keterangan_datang' => $row->id_surat]) }}" class="btn btn-warning border-none w-50">
                                <i class="bi bi-envelope-paper text-2xl"></i>
                            </a>
                            @elseif($row->jenis_surat == 'Surat Keterangan Usaha')
                            <a href="{{ route('keterangan-usaha.show', ['keterangan_usaha' => $row->id_surat]) }}" class="btn btn-warning border-none w-50">
                                <i class="bi bi-envelope-paper text-2xl"></i>
                            </a>
                            @endif
                            <form action="{{ route('pengajuan-surat.destroy', ['pengajuan_surat' => $row->id]) }}" class="btn form-hapus text-white bg-red-800 hover:bg-red-900 border-none w-50" method="POST" data-id="{{ $row->id }}" data-jenis="{{ $row->jenis_surat }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="bi bi-trash text-2xl"></i>
                                </button>
                            </form>
                        </td>
                        @elseif($row->status == "Diterima")
                        <td>
                            @if($row->jenis_surat == 'Surat Keterangan Domisili')
                            <a href="{{ route('keterangan-domisili.show', ['keterangan_domisili' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                <i class="bi bi-envelope-check-fill text-2xl"></i>
                            </a>
                            @elseif($row->jenis_surat == 'Surat Pengantar SKCK')
                            <a href="{{ route('pengantar-skck.show', ['pengantar_skck' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                <i class="bi bi-envelope-check-fill text-2xl"></i>
                            </a>
                            @elseif($row->jenis_surat == 'Surat Pengantar KTP')
                            <a href="{{ route('pengantar-ktp.show', ['pengantar_ktp' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                <i class="bi bi-envelope-check-fill text-2xl"></i>
                            </a>
                            @elseif($row->jenis_surat == 'Surat Pengantar KK')
                            <a href="{{ route('pengantar-kk.show', ['pengantar_kk' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                <i class="bi bi-envelope-check-fill text-2xl"></i>
                            </a>
                            @elseif($row->jenis_surat == 'Surat Keterangan Pindah')
                            <a href="{{ route('keterangan-pindah.show', ['keterangan_pindah' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                <i class="bi bi-envelope-check-fill text-2xl"></i>
                            </a>
                            @elseif($row->jenis_surat == 'Surat Keterangan Pindah Datang')
                            <a href="{{ route('keterangan-datang.show', ['keterangan_datang' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                <i class="bi bi-envelope-check-fill text-2xl"></i>
                            </a>
                            @elseif($row->jenis_surat == 'Surat Keterangan Usaha')
                            <a href="{{ route('keterangan-usaha.show', ['keterangan_usaha' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                <i class="bi bi-envelope-check-fill text-2xl"></i>
                            </a>
                            @endif
                        </td>
                        @else
                        <td>
                            @if($row->jenis_surat == 'Surat Keterangan Domisili')
                            <a href="{{ route('keterangan-domisili.show', ['keterangan_domisili' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                <i class="bi bi-envelope-exclamation-fill text-2xl"></i>
                            </a>
                            @elseif($row->jenis_surat == 'Surat Pengantar SKCK')
                            <a href="{{ route('pengantar-skck.show', ['pengantar_skck' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                <i class="bi bi-envelope-exclamation-fill text-2xl"></i>
                            </a>
                            @elseif($row->jenis_surat == 'Surat Pengantar KTP')
                            <a href="{{ route('pengantar-ktp.show', ['pengantar_ktp' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                <i class="bi bi-envelope-exclamation-fill text-2xl"></i>
                            </a>
                            @elseif($row->jenis_surat == 'Surat Pengantar KK')
                            <a href="{{ route('pengantar-kk.show', ['pengantar_kk' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                <i class="bi bi-envelope-exclamation-fill text-2xl"></i>
                            </a>
                            @elseif($row->jenis_surat == 'Surat Keterangan Pindah')
                            <a href="{{ route('keterangan-pindah.show', ['keterangan_pindah' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                <i class="bi bi-envelope-exclamation-fill text-2xl"></i>
                            </a>
                            @elseif($row->jenis_surat == 'Surat Keterangan Pindah Datang')
                            <a href="{{ route('keterangan-datang.show', ['keterangan_datang' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                <i class="bi bi-envelope-exclamation-fill text-2xl"></i>
                            </a>
                            @elseif($row->jenis_surat == 'Surat Keterangan Usaha')
                            <a href="{{ route('keterangan-usaha.show', ['keterangan_usaha' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                <i class="bi bi-envelope-exclamation-fill text-2xl"></i>
                            </a>
                            @endif
                        </td>
                        @endif
                    </tr>
                    @endforeach       
                    </tbody>
                </table>
            </div> --}}
        </div>
            
        </div>
    </div>
</div>
@endsection