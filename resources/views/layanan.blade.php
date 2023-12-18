
@extends('layout.user')

@section('title', 'Layanan')

@section('content')
<section data-aos="fade-up" id="headerService" class="bg-primary">
    <div class="container">
        <div class="grid lg:grid-cols-2 grid-cols-1 lg:h-72 h-96">
            <div class="overflow-hidden">
                <img src="{{ asset('assets/perangkat-desa.png') }}" alt="Perangkat Desa" class="lg:h-80 md:h-56 h-56 lg:-mb-5 m-auto">
            </div>
            <div class="flex justify-start items-center">
                <div>
                    <h3 class="lg:text-2xl text-xl mb-2" style="color: #FFEBAD;">Selamat Datang</h3>
                    <p class="text-white mb-2" style="font-family: Poppins">di Portal Pelayanan Desa Kembaran</p>
                    <a href="#service" class="btnBantuan font-semibold lg:mt-5">Butuh bantuan?</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-aos="fade-up" id="service" class="py-10">
    <div class="container text-center">

        <div>
            <h1 class="lg:text-2xl md:text-lg text-lg font-semibold lg:mb-4 mb-2">Layanan Kami</h1>
            <p class="lg:mb-10 lg:w-3/5 mx-auto lg:text-lg md:text-sm text-sm mb-7 w-4/5" style="font-family: Poppins">Portal Desa Kembaran memudahkan Warga Desa Kembaran dalam kepengurusan administrasi surat menyurat</p>
        </div>

        @guest
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body gap-10">

                <div class="card-title bg-slate-200 p-4 rounded-lg">
                    <div class="m-auto">
                        <h2 class="text-lg leading-1">Pendataan Awal</h2>
                        <p class="font-normal text-sm" style="font-family: Poppins">Isi form pengajuan surat di bawah ini!</p>
                    </div>
                </div>

                <hr class="border-1 border-primary">

                <form id="guestForm" onsubmit="getModalLogin()" class="grid xl:grid-cols-2 lg:grid-cols-2 md:grid-cols-2 grid-cols-1 text-left gap-6">

                    <div class="p-4 bg-slate-200 rounded-lg">
                        <div class="text-label text-sm">Nama *</div>
                        <input type="text" placeholder="Masukkan Nama" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm"/>

                        <div class="text-label text-sm">NIK *</div>
                        <input type="text" placeholder="Masukkan NIK" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm"/>
                    </div>

                    <div class="p-4 bg-slate-200 rounded-lg">
                        <div class="text-label text-sm">Nomor HP *</div>
                        <input type="text" placeholder="Masukkan Nomor Telephone" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm"/>

                        <div class="text-label text-sm">Pilih Jenis Surat *</div>
                        <select class="select select-primary w-full my-1" name="jenis_surat">
                            <option selected disabled>Pilih Surat Pengajuan</option>
                            <option value="Surat Pengantar KTP">Surat Pengantar KTP</option>
                            <option value="Surat Pengantar KK">Surat Pengantar KK</option>
                            <option value="Surat Pengantar SKCK">Surat Pengantar SKCK</option>
                            <option value="Surat Keterangan Domisili">Surat Keterangan Domisili</option>
                            <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                            <option value="Surat Keterangan Pindah">Surat Keterangan Pindah</option>
                            <option value="Surat Keterangan Pindah Datang">Surat Keterangan Pindah Datang</option>
                        </select>
                    </div>

                    <div class="xl:col-span-2 lg:col-span-2 md:col-span-2 col-span-1">
                        <button type="submit" class="btn btn-primary w-full text-white font-normal capitalize">Buat</button>
                    </div>
                </form>
            </div>
        </div>
        @endguest

        @auth
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body gap-10">

                <div class="card-title bg-slate-200 p-4 rounded-lg">
                    <div class="m-auto">
                        <h2 class="text-lg leading-1">Pendataan Awal</h2>
                        <p class="font-normal text-sm" style="font-family: Poppins">Isi form pengajuan surat di bawah ini!</p>
                    </div>
                </div>

                <form class="xl:col-span-2 lg:col-span-2 md:col-span-2 col-span-1 text-left gap-6" action="{{ route('pengajuan-surat.store') }}" method="POST" method="POST">
                    @csrf
                    @method('POST')

                    <div>
                        <div class="text-label text-sm">Nama *</div>
                        <input type="text" placeholder="Masukkan Nama" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" value="{{ Auth::user()->nama_warga }}" readonly/>

                        <div class="text-label text-sm">NIK *</div>
                        <input type="text" placeholder="Masukkan NIK" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" value="{{ Auth::user()->nik }}" readonly/>
                    </div>

                    <div>
                        <div class="text-label text-sm">Nomor HP *</div>
                        <input type="text" placeholder="Masukkan Nomor Telephone" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" value="{{ Auth::user()->notelpon }}" readonly/>

                        <div class="text-label text-sm">Pilih Jenis Surat *</div>
                        <select class="select select-primary w-full my-1" name="jenis_surat">
                            <option selected disabled>Pilih Surat Pengajuan</option>
                            <option value="Surat Pengantar KTP">Surat Pengantar KTP</option>
                            <option value="Surat Pengantar KK">Surat Pengantar KK</option>
                            <option value="Surat Pengantar SKCK">Surat Pengantar SKCK</option>
                            <option value="Surat Keterangan Domisili">Surat Keterangan Domisili</option>
                            <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                            <option value="Surat Keterangan Pindah">Surat Keterangan Pindah</option>
                            <option value="Surat Keterangan Pindah Datang">Surat Keterangan Pindah Datang</option>
                        </select>
                    </div>

                    <div class="xl:col-span-2 lg:col-span-2 md:col-span-2 col-span-1 mt-8">
                        <button type="submit" class="btn btn-primary w-full text-white font-normal capitalize">Buat</button>
                    </div>
                </form>
            </div>
        </div>
        @endauth
    </div>
</section>
@endsection
