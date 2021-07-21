<!DOCTYPE html>
<html lang="en">
@extends('master')
@section('content')
<!--  -->

<div class="row">

    <div class="col-md-12">

        <div class="card">

            <div class="card-body">

                <div class="d-flex no-block align-items-center">

                    <div class="col-md-12 border-bottom">
                        <h2><b><center>STATISTIK DATA BERDASARKAN JENIS KELAMIN</center></b></h2>

                    </div>
                </div>



                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h4 class="card-title">CHART AGAMA</h4> -->
                            <div>
                                <canvas id="jkelamin" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br>

                <!-- Column -->

                        <div class="card">

                            <div class="card-body">

                                <h4 class="card-title">TABEL DATA DEMOGRAFI BERDASAR JENIS KELAMIN</h4>

                                <!-- <h6 class="card-subtitle">The Column Swipe Table allows the user to select which columns they want to be visible.</h6> -->

                                <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe">

                                      <thead>

                                        <tr>
                                            <tr>
                                            <td rowspan="2" style="vertical-align : middle;text-align:center;">KELOMPOK</td>
                                            <td colspan="2"  style="vertical-align : middle;text-align:center;" class="title">JUMLAH</td>
                                            <!-- <td colspan="2"  style="vertical-align : middle;text-align:center;" class="title">LAKI-LAKI</td>
                                            <td colspan="2"  style="vertical-align : middle;text-align:center;" class="title">PEREMPUAN</td> -->
                                        </tr>
                                        
                                        <tr>
                                            <td style="vertical-align : middle;text-align:center;">TOTAL</td>
                                            <td style="vertical-align : middle;text-align:center;">PERSENTASE</td>
                                            <!--  <td style="vertical-align : middle;text-align:center;">JUMLAH</td>
                                            <td style="vertical-align : middle;text-align:center;">PERSENTASE</td>
                                             <td style="vertical-align : middle;text-align:center;">JUMLAH</td>
                                            <td style="vertical-align : middle;text-align:center;">PERSENTASE</td> -->

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

                        </div>

            </div>

        </div>
    </div>





</div>

@endsection('content')
@section('js')
<script>
    $(function () {
       
        $.ajax({
            url:"{{ url('statistikJkelamin') }}",
            method: "GET",
            success: function (data){


                    //-------------
                    //- Agama -
                    //-------------

                    var jkelamin = [];

                    for (var i = 0; i < data.dataJkelamin.length; i++) {
                        jkelamin.push(data.dataJkelamin[i].original);
                    }

                    var ctx3 = document.getElementById("jkelamin").getContext("2d");

                    var data3 = jkelamin;


var myPieChart = new Chart(ctx3).Pie(data3,{

                        segmentShowStroke : true,

                        segmentStrokeColor : "#fff",

                        segmentStrokeWidth : 0,

                        animationSteps : 100,

                        tooltipCornerRadius: 0,

                        animationEasing : "easeOutBounce",

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
