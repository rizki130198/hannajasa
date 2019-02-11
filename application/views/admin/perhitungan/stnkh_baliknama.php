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
						<h4 class="title">STNK Hilang + Balik Nama</h4>
					</div>
					<div class="card-content">
						
						<form action="<?=site_url('main/proses_stnkbalik')?>" id="form_p" name="form_p" method="post" accept-charset="utf-8">
							<div class="row" id="print">
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
											<div class="form-group label-floating is-empty jum-pajak">
												<label class="control-label">PKB</label>
												<input type="text" style="display: none;" id="denda_bbn_h" name="telat_bln" onkeyup="b_hidup();" class="form-control" value="0.67%">
												<input type="text" name="pkb1" onkeyup="b_hidup();" id="pkb_b_h" class="form-control jumlah_pajak">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-pajak">
												<label class="control-label">BBN KB</label>
												<input type="text" name="bbnkb1" id="total_bbn_h" class="form-control jumlah_pajak">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-pajak">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk1" class="form-control admstnk jumlah_pajak">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
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
												<label class="control-label">Total Pajak</label>
												<input type="text" name="total_pajak1" readonly id="sum_pajak" class="form-control jumlah">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-top: none;">
											<div class="form-group">
												<label class="control-label">Total Perkiraan Pajak</label>
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
											<div class="form-group label-floating is-empty jum-pajak-n">
												<label class="control-label">PKB</label>
												<input type="text" style="display: none;" id="denda_b" onkeyup="b_normal();" class="form-control" value="0.67%">
												<input type="text" name="pkb2" onkeyup="b_normal();" id="pkb_b" class="form-control jumlah_pajak_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-pajak-n">
												<label class="control-label">BBN KB</label>
												<input type="text" name="bbnkb2" id="total_bn" class="form-control jumlah_pajak_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-pajak-n" >
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj1" class="form-control swdklksama jumlah_pajak_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-pajak-n">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk2" class="form-control admstnk jumlah_pajak_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="skp" id="adm_skp" value="ada"> Adm. SKP
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="baliknama" id="bpkb" value="STNK Hilang (BPKB Asli)"> STNK Hilang (BPKB Asli)
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="stnk_h" id="stnk_h" value="STNK Hilang (Leasing)"> STNK Hilang (Leasing)
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="rubah_bpkb" id="rubah_bpkb" value="ada"> Rubah Alamat BPKB
													</label>
												</div>
											</div>
											<div class="col-md-3">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="rubah_stnkbpkb" id="ktp" value="ada"> Rubah Alamat STNK dan BPKB
													</label>
												</div>
											</div>
											<div class="col-md-2" style="padding-left: 15px;">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="baliknama" id="balik_nama2" value="Balik Nama"> Balik Nama
													</label>
												</div>
											</div>	
											<div class="col-md-2">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="ganti1" id="gantiplat_nor" value="ada"> Ganti Plat
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="stnk_gantung" id="bbn" value="ada"> STNK Hilang Gantung
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="ktp_bpkb" id="rubala" value="ada"> KTP dan FC BPKB ada
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="tanpa_ktp" id="tanpa_ktp" value="ada"> Tanpa KTP
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="tanpa_ktpbpkb" id="tanpa_ktpbpkb" value="ada"> Tanpa KTP dan FC BPKB
													</label>
												</div>
											</div>
											<div class="col-md-2" style="padding-left: 15px;">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="laporan_h" id="laporan_h" value="Laporan Hilang"> Laporan Hilang
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="bbn" id="bbn2" value="ada"> BBN
													</label>
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
													<select class="form-control" id="jenis_k" name="jenis_k2"  onchange="ambilskpmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-n">
													<label class="control-label">Biaya Jasa Adm. SKP</label>
													<input type="text" name="jasa_skp" id="adm_skp" class="form-control jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasabpkb" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">STNK Hilang (BPKB Asli)</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_kbbn" name="jenis_k_balik"  onchange="ambilbbnmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-n">
													<label class="control-label">Biaya Jasa STNK Hilang (BPKB Asli)</label>
													<input type="text" name="bpkb_asli" id="bpkb_asli" class="form-control jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_stnkh" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">STNK Hilang (Leasing)</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_kstnk" name="jenis_k_stnk"  onchange="ambilstnkmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-n">
													<label class="control-label">Biaya Jasa STNK Hilang</label>
													<input type="text" name="stnk_hilang" id="jasa_stnk_t" class="form-control jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_rubahal" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Rubah Alamat BPKB</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_r_bpkb" name="jenis_r_bpkb"  onchange="rubahalamatbpkb()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-n">
													<label class="control-label">Biaya Jasa Rubah Alamat BPKB</label>
													<input type="text" name="jasa_rbpkb" id="rubah_bpkb" class="form-control jumlah_pajak_n">
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
													<select class="form-control" id="jenis_k_laporan" name="jenis_k_laporan"  onchange="ambillaporanmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-n">
													<label class="control-label">Biaya Jasa Laporan Hilang</label>
													<input type="text" name="laporan_hilang" id="jasa_laporan_t" class="form-control jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_bn2" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Balik Nama</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_kbbn" name="jenis_k_balik"  onchange="ambilbbnmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-n">
													<label class="control-label">Biaya Jasa Balik Nama</label>
													<input type="text" name="balik_nama" id="jasa_balik_t" class="form-control jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row" id="admtnkb_n" style="display: none;">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Ganti Plat</h4>
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
											<div class="form-group jum-pajak-n">
												<label class="control-label">Adm TNKB</label>
												<input type="text" name="adm_tnkb1" id="adm_tnkb" class="form-control jumlah_pajak_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="" id="jasa_bbn" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">STNK Hilang (Gantung)</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_bbn" name="jenis_k_bbn"  onchange="ambilbbnbaru()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-n">
													<label class="control-label">Biaya Jasa STNK Hilang Gantung</label>
													<input type="text" name="jasa_stnkgan" id="acc_bbn" class="form-control jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasarubala" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">KTP dan FC BPKB ada</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_rubah" name="jenis_k_rubah"  onchange="rubahalamatstnk()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-n">
													<label class="control-label">Biaya Jasa KTP dan FC BPKB</label>
													<input type="text" name="jasa_ktp" id="j_ktp" class="form-control jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_tanktp" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Tanpa KTP</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_rubah" name="jenis_k_rubah"  onchange="rubahalamatstnk()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-n">
													<label class="control-label">Biaya Jasa Tanpa KTP</label>
													<input type="text" name="jasa_tanktp" id="jtanpa_ktp" class="form-control jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_tanbpkb" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Tanpa KTP dan FC BPKB</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_rubah" name="jenis_k_rubah"  onchange="rubahalamatstnk()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-n">
													<label class="control-label">Biaya Jasa Tanpa KTP dan FC BPKB</label>
													<input type="text" name="jasa_tanbpkb" id="jtanpa_bpkb" class="form-control jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_laporh" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Laporan Hilang</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_laporan" name="jenis_k_laporan"  onchange="ambillaporanmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-n">
													<label class="control-label">Biaya Jasa Laporan Hilang</label>
													<input type="text" name="laporan_hilang" id="jasa_laporan_t" class="form-control jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_bbn2" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">BBN</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_laporan" name="jenis_k_laporan"  onchange="ambillaporanmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-n">
													<label class="control-label">Biaya Jasa Laporan Hilang</label>
													<input type="text" name="laporan_hilang" id="jasa_laporan_t" class="form-control jumlah_pajak_n">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-n">
												<label class="control-label">Biaya Jasa</label>
												<input type="text" name="biaya_jasa2" class="form-control jasa jumlah_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_h">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-bottom: none;">
											<div class="form-group jum-n">
												<label class="control-label">Total Pajak</label>
												<input type="text" name="total_pajak2" readonly id="sum_pajak_n" class="form-control jumlah_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_h">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-top: none;">
											<div class="form-group">
												<label class="control-label">Total</label>
												<input type="text" name="total_normal" readonly id="sum_n" class="form-control">
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
											<div class="form-group label-floating is-empty jum-pajak-b">
												<label class="control-label">PKB</label>
												<input type="text" style="display: none;" id="denda_bu" class="form-control" value="0.67%">
												<input type="text" name="pkb2" id="pkb_bu" onkeyup="s_t_bulan();" class="form-control jumlah_pajak_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
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
											<!-- <div class="form-group label-floating is-empty">
												<label class="control-label">Telat Bulan</label>
												<input type="text" name="telat" id="telat_bln" onkeyup="s_t_bulan();" class="form-control" >
												<span class="material-input"></span>
											</div> -->
											<div class="form-group is-empty">
												<p>Telat Bulan</p>
												<input type="text" style="display: none;" id="denda_ba" class="form-control" value="0.02%">
												<select id="telat_bln_s" onchange="s_t_bulan();" class="form-control" name="telat">
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
											<div class="form-group jum-pajak-b">
												<label class="control-label">Sanksi PKB</label>
												<input type="text" name="sanksi_pkb1" id="total_ba" class="form-control jumlah_pajak_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-pajak-b">
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj2" id="" class="form-control swdklksama jumlah_pajak_b" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-pajak-b">
												<label class="control-label">Sanksi SWDKLLJ</label>
												<input type="text" name="sanksi_swdllj_b1" id="" class="form-control sankswd jumlah_pajak_b" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-pajak-b">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk3" class="form-control admstnk jumlah_pajak_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="skp" id="adm_skp2" value="ada"> Adm. SKP
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="baliknama" id="bpkb2" value="STNK Hilang (BPKB Asli)"> STNK Hilang (BPKB Asli)
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="stnk_h" id="stnk_h2" value="STNK Hilang (Leasing)"> STNK Hilang (Leasing)
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="rubah_bpkb" id="rubah_bpkb2" value="ada"> Rubah Alamat BPKB
													</label>
												</div>
											</div>
											<div class="col-md-3">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="rubah_stnkbpkb" id="rubah_stnkbpkb2" value="ada"> Rubah Alamat STNK dan BPKB
													</label>
												</div>
											</div>
											<div class="col-md-2" style="padding-left: 15px;">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="baliknama" id="balik_nama3" value="Balik Nama"> Balik Nama
													</label>
												</div>
											</div>	
											<div class="col-md-2">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="ganti2" id="gantiplat_bul" value="ada"> Ganti Plat
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="stnk_gantung" id="loksus" value="ada"> STNK Hilang (Gantung)
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="ktp_bpkb" id="ktpbpkb" value="ada"> KTP dan FC BPKB ada
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="tanpa_ktp" id="tanpa_ktp2" value="ada"> Tanpa KTP
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="tanpa_ktpbpkb" id="tanpa_ktpbpkb2" value="ada"> Tanpa KTP dan FC BPKB
													</label>
												</div>
											</div>
											<div class="col-md-2" style="padding-left: 15px;">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="laporan_h" id="laporan_h2" value="Laporan Hilang"> Laporan Hilang
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="bbn" id="bbn3" value="ada"> BBN
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasaskp2" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Adm. SKP</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k" name="jenis_k2"  onchange="ambilskpmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-b">
													<label class="control-label">Biaya Jasa Adm. SKP</label>
													<input type="text" name="jasa_skp" id="adm_skp" class="form-control jumlah_pajak_b">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasabpkb2" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">STNK Hilang (BPKB Asli)</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_kbbn" name="jenis_k_balik"  onchange="ambilbbnmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-b">
													<label class="control-label">Biaya Jasa STNK Hilang (BPKB Asli)</label>
													<input type="text" name="bpkb_asli" id="bpkb_asli" class="form-control jumlah_pajak_b">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_stnkh2" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">STNK Hilang (Leasing)</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_kstnk" name="jenis_k_stnk"  onchange="ambilstnkmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-b">
													<label class="control-label">Biaya Jasa STNK Hilang</label>
													<input type="text" name="stnk_hilang" id="jasa_stnk_t" class="form-control jumlah_pajak_b">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_rubahal2" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Rubah Alamat BPKB</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_r_bpkb" name="jenis_r_bpkb"  onchange="rubahalamatbpkb()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-b">
													<label class="control-label">Biaya Jasa Rubah Alamat BPKB</label>
													<input type="text" name="jasa_rbpkb" id="rubah_bpkb" class="form-control jumlah_pajak_b">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_stnkbpkb2" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Rubah Alamat STNK dan BPKB</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_laporan" name="jenis_k_laporan"  onchange="ambillaporanmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-b">
													<label class="control-label">Biaya Jasa Laporan Hilang</label>
													<input type="text" name="laporan_hilang" id="jasa_laporan_t" class="form-control jumlah_pajak_b">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_bn3" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Balik Nama</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_kbbn" name="jenis_k_balik"  onchange="ambilbbnmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-b">
													<label class="control-label">Biaya Jasa Balik Nama</label>
													<input type="text" name="balik_nama" id="jasa_balik_t" class="form-control jumlah_pajak_b">
													<span class="material-input"></span>
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
											<div class="form-group jum-pajak-b">
												<label class="control-label">Adm TNKB</label>
												<input type="text" readonly name="adm_tnkb2" id="adm_tnkb_b" class="form-control jumlah_pajak_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="" id="jasaloksus" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">STNK Hilang Gantung</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_bbn" name="jenis_k_bbn"  onchange="ambilbbnbaru()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-b">
													<label class="control-label">Biaya Jasa STNK Hilang Gantung</label>
													<input type="text" name="jasa_stnkgan" id="acc_bbn" class="form-control jumlah_pajak_b">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_ktpfc" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">KTP dan FC BPKB ada</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_rubah" name="jenis_k_rubah"  onchange="rubahalamatstnk()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-b">
													<label class="control-label">Biaya Jasa KTP dan FC BPKB</label>
													<input type="text" name="jasa_ktp" id="j_ktp" class="form-control jumlah_pajak_b">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_tanktp2" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Tanpa KTP</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_rubah" name="jenis_k_rubah"  onchange="rubahalamatstnk()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-b">
													<label class="control-label">Biaya Jasa Tanpa KTP</label>
													<input type="text" name="jasa_tanktp" id="jtanpa_ktp" class="form-control jumlah_pajak_b">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_tanbpkb2" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Tanpa KTP dan FC BPKB</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_rubah" name="jenis_k_rubah"  onchange="rubahalamatstnk()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-b">
													<label class="control-label">Biaya Jasa Tanpa KTP dan FC BPKB</label>
													<input type="text" name="jasa_tanbpkb" id="jtanpa_bpkb" class="form-control jumlah_pajak_b">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_laporh2" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Laporan Hilang</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_laporan" name="jenis_k_laporan"  onchange="ambillaporanmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-b">
													<label class="control-label">Biaya Jasa Laporan Hilang</label>
													<input type="text" name="laporan_hilang" id="jasa_laporan_t" class="form-control jumlah_pajak_b">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_bbn3" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">BBN</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_laporan" name="jenis_k_laporan"  onchange="ambillaporanmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jum-pajak-b">
													<label class="control-label">Biaya Jasa Laporan Hilang</label>
													<input type="text" name="laporan_hilang" id="jasa_laporan_t" class="form-control jumlah_pajak_b">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row" id="jasa_bu">
										<div class="col-md-12">
											<div class="form-group jum-b">
												<label class="control-label">Biaya Jasa</label>
												<input type="text" name="biaya_jasa3" class="form-control jumlah_b jasa">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_bu">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-bottom: none;">
											<div class="form-group jum-b">
												<label class="control-label">Total Pajak</label>
												<input type="text" name="total_pajak3" id="sum_pajak_b" class="form-control jumlah_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_bu">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-top: none;">
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
											<div class="form-group label-floating is-empty jumlah_pajak_t">
												<label class="control-label">PKB</label>
												<input type="text" name="pkb4" id="pkb_t" class="form-control jumlah_p_t" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group is-empty">
												<input type="text" style="display: none;" id="denda" name="telat_thn" class="form-control" value="0.25%">
												<p>Telat Tahun</p>
												<select id="telat_thn" onchange="m_sum_t();" class="form-control" name="telat_thn">
													<option  disabled selected>-- SILAHKAN PILIH --</option>
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
											<div class="form-group jumlah_pajak_t">
												<label class="control-label">Sanksi PKB</label>
												<input type="text" name="sanksi_pkb2" id="hasil_tahun" class="form-control jumlah_p_t"  value="">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t">
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj3" id="swdkllj_t" onkeyup="harga_tahun()" class="form-control swdklksama jumlah_p_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t">
												<label class="control-label">Sanksi SWDKLLJ</label>
												<input type="text" name="sanski_swdllj1" onkeyup="harga_tahun()" class="form-control sankswd jumlah_p_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Tahun Sekarang</h4>
											<div class="form-group label-floating is-empty jumlah_pajak_t">
												<label class="control-label">PKB</label>
												<input type="text" style="display: none;" onkeyup="s_t_telat();" id="denda_bu" class="form-control" value="0.67%">
												<input type="text" onkeyup="s_t_telat();" id="pkb_t_t" name="pkb4" class="form-control jumlah_p_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t">
												<label class="control-label">BBN KB</label>
												<input type="text" name="bbnkb_thn" id="total_bbn_t" class="form-control jumlah_p_t">
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
												<div class="col-md-12">
													<div class="form-group is-empty">
														<p>Telat Bulan</p>
														<input type="text" style="display: none;" onkeyup="s_t_telat();" id="denda_tahun" class="form-control" value="0.02%">
														<select id="telat_bln_t" onchange="s_t_telat();" class="form-control" name="telat_thn1">
															<option  disabled selected>-- SILAHKAN PILIH --</option>
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
													<div class="form-group jumlah_pajak_t">
														<label class="control-label">Sanksi PKB</label>
														<input type="text" name="sanksi_pkb3" id="sum_pkb_t" class="form-control jumlah_p_t"  value="">
														<span class="material-input"></span>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group jumlah_pajak_t">
														<label class="control-label">Sanksi SWDKLLJ</label>
														<input type="text" name="sanski_swdllj2" class="form-control sankswd_t jumlah_p_t">
														<span class="material-input"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t" >
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj4" class="form-control swdklksama jumlah_p_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk4" class="form-control jumlah_p_t admstnk">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="skp" id="adm_skp3" value="ada"> Adm. SKP
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="baliknama" id="bpkb3" value="STNK Hilang (BPKB Asli)"> STNK Hilang (BPKB Asli)
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="stnk_h" id="stnk_h3" value="STNK Hilang (Leasing)"> STNK Hilang (Leasing)
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="rubah_bpkb" id="rubah_bpkb3" value="ada"> Rubah Alamat BPKB
													</label>
												</div>
											</div>
											<div class="col-md-3">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="rubah_stnkbpkb" id="rubah_stnkbpkb3" value="ada"> Rubah Alamat STNK dan BPKB
													</label>
												</div>
											</div>
											<div class="col-md-2" style="padding-left: 15px;">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="baliknama" id="balik_nama4" value="Balik Nama"> Balik Nama
													</label>
												</div>
											</div>	
											<div class="col-md-2">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="ganti3" id="gantiplat_ta" value="ada"> Ganti Plat
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="stnk_gantung" id="stnk_gantung" value="ada"> STNK Hilang (Gantung)
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="ktp_bpkb" id="ktp_bpkb2" value="ada"> KTP dan FC BPKB ada
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="tanpa_ktp" id="tanpa_ktp3" value="ada"> Tanpa KTP
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="tanpa_ktpbpkb" id="tanpa_ktpbpkb3" value="ada"> Tanpa KTP dan FC BPKB
													</label>
												</div>
											</div>
											<div class="col-md-2" style="padding-left: 15px;">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="laporan_h" id="laporan_h3" value="Laporan Hilang"> Laporan Hilang
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="bbn" id="bbn4" value="ada"> BBN
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasaskp3" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Adm. SKP</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k" name="jenis_k2"  onchange="ambilskpmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t">
													<label class="control-label">Biaya Jasa Adm. SKP</label>
													<input type="text" name="jasa_skp" id="adm_skp" class="form-control jumlah_p_t">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasabpkb3" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">STNK Hilang (BPKB Asli)</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_kbbn" name="jenis_k_balik"  onchange="ambilbbnmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t">
													<label class="control-label">Biaya Jasa STNK Hilang (BPKB Asli)</label>
													<input type="text" name="bpkb_asli" id="bpkb_asli" class="form-control jumlah_p_t">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_stnkh3" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">STNK Hilang (Leasing)</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_kstnk" name="jenis_k_stnk"  onchange="ambilstnkmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t">
													<label class="control-label">Biaya Jasa STNK Hilang</label>
													<input type="text" name="stnk_hilang" id="jasa_stnk_t" class="form-control jumlah_p_t">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_rubahal3" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Rubah Alamat BPKB</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_r_bpkb" name="jenis_r_bpkb"  onchange="rubahalamatbpkb()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t">
													<label class="control-label">Biaya Jasa Rubah Alamat BPKB</label>
													<input type="text" name="jasa_rbpkb" id="rubah_bpkb" class="form-control jumlah_p_t">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_stnkbpkb3" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Rubah Alamat STNK dan BPKB</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_laporan" name="jenis_k_laporan"  onchange="ambillaporanmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t">
													<label class="control-label">Biaya Jasa Laporan Hilang</label>
													<input type="text" name="laporan_hilang" id="jasa_laporan_t" class="form-control jumlah_p_t">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_bn4" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Balik Nama</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_kbbn" name="jenis_k_balik"  onchange="ambilbbnmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t">
													<label class="control-label">Biaya Jasa Balik Nama</label>
													<input type="text" name="balik_nama" id="jasa_balik_t" class="form-control jumlah_p_t">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row" id="admtnkb_t" style="display: none;">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Ganti Plat</h4>
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
											<div class="form-group jumlah_pajak_t">
												<label class="control-label">Adm TNKB</label>
												<input type="text" name="adm_tnkb3" id="adm_tnkb_t" class="form-control jumlah_p_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="" id="jasa_stnkgantung" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">STNK Hilang Gantung</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_bbn" name="jenis_k_bbn"  onchange="ambilbbnbaru()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t">
													<label class="control-label">Biaya Jasa STNK Hilang Gantung</label>
													<input type="text" name="jasa_stnkgan" id="acc_bbn" class="form-control jumlah_p_t">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_ktpbpkb2" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">KTP dan FC BPKB ada</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_rubah" name="jenis_k_rubah"  onchange="rubahalamatstnk()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t">
													<label class="control-label">Biaya Jasa KTP dan FC BPKB</label>
													<input type="text" name="jasa_ktp" id="j_ktp" class="form-control jumlah_p_t">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_tanktp3" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Tanpa KTP</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_rubah" name="jenis_k_rubah"  onchange="rubahalamatstnk()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t">
													<label class="control-label">Biaya Jasa Tanpa KTP</label>
													<input type="text" name="jasa_tanktp" id="jtanpa_ktp" class="form-control jumlah_p_t">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_tanbpkb3" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Tanpa KTP dan FC BPKB</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_rubah" name="jenis_k_rubah"  onchange="rubahalamatstnk()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t">
													<label class="control-label">Biaya Jasa Tanpa KTP dan FC BPKB</label>
													<input type="text" name="jasa_tanbpkb" id="jtanpa_bpkb" class="form-control jumlah_p_t">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_laporh3" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Laporan Hilang</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_laporan" name="jenis_k_laporan"  onchange="ambillaporanmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t">
													<label class="control-label">Biaya Jasa Laporan Hilang</label>
													<input type="text" name="laporan_hilang" id="jasa_laporan_t" class="form-control jumlah_p_t">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasa_bbn4" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">BBN</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_laporan" name="jenis_k_laporan"  onchange="ambillaporanmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t">
													<label class="control-label">Biaya Jasa Laporan Hilang</label>
													<input type="text" name="laporan_hilang" id="jasa_laporan_t" class="form-control jumlah_p_t">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-t">
												<label class="control-label">Biaya Jasa</label>
												<input type="text" name="biaya_jasa4" class="form-control jasa jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-bottom: none;">
											<div class="form-group jum-t">
												<label class="control-label">Total Pajak</label>
												<input type="text" name="total_pajak4" id="sum_pajak_t" class="form-control jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_bu">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-top: none;">
											<div class="form-group">
												<label class="control-label">Total</label>
												<input type="text" name="total_tahun" id="sum_t" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
								</div>
								<!-- End Tahun -->
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