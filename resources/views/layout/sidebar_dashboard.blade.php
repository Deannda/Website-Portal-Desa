<div class="col-lg-4">
	<div class="blog-sidebar mtres-40">
							<!-- <div class="blog-sidebar-item">
								<h6>Kategori</h6>
								<ul>
									<li><a href="#">Profil Desa</a></li>
									<li><a href="#">Sejarah Desa </a></li>
									<li><a href="#">Visi Misi</a></li>
									<li><a href="#">Perangkat Desa </a></li>
									
								</ul>
							</div> -->






							
							<div class="shopcheckout contact1-form">
								<h6 style="background-color:#DAA520">PELAYANAN SURAT</h6>
								<div class="shopcheckout-coupon">
									<!-- <h6>Masukan NIK Anda</h6> -->
									<form action="#">
										<div class="row">

											<div class="col-md-12">
												<label>Jenis Surat <span>*</span></label>
												<select id="jenisSurat">
													<option value="">Pilih Jenis Surat</option>
													@foreach ($jenissurat as $s)
													<option value= "{{ $s->id_jenissurat}}">{{$s->nama_surat}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</form>
								</div>

							</div>
							<br>


							<div class="shopcheckout contact1-form">
								<h6 style="background-color:#BDB76B">SUARA WARGA</h6>
								<div class="shopcheckout-coupon">

									<form action="{{ url('suarawarga') }}" method="POST">
										<!-- @csrf dibuat di setiap form ya jgn lupa -->
										@csrf
										<div class="row">

											<div class="col-md-12">
												<label>NIK</label>
												<input type="text" name="nik" onkeyup="nikS()" class="form-control niks form-control-danger" placeholder="Masukkan NIK Anda">
											</div>

											<div class="col-md-12">
												<label>Nama</label>
												<input class="form-control" type="text" name="namap" id="nama_penduduk" disabled="">
											</div>

											<div class="col-md-12">
												<label>Isi Tanggapan</label>
												<textarea class="form-control" name="isi_tanggapan" rows="5"></textarea>
											</div>

											<div class="col-md-12">
												<div class="form-actions" align="right">

													<button type="submit" id="kirim" disabled="true" class="btn btn-secondary" style="background-color:#BDB76B">Kirim</button>

												</div>
											</div>
										</div>


										<!-- @if ($message = Session::get('sukses'))
										<div class="alert alert-success alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<h5><i class="icon fas fa-check"></i>
												<strong>{{ $message }}</strong>
											</div>
											@endif -->
										</form>
									</div>

								</div>
								<br>
								<div class="blog-sidebar-item blog-sidebar-list">
									<h6>SUARA WARGA</h6>
									<ul>
										@foreach($suarawarga as $r)
										<li><a href="#" class="author"><i class="fa fa-comments"></i>&nbsp;&nbsp;&nbsp;{!! \Illuminate\Support\Str::upper($r->penduduk[0]->nama) !!}</a>&nbsp;&nbsp;<a href="#">{!! \Illuminate\Support\Str::words($r->isi_tanggapan, 6,'...')  !!}</a><br>{{$r->created_at->diffForHumans()}}</li>
										@endforeach
										<a href="/Listsuarawarga">Suara Warga Sebelumnya</a>
									</ul>
								</div>


								<div class="blog-sidebar-item blog-sidebar-list">
									<h6>AGENDA DESA</h6>
									<ul>
										@foreach($agenda as $datas)
										<li><a href="/details_agenda/{{$datas->id_agenda}}">{!! \Illuminate\Support\Str::words($datas->agenda, 3,'...')  !!}</a><br><a href="#" class="author"><i class="fa fa-calendar"></i>&nbsp;{{$datas->waktu_pelaksanaan}}</a></li>
										@endforeach
										<a href="/Allagenda">Agenda Sebelumnya</a>

									</ul>

								</div>

								<br>
								<div class="blog-sidebar-item">

									<h6>KEGIATAN DESA</h6>
									@foreach($kegiatan as $key => $kg)
									<div class="blog-sidebar-one">
										<div class="blog-sidebar-img">
											<a href=""><img class="img-news" src="{{ url('storage/gambar/'. $kg->gambar) }}" alt="" /></a>
										</div>
										<div class="blog-sidebar-para">
											<a href="/details_kegiatan/{{$kg->id_kegiatan}}" rel="nofollow">{!! \Illuminate\Support\Str::words($kg->judul, 8,'...')  !!}</a>
											<span>{{$kg->created_at->isoFormat('dddd, D MMMM Y')}}</span>
										</div>
									</div>

									@endforeach
									<a href="/Listkegiatan">Kegiatan Sebelumnya</a>


								</div>
								<br>

								<div class="blog-sidebar-item blog-sidebar-one">
									<h6>PETA WILAYAH</h6>
									<div class="blog-sidebar-over blog-sidebar-list">

										
										
										<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.974868404897!2d102.12002661475381!3d1.1781453991406587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMcKwMTAnNDEuMyJOIDEwMsKwMDcnMjAuMCJF!5e0!3m2!1sid!2sid!4v1600241423464!5m2!1sid!2sid" height="300"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

									</div>
								</div>



								<br>

						<!-- 	<div class="blog-sidebar-item blog-sidebar-one">
								<h6>VIDEO TERKAIT</h6>
								<div class="blog-sidebar-over blog-sidebar-list">
									<iframe width="560" height="315" src="https://www.youtube.com/embed/mI3wR7CrfXs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
							</div> -->
							
						</div>
					</div>

					<script type="text/javascript">

						function nikS(){
							console.log('nik')
							$.ajax({
								url:"{{ url('/suarawarga/namap') }}/"+$('.niks').val(),
								method:"GET",
								success: function(data){
									$('#kirim').prop('disabled',false)
									$("input[name=namap]").val(data)
								},
								error: function(){
									$('#kirim').prop('disabled',true)
									$("input[name=namap]").val("NIK Anda belum terdaftar")
								}
							})
						}
					</script>

				