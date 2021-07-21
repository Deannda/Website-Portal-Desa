<div class="col-lg-12">                                    

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

				<input type="text" id="" name="bin_binti" class="form-control form-control-danger" placeholder="input nama pasangan">

				</div>

				</div>
				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Tempat Lahir</label>

				<input type="text" id="" name="tempat_lahir" class="form-control form-control-danger" placeholder="input nama pasangan">

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

				<input type="text" id="" name="kewarganegaraan" class="form-control form-control-danger" placeholder="input nama pasangan">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Agama</label>

				<input type="text" id="" name="agama" class="form-control form-control-danger" placeholder="input nama pasangan">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Pekerjaan</label>

				<input type="text" id="" name="pekerjaan" class="form-control form-control-danger" placeholder="input nama pasangan">

				</div>

				</div>

				<div class="col-md-6">

				<div class="form-group has-success">

				<label class="control-label">Alamat</label>

				<input type="text" id="" name="alamat" class="form-control form-control-danger" placeholder="input nama pasangan">

				</div>

				</div>

				<div class="col-md-12">

				<div class="form-group has-success">

				<label for="exampleInputFile">Upload Lampiran Syarat</label><br>

				<h6><code>Lampiran Syarat dibuat menjadi satu file dalam format pdf </code></h6>

				<input type="file" name="file_syarat" >

				</div>

				</div>

				</div>

				</div>

				<div class="form-actions">

				<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Ajukan Permohonan</button>

				<button type="button" class="btn btn-inverse">Cancel</button>

				</div>

				</form>

				</div>

				</div>

				</div>