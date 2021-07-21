
@extends('master_dashboard')
@section('content')
<!--  -->
@php

$situ = ''; 
$kematian = '';
$domisili = '';
$bedanama = '';
$keteranganjalan = '';
$izinkeramaian = '';
$IMB = '';
$KeteranganKTP = '';
$nonPNS = '';
$KeteranganPindah = '';
$SKCK = '';
$SKTM = '';
$SKTMSekolah = '';
$Usaha = '';
$Ahliwaris = '';
$Pindahnikah = '';
$Profesi = '';
$Penghasilan = '';
$Dispensasinikah = '';
$Kelahiran = '';
$BelumNikah = '';
$PengantarNikah = '';
$IzinOrangtua = '';



if(isset($situActive)){
$situ = 'active';
} elseif(isset($kematianActive)) {
$kematian = 'active';
} elseif(isset($domisiliActive)) {
$domisili = 'active';
} elseif(isset($bedanamaActive)) {
$bedanama = 'active';
} elseif(isset($keteranganjalanActive)) {
$keteranganjalan = 'active';
} elseif(isset($izinkeramaianActive)) {
$izinkeramaian = 'active';
} elseif(isset($IMBActive)) {
$IMB = 'active';
} elseif(isset($KeteranganKTPActive)) {
$KeteranganKTP = 'active';
} elseif(isset($nonPNSActive)) {
$nonPNS = 'active';
} elseif(isset($KeteranganPindahActive)) {
$KeteranganPindah = 'active';
} elseif(isset($SKCKActive)) {
$SKCK = 'active';
} elseif(isset($SKTMActive)) {
$SKTM = 'active';
} elseif(isset($SKTMSekolahActive)) {
$SKTMSekolah = 'active';
} elseif(isset($UsahaActive)) {
$Usaha = 'active';
} elseif(isset($AhliwarisActive)) {
$Ahliwaris = 'active';
} elseif(isset($PindahnikahActive)) {
$Pindahnikah = 'active';
} elseif(isset($ProfesiActive)) {
$Profesi = 'active';
} elseif(isset($PenghasilanActive)) {
$Penghasilan = 'active';
} elseif(isset($DispensasinikahActive)) {
$Dispensasinikah = 'active';
} elseif(isset($KelahiranActive)) {
$Kelahiran = 'active';
} elseif(isset($BelumNikahActive)) {
$BelumNikah = 'active';
} elseif(isset($PengantarNikahActive)) {
$PengantarNikah = 'active';
} elseif(isset($IzinOrangtuaActive)) {
$IzinOrangtua = 'active';
}


@endphp


