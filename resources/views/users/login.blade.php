<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Portal Pelayanan Pemdes Kembaran</title>
  <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}" type="image/x-icon" style="width: auto;">
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins&family=Viga&display=swap" rel="stylesheet">
  
  @vite('resources/js/app.js')
</head>
<body class="lg:h-screen h-[140vh] relative bg-[#F0F4F4]">

<section id="login">
  <div class="flex justify-center">
    <div class="flex lg:flex-row flex-col shadow-lg form-login lg:w-4/5 w-4/5 lg:h-[60vh] rounded-lg overflow-hidden">
      <div class="lg:w-full w-full bg-[#022E57] relative text-center py-6">
        <div class="lg:absolute lg:top-1/2 lg:left-1/2 lg:transform lg:-translate-x-1/2 lg:-translate-y-1/2">
          <img src="{{asset('assets/logo-login.png')}}" alt="Logo Kebumen" class="m-auto lg:w-[153px] lg:h-[210px] w-auto h-[150px]">
          <div class="lg:text-2xl text-[#FFEBAD] lg:mt-6 mt-2 text-lg">Selamat Datang Kembali</div>
          <div class="lg:text-xl text-md text-white">Pemdes Desa Kembaran</div>
        </div>
      </div>
      <div class="lg:p-10 p-4 flex flex-col justify-start w-full bg-white">
        <form action="{{ route('attempt.warga') }}" method="POST">
          @csrf
          @method('POST')
            <h2 class="font-bold lg:text-4xl text-xl lg:mb-4 mb-3">Login</h2> 
            <div class="mb-2">

              <input type="email" placeholder="Masukkan Email Anda" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="email"/>

              @error('email')
              <div class="alert alert-error shadow-lg text-white w-full m-auto my-2">
                <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                {{-- <span>{{ $message }}</span> --}}
                <span>Email/Password Salah!</span>
                </div>
              </div>
              @enderror

              <input type="password" placeholder="Masukkan Password Anda" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="password"/>

              @error('password')
              <div class="alert alert-error shadow-lg text-white w-full m-auto my-2">
                <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                {{-- <span>{{ $message }}</span> --}}
                <span>Email/Password Salah!</span>
                </div>
              </div>
              @enderror
            </div>
            <div class="max-w-xs w-full mb-6"><a href="#" class="lg:text-md text-sm">Lupa password ?<a></div>
            <button type="submit" class="btn btn-primary capitalize font-normal text-white rounded-md w-full text-md">Masuk</button>
            <div class="text-sm mt-5 text-center">Belum punya akun ? 
            <span><a href="{{ route('register.warga') }}" class="font-semibold">Daftar disini!<a></span></div>
        </form>
        <div class="h-full flex items-end justify-center">
          <a id="downloadApp" class="btn btn-outline btn-primary w-1/2 capitalize font-normal">
            <img src="{{ asset('assets/icon_app_round.png')}}" alt="Logo App" class="w-7 h-7">
            <span class="ml-2">Aplikasi Android</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  const downloadApp = document.getElementById('downloadApp');
  downloadApp.addEventListener('click', () => {
    swal({
      title: "Download Aplikasi",
      text: "Download Aplikasi Pelayanan Pemdes Kembaran",
      icon: "info",
      buttons: {
        cancel: {
            text: 'Batal',
            value: null,
            visible: true,
            className: 'font-normal;',
            closeModal: true,
          },
          confirm: {
            text: 'Download',
            value: true,
            visible: true,
            className: 'font-normal bg-success text-white',
            closeModal: true
          }
      },
      dangerMode: false,
    })
    .then((willDownload) => {
      if (willDownload) {
        window.location.href = "/app/permohonan-surat.apk";
      } else {
        swal("Terima Kasih");
      }
    });
  })
</script>
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