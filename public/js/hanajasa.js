
$( function() {
	$( "#datepicker" ).datepicker();
} );
// START PERPANJANG
function perpanjang() {
	if ($('#perpanjang_p').val() == 'normal') {
		$('#pkb_tahun').hide();
		$('#pkb_n').show();
		$('#pkb_bulan').hide();
		$('#cek_plat').hide();
		$('#gantiplat').hide();
		$('#total').show();
		// $('.ganti-plat :select').val('');
	}else if($('#perpanjang_p').val() == 'telat bulanan') { 
		$('#pkb_tahun').hide();
		$('#pkb_n').hide();
		$('#pkb_bulan').show();
		$('#cek_plat').hide();
		$('#gantiplat').hide();	
		$('#total_b').show();	
		// $('.ganti-plat :select').val('');
	}else if($('#perpanjang_p').val() == 'Telat lebih dari setahun') { 
		$('#pkb_tahun').show();
		$('#pkb_n').show();
		$('#pkb_bulan').show();
		$('#cek_plat').show();
		$('#total').hide();
		$('#total_b').hide();
		$('#gantiplat_nor').click(function () {
			$('.ganti-plat').fadeToggle();
		});
	}else{
		$('#pkb_tahun').hide();
		$('#pkb_n').hide();
		$('#pkb_bulan').hide();
		$('#cek_plat').hide();
		$('#total').hide();
		$('#total_b').hide();
		$('#pkb_tahun :input').val('');
		$('#pkb_n :input').val('');
		$('#pkb_bulan :input').val('');
		$('#cek_plat :input').val('');
		// $('#gantiplat_n').click(function () {
		// 	$('.ganti-plat-n').fadeToggle();
		// });
	}
}

function mutasi() {
	if ($('#mutasi_stnk').val() == 'Pajak Hidup') {
		$('#m_h').show();
		$('#m_b').hide();
		$('#m_t').hide();
	}else if($('#mutasi_stnk').val() == 'Telat bulanan') { 
		$('#m_h').hide();
		$('#m_b').show();
		$('#m_t').hide();
	}else if($('#mutasi_stnk').val() == 'Pajak Telat Lebih dari 1 Tahun') { 
		$('#m_h').hide();
		$('#m_b').hide();
		$('#m_t').show();
	}else{
		$('#m_h').hide();
		$('#m_h :input').val('');
		$('#m_b').hide();
		$('#m_b :input').val('');
		$('#m_t').hide();
		$('#m_t :input').val('');
	}
}
function hargaTotal() {
	var txt4 = document.getElementById('txt4').value;
	var swd2 = document.getElementById('swdkllj_b').value;
	var txtrp = document.getElementById('rupiah2').value;
	var jwb = parseFloat(txt4) + parseFloat(swd2) + parseInt(txtrp);
	if (!isNaN(jwb)) {
		document.getElementById('total_harga').value = "Rp. " + jwb;
	}
}
function normal() {
	var txtFirstNumberValue = document.getElementById('pkb_nor').value;
	var txtSecondNumberValue = document.getElementById('swdkllj').value;
	var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
	if (!isNaN(result)) {
		document.getElementById('total_harga').value =  result;
	}
}

function sum_t() {
	var pkbt = document.getElementById('pkb_t').value;
	var dendat = document.getElementById('denda').value;
	var ttelat = document.getElementById('telat_thn').value;
	var result = parseFloat(pkbt) * parseFloat(dendat) * parseFloat(ttelat);
	if (!isNaN(result)) {
		document.getElementById('hasil').value = result;
	}
}
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
function pkb_ta() {
	var txtFirstNumberValue = document.getElementById('pkb_tahun').value;
	var txtSecondNumberValue = document.getElementById('denda_tahun_h').value;
	var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
	if (!isNaN(result)) {
		document.getElementById('total_bbn_t').value = result;
	}

	var txtFirstNumberValue = document.getElementById('pkb_tahun').value;
	var txtSecondNumberValue = document.getElementById('denda_tahun').value;
	var txtThreeNumberValue = document.getElementById('t_tahun').value;
	var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue) * parseFloat(txtThreeNumberValue);
	if (!isNaN(result)) {
		document.getElementById('sum_pkb').value = result;
	}
}
function harga_tahun() {
	var txtFirstNumberValue = document.getElementById('hasil').value;
	var txtSecondNumberValue = document.getElementById('swdkllj_t').value;
	var txtThreeNumberValue = document.getElementById('rupiah').value;
	var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue) + parseInt(txtThreeNumberValue);
	if (!isNaN(result)) {
		document.getElementById('total_harga').value = "Rp. " + result;
	}
}
var url = 'http://'+location.hostname+'/hannajasa';

