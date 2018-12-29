<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=$title;?></title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css');?>">
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
	<!-- <div id="loader" style="z-index:9999;position: fixed;width: 100%;height:100%;background: rgba(255,255,255,.8);
	display: flex;
	align-items: center;
	justify-content: center">
	<div class="cssload-container">
		<div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
		<center>Harap Tunggu</center>
	</div>
</div> -->
<?php }?>
<div class="wrapper">

	<!-- sidebar -->
	<?php $uri = $this->uri->segment(2);
	if ($uri=="c_perpanjang") {
	}else{ 
		$this->load->view('include/sidebar-admin');
	} ?>
	<!-- Konfigurasi File -->
	<?php $uri = $this->uri->segment(2);
	if ($uri=="c_perpanjang") {
	}else{ ?>
		<div class="main-panel">
			<?php $this->load->view('include/navbar'); ?>
		<?php } ?>
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
		<?php 
		$u3 = $this->uri->segment(3);
		$u2 = $this->uri->segment(2);
		$i = $this->session->userdata('id_user');
		if ($i==null) {
			redirect(site_url('welcome/login'));
		}else{
			if ($u2 == "dashboard") {
				$this->load->view('admin/dashboard');
			}else if ($u2 == "users") {
				$this->load->view('admin/users');		
			}else if ($u2 == "daftar") {
				$this->load->view('admin/daftar');		
			}else if ($u2 == "perhitungan") {
				$this->load->view('admin/perhitungan');		
			}else if ($u2 == "perpanjang") {
				$this->load->view('admin/perhitungan/perpanjang');	
			}else if ($u2 == "transaksi_p") {
				$this->load->view('admin/transaksi/transaksi_p');
			}else if ($u2 == "c_perpanjang") {
				$this->load->view('admin/cetak/c_perpanjang');	
			}else if ($u2 == "balik_nama") {
				$this->load->view('admin/perhitungan/balik-nama');	
			}else if ($u2 == "harga") {
				$this->load->view('admin/harga');	
			}	
		}
		?>
		<?php 
		$uri = $this->uri->segment(2);
		if ($uri=="c_perpanjang") {
		}else{ ?>
		<footer class="footer">
			<div class="container-fluid">
				<p class="pull-left" style="margin-left: 17px;">
					&copy; <a href="">CV. Hanna Jasa</a>.
				</p>
				<nav class="pull-right" style="margin-right: 12px;">
					
				</nav>
			</div>
		</footer>
		<?php } ?>
		<div class="ps-scrollbar-y-rail" style="top: 0px; height: 950px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 404px;"></div></div>
	</div>	
</div>	
</body>
<script type="text/javascript" src="<?=base_url('public/js/jq.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/material.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/arrive.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/perfect-scrollbar.jquery.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap-notify.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/material-dashboard.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/demo.js');?>"></script>
<script type="text/javascript" src="<?=base_url('public/js/jquery.nicescroll.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('public/js/jquery.toast.js');?>"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$( function() {
		$( "#datepicker" ).datepicker();
	} );
</script>
<script>
	function sum() {
		var txtFirstNumberValue = document.getElementById('txt1').value;
		var txtSecondNumberValue = document.getElementById('txt2').value;
		var txtThreeNumberValue = document.getElementById('txt3').value;
		var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue) * parseFloat(txtThreeNumberValue);
		if (!isNaN(result)) {
			document.getElementById('txt4').value = result;
		}
	}
	function sum_t() {
		var txtFirstNumberValue = document.getElementById('pkb_t').value;
		var txtSecondNumberValue = document.getElementById('denda').value;
		var txtThreeNumberValue = document.getElementById('telat_thn').value;
		var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue) * parseFloat(txtThreeNumberValue);
		if (!isNaN(result)) {
			document.getElementById('hasil').value = result;
		}
	}
	function normal() {
		var txtFirstNumberValue = document.getElementById('pkb_nor').value;
		var txtSecondNumberValue = document.getElementById('swdkllj').value;
		var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
		if (!isNaN(result)) {
			document.getElementById('total').value = result;
		}
	}
	function b_normal() {
		var txtFirstNumberValue = document.getElementById('pkb_b').value;
		var txtSecondNumberValue = document.getElementById('denda_b').value;
		var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
		if (!isNaN(result)) {
			document.getElementById('total_b').value = result;
		}
	}
	function b_bulan() {
		var txtFirstNumberValue = document.getElementById('pkb_bu').value;
		var txtSecondNumberValue = document.getElementById('denda_bu').value;
		var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
		if (!isNaN(result)) {
			document.getElementById('total_bu').value = result;
		}

		var txtFirstNumberValue = document.getElementById('pkb_bu').value;
		var txtSecondNumberValue = document.getElementById('denda_ba').value;
		var txtThreeNumberValue = document.getElementById('telat_bln').value;
		var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue) * parseFloat(txtThreeNumberValue);
		if (!isNaN(result)) {
			document.getElementById('total_ba').value = result;
		}
	}
