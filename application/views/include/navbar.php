<style type="text/css">
#autoSuggestionsList > a li {
    background: none repeat scroll 0 0 #fff;
    border-bottom: 1px solid #E3E3E3;
    list-style: none outside none;
    padding: 8px 8px 8px 14px;
}
#autoSuggestionsList > a li:hover{ 
    background: #f14444 !important; color: #fff; 
}
#autoSuggestionsList > a { 
    color: #333;text-decoration: none; 
}
.auto_list {
    z-index: 99;
    margin-top: 7px;
    border: 0;
    background: #fff;
    border-radius: 4px;
    box-shadow: 0 0 4px 0 #ccc;
}
</style>
<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"> 
                <?php if($this->uri->segment(2)=="dashboard"){
                    echo "Dashboard";
                }elseif ($this->uri->segment(2)=="users") {
                    echo "Halaman Pengguna";
                }elseif ($this->uri->segment(2)=="daftar") {
                    echo "Halaman Tambah Kasir";
                }elseif ($this->uri->segment(2)=="data_pengguna") {
                    echo "Halaman Data Pengguna";
                }elseif ($this->uri->segment(2)=="editUser") {
                    echo "Halaman Ubah Pengguna";
                }elseif ($this->uri->segment(2)=="perhitungan") {
                    echo "Halaman Perhitungan";
                }elseif ($this->uri->segment(2)=="perpanjang") {
                    echo "Halaman Perpanjang STNK";
                }elseif ($this->uri->segment(2)=="transaksi_p") {
                    echo "Halaman Transaksi Perpanjang STNK";
                }elseif ($this->uri->segment(2)=="transaksi_bn") {
                    echo "Halaman Transaksi Balik Nama STNK";    
                }elseif ($this->uri->segment(2)=="berkas_jadi") {
                    echo "Halaman Berkas Jadi";    
                }elseif ($this->uri->segment(2)=="input_berkas") {
                    echo "Halaman Input Berkas Jadi";    
                }elseif ($this->uri->segment(2)=="balik_nama") {
                    echo "Halaman Balik Nama STNK";
                }elseif ($this->uri->segment(2)=="mutasi") {
                    echo "Halaman Mutasi STNK";    
                }elseif ($this->uri->segment(2)=="transaksi_m") {
                    echo "Halaman Transaksi Mutasi";
                }elseif ($this->uri->segment(2)=="mutasibn") {
                    echo "Halaman Mutasi + Balik Nama";    
                }elseif ($this->uri->segment(2)=="transaksi_mb") {
                    echo "Halaman Transaksi Mutasi + Balik Nama";    
                }elseif ($this->uri->segment(2)=="stnk_hilang") {
                    echo "Halaman STNK Hilang";
                }elseif ($this->uri->segment(2)=="transaksi_sh") {
                    echo "Halaman Transaksi STNK Hilang";
                }elseif ($this->uri->segment(2)=="stnkh_bn") {
                    echo "Halaman STNK Hilang + Balik Nama";
                }elseif ($this->uri->segment(2)=="transaksi_sb") {
                    echo "Halaman Transaksi STNK Hilang + Balik Nama";
                }elseif ($this->uri->segment(2)=="harga") {
                    echo "Halaman Daftar Harga Kendaraan";
                }elseif ($this->uri->segment(2)=="harga_jasa") {
                    echo "Halaman Daftar Harga Jasa";
                }elseif ($this->uri->segment(2)=="prog_kerja") {
                    echo "Halaman Progress Kerja";
                }elseif ($this->uri->segment(2)=="datahistory") {
                    echo "Halaman Progress Kerjaan Karyawan";
                }elseif ($this->uri->segment(2)=="blanko") {
                    echo "Halaman Stok Blanko";
                }elseif ($this->uri->segment(2)=="profile") {
                    echo "Halaman Profile";
                }elseif ($this->uri->segment(2)=="report") {
                    echo "Halaman Report Data";
                } ?>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo site_url('main/profile'); ?>">
                        <i class="material-icons">person</i>
                        <p class="hidden-lg hidden-md">Profile</p>
                        <?php echo $this->session->userdata('user'); ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>