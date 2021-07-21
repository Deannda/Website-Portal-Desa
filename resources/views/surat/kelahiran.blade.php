<div class="col-lg-12"> 

    <div class="card">

        <div class="card-body">

            <form action="{{ url('kelahiran') }}" method="POST"  enctype="multipart/form-data">

                @csrf

                <div class="form-body">

                    <h3 class="card-title">Data Permohonan Surat Pernyataan Kelahiran</h3>

                    <hr>

                    <div class="row">
                     @if(isset($KelahiranError))
                     <div class="alert alert-{{ $Kelahiranstatus }}">
                        <div>{{ $KelahiranError }}</div>
                    </div>
                    @endif
                </div>

                <div class="row p-t-20">

                    <div class="col-md-6">

                        <div class="form-group has-success">

                            <label class="control-label">Masukkan NIK</label>

                            <input type="text" id="" name="nik" class="form-control niklahir form-control-danger" placeholder="input nik anda">

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

                    <div class="form-group">

                        <label class="control-label">Tanggal Lahir</label>

                        <input type="date" name="tanggal_lahir" class="form-control" placeholder="dd/mm/yyyy">

                    </div>

                </div>


                <div class="col-md-6">

                  <div class="form-group has-success">

                    <label class="control-label">Tempat Lahir</label>

                    <input type="text" id="" name="tempat_lahir" class="form-control" placeholder="input tempat kelahiran">

                </div>

            </div>


            <div class="col-md-6">

                <div class="form-group has-success">

                    <label class="control-label"> Ayah</label>

                    <input type="text" id="" name="ayah" class="form-control form-control-danger" placeholder="input nik ayah ">

                </div>

            </div>

            <div class="col-md-6">

                <div class="form-group has-success">

                    <label class="control-label"> Ibu</label>

                    <input type="text" id="" name="ibu" class="form-control form-control-danger" placeholder="input nik ibu ">

                </div>

            </div>


            <div class="col-md-6">

              <div class="form-group has-success">

                <label class="control-label">Anak</label>

                <input type="text" id="" name="anak" class="form-control" placeholder="input nama anak">

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

    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Ajukan Permohonan</button>

    <button type="button" class="btn btn-inverse">Cancel</button>

</div>

</form>

</div>

</div>

</div>