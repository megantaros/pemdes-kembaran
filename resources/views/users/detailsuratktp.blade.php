
@extends('layout.profil')

@section('title', 'Detail Surat Pengantar KTP')

@section('content')
<div class="lg:col-span-3">
    <div class="card bg-white min-h-screen shadow-lg">
        <div class="card-body">

            <div>
                <h2 class="lg:text-lg md:text-sm text-sm font-semibold">Detail Surat Pengantar KTP</h2>
                <div class="flex">
                    <p class="lg:text-md md:text-sm text-sm" style="font-family: Poppins">Pastikan identitas Anda sesuai dengan yang tertera di e-KTP</p>
                </div>
            </div>

            <hr class="my-4">

            @php
            $statusSurat = $data->status;
            @endphp

            <form action="{{ route('pengantar-ktp.update', ['pengantar_ktp' => $data->id_surat_peng_ktp]) }}" method="POST" enctype="multipart/form-data">
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

                    <div class="lg:col-span-2">
                        <div class="text-label text-sm">Alamat *</div>
                        <textarea class="textarea textarea-primary w-full placeholder:text-sm" disabled style="background: #fff !important;">{{ $data->alamat }}</textarea>
                    </div>

                    {{-- <div>
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
                    </div> --}}

                    <div class="col-span-2">
                        <div class="text-label text-sm">Jenis Permohonan *</div>
                        <select class="select select-primary w-full my-1" name="jenis_permohonan">
                            <option selected disabled value="{{ $data->jenis_permohonan }}">{{ $data->jenis_permohonan }}</option>
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
</script>
@endsection

