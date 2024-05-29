<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD</title>
  </head>
  <body>
    <h1 class="text-center mb-4">Edit Data Pegawai</h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                <div class="card">
                    <div class="card-body">
                    <form action="/updatedata_pegawai/{{ $pegawai->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_pegawai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$pegawai->nama_pegawai}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="jenis_kelamin" class="form-select"{{ $pegawai->jenis_kelamin}}>
                                <option value="">--Pilih Jenis Kelamin--</option>
                                
                                
                                {{-- membuat percabangan didalam view menggunakan php --}}
                                <?php
                                $jenis_kelamin = $pegawai->jenis_kelamin;  
                                if($jenis_kelamin == 'laki-laki'){
                                    echo '<option value="laki-laki" selected>Laki-Laki</option>';
                                    echo '<option value="perempuan">Perempuan</option>';
                                } else if ($jenis_kelamin == 'perempuan') {
                                    echo '<option value="perempuan" selected>Perempuan</option>';
                                    echo '<option value="laki-laki">Laki-Laki</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Id Devisi</label>
                            <input type="text" name="id_devisi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$pegawai->id_devisi}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$pegawai->alamat}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">No.Telp</label>
                            <input type="number" name="no_telp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$pegawai->no_telp}}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>