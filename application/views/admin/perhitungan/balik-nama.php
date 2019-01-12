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
						
						<form action="<?=site_url('main/proses_balik')?>" id="form_p" name="form_p" method="post" accept-charset="utf-8">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group is-empty">
										<p>Jenis Balik Nama</p>
										<select class="form-control" onchange="balik()" name="jenis_b" id="balik_nama" >
											<option value="">-- SILAHKAN PILIH --</option>
											<option value="" disabled></option>
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
											<select class="form-control" name="jenis_swd" onchange="ambilSwdk()" id="ambiltahun">
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
								<div id="b_ta" style="display: none;">
									<div class="row">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Lalu</h4>
											<div class="form-group label-floating is-empty jum-t">
												<label class="control-label">PKB</label>
												<input type="text" name="pkb4" id="pkb_b_t" onkeyup="b_tahun();" class="form-control jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating is-empty" >
												<label class="control-label">Telat Tahun</label>
												<input type="text" name="denda_pkb" style="display: none;" value="0.25%" id="denda_b_t" onkeyup="b_tahun();">
												<input type="text" name="telat_bln2" id="telat_thn" onkeyup="b_tahun();" class="form-control jumlah_t" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-t">
												<label class="control-label">Sanksi PKB</label>
												<input type="text" name="sanksi_pkb2" readonly id="total_pkb_t" class="form-control jumlah_t"  value="">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-t">
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj2" id="" class="form-control swdklksama jumlah_t" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-t">
												<label class="control-label">Sanksi SWDKLLJ</label>
												<input type="text" name="sanksi_swdllj_b2" id="" class="form-control sankswd jumlah_t" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
								</div>
								<!--  End Tahun -->

								<!-- Start Hidup -->
								<div id="b_hid" style="display: none;">
									<div class="row">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Hidup</h4>
											<div class="form-group label-floating is-empty jum-pajak jum-t">
												<label class="control-label">PKB</label>
												<input type="text" name="pkb" id="denda_bbn_h" style="display: none;" value="0.67%" onkeyup="b_hidup();">
												<input type="text" name="pkb1" id="pkb_b_h" onkeyup="b_hidup();" class="form-control jumlah" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-pajak jum-t">
												<label class="control-label">BBN KB</label>
												<input type="text" name="bbnkb1" id="total_bbn_h" class="form-control jumlah" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-pajak jum-t">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk1" id="adm_stnk" class="form-control admstnk jumlah" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_h">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Total</label>
												<input type="text" name="total_hidup" id="sum" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
								</div>
								<!-- End Hidup -->

								<!-- Start Normal -->
								<div id="b_nor" style="display: none;">
									<div class="row">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Normal</h4>
											<div class="form-group label-floating is-empty jum-n jum-t">
												<label class="control-label">PKB</label>
												<input type="text" name="pkb" id="denda_b" style="display: none;" value="0.67%" onkeyup="b_normal();">
												<input type="text" name="pkb2" id="pkb_b" onkeyup="b_normal();" class="form-control jumlah_n jumlah_t" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-n jum-t">
												<label class="control-label">BBN KB</label>
												<input type="text" name="bbnkb2" id="total_bn" readonly class="form-control jumlah_n jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-n jum-t">
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj1" id="swdkllj" class="form-control swdklksama jumlah_n jumlah_t" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-n jum-t">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk2" id="adm_stnk" class="form-control admstnk jumlah_n jumlah_t" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="ganti1" id="gantiplat_nor" value="ada"> Ganti Plat
												</label>
											</div>
										</div>
									</div>
									<div class="row" id="admtnkb_n" style="display: none;">
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
											<div class="form-group jum-n jum-t">
												<label class="control-label">Adm TNKB</label>
												<input type="text" readonly name="adm_tnkb1" id="adm_tnkb" class="form-control jumlah_n jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_n">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Total</label>
												<input type="text" name="total_normal" id="sum_n" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
								</div>
								<!-- End Normal -->

								<!-- Start Bulan -->
								<div id="b_bul" style="display: none;">
									<div class="row">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Telat Bulanan</h4>
											<div class="form-group label-floating is-empty jum-b jum-t">
												<label class="control-label">PKB</label>
												<input type="text" name="pkb" id="denda_bu" style="display: none;" value="0.67%" onkeyup="b_bulan();">
												<input type="text" name="pkb3" id="pkb_bu" onkeyup="b_bulan();" class="form-control jumlah_b jumlah_t" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-b jum-t">
												<label class="control-label">BBN KB</label>
												<input type="text" name="bbnkb3" id="total_bbn_b" class="form-control jumlah_b jumlah_t" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating is-empty" >
												<label class="control-label">Telat Bulan</label>
												<input type="text" name="denda_pkb" style="display: none;" value="0.02%" id="denda_ba" onkeyup="b_bulan();">
												<input type="text" name="telat_bln1" id="telat_bln" onkeyup="b_bulan();" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-grou jum-b jum-t">
												<label class="control-label">Sanksi PKB</label>
												<input type="text" name="sanksi_pkb1" readonly id="total_ba" class="form-control jumlah_b jumlah_t" value="">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-b jum-t">
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj1" id="" class="form-control swdklksama jumlah_b jumlah_t" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-b jum-t">
												<label class="control-label">Sanksi SWDKLLJ</label>
												<input type="text" name="sanksi_swdllj_b1" id="" class="form-control sankswd jumlah_b jumlah_t" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-b jum-t" >
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk2" id="adm_stnk_b" class="form-control admstnk jumlah_b jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="ganti2" id="gantiplat_bul" value="ada"> Ganti Plat
												</label>
											</div>
										</div>
									</div>
									<div class="row" id="admtnkb_b" style="display: none;">
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
											<div class="form-group jum-n jum-t">
												<label class="control-label">Adm TNKB</label>
												<input type="text" readonly name="adm_tnkb2" id="adm_tnkb" class="form-control jumlah_b jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_b">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Total</label>
												<input type="text" name="total_bulan" id="sum_b" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
								</div>
								<!-- End Bulan -->
								<div class="row" id="total_t" style="display: none;">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Total</label>
											<input type="text" name="total_tahun" id="sum_t" class="form-control" >
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-info pull-right">Submit</button>
								<button class="btn btn-default pull-right">Print</button>
								<div class="clearfix"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>