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
						<h4 class="title">Balik Nama STNK</h4>
					</div>
					<div class="card-content">
						
						<form action="<?=site_url('')?>" id="form_p" name="form_p" method="post" accept-charset="utf-8">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group is-empty">
					                <p>Jenis Balik Nama</p>
					                <select class="form-control" onchange="balik()" name="jenis_b" id="balik_nama" required="">
					                    <option value="">-- SILAHKAN PILIH --</option>
					                    <option value="" disabled=""></option>
										<option value="Pajak Hidup">Pajak Hidup</option>
										<option value="Pajak Normal">Pajak Normal</option>
										<option value="Telat bulanan">Telat bulanan</option>
										<option value="Pajak Telat Lebih dari 1 Tahun">Pajak Telat Lebih dari 1 Tahun</option>
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
							<div class="row" id="pkb_t" style="display: none;">
								<div class="col-md-12">
									<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Lalu</h4>
									<div class="form-group label-floating is-empty">
										<label class="control-label">PKB</label>
										<input type="text" name="pkb" id="pkb_b_t" onkeyup="b_tahun();" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="tahun" style="display: none;">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty" >
										<label class="control-label">Telat Tahun</label>
										<input type="text" name="denda_pkb" style="display: none;" value="25%" id="denda_b_t" onkeyup="b_tahun();">
										<input type="text" name="telat_bln" id="telat_thn" onkeyup="b_tahun();" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="sank_pkb_t" style="display: none;">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Sanksi PKB</label>
										<input type="text" name="sanksi_pkb" disabled="" id="total_pkb_t" class="form-control" required="" value="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="swd_t" style="display: none;">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">SWDKLLJ</label>
										<input type="text" name="swdllj" id="" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="sank_swd_t" style="display: none;">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Sanksi SWDKLLJ</label>
										<input type="text" name="sanksi_swdllj_b" id="" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<!--  End Tahun -->

							<!-- Start Hidup -->
							<div class="row" id="pkb_h" style="display: none;">
								<div class="col-md-12">
									<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Hidup</h4>
									<div class="form-group label-floating is-empty">
										<label class="control-label">PKB</label>
										<input type="text" name="pkb" id="denda_bbn_h" style="display: none;" value="67.0%" onkeyup="b_hidup();">
										<input type="text" name="pkb" id="pkb_b_h" onkeyup="b_hidup();" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="total_h" style="display: none;">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">BBN KB</label>
										<input type="text" name="total" id="total_bbn_h" disabled="" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="adm_stnk_h" style="display: none;">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty" >
										<label class="control-label">Adm STNK</label>
										<input type="text" name="adm_stnk" id="adm_stnk" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<!-- End Hidup -->

							<!-- Start Normal -->
							<div class="row" id="pkb_n" style="display: none;">
								<div class="col-md-12">
									<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Normal</h4>
									<div class="form-group label-floating is-empty">
										<label class="control-label">PKB</label>
										<input type="text" name="pkb" id="denda_b" style="display: none;" value="67%" onkeyup="b_normal();">
										<input type="text" name="pkb" id="pkb_b" onkeyup="b_normal();" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="total_n" style="display: none;">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">BBN KB</label>
										<input type="text" name="total" id="total_b" disabled="" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="swd_n" style="display: none;">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty" >
										<label class="control-label">SWDKLLJ</label>
										<input type="text" name="swdllj" id="swdkllj" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="adm_stnk_n" style="display: none;">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty" >
										<label class="control-label">Adm STNK</label>
										<input type="text" name="adm_stnk" id="adm_stnk" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="cek_plat_n" style="display: none;">
								<div class="col-md-12">
									<div class="checkbox">
										<label>
											<input type="checkbox" id="gantiplat_n" value="ada"> Ganti Plat
										</label>
									</div>
								</div>
							</div>
							<div class="row ganti-plat-n" id="adm_tnkb_n" style="display: none;">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Adm TNKB</label>
										<input type="text" disabled="" name="adm_tnkb" value="100.000" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<!-- End Normal -->

							<!-- Start Bulan -->
							<div class="row" id="pkb_bulan" style="display: none;">
								<div class="col-md-12">
									<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Telat Bulanan</h4>
									<div class="form-group label-floating is-empty">
										<label class="control-label">PKB</label>
										<input type="text" name="pkb" id="denda_bu" style="display: none;" value="67%" onkeyup="b_bulan();">
										<input type="text" name="pkb" id="pkb_bu" onkeyup="b_bulan();" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="bbn_b" style="display: none;">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">BBN KB</label>
										<input type="text" name="total" id="total_bbn_b" disabled="" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="bulan" style="display: none;">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty" >
										<label class="control-label">Telat Bulan</label>
										<input type="text" name="denda_pkb" style="display: none;" value="2%" id="denda_ba" onkeyup="b_bulan();">
										<input type="text" name="telat_bln" id="telat_bln" onkeyup="b_bulan();" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="sank_pkb" style="display: none;">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Sanksi PKB</label>
										<input type="text" name="sanksi_pkb" disabled="" id="total_ba" class="form-control" required="" value="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="swd" style="display: none;">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">SWDKLLJ</label>
										<input type="text" name="swdllj" id="" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="sank_swd" style="display: none;">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Sanksi SWDKLLJ</label>
										<input type="text" name="sanksi_swdllj_b" id="" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="adm_stnk_b" style="display: none;">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty" >
										<label class="control-label">Adm STNK</label>
										<input type="text" name="adm_stnk" id="adm_stnk" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="cek_plat_b" style="display: none;">
								<div class="col-md-12">
									<div class="checkbox">
										<label>
											<input type="checkbox" id="gantiplat" value="ada"> Ganti Plat
										</label>
									</div>
								</div>
							</div>
							<div class="row ganti-plat" id="adm_tnkb_b" style="display: none;">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Adm TNKB</label>
										<input type="text" disabled="" name="adm_tnkb" value="100.000" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<!-- End Bulan -->
							<button type="submit" class="btn btn-info pull-right">Submit</button>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>