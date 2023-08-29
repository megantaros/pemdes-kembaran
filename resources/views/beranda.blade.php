
@extends('layout.user')

@section('title', 'Beranda')

@section('content')
{{-- <section>
    <div
        id="carouselExampleCrossfade"
        class="carousel slide carousel-fade relative"
        data-bs-ride="carousel"
        >
        <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 lg:mb-4 mb-0">
            <button
            type="button"
            data-bs-target="#carouselExampleCrossfade"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
            ></button>
            <button
            type="button"
            data-bs-target="#carouselExampleCrossfade"
            data-bs-slide-to="1"
            aria-label="Slide 2"
            ></button>
            <button
            type="button"
            data-bs-target="#carouselExampleCrossfade"
            data-bs-slide-to="2"
            aria-label="Slide 3"
            ></button>
        </div>
        <div class="carousel-inner relative w-full overflow-hidden">
            <div class="carousel-item active float-left w-full">
            <img
                src="{{ asset('assets/carousel-1.png') }}"
                class="block w-full h-[60vh] lg:h-[90vh] object-cover"
                alt="Wild Landscape"
            />
            <div class="overlay">
                <div class="textOverlay text-center block">
                    <h1 class="text-white lg:text-5xl lg:mb-4 text-2xl mb-3">Selamat Datang di Website Desa Kembaran</h1>
                    <p class="text-white lg:text-l text-sm">Kembaran adalah sebuah desa di Kecamatan Kebumen, Kabupaten Kebumen, Jawa Tengah, Indonesia.</p>
                    <button class="btnOverlay lg:py-2 lg:px-4 py-1 px-2 lg:text-lg text-sm lg:mt-5 mt-4 rounded">Pelajari Lebih</button>
                </div>
            </div>
            </div>
            <div class="carousel-item active float-left w-full">
            <img
                src="{{ asset('assets/carousel-2.png') }}"
                class="block w-full h-[60vh] lg:h-[90vh] object-cover"
                alt="Wild Landscape"
            />
            <div class="overlay">
                <div class="textOverlay text-center block">
                    <h1 class="text-white lg:text-5xl lg:mb-4 text-2xl mb-3">Selamat Datang di Website Desa Kembaran</h1>
                    <p class="text-white lg:text-l text-sm">Kembaran adalah sebuah desa di Kecamatan Kebumen, Kabupaten Kebumen, Jawa Tengah, Indonesia.</p>
                    <button class="btnOverlay lg:py-2 lg:px-4 py-1 px-2 lg:text-lg text-sm lg:mt-5 mt-4 rounded">Pelajari Lebih</button>
                </div>
            </div>
            </div>
            <div class="carousel-item active float-left w-full">
            <img
                src="{{ asset('assets/carousel-1.png') }}"
                class="block w-full h-[60vh] lg:h-[90vh] object-cover"
                alt="Wild Landscape"
            />
            <div class="overlay">
                <div class="textOverlay text-center block">
                    <h1 class="text-white lg:text-5xl lg:mb-4 text-2xl mb-3">Selamat Datang di Website Desa Kembaran</h1>
                    <p class="text-white lg:text-l text-sm">Kembaran adalah sebuah desa di Kecamatan Kebumen, Kabupaten Kebumen, Jawa Tengah, Indonesia.</p>
                    <button class="btnOverlay lg:py-2 lg:px-4 py-1 px-2 lg:text-lg text-sm lg:mt-5 mt-4 rounded">Pelajari Lebih</button>
                </div>
            </div>
            </div>
        </div>
        <button
            class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
            type="button"
            data-bs-target="#carouselExampleCrossfade"
            data-bs-slide="prev"
        >
            <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
            class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
            type="button"
            data-bs-target="#carouselExampleCrossfade"
            data-bs-slide="next"
        >
            <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section> --}}

