
@extends('layout.user')

@section('content')
    <section>
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
    </section>

    <section id="service" class="lg:pt-14 lg:pb-20 pt-7 pb-10">
        <div class="container text-center">
            <div class="textTitle">
                <h1 class="lg:text-4xl text-2xl lg:mb-9 mb-2">Pelayanan Kami</h1>
                <p class="lg:text-xl lg:mb-20 lg:w-2/5 mx-auto text-md mb-7 w-4/5">Pemerintah Desa Kembaran siap melayani Anda kapanpun dan dimanapun</p>
            </div>
            <div class="grid lg:grid-cols-3 lg:gap-3 gap-2 grid-cols-2">
                <a href="#my_modal_1" class="cols lg:h-56 shadow-xl lg:pt-8 py-6 cardService border-inherit">
                    <img src="{{ asset('assets/icon-1.png') }}" class="m-auto lg:w-[106px] lg:h-[106px] w-[53px] h-[53px]">
                    <div class="lg:mt-3 lg:text-xl lg:leading-loose mt-2 w-3/4 m-auto">Surat Pengantar KK & KTP</div>
                </a>
                <a href="#my_modal_2" class="cols lg:h-56 shadow-xl lg:pt-8 py-6 cardService border-inherit">
                    <img src="{{ asset('assets/icon-2.png') }}" class="m-auto lg:w-[106px] lg:h-[106px] w-[53px] h-[53px]">
                    <div class="lg:mt-3 lg:text-xl lg:leading-loose mt-2 w-3/4 m-auto leading-5">Surat Keterangan Usaha</div>
                </a>
                <a href="#my_modal_3" class="cols lg:h-56 shadow-xl lg:pt-8 py-6 cardService border-inherit">
                    <img src="{{ asset('assets/icon-3.png') }}" class="m-auto lg:w-[99px] lg:h-[111px] w-auto h-[53px]">
                    <div class="lg:mt-3 lg:text-xl lg:leading-loose mt-2 w-3/4 m-auto leading-5">Surat Pengantar SKCK</div>
                </a>
                <a href="#my_modal_4" class="cols lg:h-56 shadow-xl lg:pt-8 py-6 cardService border-inherit">
                    <img src="{{ asset('assets/icon-4.png') }}" class="m-auto lg:w-[106px] lg:h-[106px] w-auto h-[53px]">
                    <div class="lg:mt-3 lg:text-xl lg:leading-loose mt-2 w-3/4 m-auto leading-5">Surat Keterangan Domisili</div>
                </a>
                <a href="#my_modal_5" class="cols lg:h-56 shadow-xl lg:pt-8 py-6 cardService border-inherit">
                    <img src="{{ asset('assets/icon-5.png') }}" class="m-auto lg:w-[123px] lg:h-[103px] w-auto h-[53px]">
                    <div class="lg:mt-3 lg:text-xl lg:leading-loose mt-2 w-3/4 m-auto leading-5">Surat Keterangan Pindah</div>
                </a>
                <a href="#my_modal_6" class="cols lg:h-56 shadow-xl lg:pt-8 py-6 cardService border-inherit">
                    <img src="{{ asset('assets/icon-6.png') }}" class="m-auto lg:w-[111px] lg:h-[92px] w-auto h-[53px]">
                    <div class="lg:mt-3 lg:text-xl lg:leading-loose mt-2 w-3/4 m-auto leading-5">Surat Keterangan Pindah Datang</div>
                </a>
            </div>
            {{-- Modal --}}
            <div class="modal" id="my_modal_1">
                <div class="modal-box text-xl">
                  {{-- <h3 class="font-bold text-lg"><strong>yang dibutuhkan:</strong></h3> --}}
                  <div class="alert alert-info justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span><strong>Info</strong>Dokumen yang dibuthkan: </span>
                  </div>
                  {{-- <p class="py-4">This modal works with anchor links</p> --}}
                  <div class="card bg-white text-left border-0 text-lg">
                        <p>1. KTP Asli</p>
                        <p>2. KK Asli</p>
                        <p>3. Surat Pengantar dari RT</p>
                        <p class="my-2">Untuk pengurusan KK, tambahkan:</p>
                        <p>4. Fotokopi Buku Nikah</p>
                  </div>
                  <div class="modal-action">
                   <a href="#service" class="btn btn-primary text-white fw-normal">Oke</a>
                  </div>
                </div>
            </div>
            <div class="modal" id="my_modal_2">
                <div class="modal-box text-xl">
                  <div class="alert alert-info justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span><strong>Info</strong>Dokumen yang dibuthkan: </span>
                  </div>
                  <div class="card bg-white text-left border-0 text-lg">
                        <p>1. Fotokopi KTP</p>
                        <p>2. Fotokopi KK</p>
                        <p>3. Foto Lokasi Usaha</p>
                        <p>4. Surat Pengantar dari RT</p>
                  </div>
                  <div class="modal-action">
                   <a href="#service" class="btn btn-primary text-white fw-normal">Oke</a>
                  </div>
                </div>
            </div>
            <div class="modal" id="my_modal_3">
                <div class="modal-box text-xl">
                  <div class="alert alert-info justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span><strong>Info</strong>Dokumen yang dibuthkan: </span>
                  </div>
                  <div class="card bg-white text-left border-0 text-lg">
                        <p>1. Fotokopi KTP</p>
                        <p>2. Surat Pengantar dari RT</p>
                  </div>
                  <div class="modal-action">
                   <a href="#service" class="btn btn-primary text-white fw-normal">Oke</a>
                  </div>
                </div>
            </div>
            <div class="modal" id="my_modal_4">
                <div class="modal-box text-xl">
                  <div class="alert alert-info justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span><strong>Info</strong>Dokumen yang dibuthkan: </span>
                  </div>
                  <div class="card bg-white text-left border-0 text-lg">
                    <p>1. Fotokopi KTP</p>
                    <p>2. Fotokopi KK</p>
                    <p>3. Foto Rumah</p>
                    <p>4. Surat Pengantar dari RT</p>
                  </div>
                  <div class="modal-action">
                   <a href="#service" class="btn btn-primary text-white fw-normal">Oke</a>
                  </div>
                </div>
            </div>
            <div class="modal" id="my_modal_5">
                <div class="modal-box text-xl">
                  <div class="alert alert-info justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span><strong>Info</strong>Dokumen yang dibuthkan: </span>
                  </div>
                  <div class="card bg-white text-left border-0 text-lg">
                    <p>1. KTP Asli</p>
                    <p>2. KK Asli</p>
                    <p>3. Surat Pengantar dari RT</p>
                  </div>
                  <div class="modal-action">
                   <a href="#service" class="btn btn-primary text-white fw-normal">Oke</a>
                  </div>
                </div>
            </div>
            <div class="modal" id="my_modal_6">
                <div class="modal-box text-xl">
                  <div class="alert alert-info justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span><strong>Info</strong>Dokumen yang dibuthkan: </span>
                  </div>
                  <div class="card bg-white text-left border-0 text-lg">
                    <p>1. Surat Keterangan Pindah yang dikeluarkan oleh Kantor Capil</p>
                  </div>
                  <div class="modal-action">
                   <a href="#service" class="btn btn-primary text-white fw-normal">Oke</a>
                  </div>
                </div>
            </div>
        </div>
    </section>

    <section id="visiMisi" class="lg:pt-14 lg:pb-20 pt-7 pb-10">
        <div class="container text-center">
            <div class="textTitle">
                <h1 class="lg:text-4xl text-2xl lg:mb-9 mb-2">Visi Misi Desa Kembaran</h1>
                <p class="lg:text-xl lg:mb-20 lg:w-2/5 mx-auto text-md mb-7 w-4/5">Untuk memajukan desa serta mengembangkan penduduk maka Desa Kembaran</p>
            </div>
            <div class="row px-2">
                <div class="col-12 rounded-lg overflow-hidden relative w-full lg:h-32 h-20 shapeVision flex items-center justify-end">
                    <div class="absolute bg-slate-900 lg:h-32 h-20 rounded-r-full w-2/5 roundedInShape lg:left-[-100px] left-[-20px] flex justify-end items-center lg:pr-14 pr-7 text-white">
                        <img src="{{ asset('assets/icon-vision.png') }}" alt="Icon Visi" class="lg:w-[95px] lg:h-[95px] w-auto h-11">
                        <div class="lg:text-4xl lg:ml-5 ml-3 text-md">Visi</div>
                    </div>
                    <div class="lg:text-4xl font-medium italic text-md w-3/5">“Menuju Desa Maju Mandiri”</div>
                </div>
                <div class="col-12 rounded-lg overflow-hidden relative w-full shapeVision mt-4 text-left pb-9">
                    <div class="absolute bg-slate-900 lg:h-32 h-20 rounded-l-full roundedInShape2 flex justify-start items-center lg:pl-14 pl-7 text-white lg:w-3/4 w-3/4 lg:right-[-100px] right-[-50px]">
                        <img src="{{ asset('assets/icon-mission.png') }}" alt="Icon Visi" class="lg:w-[70px] lg:h-[70px] w-auto h-11">
                        <div class="lg:text-4xl lg:ml-5 ml-3 text-md">Misi</div>
                    </div>
                    <div class="lg:h-32 h-16 w-full mb-7"></div>
                    <div class="row rowMission lg:px-12 px-6">
                        <ul class="lg:text-xl text-sm">
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
        </div>
    </section>

    <section id="strukturPemdes" class="lg:pt-14 lg:pb-20 pt-7 pb-10">
        <div class="container text-center">
            <div class="textTitle">
                <h1 class="lg:text-4xl text-2xl lg:mb-9 mb-2">Struktur Pemerintahan Desa</h1>
                <p class="lg:text-xl lg:mb-20 lg:w-2/5 mx-auto text-md mb-7 w-4/5">Pemerintahan Desa Kembaran memiliki struktur pemerintahan beserta para pejabatnya</p>
            </div>
            <img src="{{ asset('assets/bagan-jabatan.png') }}" alt="Bagan Jabatan" class="m-auto">
        </div>
    </section>
@endsection
