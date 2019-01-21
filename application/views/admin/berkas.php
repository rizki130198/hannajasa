<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap4.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/material-dashboard.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/demo.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('public/css/jquery.toast.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('public/css/style.css');?>">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/fonts/font-awesome/css/font-awesome.min.css'); ?>">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>
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
<body>
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
												<input type="text" class="form-control" value="<?=$berkas->nama_pemilik?>" name="pem_bpkb" placeholder="Masukan Nama Pemilik">
											</div>
										</div>
									</div>
									<div class="form-group row" style="margin-top:-10px !important;margin: 0 !important;">
										<label class="col-sm-4 col-form-label" style="margin-top:-10px !important;">Nomor Polisi <span class="titik2">:</span></label>
										<div class="col-sm-8" style="">
											<input type="text" style="margin-top:-12px !important;" class="form-control" value="<?=$berkas->nopol?>" name="nopol" placeholder="Masukan nomor polisi">
										</div>
									</div>
									<div class="form-group row" style="margin-top:-10px !important;margin: 0 !important;">
										<label class="col-sm-4 col-form-label" style="margin-top:-10px !important;">Faktur <span class="titik2">:</span></label>
										<div class="col-sm-8 berkas" style="display: inline-flex;">	
										<?php $faktur = explode(',', $balik->faktur);?>
											<div class="checkbox">
												<label>
													<input type="checkbox" <?=($faktur[0]==NULL)?NULL:'checked value="'.$faktur[0].'"'?>> Ada
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" <?=($faktur[1]==NULL)?NULL:'checked value="'.$faktur[1].'"'?>> Tidak Ada
												</label>
											</div>
										</div>
									</div>
									<div class="form-group row" style="margin-top:-10px !important;margin: 0 !important;">
										<label class="col-sm-4 col-form-label" style="margin-top:-10px !important;">Kekurangan Biaya <span class="titik2">:</span></label>
										<div class="col-sm-8" style="">
											<div class="input-group" style="margin-top:-10px !important;">
												<span class="input-group-addon">Lunas/Rp</span>
												<input type="text" class="form-control" value="<?=$berkas->biaya?>" placeholder="Masukan Kekurangan Biaya">
											</div>
										</div>
									</div>
									<div class="form-group row" style="margin-top:-10px !important;margin: 0 !important;">
										<label class="col-sm-4 col-form-label" style="margin-top:-10px !important;">Perkiraan BPKB Selesai <span class="titik2">:</span></label>
										<div class="col-sm-8" style="">
											<div class="input-group" style="margin-top:-10px !important;">
												<span class="input-group-addon">Tanggal</span>
												<input type="text" id="datepicker" class="form-control" value="<?=$berkas->tgl_bpkb?>" placeholder="Masukan Kekurangan Biaya">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-6" style="float: right;">
											<div class="input-group" style="margin-top:-10px !important;">
												<span class="input-group-addon">Jakarta,</span>
												<input type="text" id="datepicker" class="form-control" value="<?=$berkas->created_at?>" placeholder="Masukan Kekurangan Biaya">
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
	</body>
<script type="text/javascript" src="<?=base_url('public/js/jq.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/bootstrap4.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/material.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/arrive.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/perfect-scrollbar.jquery.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('public/js/hanajasa.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/bootstrap-notify.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/material-dashboard.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/demo.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/jquery.dataTables.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('public/js/jquery.nicescroll.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('public/js/jquery.toast.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('public/js/hanajasa.js');?>"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	</html>