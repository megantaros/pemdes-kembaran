
@extends('layout.user')

@section('title', 'Kontak')

@section('content')
<section data-aos="fade-up" id="headerService" class="bg-[#022E57]">
    <div class="container">
        <div class="grid lg:grid-cols-2 md:grid-cols-1 grid-cols-1 gap-4">

            <div class="overflow-hidden flex items-baseline">
                <img src="{{ asset('assets/kontak.png') }}" alt="Kontak" class="lg:h-96 md:h-56 h-56 lg:-mb-5 m-auto"
                />
            </div>

            <div>
                <div class="flex flex-col gap-4">
                    <h2 class="active lg:text-2xl text-xl">Kontak kami</h2>
                    <p class="lg:text-md md:text-md text-sm text-white" style="font-family: Poppins"> Ada keluhan ? Tulis di bawah ini perihal keluhan Anda</p>
                <div>

                <div class="card bg-white shadow-md mb-10">
                    <div class="card-body gap-4">
                        <form>
                            <div class="text-label text-sm">Nama *</div>
                            <input type="text" placeholder="Masukkan Nama" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm"/>

                            <div class="text-label text-sm">Email *</div>
                            <input type="email" placeholder="Masukkan Email" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm"/>

                            <div class="text-label text-sm">Keluhan *</div>
                            <textarea class="textarea textarea-primary w-full placeholder:text-sm" placeholder="Tulis disini..."></textarea>

                            <input type="submit" class="btn btn-primary px-4 btnSubmit w-full lg:mt-6 lg:mb-3 mt-3 mb-2 capitalize font-normal" value="Kirim">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-aos="fade-up" class="py-10">
    <div class="container text-center">
        <div>
            <h1 class="lg:text-2xl md:text-lg text-lg font-semibold lg:mb-4 mb-2">Hubungi Kami</h1>
            <p class="lg:mb-10 lg:w-3/5 mx-auto lg:text-lg md:text-sm text-sm mb-7 w-4/5" style="font-family: Poppins">Hubungi pada kontak di bawah ini untuk informasi lebih lanjut</p>
        </div>

        <div class="grid lg:grid-cols-2 md:grid-cols-1 grid-cols-1 gap-4">
            <a href="https://goo.gl/maps/1pm8PfyicET8g2d79" target="_blank" class="card bg-slate-200 cursor-pointer shadow-md card-animation">
                <div class="card-body">
                    <img id="img" src="{{ asset('assets/location.png') }}" alt="Alamat" class="w-20 h-20 mx-auto mb-4" />
                    <h5 class="font-semibold text-md mt-2">Lokasi</h5>
                    <p class="font-medium text-sm" style="font-family: Poppins">Jalan Joko Sangkrip No.1 RT 1 / II Desa Kembaran, Kecamatan Kebumen, Kabupaten Kebumen, Jawa Tengah (54315)</p>
                </div>
            </a>

            <a href="tel:+0287383349" target="_blank" class="card bg-slate-200 cursor-pointer shadow-md card-animation">
                <div class="card-body">
                    <img id="img" src="{{ asset('assets/phone-call.png') }}" alt="Alamat" class="w-20 h-20 mx-auto mb-4" />
                    <h5 class="font-semibold text-md mt-2">Telephone</h5>
                    <p class="font-medium text-sm" style="font-family: Poppins">( 0287 ) 383349</p>
                </div>
            </a>

            <a href="mailto:desakembaran09@gmail.com" target="_blank" class="card bg-slate-200 cursor-pointer shadow-md card-animation">
                <div class="card-body">
                    <img id="img" src="{{ asset('assets/gmail.png') }}" alt="Alamat" class="w-20 h-20 mx-auto mb-4" />
                    <h5 class="font-semibold text-md mt-2">Email</h5>
                    <p class="font-medium text-sm" style="font-family: Poppins">desakembaran09@gmail.com</p>
                </div>
            </a>

            <a href="https://kembaran.kec-kebumen.kebumenkab.go.id/" target="_blank" class="card bg-slate-200 cursor-pointer shadow-md card-animation">
                <div class="card-body">
                    <img id="img" src="{{ asset('assets/web.png') }}" alt="Alamat" class="w-20 h-20 mx-auto mb-4" />
                    <h5 class="font-semibold text-md mt-2">Website Resmi</h5>
                    <p class="font-medium text-sm" style="font-family: Poppins">https://kembaran.kec-kebumen.kebumenkab.go.id/</p>
                </div>
            </a>
        </div>

        {{-- <div className="grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-4">
            <a href="https://goo.gl/maps/1pm8PfyicET8g2d79" target="_blank" className="card bg-slate-300 cursor-pointer shadow-md card-animation">
                <div class="card-body">
                    <img src="{{ asset('assets/location.png') }}" alt="Alamat" class="w-20 h-20 mx-auto mb-4" />
                    <h5 className="font-semibold text-md mt-2">Lokasi</h5>
                    <p class="font-medium text-sm" style="font-family: Poppins">Jalan Joko Sangkrip No.1 RT 1 / II Desa Kembaran, Kecamatan Kebumen, Kabupaten Kebumen, Jawa Tengah (54315)</p>
                </div>
            </a>
            <a href="https://goo.gl/maps/1pm8PfyicET8g2d79" target="_blank" className="card bg-slate-300 cursor-pointer shadow-md card-animation">
                <div class="card-body">
                    <img src="{{ asset('assets/location.png') }}" alt="Alamat" class="w-20 h-20 mx-auto mb-4" />
                    <h5 className="font-semibold text-md mt-2">Lokasi</h5>
                    <p class="font-medium text-sm" style="font-family: Poppins">Jalan Joko Sangkrip No.1 RT 1 / II Desa Kembaran, Kecamatan Kebumen, Kabupaten Kebumen, Jawa Tengah (54315)</p>
                </div>
            </a>
            <a href="https://goo.gl/maps/1pm8PfyicET8g2d79" target="_blank" className="card bg-slate-300 cursor-pointer shadow-md card-animation">
                <div class="card-body">
                    <img src="{{ asset('assets/location.png') }}" alt="Alamat" class="w-20 h-20 mx-auto mb-4" />
                    <h5 className="font-semibold text-md mt-2">Lokasi</h5>
                    <p class="font-medium text-sm" style="font-family: Poppins">Jalan Joko Sangkrip No.1 RT 1 / II Desa Kembaran, Kecamatan Kebumen, Kabupaten Kebumen, Jawa Tengah (54315)</p>
                </div>
            </a>
            <a href="https://goo.gl/maps/1pm8PfyicET8g2d79" target="_blank" className="card bg-slate-300 cursor-pointer shadow-md card-animation">
                <div class="card-body">
                    <img src="{{ asset('assets/location.png') }}" alt="Alamat" class="w-20 h-20 mx-auto mb-4" />
                    <h5 className="font-semibold text-md mt-2">Lokasi</h5>
                    <p class="font-medium text-sm" style="font-family: Poppins">Jalan Joko Sangkrip No.1 RT 1 / II Desa Kembaran, Kecamatan Kebumen, Kabupaten Kebumen, Jawa Tengah (54315)</p>
                </div>
            </a>
        </div> --}}
        
    </div>
</section>

@endsection