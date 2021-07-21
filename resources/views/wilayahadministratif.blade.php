@extends('master')


		@section('content')
					<div class="col-lg-8">
						<!-- <div class="blog-default marg-bot-50">
							<a href="#"><h3>STATISTIK DATA BERDASARKAN AGAMA</h3></a>
						<br><br>


							<div>
                                <canvas id="agama" height="100"></canvas>
                            </div>


						</div> -->
						<br><br>
					
						<div class="blog-detail-icon marg-bot-50">
							
                                <h5>TABEL DATA DEMOGRAFI BERDASAR POPULASI PER WILAYAH</h5>
                                <div style="overflow-x:auto;">

                                 <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe">

                                     <thead>

                                        <tr>
                                            <tr>
                                            <!-- <td rowspan="2" style="vertical-align : middle;text-align:center;"><b>NO</b></td> -->
                                            <td rowspan="2" style="vertical-align : middle;text-align:center;"><b>NAMA DUSUN</b></td>
                                            <td rowspan="2" style="vertical-align : middle;text-align:center;"><b>KEPALA DUSUN</b></td>
                                            <td rowspan="2" style="vertical-align : middle;text-align:center;"><b>JUMLAH RT</b></td>
                                            <td rowspan="2" style="vertical-align : middle;text-align:center;"><b>JUMLAH KK</b></td>
                                            <td rowspan="2"   style="vertical-align : middle;text-align:center;" class="title"><b>JUMLAH PENDUDUK</b></td>
                                            
                                        </tr>
                                        
                                       <!--  <tr>
                                            <td style="vertical-align : middle;text-align:center;"><b>TOTAL</b></td>
                                            <td style="vertical-align : middle;text-align:center;"><b>PERSENTASE</b></td>
                                        </tr>      -->  

                                    </thead>

                                    <tbody>

                                       @foreach($data as $key => $datas)
                                        <tr>

                                            <!-- <td class="title"><a class="link" href="javascript:void(0)">{{ ++$key }}</a></td> -->
                                            <!-- <td>{{ ++$key }}</td> -->

                                            <td class="title"><a class="link" href="javascript:void(0)">{{ $datas['nama_dusun'] }}</a></td>

                                            <td>{{ $datas['kepala_dusun'] }}</td>

                                            <td><center>{{ $datas['jumlah_rt'] }}</center></td>

                                            <td><center></center></td>
                                            <td><center></center></td>
                                           <!--  <td><center></center></td>
 -->
                                        </tr>
                                       @endforeach

                                    </tbody>

                                </table>

                            </div>
						</div>
						
						<!-- 	<div class="friedman-one blog-sidebar-item m-top-20" id="show_comment_area">
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
							
							<form action="{{url('komentar/agama')}}" method="post" class="horizontal">
								@csrf
								<div class="row">
									<div class="col-md-6">
										<input placeholder="Nama" name="nama" type="text">
									</div>
									<input type="hidden" name="keterangan" value="dataagama" >
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

	