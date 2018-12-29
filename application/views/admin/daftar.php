<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header" data-background-color="blue">
						<h4 class="title">Tambah Pengguna</h4>
						<!-- <p class="category">Here is a subtitle for this table</p> -->
					</div>
					<div class="card-content">
						<form action="<?=site_url('main/proses_daftar')?>" method="post" accept-charset="utf-8">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Nama Lengkap</label>
										<input type="text" name="nama" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Username</label>
										<input type="text" maxlength="50" name="user" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Email</label>
										<input type="email" name="email" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Password</label>
										<input type="password" name="password" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Ulang Password</label>
										<input type="password" name="ulang_password" class="form-control" required="">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group is-empty">
										<p>Hak Akses</p>
										<select class="form-control" name="hak_akses" required="">
											<option value="">-- SILAHKAN PILIH HAK AKSES --</option>
											<option value="" disabled=""></option>
											<option value="cashier">Cashier</option>
											<option value="orang_lapangan">Orang Lapangan</option>
											<option value="super_admin">Super Admin</option>
										</select>
										<span class="material-input"></span></div>
									</div>
								</div>
								<button type="submit" class="btn btn-info pull-right">Daftar</button>
								<div class="clearfix"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>