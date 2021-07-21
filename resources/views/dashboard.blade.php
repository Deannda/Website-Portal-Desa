@extends('master_dashboard')
@section('js')
<link rel="stylesheet" type="text/css" href="css/other/element-style.css" media="all" />
<style type="text/css">
	#mask {
		position: absolute;
		left: 0;
		top: 0;
		z-index: 9000;
		background-color: #000;
		display: none;
	}
	
	#boxes .window {
		position: absolute;
		left: 0;
		top: 0;
		width: 440px;
		height: 200px;
		display: none;
		z-index: 9999;
		padding: 20px;
		border-radius: 8px;
		text-align: center;
	}
	
	#boxes #dialog {
		position: fixed;
		width: 500px;
		height: 570px;
		padding: 10px;
		background-color: #ffffff;
		font-family: 'Segoe UI Light', sans-serif;
		font-size: 15pt;
	}
	
	#popupfoot {
		font-size: 16pt;
		position: absolute;
		bottom: 0px;
		width: 250px;
		left: 250px;
	}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {	
		var id = '#dialog';
		
	//Get the screen height and width
	var maskHeight = $(document).height();
	var maskWidth = $(window).width();
	
	//Set heigth and width to mask to fill up the whole screen
	$('#mask').css({'width':maskWidth,'height':maskHeight});
	
	//transition effect
	$('#mask').fadeIn(500);	
	$('#mask').fadeTo("slow",0.9);	
	
	//Get the window height and width
	var winH = $(window).height();
	var winW = $(window).width();
	
	//Set the popup window to center
	$(id).css('top',  winH/2-$(id).height()/2);
	$(id).css('left', winW/2-$(id).width()/2);
	
	//transition effect
	$(id).fadeIn(2000); 	
	
	//if close button is clicked
	$('.window .close').click(function (e) {
	//Cancel the link behavior
	e.preventDefault();
	
	$('#mask').hide();
	$('.window').hide();
});
	
	//if mask is clicked
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});
	
});
</script>
@endsection
   <!--  <style type="text/css">
		.my-active span{
			background-color: #5cb85c !important;
			color: white !important;
			border-color: #5cb85c !important;
		}
	</style> -->
	
	@section('slider')
	<!-- gallery slider area start -->
	<div class="gallery-slider paddingg-30">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="single-memb owl-carousel">
						@foreach($slider as  $key => $sl)
						<div>
							
							<img class="fotoslider" src="{{ url('storage/gambar/'. $sl->foto) }}" alt="fotoslider" />
						</div>
						@endforeach
							<!-- <div>
								<img class="fotoslider" src="cetus/images/galeri/berita2.jpg" alt="fotoslider" />
							</div>
							<div>
								<img class="fotoslider" src="cetus/images/galeri/berita3.jpg" alt="fotoslider" />
							</div>
							<div>
								<img  class="fotoslider" src="cetus/images/galeri/berita4.jpg" alt="fotoslider"/>
							</div>
							<div>
								<img  class="fotoslider" src="cetus/images/galeri/berita5.jpg" alt="fotoslider"/>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div><!--  gallery slider area end -->

		@if($_SERVER['REQUEST_URI']=='/')

		<div id="boxes">
			<div id="dialog" class="window">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				@foreach($f_kades as $key => $jt)
				<center>
					<p><strong>Kepala Desa Sepotong</strong></p>
					<font size="4"><b>{{ $jt->nama  }}</b></font><br>
					<br>
					
					<img  class="img-kades" src="{{ url('storage/foto_kades/'. $jt->foto) }}" height="485" width="50" alt="kades">
				</center>
				@endforeach

			</div>
			<div id="mask"></div>
		</div>
		@endif


		@endsection

		@section('content')
		

		<div class="shop-product col-lg-8 border-bottom" id="konten">
			<div class="row" >
				@foreach($artikel as $key => $datas)
				
				<div class="col-sm-4">
					<div class="shop-product-one grid-sidebar-img">
						<div class="shop-sidebar-product-over">
							<img  class="img-berita" src="{{ url('storage/gambar/'. $datas->gambar) }}" alt="product">
							
						</div>
					</div>
				</div>
				

				<div class="col-sm-8">
					<div class="shop-product-list">
						<a href="/details/{{$datas->id_artikel}}"><h6>{{ $datas->judul }}</h6></a>
						<ul>
							<li><i class="fa fa-clock-o">&nbsp;</i>{{$datas->created_at->isoFormat('dddd, D MMMM Y')}}&nbsp;&nbsp;</li>
						</ul>
						<p>{!! \Illuminate\Support\Str::words(preg_replace("/<img[^>]+\>/i","( image )", $datas->isi), 20,'....')  !!}</p>
						<div class="text-center text-md-left">
							<a href="/details/{{$datas->id_artikel}}">Selengkapnya</a>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="garis"></div>
				</div>

				@endforeach
			</div>
			
			
			
			<div class="col-lg-12">
				<div class="pagination">
					{{ $artikel->links('vendor.pagination.custom')}}

				</div>
			</div>
			

			
		</div>
		@endsection

