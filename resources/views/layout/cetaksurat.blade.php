<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LAPORAN SURAT KELUAR - PEMDES Kembaran</title>
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}" type="image/x-icon" style="width: auto;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/styleadmin.css') }}"> --}}
    <style>
      .line-bold {
        border-top: 4px solid black;
      }
      .line-bold::after {
        content: "";
        display: block;
        border-top: 1px solid black;
        width: 100%;
        margin-top: 1px;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid my-5">
      <div class="row">
        <div class="col-3 d-flex align-items-center justify-content-end">
          <img src="{{ asset('assets/logo-big-kebumen.png') }}" alt="Logo Kebumen">
        </div>
        <div class="col-6 d-flex align-items-center justify-content-center">
          <div class="text-center">
            <h4>PEMERINTAH KABUPATEN KEBUMEN
              <br>KECAMATAN KEBUMEN
              <br><span class="h3 fw-semibold">DESA KEMBARAN</span>
            </h4>
            <p class="h6 lh-1">Sekretariat : Jl. Joko Sangkrip No.09 Desa Kembaran Kebumen</p>
            <p class="h6 lh-1">e-mail : desakembaran09@gmail.com</p>
            <p class="h6 lh-1">Website : https://kembaran.kec-kebumen.kebumenkab.go.id/</p>
          </div>
        </div>
        <div class="col-3"></div>
      </div>
    </div>
    <div class="line-bold"></div>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
      window.print()
    </script>
  </body>
</html>