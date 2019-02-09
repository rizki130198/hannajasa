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
						<h4 class="title">Mutasi</h4>
					</div>
					<div class="card-content">
						
						<form action="<?=site_url('main/proses_mutasi')?>" id="form_p" name="form_p" method="post" accept-charset="utf-8">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group is-empty">
										<p>Jenis Balik Nama</p>
										<select class="form-control" onchange="mutasi()" name="jenis_b" id="mutasi_stnk">
											<option value="">-- SILAHKAN PILIH --</option>
											<option value="" disabled></option>
											<option value="Pajak Hidup">Pajak Hidup</option>
											<option value="Telat bulanan">Pajak Telat bulanan</option>
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
								<div id="m_h" style="display: none;">
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
												<input type="text" name="swdllj1" class="form-control swdklksama jumlah_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-n">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk1" id="adm_stnk" class="form-control admstnk jumlah_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-n">
												<label class="control-label">Adm TNKB</label>
												<input type="text" name="adm_tnkb1" class="form-control admtnkb jumlah_n">
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
									<div class="row">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-bottom: none;">
											<div class="form-group jum-pajak">
												<label class="control-label">Total Pajak</label>
												<input type="text" name="total_pajak1" readonly id="sum_n" class="form-control jumlah">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-top: none;">
											<div class="form-group">
												<label class="control-label">Total Perkiraaan Pajak</label>
												<input type="text" name="total_hidup" readonly id="sum" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
								</div>
								<!-- End Hidup -->

								<!-- Start Bulan -->
								<div id="m_b" style="display: none;">
									<div class="row" >
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Lalu</h4>
											<div class="form-group label-floating is-empty jum-pajak-b">
												<label class="control-label">PKB</label>
												<input type="text" style="display: none;" id="denda_bu" name="telat_bln" onkeyup="sum_p();" class="form-control" value="0.02%">
												<input type="text" name="pkb2" id="pkb2" onkeyup="sum_p();" class="form-control jumlah_pajak_b">
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
												<input type="text" name="sanksi_pkb1" id="sum_bulan" class="form-control jumlah_pajak_b">
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
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="skp" id="gantiplat_bul" value="SKP"> Adm. SKP
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="baliknama" id="bbn" value="Balik Nama"> Balik Nama
													</label>
												</div>
											</div>
											<div class="col-md-3">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="stnk_h" id="rubstnk" value="STNK Hilang"> STNK Hilang
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="laporan_h" id="rubala" value="Laporan Hilang"> Laporan Hilang
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row" id="admtnkb_b" style="display: none;">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Adm. SKP</h4>
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
												<label class="control-label">Biaya Jasa Adm. SKP</label>
												<input type="text" name="jasa_skp" id="adm_skp" class="form-control jumlah_pajak_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="" id="jasabbn" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Balik Nama</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_bpkb1" name="jenis_k_balik"  onchange="ambilbbn1()">
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
													<input type="text" name="balik_nama" id="balik_n" class="form-control jumlah_pajak_b">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasarubstnk" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">STNK Hilang</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_ktp1" name="jenis_k_stnk"  onchange="ambilstnk1()">
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
													<input type="text" name="stnk_hilang" id="stnk_h" class="form-control jumlah_pajak_b">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasarubala" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Laporan Hilang</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_loksus1" name="jenis_k_laporan"  onchange="ambilalamat3()">
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
													<input type="text" name="laporan_hilang" id="laporan_h" class="form-control jumlah_pajak_b">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Baru</h4>
											<div class="form-group label-floating is-empty jum-pajak-b">
												<label class="control-label">PKB</label>
												<input type="text" name="pkb3" class="form-control jumlah_pajak_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-pajak-b" >
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj3" class="form-control swdklksama jumlah_pajak_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-pajak-b">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk2"  id="adm_stnk" class="form-control admstnk jumlah_pajak_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-pajak-b">
												<label class="control-label">Adm TNKB</label>
												<input type="text" name="adm_tnkb2" class="form-control admtnkb jumlah_pajak_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="jasa_bu">
										<div class="col-md-12">
											<div class="form-group jum-b">
												<label class="control-label">Biaya Jasa</label>
												<input type="text" name="biaya_jasa2" class="form-control jasa jumlah_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_bu">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-bottom: none;">
											<div class="form-group jum-b">
												<label class="control-label">Total Pajak</label>
												<input type="text" name="total_pajak2" id="sum_pajak_b" class="form-control jumlah_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_b">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-top: none;">
											<div class="form-group">
												<label class="control-label">Total Perkiraan Pajak</label>
												<input type="text" name="total_bulan" readonly id="sum_b" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
								</div>
								<!-- End Bulan -->

								<!-- Start Tahun -->
								<div id="m_t" style="display: none;">
									<div class="row">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Lalu</h4>
											<div class="form-group label-floating is-empty jumlah_pajak_t">
												<label class="control-label">PKB</label>
												<input type="text" name="pkb4" id="pkb_t" class="form-control jumlah_p_t" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<!-- <div class="col-md-12">
											<div class="form-group label-floating is-empty">
												<label class="control-label">Telat Tahun</label>
												<input type="text" name="telat_thn" id="telat_thn" onkeyup="m_sum_t();" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div> -->
										<div class="col-md-6">
											<div class="form-group is-empty">
												<input type="text" style="display: none;" id="denda" name="telat_thn" class="form-control" value="0.25%">
												<p>Telat Tahun</p>
												<select id="telat_thn" onchange="m_sum_t();" class="form-control" name="telat_thn">
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
												<select id="telat_bln" onchange="m_sum_t();" class="form-control" name="telat2">
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
												<input type="text" name="sanksi_pkb2" readonly id="hasil_tahun" class="form-control jumlah_p_t"  value="">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t">
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj4" id="swdkllj_t" onkeyup="harga_tahun()" class="form-control swdklksama jumlah_p_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t">
												<label class="control-label">Sanksi SWDKLLJ</label>
												<input type="text" name="sanski_swdllj2" onkeyup="harga_tahun()" class="form-control sankswd jumlah_p_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="skp_t" id="gantiplat_nor" value="ada"> Adm. SKP
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="balik_n_t" id="bpkb" value="Balik Nama"> Balik Nama
													</label>
												</div>
											</div>
											<div class="col-md-3">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="stnk_h_t" id="ktp" value="STNK Hilang"> STNK Hilang
													</label>
												</div>
											</div>
											<div class="col-md-2">
												<div class="checkbox" style="display: inline-flex;">
													<label>
														<input type="checkbox" name="laporan_h_t" id="loksus" value="Laporan Hilang"> Laporan Hilang
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row" id="admtnkb_n" style="display: none;">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Adm. SKP</h4>
											<div class="form-group is-empty">
												<p>Jenis Kendaraan</p>
												<select class="form-control" id="jenis_k" name="jenis_skp"  onchange="ambilskpmutasi()">
													<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
													<option value="" disabled=""></option>
													<?php foreach ($catat->result() as $key): ?>
														<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
													<?php endforeach ?>
												</select>
												<span class="material-input"></span>
											</div>
											<div class="form-group jumlah_pajak_t">
												<label class="control-label">Adm. SKP</label>
												<input type="text" name="adm_skp_t" id="adm_skp" class="form-control jumlah_p_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="" id="jasabpkb" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Balik Nama</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_kbbn" name="jenis_balik_t"  onchange="ambilbbnmutasi()">
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
													<input type="text" name="jasa_balik_t" id="jasa_balik_t" class="form-control jumlah_p_t">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasaktp" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">STNK Hilang</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_kstnk" name="jenis_stnk_t"  onchange="ambilstnkmutasi()">
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
													<input type="text" name="jasa_stnk_t" id="jasa_stnk_t" class="form-control jumlah_p_t">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="" id="jasaloksus" style="display: none;">
										<div class="row">
											<div class="col-md-12">
												<h4 style="font-weight: bold;text-transform: uppercase;">Laporan Hilang</h4>
												<div class="form-group is-empty">
													<p>Jenis Kendaraan</p>
													<select class="form-control" id="jenis_k_laporan" name="jenis_laporan_t"  onchange="ambillaporanmutasi()">
														<option value="">-- SILAHKAN PILIH JENIS KENDARAAN --</option>
														<option value="" disabled=""></option>
														<?php foreach ($catat->result() as $key): ?>
															<option value="<?=$key->jenis?>"><?=$key->jenis?></option>
														<?php endforeach ?>
													</select>
													<span class="material-input"></span>
												</div>
												<div class="form-group jumlah_pajak_t">
													<label class="control-label">Biaya Jasa Rubah Alamat</label>
													<input type="text" name="jasa_laporan_t" id="jasa_laporan_t" class="form-control jumlah_p_t">
													<span class="material-input"></span>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Baru</h4>
											<div class="form-group label-floating is-empty jumlah_pajak_t">
												<label class="control-label">PKB</label>
												<input type="text" name="pkb5" class="form-control jumlah_p_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t" >
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj5" class="form-control swdklksama jumlah_p_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk3"  id="adm_stnk" class="form-control admstnk jumlah_p_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jumlah_pajak_t">
												<label class="control-label">Adm TNKB</label>
												<input type="text" name="adm_tnkb3" class="form-control admtnkb jumlah_p_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-t">
												<label class="control-label">Biaya Jasa</label>
												<input type="text" name="biaya_jasa3" class="form-control jasa jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-bottom: none;">
											<div class="form-group jum-t">
												<label class="control-label">Total Pajak</label>
												<input type="text" readonly name="total_pajak3" id="sum_pajak_t" class="form-control jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-top: none;">
											<div class="form-group">
												<label class="control-label">Total Perkiraan Pajak</label>
												<input type="text" name="total_su" id="sum_t" class="form-control" >
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