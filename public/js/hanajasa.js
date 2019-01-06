
$( function() {
	$( "#datepicker" ).datepicker();
} );
// START PERPANJANG
function perpanjang() {
	if ($('#balik_nama').val() == 'normal') {
		$('#pkb_n').show();
		$('#total').show();
		$('#swdk').show();
		$('#cek_plat').hide();
		$('#pkb_bulan').hide();
		$('#pkb_tahun').hide();
		$('.ganti-plat').hide();
		$('#gantiplat').hide();
		$('#pkb_bulan :input').val('');
		$('#cek_plat :input').val('');
		$('#pkb_tahun :input').val('');
		$('.ganti-plat :input').val('');
		$('#total_harga').val('');
		$('.ganti-plat :select').val('');
	}else if($('#balik_nama').val() == 'telat bulanan') { 
		$('#pkb_bulan').show();
		$('#total').show();
		$('#swdk').show();
		$('#pkb_n').hide();
		$('.ganti-plat').hide();
		$('#gantiplat').hide();
		$('#cek_plat').hide();
		$('#pkb_n :input').val('');
		$('#cek_plat :input').val('');
		$('#pkb_tahun').hide();
		$('#pkb_tahun :input').val('');
		$('.ganti-plat :input').val('');
		$('#total_harga').val('');
		$('.ganti-plat :select').val('');
	}else if($('#balik_nama').val() == 'Telat lebih dari setahun') { 
		$('#cek_plat').show();
		$('#pkb_tahun').show();
		$('#swdk').show();
		$('#pkb_n').hide();
		$('.ganti-plat').hide();
		$('#pkb_bulan').hide();
		$('#pkb_n :input').val('');
		$('#pkb_bulan :input').val('');
		$('#total').show();
		$('#total_harga').val('');
		$('#gantiplat').click(function () {
			$('.ganti-plat').fadeToggle();
		});
	}
}

