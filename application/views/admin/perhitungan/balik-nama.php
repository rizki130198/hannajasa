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
							<div class="row" id="pkb_n" style="display: none;">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">PKB</label>
										<input type="text" name="pkb" id="denda_b" style="display: none;" value="67%" onkeyup="b_normal();" class="form-control rp">
										<input type="text" name="pkb" id="pkb_b" onkeyup="b_normal();" class="form-control rp" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="pkb_bulan" style="display: none;">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">PKB</label>
										<input type="text" name="pkb" id="denda_bu" style="display: none;" value="2%" onkeyup="b_bulan();" class="form-control rp">
										<input type="text" name="pkb" id="pkb_bu" onkeyup="b_bulan();" class="form-control rp" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="total_n" style="display: none;">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label">BBN KB</label>
										<input type="text" name="total" id="total_bu" disabled="" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="bulan" style="display: none;">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty" >
										<label class="control-label">Telat Bulan</label>
										<input type="text" name="denda_pkb" style="display: none;" value="2%" id="denda_ba" class="form-control" onkeyup="b_bulan();">
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
							<div class="row" id="swd_n" style="display: none;">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty" >
										<label class="control-label">SWDKLLJ</label>
										<input type="text" name="swdllj" id="swdkllj" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="sank_swd" style="display: none;">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Sanksi SWDKLLJ</label>
										<input type="text" name="swdllj" id="rupiah4" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row" id="adm_n" style="display: none;">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty" >
										<label class="control-label">Adm STNK</label>
										<input type="text" name="adm_stnk" id="adm_stnk" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-info pull-right">Daftar</button>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>