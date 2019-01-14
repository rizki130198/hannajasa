<?php $lvl = $this->session->userdata('hak_akses');?>
<style type="text/css">
.caret {
    margin-top: 13px;
    position: absolute;
    right: 18px;
} 
.sidebar-mini{
    text-transform: uppercase;
    width: 30px;
    margin-right: 15px;
    text-align: center;
    letter-spacing: 1px;
    position: relative;
    float: left;
    display: inherit;
}
.sidebar-normal{
    margin: 0;
    position: relative;
    transform: translateX(0px);
    opacity: 1;
    white-space: nowrap;
    display: block;
}
.nav-drop li a{
    padding-left: 15px !important;
}
.nav-drop{
    margin-top: 10px !important;
    /*background-color: #f1f1f1;*/
}
li.active a{
    background-color: #00c0ef !important;
}
.active-drop a.menu-act{
    background-color: rgba(200, 200, 200, 0.2);
    border-radius: 3px;
}
</style>
<div class="sidebar" data-color="blue" data-image="<?php echo base_url('assets/img/sidebar-3.jpg'); ?>">
    <div class="logo">
        <a href="<?php echo site_url('cp/dashboard'); ?>" class="simple-text">
            <center><img src="<?php echo base_url('assets/img/tim_80x80.png'); ?>" alt="logo" class="img-responsive" style="height:40px;"></center>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="<?php if($this->uri->segment(2)=="dashboard"){echo "active";}?>">
                <a href="<?=site_url('main/dashboard');?>">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="<?php if($this->uri->segment(2)=="perhitungan"){echo "active";}elseif ($this->uri->segment(2)=="perpanjang"){echo "active";}elseif ($this->uri->segment(2)=="transaksi_p"){echo "active";}elseif ($this->uri->segment(2)=="balik_nama"){echo "active";}elseif ($this->uri->segment(2)=="balik_nama"){echo "active";}elseif ($this->uri->segment(2)=="mutasi"){echo "active";}elseif ($this->uri->segment(2)=="mutasibn"){echo "active";}elseif ($this->uri->segment(2)=="stnk_hilang"){echo "active";}elseif ($this->uri->segment(2)=="stnkh_bn"){echo "active";}?>">
                <a href="<?=site_url('main/perhitungan');?>">
                    <i class="material-icons">create</i> 
                    <p>Perhitungan</p>
                </a>
            </li>
            <li class="<?php if($this->uri->segment(2)=="berkas_jadi"){echo "active";}elseif ($this->uri->segment(2)=="input_berkas"){echo "active";}?>">
                <a href="<?=site_url('main/berkas_jadi');?>">
                    <i class="material-icons">content_paste</i>
                    <p>Input Berkas Jadi</p>
                </a>
            </li>
            <li class="<?php if($this->uri->segment(2)=="prog_kerja"){echo "active";}?>">
                <a href="<?=site_url('main/prog_kerja');?>">
                    <i class="material-icons">insert_chart_outlined</i>
                    <p>Progress Kerjaan</p>
                </a>
            </li>
            <li class="<?php if($this->uri->segment(2)=="blanko"){echo "active";}?>">
                <a href="<?=site_url('main/blanko');?>">
                    <i class="material-icons">receipt</i>
                    <p>Stok Blanko</p>
                </a>
            </li>
            <?php if($lvl=='super_admin'){?>
            <li class="<?php if($this->uri->segment(2)=="harga"){echo "active";}?>">
                <a href="<?=site_url('main/harga');?>">
                    <i class="material-icons">attach_money</i>
                    <p>Daftar Harga</p>
                </a>
            </li>
            <?php } ?>
            <li class="<?php if($this->uri->segment(2)=="pengaduan"){echo "active";}?>">
                <a href="#">
                    <i class="material-icons">show_chart</i>
                    <p>Report</p>
                </a>
            </li>
            <li class="<?php if($this->uri->segment(2)=="pengaduan"){echo "active";}?>">
                <a href="#">
                    <i class="material-icons">swap_horizontal</i>
                    <p>Penggantian Kasir</p>
                </a>
            </li>
            <?php if($lvl=='super_admin'){?>
            <li class="<?php if ($this->uri->segment(2)=="daftar"){echo "active-drop";}elseif($this->uri->segment(2)=="data_pengguna"){echo "active-drop";} ?>">
                <a href="#" data-toggle="collapse" data-target="#pengguna" class="collapsed menu-act">
                    <i class="material-icons">people</i> 
                    <p>Kasir <b class="caret pull-right"></b></p> 
                </a>
                <div class="collapse" id="pengguna">
                    <ul class="nav nav-drop">
                        <li class="<?php if($this->uri->segment(2)=="daftar"){echo "active";}?>">
                            <a href="<?=site_url('main/daftar');?>">
                                <span class="sidebar-mini"> TP </span>
                                <span class="sidebar-normal">Tambah Pengguna</span>
                            </a>
                        </li>
                        <li class="<?php if($this->uri->segment(2)=="data_pengguna"){echo "active";}?>">
                            <a href="<?=site_url('main/data_pengguna');?>">
                                <span class="sidebar-mini"> DP </span>
                                <span class="sidebar-normal">Data Pengguna</span>
                            </a>
                        </li>                        
                    </ul>
                </div>
            </li>
            <?php } ?>
            <li>
                <a href="<?=site_url('main/logout');?>">
                    <i class="material-icons">power_settings_new</i>
                    <p>Keluar</p>
                </a>
            </li>
        </ul>
    </div>
</div>