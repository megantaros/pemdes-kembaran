
@extends('layout.profil')

@section('content')
    <section id="headerService">
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
                                <a href="/profil" class="flex text-[#070b34] border-l-[6px] border-[#FFEBAD] hover:text-[#070b34] text-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-person-fill mx-2" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                    </svg>
                                    <span>Profil Saya</span>
                                </a>
                            </div>
                            <div>
                                <a href="profil/suratsaya" class="flex text-[#070b34] border-l-[6px] border-[#fff] hover:border-[#FFEBAD] hover:text-[#070b34] text-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope mx-2" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                    </svg>
                                    <span>Surat Pengajuan Saya</span>
                                </a>
                            </div>
                            <div class="divider m-0"></div>
                            <div>
                                <a href="#" class="flex text-[#c6c6c6] border-l-[6px] border-[#FFF] hover:text-[#c6c6c6] text-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-envelope-paper text-[#c6c6c6] mx-2" viewBox="0 0 16 16">
                                        <path d="M4 0a2 2 0 0 0-2 2v1.133l-.941.502A2 2 0 0 0 0 5.4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.4a2 2 0 0 0-1.059-1.765L14 3.133V2a2 2 0 0 0-2-2H4Zm10 4.267.47.25A1 1 0 0 1 15 5.4v.817l-1 .6v-2.55Zm-1 3.15-3.75 2.25L8 8.917l-1.25.75L3 7.417V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v5.417Zm-11-.6-1-.6V5.4a1 1 0 0 1 .53-.882L2 4.267v2.55Zm13 .566v5.734l-4.778-2.867L15 7.383Zm-.035 6.88A1 1 0 0 1 14 15H2a1 1 0 0 1-.965-.738L8 10.083l6.965 4.18ZM1 13.116V7.383l4.778 2.867L1 13.117Z"/>
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
                    <div class="basis-1/1 bg-white h-100vh w-full rounded-lg p-6 shadow-lg">
                        <div class="text-3xl">Profil Saya</div>
                        <div class="text-xl text-[#070b34] text-info-user">Pastikan identitas Anda sesuai dengan yang tertera di e-KTP</div>
                        <div class="divider"></div> 
                        <form action="/profil/updateprofil/{{ Auth::user()->id }}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="text-label">Nama Lengkap</div>
                                <input type="text" class="input bg-[#F0F4F4] w-full rounded-1/2 my-1 text-lg" name="name" value="{{ Auth::user()->name }}"/>
                                @error('name')
                                <div class="alert alert-error shadow-lg text-white w-full m-auto my-2 mb-4">
                                    <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <span>Kolom Tidak Boleh Kosong!</span>
                                    </div>
                                </div>
                                @enderror
                                <div class="text-label my-1">Email</div>
                                <input type="email" class="input bg-[#F0F4F4] w-full rounded-1/2 my-1 text-lg" name="email" value="{{ Auth::user()->email }}"/>
                                @error('email')
                                <div class="alert alert-error shadow-lg text-white w-full m-auto my-2 mb-4">
                                    <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <span>Kolom Tidak Boleh Kosong!</span>
                                    </div>
                                </div>
                                @enderror
                                <div class="text-label my-1">No Telephone</div>
                                <input type="number" class="input bg-[#F0F4F4] w-full my-1 rounded-1/2 text-lg" name="notelpon" value="{{ Auth::user()->notelpon }}"/>
                                @error('notelpon')
                                <div class="alert alert-error shadow-lg text-white w-full m-auto my-2 mb-4">
                                    <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <span>Kolom Tidak Boleh Kosong!</span>
                                    </div>
                                </div>
                                @enderror
                                <div class="text-label my-1">NIK</div>
                                <input type="number" class="input bg-[#F0F4F4] w-full my-1 rounded-1/2 text-lg" name="nik" value="{{ Auth::user()->nik }}"/>
                                @error('nik')
                                <div class="alert alert-error shadow-lg text-white w-full m-auto my-2 mb-4">
                                    <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <span>Kolom Tidak Boleh Kosong!</span>
                                    </div>
                                </div>
                                @enderror
                                <div class="text-label my-1">Tempat Tanggal Lahir</div>
                                <input type="text" class="input bg-[#F0F4F4] w-full my-1 rounded-1/2 text-lg" name="ttl" value="{{ Auth::user()->ttl }}"/>
                                @error('ttl')
                                <div class="alert alert-error shadow-lg text-white w-full m-auto my-2 mb-4">
                                    <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <span>Kolom Tidak Boleh Kosong!</span>
                                    </div>
                                </div>
                                @enderror
                                <div class="text-label mt-2">Jenis Kelamin</div>
                                <select class="select w-full my-1 bg-[#F0F4F4] text-lg" name="jenis_kelamin">
                                    <option selected value="{{ Auth::user()->jenis_kelamin }}">{{ Auth::user()->jenis_kelamin }}</option>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                                <div class="text-label my-1">Pekerjaan</div>
                                <input type="text" class="input bg-[#F0F4F4] w-full my-1 rounded-1/2 text-lg" name="pekerjaan" value="{{ Auth::user()->pekerjaan }}"/>
                                @error('pekerjaan')
                                <div class="alert alert-error shadow-lg text-white w-full m-auto my-2 mb-4">
                                    <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <span>Kolom Tidak Boleh Kosong!</span>
                                    </div>
                                </div>
                                @enderror
                                <div class="text-label my-1">Agama</div>
                                <input type="text" class="input bg-[#F0F4F4] w-full my-1 rounded-1/2 text-lg" name="agama" value="{{ Auth::user()->agama }}"/>
                                @error('agama')
                                <div class="alert alert-error shadow-lg text-white w-full m-auto my-2 mb-4">
                                    <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <span>Kolom Tidak Boleh Kosong!</span>
                                    </div>
                                </div>
                                @enderror
                                <div class="text-label my-1">Alamat</div>
                                <textarea class="textarea text-lg w-full my-1 bg-[#F0F4F4]" name="alamat">{{ Auth::user()->alamat }}</textarea>
                                @error('alamat')
                                <div class="alert alert-error shadow-lg text-white w-full m-auto my-2 mb-4">
                                    <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <span>Kolom Tidak Boleh Kosong!</span>
                                    </div>
                                </div>
                                @enderror
                            <input type="submit" class="btn capitalize font-normal border-none bg-orange-500 text-white rounded-md w-full text-lg hover:border-none hover:bg-orange-600 lg:mt-7" value="Edit Profil"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

