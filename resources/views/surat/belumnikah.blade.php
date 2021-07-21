<div class="col-lg-12">                                    

    <div class="card">

        <div class="card-body">

            <form action="{{ url('belumnikah') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="form-body">

                    <h3 class="card-title">Permohonan Surat Pernyataan/Sumpah Nikah Atau Tidak Terikat Dengan Pernikahan Lain</h3>
                    <code><strong><u>lampiran syarat: KTP & KK yang masih berlaku</u></strong></code>

                    <hr>

                    <div class="row">
                       @if(isset($BelumNikahError))
                       <div class="alert alert-{{ $BelumNikahstatus }}">
                        <div>{{ $BelumNikahError }}</div>
                    </div>
                    @endif
                </div>

                <div class="row p-t-20">
                    <div class="col-md-6">

                        <div class="form-group has-success">

                            <label class="control-label">Masukkan NIK</label>

                            <input type="text" id="" name="nik" class="form-control nikbelnikah form-control-danger" placeholder="input nik anda">

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

                    <label>Ayah</label>
                    <!-- //untuk menampilkan nama ortu -->
                    <input class="form-control" type="text" id="ortuaSuratBelumNikah" disabled="">
                    <!-- untuk menyimpan nik ortu type hidden jadi gak tampil di form -->
                    <input type="hidden" name="nika" id="nikaSuratBelumNikah">
                </select>

            </div>

        </div>

        <div class="col-md-6">

           <div class="form-group">

            <label>Ibu</label>
            <!-- //untuk menampilkan nama ortu -->
            <input class="form-control" type="text" id="ortuaSuratBelumNikah" disabled="">
            <!-- untuk menyimpan nik ortu type hidden jadi gak tampil di form -->
            <input type="hidden" name="nika" id="nikaSuratBelumNikah">
        </select>

    </div>

</div>

<div class="col-md-6">

  <div class="form-group has-success">

    <label class="control-label">Nama Pasangan </label>

    <input type="text" id="" name="nama_pasangan" class="form-control form-control-danger" placeholder="input nama pasangan">

</div>

</div>
<div class="col-md-6">

    <div class="form-group has-success">

        <label class="control-label">Masukkan NIK Saksi I</label>

        <input type="text" id="" name="nik" class="form-control niksaksi1 form-control-danger" placeholder="input nik saksi satu">

    </div>

</div>

<div class="col-md-6">

    <div class="form-group">

        <label>Nama Saksi I</label>

        <input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

    </select>
</div>

</div>

<div class="col-md-6">

    <div class="form-group has-success">

        <label class="control-label">Masukkan NIK Saksi II</label>

        <input type="text" id="" name="nik" class="form-control niksaksi2 form-control-danger" placeholder="input nik saksi dua">

    </div>

</div>

<div class="col-md-6">

    <div class="form-group">

        <label>Nama</label>

        <input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

    </select>
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

    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Ajukan Permohonan</button>

    <button type="button" class="btn btn-inverse">Cancel</button>

</div>

</form>

</div>

</div>

</div>