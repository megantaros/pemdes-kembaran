<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Admin Portal Pelayanan Pemdes Kembaran</title>
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}" type="image/x-icon" style="width: auto;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&family=Poppins:wght@400;600&family=Viga&display=swap" rel="stylesheet">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    
    @vite('resources/js/app.js')
</head>
<body>
  {{-- Modal Ubah Password Admin --}}
  <dialog class="modal w-full h-full" id="modalPassAdmin">
    <div class="modal-box font-normal">
        <div class="flex flex-col gap-4">

            <div class="p-4 rounded-lg bg-warning text-center">
                <h2 class="text-lg font-semibold">
                    <i class="fas fa-info-circle"></i>
                    <span>Update Password</span>
                </h2>
                <p class="text-sm mt-2" style="font-family: Poppins">
                    Pastikan password Anda mudah diingat dan tidak mudah ditebak oleh orang lain
                </p>
            </div>

            <div class="card bg-white text-left border-0">
                <form action="{{ route('admin.update', ['admin' => Auth::guard('admin')->user()->id_admin ]) }}" id="formPass" class="card-body bg-slate-200 rounded-lg text-sm" style="font-family: Poppins" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="text-label text-sm">Password *</div>
                    <input type="password" placeholder="Masukkan Password" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="password"/>

                    <div class="text-label text-sm">Konfirmasi Password *</div>
                    <input type="password" placeholder="Masukkan Konfirmasi Password" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="confirmPassword"/>

                    <button type="submit" class="btn btn-warning capitalize font-normal text-white">Ubah Password</button>
                    
                </form>
            </div>
        </div>
        <div class="modal-action">
            <a href="#headerService" class="btn btn-primary text-white font-normal capitalize">Tutup</a>
        </div>
    </div>
  </dialog>

  {{-- Modal Tambah Warga --}}
  <dialog class="modal w-full h-full" id="modalAddWarga">
    <div class="modal-box font-normal">
        <div class="flex flex-col gap-4">
  
            <div class="p-4 rounded-lg bg-warning text-center">
                <h2 class="text-lg font-semibold">
                  <i class="fas fa-info-circle"></i>
                  <span>Tambah Warga</span>
                </h2>
                <p class="text-sm mt-2" style="font-family: Poppins">
                  Tambahkan warga baru ke dalam sistem
                </p>
            </div>
  
            <div class="card bg-white text-left border-0">
                <form action="{{ route('warga-admin.store') }}" class="card-body bg-slate-200 rounded-lg text-sm" style="font-family: Poppins" method="POST">
                    @csrf
                    @method('POST')
  
                    <div class="text-label text-sm">Nama *</div>
                    <input type="text" placeholder="Masukkan Nama" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="nama_warga"/>
                    @error('nama_warga')
                    <div class="alert alert-error shadow-lg text-white w-full m-auto my-2">
                      <div>
                      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                      {{-- <span>{{ $message }}</span> --}}
                      <span>Kolom Nama Wajib Diisi!</span>
                      </div>
                    </div>
                    @enderror
                    
                    <div class="text-label text-sm">Email *</div>
                    <input type="email" placeholder="Masukkan Email" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="email"/>
                    @error('email')
                    <div class="alert alert-error shadow-lg text-white w-full m-auto my-2">
                      <div>
                      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                      {{-- <span>{{ $message }}</span> --}}
                      <span>Kolom Email Wajib Diisi!</span>
                      </div>
                    </div>
                    @enderror
  
                    <div class="text-label text-sm">Password *</div>
                    <input type="password" placeholder="Masukkan Password" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="password"/>
                    @error('password')
                    <div class="alert alert-error shadow-lg text-white w-full m-auto my-2">
                      <div>
                      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                      {{-- <span>{{ $message }}</span> --}}
                      <span>Kolom Password Wajib Diisi!</span>
                      </div>
                    </div>
                    @enderror
  
                    <div class="text-label text-sm">Konfirmasi Password *</div>
                    <input type="password" placeholder="Masukkan Konfirmasi Password" class="input input-bordered input-primary w-full my-1 read-only:bg-[#9cb4cc] placeholder:text-sm" name="conf_pass"/>
                    @error('conf_pass')
                    <div class="alert alert-error shadow-lg text-white w-full m-auto my-2">
                      <div>
                      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                      {{-- <span>{{ $message }}</span> --}}
                      <span>Kolom Konfirmasi Password Wajib Diisi!</span>
                      </div>
                    </div>
                    @enderror
  
                    <button type="submit" class="btn btn-primary capitalize font-normal text-white mt-4">Tambah Warga</button>
                    
                </form>
            </div>
        </div>
        <div class="modal-action">
            <a href="#headerService" class="btn btn-primary text-white font-normal capitalize">Tutup</a>
        </div>
    </div>
  </dialog>

  <div id="sideBar" class="drawer drawer-mobile bg-slate-200">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col">
      <!-- Page content here -->
      <div class="navbar bg-primary text-white">
        <div class="flex-none">
          <label for="my-drawer-2" class="btn btn-square btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
          </label>
        </div>
        <div class="flex-1">
          <a class="btn btn-ghost normal-case text-lg font-normal">
            Portal Pelayanan Pemdes Kembaran
          </a>
        </div>
        <div class="flex-none">
          <a href="" class="btn btn-ghost font-normal capitalize flex gap-2 items-center">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg> --}}
            <i class="fas fa-user"></i>
            Hai, {{ Auth::guard('admin')->user()->nama_admin  }}
          </a>
        </div>
      </div>

      <div class="container p-6">
        <div class="flex items-center p-4 bg-white rounded-lg mb-4">
          <div class="flex-1">
            <h2 class="text-xl font-semibold">Halaman @yield('title')</h2>
            <p class="text-sm" style="font-family: Poppins;">
              Selamat datang di Portal Pelayanan Pemdes Kembaran. Silahkan kelola data warga, surat, dan pengaturan akun anda.
            </p>
          </div>
          <div class="btn-ghost text-sm font-semibold flex gap-2 items-center hover:bg-transparent" style="font-family: Poppins">
            <i class="fas fa-home"></i>
            Admin / <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
          </div>
        </div>
        @yield('content')
      </div>

    </div> 
    <div class="drawer-side">
      <label for="my-drawer-2" class="drawer-overlay"></label> 
      <ul class="menu p-4 w-80 bg-primary text-white" style="font-family: Poppins;">
        <!-- Sidebar content here -->
        <li>
          <a href="/dashboard" class="btn-ghost p-2 flex items-center rounded-lg gap-2">
            <img src="{{ asset('assets/logo-big-kebumen.png') }}" alt="Logo Kebumen" class="h-12">
            <div>
              <h2 class="text-lg active" style="font-family: Viga">Admin</h2>
              <p class="text-sm" style="font-family: Poppins">Kasi Kesejahteraan & Pelayanan</p>
            </div>
          </a>
        </li>

        <hr class="my-4">

        <li>
          <a href="{{ route('dashboard') }}" class="p-4 @yield('dashboardActive')">
            <i class="fa fa-th-large"></i>
            Dashboard  
          </a>
        </li>

        <li>
          <a href="{{ route('warga-admin.index') }}" class="p-4 @yield('wargaActive')">
            <i class="fas fa-users"></i>
            Data Warga   
          </a>
        </li>

        <li>
          <a onclick="handleLetter()" class="p-4 flex-1">
            <i class="fas fa-envelope"></i>
            Surat
            <i class="fas fa-chevron-up ml-auto"></i>
          </a>
        </li>

        <ul id="letters" class="hidden pl-4" style="font-family: Poppins">
          <li>
            <a href="{{ route('verifikasi.surat') }}" class="p-4 @yield('incomingActive')">
              <i class="fa fa-inbox w-5 text-center" aria-hidden="true"></i>
              Surat Diterima
            </a>
          </li>
          <li>
            <a href="{{ route('proses.surat') }}" class="p-4 @yield('processedActive')">
              <i class="fa fa-spinner w-5 text-center" aria-hidden="true"></i>
              Surat Diproses
            </a>
          </li>
          <li>
            <a href="{{ route('signed.surat') }}" class="p-4 @yield('signedActive')">
              <i class="fa fa-check w-5 text-center" aria-hidden="true"></i>
              Surat Ditandatangani
            </a>
          </li>
          <li>
            <a href="{{ route('selesai.surat') }}" class="p-4 @yield('doneActive')">
              <i class="fa fa-list-alt w-5 text-center" aria-hidden="true"></i>
              Surat Keluar
            </a>
          </li>
          <li>
            <a href="{{ route('ditolak.surat') }}" class="p-4 @yield('rejectedActive')">
              <i class="fa fa-times w-5 text-center" aria-hidden="true"></i>
              Surat Ditolak
            </a>
          </li>
        </ul>

        <hr class="my-4">

        <li>
          <a href="{{ route('admin.edit', ['admin' => Auth::guard('admin')->user()->id_admin ]) }}" class="p-4 @yield('account')">
            <i class="fas fa-cog"></i>
            Pengaturan Akun
          </a>
        </li>

        <form action="{{ route('logout.admin') }}" method="POST">
        <li>
            @csrf
            @method('POST')
            <button type="submit" class="p-4 bg-error text-red-950 hover:text-red-500">
              <i class="fas fa-sign-out-alt"></i>
              Keluar
            </button>
          </li>
        </form>

      </ul>
    
    </div>
  </div>



  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> --}}

  @yield('scripts')
