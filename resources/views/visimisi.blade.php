@extends('master')


		@section('content')
					<div class="col-lg-8">
						<div class="blog-default marg-bot-50">
							 @foreach ($prof as $p)
							<a href="#"><h3>Visi Misi Desa Sepotong</h3></a>
							<ul>
								<li><i class="fa fa-clock-o"></i>{{$p->updated_at->isoFormat('dddd, D MMMM Y')}}</li>
								
							</ul>
							<br><br><br><br>
							<!-- <a href="#"><img src="cetus/images/blog/default-version/blog1.jpg" alt="blog" /></a> -->
							
							<h5 class="center">Visi</h5>
							<p>{!! $p->visi !!}</p>

							<br>
							<br>
							<br>
							
							 <h5 class="center">Misi</h5>
							<p>{!! $p->misi !!}</p>
							<!-- <a href="#">Read More</a> -->
                                        @endforeach
						</div>
						<br><br>
					
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
							
							<form action="{{url('komentar/visimisi')}}" method="post" class="horizontal">
								@csrf
								<div class="row">
									<div class="col-md-6">
										<input placeholder="Nama" name="nama" type="text">
									</div>
									<input type="hidden" name="keterangan" value="visimisi" >
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