        <div class="col-lg-12">

                <div class="card">

                <div class="card-body">


                <form action="{{ url('usaha') }}" method="POST" enctype="multipart/form-data">
                <!-- @csrf dibuat di setiap form ya jgn lupa -->
                @csrf

                <div class="form-body">

                <h3 class="card-title">Data Permohonan Surat Keterangan Usaha</h3>

                <hr>
                <div class="row">
                @if(isset($UsahaError))
                <div class="alert alert-{{ $Usahastatus }}">
                <div>{{ $UsahaError }}</div>
                </div>
                @endif
                </div>
                <div class="row p-t-20">

                <div class="col-md-6">

                <div class="form-group has-success">

                <label class="control-label">Masukkan NIK</label>

                <input type="text" name="nik" onkeyup="nikP()" class="form-control nikk form-control-danger" placeholder="input nik anda">

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

                <label class="control-label"> Jenis Usaha </label>

                <input type="text" id="" name="jenis_usaha" class="form-control form-control-danger" placeholder="input jenis usaha">

                </div>

                </div>

                <div class="col-md-6">

                <div class="form-group has-success">

                <label class="control-label">Luas Lahan usaha </label>

                <input type="text" id="" name="luas_lahan" class="form-control form-control-danger" placeholder="input luas lahan usaha">

                </div>

                </div>

                <div class="col-md-6">

                <div class="form-group has-success">

                <label class="control-label">Alamat Usaha </label>

                <input type="text" id="" name="alamat_usaha" class="form-control form-control-danger" placeholder="input tujuan surat">

                </div>

                </div>

                <div class="col-md-6">

                <div class="form-group has-success">

                <label class="control-label">Tujuan pembuatan surat</label>

                <input type="text" id="" name="fungsi" class="form-control form-control-danger" placeholder="tujuan diajukannya permohonan surat">

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