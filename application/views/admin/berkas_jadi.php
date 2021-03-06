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
.delete{
  border: 3px solid #f44336 !important;
}
.delete i{
  color: #f44336 !important;
}
.batal{
  border: 3px solid #ff9800 !important;
}
.batal i{
  color: #ff9800 !important;
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
            <h4 class="title">Data Berkas Jadi</h4>
          </div>
          <div class="card-content">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
              <select class="form-control" name="get_p" id="get_select" onchange="ganti()">
                <option value="perpanjang">Perpanjang</option>
                <option value="bn">Balik Nama</option>
                <option value="mutasi">Mutasi</option>
                <option value="m_bn">Mutasi + Balik Nama</option>
                <option value="stnk">STNK Hilang</option>
                <option value="stnk_h">STNK Hilang + Balik Nama</option>
              </select>
            </div>
            <div class="material-datatables">
              <table id="berkasjadi" class="table table-striped table-no-bordered table-hover" style="width:100%">
                <thead>
                 <tr>
                  <th>No Transaksi</th>
                  <th>Pengguna</th>
                  <th>Jenis Proses</th>
                  <th>Atas Nama</th>
                  <th>Nomor Telp</th>
                  <th>Uang Muka (DP)</th>
                  <th>Wilayah</th>
                  <th>Nomor Polisi</th>
                  <th class="disabled-sorting">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($berkas as $key): ?>
                 <tr>
                  <td><?=$key->no?></td>
                  <td><?=$key->nama?></td>
                  <td><?=$key->jenis_kendaraan?> <span style="color: red;">(<?=$key->jenis?>)</span></td>
                  <td><?=$key->atas_nama?></td>
                  <td><?=$key->no_telp?></td>
                  <td><?=$key->uang_dp?></td>
                  <td><?=$key->wilayah?></td>
                  <td><?=$key->nopol?></td>
                  <td>
                    <a href="#approve<?=$key->no?>" data-toggle="modal" data-tooltip="Terima Berkas" class="btn btn-link btn-success btn-just-icon"><i class="material-icons">check</i></a>
                    <a href="#batal<?=$key->no?>" data-toggle="modal" data-tooltip="Pembatalan Berkas" class="btn btn-link btn-warning btn-just-icon"><i class="material-icons">close</i></a>
                    <a href="#delete<?=$key->no?>" data-toggle="modal" data-tooltip="Hapus Berkas" class="btn btn-link btn-danger btn-just-icon"><i class="material-icons">delete</i></a>
                  </td>
                  <div id="approve<?=$key->no?>" class="modal fade">
                    <div class="modal-dialog modal-confirm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="icon-box">
                            <i class="material-icons">check</i>
                          </div>        
                          <h4 class="modal-title">Yakin ingin melanjutkan?</h4>  
                          <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
                        </div>
                        <div class="modal-body">
                          <p>Setelah di lanjutkan, anda akan beralih ke halaman input berkas jadi.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <a href="<?= site_url('main/input_berkas/perpanjang/'.$key->id_cetak) ?>"><button class="btn btn-success" type="button">Ya, lanjutkan</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="delete<?=$key->no?>" class="modal fade">
                    <div class="modal-dialog modal-confirm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="icon-box delete">
                            <i class="material-icons">delete</i>
                          </div>        
                          <h4 class="modal-title">Yakin ingin Delete?</h4>  
                          <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
                        </div>
                        <div class="modal-body">
                          <p>Setelah di hapus, data akan terhapus dan tidak bisa di kembalikan.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <a href="<?= site_url('main/delete_berkas/perpanjang/'.$key->id_cetak) ?>"><button class="btn btn-danger" type="button">Ya, Hapus</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="batal<?=$key->no?>" class="modal fade">
                    <div class="modal-dialog modal-confirm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="icon-box batal">
                            <i class="material-icons">close</i>
                          </div>        
                          <h4 class="modal-title">Yakin ingin batalkan berkas?</h4>  
                          <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
                        </div>
                        <div class="modal-body">
                          <p>Setelah di batalkan, data tidak akan di tampilkan di berkas.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <a href="<?= site_url('main/batal_berkas/perpanjang/'.$key->id_cetak) ?>"><button class="btn btn-warning" type="button">Ya, lanjutkan</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>
              </tr>
            </tbody>
          </table>
          <div id="modalnya"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>