$(document).ready(function () {
	$('.ganti-plat').hide();
	$('#pkb_n').hide();
	$('#pkb_bulan').hide();
	$('#pkb_tahun').hide();
	$('#adm_n').hide();
	$('#bulan').hide();
	$('#tahun').hide();
	$('#sank_pkb').hide();
	$('#sank_pkb_tahun').hide();
	$('#swd_n').hide();
	$('#sank_swd').hide();
	$('#total_n').hide();
	$('#cek_plat').hide();
	$('#total').hide();
	$('#swdk').hide();

	$('#gantiplat_n').click(function () {
		$('.ganti-plat-n').fadeToggle();
	});
});
function sum() {
	var txtFirstNumberValue = document.getElementById('pkb2').value;
	var txtSecondNumberValue = document.getElementById('denda_b').value;
	var txtThreeNumberValue = document.getElementById('t_bln').value;
	var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue) * parseFloat(txtThreeNumberValue);
	if (!isNaN(result)) {
		document.getElementById('txt4').value = "Rp. " + result;
	}
}
function hargatotal() {
	var txtFirstNumberValue = document.getElementById('txt4').value;
	var txtSecondNumberValue = document.getElementById('swdkllj_b').value;
	var txtThreeNumberValue = document.getElementById('rupiah2').value;
	var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue) + parseInt(txtThreeNumberValue);
	if (!isNaN(result)) {
		document.getElementById('total_harga').value = "Rp. " + result;
	}
}
function normal() {
	var txtFirstNumberValue = document.getElementById('pkb_nor').value;
	var txtSecondNumberValue = document.getElementById('swdkllj').value;
	var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
	if (!isNaN(result)) {
		document.getElementById('total_harga').value = "Rp. " + result;
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
			$(".sankswd").val(datanya[1].harga);
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

// END PERPANJANG 

// START BALIK NAMA
function b_normal() {
	var txtFirstNumberValue = document.getElementById('pkb_b').value;
	var txtSecondNumberValue = document.getElementById('denda_b').value;
	var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
	if (!isNaN(result)) {
		document.getElementById('total_b').value = "Rp. "+ result;
	}
}

function b_bulan() {
	var txtFirstNumberValue = document.getElementById('pkb_bu').value;
	var txtSecondNumberValue = document.getElementById('denda_bu').value;
	var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
	if (!isNaN(result)) {
		document.getElementById('total_bbn_b').value = "Rp. "+ result;
	}

	var txtFirstNumberValue = document.getElementById('pkb_bu').value;
	var txtSecondNumberValue = document.getElementById('denda_bu').value;
	var txtThreeNumberValue = document.getElementById('telat_bln').value;
	var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue) * parseFloat(txtThreeNumberValue);
	if (!isNaN(result)) {
		document.getElementById('total_ba').value = "Rp. "+ result;
	}
}

function b_hidup() {
	var txtFirstNumberValue = document.getElementById('pkb_b_h').value;
	var txtSecondNumberValue = document.getElementById('denda_bbn_h').value;
	var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
	if (!isNaN(result)) {
		document.getElementById('total_bbn_h').value = "Rp. "+ result;
	}
}
function b_tahun() {
	var txtFirstNumberValue = document.getElementById('pkb_b_t').value;
	var txtSecondNumberValue = document.getElementById('denda_b_t').value;
	var txtThreeNumberValue = document.getElementById('telat_thn').value;
	var result = parseFloat(txtFirstNumberValue) * parseFloat(txtThreeNumberValue) * parseFloat(txtSecondNumberValue);
	if (!isNaN(result)) {
		document.getElementById('total_pkb_t').value = "Rp. "+ result;
	}
}
function balik() {
	if ($('#balik_nama').val() == 'Pajak Hidup') {
		$('#pkb_t').hide();
		$('#tahun').hide();
		$('#sank_pkb_t').hide();
		$('#swd_t').hide();
		$('#sank_swd_t').hide();
		$('#pkb_h').show();
		$('#total_h').show();
		$('#adm_stnk_h').show();
		$('#pkb_n').hide();
		$('#total_n').hide();
		$('#swd_n').hide();
		$('#adm_stnk_n').hide();
		$('#cek_plat_n').hide();
		$('#adm_tnkb_n').hide();
		$('#pkb_bulan').hide();
		$('#bbn_b').hide();
		$('#bulan').hide();
		$('#sank_pkb').hide();
		$('#swd').hide();
		$('#sank_swd').hide();
		$('#adm_stnk_b').hide();
		$('#cek_plat_b').hide();
		$('#adm_tnkb_b').hide();
	}else if ($('#balik_nama').val() == 'Pajak Normal') {
		$('#pkb_t').hide();
		$('#tahun').hide();
		$('#sank_pkb_t').hide();
		$('#swd_t').hide();
		$('#sank_swd_t').hide();
		$('#pkb_h').hide();
		$('#total_h').hide();
		$('#adm_stnk_h').hide();
		$('#pkb_n').show();
		$('#total_n').show();
		$('#swd_n').show();
		$('#adm_stnk_n').show();
		$('#cek_plat_n').show();
		$('#adm_tnkb_n').hide();
		$('#pkb_bulan').hide();
		$('#bbn_b').hide();
		$('#bulan').hide();
		$('#sank_pkb').hide();
		$('#swd').hide();
		$('#sank_swd').hide();
		$('#adm_stnk_b').hide();
		$('#cek_plat_b').hide();
		$('#adm_tnkb_b').hide();
	}else if($('#balik_nama').val() == 'Telat bulanan') { 
		$('#pkb_t').hide();
		$('#tahun').hide();
		$('#sank_pkb_t').hide();
		$('#swd_t').hide();
		$('#sank_swd_t').hide();
		$('#pkb_h').hide();
		$('#total_h').hide();
		$('#adm_stnk_h').hide();
		$('#pkb_n').hide();
		$('#total_n').hide();
		$('#swd_n').hide();
		$('#adm_stnk_n').hide();
		$('#cek_plat_n').hide();
		$('#adm_tnkb_n').hide();
		$('#pkb_bulan').show();
		$('#bbn_b').show();
		$('#bulan').show();
		$('#sank_pkb').show();
		$('#swd').show();
		$('#sank_swd').show();
		$('#adm_stnk_b').show();
		$('#cek_plat_b').show();
		$('#adm_tnkb_b').hide();
	}else if($('#balik_nama').val() == 'Pajak Telat Lebih dari 1 Tahun') { 
		$('#pkb_t').show();
		$('#tahun').show();
		$('#sank_pkb_t').show();
		$('#swd_t').show();
		$('#sank_swd_t').show();
		$('#pkb_h').hide();
		$('#total_h').hide();
		$('#adm_stnk_h').hide();
		$('#pkb_n').show();
		$('#total_n').show();
		$('#swd_n').show();
		$('#adm_stnk_n').show();
		$('#cek_plat_n').show();
		$('#adm_tnkb_n').hide();
		$('#pkb_bulan').show();
		$('#bbn_b').hide();
		$('#bulan').show();
		$('#sank_pkb').show();
		$('#swd').show();
		$('#sank_swd').show();
		$('#adm_stnk_b').show();
		$('#cek_plat_b').show();
		$('#adm_tnkb_b').hide();
	}else{
		$('#pkb_t').hide();
		$('#tahun').hide();
		$('#sank_pkb_t').hide();
		$('#swd_t').hide();
		$('#sank_swd_t').hide();
		$('#pkb_h').hide();
		$('#total_h').hide();
		$('#adm_stnk_h').hide();
		$('#pkb_n').hide();
		$('#total_n').hide();
		$('#swd_n').hide();
		$('#adm_stnk_n').hide();
		$('#cek_plat_n').hide();
		$('#adm_tnkb_n').hide();
		$('#pkb_bulan').hide();
		$('#bbn_b').hide();
		$('#bulan').hide();
		$('#sank_pkb').hide();
		$('#swd').hide();
		$('#sank_swd').hide();
		$('#adm_stnk_b').hide();
		$('#cek_plat_b').hide();
		$('#adm_tnkb_b').hide();
	}
}
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

// var rupiah2 = document.getElementById("rupiah2");
// rupiah2.addEventListener("keyup", function(e) {
	
// });

// function formatRupiah(angka, prefix) {
// 	var number_string = angka.replace(/[^,\d]/g, "").toString(),
// 	split = number_string.split(","),
// 	sisa = split[0].length % 3,
// 	rupiah = split[0].substr(0, sisa),
// 	ribuan = split[0].substr(sisa).match(/\d{3}/gi);

// 	if (ribuan) {
// 		separator = sisa ? "." : "";
// 		rupiah += separator + ribuan.join(".");
// 	}

// 	rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
// 	return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
// }
	// var rupiah3 = document.getElementById("rupiah3");
	// rupiah3.addEventListener("keyup", function(e) {
	// 	rupiah3.value = formatRupiah3(this.value, "Rp. ");
	// });

	// function formatRupiah3(angka, prefix) {
	// 	var number_string = angka.replace(/[^,\d]/g, "").toString(),
	// 	split = number_string.split(","),
	// 	sisa = split[0].length % 3,
	// 	rupiah3 = split[0].substr(0, sisa),
	// 	ribuan = split[0].substr(sisa).match(/\d{3}/gi);

	// 	if (ribuan) {
	// 		separator = sisa ? "." : "";
	// 		rupiah3 += separator + ribuan.join(".");
	// 	}

	// 	rupiah3 = split[1] != undefined ? rupiah3 + "," + split[1] : rupiah3;
	// 	return prefix == undefined ? rupiah3 : rupiah3 ? "Rp. " + rupiah3 : "";
	// }

	// var rupiah4 = document.getElementById("rupiah4");
	// rupiah4.addEventListener("keyup", function(e) {
	// 	rupiah4.value = formatRupiah4(this.value, "Rp. ");
	// });

	// function formatRupiah4(angka, prefix) {
	// 	var number_string = angka.replace(/[^,\d]/g, "").toString(),
	// 	split = number_string.split(","),
	// 	sisa = split[0].length % 3,
	// 	rupiah4 = split[0].substr(0, sisa),
	// 	ribuan = split[0].substr(sisa).match(/\d{3}/gi);

	// 	if (ribuan) {
	// 		separator = sisa ? "." : "";
	// 		rupiah4 += separator + ribuan.join(".");
	// 	}

	// 	rupiah4 = split[1] != undefined ? rupiah4 + "," + split[1] : rupiah4;
	// 	return prefix == undefined ? rupiah4 : rupiah4 ? "Rp. " + rupiah4 : "";
	// }

	// var rupiah5 = document.getElementById("rupiah5");
	// rupiah5.addEventListener("keyup", function(e) {
	// 	rupiah5.value = formatRupiah5(this.value, "Rp. ");
	// });

	// function formatRupiah5(angka, prefix) {
	// 	var number_string = angka.replace(/[^,\d]/g, "").toString(),
	// 	split = number_string.split(","),
	// 	sisa = split[0].length % 3,
	// 	rupiah5 = split[0].substr(0, sisa),
	// 	ribuan = split[0].substr(sisa).match(/\d{3}/gi);

	// 	if (ribuan) {
	// 		separator = sisa ? "." : "";
	// 		rupiah5 += separator + ribuan.join(".");
	// 	}

	// 	rupiah5 = split[1] != undefined ? rupiah5 + "," + split[1] : rupiah5;
	// 	return prefix == undefined ? rupiah5 : rupiah5 ? "Rp. " + rupiah5 : "";
	// }
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