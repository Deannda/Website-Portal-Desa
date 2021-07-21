

		@extends('master')

 		

		@section('content')

					<div class="col-lg-8">
						<div class="blog-default marg-bot-50">
						 @foreach ($anggarandesa as $p)
							<h3>DATA ANGGARAN TAHUN {{$p->tahun_anggaran}}</h3>
							<ul>
								<li><i class="fa fa-clock-o"></i>{{$p->updated_at->isoFormat('dddd, D MMMM Y')}}</li>
								
							</ul>
							<br>
							<p>{!! $p->detail !!}</p>

                                        @endforeach
						</div>
					
					</div>

		@endsection
