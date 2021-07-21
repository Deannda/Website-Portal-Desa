
<div class="col-lg-12">

  <div class="card">

    <div class="card-body">


      <form action="{{ url('penghasilan') }}" method="POST" enctype="multipart/form-data">
        <!-- @csrf dibuat di setiap form ya jgn lupa -->
        @csrf

        <div class="form-body">

          <h3 class="card-title">Data Permohonan Surat Keterangan Penghasilan</h3>

          <hr>
          <div class="row">
           @if(isset($PenghasilanError))
           <div class="alert alert-{{ $Penghasilanstatus }}">
            <div>{{ $PenghasilanError }}</div>
          </div>
          @endif
        </div>
        <div class="row p-t-20">

          <div class="col-md-6">

            <div class="form-group has-success">

              <label class="control-label">Masukkan NIK</label>

              <input type="text" id="nik" name="nik" class="form-control nikpeng form-control-danger" placeholder="input nik anda">

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

            <label class="control-label"> Jumlah Penghasilan </label>

            <input type="text" id="" name="jumlah_penghasilan" class="form-control form-control-danger" placeholder="input NIP/NIK">

          </div>

        </div>

        <div class="col-md-6">

         <div class="form-group has-success">

          <label>Saksi I:</label>

          <input type="text" id="" name="saksi1" class="form-control form-control-danger" placeholder="input nik anda">

        </select>

      </div>

    </div>

    <div class="col-md-6">

      <div class="form-group has-success">

        <label>Saksi II:</label>

        <input type="text" id="" name="saksi2" class="form-control form-control-danger" placeholder="input nik anda">

      </select>

    </div>

  </div>

  <div class="col-md-6">

   <div class="form-group has-success">

    <label>Saksi III:</label>

    <input type="text" id="" name="saksi3" class="form-control form-control-danger" placeholder="input nik anda">

  </select>

</div>

</div>

<div class="col-md-6">

  <div class="form-group has-success">

    <label class="control-label"> Sebagai </label>

    <input type="text" id="" name="sebagai3" class="form-control form-control-danger" placeholder="input tujuan pindah ">

  </div>

</div>

<div class="col-md-6">

 <div class="form-group has-success">
  
  <label>Saksi IV:</label>

  <input type="text" id="" name="saksi4" class="form-control form-control-danger" placeholder="input nik anda">

</select>

</div>

</div>

<div class="col-md-6">

  <div class="form-group has-success">

   <label class="control-label"> Sebagai </label>

   <input type="text" id="" name="sebagai4" class="form-control form-control-danger" placeholder="input tujuan pindah ">

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

