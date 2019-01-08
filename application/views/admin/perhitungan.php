<style type="text/css">
.icon {
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
    display: block;
    float: left;
    height: 50px;
    width: 50px;
    text-align: center;
    font-size: 30px;
    color: #fff;
    background: rgba(0,0,0,0.2);
}
.icon p{
	margin-top:14px;
	font-weight: bold;
}
.bg-p {
    background-color: #00c0ef;
}
.bg-bn{
	background-color: #fb8c00;
}
.bg-m{
	background-color: #d81b60;
}
.bg-mb{
	background-color: #43a047;
}
.bg-sh{
	background-color: #89a1ad;
}
.bg-sb{
	background-color: #00acc1;
}
.padd{
    padding: 24px 0 0;
    margin-left: 58px;
    line-height: 0;
}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<a href="<?php echo site_url('main/perpanjang'); ?>">
					<div class="card">
						<span class="icon bg-p"><p>P</p></span>
						<div class="padd">
							<p>Perpanjang</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="<?php echo site_url('main/balik_nama'); ?>">
					<div class="card">
						<span class="icon bg-bn"><p>BN</p></span>
						<div class="padd">
							Balik Nama
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="<?php echo site_url('main/mutasi'); ?>">
					<div class="card">
						<span class="icon bg-m"><p>M</p></span>
						<div class="padd">
							Mutasi
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<div class="card">
					<span class="icon bg-mb"><p>MB</p></span>
					<div class="padd">
						Mutasi + Balik Nama
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
					<span class="icon bg-sh"><p>SH</p></span>
					<div class="padd">
						STNK Hilang
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
					<span class="icon bg-sb"><p>SB</p></span>
					<div class="padd">
						STNK Hilang + Balik Nama
					</div>
				</div>
			</div>
		</div>
	</div>
</div>