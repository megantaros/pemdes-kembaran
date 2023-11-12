
@extends('layout.user')

@section('title', 'Beranda')

@section('content')
<header id="carousel" class="carousel w-full h-screen overflow-hidden">
        {{-- @foreach ($carousel as $item)
        <div id="{{ $item->slide }}" class="carousel-item relative w-full">
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2 z-40">
                <a href="#slide3" class="btn btn-circle btn-primary border-none">❮</a> 
                <a href="#slide2" class="btn btn-circle btn-primary border-none">❯</a>
            </div>
            <div class="absolute bg-black bg-opacity-70 z-20 w-full h-full top-0 left-0 right-0 bottom-0"></div>
            <div class="absolute h-full w-full top-0 left-0 flex flex-col justify-center items-center z-30 gap-2">
                <h2 class="text-white xl:text-3xl lg:text-3xl text-2xl text-center">{{ $item->title }}</h2>
                <p class="xl:text-lg lg:text-lg text-md text-white" style="font-family: var(--font-secondary)">{{ $item->desc }}</p>
                <button class="btn btn-primary capitalize font-normal text-white rounded-full mt-5">Pelajari Lebih</button>
            </div>
            <img src="" class="w-full object-cover" />
        </div> 
        @endforeach --}}
</header>

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

@section('script')
<script>
    const data = [
        {
            slide: "slide1",
            img: "{{url('assets/carousel-1.png')}}",
            title: "Selamat Datang di Website Desa Kembaran",
            desc: "Website ini dibuat untuk memudahkan masyarakat dalam mengakses informasi seputar Desa Kembaran",
            next: "slide2",
            prev: "slide3",
        },
        {
            slide: "slide2",
            img: "{{url('assets/carousel-2.png')}}",
            title: "Selamat Datang di Website Desa Kembaran",
            desc: "Website ini dibuat untuk memudahkan masyarakat dalam mengakses informasi seputar Desa Kembaran",
            next: "slide3",
            prev: "slide1",
        },
        {
            slide: "slide3",
            img: "{{url('assets/carousel-1.png')}}",
            title: "Selamat Datang di Website Desa Kembaran",
            desc: "Website ini dibuat untuk memudahkan masyarakat dalam mengakses informasi seputar Desa Kembaran",
            next: "slide1",
            prev: "slide2",
        },
    ];

    const carouselItem = data.map((item) => {
        return `
            <div id="${item.slide}" class="carousel-item relative w-full">
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2 z-40">
                    <a href="#${item.prev}" class="btn btn-circle btn-primary border-none">❮</a>
                    <a href="#${item.next}" class="btn btn-circle btn-primary border-none">❯</a>
                </div>
                <div class="absolute bg-black bg-opacity-70 z-20 w-full h-full top-0 left-0 right-0 bottom-0"></div>
                <div class="absolute h-full w-full top-0 left-0 flex flex-col justify-center items-center z-30 gap-2 xl:p-0 lg:p-0 p-14">
                    <h2 class="text-white xl:text-3xl lg:text-3xl text-2xl text-center">${item.title}</h2>
                    <p class="xl:text-lg lg:text-lg text-md text-white text-center" style="font-family: var(--font-secondary)">${item.desc}</p>
                    <button class="btn btn-primary capitalize font-normal text-white rounded-full mt-5 px-10">Pelajari Lebih</button>
                </div>
                <img src="${item.img}" class="w-full object-cover" />
            </div>
        `;
    });

    document.getElementById("carousel").innerHTML = carouselItem.join("");
</script>
@endsection
