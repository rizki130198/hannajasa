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
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
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
						// html += '<td class="table_data" data-row_id="'+data[count].id_catat+'" data-column_name="jenis">'+data[count].jenis_harga+'</td>';
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