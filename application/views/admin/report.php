<style type="text/css">
/*small{
	text-decoration: underline;
}*/
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">pie_chart</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Data Hari Ini</p>
                        <h4 class="title">
							<small>Perpanjang : <?php echo $datahari_p->row()->jml_p; ?></small>
						</h4>
						<h4 class="title">
							<small>Balik Nama : <?php echo $datahari_bn->row()->jml_bn; ?></small>
						</h4>
						<h4 class="title">
							<small>Mutasi : <?php echo $datahari_m->row()->jml_m; ?></small>
						</h4>
						<h4 class="title">
							<small>Mutasi+Balik Nama : 0</small>
						</h4>
						<h4 class="title">
							<small>STNK Hilang : <?php echo $datahari_sh->row()->jml_sh; ?></small>
						</h4>
						<h4 class="title">
							<small>STNK Hilang+Balik Nama : 0</small>
						</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">pie_chart</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Data Minggu Ini</p>
                        <h4 class="title">
							<small>Perpanjang : <?php echo $dataminggu_p->row()->jml_p; ?></small>
						</h4>
						<h4 class="title">
							<small>Balik Nama : <?php echo $dataminggu_bn->row()->jml_bn; ?></small>
						</h4>
						<h4 class="title">
							<small>Mutasi : <?php echo $dataminggu_m->row()->jml_m; ?></small>
						</h4>
						<h4 class="title">
							<small>Mutasi+Balik Nama : 0</small>
						</h4>
						<h4 class="title">
							<small>STNK Hilang : <?php echo $dataminggu_sh->row()->jml_sh; ?></small>
						</h4>
						<h4 class="title">
							<small>STNK Hilang+Balik Nama : 0</small>
						</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">pie_chart</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Data Bulan Ini</p>
                       	<h4 class="title">
							<small>Perpanjang : <?php echo $databulan_p->row()->jml_p; ?></small>
						</h4>
						<h4 class="title">
							<small>Balik Nama : <?php echo $databulan_bn->row()->jml_bn; ?></small>
						</h4>
						<h4 class="title">
							<small>Mutasi : <?php echo $databulan_m->row()->jml_m; ?></small>
						</h4>
						<h4 class="title">
							<small>Mutasi+Balik Nama : 0</small>
						</h4>
						<h4 class="title">
							<small>STNK Hilang : <?php echo $databulan_sh->row()->jml_sh; ?></small>
						</h4>
						<h4 class="title">
							<small>STNK Hilang+Balik Nama : 0</small>
						</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">pie_chart</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Data Keseluruhan</p>
                        <h4 class="title">
							<small>Perpanjang : <?php echo $datatotal_p->row()->jml_p; ?></small>
						</h4>
						<h4 class="title">
							<small>Balik Nama : <?php echo $datatotal_bn->row()->jml_bn; ?></small>
						</h4>
						<h4 class="title">
							<small>Mutasi : <?php echo $datatotal_m->row()->jml_m; ?></small>
						</h4>
						<h4 class="title">
							<small>Mutasi+Balik Nama : 0</small>
						</h4>
						<h4 class="title">
							<small>STNK Hilang : <?php echo $datatotal_sh->row()->jml_sh; ?></small>
						</h4>
						<h4 class="title">
							<small>STNK Hilang+Balik Nama : 0</small>
						</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>