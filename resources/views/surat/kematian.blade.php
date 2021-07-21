<div class="col-lg-12">                                

    <div class="card">

        <div class="card-body">

            <form action="{{ url('kematian') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="form-body">

                    <h3 class="card-title">Permohonan Surat Keterangan Kematian</h3>

                    <hr>

                    <div class="row">
                     @if(isset($kematianError))
                     <div class="alert alert-{{ $kematianstatus }}">
                        <div>{{ $kematianError }}</div>
                    </div>
                    @endif
                </div>

                <div class="row p-t-20">

                    <div class="col-md-6">

                        <div class="form-group has-success">

                            <label class="control-label">Masukkan NIK</label>

                            <input type="text" id="" name="nik" class="form-control nikk form-control-danger" placeholder="input nik anda">

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

                        <label class="control-label">Tanggal Kematian</label>

                        <input type="date" name="tanggal_kematian" class="form-control" placeholder="dd/mm/yyyy">

                    </div>

                </div>


                <div class="col-md-6">

                  <div class="form-group has-success">

                    <label class="control-label">Tempat Kematian</label>

                    <input type="text" id="" name="tempat_kematian" class="form-control" placeholder="input tempat kematian">

                </div>

            </div>


            <div class="col-md-6">

              <div class="form-group has-success">

                <label class="control-label">Sebab Kematian </label>

                <input type="text" id="" name="sebab_kematian" class="form-control form-control-danger" placeholder="input sebab kematian ">

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