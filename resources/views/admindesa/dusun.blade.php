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
            <h1>Wilayah Administratif</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Wilayah Administratif</li>
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
                
            <button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square"></i>&ensp;Tambah Dusun</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th><center>No</th><center>
                  <th><center>Dusun</th><center>
                  <th><center>Kepala Dusun</th><center>
                  <th><center>Jumlah RT</th><center>
                  <th><center>Jumlah KK</th><center>
                  <th><center>Jumlah Penduduk</th><center>
                  <th><center>Action</th><center>
                </tr>
                </thead>
                <tbody>
                  @foreach($datadusun as $key => $datas)
                  <tr>
                    <td><center> {{ ++$key }}</center></td>
                    <td>{{ $datas->nama_dusun }}</td>
                    <td>{{ $datas->kepala_dusun }}</td>
                    <td>{{ $datas->jumlah_rt }}</td>
                    <td>{{ $datas->jumlah_kk }}</td>
                    <td>{{ $datas->jumlah_penduduk }}</td>
                    
                   
                    <td>
                      
                     
                       <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{$datas->id_dusun}}">
                      <i class="fas fa-edit"></i>
                      </button>
                       <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $datas->id_dusun }}">
                      <i class="fas fa-trash-alt"></i>
                      </button>
                    
                    </td>
                  </tr>


                  <div class="modal fade" id="edit{{ $datas->id_dusun }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Dusun</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ url('Wilayahadministratif/edit/'.$datas->id_dusun) }}" method="post" role="form" enctype="multipart/form-data">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label>Nama Dusun</label>
                              <input type="text" class="form-control" name="nama_dusun" value="{{ $datas->nama_dusun }}" required="">
                            </div>   
                              <div class="form-group">
                              <label>Kepala Dusun</label>
                              <input type="text" class="form-control" name="kepala_dusun" value="{{ $datas->kepala_dusun }}" required="">
                            </div>
                             <div class="form-group">
                              <label>Jumlah RT</label>
                              <input type="text" class="form-control" name="jumlah_rt" value="{{ $datas->jumlah_rt }}" required="">
                            </div> 
                             <div class="form-group">
                              <label>Jumlah KK</label>
                              <input type="text" class="form-control" name="jumlah_kk" value="{{ $datas->jumlah_kk }}" >
                            </div> 
                             <div class="form-group">
                              <label>Jumlah Penduduk</label>
                              <input type="text" class="form-control" name="jumlah_penduduk" value="{{ $datas->jumlah_penduduk }}" >
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

                   <div class="modal fade" id="hapus{{ $datas->id_dusun }}">
                    <div class="modal-dialog">
                      <div class="modal-content bg-danger">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus Dusun</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p> Apakah anda yakin ingin menghapus Dusun Ini? </p>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                          <a href="{{ url('Wilayahadministratif/hapus/'.$datas->id_dusun) }}" type="button" class="btn btn-outline-light">Hapus</a>
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
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Dusun</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('Wilayahadministratif/create') }}" id="dusuncreate" method="post" role="form" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
              <div class="form-group">
                              <label>Nama Dusun</label>
                              <input type="text" class="form-control" name="nama_dusun"  required="">
                            </div>   
                              <div class="form-group">
                              <label>Kepala Dusun</label>
                              <input type="text" class="form-control" name="kepala_dusun" required="">
                            </div>
                             <div class="form-group">
                              <label>Jumlah RT</label>
                              <input type="text" class="form-control" name="jumlah_rt"  required="">
                            </div>    
                            <div class="form-group">
                              <label>Jumlah KK</label>
                              <input type="text" class="form-control" name="jumlah_kk"  required="">
                            </div>    
                            <div class="form-group">
                              <label>Jumlah Penduduk</label>
                              <input type="text" class="form-control" name="jumlah_penduduk"  required="">
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
@endsection


@section('js')
<!-- DataTables -->
<script type="text/javascript">

    // sesuiakan dengan id yang ada pada form
    $('#dusuncreate').validate({
        rules: {
            // id_kk sesuaikan dengan name yang ada pada input
            nama_dusun : {
                required:true
            },
            kepala_dusun : {
                required:true
            },
            jumlah_rt : {
                required: true

            },
            
        },
        // messages berfungsi untuk mengcustom pesan peringatan pada inputan
        messages:{
            // id_kk sesuaikan dengan name pada input
            nama_dusun : {
                required: "Nama Dusun tidak boleh kosong"
            },
            kepala_dusun: {
                required: "Kepala Dusun tidak boleh kosong"
            },
            jumlah_rt : {
                required: "Jumlah RT tidak boleh kosong"
            },
            
        },
        
        // yang dibawah gak perlu diedit
        errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
    });
</script>
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
<script type="text/javascript">
    $(document).ready(function () {
        $('#datemask').datepicker({
            format: 'yyyy',
            viewMode: "years", 
            minViewMode: "years"
        });
    });
</script>


<!-- <script src="{{ asset('admin/adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script> -->


@endsection