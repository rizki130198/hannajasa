<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Halaman Cetak Perpanjang STNK</title>
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
<style type="text/css" media="screen">
@media (max-width: 400px){
	.form{
		width: 100% !important;
	}
	.m10{
		margin-top:10px;
	}
}

}	
.cssload-container{
	display: block;
	margin:49px auto;
	width:97px;
}

.cssload-loading i{
	width: 19px;
	height: 19px;
	display: inline-block;
	border-radius: 50%;
	background: rgb(0,179,213);
}
.cssload-loading i:first-child{
	opacity: 0;
	animation:cssload-loading-ani2 0.58s linear infinite;
	-o-animation:cssload-loading-ani2 0.58s linear infinite;
	-ms-animation:cssload-loading-ani2 0.58s linear infinite;
	-webkit-animation:cssload-loading-ani2 0.58s linear infinite;
	-moz-animation:cssload-loading-ani2 0.58s linear infinite;
	transform:translate(-19px);
	-o-transform:translate(-19px);
	-ms-transform:translate(-19px);
	-webkit-transform:translate(-19px);
	-moz-transform:translate(-19px);
}
.cssload-loading i:nth-child(2),
.cssload-loading i:nth-child(3){
	animation:cssload-loading-ani3 0.58s linear infinite;
	-o-animation:cssload-loading-ani3 0.58s linear infinite;
	-ms-animation:cssload-loading-ani3 0.58s linear infinite;
	-webkit-animation:cssload-loading-ani3 0.58s linear infinite;
	-moz-animation:cssload-loading-ani3 0.58s linear infinite;
}
.cssload-loading i:last-child{
	animation:cssload-loading-ani1 0.58s linear infinite;
	-o-animation:cssload-loading-ani1 0.58s linear infinite;
	-ms-animation:cssload-loading-ani1 0.58s linear infinite;
	-webkit-animation:cssload-loading-ani1 0.58s linear infinite;
	-moz-animation:cssload-loading-ani1 0.58s linear infinite;
}




@keyframes cssload-loading-ani1{
	100%{
		transform:translate(39px);
		opacity: 0;
	}
}

@-o-keyframes cssload-loading-ani1{
	100%{
		-o-transform:translate(39px);
		opacity: 0;
	}
}

@-ms-keyframes cssload-loading-ani1{
	100%{
		-ms-transform:translate(39px);
		opacity: 0;
	}
}

@-webkit-keyframes cssload-loading-ani1{
	100%{
		-webkit-transform:translate(39px);
		opacity: 0;
	}
}

@-moz-keyframes cssload-loading-ani1{
	100%{
		-moz-transform:translate(39px);
		opacity: 0;
	}
}

@keyframes cssload-loading-ani2{
	100%{
		transform:translate(19px);
		opacity: 1;
	}
}

@-o-keyframes cssload-loading-ani2{
	100%{
		-o-transform:translate(19px);
		opacity: 1;
	}
}

@-ms-keyframes cssload-loading-ani2{
	100%{
		-ms-transform:translate(19px);
		opacity: 1;
	}
}

@-webkit-keyframes cssload-loading-ani2{
	100%{
		-webkit-transform:translate(19px);
		opacity: 1;
	}
}

@-moz-keyframes cssload-loading-ani2{
	100%{
		-moz-transform:translate(19px);
		opacity: 1;
	}
}

@keyframes cssload-loading-ani3{
	100%{
		transform:translate(19px);
	}
}

@-o-keyframes cssload-loading-ani3{
	100%{
		-o-transform:translate(19px);
	}
}

@-ms-keyframes cssload-loading-ani3{
	100%{
		-ms-transform:translate(19px);
	}
}

@-webkit-keyframes cssload-loading-ani3{
	100%{
		-webkit-transform:translate(19px);
	}
}

