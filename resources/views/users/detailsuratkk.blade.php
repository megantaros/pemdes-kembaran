
@extends('layout.profil')

@section('title', 'Detail Surat Pengantar KK')

@section('content')

@php
    $alasanPermohonan = $data->alasan_permohonan;

    if( $alasanPermohonan == '1') {
        $alasanPermohonan = 'Membentuk Rumah Tangga Baru';
    } elseif ($alasanPermohonan == '2') {
        $alasanPermohonan = 'Kartu Keluarga Hilang/Rusak';
    } elseif ($alasanPermohonan == '3') {
        $alasanPermohonan = 'Lainnya';
    }

    $statusSurat = $data->status;
@endphp

<div class="lg:col-span-3">
    <div class="card bg-white min-h-screen shadow-lg">
        <div class="card-body">

            <div>
                <h2 class="lg:text-lg text-lg font-semibold">Detail Surat Pengantar KK</h2>
                <div class="flex">
                    <p class="lg:text-md md:text-sm text-sm" style="font-family: Poppins">Pastikan identitas Anda sesuai dengan yang tertera di e-KTP</p>
                </div>
            </div>

            <hr class="my-4">

            <form action="{{ route('pengantar-kk.update', ['pengantar_kk' => $data->id_surat_peng_kk]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="p-4 bg-slate-200 rounded-lg gap-1 grid lg:grid-cols-2">

                    <div>
                        <div class="text-label text-sm">Nama Lengkap *</div>
                        <input type="text" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" value="{{ $data->nama_warga }}" disabled/>
                    </div>

                    <div>
                        <div class="text-label text-sm">NIK *</div>
                        <input type="text" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" value="{{ $data->nik }}" disabled />
                    </div>

                    <div class="lg:col-span-2">
                        <div class="text-label text-sm">No. KK *</div>
                        <input type="text" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" value="{{ $data->kk }}" disabled />
                    </div>

                    <div class="lg:col-span-2">
                        <div class="text-label text-sm">Alamat *</div>
                        <textarea class="textarea textarea-primary w-full placeholder:text-sm" disabled style="background: #fff !important;">{{ $data->alamat }}</textarea>
                    </div>

                    {{-- <div>
                        <div class="text-label text-sm">KK Lama *</div>
                        <input type="text" placeholder="Masukkan No. KK" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" value="{{ Auth::user()->kk }}" disabled/>
    
                        @error('kk_lama')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror
                    </div> --}}

                    <div>
                        <div class="text-label text-sm">Status Hubungan Dalam Keluarga *</div>
                        <select class="select select-primary w-full my-1" name="shdk">
                            <option value="{{ $data->shdk }}" disabled selected>{{ $data->shdk }}</option>
                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                            <option value="Suami">Suami</option>
                            <option value="Istri">Istri</option>
                            <option value="Anak">Anak</option>
                            <option value="Menantu">Menantu</option>
                            <option value="Cucu">Cucu</option>
                            <option value="Orang Tua">Orangtua</option>
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

                    <div>
                        <div class="text-label text-sm">Alasan Permohonan *</div>
                        <select class="select select-primary w-full my-1" name="alasan_permohonan">
                            <option value="{{ $data->alasan_permohonan }}" disabled selected>{{ $alasanPermohonan }}</option>
                            <option value="1">Membentuk Rumah Tangga Baru</option>
                            <option value="2">Kartu Keluarga Hilang/Rusak</option>
                            <option value="3">Lainnya</option>
                        </select>

                        @error('alasan_permohonan')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror
                    </div>

                    {{-- <div>
                        <div class="text-label text-sm">Jumlah Anggota Keluarga *</div>
                        <input type="number" placeholder="Masukkan Jumlah Anggota Keluarga" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="jml_angg_keluarga" value="{{ $data->jml_angg_keluarga }}"/>
    
                        @error('jml_angg_keluarga')
                        <div class="alert alert-error shadow-lg text-white w-full m-auto my-1">
                            <div>
                            <i class="bi bi-x-circle"></i>
                            <span>Kolom tidak boleh kosong!</span>
                            </div>
                        </div>
                        @enderror
                    </div> --}}

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
    
                        <div class="flex-1">
    
                            <label for="fileUpload4" class="text-label text-sm custom-file-upload cursor-pointer flex gap-2 items-center hover:underline">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                <span>Upload Fotokopi Buku Nikah</span>
                            </label>
                            <input type="file" id="fileUpload4" class="hidden" accept="image/png, image/jpeg" name="fc_buku_nikah" />
    
                            <p class="text-sm font-semibold mt-2">{{ $data->fc_buku_nikah != null ? $data->fc_buku_nikah : 'Belum Upload File' }}</p>
    
                        </div>
    
                        <a href="{{ url('berkaspemohon/'. $data->fc_buku_nikah ) }}" target="__blank" class="text-sm hover:underline text-blue-600">
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

    $('#fileUpload4').change(function() {
        var i = $(this).prev('label').clone();
        var file = $('#fileUpload4')[0].files[0].name;
        $(this).prev('label').text('File yang ingin anda upload : ' + file).css("color", "orange");
    });

</script>
@endsection