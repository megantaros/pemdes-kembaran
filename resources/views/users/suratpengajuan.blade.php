
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
                
                if($statusSurat == 1 || $statusSurat == 2 || $statusSurat == 3 || $statusSurat == 4){
                    $statusSurat = "text-orange-500";
                } elseif($statusSurat == 6){
                    $statusSurat = "text-red-800";
                } else {
                    $statusSurat = "text-green-800";
                }

                $ketStatus = $row->status;
                if($ketStatus == 1) {
                    $ketStatus = "Permohonan Surat Pending";
                } elseif($ketStatus == 2) {
                    $ketStatus = "Dokumen Diterima dan Verifikasi Berkas";
                } elseif($ketStatus == 3) {
                    $ketStatus = "Surat Sedang Diproses";
                } elseif($ketStatus == 4) {
                    $ketStatus = "Surat Telah Ditandatangani Kepala Desa";
                } elseif($ketStatus == 5) {
                    $ketStatus = "Surat Dapat Diambil di Kantor Kepala Desa Kembaran";
                } elseif($ketStatus == 6) {
                    $ketStatus = "Permohonan Ditolak";
                }

                $jenisSurat = $row->jenis_surat;

                if($jenisSurat == "Surat Pengantar KTP") {
                    $jenisSurat = route("pengantar-ktp.edit", ['pengantar_ktp' => $row->id_permohonan_surat]);
                } elseif($jenisSurat == "Surat Pengantar KK") {
                    $jenisSurat = route("pengantar-kk.edit", ['pengantar_kk' => $row->id_permohonan_surat]);
                } elseif($jenisSurat == "Surat Pengantar SKCK") {
                    $jenisSurat = route("pengantar-skck.edit", ['pengantar_skck' => $row->id_permohonan_surat]);
                } elseif($jenisSurat == "Surat Keterangan Domisili") {
                    $jenisSurat = route("keterangan-domisili.edit", ['keterangan_domisili' => $row->id_permohonan_surat]);
                } elseif($jenisSurat == "Surat Keterangan Pindah") {
                    $jenisSurat = route("keterangan-pindah.edit", ['keterangan_pindah' => $row->id_permohonan_surat]);
                } elseif($jenisSurat == "Surat Keterangan Pindah Datang") {
                    $jenisSurat = route("keterangan-datang.edit", ['keterangan_datang' => $row->id_permohonan_surat]);
                } elseif($jenisSurat == "Surat Keterangan Usaha") {
                    $jenisSurat = route("keterangan-usaha.edit", ['keterangan_usaha' => $row->id_permohonan_surat]);
                }

            @endphp

            <div class="card bg-slate-200 border-l-4 border-primary rounded-none">
                <div class="card-body p-4">
                    <div class="grid grid-cols-3">
                        <div class="col-span-2">
                            <h2 class="mb-2">{{ $row->jenis_surat }}</h2>
        
                            <div class="text-xs" style="font-family: Poppins">
                                Diajukan pada: <span class="font-semibold">{{ $row->tanggal }}</span>
                            </div>

                            <div class="text-xs" style="font-family: Poppins">
                                Status: <span class="font-semibold {{ $statusSurat }}">{{ $ketStatus }}</span>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-end items-center h-full gap-4">
                                <a href="{{ $jenisSurat }}" class="text-sm hover:underline" style="font-family: Poppins">
                                    <i class="fa fa-info-circle"></i>
                                    <span>Detail</span>
                                </a>

                                <form id="formHapus" action="{{ route('pengajuan-surat.destroy', ['pengajuan_surat' => $row->id_permohonan_surat]) }}" method="POST" data-id="{{ $row->id_permohonan_surat }}" data-jenis="{{ $row->jenis_surat }}" class="{{ $row->status == 'Diterima' ? 'hidden' : '' }}">
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
        </div>
            
        </div>
    </div>
</div>
@endsection