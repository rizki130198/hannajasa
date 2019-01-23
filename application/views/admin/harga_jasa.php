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
						<div class="table-responsive">
							<table class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Daftar Harga</th>
										<!-- <th>Jenis</th> -->
										<th>Wilayah</th>
										<th>Harga</th>
										<th>Tanggal Update</th>
									</tr>
								</thead>
								<tbody>
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
													<option value="Rubah Identitas STNK / BPKB">Rubah Identitas STNK / BPKB</option>
													<option value="STNK Hilang">STNK Hilang</option>
													<option value="Mutasi STNK BPKB">Mutasi STNK BPKB</option>
													<option value="Cabut Berkas">Cabut Berkas</option>
													<option value="Lain-Lain">Lain Lain</option>
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
		function load_harga(){
			$.ajax({
				url:"<?php echo base_url('Main/load_harga_jasa'); ?>",
				dataType:"JSON",
				success:function(data){
					var html = '';
					for (var count = 0; count < data.length; count++) {
						html += '<tr>';
						html += '<td class="table_data" data-row_id="'+data[count].id_catat+'" data-column_name="nama">'+data[count].nama+'</td>';
						html += '<td class="table_data" data-row_id="'+data[count].id_catat+'" data-column_name="wilayah">'+data[count].wilayah+'</td>';
						html += '<td class="table_data" id="harga" data-row_id="'+data[count].id_catat+'" data-column_name="harga" contenteditable>'+data[count].harga+'</td>';
						html += '<td class="table_data" data-row_id="'+data[count].id_catat+'" data-column_name="created_at">'+data[count].created_at+'</td></tr>';
					}
					$('tbody').html(html);
				}
			}); 
		}
		load_harga();

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