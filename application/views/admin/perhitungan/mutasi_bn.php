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
						<h4 class="title">Mutasi + Balik Nama STNK</h4>
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
												<input type="text" name="pkb" id="denda_bbn_h" style="display: none;" value="0.67%" onkeyup="b_hidup();">
												<input type="text" name="pkb1" id="pkb_b_h" onkeyup="b_hidup();" class="form-control jumlah_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-n">
												<label class="control-label">BBN KB</label>
												<input type="text" name="pkb1" id="total_bbn_h" class="form-control jumlah_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-n" >
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj" class="form-control swdklksama jumlah_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-n">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk" id="adm_stnk" class="form-control admstnk jumlah_n">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-n">
												<label class="control-label">Adm TNKB</label>
												<input type="text"  name="adm_tnkb" class="form-control admtnkb jumlah_n">
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
								<!-- End Hidup -->

								<!-- Start Bulan -->
								<div id="m_b" style="display: none;">
									<div class="row" >
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Lalu</h4>
											<div class="form-group label-floating is-empty jum-b">
												<label class="control-label">PKB</label>
												<input type="text" style="display: none;" id="denda_bu" name="telat_bln" onkeyup="sum_p();" class="form-control" value="2%">
												<input type="text" name="pkb2" id="pkb2" onkeyup="sum_p();" class="form-control jumlah_b">
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
												<input type="text" name="swdllj1" id="" class="form-control swdklksama jumlah_b" >
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
											<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Baru</h4>
											<div class="form-group label-floating is-empty jum-b">
												<label class="control-label">PKB</label>
												<input type="text" style="display: none;" id="denda_b" name="telat_bln" onkeyup="b_normal();" class="form-control" value="0.67%">
												<input type="text" name="pkb1" id="pkb_b" onkeyup="b_normal();" class="form-control jumlah_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-b">
												<label class="control-label">BBN KB</label>
												<input type="text" name="pkb1" id="total_bn" class="form-control jumlah_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-b" >
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj" class="form-control swdklksama jumlah_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-b">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk"  id="adm_stnk" class="form-control admstnk jumlah_b">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-b">
												<label class="control-label">Adm TNKB</label>
												<input type="text" name="adm_tnkb" class="form-control admtnkb jumlah_b">
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
								<div id="m_t" style="display: none;">
									<div class="row">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Lalu</h4>
											<div class="form-group label-floating is-empty jum-t">
												<label class="control-label">PKB</label>
												<input type="text" name="pkb3" id="pkb_t" class="form-control jumlah_t" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating is-empty">
												<label class="control-label">Telat Tahun</label>
												<input type="text" style="display: none;" id="denda" name="telat_thn" class="form-control" value="25%">
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

									<div class="row">
										<div class="col-md-12">
											<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Baru</h4>
											<div class="form-group label-floating is-empty jum-t">
												<label class="control-label">PKB</label>
												<input type="text" style="display: none;" id="denda_mt" name="telat_bln" onkeyup="m_tahun();" class="form-control" value="0.67%">
												<input type="text" name="pkb1" id="pkb_mt" onkeyup="m_tahun()" class="form-control jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-t">
												<label class="control-label">BBN KB</label>
												<input type="text" name="pkb1" id="total_mt" class="form-control jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-t" >
												<label class="control-label">SWDKLLJ</label>
												<input type="text" name="swdllj" class="form-control swdklksama jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-t">
												<label class="control-label">Adm STNK</label>
												<input type="text" name="adm_stnk"  id="adm_stnk" class="form-control admstnk jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group jum-t">
												<label class="control-label">Adm TNKB</label>
												<input type="text" name="adm_tnkb" class="form-control admtnkb jumlah_t">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row" id="total_bu">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Total</label>
												<input type="text" name="total_bulan" id="sum_t" class="form-control" >
												<span class="material-input"></span>
											</div>
										</div>
									</div>
								</div>
								<!-- End Tahun -->
								<button type="submit" class="btn btn-info pull-right">Submit</button>
								<div class="clearfix"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>