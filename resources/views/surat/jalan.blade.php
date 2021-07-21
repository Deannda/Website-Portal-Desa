<div class="col-lg-12">

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

								<input type="text" id="" name="nik" class="form-control nikjalan form-control-danger" placeholder="input nik anda">

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

</div>