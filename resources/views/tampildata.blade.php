<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center my-3">Edit Data Pegawai</h1>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="/updatedata/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                placeholder="Masukkan Nama" name="nama" value="{{ $data->nama }}">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Ubah Foto</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" name="foto">
                        </div>
                        <img src="{{ asset('fotopegawai/'.$data->foto) }}" style="width: 200px;" class="mb-4"/>
                        <div class="mb-3">
                            <label for="inputState" class="form-label">Jenis Kelamin</label>
                            <select id="inputState" class="form-select" name="jenis_kelamin">
                                <option selected>{{ $data->jenis_kelamin }}</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Telephone</label>
                            <input type="number" class="form-control" id="formGroupExampleInput2"
                                placeholder="Masukkan No. Telephone" name="notelpon" value="{{ $data->notelpon }}">
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-success w-100">Ubah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>