</script>
<script type="text/javascript">
	function haks() {
		if ($('#hak').val() == 'normal') {
			$('#pkb_n').show();
			$('#pkb_tahun').hide();
			$('#pkb_bulan').hide();
			$('#bulan').hide();
			$('#tahun').hide();
			$('#sank_pkb').hide();
			$('#sank_pkb_tahun').hide();
			$('#swd_n').show();
			$('#swd_b').hide();
			$('#swd_t').hide();
			$('#sank_swd').hide();
			$('#sank_swd_t').hide();
			$('#total_n').show();
		}else if($('#hak').val() == 'telat bulanan') { 
			$('#pkb_n').hide();
			$('#pkb_bulan').show();
			$('#pkb_tahun').hide();
			$('#bulan').show();
			$('#tahun').hide();
			$('#sank_pkb').show();
			$('#sank_pkb_tahun').hide();
			$('#swd_n').hide();
			$('#swd_b').show();
			$('#swd_t').hide();
			$('#sank_swd').show();
			$('#sank_swd_t').hide();
			$('#total_n').show();
		}else if($('#hak').val() == 'Telat lebih dari setahun') { 
			$('#pkb_n').show();
			$('#pkb_bulan').show();
			$('#pkb_tahun').show();
			$('#bulan').show();
			$('#tahun').show();
			$('#sank_pkb').show();
			$('#sank_pkb_tahun').show();
			$('#swd_n').show();
			$('#swd_b').show();
			$('#swd_t').show();
			$('#sank_swd').show();
			$('#sank_swd_t').show();
			$('#total_n').show();
		}else{
			$('#pkb_n').hide();
			$('#pkb_bulan').hide();
			$('#pkb_tahun').hide();
			$('#bulan').hide();
			$('#tahun').hide();
			$('#sank_pkb').hide();
			$('#sank_pkb_tahun').hide();
			$('#swd_n').hide();
			$('#swd_b').hide();
			$('#swd_t').hide();
			$('#sank_swd').hide();
			$('#sank_swd_t').hide();
			$('#total_n').hide();
		}
	}

	function balik() {
		if ($('#balik_nama').val() == 'normal') {
			$('#pkb_n').show();
			$('#pkb_bulan').hide();
			// $('#pkb_tahun').hide();
			$('#bulan').hide();
			// $('#tahun').hide();
			$('#sank_pkb').hide();
			// $('#sank_pkb_tahun').hide();
			$('#swd_n').show();
			$('#adm_n').show();
			$('#sank_swd').hide();
			$('#total_n').show();
		}else if($('#balik_nama').val() == 'telat bulanan') { 
			$('#pkb_n').hide();
			$('#pkb_bulan').show();
			// $('#pkb_tahun').hide();
			$('#bulan').show();
			// $('#tahun').hide();
			$('#sank_pkb').show();
			// $('#sank_pkb_tahun').hide();
			$('#swd_n').show();
			$('#adm_n').show();
			$('#sank_swd').show();
			$('#total_n').show();
		}else if($('#balik_nama').val() == 'Telat lebih dari setahun') { 
			$('#pkb_n').hide();
			$('#pkb_tahun').show();
			$('#bulan').hide();
			$('#tahun').show();
			$('#sank_pkb').hide();
			$('#sank_pkb_tahun').show();
			$('#swd_n').show();
			$('#sank_swd').show();
			$('#total_n').show();
		}else{
			$('#pkb_n').hide();
			$('#adm_n').hide();
			$('#pkb_tahun').hide();
			$('#bulan').hide();
			$('#tahun').hide();
			$('#sank_pkb').hide();
			$('#sank_pkb_tahun').hide();
			$('#swd_n').hide();
			$('#sank_swd').hide();
			$('#total_n').hide();
		}
	}
</script>
<script type="text/javascript">
	$(function() { 
		$(window).scroll(function() { 
			if($(this).scrollTop()>100) { 
				$('#BounceToTop').fadeIn(); 
			} else {
				$('#BounceToTop').fadeOut(); 
			} 
		});

		$('#BounceToTop').click(function() { 
			$('body,html').animate({scrollTop:0},800) .animate({scrollTop:25},200) .animate({scrollTop:0},150) .animate({scrollTop:0},100); 
		}); 
	});
