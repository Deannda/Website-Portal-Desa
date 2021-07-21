<h6 style="background-color:#868e96">PELAYANAN SURAT</h6>
							<div class="shopcheckout-coupon">
								<!-- <h6>Masukan NIK Anda</h6> -->
					
									<div class="row">
										<div class="col-lg-8">
											<input type="text" placeholder="Masukan NIK Anda"/>
										</div>
										<div class="col-lg-4">
											<button type="button" class="one-btn one-btn-del">Cek NIK</button>
										</div>

										<div class="col-md-12">
										<label>Pilih Jenis Surat <span>*</span></label>
										<select>
											 @foreach ($jenissurat as $s)
											<option>{{$s->nama_surat}}</option>
											@endforeach
										</select>
										</div>
									</div>
						
							</div>