<div class="col-lg-8">

    <div class="card">

        <div class="card-body">

               <!--  <h4 class="card-title">Pilih jenis surat yang akan diajukan</h4>

                <div class="vtabs">

                  <ul class="sidebar-menu">

                    <li class="menu">

                        <a href="#">Jenis Surat<i class="fa fa-angle-left pull-right"></i></a>

                       

                        <ul class="sub-menu nav nav-tabs "  role="tablist">

                            <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#situ" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Pengantar SITU</span> </a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#kematian" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Keterangan Kematian</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#domisili" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Domisili</span></a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bedanama" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Beda Nama</span></a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#jalan" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Keterangan Jalan</span></a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#keramaian" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Izin Keramaian</span></a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#imb" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat IMB</span></a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#ktp" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Keterangan KTP</span></a> </li>


                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#nonpns" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Keterangan Non PNS</span></a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#pindah" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Keterangan Pindah</span></a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#skck" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Pengantar SKCK</span></a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#sktm" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Keterangan Tidak Mampu</span></a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#sktmsekolah" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Keterangan Tidak Mampu Sekolah</span></a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#usaha" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Keterangan Usaha</span></a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#ahliwaris" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Keterangan Ahli Waris</span></a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profesi" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Keterangan Profesi</span></a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#penghasilan" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Keterangan Penghasilan</span></a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#dispensasinikah" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Dispenasi Waktu Pernikahan</span></a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#pindahnikah" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Rekomendasi Pindah Nikah</span></a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#kelahiran" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Surat Pernyataan Kelahiran</span></a> </li>

                        </ul>
                    </li>
                </ul>
            -->
            <div class="tab-content">
                <!-- SURAT SITU -->

                <div class="tab-pane {{ $situ }}" id="situ" role="tabpanel">

                    <div class="tab-pane p-100">

                        <div class="row">


                            <!--     //"surat" = ''; nama folder dan "situ" = ''; nama file -->
                            @include('surat.situ')


                        </div>

                    </div>

                </div>

                <!-- SURAT IZIN ORANGTUA -->

                <div class="tab-pane {{ $IzinOrangtua }}" id="izinorangtua" role="tabpanel">

                    <div class="tab-pane p-100">

                        <div class="row">


                            <!--     //"surat" = ''; nama folder dan "situ" = ''; nama file -->
                            @include('surat.izinorangtua')


                        </div>

                    </div>

                </div>

                <!-- SURAT BELUM PERNAH MENIKAH -->

                <div class="tab-pane {{ $BelumNikah }}" id="belumnikah" role="tabpanel">

                    <div class="tab-pane p-100">

                        <div class="row">


                            <!--     //"surat" = ''; nama folder dan "situ" = ''; nama file -->
                            @include('surat.belumnikah')


                        </div>

                    </div>

                </div>

                <div class="tab-pane {{ $PengantarNikah }}" id="pengantarnikah" role="tabpanel">

                    <div class="tab-pane p-100">

                        <div class="row">


                            <!--     //"surat" = ''; nama folder dan "situ" = ''; nama file -->
                            @include('surat.pengantarnikah')


                        </div>

                    </div>

                </div>

                <!-- SURAT KETERANGAN KEMATIAN -->

                <div class="tab-pane {{ $kematian }} p-100" id="kematian" role="tabpanel">

                    <div class="row">

                        @include('surat.kematian')


                    </div>

                </div>

                <!-- SURAT DOMISILI-->

                <div class="tab-pane {{ $domisili }} p-100" id="domisili" role="tabpanel">

                    <div class="row">

                        @include('surat.domisili')

                    </div>

                </div>

                <!-- SURAT BEDA NAMA -->


                <div class="tab-pane {{ $bedanama }} p-100" id="bedanama" role="tabpanel">

                    <div class="row">

                        @include('surat.bedanama')

                    </div>

                </div>

                <!-- SURAT KETERANGAN JALAN -->
                <div class="tab-pane {{ $keteranganjalan }} p-100" id="jalan" role="tabpanel">

                    <div class="row">

                        @include('surat.jalan')

                    </div>

                </div>

                <!-- SURAT KERAMAIAN -->

                <div class="tab-pane {{ $izinkeramaian }} p-100" id="keramaian" role="tabpanel">

                    <div class="row">

                        @include('surat.keramaian')

                    </div>

                </div>
                <!-- SURAT IMB -->

                <div class="tab-pane {{ $IMB }} p-100" id="imb" role="tabpanel">

                    <div class="row">

                        @include('surat.imb')

                    </div>

                </div>

                <!-- SURAT KTP -->

                <div class="tab-pane {{ $KeteranganKTP }} p-100" id="ktp" role="tabpanel">

                    <div class="row">

                        @include('surat.ktp')

                    </div>

                </div>

                <!-- SURAT NON PNS -->

                <div class="tab-pane {{ $nonPNS }} p-100" id="nonpns" role="tabpanel">

                    <div class="row">

                       @include('surat.nonpns')

                   </div>

               </div>

               <!-- SURAT PINDAH -->

               <div class="tab-pane {{ $KeteranganPindah }} p-100" id="pindah" role="tabpanel">

                <div class="row">

                    @include('surat.pindah')


                </div>

            </div>

            <div class="tab-pane {{ $SKCK }} p-100" id="skck" role="tabpanel">

                <div class="row">

                    @include('surat.skck')


                </div>

            </div>

            <div class="tab-pane {{ $SKTM }} p-100" id="sktm" role="tabpanel">

                <div class="row">

                    @include('surat.sktm')


                </div>

            </div>

            <div class="tab-pane {{ $SKTMSekolah }} p-100" id="sktmsekolah" role="tabpanel">

                <div class="row">

                    @include('surat.sktmsekolah')


                </div>

            </div>

            <div class="tab-pane {{ $Usaha }} p-100" id="usaha" role="tabpanel">

                <div class="row">

                    @include('surat.usaha')


                </div>

            </div>

            <div class="tab-pane {{ $Ahliwaris }} p-100" id="ahliwaris" role="tabpanel">

                <div class="row">

                    @include('surat.ahliwaris')


                </div>

            </div>

            <div class="tab-pane {{ $Pindahnikah }} p-100" id="pindahnikah" role="tabpanel">

                <div class="row">

                    @include('surat.pindahnikah')


                </div>

            </div>

            <div class="tab-pane {{ $Profesi }} p-100" id="profesi" role="tabpanel">

                <div class="row">

                    @include('surat.profesi')


                </div>

            </div>

            <div class="tab-pane {{ $Penghasilan }} p-100" id="penghasilan" role="tabpanel">

                <div class="row">

                    @include('surat.penghasilan')


                </div>

            </div>

            <div class="tab-pane {{ $Dispensasinikah }} p-100" id="dispensasinikah" role="tabpanel">

                <div class="row">

                    @include('surat.dispensasinikah')


                </div>

            </div>

            <div class="tab-pane {{ $Kelahiran }} p-100" id="kelahiran" role="tabpanel">

                <div class="row">

                    @include('surat.kelahiran')


                </div>

            </div>





            <!-- </div> -->

        </div>

    </div>

