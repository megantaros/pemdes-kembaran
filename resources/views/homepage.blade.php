<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <div class="container">
        <h1 class="my-5 text-center">Data Pegawai</h1>
        <a href="/tambahpegawai" class="btn btn-primary mb-3">Tambah Data</a>
        {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success my-2" role="alert">
            {{ $message }}
        </div>
        @endif --}}
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Foto</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">No Telpon</th>
                <th scope="col">Dibuat</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                <tr>
                    <th scope="row">{{ $row->id }}</th>
                    <td>{{ $row->nama }}</td>
                    <td>
                      <img src="{{ asset('fotopegawai/'.$row->foto) }}" style="width: 90px;"/>
                    </td>
                    <td>{{ $row->jenis_kelamin }}</td>
                    <td>{{ $row->notelpon }}</td>
                    <td>{{ $row->created_at->format('D M Y') }}</td>
                    <td>
                        <a href="/tampilkandata/{{ $row->id }}" class="btn btn-warning">Edit Data</a>
                        <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Hapus Data</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
  </body>
  <script>
    $('.delete').click( function(){

      var pegawaiid = $(this).attr('data-id');
      var nama = $(this).attr('data-nama');

      swal({
      title: "Yakin?",
      text: "Kamu akan menghapus data pegawai dengan nama "+nama+"",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/delete/"+pegawaiid+""
        swal("Data berhasil dihapus!", {
          icon: "success",
        });
      } else {
        swal("Data tidak jadi dihapus!");
      }
    });
  });
</script>
<script>
  @if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
  @endif
</script>
</html>