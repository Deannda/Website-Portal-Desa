		@extends('master')


		@section('content')
		<div class="shop-product col-lg-8 border-bottom" id="konten">
			<br><br>
						<div class="row" >
							 @foreach($allkomen as $datas)
							
							<!-- <div class="col-sm-4">
									<div class="shop-product-one grid-sidebar-img">
										<div class="shop-sidebar-product-over">
											<img  class="img-berita" src="cetus/images/calender.png" alt="product">
											
										</div>
									</div>
								</div> -->
								

							<div class="col-sm-12">

								<!-- <p></p>	
							<div class="blockquote-span blockquote-span4 marg-bot-50">
								<h6><a href="#" class="author"><i class="fa fa-comments"></i>&nbsp;&nbsp;&nbsp;{!! \Illuminate\Support\Str::upper($datas->penduduk[0]->nama) !!}</a><span>{{$datas->created_at->diffForHumans()}}</span></h6>
								<i class="fa fa-quote-left"></i>
								<p>{!! $datas->isi_tanggapan !!}</p>
							</div>

							<div class="friedman-one blog-sidebar-item m-top-20" id="show_comment_area">
							<h6>&nbsp;&nbsp;Komentar</h6>
						</div> -->
						
						<div class="marg-bot-20">
							<div class="friedman-single-one">
								
								<div class="friedman-single-para">
									<h6><i class="fa fa-user"></i>&nbsp;<a href="#">{!! \Illuminate\Support\Str::upper($datas->penduduk[0]->nama) !!}</a> <span>{{$datas->created_at->diffForHumans()}}</span></h6>
									<p><b>"</b>{!!$datas->isi_tanggapan !!}<b>"</b></p>
								</div>
							</div>
						</div>
						
								
								</div>
								<br>
 							

								@endforeach
						
						<br>
						
					
								<div class="col-lg-12">
									<div class="pagination">
						{{ $allkomen->links('vendor.pagination.custom')}}

									</div>
								</div>
							

						
					</div>
				</div>

					@endsection
