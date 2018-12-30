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
			}else if ($u2 == "berkas_jadi") {
				$this->load->view('admin/berkas_jadi');	
			}else if ($u2 == "input_berkas") {
				$this->load->view('admin/transaksi/transaksi_berkas');	
			}else if ($u3 == "c_berkas") {
				$this->load->view('admin/cetak/c_berkas');	
			}else if ($u2 == "harga") {
				$this->load->view('admin/harga');	
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
<?php 
$uri = $this->uri->segment(2);
if ($uri=="cetak") { ?>
<!-- <script type="text/javascript" src="<?=base_url('assets/js/bootstrap4.min.js');?>"></script> -->
<?php }else{ ?>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
<?php } ?>
<script type="text/javascript" src="<?=base_url('assets/js/material.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/arrive.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/perfect-scrollbar.jquery.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap-notify.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/material-dashboard.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/demo.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('public/js/jquery.nicescroll.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/hanajasa.js');?>"></script>
<script type="text/javascript" src="<?=base_url('public/js/jquery.toast.js');?>"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</html>