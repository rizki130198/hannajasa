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
										<div class="form-group label-floating is-empty jumlah_pajak_t">
											<label class="control-label">PKB</label>
											<input type="text" name="pkb3" id="pkb_t" onkeyup="m_sum_t();" class="form-control jumlah_p_t" >
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
											<select id="telat_bln" onchange="m_sum_t();" class="form-control" name="telat_bulan">
												<option value="0" selected>-- SILAHKAN PILIH --</option>
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
											<input type="text" name="sanski_swdllj2" onkeyup="harga_tahun()" class="form-control sankswd jumlah_p_t">
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
										<div class="form-group label-floating is-empty jum-pajak jumlah_pajak_t jum-n">
											<label class="control-label">PKB</label>
											<input type="text" name="pkb1" class="form-control jumlah_pajak jumlah_p_t">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" >
									<div class="col-md-12">
										<div class="form-group jum-pajak jumlah_pajak_t jum-n">
											<label class="control-label">SWDKLLJ</label>
											<input type="text" name="swdllj1" class="form-control swdklksama jumlah_pajak jumlah_p_t">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" id="jasa_n">
									<div class="col-md-12">
										<div class="form-group jum-n">
											<label class="control-label">Biaya Jasa</label>
											<input type="text" name="biaya_jasa" class="form-control jasa jumlah_n">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" id="total_p_n">
									<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-bottom: none;">
										<div class="form-group jum-n">
											<label class="control-label">Total Pajak</label>
											<input type="text" name="total_pajak" id="sum_pajak" class="form-control jumlah_n">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" id="total">
									<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-top: none;">
										<div class="form-group">
											<label class="control-label">Total Perkiraan Pajak</label>
											<input type="text" name="total1"  id="sum_n" class="form-control" >
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
										<div class="form-group label-floating is-empty jum-pajak-b jumlah_pajak_t">
											<label class="control-label">PKB</label>
											<input type="text" style="display: none;" id="denda_bu" name="telat_bln" onkeyup="sum_p();" class="form-control" value="0.02%">
											<input type="text" name="pkb2" id="pkb2" onkeyup="sum_p();" class="form-control jumlah_pajak_b jumlah_p_t">
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
										<div class="form-group jum-pajak-b jumlah_pajak_t">
											<label class="control-label">Sanksi PKB</label>
											<input type="text" name="sanksi_pkb1" id="sum_bulan" class="form-control jumlah_pajak_b jumlah_p_t">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group jum-pajak-b jumlah_pajak_t">
											<label class="control-label">SWDKLLJ</label>
											<input type="text" name="swdllj2" id="swdkllj_b" class="form-control swdklksama jumlah_pajak_b jumlah_p_t">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group jum-pajak-b jumlah_pajak_t">
											<label class="control-label">Sanksi SWDKLLJ</label>
											<input type="text" name="sanski_swdllj1" id="rupiah2" onkeyup="hargatotal();" class="form-control sankswd jumlah_pajak_b jumlah_p_t">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" id="jasa_b">
									<div class="col-md-12">
										<div class="form-group jum-b">
											<label class="control-label">Biaya Jasa</label>
											<input type="text" name="biaya_jasa1" class="form-control jasa jumlah_biaya">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" id="total_p_b">
									<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-bottom: none;">
										<div class="form-group jum-b">
											<label class="control-label">Total Pajak</label>
											<input type="text" name="total_pajak1" id="sum_pajak_b" class="form-control jumlah_biaya">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" id="total_b">
									<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-top: none;">
										<div class="form-group">
											<label class="control-label">Total Perkiraan Pajak</label>
											<input type="text" name="total2" id="hasil_biaya" class="form-control" >
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
											<div class="form-group jumlah_pajak_t">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk" id="adm_tnkb" class="form-control jumlah_p_t">
												<span class="material-input"></span>
											</div>
											<div class="form-grou jumlah_pajak_t">
												<label class="control-label">Adm TNKB</label>
												<input type="text" name="adm_tnkb" id="adm_stnk" class="form-control jumlah_p_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
								</div>
								<!-- End Ganti Plat -->
								<div class="row" id="jasa_t">
									<div class="col-md-12">
										<div class="form-group jum-b jum-t">
											<label class="control-label">Biaya Jasa</label>
											<input type="text" name="biaya_jasa2" class="form-control jasa jumlah_t">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" id="total_p_t">
									<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-bottom: none;">
										<div class="form-group jum-t">
											<label class="control-label">Total Pajak</label>
											<input type="text" name="total_pajak2" id="sum_pajak_t" class="form-control jumlah_t">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" id="total_t">
									<div class="col-md-12" style="border:dotted 1.5px #f57b72;border-top: none;">
										<div class="form-group jumlah_pajak">
											<label class="control-label">Total Perkiraan Pajak</label>
											<input type="text" name="total3" id="sum_t" class="form-control" >
											<span class="material-input"></span>
										</div>
									</div>
								</div>
							</div>	
							<button id="printPageButton" type="submit" class="btn btn-info pull-right">Submit</button>
							<button id="printButton" type="button" class="btn btn-default pull-right" onclick="print_pp()">Print</button>
						</div>
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>