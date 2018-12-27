var url = 'http://'+location.hostname+'/pantauair/';
$(function () {
      var kec = $("#kec"),
      kecamatan = $("#namaKec");
      kec.change(function() {
        var xa = kec.val();
        var ax = $("#kec option:selected").text();
        kec.val(xa);
        $.ajax({
          url: url+'/cp/ekspor_data/filterkec/',
          data: {idkec: kec.val()},
          type: 'POST',
          success:function (dt) {
          //console.log(dt);
            $("#aset_lama").hide();
            $("#aset_baru").html(dt);
            $("#aset_baru").show();
            var urlbaru = url+'/cp/toExcelAll/ekspor/'+xa+'/'+ax;
            $("#btnEkspor").html('<a class="btn btn-danger" style="margin-top:23px;width:100%;" href="'+urlbaru+'"><i class="glyphicon glyphicon-download-alt"></i>Ekspor Data</a>');
            //btn.show();
          }
        })
      });
});
$(function () {
      var wal = $("#wal"),
      walikota = $("#namaWal");
      wal.change(function() {
        var xa = wal.val();
        var ax = $("#wal option:selected").text();
        wal.val(xa);
        $.ajax({
          url: url+'/cp/ekspor_data/filterwal/',
          data: {idwal: wal.val()},
          type: 'POST',
          success:function (dt) {
          //console.log(dt);
            getKecBaru(xa,ax);
            $("#aset_lama").hide();
            $("#aset_baru").html(dt);
            $("#aset_baru").show();
            var urlbaru = url+'/cp/toExcelAll/ekspors/'+xa+'/'+ax;
            $("#btnEkspor").html('<a class="btn btn-danger" style="margin-top:23px;width:100%;" href="'+urlbaru+'"><i class="glyphicon glyphicon-download-alt"></i>Ekspor Data</a>');
            //btn.show();
          }
        })
      });
});
function getKota() {
  $.ajax({
    url: url+'/cb/jsonWal/',
    type: 'get',
    dataType: 'html',
    data: {id: $('#kota').val()},
  })
  .done(function(x) {
    $('#kec').html(x);
  })
  .fail(function() {
    console.log("error");
  })
  
}
function getKotaBaru() {
  $.ajax({
    url: url+'/cb/jsonWal/',
    type: 'get',
    dataType: 'html',
    data: {id: $('#kota_t').val()},
  })
  .done(function(x) {
    $('#kec_t').html(x);
  })
  .fail(function() {
    console.log("error");
  })
  
}
function getKecBaru(id,nama) {
  $.ajax({
    url: url+'/cb/jsonWal/',
    type: 'get',
    dataType: 'html',
    data: {id: id,nama:nama},
  })
  .done(function(x) {
    $('#kec').html(x);
  })
  .fail(function() {
    console.log("error");
  })
 }
function getKec_t() {
  $.ajax({
    url: url+'/cb/jsonKec/',
    type: 'get',
    dataType: 'html',
    data: {id: $('#kec_t').val()},
  })
  .done(function(x) {
    $('#kel_t').html(x);
  })
  .fail(function() {
    console.log("error");
  })
  
}
function getKec() {
  $.ajax({
    url: url+'/cb/jsonKec/',
    type: 'get',
    dataType: 'html',
    data: {id: $('#kec').val()},
  })
  .done(function(x) {
    $('#kel').html(x);
  })
  .fail(function() {
    console.log("error");
  })
  
}
function getKecNew() {
  $.ajax({
    url: url+'/cb/jsonKec/',
    type: 'get',
    dataType: 'html',
    data: {id: $('#keparat').val()},
  })
  .done(function(x) {
    $('#kelurahan').html(x);
  })
  .fail(function() {
    console.log("error");
  })
  
}
var clicks = 0;

function add_form() {    
    $.ajax({
        url: '../../dll/tambah_f',
        type: 'POST',
        dataType: 'html',
        data: {nilai: clicks += 1},
    })
    .done(function(data) {
        $('.hasil').html(data);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
}

function hapus_form(a) {    
    $.ajax({
        url: '../../dll/hapus_f',
        type: 'GET',
        data: {no: a},
    })
    .done(function(data) {
        $('.hasil').html(data);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
}

function simpan_form(a) {    
    $.ajax({
        url: '../../dll/update_f',
        type: 'GET',
        data: {i: a,'jenis' : $('#jps'+a+' option:selected').val(),'lainnya' : $('#lainnya'+a).val(),'nomor':$('#nomor'+a).val(),'tgl' : $('#tgl'+a).val(),'peng' : $('#pengi'+a).val()},
    })
    .done(function(data) {
        $('.hasil').html(data);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        alert('Berhasil disimpan');
    });
}