</body>
<script>

  @if (Session::has('success'))
    swal("{{ Session::get('success') }}", "Terima Kasih", "success");
  @endif

  @if (Session::has('error'))
    swal("{{ Session::get('error') }}", "Terima Kasih", "error");
  @endif

  const myDrawer = document.getElementById('my-drawer-2').addEventListener('click', (e) => {
    e.preventDefault();

    const sideBar = document.getElementById('sideBar');
    sideBar.classList.toggle('drawer-mobile');
  })

  const handleLetter = () => {
    const letter = document.querySelector('.fa-chevron-up');
    letter.classList.toggle('rotate-180');

    const letters = document.getElementById('letters');
    letters.classList.toggle('hidden');
  }

  $(function() {
    $('input[name="daterange"]').daterangepicker({
      opens: 'left'
    }, function(start, end, label) {

      $('input[name="startDate"]').val(start.format('YYYY-MM-DD'));
      $('input[name="endDate"]').val(end.format('YYYY-MM-DD'));

      // console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
  });

  $(document).ready(function(){
    $("#search").on("keyup", function() {
      var value = $(this).val().toLowerCase();

      $("#listWarga").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });

      $("#listLetters").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });

    });

    $('input[name="daterange"]').daterangepicker({
    opens: 'left'
    }, function(start, end, label) {

      $('input[name="startDate"]').val(start.format('YYYY-MM-DD'));
      $('input[name="endDate"]').val(end.format('YYYY-MM-DD'));

      $("#listLetters").filter(function() {
        const text = $(this).text().toLowerCase();

        const isInRange = text.includes(start.format('DD MMMM YYYY')) || end.format('DD MMMM YYYY');

        $(this).toggle(isInRange);
      });
    });

    $("#selectStatus").on("change", function() {
      const value = $(this).val();
      const keteranganAdmin = $("#keteranganAdmin");

      if (value === '6') {
        keteranganAdmin.removeClass('hidden');
      } else {
        keteranganAdmin.addClass('hidden');
      }
    });

    $('.deleteLetter').on('click', function(e) {
      e.preventDefault();

      var idSuratPermohonan = $(this).data('id');
      const surat = $(this).data('surat');

      swal({
        title: 'Apakah anda yakin?',
        text: `Data ${surat} akan dihapus secara permanen!`,
        icon: 'warning',
        buttons: {
          cancel: {
            text: 'Batal',
            value: null,
            visible: true,
            className: 'font-normal;',
            closeModal: true,
          },
          confirm: {
            text: 'Hapus',
            value: true,
            visible: true,
            className: 'font-normal',
            closeModal: true
          }
        },
        dangerMode: true,
      }).then((willDelete) => {
        if(willDelete) {
          window.location = `/admin/hapus-surat/${idSuratPermohonan}`
          // swal({
          //   title: 'Berhasil',
          //   text: `Data ${surat} berhasil dihapus!`,
          //   icon: 'success',
          //   button: {
          //     text: 'Tutup',
          //     value: null,
          //     visible: true,
          //     className: 'font-normal',
          //     closeModal: true
          //   }
          // })
        } else {
          swal({
            title: 'Gagal',
            text: `Data ${surat} gagal dihapus!`,
            icon: 'error',
            button: {
              text: 'Tutup',
              value: null,
              visible: true,
              className: 'font-normal',
              closeModal: true
            }
          })
        }
      }).catch((err) => {
        console.log(err);
      })
    });
  });

</script>
</html>
