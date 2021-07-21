
<div class="col-lg-12">

  <div class="card">

    <div class="card-body">


      <form action="{{ url('profesi') }}" method="POST" enctype="multipart/form-data">
        <!-- @csrf dibuat di setiap form ya jgn lupa -->
        @csrf

        <div class="form-body">

          <h3 class="card-title">Data Permohonan Surat Keterangan Profesi</h3>

          <hr>
          <div class="row">
           @if(isset($ProfesiError))
           <div class="alert alert-{{ $Profesistatus }}">
            <div>{{ $ProfesiError }}</div>
          </div>
          @endif
        </div>
        <div class="row p-t-20">

          <div class="col-md-6">

            <div class="form-group has-success">

              <label class="control-label">Masukkan NIK</label>

              <input type="text" id="nik" name="nik" class="form-control nikprofesi form-control-danger" placeholder="input nik anda">

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group has-success">

              <label class="control-label"> NIP/NIK </label>

              <input type="text" id="" name="nip_nik" class="form-control form-control-danger" placeholder="input NIP/NIK">

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

            <label class="control-label">Digunakan Sebagai </label>

            <input type="text" id="" name="fungsi" class="form-control form-control-danger" placeholder="input tujuan surat">

          </div>

        </div>

        <div class="col-md-6">

          <div class="form-group has-success">

            <label>Keterangan Profesi</label>

            <textarea class="form-control" name="keterangan_profesi" rows="5"></textarea>

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

