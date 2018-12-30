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
													<input type="text" style="margin-top: -3px;" class="form-control" placeholder="Masukan nama">
												</div>
												<label class="col-sm-4 col-form-label" style="padding-left: 0;width: 27%;margin-top: -10px;">Telp./HP <span class="titik2">:</span></label>
												<div class="col-sm-8">
													<input type="number" style="margin-top: -10px;" class="form-control" placeholder="Masukan nomor telp/hp">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<hr style="border-color: #333;border-top:solid 2px;margin-top">
							<div class="col-md-12" style="">
								<h4 style="font-weight: bold;text-align: right;margin-top: -10px;">No : <spna style="text-decoration: underline;">01293018203122018</spna></h4>
							</div>
							<div class="form-group row" style="margin-top:-10px !important;margin: 0 !important;">
								<label class="col-sm-2 col-form-label">Sudah terima dari (atas nama)<span class="titik2">:</span></label>
								<div class="col-sm-8">
									<div class="input-group">
										<span class="input-group-addon">Bpk/Ibu/Sdr-i/PT :</span>
										<input type="text" style="margin-top: -3px;" class="form-control" placeholder="Sudah terima dari ( atas nama )">
									</div>
								</div>
							</div>
							<div class="form-group row" style="margin: 0 !important;">
								<label class="col-sm-2 col-form-label" style="margin-top:-18px !important;">Uang Muka (DP) Sebesar <span class="titik2">:</span></label>
								<div class="col-sm-8">
									<div class="uangmuka"><h5 style="transform: skew(25deg);margin: 0 10px;">Rp. </h5></div>
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
									<div class="checkbox" style="">
										<label>
											<input type="checkbox"> Ada + Faktur
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox"> As Tanpa Faktur
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox"> Foto Copy
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox"> Surat Leasing
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox"> Tidak Ada/Acc
										</label>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" style="margin-top:-35px !important;">2. KTP / SIM (Asli) <span class="titik2">:</span></label>
								<div class="col-sm-3 berkas" style="display: inline-flex;">
									<div class="checkbox" style="padding-right: 75px;">
										<label>
											<input type="checkbox"> Ada
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox"> Tidak Ada/Acc
										</label>
									</div>
								</div>
								<div class="col-sm-5">
									<div class="input-group" style="margin-top:-35px !important;">
										<span class="input-group-addon">Wilayah : DKI/ </span>
										<input type="text" class="form-control" placeholder="Masukan Wilayah">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" style="margin-top:-35px !important;">3. STNK (Asli) Nopol <span class="titik2">:</span></label>
								<div class="col-sm-3">
									<div class="input-group" style="margin-top:-35px !important;">
										<span class="input-group-addon">B.</span>
										<input type="text" class="form-control" placeholder="Masukan Nopol">
									</div>
								</div>
								<div class="col-md-1" style="padding-right: 0;">
									<div class="input-group" style="margin-top:-35px !important;">
										<select class="form-control" name="jenis_k" required="">
											<option value="motor">Motor</option>
											<option value="mobil">Mobil</option>
											<option value="mobil box">Mobil Box</option>
										</select>
										<span class="material-input"></span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group" style="margin-top:-35px !important;">
										<span class="input-group-addon">Masa Berlaku Pajak :</span>
										<input type="text" class="form-control" placeholder="Masukan Masa Berlaku">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label" style="margin-top:-35px !important;">4. Lain-lain Berupa <span class="titik2">:</span></label>
								<div class="col-sm-8">
									<input type="text" style="margin-top:-35px !important;" class="form-control">
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
																	<label style="font-weight: bold;color: #333;"><input type="checkbox"> Pajak Tahun ini</label>
																	<span class="titik2">:</span>
																</div>
															</div>
															<div class="col-sm-7">
																<div class="input-group" style="margin-top: -6px;">
																	<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																	<input type="text" class="form-control">
																</div>
															</div>
														</div>
														<div class="form-group row" style="margin-top: 0px !important;">
															<div class="col-sm-5">
																<div class="checkbox" style="display: contents;">
																	<label style="font-weight: bold;color: #333;"><input type="checkbox"> Pajak Tahun lalu (SKP)</label>
																	<span class="titik2">:</span>
																</div>
															</div>
															<div class="col-sm-7">
																<div class="input-group" style="margin-top: -6px;">
																	<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																	<input type="text" class="form-control">
																</div>
															</div>
														</div>
														<div class="form-group row" style="margin-top: 0 !important;">
															<label class="col-sm-5 col-form-label" style="padding-left: 44px;font-weight: bold;color: #333;">Total Pajak<span class="titik2">:</span></label>
															<div class="col-sm-7">
																<div class="input-group" style="margin-top: -4px;border-top: solid 1.5px #333;">
																	<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																	<input type="text" class="form-control">
																</div>
															</div>
														</div>
														<p style="padding: 40px 14px 0;">*Biaya pajak hanya prediksi. Setiap tahunnya biasa berubah dan besarnya akan tertera di lembar SKPD/STNK</p>
													</td>
													<td style="vertical-align: top;">
														<div class="form-group row" style="margin-top:0px !important;">
															<div class="col-sm-5">
																<div class="checkbox" style="display: contents;">
																	<label style="font-weight: bold;color: #333;"><input type="checkbox"> Biaya Jasa</label>
																	<span class="titik2">:</span>
																</div>
															</div>
															<div class="col-sm-7">
																<div class="input-group" style="margin-top: -6px;">
																	<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																	<input type="text" class="form-control">
																</div>
															</div>
														</div>
														<div class="form-group row" style="margin-top: 0 !important;">
															<div class="col-sm-5" style="margin-top:-10px;">
																<div class="checkbox" style="display: contents;margin-top: -15px !important;">
																	<label style="font-weight: bold;color: #333;">
																		<input type="checkbox"> Acc BPKB</label>
																		<span class="titik2">:</span>
																	</div>
																</div>
																<div class="col-sm-7" style="margin-top:-10px;">
																	<div class="input-group" style="margin-top: -6px;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																		<input type="text" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<div class="col-sm-5" style="margin-top:-10px;">
																	<div class="checkbox" style="display: contents;">
																		<label style="font-weight: bold;color: #333;"><input type="checkbox"> Cek Fisik dan Plat</label>
																		<span class="titik2">:</span>
																	</div>
																</div>
																<div class="col-sm-7" style="margin-top:-10px;">
																	<div class="input-group" style="margin-top: -6px;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																		<input type="text" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<div class="col-sm-5" style="margin-top:-10px;">
																	<div class="checkbox" style="display: contents;">
																		<label style="font-weight: bold;color: #333;"><input type="checkbox"> Adm. SKP/Pajak Lalu</label>
																		<span class="titik2">:</span>
																	</div>
																</div>
																<div class="col-sm-7" style="margin-top:-10px;">
																	<div class="input-group" style="margin-top: -6px;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																		<input type="text" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<div class="col-sm-5" style="margin-top:-10px;">
																	<div class="checkbox" style="display: contents;">
																		<label style="font-weight: bold;color: #333;"><input type="checkbox"> Blokir Progresif</label>
																		<span class="titik2">:</span>
																	</div>
																</div>
																<div class="col-sm-7" style="margin-top:-10px;">
																	<div class="input-group" style="margin-top: -6px;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																		<input type="text" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<div class="col-sm-1" style="margin-top:-10px;">
																	<div class="checkbox" style="display: contents;">
																		<label style="font-weight: bold;color: #333;"><input type="checkbox"></label>
																	</div>
																</div>
																<div class="col-sm-4" style="padding: 0;margin-top:-10px;">
																	<input type="text" class="form-control" placeholder="" style="width: 90%;">
																</div>
																<div class="col-sm-7" style="margin-top:-10px;">
																	<div class="input-group" style="margin-top: -6px;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																		<input type="text" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<label class="col-sm-5 col-form-label" style="margin-top:-10px;padding-left: 44px;font-weight: bold;color: #333;">Total Biaya Proses<span class="titik2">:</span></label>
																<div class="col-sm-7" style="margin-top:-10px;">
																	<div class="input-group" style="margin-top: -4px;border-top: solid 1.5px #333;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																		<input type="text" class="form-control">
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
																		<input type="text" style="background-image: linear-gradient(#9c27b0, #9c27b0), linear-gradient(#333, #333);" class="form-control">
																	</div>
																</div>
															</div>
															<div class="form-group row" style="margin-top: 0 !important;">
																<label class="col-sm-3 col-form-label" style="font-weight: bold;color: #333;margin-top: -15px !important;">Prediksi Sisa / Kurang <span class="titik2">:</span></label>
																<div class="col-sm-6">
																	<div class="input-group" style="margin-top: -15px !important;">
																		<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
																		<input type="text" style="background-image: linear-gradient(#9c27b0, #9c27b0), linear-gradient(#333, #333);" class="form-control">
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
											<input type="text" class="form-control">
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