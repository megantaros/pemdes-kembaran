<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PEMDES - Kembaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}" type="image/x-icon" style="width: auto;">
    
    @vite('resources/js/app.js')
  </head>
  <body>
    <section>
        <div class="lg:h-[70vh] relative p-10" style="background: #022E57;">
            <div class="text-center lg:w-1/2 mx-auto lg:pt-[120px] md:pt-[50px] pt-[50px]">
                <div class="lg:text-3xl text-xl mb-3" style="color: #FFEBAD;">Lengkapi Profil Anda</div>
                <div class="lg:text-xl text-sm mb-5 text-white" style="font-family: Poppins">Sebelum mengajukan permohonan administrasi, pemohon dimohon untuk melengkapi profil terlebih dahulu guna memperlancar proses administrasi </div>
            </div>
            <div class="p-6 rounded-md shadow-lg bg-white lg:w-[1000px] md:w-[10px] mt-12 m-auto border-l-[15px] border-l-[#FFEBAD]">
              <form action="{{ route('warga.update', ['warga' => Auth::user()->id_warga]) }}" method="POST">
                @csrf
                @method('put')
                <div class="text-label">Masukkan No. Telfon</div>
                <input type="number" placeholder="Tulis disini..." class="input input-bordered input-info w-full mb-3" name="notelpon"/>
                <div class="text-label">Masukkan NIK</div>
                <input type="number" placeholder="Tulis disini..." class="input input-bordered input-info w-full mb-3" name="nik"/>
                <div class="text-label">Masukkan Tempat Tanggal Lahir</div>
                <input type="text" placeholder="Contoh: Kebumen, 17 Agustus 1945" class="input input-bordered input-info w-full mb-3" name="ttl"/>
                <div class="text-label">Pilih Jenis Kelamin</div>
                <select class="select select-primary w-full mb-3" name="jenis_kelamin">
                    <option selected disabled="disabled">Pilih Jenis Kelamin</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
                <div class="text-label">Masukkan Pekerjaan</div>
                <input type="text" placeholder="Tulis disini..." class="input input-bordered input-info w-full mb-3" name="pekerjaan"/>
                <div class="text-label">Agama</div>
                  <select class="select select-primary w-full mb-3" name="agama">
                      <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Katolik">Katolik</option>
                      <option value="Hindhu">Hindhu</option>
                      <option value="Budha">Budha</option>
                  </select>
                <div class="text-label">Masukkan Alamat Lengkap</div>
                <textarea class="textarea textarea-info w-full mb-2" placeholder="Alamat Lengkap Sesuai KTP" name="alamat"></textarea>
                <button type="submit" class="btn btn-primary w-100 mt-3 text-white capitalize font-normal">Kirim</button>
              </form>
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