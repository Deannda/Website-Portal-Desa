@extends('master')


        @section('content')
                    <div class="col-lg-8">
                        <div class="blog-default marg-bot-50">
                            <a href="#"><h3>STATISTIK DATA BERDASARKAN KEWARGANEGARAAN</h3></a>
                           <br><br>


                            <div>
                                <canvas id="warganegara" height="100"></canvas>
                            </div>


                        </div>
                        <br><br>
                    
                        <div class="blog-detail-icon marg-bot-50">
                            
                                <h5>TABEL DATA DEMOGRAFI BERDASAR KEWARGANEGARAAN</h5>
                                <div style="overflow-x:auto;">
                                 <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe">
    <thead>

                                        <tr>
                                            <tr>
                                            <td rowspan="2" style="vertical-align : middle;text-align:center;"><b>KELOMPOK</b></td>
                                            <td colspan="2"  style="vertical-align : middle;text-align:center;" class="title"><b>JUMLAH</b></td>
                                            <td colspan="2"  style="vertical-align : middle;text-align:center;" class="title"><b>LAKI-LAKI</b></td>
                                            <td colspan="2"  style="vertical-align : middle;text-align:center;" class="title"><b>PEREMPUAN</b></td>
                                        </tr>
                                        
                                        <tr>
                                            <td style="vertical-align : middle;text-align:center;"><b>TOTAL</b></td>
                                            <td style="vertical-align : middle;text-align:center;"><b>PERSENTASE</b></td>
                                             <td style="vertical-align : middle;text-align:center;"><b>JUMLAH</b></td>
                                            <td style="vertical-align : middle;text-align:center;"><b>PERSENTASE</b></td>
                                             <td style="vertical-align : middle;text-align:center;"><b>JUMLAH</b></td>
                                            <td style="vertical-align : middle;text-align:center;"><b>PERSENTASE</b></td>

                                        </tr>       

                                    </thead>

                                    <tbody>

                                       @foreach($data as $key => $datas)
                                        <tr>

                                             <td class="title"><a class="link" href="javascript:void(0)">{{ $datas['warganegara'] }}</a></td>

                                            <td>{{ $datas['jTotal'] }}</td>

                                            <td>{{ $datas['jPersen'] }}%</td>

                                            <td>{{ $datas['jTotallaki-laki'] }}</td>

                                            <td>{{ $datas['jPersenlaki-laki'] }}%</td>
                                            <td>{{ $datas['jTotalperempuan'] }}</td>

                                            <td>{{ $datas['jPersenperempuan'] }}%</td>

                                        </tr>
                                       @endforeach

                                    </tbody>

                                </table>
                                </div>

                        </div>
                        
                     <!--        
                        <div class="friedman-one blog-sidebar-item m-top-20" id="show_comment_area">
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
                            
                            <form action="{{url('komentar/warganegara')}}" method="post" class="horizontal">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input placeholder="Nama" name="nama" type="text">
                                    </div>
                                    <input type="hidden" name="keterangan" value="datawarganegara" >
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

        @section('jss')
<script>
    $(function () {
       
        $.ajax({
            url:"{{ url('statistikWarga') }}",
            method: "GET",
            success: function (data){


                    //-------------
                    //- Agama -
                    //-------------

                    var warganegara = [];

                    for (var i = 0; i < data.dataWarga.length; i++) {
                        warganegara.push(data.dataWarga[i].original);
                    }

                    var ctx3 = document.getElementById("warganegara").getContext("2d");

                    var data3 = warganegara;



                    var myPieChart = new Chart(ctx3).Pie(data3,{

                        segmentShowStroke : true,

                        segmentStrokeColor : "#fff",

                        segmentStrokeWidth : 0,

                        animationSteps : 100,

                        tooltipCornerRadius: 0,

                        animationEasing : "",

                        animateRotate : true,

                        animateScale : false,

                        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",

                        responsive: true

                    });



                }
            })
    })
</script>
@endsection 