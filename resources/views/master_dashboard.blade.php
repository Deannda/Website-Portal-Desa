<!DOCTYPE html>
<html lang="en-US">
@include('layout.header')
@yield('js')
<body>
	<!-- Page loader -->

	<!-- header section start -->
	@include('layout.navbar')
	<!-- slider section start -->
	@yield('slider')
	<section class="content-stick paddingg">
		<div class="container">
			<div class="row">
				@yield('content')

				@include('layout.sidebar_dashboard')
			</div>
		</div>
	</section>

	@yield('extfooter')

	@include('layout.footer')

	@include('layout.script')



</body>

<script type="text/javascript">

	$(document).ready(function(){
		$('#jenisSurat').change(function(){
			let html = '';

			if($('#jenisSurat').val()==="")
				{location.reload()}
			
			// angka 2 didapat dari idjenis surat dari db jenis surat
			if ($('#jenisSurat').val() === '2') {
				html += `
				<div class="col-lg-12">

				<div class="card">

				<div class="card-body">


				<form action="{{ url('situ') }}" method="POST" enctype="multipart/form-data">
				<!-- @csrf dibuat di setiap form ya jgn lupa -->
				@csrf

				<div class="form-body">

				<h3 class="card-title">Permohonan Surat SITU (Izin Tempat Usaha)</h3>
				<code><strong><u>lampiran syarat: KTP & KK yang masih berlaku</u></strong></code>
				<hr>
				<div class="row">
				@if(isset($situError))
				<div class="alert alert-{{ $situstatus }}">
				<div>{{ $situError }}</div>
				</div>
				@endif
				</div>
				<div class="row p-t-20">

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>


				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</div>
				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Alamat Usaha </label>

				<input type="text" id="" name="alamat_usaha" class="form-control form-control-danger" placeholder="input alamat usaha">

				</div>

				</div>

				<div class="col-md-6">
				<div class="form-group has-success">

				<label class="control-label">Luas Usaha </label>

				<input type="text" id="" name="luas_usaha" class="form-control form-control-danger" placeholder="input luas usaha">

				</div>


				</div>

				<div class="col-md-12">

				<div class="form-group has-success">

				<label for="exampleInputFile">Upload Lampiran Syarat</label><br>

				<h6><code>Lampiran Syarat dibuat menjadi satu file dalam format pdf </code></h6>

				<input type="file" onchange="upload('file_syarat_situ')" id="file_syarat_situ" name="file_syarat" >
				<span class="pesan" style="display:none"><h6><code>Maksimal Ukuran File 2MB</code></h6></span>

				</div>

				</div>





				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success" id="button_file_syarat_situ" > <i class="fa fa-check"></i>Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>`;
			}

			if ($('#jenisSurat').val() === '3') {
				html += `<div class="col-lg-12">                                

				<div class="card">

				<div class="card-body">

				<form action="{{ url('kematian') }}" method="POST" enctype="multipart/form-data">

				@csrf

				<div class="form-body">

				<h3 class="card-title">Permohonan Surat Keterangan Kematian</h3>

				<hr>

				<div class="row">
				@if(isset($kematianError))
				<div class="alert alert-{{ $kematianstatus }}">
				<div>{{ $kematianError }}</div>
				</div>
				@endif
				</div>

				<div class="row p-t-20">

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>
				</div>


				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK Pasangan</label>

				<input type="text" name="pasangan" onkeyup="nikPasangan()" class="form-control nikkpasangan form-control-danger" placeholder="input nik pasangan">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama_pasangan" id="nama_pasangan" disabled="">

				</select>
				</div>
				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label class="control-label">Tanggal Kematian</label>

				<input type="date" name="tanggal_kematian" class="form-control" placeholder="dd/mm/yyyy">

				</div>

				</div>


				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Tempat Kematian</label>

				<input type="text" id="" name="tempat_kematian" class="form-control" placeholder="input tempat kematian">

				</div>

				</div>

				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>`;		
			}
			if ($('#jenisSurat').val() === '9') {
				html += `
				<div class="col-lg-12">

				<div class="card">

				<div class="card-body">


				<form action="{{ url('sktm') }}" method="POST" enctype="multipart/form-data">
				<!-- @csrf dibuat di setiap form ya jgn lupa -->
				@csrf

				<div class="form-body">

				<h3 class="card-title">Permohonan Surat Keterangan Tidak Mampu Untuk Berobat/Persalinan</h3>

				<hr>
				<div class="row">
				@if(isset($SKTMError))
				<div class="alert alert-{{ $SKTMstatus }}">
				<div>{{ $SKTMError }}</div>
				</div>
				@endif
				</div>
				<div class="row p-t-20">

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup='ortu()' class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>
				</div>

				<div class="col-md-6">
				<div class="form-group">
				<label>Anak Dari</label>
				<!-- //untuk menampilkan nama ortu -->
				<input class="form-control" type="text" id="namaortua" disabled="">
				<!-- untuk menyimpan nik ortu type hidden jadi gak tampil di form -->
				<input type="hidden" name="nika" id="nikortu">
				</select>
				</div>
				</div>


				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Digunakan Untuk </label>

				<input type="text" id="" name="fungsi" class="form-control form-control-danger" placeholder="input tujuan surat">

				</div>

				</div>

				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>`;
			}

			if ($('#jenisSurat').val() === '6') {
				html += `<div class="col-lg-12">                                

				<div class="card">

				<div class="card-body">

				<form action="{{ url('bedanama') }}" method="POST" enctype="multipart/form-data">

				@csrf

				<div class="form-body">

				<h3 class="card-title">Permohonan Surat Keterangan Beda Nama</h3>

				<hr>

				<div class="row">
				@if(isset($bedanamaError))
				<div class="alert alert-{{ $bedanamastatus }}">
				<div>{{ $bedanamaError }}</div>
				</div>
				@endif
				</div>

				<div class="row p-t-20">
				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>
				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label>Keterangan Kesalahan</label>

				<textarea class="form-control" name="keterangan_kesalahan" rows="5"></textarea>

				</div>

				</div>

				<div class="col-md-12">

				<div class="form-group has-success">

				<label for="exampleInputFile">Upload Lampiran Syarat</label><br>

				<h6><code>Lampiran Syarat dibuat menjadi satu file dalam format pdf </code></h6>

				<input type="file" onchange="upload('file_syarat_bedanama')" id="file_syarat_bedanama" name="file_syarat" >
				<span class="pesan" style="display:none"><h6><code>Maksimal Ukuran File 2MB</code></h6></span>

				</div>

				</div>


				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success" id="button_file_syarat_bedanama" > <i class="fa fa-check"></i>Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>`;

			}

			if ($('#jenisSurat').val() === '14') {
				html += `<div class="col-lg-12">

				<div class="card">

				<div class="card-body">

				<form action="{{ url('jalan') }}" method="POST" enctype="multipart/form-data">

				@csrf

				<div class="form-body">

				<h3 class="card-title">Permohonan Surat Keterangan Jalan</h3>

				<hr>

				<div class="row">
				@if(isset($keteranganjalanError))
				<div class="alert alert-{{ $keteranganjalanstatus }}">
				<div>{{ $keteranganjalanError }}</div>
				</div>
				@endif
				</div>

				<div class="row p-t-20">
				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>
				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Desa/Kelurahan </label>

				<input type="text" id="" name="desa_kel" class="form-control form-control-danger" placeholder="input desa/kelurahan tujuan ">

				</div>

				</div>


				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Kecamatan </label>

				<input type="text" id="" name="kec" class="form-control form-control-danger" placeholder="input kecamatan tujuan ">

				</div>

				</div>


				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Kabupaten/Kota </label>

				<input type="text" id="" name="kab" class="form-control form-control-danger" placeholder="input kabupaten/kota tujuan ">

				</div>

				</div>


				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Provinsi </label>

				<input type="text" id="" name="prov" class="form-control form-control-danger" placeholder="input provinsi tujuan ">

				</div>

				</div>


				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Tujuan Perjalanan </label>

				<input type="text" id="" name="tujuan_perjalanan" class="form-control form-control-danger" placeholder="input tujuan perjalanan  ">

				</div>

				</div>


				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Jumlah Pengikut </label>

				<input type="text" id="" name="jumlah_pengikut" class="form-control form-control-danger" placeholder="input jumlah pengikut ">

				</div>

				</div>


				<div class="col-md-6">

				<div class="form-group has-success">

				<label>Keterangan Pengikut</label>

				<textarea class="form-control" name="keterangan_pengikut" rows="5"></textarea>

				</div>

				</div>



				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Ajukan permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>`;

			}


			if ($('#jenisSurat').val() === '18') {
				html += `<div class="col-lg-12">                                    

				<div class="card">

				<div class="card-body">

				<form action="{{ url('izinkeramaian') }}" method="POST" enctype="multipart/form-data">

				@csrf

				<div class="form-body">

				<h3 class="card-title">Permohonan Surat Izin Hiburan/Keramaian</h3>

				<hr>

				<div class="row">
				@if(isset($izinkeramaianError))
				<div class="alert alert-{{ $izinkeramaianstatus }}">
				<div>{{ $izinkeramaianError }}</div>
				</div>
				@endif
				</div>

				<div class="row p-t-20">
				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>
				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Kepada </label>

				<input type="text" id="" name="kepada" class="form-control form-control-danger" placeholder="input tujuan surat">

				</div>

				</div>


				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Di </label>

				<input type="text" id="" name="di" class="form-control form-control-danger" placeholder="input tempat tujuan ">

				</div>

				</div>


				<!--        <div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Lampiran </label>

				<input type="text" id="" name="lampiran" class="form-control form-control-danger" placeholder="input lampiran">

				</div>

				</div> -->


				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Acara </label>

				<input type="text" id="" name="acara" class="form-control form-control-danger" placeholder="input acara yang akan diselenggarakan ">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label class="control-label">Tanggal Acara</label>

				<input type="date" class="form-control" name="tanggal_acara" placeholder="dd/mm/yyyy">

				</div>

				</div>


				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Waktu </label>

				<input type="text" id="" name="waktu_acara" class="form-control form-control-danger" placeholder="input waktu acara  ">

				</div>

				</div>


				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Tempat </label>

				<input type="text" id="" name="tempat_acara" class="form-control form-control-danger" placeholder="input tempat acara ">

				</div>

				</div>

				<div class="col-md-12">

				<div class="form-group has-success">

				<label for="exampleInputFile">Upload Lampiran Syarat</label><br>

				<h6><code>Lampiran Syarat dibuat menjadi satu file dalam format pdf </code></h6>

				<input type="file" onchange="upload('file_syarat_keramaian')" id="file_syarat_keramaian" name="file_syarat" >
				<span class="pesan" style="display:none"><h6><code>Maksimal Ukuran File 2MB</code></h6></span>

				</div>

				</div>

				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success" id="button_file_syarat_keramaian" > <i class="fa fa-check"></i>Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>`;
			}


			if ($('#jenisSurat').val() === '13') {
				html += `<div class="col-lg-12">                                   

				<div class="card">

				<div class="card-body">

				<form action="{{ url('imb') }}" method="POST" enctype="multipart/form-data">
				@csrf

				<div class="form-body">

				<h3 class="card-title">Data Permohonan Surat IMB (Izin Mendirikan Bangunan)</h3>

				<hr>

				<div class="row">
				@if(isset($IMBError))
				<div class="alert alert-{{ $IMBstatus }}">
				<div>{{ $IMBError }}</div>
				</div>
				@endif
				</div>

				<div class="row p-t-20">

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>
				</div>


				<!--  <div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> lampiran </label>

				<input type="text" id="" name="lampiran" class="form-control form-control-danger" placeholder="input jumlah lampiran ">

				</div>

				</div> -->

				<div class="col-md-12">

				<div class="form-group has-success">

				<label for="exampleInputFile">Upload Lampiran Syarat</label><br>

				<h6><code>Lampiran Syarat dibuat menjadi satu file dalam format pdf </code></h6>

				<input type="file" onchange="upload('file_syarat_imb')" id="file_syarat_imb" name="file_syarat" >
				<span class="pesan" style="display:none"><h6><code>Maksimal Ukuran File 2MB</code></h6></span>

				</div>

				</div>

				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success" id="button_file_syarat_imb" > <i class="fa fa-check"></i>Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>`;
			}
			if ($('#jenisSurat').val() === '8') {
				html += `                                    <div class="col-lg-12">

				<div class="card">

				<div class="card-body">


				<form action="{{ url('ktp') }}" method="POST" enctype="multipart/form-data">

				@csrf

				<div class="form-body">

				<h3 class="card-title">Data Permohonan Surat KTP</h3>

				<hr>

				<div class="row">
				@if(isset($KeteranganKTPError))
				<div class="alert alert-{{ $KeteranganKTPstatus }}">
				<div>{{ $KeteranganKTPError }}</div>
				</div>
				@endif
				</div>

				<div class="row p-t-20">
				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>
				</div>

				<div class="col-md-12">

				<div class="form-group has-success">

				<label for="exampleInputFile">Upload Lampiran Syarat</label><br>

				<h6><code>Lampiran Syarat dibuat menjadi satu file dalam format pdf </code></h6>

				<input type="file" onchange="upload('file_syarat_ktp')" id="file_syarat_ktp" name="file_syarat" >
				<span class="pesan" style="display:none"><h6><code>Maksimal Ukuran File 2MB</code></h6></span>



				</div>

				</div>

				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success" id="button_file_syarat_ktp" > <i class="fa fa-check"></i>Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>
				`;
			}
			if ($('#jenisSurat').val() === '16') {
				html += `<div class="col-lg-12">                                    

				<div class="card">

				<div class="card-body">

				<form action="{{ url('NonPNS') }}" method="POST" enctype="multipart/form-data">

				@csrf

				<div class="form-body">

				<h3 class="card-title">Data Permohonan Surat Keterangan Non PNS</h3>

				<hr>


				<div class="row">
				@if(isset($nonPNSError))
				<div class="alert alert-{{ $nonPNSstatus }}">
				<div>{{ $nonPNSError }}</div>
				</div>
				@endif
				</div>


				<div class="row p-t-20">
				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>
				</div>

				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Ajukan permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>`;
			}
			if ($('#jenisSurat').val() === '17') {
				html += `<div class="col-lg-12">

				<div class="card">

				<div class="card-body">

				<form action="{{ url('pindah') }}" method="POST"  enctype="multipart/form-data">

				@csrf

				<div class="form-body">

				<h3 class="card-title">Data Permohonan Surat Keterangan Pindah</h3>

				<hr>

				<div class="row">
				@if(isset($KeteranganPindahError))
				<div class="alert alert-{{ $KeteranganPindahstatus }}">
				<div>{{ $KeteranganPindahError }}</div>
				</div>
				@endif
				</div>

				<div class="row p-t-20">

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup='ortu()' class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>
				</div>

				<div class="col-md-6">
				<div class="form-group">
				<label>Kepala Keluarga</label>
				<!-- //untuk menampilkan nama ortu -->
				<input class="form-control" type="text" id="namaortua" disabled="">
				<!-- untuk menyimpan nik ortu type hidden jadi gak tampil di form -->
				<input type="hidden" name="nika" id="nikortu">
				</select>
				</div>
				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Alamat Tujuan Pindah </label>

				<input type="text" id="" name="alamat_tujuan_pindah" class="form-control form-control-danger" placeholder="input tujuan pindah ">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Jumlah Keluarga yang Pindah </label>

				<input type="text" id="" name="jumlah_keluarga_pindah" class="form-control form-control-danger" placeholder="input jumlah keluarga yang pindah ">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Anggota keluarga yang Pindah </label>

				<input type="text" id="" name="anggota_keluarga_pindah" class="form-control form-control-danger" placeholder="input anggota keluarga yang pindah ">

				</div>

				</div>

				<div class="col-md-12">

				<div class="form-group has-success">

				<label for="exampleInputFile">Upload Lampiran Syarat</label><br>

				<h6><code>Lampiran Syarat dibuat menjadi satu file dalam format pdf </code></h6>

				<input type="file" onchange="upload('file_syarat_pindah')" id="file_syarat_pindah" name="file_syarat" >
				<span class="pesan" style="display:none"><h6><code>Maksimal Ukuran File 2MB</code></h6></span>



				</div>

				</div>


				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success" id="button_file_syarat_pindah" > <i class="fa fa-check"></i>Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>`;
			}
			if ($('#jenisSurat').val() === '12') {
				html += `
				<div class="col-lg-12">

				<div class="card">

				<div class="card-body">


				<form action="{{ url('skck') }}" method="POST" enctype="multipart/form-data">
				<!-- @csrf dibuat di setiap form ya jgn lupa -->
				@csrf

				<div class="form-body">

				<h3 class="card-title">Data Permohonan Surat Pengantar SKCK</h3>

				<hr>
				<div class="row">
				@if(isset($SKCKError))
				<div class="alert alert-{{ $SKCKstatus }}">
				<div>{{ $SKCKError }}</div>
				</div>
				@endif
				</div>
				<div class="row p-t-20">

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>
				</div>

				<!--    <div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Lampiran</label>

				<input type="text" id="" name="lampiran" class="form-control" placeholder="input lampiran">

				</div>

				</div>
				-->

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Tujuan </label>

				<input type="text" id="" name="tujuan" class="form-control form-control-danger" placeholder="input tujuan surat">

				</div>

				</div>

				<div class="col-md-12">

				<div class="form-group has-success">

				<label for="exampleInputFile">Upload Lampiran Syarat</label><br>

				<h6><code>Lampiran Syarat dibuat menjadi satu file dalam format pdf </code></h6>

				<input type="file" onchange="upload('file_syarat_skck')" id="file_syarat_skck" name="file_syarat" >
				<span class="pesan" style="display:none"><h6><code>Maksimal Ukuran File 2MB</code></h6></span>

				</div>

				</div>



				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success" id="button_file_syarat_skck" > <i class="fa fa-check"></i>Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>`;
			}

			if ($('#jenisSurat').val() === '10') {
				html += `
				<div class="col-lg-12">

				<div class="card">

				<div class="card-body">


				<form action="{{ url('sktmsekolah') }}" method="POST" enctype="multipart/form-data">
				<!-- @csrf dibuat di setiap form ya jgn lupa -->
				@csrf

				<div class="form-body">

				<h3 class="card-title">Data Permohonan Surat Keterangan Tidak Mampu Untuk Keperluan Sekolah</h3>

				<hr>
				<div class="row">
				@if(isset($SKTMSekolahError))
				<div class="alert alert-{{ $SKTMSekolahstatus }}">
				<div>{{ $SKTMSekolahError }}</div>
				</div>
				@endif
				</div>
				<div class="row p-t-20">

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup='ortu()' class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>
				</div>

				<div class="col-md-6">
				<div class="form-group">
				<label>Anak Dari</label>
				<!-- //untuk menampilkan nama ortu -->
				<input class="form-control" type="text" id="namaortua" disabled="">
				<!-- untuk menyimpan nik ortu type hidden jadi gak tampil di form -->
				<input type="hidden" name="nika" id="nikortu">
				</select>
				</div>
				</div>

				<div class="col-md-6">
				<div class="form-group">
				<label>Digunakan untuk:</label>
				<input type="text" id="" name="fungsi" class="form-control form-control-danger" placeholder="input fungsi surat">
				</div>
				</div>

				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>`;
			}
			if ($('#jenisSurat').val() === '11') {
				html += `
				<div class="col-lg-12">

				<div class="card">

				<div class="card-body">


				<form action="{{ url('usaha') }}" method="POST" enctype="multipart/form-data">
				<!-- @csrf dibuat di setiap form ya jgn lupa -->
				@csrf

				<div class="form-body">

				<h3 class="card-title">Data Permohonan Surat Keterangan Usaha</h3>

				<hr>
				<div class="row">
				@if(isset($UsahaError))
				<div class="alert alert-{{ $Usahastatus }}">
				<div>{{ $UsahaError }}</div>
				</div>
				@endif
				</div>
				<div class="row p-t-20">

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>
				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Jenis Usaha </label>

				<input type="text" id="" name="jenis_usaha" class="form-control form-control-danger" placeholder="input jenis usaha">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Luas Lahan usaha </label>

				<input type="text" id="" name="luas_lahan" class="form-control form-control-danger" placeholder="input luas lahan usaha">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Alamat Usaha </label>

				<input type="text" id="" name="alamat_usaha" class="form-control form-control-danger" placeholder="input tujuan surat">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Tujuan pembuatan surat</label>

				<input type="text" id="" name="fungsi" class="form-control form-control-danger" placeholder="tujuan diajukannya permohonan surat">

				</div>

				</div>



				

				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>

				`;
			}
			if ($('#jenisSurat').val() === '5') {
				html += `
				<div class="col-lg-12">

				<div class="card">

				<div class="card-body">


				<form action="{{ url('ahliwaris') }}" method="POST" enctype="multipart/form-data">
				<!-- @csrf dibuat di setiap form ya jgn lupa -->
				@csrf

				<div class="form-body">

				<h3 class="card-title">Data Permohonan Surat Keterangan Ahli Waris</h3>

				<hr>
				<div class="row">
				@if(isset($AhliwarisError))
				<div class="alert alert-{{ $Ahliwarisstatus }}">
				<div>{{ $AhliwarisError }}</div>
				</div>
				@endif
				</div>
				<div class="row p-t-20">

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label>Keterangan Surat Ahli Waris</label>

				<textarea class="form-control" name="keterangan_ahli_waris" rows="5"></textarea>

				</div>

				</div>

				<div class="col-md-12">

				<div class="form-group has-success">

				<label for="exampleInputFile">Upload Lampiran Syarat</label><br>

				<h6><code>Lampiran Syarat dibuat menjadi satu file dalam format pdf </code></h6>

				<input type="file" onchange="upload('file_syarat_ahliwaris')" id="file_syarat_ahliwaris" name="file_syarat" >
				<span class="pesan" style="display:none"><h6><code>Maksimal Ukuran File 2MB</code></h6></span>

				</div>

				</div>


				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success" id="button_file_syarat_ahliwaris" > <i class="fa fa-check"></i>Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>

				`;
			}
			if ($('#jenisSurat').val() === '19') {
				html += `
				<div class="col-lg-12">

				<div class="card">

				<div class="card-body">


				<form action="{{ url('profesi') }}" method="POST" enctype="multipart/form-data">
				<!-- @csrf dibuat di setiap form ya jgn lupa -->
				@csrf

				<div class="form-body">

				<h3 class="card-title">Data Permohonan Surat Keterangan Profesi</h3>

				<hr>
				<div class="row">
				@if(isset($ProfesiError))
				<div class="alert alert-{{ $Profesistatus }}">
				<div>{{ $ProfesiError }}</div>
				</div>
				@endif
				</div>
				<div class="row p-t-20">

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik"onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> NIP/NIK </label>

				<input type="text" id="" name="nip_nik" class="form-control form-control-danger" placeholder="input NIP/NIK">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>
				</div>
				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Digunakan Sebagai </label>

				<input type="text" id="" name="fungsi" class="form-control form-control-danger" placeholder="input tujuan surat">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label>Keterangan Profesi</label>

				<textarea class="form-control" name="keterangan_profesi" rows="5"></textarea>

				</div>

				</div>


				<div class="col-md-12">

				<div class="form-group has-success">

				<label for="exampleInputFile">Upload Lampiran Syarat</label><br>

				<h6><code>Lampiran Syarat dibuat menjadi satu file dalam format pdf </code></h6>

				<input type="file" onchange="upload('file_syarat_profesi')" id="file_syarat_profesi" name="file_syarat" >
				<span class="pesan" style="display:none"><h6><code>Maksimal Ukuran File 2MB</code></h6></span>

				</div>

				</div>


				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success" id="button_file_syarat_profesi" > <i class="fa fa-check"></i>Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>

				`;
			}
			if ($('#jenisSurat').val() === '20') {
				html += `
				<div class="col-lg-12">

				<div class="card">

				<div class="card-body">


				<form action="{{ url('penghasilan') }}" method="POST" enctype="multipart/form-data">
				<!-- @csrf dibuat di setiap form ya jgn lupa -->
				@csrf

				<div class="form-body">

				<h3 class="card-title">Data Permohonan Surat Keterangan Penghasilan</h3>

				<hr>
				<div class="row">
				@if(isset($PenghasilanError))
				<div class="alert alert-{{ $Penghasilanstatus }}">
				<div>{{ $PenghasilanError }}</div>
				</div>
				@endif
				</div>
				<div class="row p-t-20">

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>
				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Jumlah Penghasilan </label>

				<input type="text" id="" name="jumlah_penghasilan" class="form-control form-control-danger" placeholder="input NIP/NIK">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label>Saksi I:</label>

				<input type="text" id="" name="saksi1" class="form-control form-control-danger" placeholder="input nik anda">

				</select>

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label>Saksi II:</label>

				<input type="text" id="" name="saksi2" class="form-control form-control-danger" placeholder="input nik anda">

				</select>

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label>Saksi III:</label>

				<input type="text" id="" name="saksi3" class="form-control form-control-danger" placeholder="input nik anda">

				</select>

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Sebagai </label>

				<input type="text" id="" name="sebagai3" class="form-control form-control-danger" placeholder="input tujuan pindah ">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label>Saksi IV:</label>

				<input type="text" id="" name="saksi4" class="form-control form-control-danger" placeholder="input nik anda">

				</select>

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Sebagai </label>

				<input type="text" id="" name="sebagai4" class="form-control form-control-danger" placeholder="input tujuan pindah ">

				</div>

				</div>




				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>

				`;
			}

			if ($('#jenisSurat').val() === '23') {
				html += `<div class="col-lg-12">

				<div class="card">

				<div class="card-body">

				<form action="{{ url('dispensasinikah') }}" method="POST"  enctype="multipart/form-data">

				@csrf

				<div class="form-body">

				<h3 class="card-title">Data Permohonan Surat Dispensasi Waktu Pernikahan</h3>

				<hr>

				<div class="row">
				@if(isset($DispensasinikahError))
				<div class="alert alert-{{ $Dispensasinikahstatus }}">
				<div>{{ $DispensasinikahError }}</div>
				</div>
				@endif
				</div>

				<div class="row p-t-20">

				<!-- 
				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Lampiran </label>

				<input type="text" id="" name="lampiran" class="form-control form-control-danger" placeholder="input jumlah lampiran ">

				</div>

				</div> -->

				<div class="col-md-6">

				<div class="form-group has-success">

				<label>Keterangan Surat Dispensasi</label>

				<input type="text" id="" name="keterangan" class="form-control form-control-danger" placeholder="input keterangan ">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label class="control-label">Tanggal Pernikahan</label>

				<input type="date" name="tanggal_nikah" class="form-control" placeholder="dd/mm/yyyy">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label>Sebagai Calon</label>

				<input type="text" id="" name="sebagai1" class="form-control form-control-danger" placeholder="input sebagai calon pria/wanita ">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>
				</div>


				<div class="col-md-6">

				<div class="form-group has-success">

				<label>Sebagai Calon</label>

				<input type="text" id="" name="sebagai2" class="form-control form-control-danger" placeholder="input sebagai calon pria/wanita ">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label>Nama</label>

				<input type="text" id="" name="namap" class="form-control form-control-danger" placeholder="input nama calon ">
				</div>

				</div>


				<div class="col-md-6">

				<div class="form-group has-success">

				<label>Tempat Lahir</label>

				<input type="text" id="" name="tempat_lahir" class="form-control form-control-danger" placeholder="input jumlah lampiran ">

				</div>

				</div>


				<div class="col-md-6">

				<div class="form-group">

				<label class="control-label">Tanggal Lahir</label>

				<input type="date" name="tanggal_lahir" class="form-control" placeholder="dd/mm/yyyy">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label>Warga Negara</label>

				<input type="text" id="" name="warga" class="form-control form-control-danger" placeholder="input warga negara ">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label>Agama</label>

				<input type="text" id="" name="agama" class="form-control form-control-danger" placeholder="input agama ">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label>Status Perkawinan</label>

				<input type="text" id="" name="status" class="form-control form-control-danger" placeholder="input status perkawinan ">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label>Alamat</label>

				<input type="text" id="" name="alamat" class="form-control form-control-danger" placeholder="input alamat ">

				</div>

				</div>

				<div class="col-md-12">

				<div class="form-group has-success">

				<label for="exampleInputFile">Upload Lampiran Syarat</label><br>

				<h6><code>Lampiran Syarat dibuat menjadi satu file dalam format pdf </code></h6>

				<input type="file" onchange="upload('file_syarat_dispensasinikah')" id="file_syarat_dispensasinikah" name="file_syarat" >
				<span class="pesan" style="display:none"><h6><code>Maksimal Ukuran File 2MB</code></h6></span>

				</div>

				</div>

				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success" id="button_file_syarat_dispensasinikah" > <i class="fa fa-check"></i>Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>

				`;
			}

			if ($('#jenisSurat').val() === '22') {
				html += `
				<div class="col-lg-12">

				<div class="card">

				<div class="card-body">


				<form action="{{ url('pindahnikah') }}" method="POST" enctype="multipart/form-data">
				<!-- @csrf dibuat di setiap form ya jgn lupa -->
				@csrf

				<div class="form-body">

				<h3 class="card-title">Data Permohonan Surat Rekomendasi Pindah Nikah</h3>

				<hr>
				<div class="row">
				@if(isset($PindahnikahError))
				<div class="alert alert-{{ $Pindahnikahstatus }}">
				<div>{{ $PindahnikahError }}</div>
				</div>
				@endif
				</div>
				<div class="row p-t-20">

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>

				</div>


				<!--<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Lampiran </label>

				<input type="text" id="" name="lampiran" class="form-control form-control-danger" placeholder="input lampiran">

				</div>

				</div> -->

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Kepada Penghulu Kampung </label>

				<input type="text" id="" name="kepada" class="form-control form-control-danger" placeholder="input tujuan surat">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Di </label>

				<input type="text" id="" name="di" class="form-control form-control-danger" placeholder="input tempat tujuan surat">

				</div>

				</div>
				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Desa/Kelurahan </label>

				<input type="text" id="" name="desa_kel" class="form-control form-control-danger" placeholder="input Desa/Kelurahan ">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Kecamatan</label>

				<input type="text" id="" name="kecamatan" class="form-control form-control-danger" placeholder="input kecamatan">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Kabupaten</label>

				<input type="text" id="" name="kabupaten" class="form-control form-control-danger" placeholder="input kabupaten">

				</div>

				</div>

				<div class="col-md-12">

				<div class="form-group has-success">

				<label for="exampleInputFile">Upload Lampiran Syarat</label><br>

				<h6><code>Lampiran Syarat dibuat menjadi satu file dalam format pdf </code></h6>

				<input type="file" onchange="upload('file_syarat_pindahnikah')" id="file_syarat_pindahnikah" name="file_syarat" >
				<span class="pesan" style="display:none"><h6><code>Maksimal Ukuran File 2MB</code></h6></span>

				</div>

				</div>


				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success" id="button_file_syarat_pindahnikah" > <i class="fa fa-check"></i>Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>

				`;
			}
			if ($('#jenisSurat').val() === '32') {
				html +=`<div class="col-lg-12"> 

				<div class="card">

				<div class="card-body">

				<form action="{{ url('kelahiran') }}" method="POST"  enctype="multipart/form-data">

				@csrf

				<div class="form-body">

				<h3 class="card-title">Data Permohonan Surat Pernyataan Kelahiran</h3>

				<hr>

				<div class="row">
				@if(isset($KelahiranError))
				<div class="alert alert-{{ $Kelahiranstatus }}">
				<div>{{ $KelahiranError }}</div>
				</div>
				@endif
				</div>

				<div class="row p-t-20">

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>
				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label class="control-label">Tanggal Lahir</label>

				<input type="date" name="tanggal_lahir" class="form-control" placeholder="dd/mm/yyyy">

				</div>

				</div>


				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Tempat Lahir</label>

				<input type="text" id="" name="tempat_lahir" class="form-control" placeholder="input tempat kelahiran">

				</div>

				</div>


				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Ayah</label>

				<input type="text" id="" name="ayah" class="form-control form-control-danger" placeholder="input nik ayah ">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label"> Ibu</label>

				<input type="text" id="" name="ibu" class="form-control form-control-danger" placeholder="input nik ibu ">

				</div>

				</div>


				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Anak</label>

				<input type="text" id="" name="anak" class="form-control" placeholder="input nama anak">

				</div>

				</div>

				<div class="col-md-12">

				<div class="form-group has-success">

				<label for="exampleInputFile">Upload Lampiran Syarat</label><br>

				<h6><code>Lampiran Syarat dibuat menjadi satu file dalam format pdf </code></h6>

				<input type="file" onchange="upload('file_syarat_kelahiran')" id="file_syarat_kelahiran" name="file_syarat" >
				<span class="pesan" style="display:none"><h6><code>Maksimal Ukuran File 2MB</code></h6></span>

				</div>

				</div>

				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success" id="button_file_syarat_kelahiran" > <i class="fa fa-check"></i>Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>`;
			}
			if ($('#jenisSurat').val() === '7') {
				html +=`<div class="col-lg-12">                                    

				<div class="card">

				<div class="card-body">

				<form action="{{ url('domisili') }}" method="POST" target="_blank" id="suratdomisilicreate" enctype="multipart/form-data" role="form">

				@csrf

				<div class="form-body">

				<h3 class="card-title">Permohonan Surat Keterangan Domisili</h3>
				<code><strong><u>lampiran syarat: KTP & KK yang masih berlaku</u></strong></code>

				<hr>

				<div class="row">
				@if(isset($domisiliError))
				<div class="alert alert-{{ $domisilistatus }}">
				<div>{{ $domisiliError }}</div>
				</div>
				@endif
				</div>

				<div class="row p-t-20">
				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">
				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>
				</div>

				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>`;		
			}


			if ($('#jenisSurat').val() === '34') {
				html +=`<div class="col-lg-12">                                    

				<div class="card">

				<div class="card-body">

				<form action="{{ url('pengantarnikah') }}" method="POST" enctype="multipart/form-data">

				@csrf

				<div class="form-body">

				<h3 class="card-title">Permohonan Surat Pengantar Pernikahan/Perkawinan</h3>
				<code><strong><u>lampiran syarat: KTP & KK yang masih berlaku</u></strong></code>

				<hr>

				<div class="row">
				@if(isset($PengantarNikahError))
				<div class="alert alert-{{ $PengantarNikahstatus }}">
				<div>{{ $PengantarNikahError }}</div>
				</div>
				@endif
				</div>

				<div class="row p-t-20">
				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>
				
				<input type="text" id="niknikah" name="nik" onkeyup="nikah()"  class="form-control form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduknikah" disabled="">

				</select>
				</div>
				</div>


				<div class="col-md-6">

				<div class="form-group">

				<label>Ayah</label>
				<!-- //untuk menampilkan nama ortu -->
				<input class="form-control" type="text" id="namaayah" disabled="">
				<!-- untuk menyimpan nik ortu type hidden jadi gak tampil di form -->
				<input type="hidden" name="nika" id="nikayah">
				</select>

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Ibu</label>
				<!-- //untuk menampilkan nama ortu -->
				<input class="form-control" type="text" id="namaibu" disabled="">
				<!-- untuk menyimpan nik ortu type hidden jadi gak tampil di form -->
				<input type="hidden" name="nikaibu" id="nikibu">
				</select>

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Nama Pasangan Terdahulu </label>

				<input type="text" id="" name="nama_pasangan_terdahulu" class="form-control form-control-danger" placeholder="input nama pasangan">

				</div>

				</div>

				<div class="col-md-12">

				<div class="form-group has-success">

				<label for="exampleInputFile">Upload Lampiran Syarat</label><br>

				<h6><code>Lampiran Syarat dibuat menjadi satu file dalam format pdf </code></h6>

				<input type="file" onchange="upload('file_syarat_pengantarnikah')" id="file_syarat_pengantarnikah" name="file_syarat" >
				<span class="pesan" style="display:none"><h6><code>Maksimal Ukuran File 2MB</code></h6></span>


				</div>

				</div>

				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success" id="button_file_syarat_pengantarnikah" > <i class="fa fa-check"></i>Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>`;		
			}

			if ($('#jenisSurat').val() === '35') {
				html +=`<div class="col-lg-12">                                    

				<div class="card">

				<div class="card-body">

				<form action="{{ url('belumnikah') }}" onsubmit="sumpahnikahValidasi(e)" id="formsumpahnikah" method="POST" enctype="multipart/form-data">

				@csrf

				<div class="form-body">

				<h3 class="card-title">Permohonan Surat Pernyataan/Sumpah Nikah Atau Tidak Terikat Dengan Pernikahan Lain</h3>
				<code><strong><u>lampiran syarat: KTP & KK yang masih berlaku</u></strong></code>

				<hr>

				<div class="row">
				@if(isset($BelumNikahError))
				<div class="alert alert-{{ $BelumNikahstatus }}">
				<div>{{ $BelumNikahError }}</div>
				</div>
				@endif
				</div>

				<div class="row p-t-20">
				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>

				<input type="text" name="nik" onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

				</select>
				</div>
				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Nama Pasangan </label>

				<input type="text" id="" name="nama_pasangan" class="form-control form-control-danger" placeholder="input nama pasangan">

				</div>

				</div>
				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK Saksi I</label>

				<input type="text" name="nik_saksi_1" onkeyup="nikSaksisatu()" class="form-control nikksaksikesatu form-control-danger" placeholder="input nik saksi satu">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama Saksi I</label>

				<input class="form-control" type="text" name="nama_saksi_satu" id="nama_saksi_satu" disabled="">

				</select>
				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK Saksi II</label>

				<input type="text" name="nik_saksi_2" onkeyup="nikSaksidua()" class="form-control nikksaksikedua form-control-danger" placeholder="input nik saksi dua">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama Saksi II</label>

				<input class="form-control" type="text" name="nama_saksi_dua" id="nama_saksi_dua" disabled="">

				</select>
				</div>

				</div>

				<div class="col-md-12">

				<div class="form-group has-success">

				<label for="exampleInputFile">Upload Lampiran Syarat</label><br>

				<h6><code>Lampiran Syarat dibuat menjadi satu file dalam format pdf </code></h6>

				<input type="file" onchange="upload('file_syarat_nikah')" id="file_syarat_nikah" name="file_syarat" >
				<span class="pesan" style="display:none"><h6><code>Maksimal Ukuran File 2MB</code></h6></span>
				</div>

				</div>

				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success" id="button_file_syarat_nikah" > <i class="fa fa-check"></i>Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>`;		
			}

			if ($('#jenisSurat').val() === '36') {
				html +=`<div class="col-lg-12">                                    

				<div class="card">

				<div class="card-body">

				<form action="{{ url('izinorangtua') }}" method="POST" enctype="multipart/form-data">

				@csrf

				<div class="form-body">

				<h3 class="card-title">Permohonan Surat Izin Orangtua</h3>
				<code><strong><u>lampiran syarat: KTP & KK yang masih berlaku</u></strong></code>

				<hr>

				<div class="row">
				@if(isset($IzinOrangtuaError))
				<div class="alert alert-{{ $IzinOrangtuastatus }}">
				<div>{{ $IzinOrangtuaError }}</div>
				</div>
				@endif
				</div>

				<div class="row p-t-20">
				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Masukkan NIK</label>
				
				<input type="text" id="niknikah" name="nik" onkeyup="nikah()"  class="form-control form-control-danger" placeholder="input nik anda">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Nama</label>

				<input class="form-control" type="text" name="nama" id="nama_penduduknikah" disabled="">

				</select>
				</div>
				</div>


				<div class="col-md-6">

				<div class="form-group">

				<label>Ayah</label>
				<!-- //untuk menampilkan nama ortu -->
				<input class="form-control" type="text" id="namaayah" disabled="">
				<!-- untuk menyimpan nik ortu type hidden jadi gak tampil di form -->
				<input type="hidden" name="nika" id="nikayah">
				</select>

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group">

				<label>Ibu</label>
				<!-- //untuk menampilkan nama ortu -->
				<input class="form-control" type="text" id="namaibu" disabled="">
				<!-- untuk menyimpan nik ortu type hidden jadi gak tampil di form -->
				<input type="hidden" name="nikaibu" id="nikibu">
				</select>

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Nama Pasangan</label>

				<input type="text" id="" name="nama_pasangan" class="form-control form-control-danger" placeholder="input nama pasangan">

				</div>

				</div>
				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">NIK Pasangan</label>

				<input type="text" id="" name="nik_pasangan" class="form-control form-control-danger" placeholder="input nik pasangan">

				</div>

				</div>
				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Bin/Binti</label>

				<input type="text" id="" name="bin_binti" class="form-control form-control-danger" placeholder="input bin/binti pasangan">

				</div>

				</div>
				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Tempat Lahir</label>

				<input type="text" id="" name="tempat_lahir" class="form-control form-control-danger" placeholder="input tempat lahir pasangan">

				</div>

				</div>
				<div class="col-md-6">

				<div class="form-group">

				<label class="control-label">Tanggal Lahir</label>

				<input type="date" name="tanggal_lahir" class="form-control" placeholder="dd/mm/yyyy">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Kewarganegaraan</label>

				<input type="text" id="" name="kewarganegaraan" class="form-control form-control-danger" placeholder="input kewarganegaraan pasangan">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Agama</label>

				<input type="text" id="" name="agama" class="form-control form-control-danger" placeholder="input agama pasangan">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Pekerjaan</label>

				<input type="text" id="" name="pekerjaan" class="form-control form-control-danger" placeholder="input pekerjaan pasangan">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Alamat</label>

				<input type="text" id="" name="alamat" class="form-control form-control-danger" placeholder="input alamat pasangan">

				</div>

				</div>

				<div class="col-md-12">

				<div class="form-group has-success">

				<label for="exampleInputFile">Upload Lampiran Syarat</label><br>

				<h6><code>Lampiran Syarat dibuat menjadi satu file dalam format pdf </code></h6>

				<input type="file" onchange="upload('file_syarat_izinorangtua')" id="file_syarat_izinorangtua" name="file_syarat" >
				<span class="pesan" style="display:none"><h6><code>Maksimal Ukuran File 2MB</code></h6></span>


				</div>

				</div>

				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success" id="button_file_syarat_izinorangtua" > <i class="fa fa-check"></i>Ajukan Permohonan</button>
				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>`;		
			}


			$('#konten').html(html);
		})
})


