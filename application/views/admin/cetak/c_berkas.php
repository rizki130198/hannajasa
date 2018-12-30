<style type="text/css">
body{
	background-color: #fff;
}
.col-form-label{
	padding-top: 15px !important;
	margin-bottom: 0;
	font-size: 15px !important;
	text-align: left !important;
}
.form-group{
	margin: 15px 0 0 0 !important;
	padding-bottom: 0 !important;
}
.form-control{
	padding-left: 0 !important;
}
.input-group .input-group-addon{
	padding-top: 0;
	padding-left: 0;
}
.titik2{
	text-align: right;
	float: right;
}
.card{
	box-shadow: none;
	margin: 0;
	border:none !important;
}
.checkbox {
	padding-right: 21px;
}
.ps-scrollbar-y-rail{
	display: none;
}
.uangmuka{
	margin-left: 5px;
	height: 35px;
	width: 200px;
	margin-top: -5px; 
	background: #fff;
	border:solid 1.3px #333;
	-webkit-transform: skew(-25deg); 
	-moz-transform: skew(-25deg); 
	-o-transform: skew(-25deg);
	transform: skew(-25deg);
}
.berkas .checkbox{
	margin-top:-2px !important;
}
.checkbox input[type=checkbox]:checked+.checkbox-material .check {
	background: #2782d2;
}
.input-group-addon{
	line-height: 2.3;
	padding-right: 8px !important;
}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5">
				<div class="card">
					<div class="card-content">
						<form action="" class="form-horizontal">
							<div class="row">
								<div class="col-sm-12">
									<div class="media" style="padding-left: 15%;">
										<div class="media-left">
											<a href="#">
												<img src="<?php echo base_url('assets/img/tim_80x80.png'); ?>" style="width:100px;height:100px;">
											</a>
										</div>
										<div class="media-body">
											<h2 class="media-heading" style="font-weight: bold;margin-top: 8px;">CV. hanna Jasa</h2>
											<p style="margin-top: -15px;">BIRO JASA - STNK - SIM - PERIZINAN</p>
											<p style="margin-top: -18px !important;font-size: 16px;font-weight: bold;">Telp. (021) 9600 7235 - 9884 3932</p>
											<p style="margin-top: -22px !important;font-size: 16px;font-weight: bold;">0818 0703 3977 / 0878 8993 3255</p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<hr style="border-color: #333;border-top:solid 2px;margin-top: -26px;">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12" style="">
									<h2 style="font-weight: bold;text-align: center;margin-top: -30px;font-size:34px;text-transform: uppercase;">bukti pengambambilan bpkb</h2>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group row" style="margin-top:-10px !important;margin: 0 !important;">
										<label class="col-sm-4 col-form-label" style="margin-top:-10px !important;">Nama Pemilik BPKB <span class="titik2">:</span></label>
										<div class="col-sm-8" style="">
											<div class="input-group" style="margin-top:-10px !important;">
												<span class="input-group-addon">a.n. </span>
												<input type="text" class="form-control" name="pem_bpkb" placeholder="Masukan Nama Pemilik">
											</div>
										</div>
									</div>
									<div class="form-group row" style="margin-top:-10px !important;margin: 0 !important;">
										<label class="col-sm-4 col-form-label" style="margin-top:-10px !important;">Nomor Polisi <span class="titik2">:</span></label>
										<div class="col-sm-8" style="">
											<input type="text" style="margin-top:-12px !important;" class="form-control" name="nopol" placeholder="Masukan nomor polisi">
										</div>
									</div>
									<div class="form-group row" style="margin-top:-10px !important;margin: 0 !important;">
										<label class="col-sm-4 col-form-label" style="margin-top:-10px !important;">Faktur <span class="titik2">:</span></label>
										<div class="col-sm-8 berkas" style="display: inline-flex;">
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
									<div class="form-group row" style="margin-top:-10px !important;margin: 0 !important;">
										<label class="col-sm-4 col-form-label" style="margin-top:-10px !important;">Kekurangan Biaya <span class="titik2">:</span></label>
										<div class="col-sm-8" style="">
											<div class="input-group" style="margin-top:-10px !important;">
												<span class="input-group-addon">Lunas/Rp</span>
												<input type="text" class="form-control" placeholder="Masukan Kekurangan Biaya">
											</div>
										</div>
									</div>
									<div class="form-group row" style="margin-top:-10px !important;margin: 0 !important;">
										<label class="col-sm-4 col-form-label" style="margin-top:-10px !important;">Perkiraan BPKB Selesai <span class="titik2">:</span></label>
										<div class="col-sm-8" style="">
											<div class="input-group" style="margin-top:-10px !important;">
												<span class="input-group-addon">Tanggal</span>
												<input type="text" id="datepicker" class="form-control" placeholder="Masukan Kekurangan Biaya">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-6" style="float: right;">
											<div class="input-group" style="margin-top:-10px !important;">
												<span class="input-group-addon">Jakarta,</span>
												<input type="text" id="datepicker" class="form-control" placeholder="Masukan Kekurangan Biaya">
											</div>
											<p style="text-align: center;margin-top: 15px;">Pengelola hanna jasa</p>
											<p style="border-bottom: solid 1.5px #333;width: 60%;margin: 30% auto;text-align: center;"></p>
										</div>
									</div>	
								</div>
							</div>					
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>