<section data-aos="fade-up" id="service" class="py-10">
    <div class="container text-center">

        <div>
            <h1 class="lg:text-2xl md:text-lg text-lg font-semibold lg:mb-4 mb-2">Pelayanan Kami</h1>
            <p class="lg:mb-10 lg:w-2/5 mx-auto lg:text-lg md:text-sm text-sm mb-7 w-4/5" style="font-family: Poppins">Pemerintah Desa Kembaran siap melayani Anda kapanpun dan dimanapun</p>
        </div>

        <div class="grid lg:grid-cols-3 lg:gap-3 gap-2 grid-cols-2">
            <a href="#my_modal_1" class="card p-0 rounded-none bg-white cardService">
                <div class="card-body">
                    <img src="{{ asset('assets/icon-1.png') }}" class="m-auto h-14">
                    <h5 class="m-auto lg:text-md md:text-sm text-sm">Surat Pengantar KK & KTP</h5>
                </div>
            </a>

            <a href="#my_modal_2" class="card p-0 rounded-none bg-white cardService">
                <div class="card-body">
                    <img src="{{ asset('assets/icon-2.png') }}" class="m-auto h-14">
                    <h5 class="m-auto lg:text-md md:text-sm text-sm">Surat Keterangan Usaha</h5>
                </div>
            </a>

            <a href="#my_modal_3" class="card p-0 rounded-none bg-white cardService">
                <div class="card-body">
                    <img src="{{ asset('assets/icon-3.png') }}" class="m-auto h-14">
                    <h5 class="m-auto lg:text-md md:text-sm text-sm">Surat Pengantar SKCK</h5>
                </div>
            </a>

            <a href="#my_modal_4" class="card p-0 rounded-none bg-white cardService">
                <div class="card-body">
                    <img src="{{ asset('assets/icon-4.png') }}" class="m-auto h-14">
                    <h5 class="m-auto lg:text-md md:text-sm text-sm">Surat Keterangan Domisili</h5>
                </div>
            </a>

            <a href="#my_modal_5" class="card p-0 rounded-none bg-white cardService">
                <div class="card-body">
                    <img src="{{ asset('assets/icon-5.png') }}" class="m-auto h-14">
                    <h5 class="m-auto lg:text-md md:text-sm text-sm">Surat Keterangan Pindah</h5>
                </div>
            </a>

            <a href="#my_modal_6" class="card p-0 rounded-none bg-white cardService">
                <div class="card-body">
                    <img src="{{ asset('assets/icon-6.png') }}" class="m-auto h-12">
                    <h5 class="m-auto lg:text-md md:text-sm text-sm">Surat Keterangan Pindah Datang</h5>
                </div>
            </a>

        </div>
        
        {{-- Modal --}}
        <dialog class="modal w-full h-full" id="my_modal_1">
            <div class="modal-box font-normal">
                <div class="flex flex-col gap-4">
                    {{-- <div class="alert alert-info justify-start">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Dokumen yang dibutuhkan:</span>
                    </div> --}}

                    <div class="p-4 rounded-lg bg-info text-center text-primary">
                        <h2 class="text-lg font-semibold">
                            <i class="fas fa-file"></i>
                            <span>
                                Info Dokumen
                            </span>
                        </h2>
                        <p class="text-sm mt-2" style="font-family: Poppins">
                            Pastikan dokumen yang Anda lampirkan sesuai dengan persyaratan
                        </p>
                    </div>

                    <div class="card bg-white text-left border-0">
                        <div class="card-body bg-slate-200 rounded-lg" style="font-family: Poppins">
                            <ul class="leading-6">
                                <li>Surat Pengantar RT</li>
                                <li>KTP Asli</li>
                                <li>KK Asli</li>
                                <li>Fotokopi Buku Nikah <span><strong>*Kepengurusan KK</strong></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-action">
                    <a href="#service" class="btn btn-primary text-white font-normal capitalize">Tutup</a>
                </div>
            </div>
        </dialog>

        <dialog class="modal w-full h-full" id="my_modal_2">
            <div class="modal-box font-normal">
                <div class="flex flex-col gap-4">
                    {{-- <div class="alert alert-info justify-start">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Dokumen yang dibutuhkan:</span>
                    </div> --}}

                    <div class="p-4 rounded-lg bg-info text-center text-primary">
                        <h2 class="text-lg font-semibold">
                            <i class="fas fa-file"></i>
                            <span>
                                Info Dokumen
                            </span>
                        </h2>
                        <p class="text-sm mt-2" style="font-family: Poppins">
                            Pastikan dokumen yang Anda lampirkan sesuai dengan persyaratan
                        </p>
                    </div>

                    <div class="card bg-white text-left border-0">
                        <div class="card-body bg-slate-200 rounded-lg" style="font-family: Poppins">
                            <ul class="leading-6">
                                <li>Surat Pengantar RT</li>
                                <li>Fotokopi KTP</li>
                                <li>Fotokopi KK</li>
                                <li>Foto Usaha</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-action">
                    <a href="#service" class="btn btn-primary text-white font-normal capitalize">Tutup</a>
                </div>
            </div>
        </dialog>

        <dialog class="modal w-full h-full" id="my_modal_3">
            <div class="modal-box font-normal">
                <div class="flex flex-col gap-4">
                    {{-- <div class="alert alert-info justify-start">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Dokumen yang dibutuhkan:</span>
                    </div> --}}

                    <div class="p-4 rounded-lg bg-info text-center text-primary">
                        <h2 class="text-lg font-semibold">
                            <i class="fas fa-file"></i>
                            <span>
                                Info Dokumen
                            </span>
                        </h2>
                        <p class="text-sm mt-2" style="font-family: Poppins">
                            Pastikan dokumen yang Anda lampirkan sesuai dengan persyaratan
                        </p>
                    </div>

                    <div class="card bg-white text-left border-0">
                        <div class="card-body bg-slate-200 rounded-lg" style="font-family: Poppins">
                            <ul class="leading-6">
                                <li>Surat Pengantar RT</li>
                                <li>Fotokopi KTP</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-action">
                    <a href="#service" class="btn btn-primary text-white font-normal capitalize">Tutup</a>
                </div>
            </div>
        </dialog>

        <dialog class="modal w-full h-full" id="my_modal_4">
            <div class="modal-box font-normal">
                <div class="flex flex-col gap-4">
                    {{-- <div class="alert alert-info justify-start">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Dokumen yang dibutuhkan:</span>
                    </div> --}}

                    <div class="p-4 rounded-lg bg-info text-center text-primary">
                        <h2 class="text-lg font-semibold">
                            <i class="fas fa-file"></i>
                            <span>
                                Info Dokumen
                            </span>
                        </h2>
                        <p class="text-sm mt-2" style="font-family: Poppins">
                            Pastikan dokumen yang Anda lampirkan sesuai dengan persyaratan
                        </p>
                    </div>

                    <div class="card bg-white text-left border-0">
                        <div class="card-body bg-slate-200 rounded-lg" style="font-family: Poppins">
                            <ul class="leading-6">
                                <li>Surat Pengantar RT</li>
                                <li>Fotokopi KTP</li>
                                <li>Fotokopi KK</li>
                                <li>Foto Lokasi</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-action">
                    <a href="#service" class="btn btn-primary text-white font-normal capitalize">Tutup</a>
                </div>
            </div>
        </dialog>

        <dialog class="modal w-full h-full" id="my_modal_5">
            <div class="modal-box font-normal">
                <div class="flex flex-col gap-4">
                    {{-- <div class="alert alert-info justify-start">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Dokumen yang dibutuhkan:</span>
                    </div> --}}

                    <div class="p-4 rounded-lg bg-info text-center text-primary">
                        <h2 class="text-lg font-semibold">
                            <i class="fas fa-file"></i>
                            <span>
                                Info Dokumen
                            </span>
                        </h2>
                        <p class="text-sm mt-2" style="font-family: Poppins">
                            Pastikan dokumen yang Anda lampirkan sesuai dengan persyaratan
                        </p>
                    </div>

                    <div class="card bg-white text-left border-0">
                        <div class="card-body bg-slate-200 rounded-lg" style="font-family: Poppins">
                            <ul class="leading-6">
                                <li>Surat Pengantar RT</li>
                                <li>KTP Asli</li>
                                <li>KK Asli</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-action">
                    <a href="#service" class="btn btn-primary text-white font-normal capitalize">Tutup</a>
                </div>
            </div>
        </dialog>

        <dialog class="modal w-full h-full" id="my_modal_6">
            <div class="modal-box font-normal">
                <div class="flex flex-col gap-4">
                    {{-- <div class="alert alert-info justify-start">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Dokumen yang dibutuhkan:</span>
                    </div> --}}

                    <div class="p-4 rounded-lg bg-info text-center text-primary">
                        <h2 class="text-lg font-semibold">
                            <i class="fas fa-file"></i>
                            <span>
                                Info Dokumen
                            </span>
                        </h2>
                        <p class="text-sm mt-2" style="font-family: Poppins">
                            Pastikan dokumen yang Anda lampirkan sesuai dengan persyaratan
                        </p>
                    </div>

                    <div class="card bg-white text-left border-0">
                        <div class="card-body bg-slate-200 rounded-lg" style="font-family: Poppins">
                            <ul class="leading-6">
                                <li>Surat Keterangan Pindah yang dikeluarkan oleh Kantor Capil</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-action">
                    <a href="#service" class="btn btn-primary text-white font-normal capitalize">Tutup</a>
                </div>
            </div>
        </dialog>

    </div>
