<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="purple">
            <h4 class="title">Progress Kerjaan Karyawan</h4>
          </div>
          <div class="card-content">
            <div class="table-responsive">
              <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                 <tr>
                  <th>Proses</th>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Nopol</th>
                  <th>Ket</th>
                  <th>Pajak</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($perpanjang as $key ): ?>
                  <tr>

                    <td>Perpanjang <span style="color:red;">(<?=$key->jenis?>)</span></td>
                    <td><?=$no++?></td>
                    <td><?=$key->atas_nama?></td>
                    <td><?=$key->nopol?></td>
                    <td>Blm tahu></td>
                    <td><?=$key->total_pajak?></td>
                  </tr>
                <?php endforeach ?>
                <?php foreach ($balik as $b ): ?>
                  <tr>
                    
                    <td>BALIK NAMA<span style="color:red;">(<?=$b->jenis?>)</span></td>
                    <td><?=$no++?></td>
                    <td><?=$b->atas_nama?></td>
                    <td><?=$b->nopol?></td>
                    <td>blm tahu</td>
                    <td><?=$b->total_pajak?></td>
                  </tr>
                <?php endforeach ?>
                <?php foreach ($mutasi as $m ): ?>
                  <tr>
                    
                    <td>mutasi<span style="color:red;">(<?=$m->jenis?>)</span></td>
                    <td><?=$no++?></td>
                    <td><?=$m->atas_nama?></td>
                    <td><?=$m->nopol?></td>
                    <td>blm tahu</td>
                    <td><?=$m->total_pajak?></td>
                  </tr>
                <?php endforeach ?>
                <?php foreach ($mutasi_bn as $mbn ): ?>
                  <tr>
                    
                    <td>MUTASI + BALIK NAMA<span style="color:red;">(<?=$mbn->jenis?>)</span></td>
                    <td><?=$no++?></td>
                    <td><?=$mbn->atas_nama?></td>
                    <td><?=$mbn->nopol?></td>
                    <td>blm tahu</td>
                    <td><?=$mbn->total_pajak?></td>
                  </tr>
                <?php endforeach ?>
                <?php foreach ($stnk as $stnk ): ?>
                  <tr>
                    
                    <td>STNK HILANG<span style="color:red;">(<?=$stnk->jenis?>)</span></td>
                    <td><?=$no++?></td>
                    <td><?=$stnk->atas_nama?></td>
                    <td><?=$stnk->nopol?></td>
                    <td>blm tahu</td>
                    <td><?=$stnk->total_pajak?></td>
                  </tr>
                <?php endforeach ?>
                <?php foreach ($stnk_bn as $stnkb ): ?>
                  <tr>
                    
                    <td>STNK HILANG + BALIK NAMA<span style="color:red;">(<?=$stnkb->jenis?>)</span></td>
                    <td><?=$no++?></td>
                    <td><?=$stnkb->atas_nama?></td>
                    <td><?=$stnkb->nopol?></td>
                    <td>blm tahu</td>
                    <td><?=$stnkb->total_pajak?></td>
                  </tr>
                <?php endforeach ?>
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