<div class="col-lg-12">

  <div class="card">

    <div class="card-body">

      <form action="{{ url('pindah') }}" method="POST"  enctype="multipart/form-data">

        @csrf

        <div class="form-body">

          <h3 class="card-title">Data Permohonan Surat Keterangan Pindah</h3>

          <hr>

          <div class="row">
           @if(isset($KeteranganPindahError))
           <div class="alert alert-{{ $KeteranganPindahstatus }}">
            <div>{{ $KeteranganPindahError }}</div>
          </div>
          @endif
        </div>

        <div class="row p-t-20">

          <div class="col-md-6">

            <div class="form-group has-success">

              <label class="control-label">Masukkan NIK</label>

              <input type="text" id="nik" name="nik" class="form-control nikpindah form-control-danger" placeholder="input nik anda">

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
          <label>Kepala Keluarga:</label>
          <!-- //untuk menampilkan nama ortu -->
          <input class="form-control" type="text" id="ortu" disabled="">
          <!-- untuk menyimpan nik ortu type hidden jadi gak tampil di form -->
          <input type="hidden" name="nik2" id="nik2">
        </select>
      </div>
    </div>

    <div class="col-md-6">

      <div class="form-group has-success">

        <label class="control-label"> Alamat Tujuan Pindah </label>

        <input type="text" id="" name="alamat_tujuan_pindah" class="form-control form-control-danger" placeholder="input tujuan pindah ">

      </div>

    </div>

    <div class="col-md-6">

      <div class="form-group has-success">

        <label class="control-label"> Jumlah Keluarga yang Pindah </label>

        <input type="text" id="" name="jumlah_keluarga_pindah" class="form-control form-control-danger" placeholder="input jumlah keluarga yang pindah ">

      </div>

    </div>

    <div class="col-md-6">

      <div class="form-group has-success">

        <label class="control-label"> Anggota keluarga yang Pindah </label>

        <input type="text" id="" name="anggota_keluarga_pindah" class="form-control form-control-danger" placeholder="input anggota keluarga yang pindah ">

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
