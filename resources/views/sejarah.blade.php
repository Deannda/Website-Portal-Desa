@extends('master')


		@section('content')
					<div class="col-lg-8">
						<div class="blog-default marg-bot-50">
							 @foreach ($prof as $p)
							<a href="#"><h3>Sejarah Desa Sepotong</h3></a>
							<ul>
								<li><i class="fa fa-clock-o"></i>{{$p->updated_at->isoFormat('dddd, D MMMM Y')}}</li>
								
							</ul>
							<br><br>
							<!-- <a href="#"><img src="cetus/images/blog/default-version/blog1.jpg" alt="blog" /></a> -->
							
							<p>{!!$p->sejarah!!}</p>
							<!-- <a href="#">Read More</a> -->
                                        @endforeach
						</div>
						<br><br><br>
					
				
					</div>

		@endsection