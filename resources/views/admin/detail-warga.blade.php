@extends('layout.admin')

@section('title', 'Detail Warga')

@section('wargaActive', 'bg-[#e5e7eb] bg-opacity-20')

@section('content')
<dialog class="modal w-full h-full" id="modalPassWarga">
    <div class="modal-box font-normal">
        <div class="flex flex-col gap-4">

            <div class="p-4 rounded-lg bg-warning text-center">
                <h2 class="text-lg font-semibold">
                    <i class="fas fa-info-circle"></i>
                    <span>Update Password</span>
                </h2>
                <p class="text-sm mt-2" style="font-family: Poppins">
                    Pastikan password Anda mudah diingat dan tidak mudah ditebak oleh orang lain
                </p>
            </div>

            <div class="card bg-white text-left border-0">
                <form action="{{ route('warga-admin.update', ['warga_admin' => $data->id_warga]) }}" id="formPass" class="card-body bg-slate-200 rounded-lg text-sm" style="font-family: Poppins" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="text-label text-sm">Password *</div>
                    <input type="password" placeholder="Masukkan Password" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="password"/>

                    <div class="text-label text-sm">Konfirmasi Password *</div>
                    <input type="password" placeholder="Masukkan Konfirmasi Password" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="conf_pass"/>

                    <button type="submit" class="btn btn-warning capitalize font-normal text-white">Ubah Password</button>
                    
                </form>
            </div>
        </div>
        <div class="modal-action">
            <a href="#headerService" class="btn btn-primary text-white font-normal capitalize">Tutup</a>
        </div>
    </div>
</dialog>


<div class="grid lg:grid-cols-6 gap-4">
    <div class="lg:col-span-4">
        <div class="card bg-white shadow-lg lg:col-span-3">
            <div class="card-body p-4 gap-4">
          
                <div class="card-title p-4 bg-primary text-white rounded-lg font-normal block">
                    <h2 class="m-auto">Detail Warga</h2>
                    <div class="flex">
                        <p class="lg:text-md md:text-sm text-sm" style="font-family: Poppins">
                            Identitas warga yang terdaftar di sistem
                        </p>
                        <a href="#modalPassWarga" class="text-sm flex gap-2 items-center" style="font-family: Poppins">
                            <i class="fas fa-lock"></i>
                            <span class="hover:underline">Ubah Password</span>
                        </a>
                    </div>
                </div>
            
                <hr class="border-2">

                <form action="{{ route('warga-admin.update', ['warga_admin' => $data->id_warga]) }}" method="POST" class="grid lg:grid-cols-2 md:grid-cols-1 grid-cols-1 gap-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <div class="text-label text-sm">Nama *</div>
                        <input type="text" placeholder="Masukkan Nama" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="nama_warga" value="{{ $data->nama_warga }}"/>

                        <div class="text-label text-sm">Email *</div>
                        <input type="email" placeholder="Masukkan Email" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="email" value="{{ $data->email }}"/>

                        <div class="text-label text-sm">NIK *</div>
                        <input type="text" placeholder="Masukkan NIK" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="nik" value="{{ $data->nik }}"/>

                        <div class="text-label text-sm">Jenis Kelamin *</div>
                        <select class="select select-primary w-full my-1" name="jenis_kelamin">
                            <option selected disabled="disabled">{{ $data->jenis_kelamin }}</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div>
                        <div class="text-label text-sm">Nomor Telfon *</div>
                        <input type="text" placeholder="Masukkan Nomor Telfon" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="notelpon" value="{{ $data->notelpon }}" />

                        <div class="text-label text-sm">Tempat, Tanggal Lahir *</div>
                        <input type="text" placeholder="Masukkan Tempat, Tanggal Lahir" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="ttl" value="{{ $data->ttl }}"/>

                        <div class="text-label text-sm">Pekerjaan *</div>
                        <input type="text" placeholder="Masukkan Pekerjaan" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="pekerjaan" value="{{ $data->pekerjaan }}"/>

                        <div class="text-label text-sm">Agama *</div>
                        <select class="select select-primary w-full my-1" name="agama">
                            <option selected disabled>{{ $data->agama }}</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindhu">Hindhu</option>
                            <option value="Budha">Budha</option>
                        </select>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="text-label text-sm">Alamat *</div>
                        <textarea class="textarea textarea-primary w-full placeholder:text-sm" placeholder="Masukkan Alamat" name="alamat">{{ $data->alamat }}</textarea>
                    </div>

                    <div class="lg:col-span-2">
                        <button type="submit" class="btn btn-warning capitalize font-normal text-white w-full">Update Profil</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="lg:col-span-2">
        <div class="card bg-white shadow-lg lg:col-span-2">
            <div class="card-body p-4 gap-4">
                <div class="card-title p-4 bg-primary text-white rounded-lg font-normal block">
                    <h2 class="m-auto">Surat yang diajukan</h2>
                    <div class="flex">
                        <p class="lg:text-md md:text-sm text-sm" style="font-family: Poppins">
                            Daftar surat yang diajukan oleh warga 
                        </p>
                    </div>
                </div>
            
                <hr class="border-2">

                @foreach ($pengajuanSurat as $item)
                @php
                    $statusSurat = $item->status;
                    $borderStatus = "";
                    if($statusSurat == 1 || $statusSurat == 2 || $statusSurat == 3 || $statusSurat == 4){
                        $borderStatus = "border-primary";
                    } elseif($statusSurat == 6){
                        $borderStatus = "border-red-800";
                    } else {
                        $borderStatus = "border-green-800";
                    }

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
                    
                <div class="card rounded-none border-l-4 font-semibold text-sm {{ $borderStatus }}" style="font-family: Poppins;">
                    <div class="card-body p-2">
                        <a href="{{ $jenisSurat }}" class="hover:underline">
                            <i class="fa fa-file-alt" aria-hidden="true"></i>
                            <span class="ml-2">{{ $item->jenis_surat }}</span>
                        </a>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>


</div>
@endsection

