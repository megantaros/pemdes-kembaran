
@extends('layout.profil')

@section('content')
    <section id="headerService">
        <div class="lg:h-[400px] h-[200px] relative" style="background: #022E57; color: #06283D;">
            <div class="container absolute py-14 left-1/2 transform -translate-x-1/2">
                <div class="flex lg:flex-row flex-col gap-4">
                    <div class="basis-1/3 bg-white w-full rounded-lg p-6 shadow-lg lg:relative">
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
                                <a href="{{ route('info.warga') }}" class="flex text-[#070b34] border-l-[6px] border-[#FFF] hover:text-[#070b34] hover:border-[#FFEBAD] text-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-person mx-2" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                    </svg>
                                    <span>Profil Saya</span>
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('surat.warga') }}" class="flex text-[#070b34] border-l-[6px] border-[#FFEBAD] hover:border-[#FFEBAD] hover:text-[#070b34] text-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-fill mx-2" viewBox="0 0 16 16">
                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
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
                    <div class="basis-1/1 bg-white h-100vh w-full rounded-lg p-6 shadow-lg min-h-screen">
                        <div class="lg:text-3xl text-2xl">Surat Pengajuan Saya</div>
                        <div class="lg:text-xl text-lg text-[#070b34] text-info-user">Pastikan identitas anda sesuai dengan yang tertera di e-KTP</div>
                        <div class="divider"></div>
                        <div class="overflow-x-auto">
                            <table class="table w-full tabel-surat shadow-md">
                                <!-- head -->
                                <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Surat</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Status Surat</th>
                                    <th>Aksi</th>
                                    {{-- <th>Status</th> --}}
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no=1 ?>
                                @foreach($data as $row)
                                <tr>
                                    <th class="text-center">{{ $no++ }}</th>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->jenis_surat }}</td>
                                    <td class="text-center">{{ $row->created_at }}</td>
                                    <td>
                                        @if($row->status == "Terkirim")
                                        <div class="p-2 bg-orange-500 rounded-lg text-white text-center font-normal">{{ $row->status }}</div>
                                        @elseif ($row->status == "Ditolak") 
                                        <div class="p-2 bg-red-800 rounded-lg text-white text-center font-normal">{{ $row->status }}</div>
                                        @else
                                        <div class="p-2 bg-green-800 rounded-lg text-white text-center font-normal">{{ $row->status }}</div>
                                        @endif
                                    </td>
                                    @if($row->status == "Terkirim")
                                    <td class="flex gap-2">
                                        @if($row->jenis_surat == 'Surat Keterangan Domisili')
                                        <a href="{{ route('keterangan-domisili.show', ['keterangan_domisili' => $row->id_surat]) }}" class="btn btn-warning border-none w-50">
                                            <i class="bi bi-envelope-paper text-2xl"></i>
                                        </a>
                                        @elseif($row->jenis_surat == 'Surat Pengantar SKCK')
                                        <a href="{{ route('pengantar-skck.show', ['pengantar_skck' => $row->id_surat]) }}" class="btn btn-warning border-none w-50">
                                            <i class="bi bi-envelope-paper text-2xl"></i>
                                        </a>
                                        @elseif($row->jenis_surat == 'Surat Pengantar KTP')
                                        <a href="{{ route('pengantar-ktp.show', ['pengantar_ktp' => $row->id_surat]) }}" class="btn btn-warning border-none w-50">
                                            <i class="bi bi-envelope-paper text-2xl"></i>
                                        </a>
                                        @elseif($row->jenis_surat == 'Surat Pengantar KK')
                                        <a href="{{ route('pengantar-kk.show', ['pengantar_kk' => $row->id_surat]) }}" class="btn btn-warning border-none w-50">
                                            <i class="bi bi-envelope-paper text-2xl"></i>
                                        </a>
                                        @elseif($row->jenis_surat == 'Surat Keterangan Pindah')
                                        <a href="{{ route('keterangan-pindah.show', ['keterangan_pindah' => $row->id_surat]) }}" class="btn btn-warning border-none w-50">
                                            <i class="bi bi-envelope-paper text-2xl"></i>
                                        </a>
                                        @elseif($row->jenis_surat == 'Surat Keterangan Pindah Datang')
                                        <a href="{{ route('keterangan-datang.show', ['keterangan_datang' => $row->id_surat]) }}" class="btn btn-warning border-none w-50">
                                            <i class="bi bi-envelope-paper text-2xl"></i>
                                        </a>
                                        @elseif($row->jenis_surat == 'Surat Keterangan Usaha')
                                        <a href="{{ route('keterangan-usaha.show', ['keterangan_usaha' => $row->id_surat]) }}" class="btn btn-warning border-none w-50">
                                            <i class="bi bi-envelope-paper text-2xl"></i>
                                        </a>
                                        @endif
                                        <form action="{{ route('pengajuan-surat.destroy', ['pengajuan_surat' => $row->id]) }}" class="btn form-hapus text-white bg-red-800 hover:bg-red-900 border-none w-50" method="POST" data-id="{{ $row->id }}" data-jenis="{{ $row->jenis_surat }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <i class="bi bi-trash text-2xl"></i>
                                            </button>
                                        </form>
                                    </td>
                                    @elseif($row->status == "Diterima")
                                    <td>
                                        @if($row->jenis_surat == 'Surat Keterangan Domisili')
                                        <a href="{{ route('keterangan-domisili.show', ['keterangan_domisili' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                            <i class="bi bi-envelope-check-fill text-2xl"></i>
                                        </a>
                                        @elseif($row->jenis_surat == 'Surat Pengantar SKCK')
                                        <a href="{{ route('pengantar-skck.show', ['pengantar_skck' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                            <i class="bi bi-envelope-check-fill text-2xl"></i>
                                        </a>
                                        @elseif($row->jenis_surat == 'Surat Pengantar KTP')
                                        <a href="{{ route('pengantar-ktp.show', ['pengantar_ktp' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                            <i class="bi bi-envelope-check-fill text-2xl"></i>
                                        </a>
                                        @elseif($row->jenis_surat == 'Surat Pengantar KK')
                                        <a href="{{ route('pengantar-kk.show', ['pengantar_kk' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                            <i class="bi bi-envelope-check-fill text-2xl"></i>
                                        </a>
                                        @elseif($row->jenis_surat == 'Surat Keterangan Pindah')
                                        <a href="{{ route('keterangan-pindah.show', ['keterangan_pindah' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                            <i class="bi bi-envelope-check-fill text-2xl"></i>
                                        </a>
                                        @elseif($row->jenis_surat == 'Surat Keterangan Pindah Datang')
                                        <a href="{{ route('keterangan-datang.show', ['keterangan_datang' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                            <i class="bi bi-envelope-check-fill text-2xl"></i>
                                        </a>
                                        @elseif($row->jenis_surat == 'Surat Keterangan Usaha')
                                        <a href="{{ route('keterangan-usaha.show', ['keterangan_usaha' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                            <i class="bi bi-envelope-check-fill text-2xl"></i>
                                        </a>
                                        @endif
                                    </td>
                                    @else
                                    <td>
                                        @if($row->jenis_surat == 'Surat Keterangan Domisili')
                                        <a href="{{ route('keterangan-domisili.show', ['keterangan_domisili' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                            <i class="bi bi-envelope-exclamation-fill text-2xl"></i>
                                        </a>
                                        @elseif($row->jenis_surat == 'Surat Pengantar SKCK')
                                        <a href="{{ route('pengantar-skck.show', ['pengantar_skck' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                            <i class="bi bi-envelope-exclamation-fill text-2xl"></i>
                                        </a>
                                        @elseif($row->jenis_surat == 'Surat Pengantar KTP')
                                        <a href="{{ route('pengantar-ktp.show', ['pengantar_ktp' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                            <i class="bi bi-envelope-exclamation-fill text-2xl"></i>
                                        </a>
                                        @elseif($row->jenis_surat == 'Surat Pengantar KK')
                                        <a href="{{ route('pengantar-kk.show', ['pengantar_kk' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                            <i class="bi bi-envelope-exclamation-fill text-2xl"></i>
                                        </a>
                                        @elseif($row->jenis_surat == 'Surat Keterangan Pindah')
                                        <a href="{{ route('keterangan-pindah.show', ['keterangan_pindah' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                            <i class="bi bi-envelope-exclamation-fill text-2xl"></i>
                                        </a>
                                        @elseif($row->jenis_surat == 'Surat Keterangan Pindah Datang')
                                        <a href="{{ route('keterangan-datang.show', ['keterangan_datang' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                            <i class="bi bi-envelope-exclamation-fill text-2xl"></i>
                                        </a>
                                        @elseif($row->jenis_surat == 'Surat Keterangan Usaha')
                                        <a href="{{ route('keterangan-usaha.show', ['keterangan_usaha' => $row->id_surat]) }}" class="btn btn-info border-none w-full">
                                            <i class="bi bi-envelope-exclamation-fill text-2xl"></i>
                                        </a>
                                        @endif
                                    </td>
                                    @endif
                                </tr>
                                @endforeach       
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection