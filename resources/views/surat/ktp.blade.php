                                    <div class="col-lg-12">

                                    	<div class="card">

                                    		<div class="card-body">

                                    			
                                    			<form action="{{ url('ktp') }}" method="POST">

                                    				@csrf

                                    				<div class="form-body">

                                    					<h3 class="card-title">Data Permohonan Surat KTP</h3>

                                    					<hr>

                                    					<div class="row">
                                    						@if(isset($KeteranganKTPError))
                                    						<div class="alert alert-{{ $KeteranganKTPstatus }}">
                                    							<div>{{ $KeteranganKTPError }}</div>
                                    						</div>
                                    						@endif
                                    					</div>

                                    					<div class="row p-t-20">
                                    						<div class="col-md-6">

                                    							<div class="form-group has-success">

                                    								<label class="control-label">Masukkan NIK</label>

                                    								<input type="text" id="" name="nik" class="form-control nikktp form-control-danger" placeholder="input nik anda">

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
