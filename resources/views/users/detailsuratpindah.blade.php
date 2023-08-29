
@extends('layout.profil')

@section('title', 'Detail Surat Keterangan Pindah')

@section('content')
@php
    $shdk = $data->shdk;
    
    if($shdk = '01') {
        $shdk = 'Kepala Keluarga';
    } elseif ($shdk == '02') {
        $shdk = 'Suami';
    } elseif ($shdk == '03') {
        $shdk = 'Istri';
    } elseif ($shdk == '04') {
        $shdk = 'Anak';
    } elseif ($shdk == '05') {
        $shdk = 'Menantu';
    } elseif ($shdk == '06') {
        $shdk = 'Cucu';
    } elseif ($shdk == '07') {
        $shdk = 'Orangtua';
    } elseif ($shdk == '08') {
        $shdk = 'Mertua';
    } elseif ($shdk == '09') {
        $shdk = 'Famili Lainnya';
    } elseif ($shdk == '10') {
        $shdk = 'Pembantu';
    }

    $alasanPermohonan = $data->alasan_permohonan;

    if( $alasanPermohonan == '1') {
        $alasanPermohonan = 'Membentuk Rumah Tangga Baru';
    } elseif ($alasanPermohonan == '2') {
        $alasanPermohonan = 'Kartu Keluarga Hilang/Rusak';
    } elseif ($alasanPermohonan == '3') {
        $alasanPermohonan = 'Lainnya';
    }
@endphp

