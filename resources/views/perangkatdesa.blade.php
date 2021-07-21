@extends('master')


		@section('content')

					

					<div class="shop-product col-lg-8 border-bottom" id="konten">
			<h3>Struktur Pemerintah Desa Sepotong</h3>
			<br>
			<br>
						<div class="row" >
						
							@foreach ($tupoksi as $key => $j)
							
							<div class="col-sm-4">
									<div class="shop-product-one grid-sidebar-img">
										<div class="shop-sidebar-product-over">
											<img   src="{{ url('storage/foto_kades/'. $j->foto) }}"   width="100%" alt="perangkat_desa">
											
										</div>
									</div>
								</div>
								

							<div class="col-sm-8">
									<div class="shop-product-list"><br>
										<h6>{{$j->nama}}</h6>
										<hr>
							<p>JABATAN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$j->jabatan[0]->jabatan}}</p>
							<hr>
							<p>PERIODE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $j->periode_awal }}&nbsp;s/d&nbsp;{{ $j->periode_akhir }}</p>
							<hr>
									</div>
								</div>


 							
								@endforeach
						</div>
						
						
					
								<div class="col-lg-12">
									<div class="pagination">
						{{ $tupoksi->links('vendor.pagination.custom')}}

									</div>
								</div>
							

						
					</div>

		@endsection