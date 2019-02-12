<?php foreach ($data as $jasa): ?>
	<tr>
		<td class="table_data" data-row_id="<?=$jasa->id_catat?>" data-column_name="nama"><?=$jasa->nama?></td>
		<td class="table_data" data-row_id="<?=$jasa->id_catat?>" data-column_name="wilayah"><?=$jasa->wilayah?></td>
		<td class="table_data" data-row_id="<?=$jasa->id_catat?>" data-column_name="nama"><?=$jasa->jenis?></td>
		<td class="table_data" id="harga" data-row_id="<?=$jasa->id_catat?>" data-column_name="harga" contenteditable><?=$jasa->harga?></td>
		<td class="table_data" data-row_id="<?=$jasa->id_catat?>" data-column_name="created_at"><?=$jasa->created_at?></td>
	</tr>
<?php endforeach ?>
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