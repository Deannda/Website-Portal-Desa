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
			
			<h3 class="card-title">Tambah Artikel</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->


		<form class="form-horizontal" action="{{ url('Artikel/action_create') }}" id="artikelcreate" method="post" role="form" enctype="multipart/form-data" >
			@csrf
			<div class="card-body">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Judul Artikel</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="judul" required="">
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Isi Artikel</label>
					<div class="col-sm-10">
						<textarea  class="konten form-control" name="isi"  rows="3" cols="10"></textarea>
						<!-- <input type="text" class="form-control" name="kode_pos"  required=""> -->
					</div></div> 
					@foreach($desa as $key => $desaa)
					<input type="hidden" name="id_desa" value="{{ $desaa->id_desa }}">
					@endforeach
					<div class="form-group row">
						<label class="col-sm-2 col-form-label" for="exampleInputFile">Cover Artikel</label>
						<div class="col-sm-10">
							<input type="file" name="gambar" >
						</div></div>  
						
						
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<button type="submit" class="btn btn-info">Tambahkan Artikel</button>
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

		<script type="text/javascript">

			$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
    	theme: 'bootstrap4'
    })

});


			$('#artikelcreate').validate({
				rules: {
					
					gambar : {
						required:true
					},
				},
        // messages berfungsi untuk mengcustom pesan peringatan pada inputan
        messages:{
            // id_kk sesuaikan dengan name pada input
            gambar : {
            	required: "Gambar tidak boleh kosong"
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

<script src="{{ asset('admin/adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script>
	$(document).ready(function(){

    // Summernote
    $('.konten').summernote();
})
</script>
@endsection