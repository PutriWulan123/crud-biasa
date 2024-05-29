@extends('layout.master')

@section('content')
        <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0">Data Gaji</h1>
                  </div><!-- /.col -->
                  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Data Gaji</li>
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>

          <div class="container">
         <div class="row">
         {{-- @if ($message = Session::get('success'))
                    <div class="alert alert-dark" role="alert">
                      {{$message}}
                    </div>
                @endif --}}
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              {{-- <a href="/tambahpegawai" type="button" class="btn btn-sm btn-primary mb-4">Tambah +</a> --}}
              <!-- Button trigger modal -->
              @can('update role')
              <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambah">
                Tambah +
              </button>
              @endcan

              <!-- Modal -->
              <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data pegawai</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="/insertdata_penggajian" method="POST" enctype="multipart/form-data">
                      
                      {{-- <form action="{{ url('tambahpegawai') }}" method="POST" enctype="multipart/form-data"> --}}
                     @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_pegawai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="jenis_kelamin" aria-label="Default select example">
                                <option selected>--pilih jenis kelamin--</option>
                                <option value="laki-laki">laki-laki</option>
                                <option value="perempuan">perempuan</option>
                                </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Id Pegawai</label>
                            <input type="text" name="id_pegawai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Devisi</label>
                            <input type="text" name="nama_devisi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tunjangan</label>
                            <input type="text" name="tunjangan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Gaji Pokok</label>
                            <input type="number" name="gaji_pokok" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tanggal Bayar</label>
                            <input type="date" name="tanggal_bayar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        
            </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div> 

              
                <div class="row">
                @if ($message = Session::get('success'))
                    <div class="alert alert-dark" role="alert">
                      {{$message}}
                    </div>
                @endif

                

                             <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-responsive-md table-hover" id="table-penggajian">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Nama Pegawai</th>
                      <th class="text-center">Jenis Kelamin</th>
                      <th class="text-center">Id Pegawai</th>
                      <th class="text-center">Nama Devisi</th>
                      <th class="text-center">Tunjangan</th>
                      <th class="text-center">Gaji Pokok</th>
                      <th class="text-center">Tanggal Bayar</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php
                  $no = 1;
                  $a= 1;
                  $b = 1;
                  @endphp
                  @foreach($data as $row)
                    <tr class="text">
                      <th scope="row">{{ $no++}}</th>
                      <td>{{ $row->nama_pegawai}}</td>
                      <td>{{ $row->jenis_kelamin}}</td>
                      <td>{{ $row->id_pegawai}}</td>
                      <td>{{ $row->nama_devisi}}</td>
                      <td>{{ $row->tunjangan}}</td>
                      <td>{{ $row->gaji_pokok}}</td>
                      {{-- <td>{{$row->tanggal_bayar->format('D M Y')}}</td> --}}
                      <td>{{ date('d-m-Y', strtotime($row->tanggal_bayar))
                        }}</td>
                      <td>
                            <!-- Button trigger modal -->
                            @can('update role')
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $a++ }}">
                              <i class="far fa-edit"></i>
                            </button>
                            @endcan

                          <!-- Modal Edit -->
                          <div class="modal fade" id="exampleModal{{$b++}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Data Gaji</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/updatedata_penggajian/{{$row->id}}" method="POST" 
                                enctype="multipart/form-data">
                                {{-- <form action="/updatedata" method="POST" enctype="multipart/form-data">  --}}
                                <div class="modal-body">
                                  {{-- CODE UNTUK TAMPILAN POP UP --}}
                                   

                                    @csrf
                                    <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                      <input type="text" name="nama_pegawai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{ $row->nama_pegawai}}">
                                  </div>
                                  <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                      <select class="form-select" name="jenis_kelamin" aria-label="Default select example">
                                          <option selected>--pilih jenis kelamin--</option>
                                          <option value="laki-laki">laki-laki</option>
                                          <option value="perempuan">perempuan</option>
                                          </select>
                                  </div>
                                  <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Id Pegawai</label>
                                      <input type="text" name="id_pegawai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{ $row->id_pegawai}}">
                                  </div>
                                  <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Nama Devisi</label>
                                      <input type="text" name="nama_devisi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{ $row->nama_devisi}}">
                                  </div>
                                  <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Tunjangan</label>
                                      <input type="text" name="tunjangan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{ $row->tunjangan}}">
                                  </div><div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Gaji Pokok</label>
                                      <input type="number" name="gaji_pokok" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{ $row->gaji_pokok}}">
                                  </div>
                                  <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Tanggal Bayar</label>
                                      <input type="date" name="tanggal_bayar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{ $row->tanggal_bayar}}">
                                 </div>
                                </div> 
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>  
                        <div class="btn-group">
                        @can('delete role')
                              <a href="/deletedata_penggajian/{{ $row->id }}" class="btn btn-danger mt-2 delete"><i class="fas fa-trash-alt"></i></a>
                              
                        @endcan
                        </div>
                        <div class="btn-group">
                          <a href="/detail_datagaji/{{ $row->id }}" class="btn btn-success mt-2 detail"><i class="fas fa-eye"></i></a>
                          {{-- <button type="button" class="btn btn-success mt-2 detail"><i class="fas fa-eye"></i></button> --}}
                        </div>

                      </td>
                    </tr>
                    @endforeach
                    
                    
                    </div>
                    </div>

                         
                    <!-- Option 1: Bootstrap Bundle with Popper -->
                      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                      <script
                      src="https://code.jquery.com/jquery-3.7.1.slim.js"
                      integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc="
                      crossorigin="anonymous"></script>
                      {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
                      {{-- <script>"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"</script>
                  <script>"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"</script> --}}
                  </tbody>
                  <script>
                        $('.delete').click(function(e){
                          e.preventDefault()
                          let link = $(this).attr('href');
                          Swal.fire({
                              title: "Are you sure?",
                              text: "You won't be able to revert this!",
                              icon: "warning",
                              showCancelButton: true,
                              confirmButtonColor: "#3085d6",
                              cancelButtonColor: "#d33",
                              confirmButtonText: "Yes, delete it!"
                            }).then((result) => {
                              if (result.isConfirmed) {
                                window.location.href = link;
                              }
                            });
                        });
                      </script>
                </table>
              </div>
              


  {{-- MEMBUAT PENCARIANNYA --}}
  <script>
    var table_penggajian = $('#table-penggajian').dataTable({
      ordering: false
    })

  </script>

@endsection
