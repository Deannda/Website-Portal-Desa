<div class="col-lg-12">                                    

    <div class="card">

        <div class="card-body">

            <form action="{{ url('domisili') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="form-body">

                    <h3 class="card-title">Permohonan Surat Keterangan Domisili</h3>
                    <code><strong><u>lampiran syarat: KTP & KK yang masih berlaku</u></strong></code>

                    <hr>

                    <div class="row">
                     @if(isset($domisiliError))
                     <div class="alert alert-{{ $domisilistatus }}">
                        <div>{{ $domisiliError }}</div>
                    </div>
                    @endif
                </div>

                <div class="row p-t-20">
                    <div class="col-md-6">

                        <div class="form-group has-success">

                            <label class="control-label">Masukkan NIK</label>

                            <input type="text" id="" name="nik" class="form-control nikd form-control-danger" placeholder="input nik anda">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Nama</label>

                            <input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

                        </select>
                    </div>
                </div>

<!-- 
                <div class="col-md-6">

                    <div class="form-group">

                        <label class="control-label">Berdomisili Sejak</label>

                        <input type="date" class="form-control" name="tanggal_domisili" placeholder="dd/mm/yyyy">

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