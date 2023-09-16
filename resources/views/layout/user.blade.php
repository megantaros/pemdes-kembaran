<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Portal Pelayanan Pemdes Kembaran</title>
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}" type="image/x-icon" style="width: auto;">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&family=Poppins:wght@400;600&family=Viga&display=swap" rel="stylesheet">
    
    @vite('resources/js/app.js')
</head>
<body>
    <nav class="navbar text-white shadow-lg py-2">
        <div class="container flex justify-between">

            <a class="flex cursor-pointer gap-2 items-center p-2 rounded-md btn-ghost">
                <img src="{{ asset('assets/logo-big-kebumen.png') }}" class="w-auto h-14">
                <div>
                    <h2 class="lg:text-lg md:text-md text-sm" style="color:#FFEBAD;">Portal Pelayanan</h2>
                    <p class="lg:text-sm md:text-md text-sm">Pemdes Kembaran</p>
                </div>
            </a>
            
            <div class="lg:flex-none lg:block hidden">
                <ul class="menu menu-horizontal px-1 lg:text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="navLi {{ Route::is('home') ? 'active' : '' }}">Beranda</a>
                    </li>
                    <li>
                        <a href="{{ route('layanan') }}" class="navLi {{ Route::is('layanan') ? 'active' : '' }} @yield('active')">Layanan</a>
                    </li>
                    <li>
                        <a href="{{ route('kontak') }}" class="navLi {{ Route::is('kontak') ? 'active' : '' }}">Kontak</a>
                    </li>

                    @guest
                    <li tabindex="0" class="z-10">
                        <a class="text-sm text-primary" style="background: #FFEBAD">
                            Masuk
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                        </a>
                        <ul class="p-2 text-[#06283D] mt-1 bg-white border shadow-md">
                            <li><a href="{{ route('login.warga') }}">Login</a></li>
                            <li><a href="{{ route('register.warga') }}">Daftar</a></li>
                        </ul>
                    </li>
                    @endguest

                    @auth
                    <li tabindex="0" class="z-10">
                        <a class="text-sm text-primary" style="background: #FFEBAD">
                            Hi, {{ Auth::user()->nama_warga }}
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                        </a>
                        <ul class="p-2 text-[#06283D] navUl mt-1 bg-white">
                            <li><a href="{{ route('info.warga') }}">Info Profil</a></li>
                            <li>
                                <form action="{{ route('logout.warga') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endauth
                </ul>
            </div>

            <div class="flex-none lg:hidden block">
                <ul class="menu menu-horizontal">
                    @guest
                        <li tabindex="0" class="z-10">
                            <a class="btn-ghost rounded-md">
                                <i class="fa fa-bars text-2xl text-white"></i>
                            </a>
                            <ul class="p-2 text-[#06283D] mt-2 bg-white text-sm right-0 shadow-md rounded-md">
                                <li>
                                    <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'bg-slate-200' : 'btn-ghost' }}">Beranda</a>
                                </li>
                                <li>
                                    <a href="{{ route('layanan') }}" class="{{ Route::is('layanan') ? 'bg-slate-200' : 'btn-ghost' }} @yield('active')">Layanan</a>
                                </li>
                                <li>
                                    <a href="{{ route('kontak') }}" class="{{ Route::is('kontak') ? 'bg-slate-200' : 'btn-ghost' }}">Kontak</a>
                                </li>
                                <li>
                                    <a href="{{ route('login.warga') }}" class="{{ Route::is('kontak') ? 'bg-slate-200' : 'btn-ghost' }}">Masuk</a>
                                </li>
                                <li>
                                    <a href="{{ route('register.warga') }}" class="{{ Route::is('kontak') ? 'bg-slate-200' : 'btn-ghost' }}">Daftar</a>
                                </li>
                            </ul>
                        </li>
                    @endguest

                    @auth
                    <li tabindex="0" class="z-10">
                        <a>
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </a>
                        <ul class="p-2 text-[#06283D] navUl mt-2 bg-white text-sm right-0 shadow-lg">
                            <li><a href="{{ route('info.warga') }}" class="bg-[#FFEBAD]">Hi, {{ Auth::user()->nama_warga }}</a></li>
                            <li><a href="/" class="navLi {{ Route::is('beranda') ? 'active' : '' }}">Beranda</a></li>
                            <li><a href="/layanan" class="navLi {{ Route::is('layanan') ? 'active' : '' }}">Layanan</a></li>
                            <li><a href="/kontak" class="navLi {{ Route::is('kontak') ? 'active' : '' }}">Kontak</a></li>
                            <li>
                                <form action="{{ route('logout.warga') }}" class="navLi" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    
    @yield('content')

    <footer class="bg-primary">
        <div class="container">
            <div class="grid lg:grid-cols-4 gap-4 md:grid-cols-2 grid-cols-2 py-6">

                <div class="col-span-2 flex gap-2 rounded-md">
                    <img src="{{ asset('assets/logo-big-kebumen.png') }}" alt="Logo Kebumen" class="w-auto h-36">
                    <div class="py-2">
                        <h2 class="lg:text-xl" style="color: #FFEBAD;">Pemerintah Desa Kembaran</h2>
                        <h6 class="lg:text-md text-white">Kabupaten Kebumen</h6>
                        <div class="flex gap-4 items-center mt-10 text-white">
                            <a href="#" class="linkSosmed">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-facebook lg:h-6 md:h-4 h-4" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                </svg>
                            </a>
                            <a href="#" class="linkSosmed">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-instagram lg:h-6 md:h-4 h-4" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                </svg>
                            </a>
                            <a href="" class="linkSosmed">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-linkedin lg:h-6 md:h-4 h-4" viewBox="0 0 16 16">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                </svg>
                            </a>
                            <a href="" class="linkSosmed">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-youtube lg:h-6 md:h-4 h-4" viewBox="0 0 16 16">
                                    <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                                </svg>
                            </a>
                            <a href="" class="linkSosmed">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-envelope lg:h-6 md:h-4 h-4" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-4 w-full">
                    <div class="lg:text-lg text-md mt-1" style="color: #FFEBAD">Quick Links</div>
                    <ul class="ulFooter flex flex-col gap-2">
                        <li><a href="{{ route('home') }}" class="listFooter lg:text-md text-sm">Beranda</a></li>
                        <li><a href="{{ route('layanan') }}" class="listFooter lg:text-md text-sm">Layanan</a></li>
                        <li><a href="{{ route('kontak') }}" class="listFooter lg:text-md text-sm">Kontak</a></li>
                        
                        @guest
                        <li><a href="{{ route('login.warga') }}" class="listFooter lg:text-md text-sm">Masuk</a></li>
                        @endguest

                        @auth
                        <li><a href="{{ route('surat.warga') }}" class="listFooter lg:text-md text-sm">Permohonan Surat</a></li>
                        @endauth
                    </ul>
                </div>

                <div class="flex flex-col gap-4 w-full">
                    <div class="lg:text-lg text-md mt-1" style="color: #FFEBAD">Jam Kerja</div>
                    <ul class="ulFooter flex flex-col gap-2">
                        <li>
                            <a href="#" class="listFooter lg:text-md text-sm font-semibold flex lg:gap-4 md:gap-2 gap-1">
                            Senin - Kamis
                            <span class="font-normal">07.00 - 15.30</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="listFooter lg:text-md text-sm font-semibold flex lg:gap-4 md:gap-2 gap-1">
                            Jumat
                            <span class="font-normal">07.00 - 11.45</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="listFooter lg:text-md text-sm font-semibold flex lg:gap-4 md:gap-2 gap-1">
                            Sabtu
                            <span class="font-normal">07.00 - 11.45</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright lg:border-t-1 border-[#34518D] border-t-2 text-center py-3 text-white text-xs">
            © 2023 Copyright: Gita Megantara
        </div>
    </footer>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script> --}}
  </body>
    <script>
        @if (Session::has('success'))
            swal("{{ Session::get('success') }}", "Terima Kasih", "success");
        @endif
    </script>
</html>