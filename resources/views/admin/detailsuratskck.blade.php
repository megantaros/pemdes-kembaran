
@extends('layout.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detail Surat Pengantar SKCK</h1>
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
                <div class="text-lg mb-2">Blanko Pemohon Surat Pengantar SKCK</div>
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Field</th>
                        <th scope="col">Isian Surat</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Nama</th>
                            <td><input type="username" class="form-control" id="exampleInputEmail1" value="{{$data->name}}" readonly></td>
                        </tr>
                        <tr>
                            <th scope="row">NIK</th>
                            <td><input type="username" class="form-control" id="exampleInputEmail1" value="{{ $data->nik }}" readonly></td>
                        </tr>
                        <tr>
                            <th scope="row">No. KK</th>
                            <td><input type="username" class="form-control" id="exampleInputEmail1" value="{{$data->kk}}" readonly></td>
                        </tr>
                        <tr>
                            <th scope="row">Tempat, Tanggal Lahir</th>
                            <td><input type="username" class="form-control" id="exampleInputEmail1" value="{{$data->ttl}}" readonly></td>
                        </tr>
                        <tr>
                            <th scope="row">Agama</th>
                            <td><input type="username" class="form-control" id="exampleInputEmail1" value="{{$data->agama}}" readonly></td>
                        </tr>
                        <tr>
                            <th scope="row">Jenis Kelamin</th>
                            <td>
                                <input type="username" class="form-control" id="exampleInputEmail1" value="{{$data->jenis_kelamin}}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Kewarganegaraan</th>
                            <td>
                                <input type="username" class="form-control" id="exampleInputEmail1" value="{{$data->kewarganegaraan}}" readonly>
                            </td>   
                        </tr>                 
                        <tr>
                            <th scope="row">Pekerjaan</th>
                            <td>
                                <input type="username" class="form-control" id="exampleInputEmail1" value="{{$data->pekerjaan}}" readonly>
                            </td>   
                        </tr>                 
                        <tr>
                            <th scope="row">Alamat</th>
                            <td>
                                <textarea class="form-control" id="exampleInputEmail1" readonly>{{$data->alamat}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Keperluan</th>
                            <td>
                                <input type="username" class="form-control" id="exampleInputEmail1" value="{{$data->keperluan}}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Pengantar RT</th>
                            <td>
                                <img src="{{ asset('berkaspemohon/'.$data->pengantar_rt) }}" class="w-50 border rounded" />
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Fotokopi KTP</th>
                            <td>
                                <img src="{{ asset('berkaspemohon/'.$data->fc_ktp) }}" class="w-50 border rounded" />
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Aksi</th>
                            @if( $data->jenis_surat == 'Surat Pengantar SKCK' )
                            <td>
                                <form class="d-flex justify-content-center my-3" action="/dashboard/detailsurat/{{ $data->id }}/update" method="POST">
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
