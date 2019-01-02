<style type="text/css">
.form-group{
	margin-top: 10px;
}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header" style="background-color: #00c0ef;">
						<h4 class="title">Perhitungann Perpanjang STNK</h4>
					</div>
					<div class="card-content">
						
						<form action="<?=site_url('main/proses_perpanjang')?>" id="form_p" name="form_p" method="post" accept-charset="utf-8">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group is-empty">
										<p>Jenis Perpanjang</p>
										<select name="jenis" class="form-control" onchange="perpanjang()" id="balik_nama">
											<option value="" disabled="" selected>-- SILAHKAN PILIH --</option>
											<option value="" disabled=""></option>
											<option value="normal">Normal</option>
											<option value="telat bulanan">Telat bulanan</option>
											<option value="Telat lebih dari setahun">Telat lebih dari setahun</option>
										</select>
										<span class="material-input"></span></div>
									</div>
								</div>
								<!-- Start Tahun -->
								<div id="pkb_tahun">
									<div class="row">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Telat Lebih 1 Tahun</h4>
											<div class="form-group label-floating is-empty">
												<label class="control-label">PKB</label>
												<input type="text" name="pkb3" id="pkb_t" onkeyup="sum_t();" class="form-control rp" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating is-empty">
												<label class="control-label">Telat Tahun</label>
												<input type="text" style="display: none;" id="denda" name="telat_thn" onkeyup="sum_t();" class="form-control" value="25%">
												<input type="text" name="telat_thn" id="telat_thn" onkeyup="sum_t();" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" >
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Sanksi PKB</label>
												<input type="text" name="sanksi_pkb2" readonly id="hasil" class="form-control"  value="">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating is-empty" >
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj3" id="swdkllj_t" onkeyup="harga_tahun()" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating is-empty">
												<label class="control-label">Sanksi SWDKLLJ</label>
												<input type="text" name="sanski_swdllj2" id="rupiah" onkeyup="harga_tahun()" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
								</div>
								<!-- End Tahun -->
								
								<!-- Start Normal -->
								<div id="pkb_n">

									<div class="row">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Normal</h4>
											<div class="form-group label-floating is-empty">
												<label class="control-label">PKB</label>
												<input type="text" name="pkb1" id="pkb_nor" onkeyup="normal();" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" >
										<div class="col-md-12">
											<div class="form-group label-floating is-empty" >
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj1" id="swdkllj" onkeyup="normal();" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
								</div>
								<!-- End Normal -->

								<!-- Start Bulan -->
								<div id="pkb_bulan">
									<div class="row" >
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Telat Bulanan</h4>
											<div class="form-group label-floating is-empty">
												<label class="control-label">PKB</label>
												<input type="text" name="pkb2" id="pkb2" onkeyup="sum();" class="form-control rp" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating is-empty" >
												<label class="control-label">Telat Bulan</label>
												<input type="text" style="display: none;" id="denda_b" name="telat_bln" onkeyup="sum();" class="form-control" value="2%">
												<input type="text" name="telat" id="t_bln" onkeyup="sum();" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Sanksi PKB</label>
												<input type="text" name="sanksi_pkb1" readonly="" id="txt4" class="form-control"  value="">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating is-empty" >
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj2" id="swdkllj_b" onkeyup="hargatotal();" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating is-empty">
												<label class="control-label">Sanksi SWDKLLJ</label>
												<input type="text" name="sanski_swdllj1" id="rupiah2" onkeyup="hargatotal();" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
								</div>
								<!-- End Bulan -->

								<!-- Start Ganti Plat -->
								<div id="cek_plat">
									<div class="row" >
										<div class="col-md-12">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="ganti" id="gantiplat" value="ada"> Ganti Plat
												</label>
											</div>
										</div>
									</div>
									<div class="ganti-plat">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k" name="jenis_k"  onchange="ambilselect()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span></div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label">Adm STNK</label>
														<input type="text" readonly="" name="adm_stnk" id="adm_stnk" class="form-control" >
														<span class="material-input"></span>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label">Adm TNKB</label>
														<input type="text" readonly="" name="adm_tnkb" id="adm_tnkb"  class="form-control" >
														<span class="material-input"></span>
													</div>
												</div>
											</div>

										</div>
									</div>
									<!-- End Ganti Plat -->

									<div class="row" id="total">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Total</label>
												<input type="text" name="total" readonly id="total_harga" class="form-control" >
												<span class="material-input"></span>
											</div>
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