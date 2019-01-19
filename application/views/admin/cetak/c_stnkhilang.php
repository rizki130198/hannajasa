<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Halaman Cetak STNK Hilang</title>
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
														<input type="text" value="<?=$stnk->penerima?>" style="margin-top: -3px;" class="form-control" placeholder="Masukan nama">
													</div>
													<label class="col-sm-4 col-form-label" style="padding-left: 0;width: 27%;margin-top: -10px;">Telp./HP <span class="titik2">:</span></label>
													<div class="col-sm-8">
														<input type="number" value="<?=$stnk->no_telp?>" style="margin-top: -10px;" class="form-control" placeholder="Masukan nomor telp/hp">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<hr style="border-color: #333;border-top:solid 2px;margin-top: -10px !important;">
								<div class="col-md-12" style="">
									<h4 style="font-weight: bold;text-align: right;margin-top: -10px;margin-bottom: 0 !important;">No : <span style="text-decoration: underline;padding-bottom: 0 !important;"><?=$stnk->no?></span></h4>
								</div>
								<div class="form-group row" style="margin-top:-10px !important;margin: 0 !important;">
									<label class="col-sm-2 col-form-label">Sudah terima dari (atas nama)<span class="titik2">:</span></label>
									<div class="col-sm-8">
										<div class="input-group">
											<span class="input-group-addon">Bpk/Ibu/Sdr-i/PT :</span>
											<input type="text" value="<?=$stnk->atas_nama?>" style="margin-top: -3px;" class="form-control" placeholder="Sudah terima dari ( atas nama )">
										</div>
									</div>
								</div>
								<div class="form-group row" style="margin: 0 !important;">
									<label class="col-sm-2 col-form-label" style="margin-top:-18px !important;">Uang Muka (DP) Sebesar <span class="titik2">:</span></label>
									<div class="col-sm-8">
										<div class="uangmuka"><h5 style="transform: skew(25deg);margin: 0 10px;">Rp. <?=$stnk->uang_dp?></h5></div>
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
									<div class="col-sm-4 berkas" style="display: inline-flex;">
										<?php $bpkb = explode(',', $stnk->bpkb);?>
										<?php $sim = explode(',', $stnk->sim);?>
										<?php $rowstnk = explode(',', $stnk->stnk);?>
										<div class="checkbox" style="padding-right: 75px;">
											<label>
												<input type="checkbox"<?=($bpkb[0]==NULL)?NULL:'checked value="'.$bpkb[0].'"'?>> Ada <span style="font-style: italic;">(Melampirkan Faktur)</span>
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"<?=($bpkb[1]==NULL)?NULL:'checked value="'.$bpkb[1].'"'?>> Ada <span style="font-style: italic;">(Tanpa Faktur)</span>
											</label>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="input-group" style="margin-top:-35px !important;">
											<span class="input-group-addon">B.</span>
											<input type="text" value="<?=$stnk->nopol?>" class="form-control" placeholder="Masukan Nopol">
										</div>
									</div>
									<div class="col-md-1">
										<div class="input-group" style="margin-top:-35px !important;">
											<select class="form-control" name="jenis_k" required="">
												<option value="" selected></option>
												<option value="" selected><?=$stnk->jenis_kendaraan?></option>
											</select>
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" style="margin-top:-35px !important;"></label>
									<div class="col-sm-8 berkas" style="display: inline-flex;">
										<div class="checkbox" style="padding-right: 105px;">
											<label>
												<input type="checkbox" <?=($bpkb[2]==NULL)?NULL:'checked value="'.$bpkb[2].'"'?>> Diganti Surat Leasing
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" <?=($bpkb[3]==NULL)?NULL:'checked value="'.$bpkb[3].'"'?>> TIdak Ada <span style="font-style: italic;">(Surat Leasing diurus Biro Jasa)</span>
											</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" style="margin-top:-35px !important;">2. KTP / SIM (Asli) <span class="titik2">:</span></label>
									<div class="col-sm-3 berkas" style="display: inline-flex;">
										<div class="checkbox" style="padding-right: 75px;">
											<label>
												<input type="checkbox"<?=($sim[0]==NULL)?NULL:'checked value="'.$sim[0].'"';?>> Asli
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"<?=($sim[1]==NULL)?NULL:'checked value="'.$sim[1].'"';?>> FotoCopy
											</label>
										</div>
									</div>
									<div class="col-sm-5">
										<div class="input-group" style="margin-top:-35px !important;">
											<span class="input-group-addon">Wilayah : DKI/ </span>
											<input type="text" value="<?=$stnk->wilayah?>" class="form-control" placeholder="Masukan Wilayah">
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" style="margin-top:-35px !important;">3. STNK (Asli) Nopol <span class="titik2">:</span></label>
									<div class="col-sm-3 berkas" style="display: inline-flex;">
										<div class="checkbox" style="padding-right: 75px;">
											<label>
												<input type="checkbox" <?=($rowstnk[0]==NULL)?NULL:'checked value="'.$rowstnk[0].'"';?>> Ada
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox"<?=($rowstnk[1]==NULL)?NULL:'checked value="'.$rowstnk[1].'"';?>> Tidak ada
											</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label" style="margin-top:-35px !important;">4. Lain-lain Berupa <span class="titik2">:</span></label>
									<div class="col-sm-8">
										<input type="text" value="<?=$stnk->lainnya?>" style="margin-top:-35px !important;" class="form-control">
									</div>
								</div>
								<div class="form-group row" style="margin: 0 !important;">
									<div class="col-sm-12" style="display: inline-flex;padding-left: 0;">
										<label class="control-label" style="font-weight: bold;font-size: 20px !important;color: #333;margin: 0;padding: 0;text-transform:uppercase;padding-top: 3px !important;">Biaya Pengurusan stnk hilang :</label>
									</div>
								</div>
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
																<div class="col-sm-12" style="display: inline-flex;">
																	<div class="checkbox" style="width: 50%;margin-left: 0;">
																		<label style="font-weight: bold;color: #333;"><input type="checkbox"<?=($stnk->pajak_ini==NULL)?NULL :'checked value="'.$stnk->pajak_ini.'"'?>> Pajak Tahun ini</label>
																	</div>
																	<div class="input-group" style="margin-top: -6px;width: 50%;float: right;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">: Rp.</span>
																		<input type="text" value="<?=$stnk->harga_pajak_ini?>" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0px !important;">
																<div class="col-sm-12" style="display: inline-flex;">
																	<div class="checkbox" style="width: 50%;margin-left: 0;">
																		<label style="font-weight: bold;color: #333;"><input type="checkbox"<?=($stnk->pajak_lalu==NULL)?NULL :'checked value="'.$stnk->pajak_lalu.'"'?>> Pajak Tahun lalu (SKP)</label>
																	</div>
																	<div class="input-group" style="margin-top: -6px;width: 50%;float: right;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">: Rp.</span>
																		<input type="text" value="<?=$stnk->harga_pajak_lalu?>" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<div class="col-sm-12" style="display: inline-flex;">
																	<label class="col-form-label" style="width: 50%;padding-left: 30px;font-weight: bold;color: #333;padding-top: 0 !important;">Total Pajak</label>
																	<div class="input-group" style="width: 50%;margin-top: -4px;border-top: solid 1.5px #333;float: right;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">: Rp.</span>
																		<input type="text" value="<?=$stnk->total_pajak?>" class="form-control">
																	</div>
																</div>
															</div>
															<p style="padding: 20px 14px 0;">*Biaya pajak hanya prediksi. Setiap tahunnya biasa berubah dan besarnya akan tertera di lembar SKPD/STNK</p>
														</td>
														<td style="vertical-align: top;">
															<div class="form-group row" style="margin-top:0px !important;">
																<div class="col-sm-12" style="display: inline-flex;">
																	<div class="checkbox" style="width: 50%;margin-left: 0;">
																		<label style="font-weight: bold;color: #333;"><input type="checkbox" <?=($stnk->biaya_ps==NULL)?NULL :'checked value="'.$stnk->biaya_ps.'"'?>> Biaya Proses STNK Hilang</label>
																	</div>
																	<div class="input-group" style="margin-top: -6px;width: 50%;float: right;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">: Rp.</span>
																		<input type="text" value="<?=$stnk->harga_ps?>" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<div class="col-sm-12" style="display: inline-flex;margin-top:-10px;">
																	<div class="checkbox" style="width: 50%;margin-left: 0;">
																		<label style="font-weight: bold;color: #333;"><input type="checkbox" <?=($stnk->adm_skp==NULL)?NULL :'checked value="'.$stnk->adm_skp.'"'?>> Adm. SKP/Pajak Lalu</label>
																	</div>
																	<div class="input-group" style="margin-top: -6px;width: 50%;float: right;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">: Rp.</span>
																		<input type="text" value="<?=$stnk->harga_adm?>" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<div class="col-sm-12" style="display: inline-flex;margin-top:-10px;">
																	<div class="checkbox" style="width: 50%;margin-left: 0;">
																		<label style="font-weight: bold;color: #333;"><input type="checkbox" <?=($stnk->slp==NULL)?NULL :'checked value="'.$stnk->slp.'"'?>> Surat Laporan Kepolisian</label>
																	</div>
																	<div class="input-group" style="margin-top: -6px;width: 50%;float: right;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">: Rp.</span>
																		<input type="text" value="<?=$stnk->harga_slp?>" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<div class="col-sm-12" style="display: inline-flex;margin-top:-10px;">
																	<div class="checkbox" style="width: 50%;margin-left: 0;">
																		<label style="font-weight: bold;color: #333;"><input type="checkbox" <?=($stnk->plat==NULL)?NULL :'checked value="'.$stnk->plat.'"'?>> + Ganti Plat</label>
																	</div>
																	<div class="input-group" style="margin-top: -6px;width: 50%;float: right;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">: Rp.</span>
																		<input type="text" value="<?=$stnk->harga_plat?>" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<div class="col-sm-12" style="display: inline-flex;margin-top:-10px;">
																	<div class="checkbox" style="width: 50%;margin-left: 0;">
																		<label style="font-weight: bold;color: #333;"><input type="checkbox" <?=($stnk->balik_nama==NULL)?NULL :'checked value="'.$stnk->balik_nama.'"'?>> + Balik Nama/Ganti BPKB</label>
																	</div>
																	<div class="input-group" style="margin-top: -6px;width: 50%;float: right;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">: Rp.</span>
																		<input type="text" value="<?=$stnk->harga_gb?>" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<div class="col-sm-12" style="display: inline-flex;margin-top:-10px;">
																	<div class="checkbox" style="width: 50%;margin-left: 0;">
																		<label style="font-weight: bold;color: #333;"><input type="checkbox"<?=($stnk->p_alamat==NULL)?NULL :'checked value="'.$stnk->p_alamat.'"'?>> + Penyesuaian Alamat</label>
																	</div>
																	<div class="input-group" style="margin-top: -6px;width: 50%;float: right;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">: Rp.</span>
																		<input type="text" value="<?=$stnk->harga_pa?>" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<div class="col-sm-12" style="display: inline-flex;margin-top:-10px;">
																	<div class="checkbox" style="width: 50%;margin-left: 0;">
																		<label style="font-weight: bold;color: #333;"><input type="checkbox"<?=($stnk->psl==NULL)?NULL :'checked value="'.$stnk->psl.'"'?>> Pembuatan Surat Leasing</label>
																	</div>
																	<div class="input-group" style="margin-top: -6px;width: 50%;float: right;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">: Rp.</span>
																		<input type="text" value="<?=$stnk->harga_psl?>" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<div class="col-sm-12" style="display: inline-flex;margin-top:-10px;">
																	<div class="checkbox" style="margin-left: 0;padding-right: 28px;">
																		<label style="font-weight: bold;color: #333;"><input type="checkbox" <?=($stnk->p_lain==NULL)?NULL :'checked value="'.$stnk->p_lain.'"'?>></label>
																	</div>
																	<input type="text" style="width: 44%;margin-top: -4px;" value="<?=$stnk->p_lain?>" class="form-control" placeholder="">
																	<div class="input-group" style="margin-top: -6px;width: 50%;float: right;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">: Rp.</span>
																		<input type="text" value="<?=$stnk->harga_lain?>" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<div class="col-sm-12" style="display: inline-flex;margin-top:-10px;">
																	<div class="checkbox" style="margin-left: 0;padding-right: 28px;">
																		<label style="font-weight: bold;color: #333;"><input type="checkbox" <?=($stnk->p_lainnya==NULL)?NULL :'checked value="'.$stnk->p_lainnya.'"'?>></label>
																	</div>
																	<input type="text" style="width: 44%;margin-top: -4px;" value="<?=$stnk->p_lainnya?>" class="form-control" placeholder="">
																	<div class="input-group" style="margin-top: -6px;width: 50%;float: right;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">: Rp.</span>
																		<input type="text" value="<?=$stnk->harga_lainnya?>" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<div class="col-sm-12" style="display: inline-flex;margin-top:-10px;">
																	<label class="col-form-label" style="width: 50%;padding-left: 30px;font-weight: bold;color: #333;padding-top:5px !important;">Total Biaya Proses</label>
																	<div class="input-group" style="width: 50%;margin-top: -4px;border-top: solid 1.5px #333;float: right;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">: Rp.</span>
																		<input type="text" value="<?=$stnk->total_proses?>" class="form-control">
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
																		<input value="<?=$stnk->biaya_prediksi?>" type="text" style="background-image: linear-gradient(#9c27b0, #9c27b0), linear-gradient(#333, #333);" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<label class="col-sm-3 col-form-label" style="font-weight: bold;color: #333;margin-top: -15px !important;">Prediksi Sisa / Kurang <span class="titik2">:</span></label>
																<div class="col-sm-6">
																	<div class="input-group" style="margin-top: -15px !important;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																		<input type="text" value="<?=$stnk->biaya_kurang?>" style="background-image: linear-gradient(#9c27b0, #9c27b0), linear-gradient(#333, #333);" class="form-control">
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
										<p style="font-weight: 100;margin-bottom: 0;"><strong>Lama Proses STNK Hilang</strong></p>
										<p>STNK Jadi/Selesai = 3-7 pekan</p>
										<p style="margin-top: -15px;">BPKB Jadi/Selesai = ...... pekan</p>
										<p style="margin-top: 30px;">STNK yang sudah selesai dapat diambil jika total kekurangan biaya sudah dilunasi semua tanpa menunggu BPKB selesai</p>
										<div class="input-group">
											<span class="input-group-addon" style="font-weight: bold;color: #333;line-height:4.8;">Jakarta,</span>
											<input type="text" value="" class="form-control">
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