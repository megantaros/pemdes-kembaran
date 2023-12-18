
@extends('layout.user')

@section('title', 'Surat Keterangan Domisili')

@section('active', 'active')

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

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body gap-10">

                <div class="card-title bg-slate-200 p-4 rounded-lg">
                    <div class="m-auto">
                        <h2 class="text-lg leading-1">Form Pengisian Surat Keterangan Domisili</h2>
                        <p class="font-normal text-sm" style="font-family: Poppins">Isi form pengajuan surat di bawah ini!</p>
                    </div>
                </div>

                <hr>

                <form class="grid xl:grid-cols-2 lg:grid-cols-2 md:grid-cols-2 grid-cols-1 text-left gap-6" action="{{ route('keterangan-domisili.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="p-4 bg-slate-200 rounded-lg">

                        <input type="hidden" value="{{ Auth::user()->id_warga }}" name="id_warga"/>

                        <div class="text-label text-sm">Alamat Domisili *</div>
                        <textarea class="textarea textarea-primary w-full placeholder:text-sm" placeholder="Masukkan Alamat Domisili" name="alamat_domisili"></textarea>

                        @error('alamat_domisili')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror

                    </div>

                    <div class="p-4 bg-slate-200 rounded-lg">

                        <div class="text-label text-sm">Scan Surat Pengantar*</div>
                        <input type="file" class="input input-bordered input-primary w-full file-input-primary file:border-none file:py-1 my-1" accept="image/png, image/jpeg" name="pengantar_rt"/>

                        @error('pengantar_rt')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror

                        <div class="text-label text-sm">Fotokopi KTP *</div>
                        <input type="file" class="input input-bordered input-primary w-full file-input-primary file:border-none file:py-1 my-1" accept="image/png, image/jpeg" name="fc_ktp"/>

                        @error('fc_ktp')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror

                        <div class="text-label text-sm">Fotokopi KK *</div>
                        <input type="file" class="input input-bordered input-primary w-full file-input-primary file:border-none file:py-1 my-1" accept="image/png, image/jpeg" name="fc_kk"/>
                        
                        @error('fc_kk')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror

                        <div class="text-label text-sm">Foto Rumah / Lokasi *</div>
                        <input type="file" class="input input-bordered input-primary w-full file-input-primary file:border-none file:py-1 my-1" accept="image/png, image/jpeg" name="foto_lokasi"/>
                        
                        @error('foto_lokasi')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror

                    </div>

                    <div class="xl:col-span-2 lg:col-span-2 md:col-span-2 col-span-1">
                        <button type="submit" class="btn btn-primary w-full text-white font-normal capitalize">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection