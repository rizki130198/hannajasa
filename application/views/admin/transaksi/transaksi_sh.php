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
						<h4 class="title">Transaksi STNK Hilang</h4>
					</div>
					<div class="card-content">
						<form action='javascript:void(0);' id="transaksistnkh" method="POST" class="form-horizontal">
							<h4>Kepada Yth.</h4>
							<div class="form-group">
								<label class="col-sm-2 control-label">Bpk/Ibu/Sdr-i/PT <span class="titik2">:</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="penerima" placeholder="Masukan nama">
									<input type="hidden" class="form-control" name="id" value="<?=$this->uri->segment(3);?>" >

								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Telp./HP <span class="titik2">:</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control no_hp" name="no_telp" placeholder="Masukan nomor telp/hp">
								</div>
							</div>
							<hr>
							<div class="form-group">
								<label class="col-sm-2 control-label">Sudah terima dari <span class="titik2">:</span></label>
								<div class="col-sm-8">
									<div class="input-group">
										<span class="input-group-addon">Bpk/Ibu/Sdr-i/PT <span class="titik2">:</span></span>
										<input type="text" class="form-control" name="atas_nama" placeholder="Sudah terima dari ( atas nama )">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Uang Muka (DP) Sebesar <span class="titik2">:</span></label>
								<div class="col-sm-8">
									<div class="input-group">
										<span class="input-group-addon">Rp.</span>
										<input type="text" class="form-control dp" name="dp" placeholder="Masukan Nilai Uang Muka (DP)">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Kelengkapan Berkas <span class="titik2">:</span></label>
								<div class="col-sm-8">
									<!-- <input type="text" class="form-control" placeholder="Masukan nama"> -->
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">1. BPKB <span class="titik2">:</span></label>
								<div class="col-sm-4" style="display: inline-flex;">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="bpkb1" value="ada"> Ada <span style="font-style: italic;">(Melampirkan Faktur)</span>
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" name="bpkb2" value="ada"> Ada <span style="font-style: italic;">(Tanpa Faktur)</span>
										</label>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<span class="input-group-addon">B.</span>
										<input type="text" class="form-control" name="nopol" placeholder="Masukan Nopol">
									</div>
								</div>
								<div class="col-md-1" style="padding-right: 0;">
									<div class="input-group">
										<select class="form-control" name="jenis_k" required="">
											<option value="motor">Motor</option>
											<option value="mobil">Mobil</option>
											<option value="mobil box">Mobil Box</option>
										</select>
										<span class="material-input"></span>
									</div>
								</div>
							</div>

							<?php $acc = explode(',', $stnk->jasa)?>
							<?php $harga = explode(',', $stnk->harga_jasa)?>
							<div class="form-group" style="margin-top: 0 !important;">
								<label class="col-sm-2 control-label"></label>
								<div class="col-sm-8" style="display: inline-flex;">
									<div class="checkbox" style="width: 211px;
									">
									<label>
										<input type="checkbox" name="bpkb3" value="ada"> Diganti Surat Leasing
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="bpkb4" value="ada"> Tidak Ada <span style="font-style: italic;">(Surat Leasing diurus Biro Jasa)</span>
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">2. KTP / SIM (Asli) <span class="titik2">:</span></label>
							<div class="col-sm-3" style="display: inline-flex;">
								<div class="checkbox" style="padding-right: 50px;">
									<label>
										<input type="checkbox" name="sim1" value="asli"> Asli
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="sim2" value="fotocopy"> FotoCopy
									</label>
								</div>
							</div>
							<div class="col-sm-5">
								<div class="input-group">
									<span class="input-group-addon">Wilayah : DKI/ </span>
									<input type="text" name="wilayah" class="form-control" value="<?=$stnk->wilayah?>" placeholder="Masukan Wilayah">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">3. STNK (Asli) Nopol <span class="titik2">:</span></label>
							<div class="col-sm-3" style="display: inline-flex;">
								<div class="checkbox" style="padding-right: 50px;">
									<label>
										<input type="checkbox" name="stnk1" value="ada"> Ada
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="stnk2" value="ada"> Tidak ada
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">4. Lain-lain Berupa <span class="titik2">:</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="lainnya" placeholder="Masukan Lainnya">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-8 control-label" style="font-weight: bold;font-size: 1.3em !important;color: #333;margin: 0;padding: 0;padding-top: 7px !important;margin-bottom: 10px;text-transform: uppercase;">Biaya Pengurusan STNK Hilang :</label>
						</div>
						<div class="table-responsive">
							<table class="table">
								<thead border="2" style="border: solid 2px #333;">
									<tr style="background-color: #b8dbf7;">
										<th style="text-align: center;width: 50%;border: solid 2px #333;font-weight: bold;">BIAYA PAJAK (HANYA PREDIKSI)*</th>
										<th style="text-align: center;width: 50%;border: solid 2px #333;font-weight: bold;">BIAYA PROSES</th>
									</tr>
								</thead>
								<tbody style="border: solid 2px;">
									<tr>
										<td style="border-right: solid 2px #333;vertical-align: top;">
											<div class="form-group">
												<div class="col-sm-5">
													<div class="checkbox" style="display: contents;">
														<label style="font-weight: bold;color: #333;"><input type="checkbox" name="pajak_ini" <?=($stnk->jenis=='Pajak Telat Lebih dari 1 Tahun' AND $stnk->pkb1!=NULL)?'checked value="'.$stnk->pkb1.'"':NULL?>> Pajak Tahun ini</label>
														<span class="titik2">:</span>
													</div>
												</div>
												<div class="col-sm-7">
													<div class="input-group jum-pajak" style="margin-top: -6px;">
														<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
														<input type="text" id="p_tahun" value="<?=($stnk->jenis=='Pajak Telat Lebih dari 1 Tahun' AND $stnk->pkb!=NULL)?array_sum(array($stnk->pkb,$stnk->swdkllj,$stnk->sanksi_swdkllj,$stnk->adm_stnk,$stnk->sanksi_pkb)):NULL?>" class="form-control jumlah uang" name="harga_ini" placeholder="Masukan nominal">
													</div>
												</div>
											</div>
											<div class="form-group" style="margin-top: 0 !important;">
												<div class="col-sm-5">
													<div class="checkbox" style="display: contents;">
														<label style="font-weight: bold;color: #333;"><input type="checkbox" name="pajak_lalu" <?=($stnk->jenis=='Pajak Telat Lebih dari 1 Tahun' AND $stnk->pkb!=NULL)?'checked value="'.$stnk->pkb.'"':NULL?>> Pajak Tahun lalu (SKP)</label>
														<span class="titik2">:</span>
													</div>
												</div>
												<div class="col-sm-7">
													<div class="input-group jum-pajak" style="margin-top: -6px;">
														<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
														<input type="text" id="p_lalu" value=" <?=($stnk->jenis=='Pajak Telat Lebih dari 1 Tahun' AND $stnk->pkb!=NULL)?array_sum(array($stnk->pkb1,$stnk->swdkllj1,$stnk->sanksi_swdkllj1,$stnk->adm_stnk,$stnk->sanksi_pkb1)):NULL?>" class="form-control jumlah uang" name="harga_lalu" placeholder="Masukan nominal">
													</div>
												</div>
											</div>
											<div class="form-group" style="margin-top: 0 !important;">
												<label class="col-sm-5 control-label" style="padding-left: 44px;font-weight: bold;color: #333;">Total Pajak<span class="titik2">:</span></label>
												<div class="col-sm-7">
													<div class="input-group" style="margin-top: -4px;border-top: solid 1.5px #333;">
														<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
														<input type="text" required id="sum" value='<?=($stnk->jenis=='Pajak Telat Lebih dari 1 Tahun')?array_sum(array($stnk->pkb,$stnk->pkb1,$stnk->swdkllj,$stnk->swdkllj1,$stnk->sanksi_swdkllj,$stnk->sanksi_swdkllj1,$stnk->adm_stnk,$stnk->sanksi_pkb1,$stnk->sanksi_pkb)):NULL?>' class="form-control" name="total_pajak" placeholder="Masukan nominal">
													</div>
												</div>
											</div>
											<p style="padding: 20px 14px 0;">*Biaya pajak hanya prediksi. Setiap tahunnya biasa berubah dan besarnya akan tertera di lembar SKPD/STNK</p>
										</td>
										<td style="vertical-align: top;">
											<div class="form-group">
												<div class="col-sm-5">
													<div class="checkbox" style="display: contents;">
														<label style="font-weight: bold;color: #333;"><input type="checkbox" name="biaya_ps" <?=($acc[1]==NULL AND $acc[2]==NULL)?NULL:'checked value="ada"'?>> Biaya Proses STNK Hilang</label>
														<span class="titik2">:</span>
													</div>
												</div>
												<div class="col-sm-7">
													<div class="input-group jum-b" style="margin-top: -6px;">
														<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
														<input type="text" class="form-control jumlah_biaya" name="harga_ps" placeholder="Masukan nominal" <?=($harga[1]==NULL AND $harga[2]==NULL)?NULL:'value="'.array_sum(array($harga[1],$harga[2])).'"'?>>
													</div>
												</div>
											</div>
											<div class="form-group" style="margin-top: 0 !important;">
												<div class="col-sm-5">
													<div class="checkbox" style="display: contents;">
														<label style="font-weight: bold;color: #333;"><input type="checkbox"name="adm_skp" <?=($acc[0]==NULL)?NULL:'checked value="'.$acc[0].'"'?>> Adm.SKP / Pajak lalu</label>
														<span class="titik2">:</span>
													</div>
												</div>
												<div class="col-sm-7">
													<div class="input-group jum-b" style="margin-top: -6px;">
														<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
														<input type="text" class="form-control jumlah_biaya" name="harga_adm" placeholder="Masukan nominal"<?=($harga[0]==NULL)?NULL:'value="'.$harga[0].'"'?>>
													</div>
												</div>
											</div>
											<div class="form-group" style="margin-top: 0 !important;">
												<div class="col-sm-5">
													<div class="checkbox" style="display: contents;">
														<label style="font-weight: bold;color: #333;"><input type="checkbox"name="slp" <?=($acc[11]==NULL)?NULL:'checked value="'.$acc[11].'"'?>> Surat Laporan Kepolisian</label>
														<span class="titik2">:</span>
													</div>
												</div>
												<div class="col-sm-7">
													<div class="input-group jum-b" style="margin-top: -6px;">
														<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
														<input type="text" class="form-control jumlah_biaya" name="harga_slp" placeholder="Masukan nominal"<?=($harga[11]==NULL)?NULL:'value="'.$harga[11].'"'?>>
													</div>
												</div>
											</div>
											<div class="form-group" style="margin-top: 0 !important;">
												<div class="col-sm-5">
													<div class="checkbox" style="display: contents;">
														<label style="font-weight: bold;color: #333;"><input type="checkbox"name="plat" <?=($acc[6]==NULL)?NULL:'checked value="'.$acc[6].'"'?>> + Ganti Plat</label>
														<span class="titik2">:</span>
													</div>
												</div>
												<div class="col-sm-7">
													<div class="input-group jum-b" style="margin-top: -6px;">
														<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
														<input type="text" class="form-control jumlah_biaya" name="harga_plat" placeholder="Masukan nominal"<?=($harga[6]==NULL)?NULL:'value="'.$harga[6].'"'?>>
													</div>
												</div>
											</div>
											<div class="form-group" style="margin-top: 0 !important;">
												<div class="col-sm-5">
													<div class="checkbox" style="display: contents;">
														<label style="font-weight: bold;color: #333;"><input type="checkbox"name="bn_gp" <?=($acc[5]==NULL)?NULL:'checked value="'.$acc[5].'"'?>> + Balik Nama/Ganti BPKB</label>
														<span class="titik2">:</span>
													</div>
												</div>
												<div class="col-sm-7">
													<div class="input-group jum-b" style="margin-top: -6px;">
														<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
														<input type="text" class="form-control jumlah_biaya" name="harga_bn" placeholder="Masukan nominal"<?=($harga[5]==NULL)?NULL:'value="'.$harga[5].'"'?>>
													</div>
												</div>
											</div>
											<div class="form-group" style="margin-top: 0 !important;">
												<div class="col-sm-5">
													<div class="checkbox" style="display: contents;">
														<label style="font-weight: bold;color: #333;"><input type="checkbox"name="p_alamat" value="ada"> + Penyesuaian Alamat</label>
														<span class="titik2">:</span>
													</div>
												</div>
												<div class="col-sm-7">
													<div class="input-group jum-b" style="margin-top: -6px;">
														<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
														<input type="text" class="form-control jumlah_biaya" name="harga_alamat" placeholder="Masukan nominal" >
													</div>
												</div>
											</div>
											<div class="form-group" style="margin-top: 0 !important;">
												<div class="col-sm-5">
													<div class="checkbox" style="display: contents;">
														<label style="font-weight: bold;color: #333;"><input type="checkbox"name="psl" > Pembuatan Surat Leasing</label>
														<span class="titik2">:</span>
													</div>
												</div>
												<div class="col-sm-7">
													<div class="input-group jum-b" style="margin-top: -6px;">
														<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
														<input type="text" class="form-control jumlah_biaya" name="harga_psl" placeholder="Masukan nominal">
													</div>
												</div>
											</div>
											<div class="form-group" style="margin-top: 0 !important;">
												<div class="col-sm-1">
													<div class="checkbox" style="display: contents;">
														<label style="font-weight: bold;color: #333;"><input type="checkbox" id="lainnya_p"></label>
													</div>
												</div>
												<div class="col-sm-4" style="padding: 0;">
													<input type="text" name="lainnya1" disabled id="txt-lainnya-p" class="form-control" placeholder="....." style="width: 90%;">
												</div>
												<div class="col-sm-7">
													<div class="input-group jum-b" style="margin-top: -6px;">
														<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
														<input type="text" disabled id="txt-lainnya-p1" class="form-control jumlah_biaya" name="harga_lainnya" placeholder=".....">
													</div>
												</div>
											</div>
											<div class="form-group" style="margin-top: 0 !important;">
												<div class="col-sm-1">
													<div class="checkbox" style="display: contents;">
														<label style="font-weight: bold;color: #333;"><input type="checkbox" id="lainnya_p2"></label>
													</div>
												</div>
												<div class="col-sm-4" style="padding: 0;">
													<input type="text" class="form-control" disabled id="txt-lainnya-p2" name="lainnya2" placeholder="....." style="width: 90%;">
												</div>
												<div class="col-sm-7">
													<div class="input-group jum-b" style="margin-top: -6px;">
														<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
														<input type="text" name="harga_lainnya2" disabled id="txt-lainnya-p3" class="form-control jumlah_biaya" placeholder=".....">
													</div>
												</div>
											</div>
											<div class="form-group" style="margin-top: 0 !important;">
												<label class="col-sm-5 control-label" style="padding-left: 44px;font-weight: bold;color: #333;">Total Biaya Proses<span class="titik2">:</span></label>
												<div class="col-sm-7">
													<div class="input-group" style="margin-top: -4px;border-top: solid 1.5px #333;">
														<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
														<input type="text" name="total" id="hasil_biaya" class="form-control" placeholder="Masukan nominal" value="<?=array_sum(array($harga[0],$harga[1],$harga[2],$harga[6],$harga[5],$harga[11]))?>">
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="2" style="background-color: #b8dbf7;border-top: solid 2px #333;">
											<div class="form-group" style="margin-top: -5 !important;">
												<label class="col-sm-2 control-label" style="font-weight: bold;color: #333;">4. Prediksi Total Biaya <span class="titik2">:</span></label>
												<div class="col-sm-6">
													<div class="input-group">
														<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
														<input type="text" name="prediski" class="form-control biaya_prediksi" placeholder="Masukan nominal" value="<?=($stnk->jenis=='Pajak Telat Lebih dari 1 Tahun')?array_sum(array($harga[0],$harga[1],$harga[2],$harga[6],$harga[5],$harga[11],$stnk->pkb,$stnk->pkb1,$stnk->swdkllj,$stnk->swdkllj1,$stnk->sanksi_swdkllj,$stnk->sanksi_swdkllj1,$stnk->adm_stnk,$stnk->sanksi_pkb1,$stnk->sanksi_pkb)):NULL?>">
													</div>
												</div>
											</div>
											<div class="form-group" style="margin-top: -5 !important;">
												<label class="col-sm-2 control-label" style="font-weight: bold;color: #333;">4. Prediksi Sisa / Kurang <span class="titik2">:</span></label>
												<div class="col-sm-6">
													<div class="input-group">
														<span class="input-group-addon" style="font-weight: bold;color: #333;">Rp.</span>
														<input type="text" name="kurang" class="form-control prediskisisa" placeholder="Masukan nominal" value="<?=($stnk->jenis=='Pajak Telat Lebih dari 1 Tahun')?array_sum(array($harga[0],$harga[1],$harga[2],$harga[6],$harga[5],$harga[11],$stnk->pkb,$stnk->pkb1,$stnk->swdkllj,$stnk->swdkllj1,$stnk->sanksi_swdkllj,$stnk->sanksi_swdkllj1,$stnk->adm_stnk,$stnk->sanksi_pkb1,$stnk->sanksi_pkb)):NULL?>">
													</div>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
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