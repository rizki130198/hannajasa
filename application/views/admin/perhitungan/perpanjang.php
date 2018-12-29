<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header" style="background-color: #00c0ef;">
						<h4 class="title">Perpanjang STNK</h4>
					</div>
					<div class="card-content">
						
						<form action="<?=site_url('')?>" id="form_p" name="form_p" method="post" accept-charset="utf-8">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group is-empty">
										<p>Jenis Perpanjang</p>
										<select class="form-control" onchange="balik()" name="jenis_p" id="balik_nama" required="">
											<option value="">-- SILAHKAN PILIH --</option>
											<option value="" disabled=""></option>
											<option value="normal">Normal</option>
											<option value="telat bulanan">Telat bulanan</option>
											<option value="Telat lebih dari setahun">Telat lebih dari setahun</option>
										</select>
										<span class="material-input"></span></div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group is-empty">
											<p>Jenis Kendaraan</p>
											<select class="form-control" name="jenis_k" required="">
												<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
												<option value="" disabled=""></option>
												<option value="cashier">Motor</option>
												<option value="orang lapangan">Mobil</option>
												<option value="super admin">Mobil Box</option>
											</select>
											<span class="material-input"></span></div>
										</div>
									</div>
									<!-- Start Tahun -->
									<div id="pkb_tahun"  style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Telat Lebih 1 Tahun</h4>
												<div class="form-group label-floating is-empty">
													<label class="control-label">PKB</label>
													<input type="text" name="pkb" id="pkb_t" onkeyup="sum_t();" class="form-control rp" required="">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group label-floating is-empty">
													<label class="control-label">Telat Tahun</label>
													<input type="text" style="display: none;" id="denda" name="telat_thn" onkeyup="sum_t();" class="form-control" value="25%">
													<input type="text" name="telat_thn" id="telat_thn" onkeyup="sum_t();" class="form-control" required="">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
										<div class="row" >
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label">Sanksi PKB</label>
													<input type="text" name="sanksi_pkb" disabled="" id="hasil" class="form-control" required="" value="">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group label-floating is-empty" >
													<label class="control-label">SWDKLLJ</label>
													<input type="text" name="swdllj" id="swdkllj_t" onkeyup="sum_t();" class="form-control" required="">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group label-floating is-empty">
													<label class="control-label">Sanksi SWDKLLJ</label>
													<input type="text" name="swdllj" id="rupiah4" class="form-control" required="">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<!-- End Tahun -->

									<!-- Start Normal -->
									<div id="pkb_n" style="display: none;">
										
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Normal</h4>
												<div class="form-group label-floating is-empty">
													<label class="control-label">PKB</label>
													<input type="text" name="pkb" id="pkb_nor" onkeyup="normal();" class="form-control" required="">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
										<div class="row" >
											<div class="col-md-12">
												<div class="form-group label-floating is-empty" >
													<label class="control-label">SWDKLLJ</label>
													<input type="text" name="swdllj" id="swdkllj" onkeyup="normal();" class="form-control" required="">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<!-- End Normal -->

									<!-- Start Bulan -->
									<div id="pkb_bulan" style="display: none;">
										<div class="row" >
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Telat Bulanan</h4>
												<div class="form-group label-floating is-empty">
													<label class="control-label">PKB</label>
													<input type="text" name="pkb" id="txt1" onkeyup="sum();" class="form-control rp" required="">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group label-floating is-empty" >
													<label class="control-label">Telat Bulan</label>
													<input type="text" style="display: none;" id="txt2" name="telat_bln" onkeyup="sum();" class="form-control" value="2%">
													<input type="text" name="telat_bln" id="txt3" onkeyup="sum();" class="form-control" required="">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label">Sanksi PKB</label>
													<input type="text" name="sanksi_pkb" disabled="" id="txt4" class="form-control" required="" value="">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group label-floating is-empty" >
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj" id="swdkllj_b" onkeyup="sum();" class="form-control" required="">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating is-empty">
												<label class="control-label">Sanksi SWDKLLJ</label>
												<input type="text" name="swdllj" id="rupiah4" class="form-control" required="">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<!-- End Bulan -->
									<div class="row" id="total_n" style="display: none;">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Total</label>
												<input type="text" name="total" id="total" disabled="" class="form-control" required="">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-info pull-right">Submit</button>
								<div class="clearfix"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>