<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=$title;?></title>
	<meta name="viewport" content="width=device-width">
	<?php 
	$uri = $this->uri->segment(2);
	if ($uri=="cetak") { ?>
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap4.min.css');?>">
	<?php }else{ ?>
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css');?>">
	<?php } ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/material-dashboard.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/demo.css'); ?>">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('public/css/style.css');?>">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/fonts/font-awesome/css/font-awesome.min.css'); ?>">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>
<style type="text/css" media="screen">
body{
	overflow-y: hidden;
}
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
</style>
<body>
	<noscript>
		<div id="loader" style="z-index:9999;position: fixed;width: 100%;height:100%;background: rgba(255,255,255,.8);
		display: flex;
		align-items: center;
		justify-content: center">
		<div class="cssload-container">
			<div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
			<center>Mohon Aktifkan Javascript Anda</center>
		</div>
	</div>
</noscript>
<?php 
$uri = $this->uri->segment(2);
if ($uri=="eksporpdf") {
}else{ ?>
	<div id="loader" style="z-index:9999;position: fixed;width: 100%;height:100%;background: rgba(255,255,255,.8);
	display: flex;
	align-items: center;
	justify-content: center">
	<div class="cssload-container">
		<div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
		<center>Harap Tunggu</center>
	</div>
</div>
<?php }?>
<div class="wrapper">

	<!-- sidebar -->
	<?php $uri = $this->uri->segment(2);
	if ($uri=="cetak") {
	}else{ 
		$this->load->view('include/sidebar-admin');
	} ?>
	<!-- Konfigurasi File -->
	<?php $uri = $this->uri->segment(2);
	if ($uri=="cetak") {
	}else{ ?>
		<div class="main-panel">
			<?php $this->load->view('include/navbar'); ?>
		<?php } ?>
		
		<?php 
		$u3 = $this->uri->segment(3);
		$u2 = $this->uri->segment(2);
		$i = $this->session->userdata('id');
		if ($i==NULL) {
			redirect(site_url('welcome/login'));
		}else{
			if ($u2 == "dashboard") {
				$this->load->view('admin/dashboard');
			}else if ($u2 == "users") {
				$this->load->view('admin/users');		
			}else if ($u2 == "daftar") {
				$this->load->view('admin/daftar');
			}else if ($u2 == "data_pengguna") {
				$this->load->view('admin/data_pengguna');
			}else if ($u2 == "editUser") {
				$this->load->view('admin/edit_user');		
			}else if ($u2 == "perhitungan") {
				$this->load->view('admin/perhitungan');		
			}else if ($u2 == "perpanjang") {
				$this->load->view('admin/perhitungan/perpanjang');	
			}else if ($u2 == "transaksi_p") {
				$this->load->view('admin/transaksi/transaksi_p');
			}else if ($u3 == "c_perpanjang") {
				$this->load->view('admin/cetak/c_perpanjang');	
			}else if ($u2 == "balik_nama") {
				$this->load->view('admin/perhitungan/balik-nama');
			}else if ($u3 == "c_baliknama") {
				$this->load->view('admin/cetak/c_baliknama');
			}else if ($u2 == "transaksi_bn") {
				$this->load->view('admin/transaksi/transaksi_bn');
			}else if ($u2 == "mutasi") {
				$this->load->view('admin/perhitungan/mutasi');	
			}else if ($u2 == "transaksi_m") {
				$this->load->view('admin/transaksi/transaksi_m');
			}else if ($u2 == "mutasibn") {
				$this->load->view('admin/perhitungan/mutasi_bn');	
			}else if ($u2 == "transaksi_mb") {
				$this->load->view('admin/transaksi/transaksi_mb');	
			}else if ($u2 == "stnk_hilang") {
				$this->load->view('admin/perhitungan/stnkhilang');	
			}else if ($u2 == "transaksi_sh") {
				$this->load->view('admin/transaksi/transaksi_sh');	
			}else if ($u2 == "stnkh_bn") {
				$this->load->view('admin/perhitungan/stnkh_baliknama');	
			}else if ($u2 == "transaksi_sb") {
				$this->load->view('admin/transaksi/transaksi_sb');	
			}else if ($u2 == "berkas_jadi") {
				$this->load->view('admin/berkas_jadi');	
			}else if ($u2 == "input_berkas") {
				$this->load->view('admin/transaksi/transaksi_berkas');	
			}else if ($u3 == "c_berkas") {
				$this->load->view('admin/cetak/c_berkas');	
			}else if ($u2 == "harga") {
				$this->load->view('admin/harga');
			}else if ($u2 == "harga_jasa") {
				$this->load->view('admin/harga_jasa');
			}else if ($u2 == "report") {
				$this->load->view('admin/report');
			}else if ($u2 == "blanko") {
				$this->load->view('admin/blanko');	
			}else if ($u2 == "profile") {
				$this->load->view('admin/profile');
			}else if ($u2 == "berkas") {
				$this->load->view('admin/berkas');	
			}else if ($u2 == "prog_kerja") {
				$this->load->view('admin/progress_kerjaan');	
			}else if ($u2 == "datahistory") {
				$this->load->view('admin/data_history');	
			}else{
				$this->load->view('admin/dashboard');
			}
		}
		?>
		<?php 
		$uri = $this->uri->segment(2);
		if ($uri=="cetak") {
		}else{ ?>
			<footer class="footer">
				<div class="container-fluid">
					<p class="pull-left" style="margin-left: 17px;">
						&copy; 2019 <a href="">CV. Hanna Jasa</a>.
					</p>
					<nav class="pull-right" style="margin-right: 12px;">
						
					</nav>
				</div>
			</footer>
		<?php } ?>
	</div>	
	<div class="ps-scrollbar-y-rail" style="top: 0px; height: 950px; right: 0px;">
		<div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 404px;"></div>
	</div>
