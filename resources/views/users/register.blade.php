<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar | Portal Pelayanan Pemdes Kembaran</title>
  <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}" type="image/x-icon" style="width: auto;">
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins&family=Viga&display=swap" rel="stylesheet">
  
  @vite('resources/js/app.js')
</head>
<body class="lg:h-screen h-[160vh] relative bg-[#F0F4F4]">
  <section id="login">
    <div class="flex justify-center">
      <div class="flex lg:flex-row flex-col shadow-lg form-login lg:w-4/5 w-4/5 lg:h-auto rounded-lg overflow-hidden">
        <div class="lg:w-full w-full bg-primary relative text-center py-6">
          <div class="lg:absolute lg:top-1/2 lg:left-1/2 lg:transform lg:-translate-x-1/2 lg:-translate-y-1/2 w-full">
            <img id="logoAuth" src="{{asset('assets/logo-login.png')}}" alt="Logo Kebumen" class="m-auto lg:w-[153px] lg:h-[210px] w-auto h-[150px]">
            <div class="lg:text-2xl text-[#FFEBAD] lg:mt-6 mt-2 text-lg">Selamat Datang</div>
            <div class="text-lg text-white" style="font-family: Poppins">Portal Pelayanan Pemdes Kembaran</div>
          </div>
        </div>
        <div class="lg:p-10 p-4 flex flex-col justify-start w-full bg-white">
          <form action="{{ route('store.warga') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
              <h2 class="font-bold lg:text-4xl text-xl lg:mb-4 mb-3">Sign up</h2>

              <div class="mb-3">

                <input type="text" placeholder="Masukkan Nama Anda" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="name"/>

                @error('name')
                <div class="alert alert-error shadow-lg text-white w-full m-auto my-2">
                  <div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                  <span>Tolong Isi Kolom Nama</span>
                  </div>
                </div>
                @enderror

                <input type="email" placeholder="Masukkan Email Anda" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="email"/>

                @error('email')
                <div class="alert alert-error shadow-lg text-white w-full m-auto my-2">
                  <div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                  <span>Tolong Isi Kolom Email</span>
                  </div>
                </div>
                @enderror

                <input type="password" placeholder="Masukkan Password Anda" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="password"/>

                @error('password')
                <div class="alert alert-error shadow-lg text-white w-full m-auto my-2">
                  <div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                  {{-- <span>{{ $message }}</span> --}}
                  <span>Password Min 8 Huruf/Angka!</span>
                  </div>
                </div>
                @enderror

                <input type="password" placeholder="Konfirmasi Password" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="confirmed_pass"/>

                @error('confirmed_pass')
                <div class="alert alert-error shadow-lg text-white w-full m-auto my-2">
                  <div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                  {{-- <span>{{ $message }}</span> --}}
                  <span>Password Harus Sama !</span>
                  </div>
                </div>
                @enderror

              </div> 

              <div class="w-full mb-6"><a href="#" class="lg:text-md text-sm">Lupa password ?<a></div>
              
              <button type="submit" class="btn-login rounded-md w-full">Daftar</button>

              <div class="text-sm mt-5 text-center">Sudah punya akun ? 
              <span><a href="{{ route('login.warga') }}" class="font-semibold">Login disini!<a></span></div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
  <script>
    @if (Session::has('success'))
      swal("{{ Session::get('success') }}", "Terima Kasih", "success");
    @endif
  </script>
  <script>
    @if (Session::has('error'))
      swal("Mohon Maaf", "{{ Session::get('error') }}", "error");
    @endif
  </script>
</html>