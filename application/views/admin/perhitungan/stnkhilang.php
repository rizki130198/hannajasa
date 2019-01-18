<style type="text/css">
.form-group{
	margin-top: 10px;
}
@media print {
  #printPageButton {
    display: none;
  }
  #printButton {
    display: none;
  }
}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header" style="background-color: #00c0ef;">
						<h4 class="title">STNK Hilang</h4>
					</div>
					<div class="card-content">
						
						<form action="<?=site_url('main/proses_stnk')?>" id="form_p" name="form_p" method="post" accept-charset="utf-8">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group is-empty">
										<p>Jenis Balik Nama</p>
										<select class="form-control" onchange="balik()" name="jenis_b" id="balik_nama">
											<option value="">-- SILAHKAN PILIH --</option>
											<option value="" disabled></option>
											<option value="Pajak Hidup">Pajak Hidup</option>
											<option value="Pajak Normal">Pajak Normal</option>
											<option value="Telat bulanan">Pajak Telat bulanan</option>
											<option value="Pajak Lebih Dari Setahun">Pajak Telat Lebih dari 1 Tahun</option>
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
								<!-- Start Hidup -->
								<div id="b_hid" style="display: none;">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-n">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk1" readonly="" class="form-control admstnk">
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
											<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Hidup</h4>
											<div class="form-group label-floating is-empty jum-n">
												<label class="control-label">PKB</label>
												<input type="text" name="pkb1" class="form-control jumlah_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-n" >
												<label class="control-label">SWDKLLJ</label>
												<input type="text" readonly="" name="swdllj1" class="form-control swdklksama jumlah_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-n">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk2" readonly="" class="form-control admstnk jumlah_n">
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
												<select class="form-control" id="jenis_k" name="jenis_k1"  onchange="ambilselect()">
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
												<input type="text" readonly name="adm_tnkb1" id="adm_tnkb" class="form-control jumlah_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_h">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Total</label>
												<input type="text" name="total_hidup" readonly id="sum_n" class="form-control">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
								</div>
								<!-- End Normal -->

								<!-- Start Bulan -->
								<div id="b_bul" style="display: none;">
									<div class="row" >
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Telat Bulanan</h4>
											<div class="form-group label-floating is-empty jum-b">
												<label class="control-label">PKB</label>
												<input type="text" style="display: none;" id="denda_bu" name="telat_bln" onkeyup="sum_p();" class="form-control" value="0.02%">
												<input type="text" name="pkb2" id="pkb2" onkeyup="sum_p();" class="form-control jumlah_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<!-- <div class="form-group label-floating is-empty">
												<label class="control-label">Telat Bulan</label>
												<input type="text" name="telat" id="t_bln" onkeyup="sum_p();" class="form-control" >
												<span class="material-input"></span>
											</div> -->
											<div class="form-group is-empty">
												<p>Telat Bulan</p>
												<select id="t_bln" onchange="sum_p();" class="form-control" name="telat">
													<option disabled selected>-- SILAHKAN PILIH --</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
												</select>
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-b">
												<label class="control-label">Sanksi PKB</label>
												<input type="text" name="sanksi_pkb1" id="sum_bulan" class="form-control jumlah_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-b">
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj2" id="" class="form-control swdklksama jumlah_b" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-b">
												<label class="control-label">Sanksi SWDKLLJ</label>
												<input type="text" name="sanksi_swdllj_b1" id="" class="form-control sankswd jumlah_b" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-b">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk3" class="form-control admstnk jumlah_b">
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
												<select class="form-control" id="jenis_k" name="jenis_k2"  onchange="ambilselectbul()">
													<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
													<option value="" disabled=""></option>
													<?php foreach ($catat->result() as $key): ?>
														<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
													<?php endforeach ?>
												</select>
												<span class="material-input"></span>
											</div>
											<div class="form-group jum-b">
												<label class="control-label">Adm TNKB</label>
												<input type="text" readonly name="adm_tnkb2" id="adm_tnkb_b" class="form-control jumlah_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_bu">
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

								<!-- Start Tahun -->
								<div id="b_ta" style="display: none;">
									<div class="row">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Tahun Lalu</h4>
											<div class="form-group label-floating is-empty jum-t">
												<label class="control-label">PKB</label>
												<input type="text" name="pkb3" id="pkb_t" class="form-control jumlah_t" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<!-- <div class="col-md-12">
											<div class="form-group label-floating is-empty">
												<label class="control-label">Telat Tahun</label>
												<input type="text" style="display: none;" id="denda" name="telat_thn" class="form-control" value="0.25%">
												<input type="text" name="telat_thn" id="telat_thn" onkeyup="m_sum_t();" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div> -->
										<div class="col-md-6">
											<div class="form-group is-empty">
												<input type="text" style="display: none;" id="denda" name="telat_thn" class="form-control" value="0.25%">
												<p>Telat Tahun</p>
												<select id="telat_thn" onchange="m_sum_t();" class="form-control" name="telat_thn">
													<option disabled selected>-- SILAHKAN PILIH --</option>
													<option value="12">1</option>
													<option value="24">2</option>
													<option value="36">3</option>
													<option value="48">4</option>
													<option value="60">5</option>
													<option value="72">6</option>
													<option value="84">7</option>
													<option value="96">8</option>
													<option value="108">9</option>
													<option value="120">10</option>
													<option value="132">11</option>
													<option value="144">12</option>
												</select>
												<span class="material-input"></span>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group is-empty">
												<p>Telat Bulan</p>
												<select id="telat_bln" onchange="m_sum_t();" class="form-control" name="telat_t_bln">
													<option value="0">-- SILAHKAN PILIH --</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
												</select>
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" >
										<div class="col-md-12">
											<div class="form-group jum-t">
												<label class="control-label">Sanksi PKB</label>
												<input type="text" name="sanksi_pkb2" id="hasil_tahun" class="form-control jumlah_t"  value="">
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
												<input type="text" name="sanski_swdllj1" onkeyup="harga_tahun()" class="form-control sankswd jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Tahun Sekarang</h4>
											<div class="form-group label-floating is-empty jum-t">
												<label class="control-label">PKB</label>
												<input type="text" onkeyup="pkb_ta();" id="pkb_tahun" name="pkb4" class="form-control jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="cek_telat" id="telat" value="ada"> Kalau Telat
												</label>
											</div>
										</div>
									</div>
									<div class="row" id="row_telat" style="display: none;">
										<div class="col-md-12">
											<div class="form-group is-empty">
												<p>Jenis Kendaraan</p>
												<select class="form-control" id="jenis_telat" name="jenis_telat"  onchange="ambilselecttelat()">
													<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
													<option value="" disabled=""></option>
													<?php foreach ($catat->result() as $key): ?>
														<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
													<?php endforeach ?>
												</select>
												<span class="material-input"></span>
											</div>
											<div class="row">
												<!-- <div class="col-md-12">
													<div class="form-group label-floating is-empty">
														<label class="control-label">Telat Tahun</label>
														<input type="text" name="telat_thn1" id="t_tahun" onkeyup="pkb_ta();" class="form-control" >
														<span class="material-input"></span>
													</div>
												</div> -->
												<div class="col-md-6">
													<div class="form-group is-empty">
														<input type="text" style="display: none;" id="denda" name="telat_thn1" class="form-control" value="0.02%%">
														<p>Telat Tahun</p>
														<select id="telat_thn_s" onchange="pkb_ta();" class="form-control" name="telat_thn">
															<option value="">-- SILAHKAN PILIH --</option>
															<option value="12">1</option>
															<option value="24">2</option>
															<option value="36">3</option>
															<option value="48">4</option>
															<option value="60">5</option>
															<option value="72">6</option>
															<option value="84">7</option>
															<option value="96">8</option>
															<option value="108">9</option>
															<option value="120">10</option>
															<option value="132">11</option>
															<option value="144">12</option>
														</select>
														<span class="material-input"></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group is-empty">
														<p>Telat Bulan</p>
														<select id="telat_bln_s" onchange="pkb_ta();" class="form-control" name="telat_t_bln1">
															<option disabled selected>-- SILAHKAN PILIH --</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
														</select>
														<span class="material-input"></span>
													</div>
												</div>
											</div>
											<div class="row" >
												<div class="col-md-12">
													<div class="form-group jum-t">
														<label class="control-label">Sanksi PKB</label>
														<input type="text" name="sanksi_pkb3" id="hasil_stnk_tahun" class="form-control jumlah_t"  value="">
														<span class="material-input"></span>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group jum-t">
														<label class="control-label">Sanksi SWDKLLJ</label>
														<input type="text" name="sanski_swdllj3" class="form-control sankswd_t jumlah_t">
														<span class="material-input"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-t" >
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj4" class="form-control swdklksama jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-t">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk4" class="form-control jumlah_t admstnk">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="ganti3" id="gantiplat_ta" value="ada"> Ganti Plat
												</label>
											</div>
										</div>
									</div>
									<div class="row" id="admtnkb_t" style="display: none;">
										<div class="col-md-12">
											<div class="form-group is-empty">
												<p>Jenis Kendaraan</p>
												<select class="form-control" id="jenis_kendaraan" name="jenis_k3"  onchange="ambilselectta()">
													<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
													<option value="" disabled=""></option>
													<?php foreach ($catat->result() as $key): ?>
														<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
													<?php endforeach ?>
												</select>
												<span class="material-input"></span>
											</div>
											<div class="form-group jum-t">
												<label class="control-label">Adm TNKB</label>
												<input type="text" name="adm_tnkb3" id="adm_tnkb_t" class="form-control jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_bu">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Total</label>
												<input type="text" name="total_bulan2" id="sum_t" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
								</div>
								<!-- End Tahun -->
								<button  id="printPageButton" type="submit" class="btn btn-info pull-right">Submit</button>
								<button id="printButton" type="button" class="btn btn-default pull-right" onclick="print_pp()">Print</button>
								<div class="clearfix"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>