</div>

</div>



@endsection('content')
@section('js')



<script type="text/javascript">
 console.log('situ')

 $('.nik').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.nik').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})

 $('.nikk').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.nikk').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})

 $('.nikd').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.nikd').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})

 $('.nikbed').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.nikbed').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})

 $('.nikjalan').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.nikjalan').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})

 $('.nikker').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.nikker').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})

 $('.nikimb').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.nikimb').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})

 $('.nikktp').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.nikktp').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})

 $('.niknon').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.niknon').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})


 $('.nikpindah').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.nikpindah').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})


 $('.nikskck').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.nikskck').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})

 $('.nikortu').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.nikortu').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})

 $('.niksktms').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.niksktms').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})

 $('.nikusaha').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.nikusaha').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})


 $('.nikahli').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.nikahli').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})


 $('.nikprofesi').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.nikprofesi').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})

 $('.nikpeng').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.nikpeng').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})

 $('.nikdis').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.nikdis').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})


 $('.niklahir').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.niklahir').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})

 $('.nikpinnikah').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.nikpinnikah').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})

 $('.nikbelnikah').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.nikbelnikah').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})

 $('.niksaksi1').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.niksaksi1').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})

 $('.niksaksi2').change(function(){
    $.ajax({
        url:"{{ url('/situ/nama') }}/"+$('.niksaksi2').val(),
        method:"GET",
        success: function(data){
            $("input[name=nama]").val(data)
        },
        error: function(){
            $("input[name=nama]").val("NIK Anda belum terdaftar")
        }
    })
})


 $('#nik').change(function(){
    $.ajax({
      url:"{{ url('/SuratPengantarPindah/ortu') }}/"+$('#nik').val(),
      method:"GET",
      success: function(data){
        if(data.length == 1){
          $("#ortu").val(data[0].nama)
          $("#nik2").val(data[0].nik)
      } else {
          $("#ortu").val("data orang tua belum terdata")

      }
  }
})
})

 $('#nikSuratKTM').change(function(){
    $.ajax({
      url:"{{ url('/SuratPengantarPindah/ortu') }}/"+$('#nikSuratKTM').val(),
      method:"GET",
      success: function(data){
        if(data.length == 1){
          $("#ortuaSuratKTM").val(data[0].nama)
          $("#nikaSuratKTM").val(data[0].nik)
      } else {
          $("#ortuaSuratKTM").val("data orang tua belum terdata")
          
      }
  }
})
})

 $('#nikSuratKTMS').change(function(){
    $.ajax({
      url:"{{ url('/SuratPengantarPindah/ortu') }}/"+$('#nikSuratKTMS').val(),
      method:"GET",
      success: function(data){
        if(data.length == 1){
          $("#ortuSuratKTMS").val(data[0].nama)
          $("#nikaSuratKTMS").val(data[0].nik)
      } else {
          $("#ortuSuratKTMS").val("data orang tua belum terdata")
          
      }
  }
})
})
// ini kemaren aku tambahin ri
 $('#nikSuratPengantarNikah').change(function(){
    $.ajax({
      url:"{{ url('/SuratPengantarPindah/ortu') }}/"+$('#nikSuratPengantarNikah').val(),
      method:"GET",
      success: function(data){
        if(data.length == 1){
          $("#ortuSuratBelumNikah").val(data[0].nama)
          $("#nikaSuratBelumNikah").val(data[0].nik)
      } else {
          $("#ortuSuratBelumNikah").val("data orang tua belum terdata")
          
      }
  }
})
})


</script>
@endsection