</section>

<section data-aos="fade-up" id="visiMisi" class="py-10">
    <div class="container text-center">
        
        <div>
            <h1 class="lg:text-2xl md:text-lg text-lg font-semibold lg:mb-4 mb-2">Visi Misi Desa Kembaran</h1>
            <p class="lg:mb-10 lg:w-2/5 mx-auto lg:text-lg md:text-sm text-sm mb-7 w-4/5" style="font-family: Poppins">Untuk memajukan desa serta mengembangkan penduduk maka Desa Kembaran</p>
        </div>

        <div class="rounded-lg overflow-hidden relative w-full h-20 shapeVision flex items-center justify-end">
            <div class="absolute bg-slate-900 h-20 rounded-r-full w-2/5 roundedInShape lg:left-[-100px] left-[-20px] flex justify-end items-center lg:pr-14 pr-7 text-white gap-4">
                <img src="{{ asset('assets/icon-vision.png') }}" alt="Icon Visi" class="h-11">
                <div class="text-xl">Visi</div>
            </div>
            <div class="font-medium italic text-lg w-3/4">“Menuju Desa Maju Mandiri”</div>
        </div>

        <div class="rounded-lg overflow-hidden relative w-full shapeVision mt-4 text-left pb-9">
            <div class="absolute bg-slate-900 h-20 rounded-l-full roundedInShape2 flex justify-start items-center lg:pl-14 pl-7 text-white lg:w-3/4 w-3/4 lg:right-[-100px] right-[-50px] gap-4">
                <img src="{{ asset('assets/icon-mission.png') }}" alt="Icon Visi" class="h-9">
                <div class="text-xl">Misi</div>
            </div>
            <div class="h-16 w-full mb-7"></div>
            <div class="rowMission lg:px-12 px-6">
                <ul class="leading-6">
                    <li>Meningkatkan sarana pertanian dan perekonomian yang ada di desa.</li>
                    <li>Menyelenggarakan sistem pelayanan dasar dalam Bidang Pemerintahan, Pembangunan dan Kemasyarakatan secara adil dan transparan.</li>
                    <li>Mendorong tercapainya Lembaga Perekonomian Desa yang profesional dan meningkatkan derajat kehidupan masyarakat.</li>
                    <li>Mendorong kegiatan dunia usaha guna menciptakan lapangan kerja. </li>
                    <li>Mengoptimalkan pemanfaatan Sumber Daya Ekonomi Desa sesuai dengan Potensi Desa.</li>
                    <li>Menciptakan keamanan yang kondusif untuk melakukan kegiatan usaha. </li>
                    <li>Mendorong terbentuknya sikap dan perilaku anggota masyarakat di Pemerintahan Desa yang menghormati dan menjunjung tinggi hukum yang berlaku. </li>
                    <li>Mengerakkan kegiatan sosial dan keagamaan untuk lebih meningkatkan kualitas Keimanan dan Ketaqwaan. </li>
                    <li>Menghargai Musyawarah dan Keputusan sesuai dengan keadilan yang melibatkan perempuan serta anak dan remaja.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section data-aos="fade-up" id="strukturPemdes" class="py-10">
    <div class="container text-center">

        <div>
            <h1 class="lg:text-2xl md:text-lg text-lg font-semibold lg:mb-4 mb-2">Struktur Pemerintahan Desa</h1>
            <p class="lg:mb-10 lg:w-2/5 mx-auto lg:text-lg md:text-sm text-sm mb-7 w-4/5" style="font-family: Poppins">Pemerintahan Desa Kembaran memiliki struktur pemerintahan beserta para pejabatnya</p>
        </div>

        <img src="{{ asset('assets/bagan-jabatan.png') }}" alt="Bagan Jabatan" class="m-auto w-3/4">
    </div>
</section>
@endsection