</div>	
</body>
<script type="text/javascript" src="<?=base_url('public/js/jq.js');?>"></script>
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
<?php 
$uri = $this->uri->segment(2);
if ($uri=="cetak") { ?>
	<script type="text/javascript" src="<?=base_url('assets/js/bootstrap4.min.js');?>"></script>
<?php }else{ ?>
	<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
<?php } ?>
<script type="text/javascript" src="<?=base_url('assets/js/material.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/arrive.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/perfect-scrollbar.jquery.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('public/js/hanajasa.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap-notify.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/material-dashboard.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/demo.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('public/js/jquery.nicescroll.min.js');?>"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="<?=base_url('public/js/hanajasa.js');?>"></script>
<script type="text/javascript">
	function m_sum_t() {
		var telat = document.getElementById('telat_thn').value;
		var telatbln = document.getElementById('telat_bln').value;
		var result = parseFloat(telat) + parseFloat(telatbln);
		if (!isNaN(result)) {
			document.getElementById('hasil_tahun').value = result;
		}

		var totalbulan = document.getElementById('hasil_tahun').value;
		var pkb = document.getElementById('pkb_t').value;
		var denda = document.getElementById('denda').value;
		var result = parseFloat(totalbulan) * parseFloat(pkb) * parseFloat(denda);
		if (!isNaN(result)) {
			document.getElementById('hasil_tahun').value = result;
		}
	}
	function sum_p() {
		var txtFirstNumberValue = document.getElementById('pkb2').value;
		var txtSecondNumberValue = document.getElementById('denda_bu').value;
		var txtThreeNumberValue = document.getElementById('t_bln').value;
		var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue) * parseFloat(txtThreeNumberValue);
		if (!isNaN(result)) {
			document.getElementById('sum_bulan').value = result;
		}
	}
	function m_tahun() {
		var pkb = document.getElementById('pkb_mt').value;
		var denda = document.getElementById('denda_mt').value;
		var result = parseFloat(pkb) * parseFloat(denda);
		if (!isNaN(result)) {
			document.getElementById('total_mt').value = result;
		}
	}