</script>
<script type="text/javascript">
	$(function () {
		$('[data-toggle="tooltip"]').tooltip();

		$('[data-toggle="popover"]').on('mouseover',function(){
			$(this).popover('show');
		});
		$('[data-toggle="popover"]').on('mouseout',function(){
			$(this).popover('hide');
		});
		$("[data-toggle='dropdown']").click(function(){
			$("#mltLvl").removeClass('open').addClass("closed");
			$(".multi-level").removeClass('open').addClass("closed");
			$("#riwayat_laporan").removeClass('open').addClass("closed");
			$("#eks_data").removeClass('open').addClass("closed");
			$("#data_pop").removeClass('open').addClass("closed");
			$("#data_gedung").removeClass('open').addClass("closed");
		});
	});

	function openMenuMulti(opened,othermenu,lastmenu) {
		var opened = $(opened);
		var othermenu = $(othermenu);
		var lastmenu = $(lastmenu);
		if (opened.hasClass('closed')) {
			$("#mltLvl").removeClass('closed').addClass("open");
			$(".multi-level").removeClass('closed').addClass("open");
      	// console.log(opened);
      	opened.addClass('open').removeClass('closed');
      	othermenu.removeClass('open').addClass('closed');
      	lastmenu.removeClass('open').addClass('closed');
      }else{
      	opened.addClass('closed').removeClass('open');

      }
  }
  function toggleLain() {
  	var th = $("#mltLvl");
  	if (th.hasClass('closed')) {

  		$("#mltLvl").removeClass("closed");
  		$(".multi-level").removeClass("closed");
        // $('.multi-level ul closed').removeClass('open').addClass('closed');
        th.addClass('open').removeClass('closed');
    }else{

        // $('.multi-level ul open').removeClass('closed').addClass('open');
        $("#mltLvl").removeClass("open");
        $(".multi-level").removeClass("open");
        th.removeClass('open').addClass('closed');
    }
}
</script>
<script type="text/javascript">
	var rupiah = document.getElementById("rupiah");
	rupiah.addEventListener("keyup", function(e) {
		rupiah.value = formatRupiah(this.value, "Rp. ");
	});

	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
		split = number_string.split(","),
		sisa = split[0].length % 3,
		rupiah = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah += separator + ribuan.join(".");
		}

		rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
		return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
	}
	//batas//
	var rupiah2 = document.getElementById("rupiah2");
	rupiah2.addEventListener("keyup", function(e) {
		rupiah2.value = formatRupiah2(this.value, "Rp. ");
	});

	function formatRupiah2(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
		split = number_string.split(","),
		sisa = split[0].length % 3,
		rupiah2 = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah2 += separator + ribuan.join(".");
		}

		rupiah2 = split[1] != undefined ? rupiah2 + "," + split[1] : rupiah2;
		return prefix == undefined ? rupiah2 : rupiah2 ? "Rp. " + rupiah2 : "";
	}
	//batas//
	var rupiah3 = document.getElementById("rupiah3");
	rupiah3.addEventListener("keyup", function(e) {
		rupiah3.value = formatRupiah3(this.value, "Rp. ");
	});

	function formatRupiah3(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
		split = number_string.split(","),
		sisa = split[0].length % 3,
		rupiah3 = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah3 += separator + ribuan.join(".");
		}

		rupiah3 = split[1] != undefined ? rupiah3 + "," + split[1] : rupiah3;
		return prefix == undefined ? rupiah3 : rupiah3 ? "Rp. " + rupiah3 : "";
	}

	var rupiah4 = document.getElementById("rupiah4");
	rupiah4.addEventListener("keyup", function(e) {
		rupiah4.value = formatRupiah4(this.value, "Rp. ");
	});

	function formatRupiah4(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
		split = number_string.split(","),
		sisa = split[0].length % 3,
		rupiah4 = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah4 += separator + ribuan.join(".");
		}

		rupiah4 = split[1] != undefined ? rupiah4 + "," + split[1] : rupiah4;
		return prefix == undefined ? rupiah4 : rupiah4 ? "Rp. " + rupiah4 : "";
	}

	var rupiah5 = document.getElementById("rupiah5");
	rupiah5.addEventListener("keyup", function(e) {
		rupiah5.value = formatRupiah5(this.value, "Rp. ");
	});

	function formatRupiah5(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
		split = number_string.split(","),
		sisa = split[0].length % 3,
		rupiah5 = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah5 += separator + ribuan.join(".");
		}

		rupiah5 = split[1] != undefined ? rupiah5 + "," + split[1] : rupiah5;
		return prefix == undefined ? rupiah5 : rupiah5 ? "Rp. " + rupiah5 : "";
	}
</script>
<script type="text/javascript">

	jQuery(window).load(function () {
		jQuery('#loader').fadeOut('slow');
	});
</script>
</html>