@-moz-keyframes cssload-loading-ani3{
	100%{
		-moz-transform:translate(19px);
	}
}
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
	margin-top: -12px; 
	background: #fff;
	border:solid 1.3px #333;
	-webkit-transform: skew(-25deg); 
	-moz-transform: skew(-25deg); 
	-o-transform: skew(-25deg);
	transform: skew(-25deg);
}
.berkas .checkbox{
	margin-top:-28px !important;
}
.checkbox input[type=checkbox]:checked+.checkbox-material .check {
	background: #2782d2;
}
.input-group-addon{
	line-height: 2.3;
	padding-right: 8px !important;
}
table tr td{
	padding-left: 0 !important;
	padding-right: 0 !important;
}
</style>
<body>
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-content">
							<form action="" class="form-horizontal">
								<div class="row">
									<div class="col-sm-6">
										<div class="media">
											<div class="media-left">
												<a href="#">
													<img src="<?php echo base_url('assets/img/tim_80x80.png'); ?>" style="width:100px;height:100px;">
												</a>
											</div>
											<div class="media-body">
												<h2 class="media-heading" style="font-weight: bold;">CV. hanna Jasa</h2>
												<p style="margin-top: -18px;font-weight: bold;">BIRO JASA - STNK - SIM - PERIZINAN</p>
												<p style="margin-top: -15px !important;font-size: 16px;">087777676888</p>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="media">
											<div class="media-left">
												<div class="card" style="font-size:14px;background-color: #2782d2;border-radius: 0;margin-top: 12px;">
													<div class="card-content" style="padding: 5px 10px;">
														<h3 style="color: #fff;font-weight: bold;margin:0;">TANDA TERIMA <br>UANG & BERKAS</h3>
													</div>
												</div>
											</div>
											<div class="media-body" style="padding-left: 20px;">
												<h5 class="media-heading" style="margin-top: 5px;margin-bottom: 2px;">Kepada Yth.</h5>
												<div class="form-group row" style="margin-top: -12px !important;">
													<label class="col-sm-4 col-form-label" style="padding-left: 0;width: 27%;">Bpk/Ibu/Sdr-i/PT <span class="titik2">:</span></label>
													<div class="col-sm-8">
														<input type="text" value="<?=$perpanjang->penerima?>" style="margin-top: -3px;" class="form-control" placeholder="Masukan nama">
													</div>
													<label class="col-sm-4 col-form-label" style="padding-left: 0;width: 27%;margin-top: -10px;">Telp./HP <span class="titik2">:</span></label>
													<div class="col-sm-8">
														<input type="number" value="<?=$perpanjang->no_telp?>" style="margin-top: -10px;" class="form-control" placeholder="Masukan nomor telp/hp">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<hr style="border-color: #333;border-top:solid 2px;margin-top: -10px !important;">
								<div class="col-md-12" style="">
									<h4 style="font-weight: bold;text-align: right;margin-top: -10px;margin-bottom: 0 !important;">No : <span style="text-decoration: underline;padding-bottom: 0 !important;"><?=$perpanjang->no?></span></h4>
								</div>
								<div class="form-group row" style="margin-top:-10px !important;margin: 0 !important;">
									<label class="col-sm-2 col-form-label">Sudah terima dari (atas nama)<span class="titik2">:</span></label>
									<div class="col-sm-8">
										<div class="input-group">
											<span class="input-group-addon">Bpk/Ibu/Sdr-i/PT :</span>
											<input type="text" value="<?=$perpanjang->atas_nama?>" style="margin-top: -3px;" class="form-control" placeholder="Sudah terima dari ( atas nama )">
										</div>
									</div>
								</div>
								<div class="form-group row" style="margin: 0 !important;">
									<label class="col-sm-2 col-form-label" style="margin-top:-18px !important;">Uang Muka (DP) Sebesar <span class="titik2">:</span></label>
									<div class="col-sm-8">
										<div class="uangmuka"><h5 style="transform: skew(25deg);margin: 0 10px;">Rp. <?=$perpanjang->uang_dp?></h5></div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" style="margin-top:-35px !important;">Kelengkapan Berkas <span class="titik2">:</span></label>
									<div class="col-sm-8">
										<!-- <input type="text" class="form-control" placeholder="Masukan nama"> -->
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" style="margin-top:-35px !important;">1. BPKB <span class="titik2">:</span></label>
									<div class="col-sm-8 berkas" style="display: inline-flex;">
										<?php $bpkb = explode(',', $perpanjang->bpkb)?>
										<?php $sim = explode(',', $perpanjang->sim)?>
										<div class="checkbox" style="">
											<label>
												<input type="checkbox" <?=($bpkb[0]==NULL)?NULL:'checked value="'.$bpkb[0].'"'?>> Ada + Faktur
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" <?=($bpkb[1]==NULL)?NULL:'checked value="'.$bpkb[1].'"'?> > As Tanpa Faktur
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" <?=($bpkb[2]==NULL)?NULL:'checked value="'.$bpkb[2].'"'?>> Foto Copy
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"  <?=($bpkb[3]==NULL)?NULL:'checked value="'.$bpkb[3].'"'?>> Surat Leasing
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" <?=($bpkb[4]==NULL)?NULL:'checked value="'.$bpkb[4].'"'?> > Tidak Ada/Acc
											</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" style="margin-top:-35px !important;">2. KTP / SIM (Asli) <span class="titik2">:</span></label>
									<div class="col-sm-3 berkas" style="display: inline-flex;">
										<div class="checkbox" style="padding-right: 75px;">
											<label>
												<input type="checkbox" <?=($sim[0]==NULL)?NULL:'checked value="'.$sim[0].'"'?>> Ada
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" <?=($sim[1]==NULL)?NULL:'checked value="'.$sim[1].'"'?>> Tidak Ada/Acc
											</label>
										</div>
									</div>
									<div class="col-sm-5">
										<div class="input-group" style="margin-top:-35px !important;">
											<span class="input-group-addon">Wilayah : DKI/ </span>
											<input type="text" value="<?=$perpanjang->wilayah?>" class="form-control" placeholder="Masukan Wilayah">
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" style="margin-top:-35px !important;">3. STNK (Asli) Nopol <span class="titik2">:</span></label>
									<div class="col-sm-3">
										<div class="input-group" style="margin-top:-35px !important;">
											<span class="input-group-addon">B.</span>
											<input type="text" value="<?=$perpanjang->nopol?>" class="form-control" placeholder="Masukan Nopol">
										</div>
									</div>
									<div class="col-md-1" style="padding-right: 0;">
										<div class="input-group" style="margin-top:-35px !important;">
											<select class="form-control" name="jenis_k" required="">
												<option value="<?=$perpanjang->jenis_kendaraan?>" selected><?=$perpanjang->jenis_kendaraan?></option>
											</select>
											<span class="material-input"></span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="input-group" style="margin-top:-35px !important;">
											<span class="input-group-addon">Masa Berlaku Pajak :</span>
											<input type="text" value="<?=$perpanjang->tahun_pajak?>"" class="form-control" placeholder="Masukan Masa Berlaku">
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" style="margin-top:-35px !important;">4. Lain-lain Berupa <span class="titik2">:</span></label>
									<div class="col-sm-8">
										<input type="text" value="<?=$perpanjang->lainnya?> style="margin-top:-35px !important;" class="form-control">
									</div>
								</div>
								<h4 style="font-weight: bold;text-transform: uppercase;margin-top: 15px;">Biasa Perpanjang Pajak Stnk</h4>
								<div class="row">
									<div class="col-md-8">
										<div class="table-responsive">
											<table class="table">
												<thead border="2" style="border: solid 2px #333;">
													<tr style="background-color: #b8dbf7;">
														<th style="text-align: center;width: 50%;padding:5px;border: solid 2px #333;font-weight: bold;">BIAYA PAJAK (HANYA PREDIKSI)*</th>
														<th style="text-align: center;width: 50%;padding:5px;border: solid 2px #333;font-weight: bold;">BIAYA PROSES</th>
													</tr>
												</thead>
												<tbody style="border: solid 2px;">
													<tr>
														<td style="border-right: solid 2px #333;vertical-align: top;">
															<div class="form-group row" style="margin-top:0px !important;">
																<div class="col-sm-5">
																	<div class="checkbox" style="display: contents;">
																		<label style="font-weight: bold;color: #333;"><input type="checkbox" <?=($perpanjang->pajak_ini==NULL)?NULL:'checked value="'.$perpanjang->pajak_ini.'"'?>> Pajak Tahun ini</label>
																		<span class="titik2">:</span>
																	</div>
																</div>
																<div class="col-sm-7">
																	<div class="input-group" style="margin-top: -6px;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																		<input type="text" value="<?=$perpanjang->harga_pajak_ini?>" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0px !important;">
																<div class="col-sm-5">
																	<div class="checkbox" style="display: contents;">
																		<label style="font-weight: bold;color: #333;"><input type="checkbox" <?=($perpanjang->pajak_lalu==NULL)?NULL:'checked value="'.$perpanjang->pajak_lalu.'"'?>> Pajak Tahun lalu (SKP)</label>
																		<span class="titik2">:</span>
																	</div>
																</div>
																<div class="col-sm-7">
																	<div class="input-group" style="margin-top: -6px;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																		<input type="text" value="<?=$perpanjang->harga_pajak_lalu?>" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<label class="col-sm-5 col-form-label" style="padding-left: 44px;font-weight: bold;color: #333;">Total Pajak<span class="titik2">:</span></label>
																<div class="col-sm-7">
																	<div class="input-group" style="margin-top: -4px;border-top: solid 1.5px #333;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																		<input type="text" value="<?=$perpanjang->total_pajak?>" class="form-control">
																	</div>
																</div>
															</div>
															<p style="padding: 40px 14px 0;">*Biaya pajak hanya prediksi. Setiap tahunnya biasa berubah dan besarnya akan tertera di lembar SKPD/STNK</p>
														</td>
														<td style="vertical-align: top;">
															<div class="form-group row" style="margin-top:0px !important;">
																<div class="col-sm-5">
																	<div class="checkbox" style="display: contents;">
																		<label style="font-weight: bold;color: #333;"><input type="checkbox" <?=($perpanjang->biaya_jasa==NULL)?NULL:'checked value="'.$perpanjang->biaya_jasa.'"'?>> Biaya Jasa</label>
																		<span class="titik2">:</span>
																	</div>
																</div>
																<div class="col-sm-7">
																	<div class="input-group" style="margin-top: -6px;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																		<input type="text" value="<?=$perpanjang->harga_jasa?>" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<div class="col-sm-5" style="margin-top:-10px;">
																	<div class="checkbox" style="display: contents;margin-top: -15px !important;">
																		<label style="font-weight: bold;color: #333;">
																			<input type="checkbox" <?=($perpanjang->acc_bpkb==NULL)?NULL:'checked value="'.$perpanjang->acc_bpkb.'"'?>> Acc BPKB</label>
																			<span class="titik2">:</span>
																		</div>
																	</div>
																	<div class="col-sm-7" style="margin-top:-10px;">
																		<div class="input-group" style="margin-top: -6px;">
																			<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																			<input type="text" value="<?=$perpanjang->harga_bpkb?>" class="form-control">
																		</div>
																	</div>
																</div>
																<div class="form-group row" style="margin-top: 0 !important;">
																	<div class="col-sm-5" style="margin-top:-10px;">
																		<div class="checkbox" style="display: contents;">
																			<label style="font-weight: bold;color: #333;"><input type="checkbox" <?=($perpanjang->plat==NULL)?NULL:'checked value="'.$perpanjang->plat.'"'?>> Cek Fisik dan Plat</label>
																			<span class="titik2">:</span>
																		</div>
																	</div>
																	<div class="col-sm-7" style="margin-top:-10px;">
																		<div class="input-group" style="margin-top: -6px;">
																			<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																			<input type="text" value="<?=$perpanjang->harga_plat?>" class="form-control">
																		</div>
																	</div>
																</div>
																<div class="form-group row" style="margin-top: 0 !important;">
																	<div class="col-sm-5" style="margin-top:-10px;">
																		<div class="checkbox" style="display: contents;">
																			<label style="font-weight: bold;color: #333;"><input type="checkbox" <?=($perpanjang->adm_skp==NULL)?NULL:'checked value="'.$perpanjang->adm_skp.'"'?>> Adm. SKP/Pajak Lalu</label>
																			<span class="titik2">:</span>
																		</div>
																	</div>
																	<div class="col-sm-7" style="margin-top:-10px;">
																		<div class="input-group" style="margin-top: -6px;">
																			<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																			<input type="text" value="<?=$perpanjang->harga_adm?>" class="form-control">
																		</div>
																	</div>
																</div>
																<div class="form-group row" style="margin-top: 0 !important;">
																	<div class="col-sm-5" style="margin-top:-10px;">
																		<div class="checkbox" style="display: contents;">
																			<label style="font-weight: bold;color: #333;"><input type="checkbox" <?=($perpanjang->progresif==NULL)?NULL:'checked value="'.$perpanjang->progresif.'"'?>> Blokir Progresif</label>
																			<span class="titik2">:</span>
																		</div>
																	</div>
																	<div class="col-sm-7" style="margin-top:-10px;">
																		<div class="input-group" style="margin-top: -6px;">
																			<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																			<input type="text" value="<?=$perpanjang->harga_blokir?>" class="form-control">
																		</div>
																	</div>
																</div>
																<div class="form-group row" style="margin-top: 0 !important;">
																	<div class="col-sm-1" style="margin-top:-10px;">
																		<div class="checkbox" style="display: contents;">
																			<label style="font-weight: bold;color: #333;"><input type="checkbox" <?=($perpanjang->proses_lain==NULL)?NULL:'checked value="'.$perpanjang->proses_lain.'"'?>></label>
																		</div>
																	</div>
																	<div class="col-sm-4" style="padding: 0;margin-top:-10px;">
																		<input type="text" value="<?=$perpanjang->proses_lain?>" class="form-control" placeholder="" style="width: 90%;">
																	</div>
																	<div class="col-sm-7" style="margin-top:-10px;">
																		<div class="input-group" style="margin-top: -6px;">
																			<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																			<input type="text" value="<?=$perpanjang->harga_lainnya?>" class="form-control">
																		</div>
																	</div>
																</div>
																<div class="form-group row" style="margin-top: 0 !important;">
																	<label class="col-sm-5 col-form-label" style="margin-top:-10px;padding-left: 44px;font-weight: bold;color: #333;">Total Biaya Proses<span class="titik2">:</span></label>
																	<div class="col-sm-7" style="margin-top:-10px;">
																		<div class="input-group" style="margin-top: -4px;border-top: solid 1.5px #333;">
																			<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																			<input type="text" value="<?=$perpanjang->total_proses?>" class="form-control">
																		</div>
																	</div>
																</div>
															</td>
														</tr>
														<tr>
															<td colspan="2" style="background-color: #b8dbf7;border-top: solid 2px #333;    padding-bottom: 8px;">
																<div class="form-group row" style="margin:0 !important;">
																	<label class="col-sm-3 col-form-label" style="font-weight: bold;color: #333;margin-top: -8px !important;">Prediksi Total Biaya <span class="titik2">:</span></label>
																	<div class="col-sm-6">
																		<div class="input-group" style="margin-top: -10px !important;">
																			<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																			<input value="<?=$perpanjang->biaya_prediksi?>" type="text" style="background-image: linear-gradient(#9c27b0, #9c27b0), linear-gradient(#333, #333);" class="form-control">
																		</div>
																	</div>
																</div>
																<div class="form-group row" style="margin-top: 0 !important;">
																	<label class="col-sm-3 col-form-label" style="font-weight: bold;color: #333;margin-top: -15px !important;">Prediksi Sisa / Kurang <span class="titik2">:</span></label>
																	<div class="col-sm-6">
																		<div class="input-group" style="margin-top: -15px !important;">
																			<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																			<input type="text" value="<?=$perpanjang->biaya_kurang?>" style="background-image: linear-gradient(#9c27b0, #9c27b0), linear-gradient(#333, #333);" class="form-control">
																		</div>
																	</div>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<h4 style="font-weight: bold;">KEMBALIKAN SURAT INI SEBAGAI BUKTI PENGEMBALIAN !</h4>
										</div>
										<div class="col-md-4">
											<p style="text-decoration: underline;font-weight: 100;margin-bottom: 0;">Lama Proses Perpanjang Pajak :</p>
											<p>1-2 hari STNK selesai.</p>
											<hr style="border-top:solid 1.5px #333;margin-top: 20% !important;">
											<div class="input-group" style="margin-top: 35px;">
												<span class="input-group-addon" style="font-weight: bold;color: #333;line-height:4.8;">Jakarta,</span>
												<input type="text" value="<?= date('Y-m-d',strtotime($perpanjang->tanggal))?>"  class="form-control">
											</div>
											<p style="font-weight: bold;text-align: center;margin-top: 20%;">..................................................................................</p>
											<p style="font-weight: bold;margin-top: -10px;text-align: center;">Penerima</p>
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