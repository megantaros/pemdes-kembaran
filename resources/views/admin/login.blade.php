<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PEMDES - Kembaran</title>
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}" type="image/x-icon" style="width: auto;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
            <form action="/loginadmin" method="POST">
              @csrf
                <h2 class="font-bold lg:text-4xl text-xl lg:mb-4 mb-3">Login Admin</h2> 
                <div class="mb-2">
                  <input type="text" placeholder="Masukkan Email Anda" class="lg:input-md input-sm placeholder:text-sm bg-[#F0F4F4] w-full rounded my-1 lg:text-md text-sm" name="email"/>
                  @error('email')
                  <div class="alert alert-error shadow-lg text-white w-full m-auto my-2">
                    <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    {{-- <span>{{ $message }}</span> --}}
                    <span>Email/Password Salah!</span>
                    </div>
                  </div>
                  @enderror
                  <input type="password" placeholder="Masukkan Password Anda" class="lg:input-md input-sm placeholder:text-sm bg-[#F0F4F4] w-full rounded my-1 lg:text-md text-sm" name="password"/>
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
                <button type="submit" class="btn-login rounded-md w-full text-md py-3 mt-5">Masuk</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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