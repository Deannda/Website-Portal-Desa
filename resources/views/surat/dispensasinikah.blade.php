                                    <div class="col-lg-12">

                                      <div class="card">

                                        <div class="card-body">

                                          <form action="{{ url('dispensasinikah') }}" method="POST"  enctype="multipart/form-data">

                                            @csrf

                                            <div class="form-body">

                                              <h3 class="card-title">Data Permohonan Surat Dispensasi Waktu Pernikahan</h3>

                                              <hr>

                                              <div class="row">
                                               @if(isset($DispensasinikahError))
                                               <div class="alert alert-{{ $Dispensasinikahstatus }}">
                                                <div>{{ $DispensasinikahError }}</div>
                                              </div>
                                              @endif
                                            </div>

                                            <div class="row p-t-20">

<!-- 
                                              <div class="col-md-6">

                                                <div class="form-group has-success">

                                                  <label class="control-label"> Lampiran </label>

                                                  <input type="text" id="" name="lampiran" class="form-control form-control-danger" placeholder="input jumlah lampiran ">

                                                </div>

                                              </div> -->

                                              <div class="col-md-6">

                                                <div class="form-group has-success">

                                                  <label>Keterangan Surat Dispensasi</label>

                                                  <input type="text" id="" name="keterangan" class="form-control form-control-danger" placeholder="input keterangan ">

                                                </div>

                                              </div>

                                              <div class="col-md-6">

                                                <div class="form-group">

                                                  <label class="control-label">Tanggal Pernikahan</label>

                                                  <input type="date" name="tanggal_nikah" class="form-control" placeholder="dd/mm/yyyy">

                                                </div>

                                              </div>

                                              <div class="col-md-6">

                                                <div class="form-group has-success">

                                                  <label>Sebagai Calon</label>

                                                  <input type="text" id="" name="sebagai1" class="form-control form-control-danger" placeholder="input sebagai calon pria/wanita ">

                                                </div>

                                              </div>

                                              <div class="col-md-6">

                                                <div class="form-group has-success">

                                                  <label class="control-label">Masukkan NIK</label>

                                                  <input type="text" id="nik" name="nik" class="form-control nikdis form-control-danger" placeholder="input nik anda">

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

                                                <label>Sebagai Calon</label>

                                                <input type="text" id="" name="sebagai2" class="form-control form-control-danger" placeholder="input sebagai calon pria/wanita ">

                                              </div>

                                            </div>

                                            <div class="col-md-6">

                                              <div class="form-group has-success">

                                                <label>Nama</label>

                                                <input type="text" id="" name="nama" class="form-control form-control-danger" placeholder="input nama calon ">
                                              </div>

                                            </div>


                                            <div class="col-md-6">

                                              <div class="form-group has-success">

                                                <label>Tempat Lahir</label>

                                                <input type="text" id="" name="tempat_lahir" class="form-control form-control-danger" placeholder="input jumlah lampiran ">

                                              </div>

                                            </div>


                                            <div class="col-md-6">

                                              <div class="form-group">

                                                <label class="control-label">Tanggal Lahir</label>

                                                <input type="date" name="tanggal_lahir" class="form-control" placeholder="dd/mm/yyyy">

                                              </div>

                                            </div>

                                            <div class="col-md-6">

                                              <div class="form-group has-success">

                                                <label>Warga Negara</label>

                                                <input type="text" id="" name="warga" class="form-control form-control-danger" placeholder="input warga negara ">

                                              </div>

                                            </div>

                                            <div class="col-md-6">

                                              <div class="form-group has-success">

                                                <label>Agama</label>

                                                <input type="text" id="" name="agama" class="form-control form-control-danger" placeholder="input agama ">

                                              </div>

                                            </div>

                                            <div class="col-md-6">

                                              <div class="form-group has-success">

                                                <label>Status Perkawinan</label>

                                                <input type="text" id="" name="status" class="form-control form-control-danger" placeholder="input status perkawinan ">

                                              </div>

                                            </div>

                                            <div class="col-md-6">

                                              <div class="form-group has-success">

                                                <label>Alamat</label>

                                                <input type="text" id="" name="alamat" class="form-control form-control-danger" placeholder="input alamat ">

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

