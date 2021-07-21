@extends('../layout_admin/master')
@section('css')
  <link rel="stylesheet" href="{{ url('admin/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{ url('admin/adminlte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ url('admin/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@endsection


@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Struktur Jabatan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square"></i>&ensp;Tambah Struktur Jabatan</button>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Jabatan</th>
                  <!-- <th>Nama</th> -->
                  <th >Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($listjabatan as $key => $jt)
                  <tr>
                    <td> {{ ++$key }}</td>
                    <td>{{ $jt->jabatan }}</td>
                    <!-- <td>{{ $jt->nama  }}</td> -->
                    <td>
                   
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{$jt->id_jabatan}}">
                      <i class="fas fa-edit"></i>
                      </button>
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $jt->id_jabatan }}">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                         </td>
                  </tr>
                  <div class="modal fade" id="edit{{ $jt->id_jabatan }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Struktur Jabatan</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{url('ListJabatan/edit/'.$jt->id_jabatan)}}" method="post" role="form" >
                          @csrf
                          <div class="card-body">
                          
                     
                     <div class="form-group">
                              <label>Jabatan</label>
                              <input type="text" class="form-control" name="nama" value="{{ $jt->jabatan  }}">
                            </div>


                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                          </div>
                        </form>

                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>

                    <div class="modal fade" id="hapus{{ $jt->id_jabatan }}">
                <div class="modal-dialog">
                  <div class="modal-content bg-danger">
                    <div class="modal-header">
                      <h4 class="modal-title">Hapus Data Struktur Jabatan</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p> Apakah anda yakin ingin menghapus Struktur Jabatan <b>{{ $jt->jabatan}}</b>? </p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                      <a href="{{ url('ListJabatan/hapus/'.$jt->id_jabatan) }}" type="button" class="btn btn-outline-light">Hapus</a>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>

                  @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
</section>
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Struktur Jabatan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="{{url('ListJabatan/create')}}" id="jabatancreate" method="post" role="form" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
               <!-- <div class="form-group">
                  <label>Pilih Jabatan</label>
                  <select name="id_jabatan" class="form-control select2" style="width: 100%;">
                    <option  >Pilih Jabatan </option>
                    @foreach ($listjabatan as $datash)
                    <option  value="{{$datash->id_jabatan}}">{{$datash->jabatan}} </option>
                    @endforeach
                    </select>
                </div> -->
               
                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" class="form-control" name="nama">
                </div>
               </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
         

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

    


      <!-- /.modal -->

@endsection


@section('js')

<!-- DataTables -->
<script src="{{ url('admin/adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ url('admin/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection
