	@extends('master')

		@section('content')

		<div class="shop-product col-lg-8 border-bottom" id="konten">
			<br>
							<br>
						<div class="row" >

							 @foreach($artikel2 as $key => $datas)
							
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
										<p>{!! \Illuminate\Support\Str::words($datas->isi, 20,'....')  !!}</p>
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
						<br>
						
					
								<div class="col-lg-12">
									<div class="pagination">
						{{ $artikel2->links('vendor.pagination.custom')}}

									</div>
								</div>
							

						
					</div>
		@endsection


		