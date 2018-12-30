<style type="text/css">
	.control-label{
	padding-top: 15px !important;
    margin-bottom: 0;
    font-size: 15px !important;
    text-align: left !important;
	}
	.form-group{
		margin: 15px 0 0 0 !important;
		padding-bottom: 0 !important;
	}
	.input-group .input-group-addon{
		padding-top: 0;
		padding-left: 0;
	}
	.titik2{
		text-align: right;
		float: right;
	}
	.checkbox {
    padding-right: 21px;
	}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header" style="background-color: #00c0ef;">
						<h4 class="title">Form Bukti Pengambilan BPKB</h4>
					</div>
					<div class="card-content">
						<form action="" class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Pemilik BPKB <span class="titik2">:</span></label>
								<div class="col-sm-8">
									<div class="input-group">
										<span class="input-group-addon">a.n. </span>
										<input type="text" class="form-control" name="pem_bpkb" placeholder="Masukan Nama Pemilik">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Nomor Polisi <span class="titik2">:</span></label>
								<div class="col-sm-8">
									<input type="number" class="form-control" name="nopol" placeholder="Masukan nomor polisi">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Faktur <span class="titik2">:</span></label>
								<div class="col-sm-8" style="display: inline-flex;">
									<div class="checkbox">
										<label>
											<input type="checkbox" value="ada"> Ada
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="tidak ada"> Tidak Ada
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Kekurangan Biaya <span class="titik2">:</span></label>
								<div class="col-sm-8">
									<div class="input-group">
										<span class="input-group-addon">Lunas/Rp</span>
										<input type="text" class="form-control" placeholder="Masukan Kekurangan Biaya">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Perkiraan BPKB Selesai <span class="titik2">:</span></label>
								<div class="col-sm-8">
									<div class="input-group">
										<span class="input-group-addon">Tanggal</span>
										<input type="text" id="datepicker" class="form-control" placeholder="Masukan Kekurangan Biaya">
									</div>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-block">Simpan & Cetak</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>