{{-- <section id="headerService">
    <div class="lg:h-[400px] h-[200px] relative" style="background: #022E57; color: #06283D;">
        <div class="container absolute py-14 left-1/2 transform -translate-x-1/2">
            <div class="flex lg:flex-row flex-col gap-4">
                <div class="basis-1/3 bg-white lg:h-100vh w-full rounded-lg p-6 shadow-lg lg:relative">
                    <div class="flex flex-row gap-4">
                        <div class="w-[60px]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                        </div>
                        <div class="flex flex-col pt-1">
                            <div class="">
                                <a href="#" class="flex text-xl">
                                    <span class="text-[#06283D]">Hi, {{ Auth::user()->name }}</span>
                                </a>
                            </div>
                            <div class="">
                                <a href="/profil" class="flex text-[#C6C6C6] hover:text-[#C6C6C6] hover:underline text-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-fill mr-2" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>
                                    <span class="text-info-user">Ubah profil</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <a href="/profil" class="flex text-[#070b34] border-l-[6px] border-[#FFF] hover:text-[#070b34] hover:border-[#FFEBAD] text-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-person mx-2" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                </svg>
                                <span>Profil Saya</span>
                            </a>
                        </div>
                        <div>
                            <a href="/profil/suratsaya" class="flex text-[#070b34] border-l-[6px] border-[#fff] hover:border-[#FFEBAD] hover:text-[#070b34] text-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope mx-2" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                </svg>
                                <span>Surat Pengajuan Saya</span>
                            </a>
                        </div>
                        <div class="divider m-0"></div>
                        <div>
                            <a href="#" class="flex text-[#070b34] border-l-[6px] border-[#FFEBAD] hover:border-[#FFEBAD] hover:text-[#070b34] text-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-paper-fill mx-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6.5 9.5 3 7.5v-6A1.5 1.5 0 0 1 4.5 0h7A1.5 1.5 0 0 1 13 1.5v6l-3.5 2L8 8.75l-1.5.75ZM1.059 3.635 2 3.133v3.753L0 5.713V5.4a2 2 0 0 1 1.059-1.765ZM16 5.713l-2 1.173V3.133l.941.502A2 2 0 0 1 16 5.4v.313Zm0 1.16-5.693 3.337L16 13.372v-6.5Zm-8 3.199 7.941 4.412A2 2 0 0 1 14 16H2a2 2 0 0 1-1.941-1.516L8 10.072Zm-8 3.3 5.693-3.162L0 6.873v6.5Z"/>
                                </svg>
                                <span>Detail Surat</span>
                            </a>
                        </div>
                    </div>
                    <form action="/logout" method="POST" class="lg:absolute w-100 lg:bottom-6 lg:left-0 lg:right-0 lg:px-6 mt-10">
                        @csrf
                        <div class="bg-red-800 btn capitalize text-lg font-normal text-white flex hover:bg-red-900 hover:border-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-door-open-fill mr-2" viewBox="0 0 16 16">
                                <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                            </svg>
                            <input type="submit" value="Logout">
                        </div>
                    </form>
                </div>
                <div class="basis-1/1 bg-white h-auto w-full rounded-lg p-6 shadow-lg">
                    <div class="lg:text-3xl text-2xl">Detail Surat Pengantar KTP</div>
                    <div class="lg:text-xl text-lg text-[#070b34] text-info-user">Pastikan identitas anda sesuai dengan yang tertera di e-KTP</div>
                    <div class="divider"></div>
                    <div class="overflow-x-auto">
                        <table class="table w-full tabel-surat border-none">
                            <thead>
                            <tr>
                                <th scope="col">Form</th>
                                <th scope="col">Identitas Pemohon</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Nama</th>
                                <td><input type="text" placeholder="Tulis disini..." class="input input-bordered input-info w-full read-only:bg-[#9cb4cc]" value="{{ Auth::user()->name }}" readonly/></td>
                            </tr>
                            <tr>
                                <th scope="row">NIK</th>
                                <td><input type="text" placeholder="Tulis disini..." class="input input-bordered input-info w-full read-only:bg-[#9cb4cc]" value="{{ Auth::user()->nik }}" readonly/></td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td><textarea class="textarea textarea-info w-full" placeholder="Tulis disini..." readonly>{{ Auth::user()->alamat }}</textarea></td>
                            </tr>
                            <form action="/editsuratktp/{{ $data->id_surat_peng_ktp }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                            <tr>
                                <th scope="row">Jenis Surat Permohonan KTP</th>
                                <td>
                                    <select class="select select-primary w-full mb-3" name="jenis_permohonan">
                                        <option selected value="{{ $data->jenis_permohonan }}">{{ $data->jenis_permohonan }}</option>
                                        <option value="Baru">Baru</option>
                                        <option value="Perpanjangan">Perpanjangan</option>
                                        <option value="Penggantian">Penggantian</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">No. KK</th>
                                <td><input type="text" placeholder="Tulis disini..." class="input input-bordered input-info w-full read-only:bg-[#9cb4cc]" value="{{ $data->kk }}" /></td>
                            </tr>
                            <tr>
                                <th scope="row">KTP Asli</th>
                                <td>
                                    <div class="w-50"><img src="{{ asset('berkaspemohon/'.$data->foto_ktp) }}" class="border rounded" /></div>
                                    <div class="w-full h-full"><input type="file" class="file-input file-input-bordered file-input-primary w-full mt-2" accept="image/png, image/jpeg" value="{{ $data->fc_ktp }}" name="foto_ktp"/></div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Pengantar RT</th>
                                <td>
                                    <img src="{{ asset('berkaspemohon/'.$data->pengantar_rt) }}" class="w-50 border rounded" />
                                    <div class="w-full h-full"><input type="file" class="file-input file-input-bordered file-input-primary w-full mt-2" accept="image/png, image/jpeg" name="pengantar_rt"/></div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Aksi</th>
                                <td class="flex justify-center">
                                    <button type="submit" class="btn btn-warning lg:w-50 my-5 text-lg capitalize font-semibold"><i class="bi bi-pencil-fill me-2"></i>Edit</button>
                                </td>
                            </tr>
                            </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
