
@extends('layout.user')

@section('content')
    <div class="section" id="headerService">
        <div class="lg:h-[500px] h-[30vh]" style="background: #022E57;">
            <div class="flex flex-row bg-transparent">
                <div class="basis-1/2 w-full lg:h-[500px] h-[30vh] overflow-hidden relative">
                    <img src="{{ asset('assets/perangkat-desa.png') }}" alt="Perangkat Desa" class="absolute imgPerangkat1">
                </div>
                <div class="basis-1/2 w-full lg:h-[500px] h-[30vh] relative">
                    <div class="absolute inset-y-[30%]">
                        <div class="lg:text-5xl text-xl mb-1" style="color: #FFEBAD;">Selamat Datang</div>
                        <div class="lg:text-xl lg:mt-3 text-sm mb-2 text-white textPortal">di Portal Pelayanan Desa Kembaran</div>
                        <a href="#service" class="btnBantuan font-semibold lg:mt-5">Butuh bantuan?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="service" class="lg:pt-14 lg:pb-20 pt-7 pb-10">
        <div class="container text-center">
            <div class="textTitle">
                <h1 class="lg:text-4xl text-2xl lg:mb-9 mb-2">Layanan Kami</h1>
                <p class="lg:text-xl lg:mb-20 lg:w-2/5 mx-auto text-md mb-7 w-4/5">Portal Desa Kembaran memudahkan Warga Desa Kembaran dalam kepengurusan administrasi surat menyurat</p>
            </div>
            @guest
            <div class="card lg:card-side bg-base-100 shadow-xl border-none">
                <div class="card-body">
                <h1 class="card-title lg:text-3xl text-2xl w-100 flex justify-center">Pengajuan Surat Online</h1>
                <p class="p-pengajuan lg:text-lg text-md font-medium">Isi form pengajuan surat di bawah ini!</p>
                <div class="grid lg:grid-cols-2 text-left gap-4 mt-8">
                    <div>
                        <div class="text-label">Nama *</div>
                        <input type="hidden" placeholder="Masukkan Nama" class="input input-bordered input-info w-full my-1 read-only:bg-[#9cb4cc]" readonly name="id_warga"/>
                        <input type="text" placeholder="Masukkan Nama" class="input input-bordered input-info w-full my-1 read-only:bg-[#9cb4cc]" readonly/>
                        <div class="text-label">NIK *</div>
                        <input type="text" placeholder="Masukkan Nama" class="input input-bordered input-info w-full my-1 read-only:bg-[#9cb4cc]" readonly/>
                    </div>
                    <div>
                        <div class="text-label">Nomor HP *</div>
                        <input type="text" placeholder="Masukkan Nama" class="input input-bordered input-info w-full my-1 read-only:bg-[#9cb4cc]" readonly/>
                        <div class="text-label">Pilih Jenis Surat *</div>
                        <select class="select select-primary w-full my-1" name="jenis_surat">
                            <option value="Surat Pengantar KTP">Surat Pengantar KTP</option>
                            <option value="Surat Pengantar KK">Surat Pengantar KK</option>
                            <option value="Surat Pengantar SKCK">Surat Pengantar SKCK</option>
                            <option value="Surat Keterangan Domisili">Surat Keterangan Domisili</option>
                            <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                            <option value="Surat Keterangan Pindah">Surat Keterangan Pindah</option>
                            <option value="Surat Keterangan Pindah Datang">Surat Keterangan Pindah Datang</option>
                        </select>
                    </div>
                </div>
                <div class="card-actions justify-end mt-8">
                    <a href="{{ route('login') }}" class="btn btn-primary w-25 text-white font-normal capitalize text-xl">Buat</a>
                </div>
                </div>
            </div>
            @endguest
            @auth
            <div class="card lg:card-side bg-base-100 shadow-xl border-none">
                <div class="card-body">
                <form action="/insertsuratpengajuan" method="POST">
                    @csrf
                <h1 class="card-title lg:text-3xl text-2xl  w-100 flex justify-center">Pengajuan Surat Online</h1>
                <p class="p-pengajuan lg:text-lg text-md font-medium">Isi form pengajuan surat di bawah ini!</p>
                <div class="grid lg:grid-cols-2 text-left gap-4 mt-8">
                    <div>
                        <div class="text-label">Nama *</div>
                        <input type="hidden" placeholder="Masukkan Nama" class="input input-bordered input-info w-full my-1 read-only:bg-[#9cb4cc]" value="{{ Auth::user()->id_warga }}" readonly name="id_warga"/>
                        <input type="text" placeholder="Masukkan Nama" class="input input-bordered input-info w-full my-1 read-only:bg-[#9cb4cc]" value="{{ Auth::user()->name }}" readonly/>
                        <div class="text-label">NIK *</div>
                        <input type="text" placeholder="Masukkan Nama" class="input input-bordered input-info w-full my-1 read-only:bg-[#9cb4cc]" value="{{ Auth::user()->nik }}" readonly/>
                    </div>
                    <div>
                        <div class="text-label">Nomor HP *</div>
                        <input type="text" placeholder="Masukkan Nama" class="input input-bordered input-info w-full my-1 read-only:bg-[#9cb4cc]" value="{{ Auth::user()->notelpon }}" readonly/>
                        <div class="text-label">Pilih Jenis Surat *</div>
                        <select class="select select-primary w-full my-1" name="jenis_surat">
                            <option value="Surat Pengantar KTP">Surat Pengantar KTP</option>
                            <option value="Surat Pengantar KK">Surat Pengantar KK</option>
                            <option value="Surat Pengantar SKCK">Surat Pengantar SKCK</option>
                            <option value="Surat Keterangan Domisili">Surat Keterangan Domisili</option>
                            <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                            <option value="Surat Keterangan Pindah">Surat Keterangan Pindah</option>
                            <option value="Surat Keterangan Pindah Datang">Surat Keterangan Pindah Datang</option>
                        </select>
                    </div>
                </div>
                <div class="card-actions justify-end mt-8">
                    <button type="submit" class="btn btn-primary w-25 text-white font-normal capitalize text-xl">Buat</button>
                </div>
                </form>
                </div>
            </div>
            @endauth
        </div>
    </section>
@endsection
