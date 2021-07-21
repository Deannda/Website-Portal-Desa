
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

								<input type="text" id="" name="nik" class="form-control nik form-control-danger" placeholder="input nik anda">

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

                     	 <input type="file" name="file_syarat" >

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

