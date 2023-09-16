@extends('layout.admin')

@section('title', 'Profil Admin')

@section('account', 'bg-[#e5e7eb] bg-opacity-20')

@section('content')
<dialog class="modal w-full h-full" id="modalPassAdmin">
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
                <form action="" id="formPass" class="card-body bg-slate-200 rounded-lg text-sm" style="font-family: Poppins" method="POST">
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

<div class="h-96 rounded-lg overflow-hidden relative">
    <div class="bg-black bg-opacity-60 absolute z-0 top-0 left-0 w-full h-full"></div>
    <img src="{{ asset('assets/bg-login.jpg') }}" alt="Kantor Kepala Desa Kembaran">
</div>

<div class="container -mt-52">
    <div class="card bg-white shadow-lg">
        <div class="card-body p-4">
            <div class="card-title p-4 bg-primary text-white rounded-lg font-normal block">
                <h2 class="m-auto">Detail Admin</h2>
                <div class="flex">
                    <p class="lg:text-md md:text-sm text-sm" style="font-family: Poppins">
                        Identitas admin yang terdaftar di sistem
                    </p>
                    <a href="#modalPassAdmin" class="text-sm flex gap-2 items-center" style="font-family: Poppins">
                        <i class="fas fa-lock"></i>
                        <span class="hover:underline">Ubah Password</span>
                    </a>
                </div>
            </div>
        
            <hr class="border-2 my-4">

            <form action="" method="POST" class="grid lg:grid-cols-2 md:grid-cols-1 grid-cols-1 gap-4">
                @csrf
                @method('PUT')

                <div>
                    <div class="text-label text-sm">Nama *</div>
                    <input type="text" placeholder="Masukkan Nama" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="name" value="{{ Auth::guard('admin')->user()->name }}"/>

                    <div class="text-label text-sm">Email *</div>
                    <input type="email" placeholder="Masukkan Email" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="email" value="{{ Auth::guard('admin')->user()->email }}"/>

                    <div class="text-label text-sm">No Telephone *</div>
                    <input type="number" placeholder="Masukkan No Telephone" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="notelpon" value=""/>

                </div>
                <div>
                    <div class="text-label text-sm">Jenis Kelamin *</div>
                    <select class="select select-primary w-full my-1" name="jenis_kelamin">
                        <option selected disabled="disabled"></option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>

                    <div class="text-label text-sm">Jabatan *</div>
                    <input type="text" placeholder="Masukkan Jabatan" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="jabatan" value=""/>

                    <div class="text-label text-sm">Agama *</div>
                    <select class="select select-primary w-full my-1" name="agama">
                        <option selected disabled></option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindhu">Hindhu</option>
                        <option value="Budha">Budha</option>
                    </select>
                </div>

                <div class="lg:col-span-2">
                    <div class="text-label text-sm">Alamat *</div>
                    <textarea class="textarea textarea-primary w-full placeholder:text-sm" placeholder="Masukkan Alamat" name="alamat"></textarea>
                </div>

                <div class="lg:col-span-2">
                    <button type="submit" class="btn btn-warning capitalize font-normal text-white w-full">Update Profil</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

