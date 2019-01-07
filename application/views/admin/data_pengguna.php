<style type="text/css">
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
	margin: 0;
}
[data-tooltip] {
	position: relative;
	z-index: 2;
	cursor: pointer;
}

/* Hide the tooltip content by default */
[data-tooltip]:before,
[data-tooltip]:after {
	visibility: hidden;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
	filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=0);
	opacity: 0;
	pointer-events: none;
}

/* Position tooltip above the element */
[data-tooltip]:before {
	position: absolute;
	bottom: 110%;
	left: 50%;
	margin-bottom: 5px;
	margin-left: -80px;
	padding: 7px;
	text-transform: none;
	width: 160px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	background-color: #000;
	background-color: hsla(0, 0%, 20%, 0.9);
	color: #fff;
	content: attr(data-tooltip);
	text-align: center;
	font-size: 14px;
	line-height: 1.2;
}

/* Triangle hack to make tooltip look like a speech bubble */
[data-tooltip]:after {
	position: absolute;
	bottom: 110%;
	left: 50%;
	margin-left: -5px;
	width: 0;
	border-top: 5px solid #000;
	border-top: 5px solid hsla(0, 0%, 20%, 0.9);
	border-right: 5px solid transparent;
	border-left: 5px solid transparent;
	content: " ";
	font-size: 0;
	line-height: 0;
}

/* Show tooltip content on hover */
[data-tooltip]:hover:before,
[data-tooltip]:hover:after {
	visibility: visible;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=100);
	opacity: 1;
}
.modal-confirm {    
	color: #636363;
	width: 400px;
}
.modal-confirm .modal-content {
	padding: 20px;
	border-radius: 5px;
	border: none;
	text-align: center;
	font-size: 14px;
}
.modal-confirm .modal-header {
	border-bottom: none;   
	position: relative;
}
.modal-confirm h4 {
	text-align: center;
	font-size: 26px;
	margin: 30px 0 -10px;
}
.modal-confirm .close {
	position: absolute;
	top: -5px;
	right: -2px;
}
.modal-confirm .modal-body {
	color: #999;
}
.modal-confirm .modal-footer {
	border: none;
	text-align: center;   
	border-radius: 5px;
	font-size: 13px;
	padding: 10px 15px 25px;
}
.modal-confirm .modal-footer a {
	color: #999;
}   
.modal-confirm .icon-box {
	width: 80px;
	height: 80px;
	margin: 0 auto;
	border-radius: 50%;
	z-index: 9;
	text-align: center;
	border: 3px solid #4caf50;
}
.modal-confirm .icon-box i {
	color: #4caf50;
	font-size: 46px;
	display: inline-block;
	margin-top: 13px;
}
.modal-confirm .btn {
	color: #fff;
	border-radius: 4px;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	min-width: 120px;
	border: none;
	min-height: 40px;
	border-radius: 3px;
	margin: 0 5px;
	outline: none !important;
}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header" data-background-color="purple">
						<h4 class="title">Data Pengguna</h4>
					</div>
					<div class="card-content">
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
						</div>
						<div class="material-datatables">
							<table class="table table-striped table-no-bordered table-hover" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Username</th>
										<th>Email</th>
										<th>Password</th>
										<th>Hak Akses</th>
										<th>Created Data</th>
										<th class="disabled-sorting">Actions</th>
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
		function load_user(){
			$.ajax({
				url:"<?php echo base_url('Main/load_user'); ?>",
				dataType:"JSON",
				success:function(data){
					var html = '';
					var no = 1;
					for (var count = 0; count < data.length; count++) {
						html += '<tr>';
						html += '<td class="table_data" data-row_id="'+data[count].id_users+'" data-column_name="no">'+ no++ +'</td>';
						html += '<td class="table_data" id="nama" data-row_id="'+data[count].id_users+'" data-column_name="nama" contenteditable>'+data[count].nama+'</td>';
						html += '<td class="table_data" data-row_id="'+data[count].id_users+'" data-column_name="username">'+data[count].username+'</td>';
						html += '<td class="table_data" data-row_id="'+data[count].id_users+'" data-column_name="email">'+data[count].email+'</td>';
						html += '<td class="table_data" data-row_id="'+data[count].id_users+'" data-column_name="password">'+data[count].ulang_password+'</td>';
						html += '<td class="table_data" data-row_id="'+data[count].id_users+'" data-column_name="hak_akses">'+data[count].hak_akses+'</td>';
						html += '<td class="table_data" data-row_id="'+data[count].id_users+'" data-column_name="created_date">'+data[count].created_date+'</td>';
						html += '<td><a href="editUser/'+data[count].id_users+'"><button type="button" id="'+data[count].id_users+'" class="btn btn-info btn-just-icon"><i class="material-icons">edit</i></button></a><button type="button" name="delete_btn" id="'+data[count].id_users+'" class="btn btn-danger btn-just-icon btn_delete"><i class="material-icons">delete</i></button></td></td></tr>';
					}
					$('tbody').html(html);
				}
			}); 
		}
		load_user();

		$(document).on('click', '.btn_delete', function(){
		    var id_users = $(this).attr('id');
		    if(confirm("Yakin ingin menghapus data ini?"));
		    {
		      $.ajax({
		        url:"<?php echo base_url(); ?>Main/deleteUsers",
		        method:"POST",
		        data:{id_users:id_users},
		        success:function(data){
		          load_user();
		        }
		      })
		    }
		});
	});
</script>