<div class="lg:col-span-3">
    <div class="card bg-white min-h-screen shadow-lg">
        <div class="card-body">

            <div>
                <h2 class="lg:text-lg md:text-sm text-sm font-semibold">Detail Surat Keterangan Pindah</h2>
                <div class="flex">
                    <p class="lg:text-md md:text-sm text-sm" style="font-family: Poppins">Pastikan identitas Anda sesuai dengan yang tertera di e-KTP</p>
                </div>
            </div>

            <hr class="my-4">

            @php
            $statusSurat = $data->status;
            @endphp

            <form action="{{ route('keterangan-pindah.update', ['keterangan_pindah' => $data->id_surat_ket_pindah]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="p-4 bg-slate-200 rounded-lg gap-1 grid lg:grid-cols-2">

                    <div>
                        <div class="text-label text-sm">Nama Lengkap *</div>
                        <input type="text" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" value="{{ $data->name }}" readonly/>
                    </div>

                    <div>
                        <div class="text-label text-sm">NIK *</div>
                        <input type="text" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" value="{{ $data->nik }}" readonly/>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="text-label text-sm">Alamat *</div>
                        <textarea class="textarea textarea-primary w-full placeholder:text-sm" readonly>{{ $data->alamat }}</textarea>
                    </div>

                    <div>
                        <div class="text-label text-sm">KK *</div>
                        <input type="text" placeholder="Masukkan No. KK" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="kk" value="{{ $data->kk }}"/>
    
                        @error('kk')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <div class="text-label text-sm">Nama Kepala Keluarga *</div>
                        <input type="text" placeholder="Masukkan Nama Kepala Keluarga" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="nama_kepala_keluarga" value="{{ $data->nama_kepala_keluarga }}"/>

                        @error('nama_kepala_keluarga')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <div class="text-label text-sm">Alasan Pindah *</div>
                        <select class="select select-primary w-full my-1 show_form_lainnya" name="alasan_pindah">
                            <option value="{{ $data->alasan_pindah }}" selected disabled>{{ $data->alasan_pindah }}</option>
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
                    </div>

                    <div>
                        <div class="text-label text-sm">Jumlah Anggota Pindah *</div>
                        <input type="number" placeholder="Masukkan Jumlah Anggota Pindah" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="jml_angg_pindah" value="{{ $data->jml_angg_pindah }}"/>

                        @error('jml_angg_pindah')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div class="lg:col-span-2">
                        <div class="text-label text-sm">Status Hubungan Dalam Keluarga *</div>
                        <select class="select select-primary w-full my-1" name="shdk">
                            <option value="{{ $data->shdk }}" selected disabled>{{ $shdk }}</option>
                            <option value="01">Kepala Keluarga</option>
                            <option value="02">Suami</option>
                            <option value="03">Istri</option>
                            <option value="04">Anak</option>
                            <option value="05">Menantu</option>
                            <option value="06">Cucu</option>
                            <option value="07">Orangtua</option>
                            <option value="08">Mertua</option>
                            <option value="09">Famili Lainnya</option>
                            <option value="10">Pembantu</option>
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

                    <div class="lg:col-span-2">
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
                    </div>

                    <div class="lg:col-span-2">
                        <div class="text-label text-sm">Alamat Tujuan *</div>
                        <textarea class="textarea textarea-primary w-full placeholder:text-sm" placeholder="Masukkan Alamat Tujuan" name="alamat_tujuan">{{ $data->alamat_tujuan }}</textarea>

                        @error('alamat_tujuan')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div class="p-4 bg-white rounded-lg relative lg:col-span-2 flex items-center border-[#9CB4CC] border-2 my-1">
    
                        <div class="flex-1">
    
                            <label for="fileUpload1" class="text-label text-sm custom-file-upload cursor-pointer flex gap-2 items-center hover:underline">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                <span>Upload Pengantar RT</span>
                            </label>
                            <input type="file" id="fileUpload1" class="hidden" accept="image/png, image/jpeg" name="pengantar_rt" />

                            <p class="text-sm font-semibold mt-2">{{ $data->pengantar_rt != null ? $data->pengantar_rt : 'Belum Upload File' }}</p>
                        </div>
    
                        <a href="{{ url('berkaspemohon/'. $data->pengantar_rt ) }}" target="__blank" class="text-sm hover:underline text-blue-600">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <span>Lihat Gambar</span>
                        </a>
    
                    </div>

                    <div class="p-4 bg-white rounded-lg relative lg:col-span-2 flex items-center border-[#9CB4CC] border-2 my-1">
    
                        <div class="flex-1">
    
                            <label for="fileUpload2" class="text-label text-sm custom-file-upload cursor-pointer flex gap-2 items-center hover:underline">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                <span>Upload KTP Asli</span>
                            </label>
                            <input type="file" id="fileUpload2" class="hidden" accept="image/png, image/jpeg" name="foto_ktp" />
    
                            <p class="text-sm font-semibold mt-2">{{ $data->foto_ktp != null ? $data->foto_ktp : 'Belum Upload File' }}</p>
    
                        </div>
    
                        <a href="{{ url('berkaspemohon/'. $data->foto_ktp ) }}" target="__blank" class="text-sm hover:underline text-blue-600">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <span>Lihat Gambar</span>
                        </a>
    
                    </div>

                    <div class="p-4 bg-white rounded-lg relative lg:col-span-2 flex items-center border-[#9CB4CC] border-2 my-1">
    
                        <div class="flex-1">
    
                            <label for="fileUpload3" class="text-label text-sm custom-file-upload cursor-pointer flex gap-2 items-center hover:underline">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                <span>Upload KK Asli</span>
                            </label>
                            <input type="file" id="fileUpload3" class="hidden" accept="image/png, image/jpeg" name="foto_kk" />
    
                            <p class="text-sm font-semibold mt-2">{{ $data->foto_kk != null ? $data->foto_kk : 'Belum Upload File' }}</p>
    
                        </div>
    
                        <a href="{{ url('berkaspemohon/'. $data->foto_kk ) }}" target="__blank" class="text-sm hover:underline text-blue-600">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <span>Lihat Gambar</span>
                        </a>
    
                    </div>

                    <div class="p-4 bg-white rounded-lg relative lg:col-span-2 flex items-center border-[#9CB4CC] border-2 my-1">
    
                        @php
                            $keteranganAdmin = $data->keterangan_admin;

                            if($keteranganAdmin == null) {
                                $keteranganAdmin = 'Belum ada keterangan dari admin';
                            }
                        @endphp

                        <div class="text-label text-sm">Keterangan Admin *</div>
                        <textarea class="textarea textarea-primary w-full placeholder:text-sm my-1" readonly>{{ $keteranganAdmin  }}</textarea>

                    </div>

                    <div class="p-4 bg-white rounded-lg relative lg:col-span-2 flex items-center border-[#9CB4CC] border-2 my-1">

                        <div class="text-label text-sm">Keterangan Warga *</div>
                        <textarea class="textarea textarea-primary w-full placeholder:text-sm my-1" placeholder="Tambah Keterangan (Optional)" name="keterangan_warga">{{ $data->keterangan_warga }}</textarea>

                    </div>

                    <div class="lg:col-span-2">
                        <button type="submit" class="{{ $statusSurat == 'Diterima' || $statusSurat == 'Ditolak' ? 'hidden' : 'btn btn-warning w-full text-white font-normal capitalize' }}">Update</button>
                    </div>

                </div>


            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('#fileUpload1').change(function() {
        var i = $(this).prev('label').clone();
        var file = $('#fileUpload1')[0].files[0].name;
        $(this).prev('label').text('File yang ingin anda upload : ' + file).css("color", "orange");
    });

    $('#fileUpload2').change(function() {
        var i = $(this).prev('label').clone();
        var file = $('#fileUpload2')[0].files[0].name;
        $(this).prev('label').text('File yang ingin anda upload : ' + file).css("color", "orange");
    });

    $('#fileUpload3').change(function() {
        var i = $(this).prev('label').clone();
        var file = $('#fileUpload3')[0].files[0].name;
        $(this).prev('label').text('File yang ingin anda upload : ' + file).css("color", "orange");
    });
</script>
@endsection
