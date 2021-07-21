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
            <h1>Suara Warga</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Suara Warga</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>NIK</th>
                  <th><center>Nama</th>
                  <th><center>Isi Tanggapan</center></th>
                  <th><center>Action</center></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($suarawarga as $key => $data)
                  <tr>
                    <td> <center>{{++$key}}</center></td>
                    <td>{{ $data->penduduk[0]->nik }}</td>
                    <td>{{ $data->penduduk[0]->nama }}</td>
                    <td>{{ $data->isi_tanggapan }}</td>
                    <td><center>
                       <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $data->id_suara_warga }}">
                      <i class="fas fa-trash-alt"></i>
                      </button>
                    </center>
                    </td>
                  </tr>

                   <div class="modal fade" id="hapus{{ $data->id_suara_warga }}">
                    <div class="modal-dialog">
                      <div class="modal-content bg-danger">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus Tanggapan</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p> Apakah anda yakin ingin menghapus Tanggapan Ini? </p>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                          <a href="{{ url('Suara_warga/hapus/'.$data->id_suara_warga) }}" type="button" class="btn btn-outline-light">Hapus</a>
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
      

       
      <!-- /.modal -->

      <!-- /.row -->
</section>
@endsection


@section('js')
<!-- DataTables -->

<script src="{{ url('admin/adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ url('admin/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="datepicker/js/bootstrap-datepicker.min.js"></script>
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
<!-- <script src="{{ asset('admin/adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script> -->

@endsection