</script>
<script type="text/javascript">
	$(document).ready(function(){
    	// Format mata uang.
    	// $( '.uang' ).mask('0,000,000,000', {reverse: true});
	    // Format nomor HP.
	    // $( '.no_hp' ).mask('0000−0000−0000');
	})
</script>
<script type="text/javascript">
	$('#lainnya_p').change(function(){
		if ($('#lainnya_p').is(':checked') == true){
			$('#txt-lainnya-p').val('').prop('disabled', false);
			$('#txt-lainnya-p1').val('').prop('disabled', false);
			console.log('checked');
		} else {
			$('#txt-lainnya-p').val('.....').prop('disabled', true);
			$('#txt-lainnya-p1').val('.....').prop('disabled', true);
			console.log('unchecked');
		}
	});
	$('#lainnya_p2').change(function(){
		if ($('#lainnya_p2').is(':checked') == true){
			$('#txt-lainnya-p2').val('').prop('disabled', false);
			$('#txt-lainnya-p3').val('').prop('disabled', false);
			console.log('checked');
		} else {
			$('#txt-lainnya-p2').val('.....').prop('disabled', true);
			$('#txt-lainnya-p3').val('.....').prop('disabled', true);
			console.log('unchecked');
		}
	});
</script>
<script type="text/javascript">
	$('.jum-pajak').on('input','.jumlah_pajak',function(){
		var totalSum = 0;
		$('.jum-pajak .jumlah_pajak').each(function(){
			var inputVal = this.value.replace(',','');
			if($.isNumeric(inputVal)){
				totalSum+=parseFloat(inputVal);
			}
		});
		// $('#sum').val(totalSum);
		$('#sum_pajak').val(totalSum);
	});
	$('.jumlah_pajak_t').on('input','.jumlah_p_t',function(){
		var totalSum = 0;
		$('.jumlah_pajak_t .jumlah_p_t').each(function(){
			var inputVal = this.value.replace(',','');
			if($.isNumeric(inputVal)){
				totalSum+=parseFloat(inputVal);
			}
		});
		// $('#sum').val(totalSum);
		$('#sum_pajak_t').val(totalSum);
	});
	$('.jum-pajak-b').on('input','.jumlah_pajak_b',function(){
		var totalSum = 0;
		$('.jum-pajak-b .jumlah_pajak_b').each(function(){
			var inputVal = this.value.replace(',','');
			if($.isNumeric(inputVal)){
				totalSum+=parseFloat(inputVal);
			}
		});
		// $('#sum').val(totalSum);
		$('#sum_pajak_b').val(totalSum);
	});
	$('.jum-pajak-n').on('input','.jumlah_pajak_n',function(){
		var totalSum = 0;
		$('.jum-pajak-n .jumlah_pajak_n').each(function(){
			var inputVal = this.value.replace(',','');
			if($.isNumeric(inputVal)){
				totalSum+=parseFloat(inputVal);
			}
		});
		// $('#sum').val(totalSum);
		$('#sum_pajak_n').val(totalSum);
	});
	$('.jum-n').on('input','.jumlah_n',function(){
		var totalSum = 0;
		$('.jum-n .jumlah_n').each(function(){
			var inputVal = this.value.replace(',','');
			if($.isNumeric(inputVal)){
				totalSum+=parseFloat(inputVal);
			}
		});
		// $('#sum').val(totalSum);
		$('#sum_n').val(totalSum.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
	});
	$('.jum-b').on('input','.jumlah_b',function(){
		var totalSum = 0;
		$('.jum-b .jumlah_b').each(function(){
			var inputVal = this.value.replace(',','');
			if($.isNumeric(inputVal)){
				totalSum+=parseFloat(inputVal);
			}
		});
		// $('#sum').val(totalSum);
		$('#sum_b').val(totalSum.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
	});
	$('.jum-t').on('input','.jumlah_t',function(){
		var totalSum = 0;
		$('.jum-t .jumlah_t').each(function(){
			var inputVal = this.value.replace(',','');
			if($.isNumeric(inputVal)){
				totalSum+=parseFloat(inputVal);
			}
		});
		// $('#sum').val(totalSum);
		$('#sum_t').val(totalSum.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,"));
	});
	$('.jum-pajak').on('input','.jumlah',function(){
		var totalSum = 0;
		$('.jum-pajak .jumlah').each(function(){
			var inputVal = this.value.replace(',','');
			if($.isNumeric(inputVal)){
				totalSum+=parseFloat(inputVal);
			}
		});
		// $('#sum').val(totalSum);
		$('#sum').val(totalSum);

		var hasil = parseFloat($('#sum').val()) + parseFloat($('#hasil_biaya').val());
		$(".biaya_prediksi").val(hasil);
	});
	$('.jum-b').on('input','.jumlah_biaya',function(){
		var totalSum = 0;
		$('.jum-b .jumlah_biaya').each(function(){
			var inputVal = this.value.replace(',','');
			if($.isNumeric(inputVal)){
				totalSum+=parseFloat(inputVal);
			}
		});
		// $('#sum').val(totalSum);
		$('#hasil_biaya').val(totalSum);


		var hasil = parseFloat($('#sum').val()) + parseFloat($('#hasil_biaya').val());
		$(".biaya_prediksi").val(hasil);
	});
	$('.downpay').on('input','.dp',function(){
		var totalSum = 0;
		$('.downpay .dp').each(function(){
			var inputVal = this.value.replace(',','');
			if($.isNumeric(inputVal)){
				totalSum+=parseFloat(inputVal);
			}
		});
		// $('#sum').val(totalSum);
		var total = parseFloat($(".biaya_prediksi").val()) - parseFloat(totalSum);
		$(".prediskisisa").val(total.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
	});
	// $(document).ready(function(){
	// 	$('input.jumlah').keyup(function(event){
 //      		// skip for arrow keys
	//       	if(event.which >= 37 && event.which <= 40){
	//       		event.preventDefault();
	//       	}
	//       	var $this = $(this);
	//       	var num = $this.val().replace(/,/gi, "").split("").reverse().join("");
	//       	var num2 = RemoveRougeChar(num.replace(/(.{3})/g,"$1,").split("").reverse().join(""));
	//       	console.log(num2);
	//       	// the following line has been simplified. Revision history contains original.
	//      	$this.val(num2);
 //  		});
	// });
	// function RemoveRougeChar(convertString){
	// 	if(convertString.substring(0,1) == ","){
	// 		return convertString.substring(1, convertString.length)            
	// 	}
	// 	return convertString;
	// }
</script>
<script type="text/javascript">
	$('#berkasjadi').DataTable({
		"pagingType": "full_numbers",
		"lengthMenu": [
		[10, 25, 50, -1],
		[10, 25, 50, "All"]
		],
		responsive: true,
		language: {
			search: "_INPUT_",
			searchPlaceholder: "Cari Berkas",
		}
	});
	var table = $('#datatable').DataTable();
</script>
<div class="col-md-12">
	<?php if ($this->session->flashdata('gagal')) { ?>
		<div id="error" class="card-panel" style="background: #3D4242;color:#FFF;margin:20px 0;">
			<div  class="card-content">
				<script type="text/javascript" charset="utf-8" >
					$.toast({
						heading: 'Warning',
						text: "<?=$this->session->flashdata('gagal')?>",
						position: 'top-right',
						stack: false,
						hideAfter: 5000, 
						icon: 'warning'
					});
				</script>
			</div>
		</div>
	<?php }elseif($this->session->flashdata('sukses')){ ?>
		<div id="sukses" class="card-panel" style="background: #4CAF50;color:#FFF;margin:20px 0;">
			<div  class="card-content">
				<script type="text/javascript" charset="utf-8" >
					$.toast({
						heading: 'Success',
						text: "<?=$this->session->flashdata('sukses')?>",
						position: 'top-right',
						stack: false,
						hideAfter: 5000, 
						icon: 'success'
					});
				</script>
			</div>
		</div>
	<?php } ?>
</div>
</html>