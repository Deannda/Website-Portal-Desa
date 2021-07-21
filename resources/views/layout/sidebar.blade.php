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


							<br>
							

							<div class="blog-sidebar-item blog-sidebar-list">
								<h6>AGENDA DESA</h6>
								<ul>
									@foreach($agenda as $key => $datas)
									<li><a href="/details_agenda/{{$datas->id_agenda}}" rel="nofollow">{!! \Illuminate\Support\Str::words($datas->agenda, 3,'...')  !!}</a><br><a href="#" class="author"><i class="fa fa-calendar"></i>&nbsp;{{$datas->waktu_pelaksanaan}}</a></li>
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
								<div class="blog-sidebar-item">

								<h6>BERITA TERKINI</h6>
								@foreach($artikels as $key => $datas)
								<div class="blog-sidebar-one">
									<div class="blog-sidebar-img">
										<a href=""><img class="img-news" src="{{ url('storage/gambar/'. $datas->gambar) }}" alt="" /></a>
									</div>
									<div class="blog-sidebar-para">
										<a href="/details/{{$datas->id_artikel}}" rel="nofollow">{!! \Illuminate\Support\Str::words($datas->judul, 8,'...')  !!}</a>
										<span>{{$datas->created_at->isoFormat('dddd, D MMMM Y')}}</span>
									</div>
								</div>
								@endforeach
								<a href="/Listberita">Berita Lainnya</a>
								
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
							
						
							
					
							
							

							<!-- <div class="blog-sidebar-item blog-sidebar-one">
								<h6>VIDEO TERKAIT</h6>
								<div class="blog-sidebar-over blog-sidebar-list">
									<iframe width="560" height="315" src="https://www.youtube.com/embed/mI3wR7CrfXs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
							</div>
							
							
							<div class="blog-sidebar-one">
								<a href="#" class="blog-sidebar-icon">
									<i class="fa fa-angle-up" aria-hidden="true"></i>
								</a>
								<a href="#" class="blog-sidebar-icon blog-sidebar-icon1">
									<i class="fa fa-angle-down" aria-hidden="true"></i>
								</a>
							</div> -->
						</div>
					</div>

					