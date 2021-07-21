		@extends('master')


		@section('content')
		<div class="shop-product col-lg-8 border-bottom" id="konten">
						<div class="row" >
							 @foreach($all as $datas)
							
							<div class="col-sm-4">
									<div class="shop-product-one grid-sidebar-img">
										<div class="shop-sidebar-product-over">
											<img  class="img-berita" src="cetus/images/calender.png" alt="product">
											
										</div>
									</div>
								</div>
								

							<div class="col-sm-8">
									<div class="shop-product-list"><br>
										<h6>{!! \Illuminate\Support\Str::upper($datas->agenda) !!}</h6>
										<hr>
							<p>Waktu Pelaksanaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$datas->waktu_pelaksanaan}}</p>
							<hr>
							<p>Lokasi Pelaksanaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$datas->tempat_pelaksanaan}}</p>
							<hr>
									</div>
								</div>
								<br>
 							

								@endforeach
						</div>
						<br>
						
					
								<div class="col-lg-12">
									<div class="pagination">
						{{ $all->links('vendor.pagination.custom')}}

									</div>
								</div>
							

						
					</div>

					@endsection

