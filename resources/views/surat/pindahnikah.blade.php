
<div class="col-lg-12">

  <div class="card">

    <div class="card-body">


      <form action="{{ url('pindahnikah') }}" method="POST" enctype="multipart/form-data">
        <!-- @csrf dibuat di setiap form ya jgn lupa -->
        @csrf

        <div class="form-body">

          <h3 class="card-title">Data Permohonan Surat Rekomendasi Pindah Nikah</h3>

          <hr>
          <div class="row">
           @if(isset($PindahnikahError))
           <div class="alert alert-{{ $Pindahnikahstatus }}">
            <div>{{ $PindahnikahError }}</div>
          </div>
          @endif
        </div>
        <div class="row p-t-20">

          <div class="col-md-6">

            <div class="form-group has-success">

              <label class="control-label">Masukkan NIK</label>

              <input type="text" id="nik" name="nik" class="form-control nikpinnikah form-control-danger" placeholder="input nik anda">

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">

              <label>Nama</label>

              <input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

            </select>
          </div>

        </div>


<!--           <div class="col-md-6">

            <div class="form-group has-success">

              <label class="control-label"> Lampiran </label>

              <input type="text" id="" name="lampiran" class="form-control form-control-danger" placeholder="input lampiran">

            </div>

          </div> -->

          <div class="col-md-6">

            <div class="form-group has-success">

              <label class="control-label">Kepada Penghulu Kampung </label>

              <input type="text" id="" name="kepada" class="form-control form-control-danger" placeholder="input tujuan surat">

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group has-success">

              <label class="control-label"> Di </label>

              <input type="text" id="" name="di" class="form-control form-control-danger" placeholder="input tempat tujuan surat">

            </div>

          </div>
          <div class="col-md-6">

            <div class="form-group has-success">

              <label class="control-label">Desa/Kelurahan </label>

              <input type="text" id="" name="desa_kel" class="form-control form-control-danger" placeholder="input Desa/Kelurahan ">

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group has-success">

              <label class="control-label">Kecamatan</label>

              <input type="text" id="" name="kecamatan" class="form-control form-control-danger" placeholder="input kecamatan">

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group has-success">

              <label class="control-label">Kabupaten</label>

              <input type="text" id="" name="kabupaten" class="form-control form-control-danger" placeholder="input kabupaten">

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

