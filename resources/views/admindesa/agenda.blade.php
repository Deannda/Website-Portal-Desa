@extends('../layout_admin/master')
@section('css')
  <link rel="stylesheet" href="{{ url('admin/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{ url('admin/adminlte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ url('admin/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ url('admin/adminlte/plugins/daterangepicker/daterangepicker.css') }}">

@endsection


@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agenda Desa</h1>
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
            <button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square"></i>&ensp;Tambah Agenda</button>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th><center>No</th><center>
                  <th><center>Agenda</th><center>
                  <th><center>Lokasi Pelaksanaan</th><center>
                  <!-- <th><center>Agenda</th><center> -->
                  <th><center>Waktu Pelaksanaan</th><center>
                  <th><center>Action</th><center>
                </tr>
                </thead>
                <tbody>
                  @foreach($agenda as $key => $jt)
                  <tr>
                    <td><center> {{ ++$key }}</center></td>
                    <td>{{ $jt->agenda }}</td>
                    <td>{{ $jt->tempat_pelaksanaan  }}</td>
                    <td>{{ $jt->waktu_pelaksanaan  }}</td>
                    <td>
                   
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{$jt->id_agenda}}">
                      <i class="fas fa-edit"></i>
                      </button>
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $jt->id_agenda }}">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                         </td>
                  </tr>
                  <div class="modal fade" id="edit{{ $jt->id_agenda }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Agenda</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{url('agenda/edit/'.$jt->id_agenda)}}" method="post" role="form" >
                          @csrf
                          <div class="card-body">
                            
                     
                     <div class="form-group">
                              <label>Agenda</label>
                              <input type="text" class="form-control" name="agenda" value="{{ $jt->agenda  }}">
                            </div>

                     <div class="form-group">
                              <label>Lokasi Pelaksanaan</label>
                              <input type="text" class="form-control" name="tempat_pelaksanaan" value="{{ $jt->tempat_pelaksanaan  }}">
                            </div>


                     <div class="form-group">
                              <label>Waktu Pelaksanaan</label>
                              <input type="text" class="form-control" name="waktu_pelaksanaan" value="{{ $jt->waktu_pelaksanaan  }}">
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

                   <div class="modal fade" id="hapus{{ $jt->id_agenda }}">
                <div class="modal-dialog">
                  <div class="modal-content bg-danger">
                    <div class="modal-header">
                      <h4 class="modal-title">Hapus Agenda</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p> Apakah anda yakin ingin menghapus Agenda <b>{{ $jt->agenda}}</b>? </p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                      <a href="{{ url('agenda/hapus/'.$jt->id_agenda) }}" type="button" class="btn btn-outline-light">Hapus</a>
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
              <h4 class="modal-title">Tambah Agenda</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form action="{{url('agenda/create')}}" id="agendacreate" method="post" role="form" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
              
                     <div class="form-group">
                              <label>Agenda</label>
                              <input type="text" class="form-control" name="agenda">
                            </div>

                     <div class="form-group">
                              <label>Lokasi Pelaksanaan</label>
                              <input type="text" class="form-control" name="tempat_pelaksanaan">
                            </div>


                     <div class="form-group">
                              <label>Waktu Pelaksanaan</label>
                              <input type="text" class="form-control" name="waktu_pelaksanaan">
                            </div>

                             <!-- Date and time range -->
              <!--   <div class="form-group">
                  <label>Date and time range:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="text" class="form-control float-right" id="reservationtime">
                  </div>
                  
                </div> -->
                <!-- /.form group -->

                <!-- Date and time range -->
                <!-- <div class="form-group">
                  <label>Date range button:</label>

                  <div class="input-group">
                    <button type="button" class="btn btn-default float-right" id="daterange-btn">
                      <i class="far fa-calendar-alt"></i> Date range picker
                      <i class="fas fa-caret-down"></i>
                    </button>
                  </div>
                </div> -->
                <!-- /.form group -->
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

<!-- date-range-picker -->
<script src="{{ url('admin/adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>

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
