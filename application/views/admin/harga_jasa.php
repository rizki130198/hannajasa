<style type="text/css">
.form-group{
	margin: 0;
}
.input-group .input-group-addon{
	padding: 0 5px 0 0; 
}
#harga{
	color:red;
}
.dataTables_info{
	margin-top: 22px;
}
.dataTables_paginate{
	float: right;
}
.dataTables_filter label{
	float: right;
}
.dataTables_length label{
	display: inline-flex;
	line-height: 3;
	margin-top: 25px;
}
.dataTables_length .form-group{

</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<a href="#tambahjasa" data-toggle="modal" class="btn btn-primary" style="float: right;">Tambah Jasa</a>
				<div class="card">
					<div class="card-header" data-background-color="purple">
						<h4 class="title">Harga</h4>
						<!-- <p class="category">Here is a subtitle for this table</p> -->
					</div>

					<div class="card-content">					
						<select class="form-control" name="get_harga" id="get_harga" onchange="gantiharga()">
							<option value="perpanjang">Perpanjang</option>
							<option value="bn">Balik Nama</option>
							<option value="mutasi">Mutasi</option>
							<option value="m_bn">Mutasi + Balik Nama</option>
							<option value="stnk">STNK Hilang</option>
							<option value="stnk_h">STNK Hilang + Balik Nama</option>
						</select>
						<div class="table-responsive">
							<table id="daftarharga" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Daftar Harga</th>
										<th>Wilayah</th>
										<th>Jenis</th>
										<th>Harga</th>
										<th>Tanggal Update</th>
									</tr>
								</thead>
								<tbody id="tbodynya">
									<?php foreach ($data as $jasa): ?>
									<tr>
										<td class="table_data" data-row_id="<?=$jasa->id_catat?>" data-column_name="nama"><?=$jasa->nama?></td>
										<td class="table_data" data-row_id="<?=$jasa->id_catat?>" data-column_name="wilayah"><?=$jasa->wilayah?></td>
										<td class="table_data" data-row_id="<?=$jasa->id_catat?>" data-column_name="nama"><?=$jasa->jenis?></td>
										<td class="table_data" id="harga" data-row_id="<?=$jasa->id_catat?>" data-column_name="harga" contenteditable><?=$jasa->harga?></td>
										<td class="table_data" data-row_id="<?=$jasa->id_catat?>" data-column_name="created_at"><?=$jasa->created_at?></td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="tambahjasa" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<form method="post" action="<?= site_url('main/tambahjasa')?>" accept-charset="utf-8">
			<div class="modal-content">
				<div class="modal-body">
					<div class="content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<h4 class="title">Tambah Jasa</h4>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Proses</label>
												<select class="form-control" name="proses" required="">
													<option value="" disabled="" selected=""></option>
													<option value="Perpanjang">Perpanjang</option>
													<option value="Balik Nama">Balik Nama</option>
													<option value="Mutasi">Mutasi</option>
													<option value="Mutasi Balik">Mutasi Balik</option>
													<option value="STNK Hilang">STNK Hilang</option>
													<option value="STNK Balik">STNK Balik</option>
												</select>
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Nama Jasa</label>
												<input type="text" name="nama" class="form-control" required="">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Harga</label>
												<input type="text" name="harga" class="form-control" required="">
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Wilayah</label>
												<select class="form-control" name="wilayah" required="">
													<option value="" disabled="" selected=""></option>
													<option value="Jakarta">Jakarta</option>
													<option value="Bekasi">Bekasi</option>
													<option value="Tanggerang">Tanggerang</option>
													<option value="Depok">Depok</option>
												</select>
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Jenis Kendaraan</label>
												<select class="form-control" name="jenis_k" required="">
													<option value="" disabled="" selected=""></option>
													<option value="Motor">Motor</option>
													<option value="Mobil">Mobil</option>
												</select>
												<span class="material-input"></span>
											</div>
										</div>
									</div>
									<button class="btn btn-primary pull-right" type="submit">Ya Tambah Daftar Jasa</button>
									<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Batal</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript" src="<?=base_url('public/js/jq.js');?>"></script>
<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$(document).on('blur', '.table_data', function(){
			var id_catat = $(this).data('row_id');
			var table_column = $(this).data('column_name');
			var value = $(this).text();
			$.ajax({
				url:"<?php echo base_url(); ?>Main/update_harga",
				method:"POST",
				data:{id_catat:id_catat, table_column:table_column, value:value},
				success:function(data)
				{
					load_harga();
				}
			})
		});
	});
</script>