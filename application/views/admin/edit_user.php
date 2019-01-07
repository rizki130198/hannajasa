<style type="text/css">
	.form-group{
		margin: 0;
	}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header" data-background-color="blue">
						<h4 class="title">Ubah Pengguna</h4>
						<!-- <p class="category">Here is a subtitle for this table</p> -->
					</div>
					<div class="card-content">
						<?php foreach ($user as $rowUser): ?>
							<form method="post" action="<?php echo site_url('Main/proses_edit_user/'.$rowUser->id_users); ?>" accept-charset="utf-8">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Nama Lengkap</label>
											<input type="text" name="nama" value="<?=$rowUser->nama?>" class="form-control" required="">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Username</label>
											<input type="text" maxlength="50" value="<?=$rowUser->username?>" name="username" class="form-control" required="">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Email</label>
											<input type="email" name="email" value="<?=$rowUser->email?>" class="form-control" required="">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Password</label>
											<input type="password" value="<?=$rowUser->ulang_password?>" name="password" class="form-control" required="">
											<span class="material-input"></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Ulang Password</label>
											<input type="password" value="<?=$rowUser->ulang_password?>" name="ulang_password" class="form-control" required="">
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group is-empty">
											<p>Hak Akses</p>
											<select class="form-control" name="hak_akses" required="">
												<?php if ($rowUser->hak_akses == "super_admin"){ ?>
													<option value="super_admin">Super Admin</option>
												<?php }else if ($rowUser->hak_akses == "orang_lapangan") { ?>
													<option value="orang_lapangan">Orang Lapangan</option>
												<?php }else{ ?>
													<option value="cashier">Cashier</option>
												<?php } ?>
												<option value="" disabled=""></option>
												<option value="cashier">Cashier</option>
												<option value="orang_lapangan">Orang Lapangan</option>
												<option value="super_admin">Super Admin</option>
											</select>
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-info pull-right">Simpan</button>
								<div class="clearfix"></div>
							</form>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>