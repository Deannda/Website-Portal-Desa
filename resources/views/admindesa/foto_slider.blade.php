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
            <h1>Galeri Foto Slider</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Galeri Foto Slider</li>
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
            	 <button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square"></i>&ensp;Tambah Foto Slider</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <!-- <th><center>No</center></th> -->
                  <th><center>Foto</center></th>
                  
                 
                  <th><center>Action</center></th>
                </tr>
                </thead>
                <tbody>
                  @foreach($foto as $key => $datas)
                  <tr>
                    <!-- <td> <center>{{ ++$key }}</center></td> -->
                    <!-- <td><a data-toggle="modal" href="#details{{ $datas->id_foto }}">{{ $datas->judul }}</a></td> -->
                    <td><center><img src="{{ url('storage/gambar/'. $datas->foto) }}" height="80" width="80"></center></td>
                   
                    <td><center><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $datas->id_foto }}">
                      <i class="fas fa-trash-alt"></i>
                      </button>
                    </center>
                    </td>
                  </tr>

                  
                 
                   <div class="modal fade" id="hapus{{ $datas->id_foto }}">
                    <div class="modal-dialog">
                      <div class="modal-content bg-danger">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus Foto</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p> Apakah anda yakin ingin menghapus Foto Ini? </p>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                          <a href="{{ url('foto_slider/hapus/'.$datas->id_foto) }}" type="button" class="btn btn-outline-light">Hapus</a>
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
              <h4 class="modal-title">Tambah Foto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('foto_slider/create') }}" id="foto_slider_create" method="post" role="form" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputFile">Foto</label><br>
                     <input type="file" name="gambar" >
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
    $('#foto_slider_create').validate({
        rules: {
            // id_kk sesuaikan dengan name yang ada pada input
            judul : {
                required:true
            },
            isi : {
                required:true
            },
            gambar : {
                required: true

            },
            
        },
        // messages berfungsi untuk mengcustom pesan peringatan pada inputan
        messages:{
            // id_kk sesuaikan dengan name pada input
            judul : {
                required: "judul tidak boleh kosong"
            },
            isi: {
                required: "isi tidak boleh kosong"
            },
            gambar : {
                required: "gambar tidak boleh kosong"
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

@endsection