function ambilSwdk() {
	$.ajax({
		url: url+'/main/ambilswdkjl/',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#ambiltahun").val()},
		success:function(datanya) {
			$(".swdklksama").val(datanya[0].harga);
			$(".sankswd").val(datanya[3].harga);
			$(".admstnk").val(datanya[1].harga);
			$(".admtnkb").val(datanya[2].harga);
			console.log(datanya);
		}
	})	
}

function ambilselecttelat() {
	$.ajax({
		url: url+'/main/ambilswdkjl/',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_telat").val()},
		success:function(datanya) {
			// $(".swdklksama").val(datanya[0].harga);
			$(".sankswd_t").val(datanya[1].harga);
			// $(".admstnk").val(datanya[2].harga);
			// $(".admtnkb").val(datanya[3].harga);
		}
	})
	
}

function ambilselect() {
	var txtFirstNumberValue = $('#hasil').val();
	var txtSecondNumberValue = $('#swdkllj_t').val();
	var txtThreeNumberValue = $('#rupiah').val();

	$.ajax({
		url: url+'/main/ambiljenis/',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k").val()},
		success:function(datanya) {
			$("#adm_stnk").val(datanya[0].harga);
			$("#adm_tnkb").val(datanya[1].harga);
			var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue) + parseInt(txtThreeNumberValue) + parseFloat(datanya[0].harga) + parseInt(datanya[1].harga);
			if (!isNaN(result)) {
				$("#total_harga").val("Rp. "+result)
			}
		}
	})
}
function ambilselectbul() {
	$.ajax({
		url: url+'/main/ambiljenis/',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_ken").val()},
		success:function(datanya) {
			$("#adm_stnk_b").val(datanya[0].harga);
			$("#adm_tnkb_b").val(datanya[1].harga);
		}
	})
}
function ambilselectta() {
	$.ajax({
		url: url+'/main/ambiljenis/',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_kendaraan").val()},
		success:function(datanya) {
			$("#adm_stnk_t").val(datanya[0].harga);
			$("#adm_tnkb_t").val(datanya[1].harga);
		}
	})
}

// END PERPANJANG 

// START BALIK NAMA
function b_normal() {
	var txtFirstNumberValue = document.getElementById('pkb_b').value;
	var txtSecondNumberValue = document.getElementById('denda_b').value;
	var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
	if (!isNaN(result)) {
		document.getElementById('total_bn').value = result;
	}
}

function b_bulan() {
	var txtFirstNumberValue = document.getElementById('pkb_bu').value;
	var txtSecondNumberValue = document.getElementById('denda_bu').value;
	var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
	if (!isNaN(result)) {
		document.getElementById('total_bbn_b').value = result;
	}

	var txtFirstNumberValue = document.getElementById('pkb_bu').value;
	var txtSecondNumberValue = document.getElementById('denda_ba').value;
	var txtThreeNumberValue = document.getElementById('telat_bln').value;
	var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue) * parseFloat(txtThreeNumberValue);
	if (!isNaN(result)) {
		document.getElementById('total_ba').value = result;
	}
}

