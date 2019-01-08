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
								<div class="row" id="pkb_n" style="display: none;">
									<div class="col-md-12">
										<h4 style="font-weight: bold;text-transform: uppercase;">Pajak Hidup</h4>
										<div class="form-group label-floating is-empty">
											<label class="control-label">PKB</label>
											<input type="text" name="pkb2" class="form-control" >
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" id="swd_n" style="display: none;">
									<div class="col-md-12">
										<div class="form-group" >
											<label class="control-label">SWDKLLJ</label>
											<input type="text" name="swdllj1" class="form-control swdklksama" >
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" id="adm_stnk_n" style="display: none;">
									<div class="col-md-12">
										<div class="form-group label-floating is-empty">
											<label class="control-label">Adm STNK</label>
											<input type="text" name="adm_stnk2" id="adm_stnk" class="form-control" >
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" id="adm_tnkb_n" style="display: none;">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Adm TNKB</label>
											<input type="text" readonly name="adm_tnkb1" value="100.000" class="form-control" >
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row" id="total_n">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Total</label>
											<input type="text" name="total" readonly id="total_harga" class="form-control" >
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<!-- End Hidup -->
								<button type="submit" class="btn btn-info pull-right">Submit</button>
								<div class="clearfix"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>