
@extends('layout.profil')

@section('title', 'Profil')

@section('content')
<dialog class="modal w-full h-full" id="modalPass">
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
                <form action="{{ route('warga.update', ['warga' => Auth::user()->id_warga]) }}" id="formPass" class="card-body bg-slate-200 rounded-lg text-sm" style="font-family: Poppins" method="POST">
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

<div class="lg:col-span-3">
    <div class="card bg-white min-h-screen shadow-lg">
        <div class="card-body">
            <div>
                <h2 class="lg:text-lg md:text-sm text-sm font-semibold">Info Profil</h2>
                <div class="flex">
                    <p class="lg:text-md md:text-sm text-sm" style="font-family: Poppins">Pastikan identitas Anda sesuai dengan yang tertera di e-KTP</p>
                    <a href="#modalPass" class="text-sm flex gap-2 items-center" style="font-family: Poppins">
                        <i class="fas fa-info-circle"></i>
                        <span class="hover:underline">Ubah Password</span>
                    </a>
                </div>
            </div>

            <hr class="my-4">

            <form action="{{ route('warga.update', ['warga' => Auth::user()->id_warga]) }}" method="POST" class="grid lg:grid-cols-2 md:grid-cols-1 grid-cols-1 gap-4">
                @csrf
                @method('PUT')

                <div>
                    <div class="text-label text-sm">Nama *</div>
                    <input type="text" placeholder="Masukkan Nama" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="name" value="{{ Auth::user()->nama_warga }}"/>

                    <div class="text-label text-sm">Email *</div>
                    <input type="email" placeholder="Masukkan Email" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="email" value="{{ Auth::user()->email }}"/>

                    <div class="text-label text-sm">NIK *</div>
                    <input type="text" placeholder="Masukkan NIK" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="nik" value="{{ Auth::user()->nik }}"/>

                    <div class="text-label text-sm">No. KK *</div>
                    <input type="text" placeholder="Masukkan No. Kartu Keluarga" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="pekerjaan" value="{{ Auth::user()->kk }}"/>

                </div>
                <div>
                    <div class="text-label text-sm">Nomor Telfon *</div>
                    <input type="text" placeholder="Masukkan Nomor Telfon" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="notelpon" value="{{ Auth::user()->notelpon }}" />

                    <div class="text-label text-sm">Jenis Kelamin *</div>
                    <select class="select select-primary w-full my-1" name="jenis_kelamin">
                        <option selected disabled="disabled">{{ Auth::user()->jenis_kelamin }}</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>

                    <div class="text-label text-sm">Pekerjaan *</div>
                    <input type="text" placeholder="Masukkan Pekerjaan" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="pekerjaan" value="{{ Auth::user()->pekerjaan }}"/>

                    <div class="text-label text-sm">Agama *</div>
                    <select class="select select-primary w-full my-1" name="agama">
                        <option selected disabled>{{ Auth::user()->agama }}</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindhu">Hindhu</option>
                        <option value="Budha">Budha</option>
                    </select>
                </div>

                <div class="lg:col-span-2">
                    <div class="text-label text-sm">Tempat, Tanggal Lahir *</div>
                    <input type="text" placeholder="Masukkan Tempat, Tanggal Lahir" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="ttl" value="{{ Auth::user()->ttl }}"/>

                    <div class="text-label text-sm">Alamat *</div>
                    <textarea class="textarea textarea-primary w-full placeholder:text-sm" placeholder="Masukkan Alamat" name="alamat">{{ Auth::user()->alamat }}</textarea>
                </div>

                <div class="lg:col-span-2">
                    <button type="submit" class="btn btn-warning capitalize font-normal text-white w-full">Update Profil</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

