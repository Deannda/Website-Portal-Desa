@extends('master')


        @section('content')
                    <div class="col-lg-8">
                        <div class="blog-default marg-bot-50">
                            <a href="#"><h3>STATISTIK DATA BERDASARKAN JENIS KELAMIN</h3></a>
                          <br><br>


                            <div>
                               <canvas id="gender" height="100"></canvas>
                            </div>


                        </div>
                        <br><br>
                    
                        <div class="blog-detail-icon marg-bot-50">
                            
                                <h5>TABEL DATA DEMOGRAFI BERDASARKAN JENIS KELAMIN</h5>

                                 <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe">

                                    <thead>

                                        <tr>
                                            <tr>
                                            <td rowspan="2" style="vertical-align : middle;text-align:center; ">KELOMPOK</td>
                                            <td colspan="2"  style="vertical-align : middle;text-align:center; " class="title">JUMLAH</td>
                                        </tr>
                                        
                                        <tr>
                                            <td style="vertical-align : middle;text-align:center; ">TOTAL</td>
                                            <td style="vertical-align : middle;text-align:center; ">PERSENTASE</td>
                                            
                                        </tr>    

                                    </thead>

                                    <tbody>

                                       @foreach($data as $key => $datas)
                                        <tr>
                                            <td class="title"><a class="link" href="javascript:void(0)">{{ $datas['jkelamin'] }}</a></td>

                                            <td>{{ $datas['jTotal'] }}</td>

                                            <td>{{ $datas['jPersen'] }}%</td>
                                        </tr>
                                       @endforeach

                                    </tbody>

                                </table>


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
                            
                            <form action="{{url('komentar/gender')}}" method="post" class="horizontal">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input placeholder="Nama" name="nama" type="text">
                                    </div>
                                    <input type="hidden" name="keterangan" value="datagender" >
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
                        </div>-->
                    </div> 

        @endsection

        @section('jss')
<script>
    $(function () {
       
        $.ajax({
            url:"{{ url('statistikJkelamin') }}",
            method: "GET",
            success: function (data){


                    //-------------
                    //- Agama -
                    //-------------

                    var gender = [];

                    for (var i = 0; i < data.dataGender.length; i++) {
                        gender.push(data.dataGender[i].original);
                    }

                    var ctx3 = document.getElementById("gender").getContext("2d");

                    var data3 = gender;



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