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
				<h1>Perangkat Desa</h1>
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
					<button type="button" class="btn bg-gradient-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square"></i>&ensp;Tambah Perangkat Desa</button>

				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example1" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th><center>No</center></th>
								<th><center>Jabatan</center></th>
								<th><center>Nama</center></th>
								<th><center>Periode Jabatan</center></th>
								<th><center>Foto</center></th>
								<th><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
							@foreach($dataJabatan as $key => $jt)
							<tr>
								<td> <center>{{ ++$key }}</center></td>
								<td>{{ $jt->jabatan[0]->jabatan }}</td>
								<td>{{ $jt->nama  }}</td>
								<td><center>{{ $jt->periode_awal }}&nbsp;-&nbsp;{{ $jt->periode_akhir }}</center></td>
								<td>

									@if(($jt->foto == 'null') or ($jt->foto == '0'))
									- 

									@else
									<img src="{{ url('storage/foto_kades/'. $jt->foto) }}" height="80" width="80">
									@endif

									

								</td>
								<td>
									<center>
										<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{$jt->id_tupoksi}}">
											<i class="fas fa-edit"></i>
										</button>
										<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $jt->id_tupoksi }}">
											<i class="fas fa-trash-alt"></i>
										</button>
									</center>
								</td>
							</tr>
							<div class="modal fade" id="edit{{ $jt->id_tupoksi }}">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Edit Perangkat Desa</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form action="{{url('jabatan/edit/'.$jt->id_tupoksi)}}" method="post" role="form" enctype="multipart/form-data">
											@csrf
											<div class="card-body">
                            <!-- <div class="form-group">
                              <label>Jabatan</label>
                              <input type="text" class="form-control" name="tupoksi" value="{{$jt->jabatan[0]->jabatan }}" required="on">
                          </div> -->

                          <div class="form-group">
                          	<label>Nama Lengkap</label>
                          	<input type="text" class="form-control" name="nama" value="{{ $jt->nama  }}">
                          </div>

                          <div class="form-group">
                          	<label>Periode Awal</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Periode Akhir</label>

                          	<div class="input-group">
                          		<select name="tahun_awal">
                          			<option value="">Pilih Tahun</option>
                          			<?php
                          			$thn_dpn = 2050;
                          			for ($thn_skr = 2015; $thn_skr <=$thn_dpn ; $thn_skr++) {
                          				?>
                          				<option value="<?php echo $thn_skr ?>"><?php echo $thn_skr ?></option>
                          				<?php
                          			}
                          			?>
                          		</select>
                          		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          		<select name="tahun_akhir">
                          			<option value="">Pilih Tahun</option>
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
                          <input type="hidden" name="logo1" value="{{ $jt->foto }}">
                          
                          <div class="form-group">
                          	<label for="exampleInputFile">Foto</label><br>
                          	<img src="{{ url('storage/foto_kades/'. $jt->foto) }}" height="60" width="60">
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

      <div class="modal fade" id="hapus{{ $jt->id_tupoksi }}">
      	<div class="modal-dialog">
      		<div class="modal-content bg-danger">
      			<div class="modal-header">
      				<h4 class="modal-title">Hapus Data Struktur Jabatan</h4>
      				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">&times;</span>
      				</button>
      			</div>
      			<div class="modal-body">
      				<p> Apakah anda yakin ingin menghapus Perangkat Desa <b>{{ $jt->nama}}</b>? </p>
      			</div>
      			<div class="modal-footer justify-content-between">
      				<button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
      				<a href="{{ url('jabatan/hapus/'.$jt->id_tupoksi) }}" type="button" class="btn btn-outline-light">Hapus</a>
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
				<h4 class="modal-title">Tambah Perangkat Desa</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{url('jabatan/create')}}" id="jabatancreate" method="post" role="form" enctype="multipart/form-data" id="pdcreate">
				@csrf
				<div class="card-body">
					<div class="form-group">
						<label>Pilih Jabatan</label>
						<select name="id_jabatan" class="form-control select2" style="width: 100%;">
							<option  >Pilih Jabatan </option>
							@foreach ($listjabatan as $datash)
							<option  value="{{$datash->id_jabatan}}">{{$datash->jabatan}} </option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" class="form-control" name="nama">
					</div>

					<div class="form-group">
						<label>Periode Awal</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Periode Akhir</label>

						<div class="input-group">
							<select name="tahun_awal">
								<option value="">Pilih Tahun</option>
								<?php
								$thn_dpn = 2050;
								for ($thn_skr = 2015; $thn_skr <=$thn_dpn ; $thn_skr++) {
									?>
									<option value="<?php echo $thn_skr ?>"><?php echo $thn_skr ?></option>
									<?php
								}
								?>
							</select>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<select name="tahun_akhir">
								<option value="">Pilih Tahun</option>
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

					<!-- <input type="hidden" name="logo1" value="{{ $jt->foto }}"> -->

					<div class="form-group">
						<label for="exampleInputFile">Foto</label><br>
						<input type="file" name="gambar" id="" onchange="upload('file_gambar_perangkat')" id="file_gambar_perangkat" >

						<span class="pesan" style="display:none"><h6><code>Maksimal Ukuran File 2MB</code></h6></span>

					</div> 



				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary" id="button_gambar_perangkat"> Simpan</button>
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

	$('#pdcreate').validate({
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


	function upload(id){
		if ($('#'+id)[0].files[0].size > 2097152) {
			$('#button_'+id).prop('disabled', true);
			$('.pesan').show()
		} else {
			$('.pesan').hide()
			$('#button_'+id).prop('disabled', false);
		}

	}


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