</script>


<script type="text/javascript">

	function nikP(){
		console.log('nik')
		$.ajax({
			url:"{{ url('/situ/nama') }}/"+$('.nikk').val(),
			method:"GET",
			success: function(data){
				$("input[name=nama]").val(data)
			},
			error: function(){
				$("input[name=nama]").val("NIK Anda belum terdaftar")
			}
		})
	}

	function nikPasangan(){
		$.ajax({
			// ".nikkpasangan" samakan dengan yang ada di class inputnya 
			url:"{{ url('/situ/nama') }}/"+$('.nikkpasangan').val(),
			method:"GET",
			success: function(data){
				//name di bawah disamakan dengan name yang ada di input tempan nampilkan namanya
				$("input[name=nama_pasangan]").val(data)
			},
			error: function(){
				$("input[name=nama_pasangan]").val("NIK Anda belum terdaftar")
			}
		})
	}

	function nikSaksisatu(){
		$.ajax({
			// ".nikkpasangan" samakan dengan yang ada di class inputnya 
			url:"{{ url('/situ/nama') }}/"+$('.nikksaksikesatu').val(),
			method:"GET",
			success: function(data){
				//name di bawah disamakan dengan name yang ada di input tempan nampilkan namanya
				$("input[name=nama_saksi_satu]").val(data)
			},
			error: function(){
				$("input[name=nama_saksi_satu]").val("NIK Anda belum terdaftar")
			}
		})
	}

	function nikSaksidua(){
		$.ajax({
			// ".nikkpasangan" samakan dengan yang ada di class inputnya 
			url:"{{ url('/situ/nama') }}/"+$('.nikksaksikedua').val(),
			method:"GET",
			success: function(data){
				//name di bawah disamakan dengan name yang ada di input tempan nampilkan namanya
				$("input[name=nama_saksi_dua]").val(data)
			},
			error: function(){
				$("input[name=nama_saksi_dua]").val("NIK Anda belum terdaftar")
			}
		})
	}



	function ortu(){
		console.log('ortu')
		$.ajax({
			url:"{{ url('/SuratPengantarPindah/ortu') }}/"+$('.nikk').val(),
			method:"GET",
			success: function(data){
				if(data.length == 1){
					$("#namaortua").val(data[0].nama)
					$("#nikortu").val(data[0].nik)
				} else {
					$("#namaortu").val("data orang tua belum terdata")

				}
			}
		})

		nikP();

	}



	function nikah(){
		$.ajax({
			url:"{{ url('/situ/nikah') }}/"+$('#niknikah').val(),
			method:"GET",
			beforeSend: function() {
				$("#namaibu").val('Loading...')
				$("#namaayah").val('Loading...')
				$("#nama_penduduknikah").val('Loading...')
			},
			success: function(data){
				if ((data.ayah.length == 0) || (data.ibu.length == 0)) {
					$("#namaayah").val('Data Ayah Kosong')
					$("#namaibu").val('Data Ibu Kosong')

				} else {
					$("#namaibu").val(data.ibu[0].nama)
					$("#nikibu").val(data.ibu[0].nik)
					$("#namaayah").val(data.ayah[0].nama)
					$("#nikayah").val(data.ayah[0].nik)

				}
				$("#nama_penduduknikah").val(data.namapenduduk)

			} 
			
		})
	}


	function upload(id){
		if ($('#'+id)[0].files[0].size > 2097152) {
			$('#button_'+id).prop('disabled', true);
			$('.pesan').show()
		} else {
			$('.pesan').hide()
			$('#button_'+id).prop('disabled', false);
		}

	}

	$('#suratdomisilicreate').validate({
		rules: {
            // id_kk sesuaikan dengan name yang ada pada input
            nik : {
            	required:true
            },

            file_syarat : {
            	required:true
            },

        },
        // messages berfungsi untuk mengcustom pesan peringatan pada inputan
        messages:{
            // id_kk sesuaikan dengan name pada input
            nik : {
            	required: "NIK tidak boleh kosong"
            },
            file_syarat : {
            	required: "Tanggal Domisili tidak boleh kosong"
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

<script src="{{ url('admin/adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ url('admin/adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>

</html>
