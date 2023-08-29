<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lengkapi Profil | Portal Pelayanan Pemdes Kembaran</title>
  <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}" type="image/x-icon" style="width: auto;">
  
  @vite('resources/js/app.js')
</head>
<body>
  <section class="lg:h-[70vh] md:h-[50vh] h-[50vh] relative p-10 bg-primary">

      <div class="container text-center text-white">
        <h1 class="lg:text-xl md:text-lg text-lg font-semibold lg:mb-4 mb-2 active">Lengkapi Profil Anda</h1>
        <p class="lg:mb-10 lg:w-2/5 mx-auto lg:text-md md:text-sm text-sm mb-7 w-full" style="font-family: Poppins">Sebelum mengajukan permohonan administrasi, pemohon dimohon untuk melengkapi profil terlebih dahulu guna memperlancar proses administrasi</p>
      </div>

  </section>
  <section class="lg:-mt-60 md:-mt-96 -mt-28">
    <div class="container">

      <div class="card bg-white shadow-lg mb-10 border-l-8 border-[#FFEBAD]">
        <div class="card-body">
          <form action="{{ route('warga.update', ['warga' => $id_warga]) }}" class="grid lg:grid-cols-2 md:grid-cols-1 grid-cols-1 gap-2" method="POST">
            @csrf
            @method('PUT')

            <div>

              <div class="text-label text-sm">Nomor Telfon</div>
              <input type="number" placeholder="Masukkan No. Telfon Anda" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="notelpon"/>
              
              <div class="text-label text-sm">NIK</div>
              <input type="number" placeholder="Masukkan NIK Anda" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="nik"/>
  
              <div class="text-label text-sm">Tempat, Tanggal Lahir</div>
              <input type="text" placeholder="Contoh: Kebumen, 17 Agustus 1999" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="ttl"/>

            </div>
  
            <div>

              <div class="text-label text-sm">Jenis Kelamin</div>
              <select class="select select-primary w-full my-1" name="jenis_kelamin">
                <option selected disabled="disabled">Pilih Jenis Kelamin</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
  
              <div class="text-label text-sm">Pekerjaan</div>
              <input type="text" placeholder="Masukkan Pekerjaan Anda" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="pekerjaan"/>
  
              <div class="text-label text-sm">Agama</div>
              <select class="select select-primary w-full my-1" name="agama">
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindhu">Hindhu</option>
                <option value="Budha">Budha</option>
              </select>

            </div>
  
            <div class="lg:col-span-2">

              <div class="text-label text-sm">Alamat</div>
              <textarea class="textarea textarea-primary w-full mb-2 placeholder:text-sm" placeholder="Alamat Lengkap Sesuai KTP" name="alamat"></textarea>

            </div>
  
            <div class="lg:col-span-2">
              <button type="submit" class="btn btn-primary w-full mt-3 text-white capitalize font-normal">Simpan</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </section>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
</body>
  {{-- <script>
    @if (Session::has('success'))
      toastr.success("{{ Session::get('success') }}");
    @endif
  </script> --}}
  <script>
    @if (Session::has('success'))
      swal("{{ Session::get('success') }}", "Terima Kasih", "success");
    @endif
  </script>
  <script>
    @if($errors->any())
        swal("Maaf Data Gagal Dikirim", "Pastikan Anda Mengisi Form dengan Benar!", "error");
    @endif
  </script>
</html>