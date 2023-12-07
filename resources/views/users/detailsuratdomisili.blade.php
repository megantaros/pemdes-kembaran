
@extends('layout.profil')

@section('title', 'Detail Surat Keterangan Domisili')

@section('content')
<div class="lg:col-span-3">
    <div class="card bg-white min-h-screen shadow-lg">
        <div class="card-body">

            <div>
                <h2 class="lg:text-lg text-lg font-semibold">Detail Surat Keterangan Domisili</h2>
                <div class="flex">
                    <p class="lg:text-md md:text-sm text-sm" style="font-family: Poppins">Pastikan identitas Anda sesuai dengan yang tertera di e-KTP</p>
                </div>
            </div>

            <hr class="my-4">

            @php
            $statusSurat = $data->status;
            @endphp

            <form action="{{ route('keterangan-domisili.update', ['keterangan_domisili' => $data->id_surat_ket_domisili]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="p-4 bg-slate-200 rounded-lg gap-1 grid lg:grid-cols-2">

                    <div>
                        <div class="text-label text-sm">Nama Lengkap *</div>
                        <input type="text" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" value="{{ $data->nama_warga }}" disabled/>
                    </div>

                    <div>
                        <div class="text-label text-sm">NIK *</div>
                        <input type="text" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" value="{{ $data->nik }}" disabled/>
                    </div>

                    <div>
                        <div class="text-label text-sm">No. KK *</div>
                        <input type="text" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" value="{{ $data->kk }}" disabled/>
                    </div>

                    <div>
                        <div class="text-label text-sm">Tempat, Tanggal Lahir *</div>
                        <input type="text" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" value="{{ $data->ttl }}" disabled/>
                    </div>

                    <div>
                        <div class="text-label text-sm">Jenis Kelamin *</div>
                        <input type="text" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" value="{{ $data->jenis_kelamin }}" disabled/>
                    </div>

                    <div>
                        <div class="text-label text-sm">Pekerjaan *</div>
                        <input type="text" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" value="{{ $data->pekerjaan }}" disabled/>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="text-label text-sm">Agama *</div>
                        <input type="text" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" value="{{ $data->agama }}" disabled/>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="text-label text-sm">Alamat *</div>
                        <textarea class="textarea textarea-primary w-full placeholder:text-sm" disabled style="background: #fff !important">{{ $data->alamat }}</textarea>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="text-label text-sm">Alamat Domisili *</div>
                        <textarea class="textarea textarea-primary w-full placeholder:text-sm" placeholder="Masukkan Alamat Domisili" name="alamat_domisili">{{ $data->alamat_domisili }}</textarea>
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
                                <span>Upload Fotokopi KTP</span>
                            </label>
                            <input type="file" id="fileUpload2" class="hidden" accept="image/png, image/jpeg" name="fc_ktp" />
    
                            <p class="text-sm font-semibold mt-2">{{ $data->fc_ktp != null ? $data->fc_ktp : 'Belum Upload File' }}</p>
    
                        </div>
    
                        <a href="{{ url('berkaspemohon/'. $data->fc_ktp ) }}" target="__blank" class="text-sm hover:underline text-blue-600">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <span>Lihat Gambar</span>
                        </a>
    
                    </div>

                    <div class="p-4 bg-white rounded-lg relative lg:col-span-2 flex items-center border-[#9CB4CC] border-2 my-1">
    
                        <div class="flex-1">
    
                            <label for="fileUpload3" class="text-label text-sm custom-file-upload cursor-pointer flex gap-2 items-center hover:underline">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                <span>Upload Fotokopi KK</span>
                            </label>
                            <input type="file" id="fileUpload3" class="hidden" accept="image/png, image/jpeg" name="fc_kk" />
    
                            <p class="text-sm font-semibold mt-2">{{ $data->fc_kk != null ? $data->fc_kk : 'Belum Upload File' }}</p>
    
                        </div>
    
                        <a href="{{ url('berkaspemohon/'. $data->fc_kk ) }}" target="__blank" class="text-sm hover:underline text-blue-600">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <span>Lihat Gambar</span>
                        </a>
    
                    </div>

                    <div class="p-4 bg-white rounded-lg relative lg:col-span-2 flex items-center border-[#9CB4CC] border-2 my-1">
    
                        <div class="flex-1">
    
                            <label for="fileUpload4" class="text-label text-sm custom-file-upload cursor-pointer flex gap-2 items-center hover:underline">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                <span>Upload Foto Lokasi / Rumah</span>
                            </label>
                            <input type="file" id="fileUpload4" class="hidden" accept="image/png, image/jpeg" name="foto_lokasi" />
    
                            <p class="text-sm font-semibold mt-2">{{ $data->foto_lokasi != null ? $data->foto_lokasi : 'Belum Upload File' }}</p>
    
                        </div>
    
                        <a href="{{ url('berkaspemohon/'. $data->foto_lokasi) }}" target="__blank" class="text-sm hover:underline text-blue-600">
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
                        <textarea class="textarea textarea-primary w-full placeholder:text-sm my-1" placeholder="Tambah Keterangan (Optional)" name="keterangan_warga" {{ $statusSurat == '1' ? '' : 'disabled ' }}>{{ $data->keterangan_warga == '' ? 'Tidak ada keterangan warga' : $data->keterangan_warga }}</textarea>

                    </div>

                    <div class="lg:col-span-2">
                        <button type="submit" class="{{ $statusSurat == '1' ? 'btn btn-warning w-full text-white font-normal capitalize' : 'hidden' }}">Update</button>
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