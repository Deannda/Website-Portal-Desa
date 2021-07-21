<div class="col-lg-12">                                    

    <div class="card">

        <div class="card-body">

            <form action="{{ url('NonPNS') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="form-body">

                    <h3 class="card-title">Data Permohonan Surat Keterangan Non PNS</h3>

                    <hr>


                    <div class="row">
                     @if(isset($nonPNSError))
                     <div class="alert alert-{{ $nonPNSstatus }}">
                        <div>{{ $nonPNSError }}</div>
                    </div>
                    @endif
                </div>


                <div class="row p-t-20">
                    <div class="col-md-6">

                        <div class="form-group has-success">

                            <label class="control-label">Masukkan NIK</label>

                            <input type="text" id="" name="nik" class="form-control niknon form-control-danger" placeholder="input nik anda">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Nama</label>

                            <input class="form-control" type="text" name="nama" id="nama_penduduk" disabled="">

                        </select>
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