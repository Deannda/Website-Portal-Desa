@extends('../layout_admin/master2')
@section('css')
<link rel="{{ asset('stylesheet" href="admin/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="{{ asset('stylesheet" href="admin/adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="{{ asset('stylesheet" href="datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="{{ asset('stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
<link rel="{{ asset('stylesheet" href="admin/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="{{ asset('stylesheet" href="admin/adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
<link rel="{{ asset('stylesheet" href="admin/adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
<link rel="{{ asset('stylesheet" href="admin/adminlte/dist/css/adminlte.min.css') }}">
<link rel="{{ asset('stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet') }}">
<link rel="stylesheet" href="admin/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('admin/adminlte/plugins/summernote/summernote-bs4.css')}}">
@endsection

@section('content')




<!-- Main content -->
<section class="content">
	<!-- SELECT2 EXAMPLE -->
        

            <div class="card card-info">
              <div class="card-header">
              	
                <h3 class="card-title">Tambah Anggaran</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->


              <form class="form-horizontal" action="{{ url('Anggaran/action_create') }}" method="post" role="form" enctype="multipart/form-data" >
              	 @csrf
                <div class="card-body">
                  <!-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Anggaran</label>
                    <div class="col-sm-10">
                     <input type="text" class="form-control" name="tahun_anggaran" required="">
                    </div>
                  </div> -->
                     
                     <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Anggaran</label>
                    <div class="col-sm-3">
                    <select name="tahun_anggaran" class="form-control select2">
                <option>Pilih Tahun</option>
                <?php
                $thn_dpn = 2050;
                for ($thn_skr = 2015; $thn_skr <=$thn_dpn ; $thn_skr++) {
                  ?>
                  <option value="<?php echo $thn_skr ?>"><?php echo $thn_skr ?></option>
                  <?php
                }
                ?>
              </select>
               </div>
                  </div>

                           <div class="form-group row">
                               <label class="col-sm-2 col-form-label">Detail Anggaran</label>
                              <div class="col-sm-10">
                               <textarea  class="konten form-control" name="detail"  rows="3" cols="10"></textarea>
                              <!-- <input type="text" class="form-control" name="kode_pos"  required=""> -->
                            </div>
                          </div> 

                           

                             @foreach($desa as $key => $desaa)
                            <input type="hidden" name="id_desa" value="{{ $desaa->id_desa }}">
                            @endforeach
                          <!--  <div class="form-group row">
                               <label class="col-sm-2 col-form-label" for="exampleInputFile">Gambar</label>
                               <div class="col-sm-10">
                                 <input type="file" name="gambar" >
                            </div></div>   -->
                           
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Tambahkan Anggaran</button>
                  <!-- <button type="button" class="btn btn-default float-right">Cancel</button> -->
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
    <!-- /.card-header -->
            
     


        </section>


@endsection

        <!-- /.card -->
@section('js')
        <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>

<script src="{{ asset('admin/adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script>
 $(document).ready(function(){

    // Summernote
    $('.konten').summernote();
  })
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
@endsection