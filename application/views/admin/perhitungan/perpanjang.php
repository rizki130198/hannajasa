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
										<select name="jenis" class="form-control" onchange="perpanjang()" id="perpanjang_p">
											<option value="" disabled="" selected>-- SILAHKAN PILIH --</option>
											<option value="" disabled=""></option>
											<option value="normal">Normal</option>
											<option value="telat bulanan">Telat bulanan</option>
											<option value="Telat lebih dari setahun">Telat lebih dari setahun</option>
										</select>
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group is-empty">
										<p>Jenis Kendaraan</p>
										<select class="form-control" required name="jenis_swd" onchange="ambilSwdk()" id="ambiltahun">
											<option value="" disabled="" selected>-- SILAHKAN PILIH JENIS KENDARAAN --</option>
											<option value="" disabled=""></option>
											<?php foreach ($catat->result() as $key): ?>
												<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
											<?php endforeach ?>
										</select>
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<!-- Start Tahun -->
							<div id="pkb_tahun" style="display: none;">
								<div class="row">
									<div class="col-md-12">
										<h4 style="font-weight: bold;text-transform: uppercase;">Telat Lebih 1 Tahun</h4>
										<div class="form-group label-floating is-empty jum-t">
											<label class="control-label">PKB</label>
											<input type="text" name="pkb3" id="pkb_t" onkeyup="m_sum_t();" class="form-control jumlah_t" >
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group label-floating is-empty">
											<label class="control-label">Telat Tahun</label>
											<input type="text" style="display: none;" id="denda" name="telat_thn" class="form-control" value="0.25%">
											<input type="text" name="telat_thn" id="telat_thn" onkeyup="m_sum_t();" class="form-control" >
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" >
									<div class="col-md-12">
										<div class="form-group jum-t">
											<label class="control-label">Sanksi PKB</label>
											<input type="text" name="sanksi_pkb2" readonly id="hasil_tahun" class="form-control jumlah_t"  value="">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group jum-t">
											<label class="control-label">SWDKLLJ</label>
											<input type="text" name="swdllj3" id="swdkllj_t" onkeyup="harga_tahun()" class="form-control swdklksama jumlah_t">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group jum-t">
											<label class="control-label">Sanksi SWDKLLJ</label>
											<input type="text" name="sanski_swdllj2" onkeyup="harga_tahun()" class="form-control sankswd jumlah_t">
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
										<div class="form-group label-floating is-empty jum-n jum-t">
											<label class="control-label">PKB</label>
											<input type="text" name="pkb1" class="form-control jumlah_n jumlah_t">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" >
									<div class="col-md-12">
										<div class="form-group jum-n jum-t">
											<label class="control-label">SWDKLLJ</label>
											<input type="text" readonly="" name="swdllj1" class="form-control swdklksama jumlah_n jumlah_t">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" id="total">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Total</label>
											<input type="text" name="total" readonly id="sum_n" class="form-control" >
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
										<div class="form-group label-floating is-empty jum-b jum-t">
											<label class="control-label">PKB</label>
											<input type="text" style="display: none;" id="denda_bu" name="telat_bln" onkeyup="sum_p();" class="form-control" value="0.02%">
											<input type="text" name="pkb2" id="pkb2" onkeyup="sum_p();" class="form-control jumlah_biaya jumlah_t">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group label-floating is-empty">
											<label class="control-label">Telat Bulan</label>
											<input type="text" name="telat" id="t_bln" onkeyup="sum_p();" class="form-control" >
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group jum-b jum-t">
											<label class="control-label">Sanksi PKB</label>
											<input type="text" name="sanksi_pkb1" id="sum_bulan" class="form-control jumlah_biaya jumlah_t">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group jum-b jum-t">
											<label class="control-label">SWDKLLJ</label>
											<input type="text" name="swdllj2" id="swdkllj_b" class="form-control swdklksama jumlah_biaya jumlah_t">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group jum-b jum-t">
											<label class="control-label">Sanksi SWDKLLJ</label>
											<input type="text" name="sanski_swdllj1" id="rupiah2" onkeyup="hargatotal();" class="form-control sankswd jumlah_biaya jumlah_t">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" id="total_b">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Total</label>
											<input type="text" name="total" id="hasil_biaya" class="form-control" >
											<span class="material-input"></span>
										</div>
									</div>
								</div>
							</div>
							<!-- End Bulan -->

							<!-- Start Ganti Plat -->
							<div id="cek_plat" style="display: none;">
								<div class="row" >
									<div class="col-md-12">
										<div class="checkbox">
											<label>
												<input type="checkbox" name="ganti" id="gantiplat_nor" value="ada"> Ganti Plat
											</label>
										</div>
									</div>
								</div>
								<div class="ganti-plat" id="admtnkb_n" style="display: none;">
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
												<span class="material-input"></span>
											</div>
											<div class="form-group jum-t">
												<label class="control-label">Adm STNK</label>
												<input type="text" readonly="" name="adm_stnk" id="adm_tnkb" class="form-control jumlah_t">
												<span class="material-input"></span>
											</div>
											<div class="form-grou jum-t">
												<label class="control-label">Adm TNKB</label>
												<input type="text" readonly="" name="adm_tnkb" id="adm_stnk" class="form-control jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
								</div>
								<!-- End Ganti Plat -->
								<div class="row" id="total_t">
									<div class="col-md-12">
										<div class="form-group jumlah_pajak">
											<label class="control-label">Total</label>
											<input type="text" name="total" required id="sum_t" class="form-control" >
											<span class="material-input"></span>
										</div>
									</div>
								</div>
							</div>	
						<button type="submit" class="btn btn-info pull-right">Submit</button>
						<button class="btn btn-default pull-right">Print</button>
						</div>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>