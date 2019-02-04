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
											<p>Jenis Wilayah</p>
											<select name="wilayah" class="form-control" onchange="" id="wil_perpanjang">
												<option value="" disabled="" selected>-- SILAHKAN PILIH --</option>
												<option value="" disabled=""></option>
												<option value="Jakarta">Jakarta</option>
												<option value="Bekasi">Bekasi</option>
												<option value="Tanggerang">Tanggerang</option>
												<option value="Depok">Depok</option>
											</select>
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group is-empty">
											<p>Jenis Jasa</p>
											<select name="jenis_jasa" class="form-control" onchange="ambiljasa()" id="jenisjasa">
												<option value="" disabled="" selected>-- SILAHKAN PILIH --</option>
												<option value="" disabled=""></option>
												<?php foreach ($jasa->result() as $key): ?>
													<option value="<?=$key->nama?>"><?=$key->nama?></option>
												<?php endforeach ?>
											</select>
											<span class="material-input"></span>
										</div>
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
											<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Hidup</h4>
											<div class="form-group label-floating is-empty jumlah_pajak_t jum-pajak">
												<label class="control-label">PKB</label>
												<input type="text" name="pkb" id="denda_bbn_h" style="display: none;" value="0.67%" onkeyup="b_hidup();">
												<input type="text" name="pkb1" id="pkb_b_h" onkeyup="b_hidup();" class="form-control jumlah_pajak">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t jum-pajak">
												<label class="control-label">BBN KB</label>
												<input type="text" name="bbnkb1" id="total_bbn_h" class="form-control jumlah_pajak" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t jum-pajak">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk1" id="adm_stnk" class="form-control admstnk jumlah_pajak" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="jasa_n">
										<div class="col-md-12">
											<div class="form-group jum-pajak">
												<label class="control-label">Biaya Jasa</label>
												<input type="text" name="biaya_jasa1" class="form-control jasa jumlah">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_p_n">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-bottom: none;">
											<div class="form-group jum-pajak">
												<label class="control-label">Total Perkiraan Pajak</label>
												<input type="text" name="total_pajak1" readonly id="sum_pajak" class="form-control jumlah">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_h">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-top: none;">
											<div class="form-group">
												<label class="control-label">Total Perkiraaan Pajak dan Jasa</label>
												<input type="text" name="total_hidup" readonly id="sum" class="form-control" >
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
											<div class="form-group label-floating is-empty jumlah_pajak_t jum-pajak-n">
												<label class="control-label">PKB</label>
												<input type="text" name="pkb" id="denda_b" style="display: none;" value="0.67%" onkeyup="b_normal();">
												<input type="text" name="pkb2" id="pkb_b" onkeyup="b_normal();" class="form-control jumlah_p_t jumlah_pajak_n" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t jum-pajak-n">
												<label class="control-label">BBN KB</label>
												<input type="text" name="bbnkb2" id="total_bn" class="form-control jumlah_p_t jumlah_pajak_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t jum-pajak-n">
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj1" id="swdkllj" class="form-control swdklksama jumlah_p_t jumlah_pajak_n" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t jum-pajak-n">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk2" id="adm_stnk" class="form-control admstnk jumlah_p_t jumlah_pajak_n" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="ganti1" id="gantiplat_nor" value="ada"> Ganti Plat
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="accbpkb" id="bpkb" value="ada"> BBN
													</label>
												</div>
											</div>
											<div class="col-md-3">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="accktp" id="ktp" value="Rubah Alamat STNK dan BPKB"> Rubah Alamat STNK dan BPKB
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="loksus" id="loksus" value="Rubah Alamat BPKB"> Rubah Alamat BPKB
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="admskp" id="skp" value="ada"> Adm. SKP
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row" id="admtnkb_n" style="display: none;">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Ganti Plat</h4>
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
											<div class="form-group jumlah_pajak_t jum-pajak-n">
												<label class="control-label">Adm TNKB</label>
												<input type="text" name="adm_tnkb1" id="adm_tnkb" class="form-control jumlah_p_t jumlah_pajak_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="" id="jasabpkb" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">BBN</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_bpkb" name="jenis_k_bpkb"  onchange="ambilbbn()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t jum-pajak-n">
													<label class="control-label">Biaya Jasa BBN</label>
													<input type="text" name="jasa_bpkb" id="acc_bpkb" class="form-control jumlah_p_t jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasaktp" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Rubah Alamat STNK dan BPKB</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_ktp" name="jenis_k_ktp"  onchange="ambilstnk()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t jum-pajak-n">
													<label class="control-label">Biaya Jasa Rubah Alamat STNK dan BPKB</label>
													<input type="text" name="jasa_ktp" id="acc_ktp" class="form-control jumlah_p_t jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasaloksus" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Rubah Alamat</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_loksus" name="jenis_k_loksus"  onchange="ambilalamat()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t jum-pajak-n">
													<label class="control-label">Biaya Jasa Rubah Alamat</label>
													<input type="text" name="jasa_loksus" id="loksus" class="form-control jumlah_p_t jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasaskp" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Adm. SKP</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_skp" name="jenis_k_skp"  onchange="ambilskpbalik()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t jum-pajak-n">
													<label class="control-label">Biaya Jasa Adm. SKP</label>
													<input type="text" name="jasa_skp" id="adm_skp" class="form-control jumlah_p_t jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row" id="jasa_no">
										<div class="col-md-12">
											<div class="form-group jum-n">
												<label class="control-label">Biaya Jasa</label>
												<input type="text" name="biaya_jasa2" class="form-control jasa jumlah_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_p_no">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-bottom: none;">
											<div class="form-group jum-n">
												<label class="control-label">Total Perkiraan Pajak</label>
												<input type="text" name="total_pajak2" readonly id="sum_pajak_n" class="form-control jumlah_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_n">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-top: none;">
											<div class="form-group">
												<label class="control-label">Total Perkiraan Pajak dan Jasa</label>
												<input type="text" name="total_normal" readonly id="sum_n" class="form-control" >
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
											<div class="form-group label-floating is-empty jumlah_pajak_t jum-pajak-b">
												<label class="control-label">PKB</label>
												<input type="text" name="pkb" id="denda_bu" style="display: none;" value="0.67%" onkeyup="b_bulan();">
												<input type="text" name="pkb3" id="pkb_bu" onkeyup="b_bulan();" class="form-control jumlah_p_t jumlah_pajak_b" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="bbn-bul">
										<div class="col-md-12">
											<div class="form-group jum-pajak-b">
												<label class="control-label">BBN KB</label>
												<input type="text" name="bbnkb3" id="total_bbn_b" class="form-control jumlah_pajak_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<!-- <div class="form-group label-floating is-empty" >
												<label class="control-label">Telat Bulan</label>
												<input type="text" name="telat_bln1" id="telat_bln" onkeyup="b_bulan();" class="form-control" >
												<span class="material-input"></span>
											</div> -->
											<div class="form-group is-empty">
												<p>Telat Bulan</p>
												<input type="text" name="denda_pkb" style="display: none;" value="0.02%" id="denda_ba" onkeyup="b_bulan();">
												<select id="t_bln" onchange="b_bulan();" class="form-control" name="telat_bln_t">
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
									<div class="row">
										<div class="col-md-12">
											<div class="form-grou jumlah_pajak_t jum-pajak-b">
												<label class="control-label">Sanksi PKB</label>
												<input type="text" name="sanksi_pkb1" id="total_ba" class="form-control jumlah_p_t jumlah_pajak_b" value="">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t jum-pajak-b">
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj2" id="" class="form-control swdklksama jumlah_p_t jumlah_pajak_b" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t jum-pajak-b">
												<label class="control-label">Sanksi SWDKLLJ</label>
												<input type="text" name="sanksi_swdllj_b1" id="" class="form-control sankswd jumlah_p_t jumlah_pajak_b" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t jum-pajak-b" >
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk3" id="adm_stnk_b" class="form-control admstnk jumlah_p_t jumlah_pajak_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="ganti2" id="gantiplat_bul" value="ada"> Ganti Plat
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="accbpkb2" id="bbn" value="ada"> BBN
													</label>
												</div>
											</div>
											<div class="col-md-3">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="accktp2" id="rubstnk" value="ada"> Rubah Alamat STNK dan BPKB
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="loksus2" id="rubala" value="ada"> Rubah Alamat BPKB
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="admskp2" id="skp_b" value="ada"> Adm. SKP
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row" id="admtnkb_b" style="display: none;">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Ganti Plat</h4>
											<div class="form-group is-empty">
												<p>Jenis Kendaraan</p>
												<select class="form-control" id="jenis_ken" name="jenis_k2"  onchange="ambilselectbul()">
													<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
													<option value="" disabled=""></option>
													<?php foreach ($catat->result() as $key): ?>
														<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
													<?php endforeach ?>
												</select>
												<span class="material-input"></span>
											</div>
											<div class="form-group jumlah_pajak_t jum-pajak-b">
												<label class="control-label">Adm TNKB</label>
												<input type="text" name="adm_tnkb2" id="adm_tnkb_b" class="form-control jumlah_p_t jumlah_pajak_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="" id="jasabbn" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">BBN</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_bpkb1" name="jenis_k_bpkb2"  onchange="ambilbbn1()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t jum-pajak-n">
													<label class="control-label">Biaya Jasa BBN</label>
													<input type="text" name="jasa_bpkb2" id="acc_bpkb1" class="form-control jumlah_p_t jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasarubstnk" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Rubah Alamat STNK dan BPKB</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_ktp1" name="jenis_k_ktp2"  onchange="ambilstnk1()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t jum-pajak-n">
													<label class="control-label">Biaya Jasa Rubah Alamat STNK dan BPKB</label>
													<input type="text" name="jasa_ktp2" id="acc_ktp1" class="form-control jumlah_p_t jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasarubala" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Rubah Alamat</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_loksus1" name="jenis_k_loksus2"  onchange="ambilalamat3()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t jum-pajak-n">
													<label class="control-label">Biaya Jasa Rubah Alamat</label>
													<input type="text" name="jasa_loksus2" id="loksus1" class="form-control jumlah_p_t jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasaskp_b" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Adm. SKP</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_skp1" name="jenis_k_skp2"  onchange="ambilskpbalik1()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t jum-pajak-n">
													<label class="control-label">Biaya Jasa Adm. SKP</label>
													<input type="text" name="jasa_skp2" id="adm_skp1" class="form-control jumlah_p_t jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row" id="jasa_bu">
										<div class="col-md-12">
											<div class="form-group jum-b">
												<label class="control-label">Biaya Jasa</label>
												<input type="text" name="biaya_jasa3" class="form-control jasa jumlah_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_p_bu">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-bottom: none;">
											<div class="form-group jum-b">
												<label class="control-label">Total Perkiraan Pajak</label>
												<input type="text" name="total_pajak3" readonly id="sum_pajak_b" class="form-control jumlah_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_b">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-top: none;">
											<div class="form-group">
												<label class="control-label">Total Perkiraan Pajak dan Jasa</label>
												<input type="text" name="total_bulan" readonly id="sum_b" class="form-control" >
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
											<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Lalu</h4>
											<div class="form-group label-floating is-empty jumlah_pajak_t">
												<label class="control-label">PKB</label>
												<input type="text" name="pkb4" id="pkb_b_t" onkeyup="b_tahun();" class="form-control jumlah_p_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<!-- <div class="col-md-12">
											<div class="form-group label-floating is-empty" >
												<label class="control-label">Telat Tahun</label>
												<input type="text" name="telat_bln2" id="telat_thn" onkeyup="b_tahun();" class="form-control jumlah_p_t" >
												<span class="material-input"></span>
											</div>
										</div> -->
										<div class="col-md-6">
											<div class="form-group is-empty">
												<input type="text" name="denda_pkb" style="display: none;" value="0.25%" id="denda_b_t" onkeyup="b_tahun();">
												<p>Telat Tahun</p>
												<select id="telat_thn" onchange="b_tahun();" class="form-control" name="telat_thn">
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
												<select id="telat_bln" onchange="b_tahun();" class="form-control" name="telat_bln2">
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
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t">
												<label class="control-label">Sanksi PKB</label>
												<input type="text" name="sanksi_pkb2" id="total_pkb_t" class="form-control jumlah_p_t"  value="">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t">
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj3" id="" class="form-control swdklksama jumlah_p_t" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t">
												<label class="control-label">Sanksi SWDKLLJ</label>
												<input type="text" name="sanksi_swdllj_b2" id="" class="form-control sankswd jumlah_p_t" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
								</div>
								<!--  End Tahun -->


								<div class="row" id="jasa_t" style="display: none;">
									<div class="col-md-12">
										<div class="form-group jum-t">
											<label class="control-label">Biaya Jasa</label>
											<input type="text" name="biaya_jasa4" class="form-control jasa jumlah_t">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" id="total_p_t" style="display: none;">
									<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-bottom: none;">
										<div class="form-group jum-t">
											<label class="control-label">Total Perkiraan Pajak</label>
											<input type="text" readonly name="total_pajak4" id="sum_pajak_t" class="form-control jumlah_t">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" id="total_t" style="display: none;">
									<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-top: none;">
										<div class="form-group">
											<label class="control-label">Total Perkiraan Pajak dan Jasa</label>
											<input type="text" readonly name="total_tahun" id="sum_t" class="form-control" >
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<button id="printPageButton" type="submit" class="btn btn-info pull-right">Submit</button>
								<button id="printButton" type="button" class="btn btn-default pull-right" onclick="print_pp()">Print</button>
								<div class="clearfix"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>