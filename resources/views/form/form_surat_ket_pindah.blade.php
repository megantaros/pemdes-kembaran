
@extends('layout.user')

@section('title', 'Surat Keterangan Pindah')

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
                        <h2 class="text-lg leading-1">Form Pengisian Surat Keterangan Pindah</h2>
                        <p class="font-normal text-sm" style="font-family: Poppins">Isi form pengajuan surat di bawah ini!</p>
                    </div>
                </div>

                <hr>

                <form class="grid xl:grid-cols-2 lg:grid-cols-2 md:grid-cols-2 grid-cols-1 text-left gap-6" action="{{ route('keterangan-pindah.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="p-4 bg-slate-200 rounded-lg">

                        <input type="hidden" value="{{ Auth::user()->id_warga }}" name="id_warga"/>

                        {{-- <div class="text-label text-sm">KK *</div>
                        <input type="text" placeholder="Masukkan No. KK" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="kk"/>

                        @error('kk')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror --}}

                        <div class="text-label text-sm">Nama Kepala Keluarga *</div>
                        <input type="text" placeholder="Masukkan Nama Kepala Keluarga" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="nama_kepala_keluarga"/>

                        @error('nama_kepala_keluarga')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror

                        <div class="text-label text-sm">Alasan Pindah *</div>
                        <select class="select select-primary w-full my-1 show_form_lainnya" name="alasan_pindah">
                            <option value="Pekerjaan">Pekerjaan</option>
                            <option value="Pendidikan">Pendidikan</option>
                            <option value="Keamanan">Keamanan</option>
                            <option value="Kesehatan">Kesehatan</option>
                            <option value="Perumahan">Perumahan</option>
                            <option value="Keluarga">Keluarga</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>

                        @error('alasan_pindah')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror

                        <div class="form_lainnya">
                            <div class="text-label text-sm">Lainnya *</div>
                            <input type="text" placeholder="Contoh: Ikut Paman" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="lainnya"/>

                            @error('lainnya')
                                <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                                    <div>
                                    <i class="bi bi-x-circle"></i>
                                    <span>Kolom tidak boleh kosong!</span>
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="text-label text-sm">Alamat Tujuan *</div>
                        <textarea class="textarea textarea-primary w-full placeholder:text-sm" placeholder="Masukkan Alamat Tujuan" name="alamat_tujuan"></textarea>

                        @error('alamat_tujuan')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror

                        {{-- <div class="text-label text-sm">Jumlah Anggota Pindah *</div>
                        <input type="number" placeholder="Masukkan Jumlah Anggota Pindah" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="jml_angg_pindah"/>

                        @error('jml_angg_pindah')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror --}}

                        <div class="text-label text-sm">Status Hubungan Dalam Keluarga *</div>
                        <select class="select select-primary w-full my-1" name="shdk">
                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                            <option value="Suami">Suami</option>
                            <option value="Istri">Istri</option>
                            <option value="Anak">Anak</option>
                            <option value="Menantu">Menantu</option>
                            <option value="Cucu">Cucu</option>
                            <option value="Orang Tua">Orang Tua</option>
                            <option value="Mertua">Mertua</option>
                            <option value="Famili Lainnya">Famili Lainnya</option>
                            <option value="Pembantu">Pembantu</option>
                        </select>

                        @error('shdk')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror

                    </div>

                    <div class="p-4 bg-slate-200 rounded-lg">

                        <div class="text-label text-sm">Scan Surat Pengantar RT*</div>
                        <input type="file" class="input input-bordered input-primary w-full file-input-primary file:border-none file:py-1 my-1" accept="image/png, image/jpeg" name="pengantar_rt"/>

                        @error('pengantar_rt')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror

                        <div class="text-label text-sm">Scan KTP Asli*</div>
                        <input type="file" class="input input-bordered input-primary w-full file-input-primary file:border-none file:py-1 my-1" accept="image/png, image/jpeg" name="foto_ktp"/>

                        @error('foto_ktp')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror

                        <div class="text-label text-sm">Scan KK Asli *</div>
                        <input type="file" class="input input-bordered input-primary w-full file-input-primary file:border-none file:py-1 my-1" accept="image/png, image/jpeg"  name="foto_kk"/>
                        
                        @error('foto_kk')
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