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
            <h1>Artikel/Berita</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Artikel/Berita</li>
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
                <a class="btn bg-gradient-primary btn-sm" href="{{ url('Artikel/create') }}" role="button"><i class="fas fa-plus-square"></i>Artikel</a>
             <!--  <button type="button" class="btn bg-gradient-primary btn-sm" href="{{ url('Artikel/create') }}"><i class="fas fa-plus-square"></i> Artikel</button> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th><center>No</th><center>
                  <th><center>Judul Artikel</th><center>
                  <th><center>Gambar</th><center>
                  <th><center>Created</th><center>
                  <th><center>Updated</th><center>
                  <th><center>Action</th><center>
                </tr>
                </thead>
                <tbody>
                  @foreach($artikel as $key => $datas)
                  <tr>
                    <td><center> {{ ++$key }}</center></td>
                    <td>{{ $datas->judul }}</td>
                    <td><img src="{{ url('storage/gambar/'. $datas->gambar) }}" height="50" width="50"></td>
                    <td>{{ $datas->created_at }}</td>
                    <td>{{ $datas->updated_at }}</td>
                    <td>
                      
                      <!-- <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#details{{ $datas->id_artikel }}">
                      <i class="fas fa-info"></i>
                      </button> -->

                        <a class="btn btn-warning btn-sm"  href="{{ url('Artikel/edit/'.$datas->id_artikel) }}" role="button"><i class="fas fa-edit"></i></a>
                       <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $datas->id_artikel }}">
                      <i class="fas fa-trash-alt"></i>
                      </button>
                    
                    </td>
                  </tr>


                  <div class="modal fade" id="edit{{ $datas->id_artikel }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Artikel</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ url('Artikel/edit/'.$datas->id_artikel) }}" method="post" role="form" enctype="multipart/form-data">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label>Judul</label>
                              <input type="text" class="form-control" name="judul" value="{{ $datas->judul }}" required="">
                            </div>   
                             <div class="form-group">
                              <label>Isi</label>
                              <textarea   class="konten form-control" name="isi"  rows="3" cols="10">{{ $datas->isi }}</textarea>
                            </div>  
                            <input type="hidden" name="logo1" value="{{ $datas->gambar }}">
                            <div class="form-group">
                                <label for="exampleInputFile">Gambar</label><br>
                                 <input type="file" name="gambar" >
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

                   <div class="modal fade" id="hapus{{ $datas->id_artikel }}">
                    <div class="modal-dialog">
                      <div class="modal-content bg-danger">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus Artikel</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p> Apakah anda yakin ingin menghapus Artikel Ini? </p>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                          <a href="{{ url('Artikel/hapus/'.$datas->id_artikel) }}" type="button" class="btn btn-outline-light">Hapus</a>
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
<script type="text/javascript">

    // sesuiakan dengan id yang ada pada form
    $('#artikelcreate').validate({
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