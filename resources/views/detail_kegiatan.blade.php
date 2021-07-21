@extends('master')
@section('js')


		@section('content')

		<div class="col-lg-8">
			@foreach($detail_kegiatan as $key => $datas)
						<div class="blog-default marg-bot-30">
							<h3>{{ $datas->judul }}</h3>
							<ul>
								<li>{{$datas->created_at->isoFormat('dddd, D MMMM Y')}}</li>
								
								<!-- <li><a href="#"><i class="fa fa-share-alt"></i></a>10</li> -->
							</ul>
							<img class="img-detail" src="{{ url('storage/gambar/'. $datas->gambar) }}" alt="blog-details" />
							
						</div>
						<div class="blog-default blog-detail marg-bot-30">
							<!-- <h4>About The Conference</h4> -->
							<p>{!! $datas->isi !!}</p>
						</div>
					
					<div class="blog-detail-icon marg-bot-50">
							<ul>
								<li><a  href="http://www.facebook.com/sharer.php?u=https://sepotong.desa.id" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i>share</a></li>
								<li><a class="twitter" href="https://twitter.com/share?url=https://sepotong.desa.id&text=Simple%20Share%20Buttons&hashtags=simplesharebuttons" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i>share</a></li>
								<li><a class="pinterest" href="https://plus.google.com/share?url=https://sepotong.desa.id" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i>share</a></li>
							</ul>
						</div>
						
						
					</div>
				
	@endforeach
		@endsection

