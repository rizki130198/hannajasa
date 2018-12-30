<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="purple">
            <h4 class="title">Data Berkas Jadi</h4>
          </div>
          <div class="card-content">
            <div class="table-responsive">
              <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                 <tr>
                  <th>Jumlah Stok</th>
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
    function load_data(){
      $.ajax({
        url:"<?php echo base_url('Main/load_data'); ?>",
        dataType:"JSON",
        success:function(data){
          var html = '';
          for (var count = 0; count < data.length; count++) {
            html += '<tr>';
            html += '<td class="table_data" id="stok" data-row_id="'+data[count].id+'" data-column_name="stok_blanko" contenteditable>'+data[count].stok_blanko+'</td>';
            html += '<td class="table_data" data-row_id="'+data[count].id+'" data-column_name="tgl_update">'+data[count].tgl_update+'</td></tr>';
          }
          $('tbody').html(html);
        }
      }); 
    }
    load_data();

    $(document).on('blur', '.table_data', function(){
    var id = $(this).data('row_id');
    var table_column = $(this).data('column_name');
    var value = $(this).text();
    $.ajax({
      url:"<?php echo base_url(); ?>Main/update_blanko",
      method:"POST",
      data:{id:id, table_column:table_column, value:value},
      success:function(data)
      {
        load_data();
      }
    })
  });
  });
</script>