function b_hidup() {
	var txtFirstNumberValue = document.getElementById('pkb_b_h').value;
	var txtSecondNumberValue = document.getElementById('denda_bbn_h').value;
	var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
	if (!isNaN(result)) {
		document.getElementById('total_bbn_h').value = result;
	}
}
function b_tahun() {
	var tltthn = document.getElementById('telat_thn').value;
	var tltbln = document.getElementById('telat_bln').value;
	var result = parseFloat(tltthn) + parseFloat(tltbln);
	if (!isNaN(result)) {
		document.getElementById('total_pkb_t').value = result;
	}

	var txtThreeNumberValue = document.getElementById('total_pkb_t').value;
	var txtFirstNumberValue = document.getElementById('pkb_b_t').value;
	var txtSecondNumberValue = document.getElementById('denda_b_t').value;
	var result = parseFloat(txtFirstNumberValue) * parseFloat(txtThreeNumberValue) * parseFloat(txtSecondNumberValue);
	if (!isNaN(result)) {
		document.getElementById('total_pkb_t').value = result;
	}	
}
function balik() {
	if ($('#balik_nama').val() == 'Pajak Hidup') {
		$('#b_hid').show();
		$('#b_nor').hide();
		$('#b_bul').hide();
		$('#b_ta').hide();
	}else if ($('#balik_nama').val() == 'Pajak Normal') {
		$('#b_hid').hide();
		$('#b_nor').show();
		$('#b_bul').hide();
		$('#b_ta').hide();
		$('#total_n').show();
	}else if($('#balik_nama').val() == 'Telat bulanan') { 
		$('#b_hid').hide();
		$('#b_nor').hide();
		$('#b_bul').show();
		$('#total_b').show();
	}else if($('#balik_nama').val() == 'Pajak Telat Lebih dari 1 Tahun') { 
		$('#b_hid').hide();
		$('#b_nor').show();
		$('#b_bul').show();
		$('#b_ta').show();
		$('#total_h').hide();
		$('#total_n').hide();
		$('#total_b').hide();
		$('#total_t').show();
	}else if($('#balik_nama').val() == 'Pajak Lebih Dari Setahun') {
		$('#b_hid').hide();
		$('#b_nor').hide();
		$('#b_bul').hide();
		$('#b_ta').show();
	}else{
		$('#total_h').hide();
		$('#total_h :input').val('');
		$('#total_n').hide();
		$('#total_n :input').val('');
		$('#total_b').hide();
		$('#total_b :input').val('');
		$('#total_t').hide();
		$('#total_t :input').val('');
		$('#b_hid').hide();
		$('#b_hid :input').val('');
		$('#b_nor').hide();
		$('#b_nor :input').val('');
		$('#b_bul').hide();
		$('#b_bul :input').val('');
		$('#b_ta').hide();
		$('#b_ta :input').val('');
	}
}
$(document).ready(function () {
	$('#gantiplat_nor').change(function () {
		if (!this.checked) {
			$('#admtnkb_n').fadeOut('fast');
		}else{ 
			$('#admtnkb_n').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#gantiplat_bul').change(function () {
		if (!this.checked) {
			$('#admtnkb_b').fadeOut('fast');
		}else{ 
			$('#admtnkb_b').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#gantiplat_ta').change(function () {
		if (!this.checked) {
			$('#admtnkb_t').fadeOut('fast');
		}else{ 
			$('#admtnkb_t').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#telat').change(function () {
		if (!this.checked) {
			$('#row_telat').fadeOut('fast');
		}else{ 
			$('#row_telat').fadeIn('fast');
		}	
	});
});
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
$(document).ready(function() {
	var num = $('div.number').text()
	num = addPeriod(num);
	$('div.number').text('Rp. '+num)
});

function addPeriod(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + '.' + '$2');
	}
	return x1 + x2;
}
jQuery(window).load(function () {
	jQuery('#loader').fadeOut('slow');
});
function ganti() {
	$.ajax({
		url: url+'/main/ambilselect/',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#get_select").val()},
		success:function(datanya) {
			if(datanya.data.length>0){
				var bisa = loopData(datanya.data, $("#get_select").val());
				$("#berkasjadi").dataTable().fnClearTable();
				$("#berkasjadi").dataTable().fnAddData(bisa);
				$("#berkasjadi").dataTable().fnDraw();
			}else{
				$("#berkasjadi").dataTable().fnClearTable();
				$("#berkasjadi").dataTable().fnDraw();
			}

			$.each(datanya.data, function(index, element) {
				if ($("#get_select").val() == 'bn') {
					$("#modalnya").html('<div id="balik'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box"> <i class="material-icons">check</i> </div> <h4 class="modal-title">Yakin ingin melanjutkan?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di lanjutkan, anda akan beralih ke halaman input berkas jadi.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="input_berkas/balik_nama/'+element.id_cetak+'"><button class="btn btn-success" type="button">Ya, lanjutkan</button></a> </div> </div> </div> </div> <div id="deletebalik'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box"> <i class="material-icons">check</i> </div> <h4 class="modal-title">Yakin ingin Delete?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di delete data akan terhapus dan tidak bisa di kembalikan.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="delete//'+element.id_cetak+'"><button class="btn btn-danger" type="button">Ya, Hapus</button></a> </div> </div> </div> </div>'); 
				}else if ($("#get_select").val() == 'mutasi') {
					$("#modalnya").html('<div id="apmutasi'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box"> <i class="material-icons">check</i> </div> <h4 class="modal-title">Yakin ingin melanjutkan?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di lanjutkan, anda akan beralih ke halaman input berkas jadi.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="input_berkas/mutasi/'+element.id_cetak+'"><button class="btn btn-success" type="button">Ya, lanjutkan</button></a> </div> </div> </div> </div> <div id="deletemutasi'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box"> <i class="material-icons">check</i> </div> <h4 class="modal-title">Yakin ingin Delete?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di delete data akan terhapus dan tidak bisa di kembalikan.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="delete//'+element.id_cetak+'"><button class="btn btn-danger" type="button">Ya, Hapus</button></a> </div> </div> </div> </div>'); 
					
				}else{
					$("#modalnya").html('<div id="aplainnya'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box"> <i class="material-icons">check</i> </div> <h4 class="modal-title">Yakin ingin melanjutkan?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di lanjutkan, anda akan beralih ke halaman input berkas jadi.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="input_berkas/lainnya/'+element.id_cetak+'"><button class="btn btn-success" type="button">Ya, lanjutkan</button></a> </div> </div> </div> </div> <div id="deletelain'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box"> <i class="material-icons">check</i> </div> <h4 class="modal-title">Yakin ingin Delete?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di delete data akan terhapus dan tidak bisa di kembalikan.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="delete//'+element.id_cetak+'"><button class="btn btn-danger" type="button">Ya, Hapus</button></a> </div> </div> </div> </div>'); 
					
				}
			});
}
})

}
function loopData(table,type) {
	var array_data = [],
	temp_array = [];
	$(table).each(function(key,val) {
		temp_array = [];
		var link;
		if (type == 'perpanjang') {
			temp_array = [
			val.no,
			val.perhitungan+"<span style='color: red;'>("+val.jenis+")</span>",
			val.atas_nama,
			val.no_telp,
			val.uang_dp,
			val.wilayah,
			val.nopol,
			'<a href="#approve'+val.no+'" data-toggle="modal" data-tooltip="Terima Berkas" class="btn btn-link btn-success btn-just-icon"><i class="material-icons">check</i></a><a href="#batal<?=$key->no?>" data-toggle="modal" data-tooltip="Pembatalan Berkas" class="btn btn-link btn-warning btn-just-icon"><i class="material-icons">close</i></a><a href="#delete'+val.no+'" data-toggle="modal" data-tooltip="Hapus Berkas" class="btn btn-link btn-danger btn-just-icon"><i class="material-icons">delete</i></a>'
			];
		}else if (type == 'bn') {
			temp_array = [
			val.no,
			val.perhitungan+"<span style='color: red;'>("+val.jenis+")</span>",
			val.atas_nama,
			val.no_telp,
			val.uang_dp,
			val.wilayah,
			val.nopol,
			'<a href="#balik'+val.no+'" data-toggle="modal" data-tooltip="Terima Berkas" class="btn btn-link btn-success btn-just-icon"><i class="material-icons">check</i></a><a href="#batal<?=$key->no?>" data-toggle="modal" data-tooltip="Pembatalan Berkas" class="btn btn-link btn-warning btn-just-icon"><i class="material-icons">close</i></a><a href="#deletebalik'+val.no+'" data-toggle="modal" data-tooltip="Hapus Berkas" class="btn btn-link btn-danger btn-just-icon"><i class="material-icons">delete</i></a>'
			];
		}else if (type == 'mutasi') {
			temp_array = [
			val.no,
			val.perhitungan+"<span style='color: red;'>("+val.jenis+")</span>",
			val.atas_nama,
			val.no_telp,
			val.uang_dp,
			val.wilayah,
			val.nopol,
			'<a href="#apmutasi'+val.no+'" data-toggle="modal" data-tooltip="Terima Berkas" class="btn btn-link btn-success btn-just-icon"><i class="material-icons">check</i></a><a href="#batal<?=$key->no?>" data-toggle="modal" data-tooltip="Pembatalan Berkas" class="btn btn-link btn-warning btn-just-icon"><i class="material-icons">close</i></a><a href="#deletemutasi'+val.no+'" data-toggle="modal" data-tooltip="Hapus Berkas" class="btn btn-link btn-danger btn-just-icon"><i class="material-icons">delete</i></a>'
			];
		}else{
			temp_array = [
			val.no,
			val.perhitungan+"<span style='color: red;'>("+val.jenis+")</span>",
			val.atas_nama,
			val.no_telp,
			val.uang_dp,
			val.wilayah,
			val.nopol,
			'<a href="#aplainnya'+val.no+'" data-toggle="modal" data-tooltip="Terima Berkas" class="btn btn-link btn-success btn-just-icon"><i class="material-icons">check</i></a><a href="#batal<?=$key->no?>" data-toggle="modal" data-tooltip="Pembatalan Berkas" class="btn btn-link btn-warning btn-just-icon"><i class="material-icons">close</i></a><a href="#deletelain'+val.no+'" data-toggle="modal" data-tooltip="Hapus Berkas" class="btn btn-link btn-danger btn-just-icon"><i class="material-icons">delete</i></a>'
			];
		}


		array_data[array_data.length] = temp_array;
	});
	return array_data;
}
function print() {
	var objFra = document.getElementById('pirnt_p');
	objFra.focus();
	objFra.print();
}
function print_p() {
	$("#typenya").removeAttr('disabled');
	$("#inputData").submit(function (event) {

		event.preventDefault();
        // var formData = $(this).serialize();
        var formData = new FormData($(this)[0]);

        $.ajax({
        	url: url+'/cp/proses_pengaduan/new',
        	type: 'POST',
        	data: formData,
        	mimeType: "multipart/form-data",
        	contentType: false,
        	cache: false,
        	processData: false,
        	success: function (dt) {
        		var dt = $.parseJSON(dt);
        		setTimeout(function(){
                // alert('Form Submitted!');
                console.log(dt.success);
                if (dt.success==true) {
                	toastSuccess();
                }else{
                	toastError();
                }
                $('.modal').modal('hide');
            }, 2000);
        		toTop();
        		$("#inputData")[0].reset();
        	},
        	error: function(){
        		alert("Server sedang bermasalah silakan coba lagi");
        	}
        });
        return false;
    });
}
function print_p() {
	$.ajax({
		url: '/path/to/file',
		type: 'default GET (Other values: POST)',
		dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		data: {param1: 'value1'},
		success:function(argument) {
			
		}
	});
}
function print_p() {
	$.ajax({
		url: '/path/to/file',
		type: 'default GET (Other values: POST)',
		dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		data: {param1: 'value1'},
		success:function(argument) {
			
		}
	});
}
function print_p() {
	$.ajax({
		url: '/path/to/file',
		type: 'default GET (Other values: POST)',
		dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		data: {param1: 'value1'},
		success:function(argument) {
			
		}
	});
}