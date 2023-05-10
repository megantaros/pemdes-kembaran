@extends('layout.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Surat Ditolak</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content w-100">
      <div class="container-fluid">
          <div class="card p-4">
            <div class="text-lg mb-2">Daftar Pemohon Surat</div>
            <form action="{{ route('suratditolak') }}">
              <div class="input-group mb-3 w-50">
                {{-- <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-search"></i></span>
                </div> --}}
                <input type="text" name="search" class="form-control rounded" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                <button type="submit" class="btn btn-primary ml-2">Cari Pemohon</button>
              </form>
          </div>
            <table class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">NIK</th>
                  <th scope="col">Jenis Surat</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Tanggal Pengajuan</th>
                  <th scope="col">Status Surat</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                  {{-- <?php $no=1 ?> --}}
                  @foreach ($data as $index => $surat)
                  <tr>
                      <th scope="row"><div class="text-md py-2">{{ $index + $data->firstItem() }}</div></th>
                      <td><div class="text-md py-2">{{ $surat->name }}</div></td>
                      <td><div class="text-md py-2 text-center">{{ $surat->nik }}</div></td>
                      <td><div class="text-md py-2">{{ $surat->jenis_surat }}</div></td>
                      <td><div class="text-md py-2">{{ $surat->alamat }}</div></td>
                      <td><div class="text-md py-2 text-center">{{ $surat->tanggal }}</div></td>
                      <td class="text-center">
                        @if ( $surat->status == 'Terkirim' )
                        <button class="btn btn-info text-md">Terkirim</button>
                        @elseif ( $surat->status == 'Diterima' )
                        <button class="btn btn-success text-md">Diterima</button>
                        @else
                        <button class="btn btn-danger text-md">Ditolak</button>
                        @endif
                        {{-- <form action="/dashboard/{{ $surat->id }}/update"></form>
                          <select class="form-control">
                            <option selected>{{ $surat->status }}</option>
                            <option value="Diterima">Diterima</option>
                            <option value="Ditolak">Ditolak</option>
                          </select>
                        </form> --}}
                      </td>
                      <td class="d-flex justify-content-center">
                        @if( $surat->jenis_surat == 'Surat Pengantar KTP' )
                        <a href="/dashboard/detailsuratktp/{{ $surat->id_warga }}" class="btn btn-warning d-flex justify-content-center align-items-center text-lg mr-2 text-white px-3 py-0">
                          <i class="ion-ios-email-outline mr-2 text-xl"></i>
                          <span class="text-md">Detail Surat</span>
                        </a>
                        @elseif( $surat->jenis_surat == 'Surat Pengantar KK' )
                        <a href="/dashboard/detailsuratkk/{{ $surat->id_warga }}" class="btn btn-warning d-flex justify-content-center align-items-center text-lg mr-2 text-white px-3 py-0">
                          <i class="ion-ios-email-outline mr-2 text-xl"></i>
                          <span class="text-md">Detail Surat</span>
                        </a>
                        @elseif( $surat->jenis_surat == 'Surat Pengantar SKCK' )
                        <a href="/dashboard/detailsuratskck/{{ $surat->id_warga }}" class="btn btn-warning d-flex justify-content-center align-items-center text-lg mr-2 text-white px-3 py-0">
                          <i class="ion-ios-email-outline mr-2 text-xl"></i>
                          <span class="text-md">Detail Surat</span>
                        </a>
                        @elseif( $surat->jenis_surat == 'Surat Keterangan Domisili' )
                        <a href="/dashboard/detailsuratdomisili/{{ $surat->id_warga }}" class="btn btn-warning d-flex justify-content-center align-items-center text-lg mr-2 text-white px-3 py-0">
                          <i class="ion-ios-email-outline mr-2 text-xl"></i>
                          <span class="text-md">Detail Surat</span>
                        </a>
                        @elseif( $surat->jenis_surat == 'Surat Keterangan Usaha' )
                        <a href="/dashboard/detailsuratusaha/{{ $surat->id_warga }}" class="btn btn-warning d-flex justify-content-center align-items-center text-lg mr-2 text-white px-3 py-0">
                          <i class="ion-ios-email-outline mr-2 text-xl"></i>
                          <span class="text-md">Detail Surat</span>
                        </a>
                        @elseif( $surat->jenis_surat == 'Surat Keterangan Pindah' )
                        <a href="/dashboard/detailsuratpindah/{{ $surat->id_warga }}" class="btn btn-warning d-flex justify-content-center align-items-center text-lg mr-2 text-white px-3 py-0">
                          <i class="ion-ios-email-outline mr-2 text-xl"></i>
                          <span class="text-md">Detail Surat</span>
                        </a>
                        @elseif( $surat->jenis_surat == 'Surat Keterangan Pindah Datang' )
                        <a href="/dashboard/detailsuratpindah_datang/{{ $surat->id_warga }}" class="btn btn-warning d-flex justify-content-center align-items-center text-lg mr-2 text-white px-3 py-0">
                          <i class="ion-ios-email-outline mr-2 text-xl"></i>
                          <span class="text-md">Detail Surat</span>
                        </a>
                        @endif
                        <a class="btn btn-danger d-flex justify-content-center align-items-center text-lg text-white px-3 py-0 hapus-surat" data-id="{{ $surat->id }}" data-surat="{{ $surat->jenis_surat }}">
                          <i class="ion-ios-trash-outline mr-2 text-xl"></i>
                          <span class="text-md">Hapus</span>
                        </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
            {{ $data->links() }}
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection