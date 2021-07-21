
<div class="col-lg-12">

  <div class="card">

    <div class="card-body">


      <form action="{{ url('sktmsekolah') }}" method="POST" enctype="multipart/form-data">
        <!-- @csrf dibuat di setiap form ya jgn lupa -->
        @csrf

        <div class="form-body">

          <h3 class="card-title">Data Permohonan Surat Keterangan Tidak Mampu</h3>

          <hr>
          <div class="row">
           @if(isset($SKTMSekolahError))
           <div class="alert alert-{{ $SKTMSekolahstatus }}">
            <div>{{ $SKTMSekolahError }}</div>
          </div>
          @endif
        </div>
        <div class="row p-t-20">

          <div class="col-md-6">

            <div class="form-group has-success">

              <label class="control-label">Masukkan NIK</label>

              <input type="text" id="nikSuratKTMS" name="nik" class="form-control niksktms form-control-danger" placeholder="input nik anda">

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

          <label>Anak Dari</label>
          <!-- //untuk menampilkan nama ortu -->
          <input class="form-control" type="text" id="ortuSuratKTMS" disabled="">
          <!-- untuk menyimpan nik ortu type hidden jadi gak tampil di form -->
          <input type="hidden" name="nika" id="nikaSuratKTMS">
        </select>
      </div>
    </div>

    
    <div class="col-md-6">
      <div class="form-group">
        <label>Digunakan untuk:</label>
        <input type="text" id="" name="fungsi" class="form-control form-control-danger" placeholder="input fungsi surat">
      </div>
    </div>


<!--     <div class="col-md-6">

      <div class="form-group has-success">

        <label class="control-label"> Sekolah/Universitas </label>

        <input type="text" id="" name="sek_univ" class="form-control form-control-danger" placeholder="input tujuan surat">

      </div>

    </div>

    <div class="col-md-6">

      <div class="form-group has-success">

        <label class="control-label">Kelas/Jurusan </label>

        <input type="text" id="" name="kel_jur" class="form-control form-control-danger" placeholder="input tujuan surat">

      </div>

    </div> -->



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

