<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header" data-background-color="purple">
						<h4 class="title">Harga</h4>
						<!-- <p class="category">Here is a subtitle for this table</p> -->
					</div>
					<div class="card-content">
						<form action="<?=site_url('main/proses_daftar')?>" method="post" accept-charset="utf-8">
							<?php 
								foreach ($harga as $rowHarga) { 
							?>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">SWDKLLJ Motor</label>
										<input type="text" name="swdk_r2" value="<?=$rowHarga->swdk_r2 ?>" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">SWDKLLJ Mobil</label>
										<input type="text" name="swdk_r4" value="<?=$rowHarga->swdk_r4 ?>" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">SWDKLLJ Mobil Box</label>
										<input type="text" name="swdk_r4_box" value="<?=$rowHarga->swdk_r4_box ?>" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Adm STNK Motor</label>
										<input type="text" name="adm_stnk_r2" value="<?=$rowHarga->adm_stnk_r2 ?>" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Adm STNK Mobil</label>
										<input type="text" name="adm_stnk_r4" value="<?=$rowHarga->adm_stnk_r4 ?>" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Adm TNKB Motor</label>
										<input type="text" name="adm_tnkb_r2" value="<?=$rowHarga->adm_tnkb_r2 ?>" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Adm TNKB Mobil</label>
										<input type="text" name="adm_tnkb_r4" value="<?=$rowHarga->adm_stnk_r2 ?>" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Adm TNKB Mobil Box</label>
										<input type="text" name="adm_tnkb_box" value="<?=$rowHarga->adm_tnkb_box ?>" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Sanksi SWDKLLJ Motor</label>
										<input type="text" name="sanksi_swdk_r2" value="<?=$rowHarga->sanksi_swdk_r2 ?>" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Sanksi SWDKLLJ Mobil</label>
										<input type="text" name="sanksi_swdk_r4" value="<?=$rowHarga->sanksi_swdk_r4 ?>" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary pull-right">Ubah</button>
							<div class="clearfix"></div>
							<?php } ?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>