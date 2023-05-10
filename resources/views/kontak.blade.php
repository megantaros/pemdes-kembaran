
@extends('layout.user')

@section('content')
    <div class="section" id="headerService">
        <div class="lg:h-[500px] h-[30vh] lg:pt-0" style="background: #022E57;">
            <div class="flex flex-row bg-transparent">
                <div class="lg:basis-1/2 basis-1/2 w-full lg:h-[500px] h-[30vh] overflow-hidden relative">
                    <img src="{{ asset('assets/kontak.png') }}" alt="Perangkat Desa" class="absolute imgPerangkat">
                </div>
                <div class="lg:basis-1/2 basis-1/2 w-full lg:h-[500px] h-[30vh] relative">
                    <div class="lg:absolute block kontakHeroText">
                        <div class="lg:text-5xl lg:mb-3 text-lg mt-12" style="color: #FFEBAD;">Kontak kami</div>
                        <div class="lg:text-xl lg:mb-5 mb-4 text-sm text-white textPortal">Ada keluhan ? Tulis di bawah ini perihal keluhan Anda</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="kontak">
        <div class="container mb-[70px]">
            <div class="grid lg:grid-cols-2 grid-cols-1">
                <div class="alamat lg:h-96 h-auto lg:mb-0 mb-3">
                    <div class="textTitle lg:text-[36px] text-xl lg:mt-[49px] mt-4 lg:mb-[19px] mb-4">Hubungi kami</div>
                    <div class="flex flex-col">
                        <div class="flex font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            <div class="lg:text-[20px] text-sm ms-2 textAddress lg:w-[500px] w-full">Jalan Joko Sangkrip No.1 RT 1 / II Desa Kembaran, Kecamatan Kebumen, Kabupaten Kebumen, Jawa Tengah (54315)</div>
                        </div>
                        <div class="flex mt-3 font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                            <div class="lg:text-[20px] text-sm ms-2 textAddress lg:w-[500px] w-full textAddress">( 0287 ) 383349</div>
                        </div>
                        <div class="flex mt-3 font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                                <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
                            </svg>
                            <div class="lg:text-[20px] text-sm ms-2 textAddress lg:w-[500px] w-full textAddress">pemdes-kembaran@gmail.com</div>
                        </div>
                    </div>
                </div>
                <div class="alamat lg:h-96 h-auto relative">
                    <form class="lg:absolute block formKontak">
                        <div class="card card-side bg-base-100 shadow-xl w-full">
                            <div class="card-body">
                            <div class="card-actions justify-start lg:text-lg text-sm">
                                <div class="text-label">Masukkan Nama Lengkap</div>
                                <input type="text" placeholder="Tulis disini..." class="lg:input input-sm rounded-lg input-bordered input-info w-full lg:mb-3 mb-1 text-sm lg:placeholder:text-lg placeholder:text-sm" />
                                <div class="text-label">Masukkan Email</div>
                                <input type="email" placeholder="Tulis disini..." class="lg:input input-sm rounded-lg input-bordered input-info w-full lg:mb-3 mb-1 text-sm lg:placeholder:text-lg  placeholder:text-sm" />
                                <div class="text-label">Keluhan</div>
                                <textarea class="text-area textarea-sm rounded-lg textarea-info w-full mb-2 text-sm placeholder:text-sm placeholder:px-3 lg:placeholder:text-lg " placeholder="Tulis disini..."></textarea>
                                <input type="submit" class="btn btn-primary px-4 btnSubmit w-full lg:mt-6 lg:mb-3 mt-3 mb-2" value="Kirim">
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection