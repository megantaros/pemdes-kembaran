
@extends('layout.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detail Surat Keterangan Domisili</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboardadmin">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card p-4">
                <div class="text-lg mb-2">Blanko Pemohon Surat Keterangan Domisili</div>
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Form</th>
                        <th scope="col">Identitas Pemohon</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Nama</th>
                        <td><input type="username" class="form-control" id="exampleInputEmail1" value="{{$surat->name}}" readonly></td>
                      </tr>
                      <tr>
                        <th scope="row">NIK</th>
                        <td><input type="username" class="form-control" id="exampleInputEmail1" value="{{ $surat->nik }}" readonly></td>
                      </tr>
                      <tr>
                        <th scope="row">No. KK</th>
                        <td><input type="username" class="form-control" id="exampleInputEmail1" value="{{ $surat->kk }}" readonly></td>
                      </tr>
                      <tr>
                        <th scope="row">Email</th>
                        <td><input type="username" class="form-control" id="exampleInputEmail1" value="{{$surat->email}}" readonly></td>
                      </tr>
                      <tr>
                        <th scope="row">Jenis Kelamin</th>
                        <td><input type="username" class="form-control" id="exampleInputEmail1" value="{{$surat->jenis_kelamin}}" readonly></td>
                      </tr>
                      <tr>
                        <th scope="row">No. Telephone</th>
                        <td><input type="username" class="form-control" id="exampleInputEmail1" value="{{$surat->notelpon}}" readonly></td>
                      </tr>
                      <tr>
                        <th scope="row">Alamat</th>
                        <td><textarea class="form-control" id="exampleInputEmail1" readonly>{{$surat->alamat}}</textarea></td>
                      </tr>
                      <tr>
                        <th scope="row">Foto KTP</th>
                        <td>
                            <img src="{{ asset('berkaspemohon/'.$surat->fc_ktp) }}" class="w-50 border rounded" />
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Foto KK</th>
                        <td>
                            <img src="{{ asset('berkaspemohon/'.$surat->fc_kk) }}" class="w-50 border rounded" />
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Foto Lokasi</th>
                        <td>
                            <img src="{{ asset('berkaspemohon/'.$surat->foto_lokasi) }}" class="w-50 border rounded" />
                        </td>
                      </tr>
                      {{-- <tr>
                        <th scope="row">Status Surat</th>
                        <td><input type="username" class="form-control" id="exampleInputEmail1" value="{{$domisili->status}}" readonly></td>
                      </tr> --}}
                      <tr>
                        <th scope="row">Aksi</th>
                        @if( $surat->jenis_surat == 'Surat Keterangan Domisili' )
                        <td>
                            <form class="d-flex justify-content-center my-3" action="/dashboard/detailsurat/{{ $surat->id }}/update" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success mx-1 px-3 py-2 text-md text-white shadow" name="status" value="Diterima"><i class="ion-checkmark-round mr-3"></i>Terima</button>
                                <button type="submit" name="status" value="Ditolak" class="btn btn-danger mx-1 px-3 py-2 text-md text-white shadow"><i class="ion-close mr-3"></i>Tolak</button>
                                <a href="" class="btn btn-info mx-1 px-3 py-2 text-md text-white shadow"><i class="ion-printer mr-3"></i>Cetak</a>
                            </form>
                        </td>
                        @endif
                      </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- /.container-fluid -->
      </section>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
