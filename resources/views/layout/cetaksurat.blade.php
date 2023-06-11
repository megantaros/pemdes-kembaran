<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LAPORAN SURAT KELUAR - PEMDES Kembaran</title>
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}" type="image/x-icon" style="width: auto;">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <style>
      .line{
        border-bottom: 2px solid black;
      }
      .line::before{
        content: "";
        display: block;
        width: 100%;
        height: 7px;
        background-color: black;
        margin-bottom: 2px;
      }
    </style>

  </head>
  <body>
    <div class="container-fluid">
      <div class="row py-3">
        <div class="col-2 d-flex justify-content-center align-items-center">
          <img src="{{ asset('assets/logo-big-kebumen.png') }}" alt="Logo Kebumen">
        </div>
        <div class="col-8 text-center">
          <div class="text-heading d-flex justify-content-center align-items-center">
            <h3 class="fw-bold">PEMERINTAH KABUPATEN KEBUMEN<br>
              KECAMATAN KEBUMEN<br>
              DESA KEMBARAN
            </h3>
          </div>
          <p>Sekretariat : Jl. Joko Sangkrip No.09 Desa Kembaran Kebumen<br>
            e-mail : desakembaran09@gmail.com<br>
            Website : https://kembaran.kec-kebumen.kebumenkab.go.id/
          </p>
        </div>
        <div class="col-2"></div>
      </div>
      <div class="line"></div>
    </div>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>window.print()</script>
  </body>
</html>