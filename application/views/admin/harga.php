<style type="text/css">
	.form-group{
		margin: 0;
	}
	.input-group .input-group-addon{
		padding: 0 5px 0 0; 
	}
</style>
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
							<h3 style="font-weight: bold;">SWDKLLJ</h3>
							<div class="row">
								<?php 
									foreach ($swdkllj as $rowSwd) { 
								?>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label"><?php echo $rowSwd['nama']; ?></label>
										<input type="text" name="swdk_r2" value="<?php echo $rowSwd['harga']; ?>" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
								<?php } ?>
							</div>
							<h3 style="font-weight: bold;">STNK</h3>
							<div class="row">
								<?php 
									foreach ($stnk as $rowStnk) { 
								?>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label"><?php echo $rowStnk['nama']; ?></label>
										<input type="text" name="swdk_r2" value="<?php echo $rowStnk['harga']; ?>" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
								<?php } ?>
							</div>
							<h3 style="font-weight: bold;">TNKB</h3>
							<div class="row">
								<?php 
									foreach ($tnkb as $rowTnkb) { 
								?>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label"><?php echo $rowTnkb['nama']; ?></label>
										<input type="text" name="swdk_r2" value="<?php echo $rowTnkb['harga']; ?>" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
								<?php } ?>
							</div>
							<h3 style="font-weight: bold;">Sanksi</h3>
							<div class="row">
								<?php 
									foreach ($sanksi as $rowSanksi) { 
								?>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label"><?php echo $rowSanksi['nama']; ?></label>
										<input type="text" name="swdk_r2" value="<?php echo $rowSanksi['harga']; ?>" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
								<?php } ?>
							</div>
							<button type="submit" class="btn btn-primary pull-right">Ubah</button>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>