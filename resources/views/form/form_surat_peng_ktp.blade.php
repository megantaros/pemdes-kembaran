
@extends('layout.user')

@section('active')
    active
@endsection

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
            <div class="card lg:card-side bg-base-100 shadow-xl border-none">
                <div class="card-body">
                <form action="/layanan/{{ $id_surat_pengajuan }}/surat_peng_ktp" method="POST" enctype="multipart/form-data">
                @csrf
                    <h1 class="card-title lg:text-3xl text-2xl w-100 flex justify-center">Pengajuan Surat Pengantar KTP</h1>
                    <p class="p-pengajuan lg:text-lg text-md font-medium">Isi form pengajuan surat di bawah ini!</p>
                    @error('id_warga')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                        <div><i class="bi bi-x-circle"></i><span>Anda sudah mengirimkan data, silahkan tunggu konfirmasi dari Admin. Terima Kasih!</span></div>
                        </div>
                    @enderror
                    <div class="grid lg:grid-cols-2 text-left gap-4 mt-8">
                    <div class="p-5 rounded-lg" style="background-color: #ffebae">
                        <h1 class="text-xl font-medium">Form Pengisian</h1>
                        <div class="divider before:bg-primary before:h-[3px] my-2"></div>
                        <input type="hidden" value="{{ Auth::user()->id_warga }}" name="id_warga"/>
                        <div class="text-label">Jenis Permohonan *</div>
                        <select class="select select-primary w-full mb-3" name="jenis_permohonan">
                            <option value="Baru">Baru</option>
                            <option value="Perpanjangan">Perpanjangan</option>
                            <option value="Penggantian">Penggantian</option>
                        </select>
                        @error('jenis_permohonan')
                            <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                                <div>
                                <i class="bi bi-x-circle"></i>
                                <span>Kolom tidak boleh kosong!</span>
                                </div>
                            </div>
                        @enderror
                        <div class="text-label">No. KK *</div>
                        <input type="text" placeholder="Masukkan No. KK" class="input input-bordered input-info w-full my-1 read-only:bg-[#9cb4cc]" name="kk"/>
                        @error('kk')
                            <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                                <div>
                                <i class="bi bi-x-circle"></i>
                                <span>Kolom tidak boleh kosong!</span>
                                </div>
                            </div>
                        @enderror
                    </div>
                    <div class="p-5 rounded-lg" style="background-color: #ffebae">
                        <h1 class="text-xl font-medium">Upload Dokumen</h1>
                        <div class="divider before:bg-primary before:h-[3px] my-2"></div>
                        <div class="text-label">Pengantar RT *</div>
                        <input type="file" placeholder="Unggah Dokumen Pengantar RT" class="file-input file-input-bordered file-input-primary w-full my-1" accept="image/png, image/jpeg" name="pengantar_rt"/>
                        @error('pengantar_rt')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror
                        <div class="text-label">KTP Asli*</div>
                        <input type="file" placeholder="Unggah Dokumen Pengantar RT" class="file-input file-input-bordered file-input-primary w-full my-1" accept="image/png, image/jpeg"  name="foto_ktp"/>
                        @error('foto_ktp')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror
                        <div class="text-label">KK Asli *</div>
                        <input type="file" placeholder="Unggah Dokumen Fotokopi KK" class="file-input file-input-bordered file-input-primary w-full my-1" accept="image/png, image/jpeg"  name="foto_kk"/>
                        @error('foto_kk')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror
                    </div>
                    </div>
                    <div class="card-actions justify-end mt-8">
                    <button type="submit" class="btn btn-primary w-25 text-white font-normal capitalize text-xl">Kirim</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>
@endsection