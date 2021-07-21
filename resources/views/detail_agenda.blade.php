@extends('master')


		@section('content')
					<div class="col-lg-8">
							@foreach ($detail_agenda as $key => $j)
						<div class="blog-default marg-bot-30">
							<h3>Detail Agenda Kegiatan</h3>
							<ul>
								<li><i class="fa fa-clock-o"></i>ditulis {{$j->created_at->isoFormat('dddd, D MMMM Y')}}</li>
								
							</ul>
							
							
						</div>
						<br>
						<div class="blog-default blog-detail marg-bot-30">
							<!-- <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agenda Kegiatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{!! \Illuminate\Support\Str::upper($j->agenda) !!}</b></p> -->
							<h6>AGENDA KEGIATAN&nbsp;&nbsp;:</h6>
							<h5>{!! \Illuminate\Support\Str::upper($j->agenda) !!}</h5>
							
							<br>
							<hr>

							<p><!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->Waktu Pelaksanaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$j->waktu_pelaksanaan}}</p>
							<hr>
							<p><!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->Lokasi Pelaksanaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$j->tempat_pelaksanaan}}</p>
							<hr>
						
						</div>
					   @endforeach

						
					<!-- 	<div class="blog-detail-icon marg-bot-50">
							<ul>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i>share</a></li>
								<li><a class="twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i>share</a></li>
								<li><a class="pinterest" href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i>share</a></li>
							</ul>
						</div> -->
						
							
                                     
						</div>
				
		@endsection

	