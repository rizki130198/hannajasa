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
							<div class="row">
							<?php 
								foreach ($harga as $rowHarga) { 
							?>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label"><?=$rowHarga->nama ?></label>
										<input type="text" name="swdk_r2" value="<?=$rowHarga->harga ?>" class="form-control" required="">
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