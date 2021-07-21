<div class="col-lg-12">                                    

    <div class="card">

        <div class="card-body">

            <form action="{{ url('izinkeramaian') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="form-body">

                    <h3 class="card-title">Permohonan Surat Izin Hiburan/Keramaian</h3>

                    <hr>

                    <div class="row">
                       @if(isset($izinkeramaianError))
                       <div class="alert alert-{{ $izinkeramaianstatus }}">
                        <div>{{ $izinkeramaianError }}</div>
                    </div>
                    @endif
                </div>

                <div class="row p-t-20">
                    <div class="col-md-6">

                        <div class="form-group has-success">

                            <label class="control-label">Masukkan NIK</label>

                            <input type="text" id="" name="nik" class="form-control nikker form-control-danger" placeholder="input nik anda">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Nama</label>

                            <input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

                        </select>
                    </div>
                </div>

                <div class="col-md-6">

                  <div class="form-group has-success">

                    <label class="control-label">Kepada </label>

                    <input type="text" id="" name="kepada" class="form-control form-control-danger" placeholder="input tujuan surat">

                </div>

            </div>


            <div class="col-md-6">

              <div class="form-group has-success">

                <label class="control-label"> Di </label>

                <input type="text" id="" name="di" class="form-control form-control-danger" placeholder="input tempat tujuan ">

            </div>

        </div>


 <!--        <div class="col-md-6">

          <div class="form-group has-success">

            <label class="control-label"> Lampiran </label>

            <input type="text" id="" name="lampiran" class="form-control form-control-danger" placeholder="input lampiran">

        </div>

    </div> -->


    <div class="col-md-6">

      <div class="form-group has-success">

        <label class="control-label"> Acara </label>

        <input type="text" id="" name="acara" class="form-control form-control-danger" placeholder="input acara yang akan diselenggarakan ">

    </div>

</div>

<div class="col-md-6">

    <div class="form-group">

        <label class="control-label">Tanggal Acara</label>

        <input type="date" class="form-control" name="tanggal_acara" placeholder="dd/mm/yyyy">

    </div>

</div>


<div class="col-md-6">

  <div class="form-group has-success">

    <label class="control-label"> Waktu </label>

    <input type="text" id="" name="waktu_acara" class="form-control form-control-danger" placeholder="input waktu acara  ">

</div>

</div>


<div class="col-md-6">

  <div class="form-group has-success">

    <label class="control-label"> Tempat </label>

    <input type="text" id="" name="tempat_acara" class="form-control form-control-danger" placeholder="input tempat acara ">

</div>

</div>

<div class="col-md-12">

    <div class="form-group has-success">

     <label for="exampleInputFile">Upload Lampiran Syarat</label><br>

     <h6><code>Lampiran Syarat dibuat menjadi satu file dalam format pdf </code></h6>

     <input type="file" name="file_syarat" >

 </div>

</div>

</div>

</div>

<div class="form-actions">

    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Ajukan permohonan</button>

    <button type="button" class="btn btn-inverse">Cancel</button>

</div>

</form>

</div>

</div>

</div>