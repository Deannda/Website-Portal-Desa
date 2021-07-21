@extends('master')


		@section('content')
					<div class="col-lg-8">
						<div class="blog-default marg-bot-50">
							@foreach ($prof as $p)
							<a href="#"><h3>Profil Wilayah Desa Sepotong</h3></a>
							<ul>
								<li><i class="fa fa-clock-o"></i>{{$p->updated_at->isoFormat('dddd, D MMMM Y')}}</li>
								<!-- <li><a href="#"><i class="fa fa-comments"></i></a>{{$jml}}</li> -->
							</ul>
							<br><br>
							<!-- <a href="#"><img src="cetus/images/blog/default-version/blog1.jpg" alt="blog" /></a> -->
							 
							<p>{!!$p->profil!!}</p>
							<!--  <p>(str_word_count("isi tulisan artikel") > 60 ? substr("isi tulisan artikel",0,200)."[..]" : "isi tulisan artikel")
  -->
							<!-- <a href="#">Read More</a> -->
							<!-- <p><b>Batas Wilayah</b></p>
                                        <ul>
                                            <li>Sebelah Utara&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;{!!$p->bts_utara!!}</li>
                                            <li>Sebelah Selatan&nbsp;&nbsp;:&nbsp;&nbsp;{!!$p->bts_selatan!!}</li>
                                            <li>Sebelah Barat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;{!!$p->bts_barat!!}</li>
                                            <li>Sebelah Timur&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;{!!$p->bts_timur!!}</li>
                                        </ul> -->
                                        @endforeach
						</div>
						<br><br><br>
					
						<!-- <div class="blog-detail-icon marg-bot-50">
							<ul>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i>share</a></li>
								<li><a class="twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i>share</a></li>
								<li><a class="pinterest" href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i>share</a></li>
							</ul>
						</div>
						
							
					<div class="friedman-one blog-sidebar-item m-top-20" id="show_comment_area">
							<h6>{{$jml}}&nbsp;&nbsp;Komentar</h6>
						</div>
						@foreach($komentar as $row)
						<div class="marg-bot-20">
							<div class="friedman-single-one">
								
								<div class="friedman-single-para">
									<h6><i class="fa fa-user"></i>&nbsp;<a href="#">{!! \Illuminate\Support\Str::ucfirst($row->nama) !!}</a> <span>{{$row->created_at->diffForHumans()}}</span></h6>
									<p>{!! \Illuminate\Support\Str::ucfirst($row->isi_komentar) !!}</p>
								</div>
							</div>
						</div>
						@endforeach
						
						<div class="friedman-one blog-sidebar-item">
							<h6>Tinggalkan Komentar</h6>
						</div>
						<div class="friedman-one contact1-form">
							
							<form action="{{url('komentar/profil')}}" method="post" class="horizontal">
								@csrf
								<div class="row">
									<div class="col-md-6">
										<input placeholder="Nama" name="nama" type="text">
									</div>
									<input type="hidden" name="keterangan" value="profil" >
									<div class="col-md-6">
										<input placeholder="Email" name="email" type="email">
									</div>
									<div class="col-lg-12">
										<textarea placeholder="Komentar" name="isi_komentar"></textarea>
									</div>
									
									<div class="col-lg-12">
										<button class="one-btn">Kirim Komentar</button>
									</div>
								</div>
							</form>
						</div> -->
					</div>

		@endsection