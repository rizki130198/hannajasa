
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
		$('#total_p_n').show();
		$('#jasa_n').show();
		// $('.ganti-plat :select').val('');
	}else if($('#perpanjang_p').val() == 'telat bulanan') { 
		$('#pkb_tahun').hide();
		$('#pkb_n').hide();
		$('#pkb_bulan').show();
		$('#cek_plat').hide();
		$('#gantiplat').hide();	
		$('#total_b').show();	
		$('#total_p_b').show();
		$('#jasa_b').show();
		// $('.ganti-plat :select').val('');
	}else if($('#perpanjang_p').val() == 'Telat lebih dari setahun') { 
		$('#pkb_tahun').show();
		$('#pkb_n').show();
		$('#pkb_bulan').show();
		$('#cek_plat').show();
		$('#total').hide();
		$('#total_p_n').hide();
		$('#jasa_n').hide();
		$('#total_b').hide();
		$('#total_p_b').hide();
		$('#jasa_b').hide();
		$('#gantiplat_nor').click(function () {
			$('.ganti-plat').fadeToggle();
		});
	}else{
		$('#pkb_tahun').hide();
		$('#pkb_n').hide();
		$('#pkb_bulan').hide();
		$('#cek_plat').hide();
		$('#total').hide();
		$('#total_p_n').hide();
		$('#jasa_n').hide();
		$('#total_b').hide();
		$('#total_p_b').hide();
		$('#jasa_b').hide();
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

function pkb_ta() {
	var telat = document.getElementById('telat_thn_s').value;
	var telatbln = document.getElementById('telat_bln_s').value;
	var result = parseFloat(telat) + parseFloat(telatbln);
	if (!isNaN(result)) {
		document.getElementById('hasil_stnk_tahun').value = result;
	}

	var totalbulan = document.getElementById('hasil_stnk_tahun').value;
	var pkb = document.getElementById('pkb_tahun').value;
	var denda = document.getElementById('denda').value;
	var result = parseFloat(totalbulan) * parseFloat(pkb) * parseFloat(denda);
	if (!isNaN(result)) {
		document.getElementById('hasil_stnk_tahun').value = result;
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
toastr.options = {
	"closeButton": true,
	"debug": false,
	"newestOnTop": false,
	"progressBar": true,
	"positionClass": "toast-top-center",
	"preventDuplicates": false,
	"onclick": null,
	"showDuration": "300",
	"hideDuration": "5000",
	"timeOut": "5000",
	"extendedTimeOut": "1000",
	"showEasing": "swing",
	"hideEasing": "linear",
	"showMethod": "fadeIn",
	"hideMethod": "fadeOut"
};
$(document).ready(function () {
	$("#transaksip").submit(function (event) {
		var formData = new FormData($(this)[0]);

		$.ajax({
			url: url+'/main/proses_cetak',
			type: 'POST',
			data: formData,
			contentType: false,
			cache: false,
			processData: false,
			success: function (dt) {
				var dt = $.parseJSON(dt);
				if (dt.msg=='Berhasil') {
					toastSuccess();
					window.open(url+'/main/cetak_perpanjang/'+dt.id, '_blank');
				}else if(dt.msg=='warning'){
					toastdata();
					window.open(url+'/main/cetak_perpanjang/'+dt.id, '_blank');
				}else{
					toastError();
				}
				$('#loader').modal('hide');
				$("#transaksip")[0].reset();
			},
			error: function(){
				toastserver()				}
			});
		return false;
	});
	$("#transaksibalik").submit(function (event) {
		var formData = new FormData($(this)[0]);

		$.ajax({
			url: url+'/main/p_balik',
			type: 'POST',
			data: formData,
			contentType: false,
			cache: false,
			processData: false,
			success: function (dt) {
				var dt = $.parseJSON(dt);
				if (dt.msg=='Berhasil') {
					toastSuccess();
					window.open(url+'/main/cetak_balik/'+dt.id, '_blank');
				}else if(dt.msg=='warning'){
					toastdata();
					window.open(url+'/main/cetak_balik/'+dt.id, '_blank');
				}else{
					toastError();
				}
				$('#loader').modal('hide');
				$("#transaksibalik")[0].reset();
			},
			error: function(){
				toastserver()				}
			});
		return false;
	});
	$("#transaksimutasi").submit(function (event) {
		var formData = new FormData($(this)[0]);

		$.ajax({
			url: url+'/main/p_mutasi',
			type: 'POST',
			data: formData,
			contentType: false,
			cache: false,
			processData: false,
			success: function (dt) {
				var dt = $.parseJSON(dt);
				if (dt.msg=='Berhasil') {
					toastSuccess();
					window.open(url+'/main/cetak_mutasi'+dt.id, '_blank');
				}else if(dt.msg=='warning'){
					toastdata();
					window.open(url+'/main/cetak_mutasi'+dt.id, '_blank');
				}else{
					toastError();
				}
				$('#loader').modal('hide');
				$("#transaksimutasi")[0].reset();
			},
			error: function(){
				toastserver()				}
			});
		return false;
	});
	$("#transaksimutasibn").submit(function (event) {
		var formData = new FormData($(this)[0]);

		$.ajax({
			url: url+'/main/p_mutasibalik',
			type: 'POST',
			data: formData,
			contentType: false,
			cache: false,
			processData: false,
			success: function (dt) {
				var dt = $.parseJSON(dt);
				if (dt.msg=='Berhasil') {
					toastSuccess();
					window.open(url+'/main/cetak_mutasibn/'+dt.id, '_blank');
				}else if(dt.msg=='warning'){
					toastdata();
					window.open(url+'/main/cetak_mutasibn/'+dt.id, '_blank');
				}else{
					toastError();
				}
				$('#loader').modal('hide');
				$("#transaksimutasibn")[0].reset();
			},
			error: function(){
				toastserver()				}
			});
		return false;
	});
	$("#transaksistnkh").submit(function (event) {
		var formData = new FormData($(this)[0]);

		$.ajax({
			url: url+'/main/p_stnk',
			type: 'POST',
			data: formData,
			contentType: false,
			cache: false,
			processData: false,
			success: function (dt) {
				var dt = $.parseJSON(dt);
				if (dt.msg=='Berhasil') {
					toastSuccess();
					window.open(url+'/main/cetak_stnkhilang/'+dt.id, '_blank');
				}else if(dt.msg=='warning'){
					toastdata();
					window.open(url+'/main/cetak_stnkhilang/'+dt.id, '_blank');
				}else{
					toastError();
				}
				$('#loader').modal('hide');
				$("#transaksistnkh")[0].reset();
			},
			error: function(){
				toastserver()				}
			});
		return false;
	});
	$("#transaksistnkhb").submit(function (event) {
		var formData = new FormData($(this)[0]);

		$.ajax({
			url: url+'/main/p_stnkbalik',
			type: 'POST',
			data: formData,
			contentType: false,
			cache: false,
			processData: false,
			success: function (dt) {
				var dt = $.parseJSON(dt);
				if (dt.msg=='Berhasil') {
					toastSuccess();
					window.open(url+'/main/cetak_stnkh_bn/'+dt.id, '_blank');
				}else if(dt.msg=='warning'){
					toastdata();
					window.open(url+'/main/cetak_stnkh_bn/'+dt.id, '_blank');
				}else{
					toastError();
				}
				$('#loader').modal('hide');
				$("#transaksistnkhb")[0].reset();
			},
			error: function(){
				toastserver()				}
			});
		return false;
	});
});
function toastSuccess() {

	toastr["success"]("Data berhasil disimpan","Info!");
}
function toastdata() {

	toastr["warning"]("Data sudah ada","Info!");
}
function toastError() {

	toastr["error"]("Data gagal disimpan","Error!");
}
function toastserver() {

	toastr["error"]("Data gagal disimpan, Coba Ulangi Lagi","Error!");
}

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

function ambiljasa() {
	$.ajax({
		url: url+'/main/ambiljasa/',
		type: 'POST',
		dataType:'json',
		data: {nama: $("#jenisjasa").val()},
		success:function(datanya) {
			$(".jasa").val(datanya[0].harga);
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
function ambilbpkb() {
	$.ajax({
		url: url+'/main/ambilharga/ambilbpkb',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k_bpkb").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#acc_bpkb").val(datanya[0].harga);
			}
		}
	})
}
function ambilktp() {
	$.ajax({
		url: url+'/main/ambilharga/ambilktp',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k_ktp").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#acc_ktp").val(datanya[0].harga);
			}
		}
	})
}
function ambilskp() {
	$.ajax({
		url: url+'/main/ambilharga/ambilskp',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k_skp").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#adm_skp").val(datanya[0].harga);
			}
		}
	})
}
function ambilloksus() {
	$.ajax({
		url: url+'/main/ambilharga/ambilloksus',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k_lokus").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_loksus").val(datanya[0].harga);
			}
		}
	})
}
// ENd Perpanjang
// Mutasi dan Mutasi Balik 
function ambilskpmutasi() {
	$.ajax({
		url: url+'/main/ambilharga/ambilskpmutasi',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#adm_skpselect").val(datanya[0].harga);
			}
		}
	})
}
function ambilbbnmutasi() {
	$.ajax({
		url: url+'/main/ambilharga/ambilbbnmutasi',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_kbbn").val()},
		success:function(datanya) {
			$("#jasa_balik_t").val(datanya[0].harga);
		}
	})
}
function ambilstnkmutasi() {
	$.ajax({
		url: url+'/main/ambilharga/ambilstnkmutasi',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_kstnk").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_stnk_t").val(datanya[0].harga);
			}
		}
	})
}
function ambillaporanmutasi() {
	$.ajax({
		url: url+'/main/ambilharga/ambillaporanmutasi',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k_laporan").val()},
		success:function(datanya) {
			$("#jasa_laporan_t").val(datanya[0].harga);
		}
	})
}
function ambilskpmutasi2() {
	$.ajax({
		url: url+'/main/ambilharga/ambilskpmutasi',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_ken").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#adm_skpbulan").val(datanya[0].harga);
			}
		}
	})
}
function ambilbbnmutasi2() {
	$.ajax({
		url: url+'/main/ambilharga/ambilbbnmutasi',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_kbbn2").val()},
		success:function(datanya) {
			$("#jasa_balik_b").val(datanya[0].harga);
		}
	})
}
function ambilstnkmutasi2() {
	$.ajax({
		url: url+'/main/ambilharga/ambilstnkmutasi',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_kstnk2").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_stnk_b").val(datanya[0].harga);
			}
		}
	})
}
function ambillaporanmutasi2() {
	$.ajax({
		url: url+'/main/ambilharga/ambillaporanmutasi',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k_laporan2").val()},
		success:function(datanya) {
			$("#jasa_laporan_b").val(datanya[0].harga);
		}
	})
}
function gantiplatmutasi() {
	$.ajax({
		url: url+'/main/ambiljenis/',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_plat").val()},
		success:function(datanya) {
			$("#adm_tnkb").val(datanya[1].harga);
		}
	})
}
function ambilbbnbaru() {
	$.ajax({
		url: url+'/main/ambilharga/ambillaporanmutasi',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k_bbn").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			$("#acc_bbn").val(datanya[0].harga);
		}
	})
}
function rubahalamatstnk() {
	$.ajax({
		url: url+'/main/ambilharga/rubahalamatstnk',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k_rubah").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#rubah_stnk").val(datanya[0].harga);
			}
		}
	})
}
function rubahalamatbpkb() {
	$.ajax({
		url: url+'/main/ambilharga/ambilalamat',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_r_bpkb").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#rubah_bpkbalamat").val(datanya[0].harga);
			}
		}
	})
}
/// Pembatas 
function ambilskpmutasi1() {
	$.ajax({
		url: url+'/main/ambilharga/ambilskpmutasi',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k1").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#adm_skp1").val(datanya[0].harga);
			}
		}
	})
}
function ambilbbnmutasi1() {
	$.ajax({
		url: url+'/main/ambilharga/ambilbbnmutasi',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_kbbn1").val()},
		success:function(datanya) {
			$("#jasa_balik_t1").val(datanya[0].harga);
		}
	})
}
function ambilstnkmutasi1() {
	$.ajax({
		url: url+'/main/ambilharga/ambilstnkmutasi',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_kstnk1").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_stnk_t1").val(datanya[0].harga);
			}
		}
	})
}
function ambillaporanmutasi1() {
	$.ajax({
		url: url+'/main/ambilharga/ambillaporanmutasi',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k_laporan1").val()},
		success:function(datanya) {
			$("#jasa_laporan_t1").val(datanya[0].harga);
		}
	})
}
function gantiplatmutasi1() {
	$.ajax({
		url: url+'/main/ambiljenis/',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_plat1").val()},
		success:function(datanya) {
			$("#adm_tnkb1").val(datanya[1].harga);
		}
	})
}
function ambilbbnbaru1() {
	$.ajax({
		url: url+'/main/ambilharga/ambillaporanmutasi',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k_bbn1").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			$("#acc_bbn1").val(datanya[0].harga);
		}
	})
}
function rubahalamatstnk1() {
	$.ajax({
		url: url+'/main/ambilharga/rubahalamatstnk',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k_rubah1").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#rubah_stnk1").val(datanya[0].harga);
			}
		}
	})
}
function rubahalamatbpkb1() {
	$.ajax({
		url: url+'/main/ambilharga/ambilalamat',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_r_bpkb1").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#rubah_bpkb1").val(datanya[0].harga);
			}
		}
	})
}
// END Mutasi dan mutasi balik 


// Start STNK 
function ambilskpstnkh1() {
	$.ajax({
		url: url+'/main/ambilharga/ambilskpstnk',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_skp1").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_skp1").val(datanya[0].harga);
			}
		}
	})
}
function ambilstnkhb1() {
	$.ajax({
		url: url+'/main/ambilharga/ambilstnkhb',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_stnkhb1").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			$("#jasa_stnkhb1").val(datanya[0].harga);
		}
	})
}
function ambilstnkhl1() {
	$.ajax({
		url: url+'/main/ambilharga/ambilstnkhl',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_stnkhl1").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_stnkhl1").val(datanya[0].harga);
			}
		}
	})
}
function rubahalamat1() {
	$.ajax({
		url: url+'/main/ambilharga/rubahalamat',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_r_bpkb1").val()},
		success:function(datanya) {
			$("#jasa_rbpkb1").val(datanya[0].harga);
		}
	})
}
function ambilbaliks1() {
	$.ajax({
		url: url+'/main/ambilharga/ambilbaliks',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_balikn1").val()},
		success:function(datanya) {
			$("#jasa_balikn1").val(datanya[0].harga);
		}
	})
}
function ambilplats1() {
	$.ajax({
		url: url+'/main/ambilharga/ambilplats',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_plat1").val()},
		success:function(datanya) {
			$("#adm_tnkb1").val(datanya[0].harga);
		}
	})
}
function ambilstnkhg1() {
	$.ajax({
		url: url+'/main/ambilharga/ambilstnkhg',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_stnkg1").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_stnkg1").val(datanya[0].harga);
			}
		}
	})
}
function ambilktpfcb1() {
	$.ajax({
		url: url+'/main/ambilharga/ambilktpfcb',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_ktp_f1").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_ktp_f1").val(datanya[0].harga);
			}
		}
	})
}
function ambiltktp1() {
	$.ajax({
		url: url+'/main/ambilharga/ambiltktp',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_tktp1").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_tktp1").val(datanya[0].harga);
			}
		}
	})
}
function ambiltktpfcb1() {
	$.ajax({
		url: url+'/main/ambilharga/ambiltktpfcb',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_t_ktpfc1").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_t_ktpfc1").val(datanya[0].harga);
			}
		}
	})
}
function ambillaporans1() {
	$.ajax({
		url: url+'/main/ambilharga/ambillaporans',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_laporan1").val()},
		success:function(datanya) {
			$("#laporan_hilang1").val(datanya[0].harga);
		}
	})
}
function ambilbbnsntkh1() {
	$.ajax({
		url: url+'/main/ambilharga/ambilbbnsntkh',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_bbn1").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#harga_bbn1").val(datanya[0].harga);
			}
		}
	})
}
/// Pembatas
function ambilskpstnkh2() {
	$.ajax({
		url: url+'/main/ambilharga/ambilskpstnk',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_skp2").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_skp2").val(datanya[0].harga);
			}
		}
	})
}
function ambilstnkhb2() {
	$.ajax({
		url: url+'/main/ambilharga/ambilstnkhb',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_stnkhb2").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			$("#jasa_stnkhb2").val(datanya[0].harga);
		}
	})
}
function ambilstnkhl2() {
	$.ajax({
		url: url+'/main/ambilharga/ambilstnkhl',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_stnkhl2").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_stnkhl2").val(datanya[0].harga);
			}
		}
	})
}
function rubahalamat2() {
	$.ajax({
		url: url+'/main/ambilharga/rubahalamat',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_r_bpkb2").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_rbpkb2").val(datanya[0].harga);
			}
		}
	})
}
function ambilbaliks2() {
	$.ajax({
		url: url+'/main/ambilharga/ambilbaliks',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_balikn2").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_balikn2").val(datanya[0].harga);
			}
		}
	})
}
function ambilplats2() {
	$.ajax({
		url: url+'/main/ambilharga/ambilplats',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_plat2").val()},
		success:function(datanya) {
			$("#adm_tnkb2").val(datanya[0].harga);
		}
	})
}
function ambilstnkhg2() {
	$.ajax({
		url: url+'/main/ambilharga/ambilstnkhg',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_stnkg2").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_stnkg2").val(datanya[0].harga);
			}
		}
	})
}
function ambilktpfcb2() {
	$.ajax({
		url: url+'/main/ambilharga/ambilktpfcb',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_ktp_f2").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_ktp_f2").val(datanya[0].harga);
			}
		}
	})
}
function ambiltktp2() {
	$.ajax({
		url: url+'/main/ambilharga/ambiltktp',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_tktp2").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_tktp2").val(datanya[0].harga);
			}
		}
	})
}
function ambiltktpfcb2() {
	$.ajax({
		url: url+'/main/ambilharga/ambiltktpfcb',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_t_ktpfc2").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_t_ktpfc2").val(datanya[0].harga);
			}
		}
	})
}
function ambillaporans2() {
	$.ajax({
		url: url+'/main/ambilharga/ambillaporans',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_laporan2").val()},
		success:function(datanya) {
			$("#laporan_hilang2").val(datanya[0].harga);
		}
	})
}
function ambilbbnsntkh2() {
	$.ajax({
		url: url+'/main/ambilharga/ambilbbnsntkh',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_bbn2").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#harga_bbn2").val(datanya[0].harga);
			}
		}
	})
}
function rubahalamatstnk2() {
	$.ajax({
		url: url+'/main/ambilharga/rubahalamatstnk',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_r_stnk2").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#rubah_rstnk2").val(datanya[0].harga);
			}
		}
	})
}

// Pembatas 
function ambilskpstnkh3() {
	$.ajax({
		url: url+'/main/ambilharga/ambilskpstnk',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_skp3").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_skp3").val(datanya[0].harga);
			}
		}
	})
}
function ambilstnkhb3() {
	$.ajax({
		url: url+'/main/ambilharga/ambilstnkhb',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_stnkhb3").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			$("#jasa_stnkhb3").val(datanya[0].harga);
		}
	})
}
function ambilstnkhl3() {
	$.ajax({
		url: url+'/main/ambilharga/ambilstnkhl',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_stnkhl3").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_stnkhl3").val(datanya[0].harga);
			}
		}
	})
}
function rubahalamat3() {
	$.ajax({
		url: url+'/main/ambilharga/rubahalamat',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_r_bpkb3").val()},
		success:function(datanya) {
			$("#jasa_rbpkb3").val(datanya[0].harga);
		}
	})
}
function ambilbaliks3() {
	$.ajax({
		url: url+'/main/ambilharga/ambilbaliks',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_balikn3").val()},
		success:function(datanya) {
			$("#jasa_balikn3").val(datanya[0].harga);
		}
	})
}
function ambilplats3() {
	$.ajax({
		url: url+'/main/ambilharga/ambilplats',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_plat3").val()},
		success:function(datanya) {
			$("#adm_tnkb3").val(datanya[0].harga);
		}
	})
}
function ambilstnkhg3() {
	$.ajax({
		url: url+'/main/ambilharga/ambilstnkhg',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_stnkg3").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_stnkg3").val(datanya[0].harga);
			}
		}
	})
}
function ambilktpfcb3() {
	$.ajax({
		url: url+'/main/ambilharga/ambilktpfcb',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_ktp_f3").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_ktp_f3").val(datanya[0].harga);
			}
		}
	})
}
function ambiltktp3() {
	$.ajax({
		url: url+'/main/ambilharga/ambiltktp',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_tktp3").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_tktp3").val(datanya[0].harga);
			}
		}
	})
}
function ambiltktpfcb3() {
	$.ajax({
		url: url+'/main/ambilharga/ambiltktpfcb',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_t_ktpfc3").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#jasa_t_ktpfc3").val(datanya[0].harga);
			}
		}
	})
}
function ambillaporans3() {
	$.ajax({
		url: url+'/main/ambilharga/ambillaporans',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_laporan3").val()},
		success:function(datanya) {
			$("#laporan_hilang3").val(datanya[0].harga);
		}
	})
}
function ambilbbnsntkh3() {
	$.ajax({
		url: url+'/main/ambilharga/ambilbbnsntkh',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_bbn3").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#harga_bbn3").val(datanya[0].harga);
			}
		}
	})
}
function rubahalamatstnk3() {
	$.ajax({
		url: url+'/main/ambilharga/rubahalamatstnk',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_r_stnk3").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#rubah_rstnk3").val(datanya[0].harga);
			}
		}
	})
}

// END STNK H 
// Start Balik
function ambilbbn() {
	$.ajax({
		url: url+'/main/ambilharga/ambilbbn',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k_bpkb").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#acc_bpkb").val(datanya[0].harga);
			}
		}
	})
}
function ambilstnk() {
	$.ajax({
		url: url+'/main/ambilharga/ambilstnk',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k_ktp").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#acc_ktp").val(datanya[0].harga);
			}
		}
	})
}
function ambilskpbalik() {
	$.ajax({
		url: url+'/main/ambilharga/ambilskpbalik',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k_skp").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#adm_skp").val(datanya[0].harga);
			}
		}
	})
}
function ambilalamat() {
	$.ajax({
		url: url+'/main/ambilharga/ambilalamat',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_ambil").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#alamat_ambil").val(datanya[0].harga);
			}
		}
	})
}
function ambilbbn1() {
	$.ajax({
		url: url+'/main/ambilharga/ambilbbn',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k_bpkb1").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#acc_bpkb1").val(datanya[0].harga);
				console.log(datanya);
			}
		}
	})
}
function ambilstnk1() {
	$.ajax({
		url: url+'/main/ambilharga/ambilstnk',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k_ktp1").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#acc_ktp1").val(datanya[0].harga);
			}
		}
	})
}
function ambilskpbalik1() {
	$.ajax({
		url: url+'/main/ambilharga/ambilskpbalik',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k_skp1").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#adm_skp1").val(datanya[0].harga);
			}
		}
	})
}
function ambilalamat1() {
	$.ajax({
		url: url+'/main/ambilharga/ambilalamat',
		type: 'POST',
		dataType:'json',
		data: {jenis: $("#jenis_k_lokus1").val(),wilayah: $("#wil_perpanjang").val()},
		success:function(datanya) {
			if (datanya.success==false) {
				alert('Silakan Pilih wilayah');
			}else{
				$("#loksus1").val(datanya[0].harga);
			}
		}
	})
}
// END BALIK
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
	var txtThreeNumberValue = document.getElementById('t_bln').value;
	var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue) * parseFloat(txtThreeNumberValue);
	if (!isNaN(result)) {
		document.getElementById('total_ba').value = result;
	}
}

function s_t_bulan() {
	var txtFirstNumberValue = document.getElementById('pkb_bu').value;
	var txtSecondNumberValue = document.getElementById('denda_bu').value;
	var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
	if (!isNaN(result)) {
		document.getElementById('total_bbn_b').value = result;
	}

	var txtFirstNumberValue = document.getElementById('pkb_bu').value;
	var txtSecondNumberValue = document.getElementById('denda_ba').value;
	var txtThreeNumberValue = document.getElementById('telat_bln_s').value;
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
function s_t_telat() {
	var txtFirstNumberValue = document.getElementById('pkb_t_t').value;
	var txtSecondNumberValue = document.getElementById('denda_bu').value;
	var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
	if (!isNaN(result)) {
		document.getElementById('total_bbn_t').value = result;
	}

	var txtFirstNumberValue = document.getElementById('pkb_t_t').value;
	var txtSecondNumberValue = document.getElementById('denda_tahun').value;
	var txtThreeNumberValue = document.getElementById('telat_bln_t').value;
	var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue) * parseFloat(txtThreeNumberValue);
	if (!isNaN(result)) {
		document.getElementById('sum_pkb_t').value = result;
	}
}
function balik() {
	if ($('#balik_nama').val() == 'Pajak Hidup') {
		$('#b_hid').show();
		$('#b_nor').hide();
		$('#b_bul').hide();
		$('#b_ta').hide();
		$('#total_h').show();
		$('#total_t').hide();
		$('#jasa_t').hide();
		$('#total_p_t').hide();
	}else if ($('#balik_nama').val() == 'Pajak Normal') {
		$('#b_hid').hide();
		$('#b_nor').show();
		$('#b_bul').hide();
		$('#b_ta').hide();
		$('#total_n').show();
		$('#jasa_no').show();
		$('#total_p_no').show();
		$('#total_t').hide();
		$('#jasa_t').hide();
		$('#total_p_t').hide();
	}else if($('#balik_nama').val() == 'Telat bulanan') { 
		$('#b_hid').hide();
		$('#b_nor').hide();
		$('#b_bul').show();
		$('#total_b').show();
		$('#jasa_bu').show();
		$('#total_p_bu').show();
		$('#total_t').hide();
		$('#jasa_t').hide();
		$('#total_p_t').hide();
		$('#bbn-bul').show();
	}else if($('#balik_nama').val() == 'Pajak Telat Lebih dari 1 Tahun') { 
		$('#b_hid').hide();
		$('#b_nor').show();
		$('#b_bul').show();
		$('#b_ta').show();
		$('#total_h').hide();
		$('#total_n').hide();
		$('#jasa_no').hide();
		$('#total_p_no').hide();
		$('#jasa_bu').hide();
		$('#bbn-bul').hide();
		$('#total_p_bu').hide();
		// $('#form_p')[0].reset();
		$('#total_b').hide();
		$('#total_t').show();
		$('#jasa_t').show();
		$('#total_p_t').show();
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
		$('#jasa_t').hide();
		$('#total_t').hide();
		$('#total_p_t').hide();
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
	$('#bpkb').change(function () {
		if (!this.checked) {
			$('#jasabpkb').fadeOut('fast');
		}else{ 
			$('#jasabpkb').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#bpkb2').change(function () {
		if (!this.checked) {
			$('#jasabpkb2').fadeOut('fast');
		}else{ 
			$('#jasabpkb2').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#bpkb3').change(function () {
		if (!this.checked) {
			$('#jasabpkb3').fadeOut('fast');
		}else{ 
			$('#jasabpkb3').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#ktp').change(function () {
		if (!this.checked) {
			$('#jasaktp').fadeOut('fast');
		}else{ 
			$('#jasaktp').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#skp').change(function () {
		if (!this.checked) {
			$('#jasaskp').fadeOut('fast');
		}else{ 
			$('#jasaskp').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#loksus').change(function () {
		if (!this.checked) {
			$('#jasaloksus').fadeOut('fast');
		}else{ 
			$('#jasaloksus').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#bbn').change(function () {
		if (!this.checked) {
			$('#jasabbn').fadeOut('fast');
		}else{ 
			$('#jasabbn').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#rubstnk').change(function () {
		if (!this.checked) {
			$('#jasarubstnk').fadeOut('fast');
		}else{ 
			$('#jasarubstnk').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#rubala').change(function () {
		if (!this.checked) {
			$('#jasarubala').fadeOut('fast');
		}else{ 
			$('#jasarubala').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#skp_b').change(function () {
		if (!this.checked) {
			$('#jasaskp_b').fadeOut('fast');
		}else{ 
			$('#jasaskp_b').fadeIn('fast');
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
$(document).ready(function () {
	$('#adm_skp').change(function () {
		if (!this.checked) {
			$('#jasaskp').fadeOut('fast');
		}else{ 
			$('#jasaskp').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#balik_nama').change(function () {
		if (!this.checked) {
			$('#jasa_bn').fadeOut('fast');
		}else{ 
			$('#jasa_bn').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#stnk_h').change(function () {
		if (!this.checked) {
			$('#jasa_stnkh').fadeOut('fast');
		}else{ 
			$('#jasa_stnkh').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#laporan_h').change(function () {
		if (!this.checked) {
			$('#jasa_laporh').fadeOut('fast');
		}else{ 
			$('#jasa_laporh').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#bbn').change(function () {
		if (!this.checked) {
			$('#jasa_bbn').fadeOut('fast');
		}else{ 
			$('#jasa_bbn').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#rubala').change(function () {
		if (!this.checked) {
			$('#jasa_rubahstnk').fadeOut('fast');
		}else{ 
			$('#jasa_rubahstnk').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#stnk_gantung').change(function () {
		if (!this.checked) {
			$('#jasa_stnkgantung').fadeOut('fast');
		}else{ 
			$('#jasa_stnkgantung').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#ktp_bpkb').change(function () {
		if (!this.checked) {
			$('#jasa_ktpbpkb').fadeOut('fast');
		}else{ 
			$('#jasa_ktpbpkb').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#ktp_bpkb2').change(function () {
		if (!this.checked) {
			$('#jasa_ktpbpkb2').fadeOut('fast');
		}else{ 
			$('#jasa_ktpbpkb2').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#rubah_bpkb').change(function () {
		if (!this.checked) {
			$('#jasa_rubahal').fadeOut('fast');
		}else{ 
			$('#jasa_rubahal').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#adm_skp2').change(function () {
		if (!this.checked) {
			$('#jasaskp2').fadeOut('fast');
		}else{ 
			$('#jasaskp2').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#adm_skp3').change(function () {
		if (!this.checked) {
			$('#jasaskp3').fadeOut('fast');
		}else{ 
			$('#jasaskp3').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#balik_nama2').change(function () {
		if (!this.checked) {
			$('#jasa_bn2').fadeOut('fast');
		}else{ 
			$('#jasa_bn2').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#balik_nama3').change(function () {
		if (!this.checked) {
			$('#jasa_bn3').fadeOut('fast');
		}else{ 
			$('#jasa_bn3').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#balik_nama4').change(function () {
		if (!this.checked) {
			$('#jasa_bn4').fadeOut('fast');
		}else{ 
			$('#jasa_bn4').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#stnk_h2').change(function () {
		if (!this.checked) {
			$('#jasa_stnkh2').fadeOut('fast');
		}else{ 
			$('#jasa_stnkh2').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#stnk_h3').change(function () {
		if (!this.checked) {
			$('#jasa_stnkh3').fadeOut('fast');
		}else{ 
			$('#jasa_stnkh3').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#laporan_h2').change(function () {
		if (!this.checked) {
			$('#jasa_laporh2').fadeOut('fast');
		}else{ 
			$('#jasa_laporh2').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#laporan_h3').change(function () {
		if (!this.checked) {
			$('#jasa_laporh3').fadeOut('fast');
		}else{ 
			$('#jasa_laporh3').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#bbn2').change(function () {
		if (!this.checked) {
			$('#jasa_bbn2').fadeOut('fast');
		}else{ 
			$('#jasa_bbn2').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#bbn3').change(function () {
		if (!this.checked) {
			$('#jasa_bbn3').fadeOut('fast');
		}else{ 
			$('#jasa_bbn3').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#bbn4').change(function () {
		if (!this.checked) {
			$('#jasa_bbn4').fadeOut('fast');
		}else{ 
			$('#jasa_bbn4').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#rubala2').change(function () {
		if (!this.checked) {
			$('#jasa_rubahstnk2').fadeOut('fast');
		}else{ 
			$('#jasa_rubahstnk2').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#rubah_bpkb2').change(function () {
		if (!this.checked) {
			$('#jasa_rubahal2').fadeOut('fast');
		}else{ 
			$('#jasa_rubahal2').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#rubah_bpkb3').change(function () {
		if (!this.checked) {
			$('#jasa_rubahal3').fadeOut('fast');
		}else{ 
			$('#jasa_rubahal3').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#tanpa_ktp').change(function () {
		if (!this.checked) {
			$('#jasa_tanktp').fadeOut('fast');
		}else{ 
			$('#jasa_tanktp').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#tanpa_ktp2').change(function () {
		if (!this.checked) {
			$('#jasa_tanktp2').fadeOut('fast');
		}else{ 
			$('#jasa_tanktp2').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#tanpa_ktp3').change(function () {
		if (!this.checked) {
			$('#jasa_tanktp3').fadeOut('fast');
		}else{ 
			$('#jasa_tanktp3').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#ktpbpkb').change(function () {
		if (!this.checked) {
			$('#jasa_ktpfc').fadeOut('fast');
		}else{ 
			$('#jasa_ktpfc').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#tanpa_ktpbpkb').change(function () {
		if (!this.checked) {
			$('#jasa_tanbpkb').fadeOut('fast');
		}else{ 
			$('#jasa_tanbpkb').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#tanpa_ktpbpkb2').change(function () {
		if (!this.checked) {
			$('#jasa_tanbpkb2').fadeOut('fast');
		}else{ 
			$('#jasa_tanbpkb2').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#tanpa_ktpbpkb3').change(function () {
		if (!this.checked) {
			$('#jasa_tanbpkb3').fadeOut('fast');
		}else{ 
			$('#jasa_tanbpkb3').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#rubah_stnkbpkb2').change(function () {
		if (!this.checked) {
			$('#jasa_stnkbpkb2').fadeOut('fast');
		}else{ 
			$('#jasa_stnkbpkb2').fadeIn('fast');
		}	
	});
});
$(document).ready(function () {
	$('#rubah_stnkbpkb3').change(function () {
		if (!this.checked) {
			$('#jasa_stnkbpkb3').fadeOut('fast');
		}else{ 
			$('#jasa_stnkbpkb3').fadeIn('fast');
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
					$("#modalnya").html('<div id="balik'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box"> <i class="material-icons">check</i> </div> <h4 class="modal-title">Yakin ingin melanjutkan?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di lanjutkan, anda akan beralih ke halaman input berkas jadi.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="input_berkas/balik_nama/'+element.id_cetak+'"><button class="btn btn-success" type="button">Ya, lanjutkan</button></a> </div> </div> </div> </div><div id="batal_bn'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box batal"> <i class="material-icons">close</i> </div> <h4 class="modal-title">Yakin ingin batalkan berkas?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di batalkan, data tidak akan di tampilkan di berkas.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="batal_berkas/balik_nama/'+element.id_cetak+'"><button class="btn btn-warning" type="button">Ya, lanjutkan</button></a> </div> </div> </div> </div><div id="deletebalik'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box"> <i class="material-icons">check</i> </div> <h4 class="modal-title">Yakin ingin Delete?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di delete data akan terhapus dan tidak bisa di kembalikan.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="delete_berkas/balik_nama/'+element.id_cetak+'"><button class="btn btn-danger" type="button">Ya, Hapus</button></a> </div> </div> </div> </div>'); 
				}else if ($("#get_select").val() == 'mutasi') {
					$("#modalnya").html('<div id="apmutasi'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box"> <i class="material-icons">check</i> </div> <h4 class="modal-title">Yakin ingin melanjutkan?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di lanjutkan, anda akan beralih ke halaman input berkas jadi.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="input_berkas/mutasi/'+element.id_cetak+'"><button class="btn btn-success" type="button">Ya, lanjutkan</button></a> </div> </div> </div> </div> <div id="batal_mutasi'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box batal"> <i class="material-icons">close</i> </div> <h4 class="modal-title">Yakin ingin batalkan berkas?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di batalkan, data tidak akan di tampilkan di berkas.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="batal_berkas/mutasi/'+element.id_cetak+'"><button class="btn btn-warning" type="button">Ya, lanjutkan</button></a> </div> </div> </div> </div><div id="deletemutasi'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box"> <i class="material-icons">check</i> </div> <h4 class="modal-title">Yakin ingin Delete?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di delete data akan terhapus dan tidak bisa di kembalikan.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="delete_berkas/mutasi/'+element.id_cetak+'"><button class="btn btn-danger" type="button">Ya, Hapus</button></a> </div> </div> </div> </div>'); 
				}else if($("#get_select").val() == 'm_bn'){
					$("#modalnya").html('<div id="mutasi_bn'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box"> <i class="material-icons">check</i> </div> <h4 class="modal-title">Yakin ingin melanjutkan?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di lanjutkan, anda akan beralih ke halaman input berkas jadi.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="input_berkas/mutasi_bn/'+element.id_cetak+'"><button class="btn btn-success" type="button">Ya, lanjutkan</button></a> </div> </div> </div> </div> <div id="batal_mbn'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box batal"> <i class="material-icons">close</i> </div> <h4 class="modal-title">Yakin ingin batalkan berkas?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di batalkan, data tidak akan di tampilkan di berkas.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="batal_berkas/mutasi_bn/'+element.id_cetak+'"><button class="btn btn-warning" type="button">Ya, lanjutkan</button></a> </div> </div> </div> </div><div id="del_mbn'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box"> <i class="material-icons">check</i> </div> <h4 class="modal-title">Yakin ingin Delete?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di delete data akan terhapus dan tidak bisa di kembalikan.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="delete_berkas/mutasi_bn/'+element.id_cetak+'"><button class="btn btn-danger" type="button">Ya, Hapus</button></a> </div> </div> </div> </div>'); 
				}else if ($("#get_select").val() == 'stnk'){
					$("#modalnya").html('<div id="sntk'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box"> <i class="material-icons">check</i> </div> <h4 class="modal-title">Yakin ingin melanjutkan?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di lanjutkan, anda akan beralih ke halaman input berkas jadi.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="input_berkas/stnk/'+element.id_cetak+'"><button class="btn btn-success" type="button">Ya, lanjutkan</button></a> </div> </div> </div> </div> <div id="batal_stnk'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box batal"> <i class="material-icons">close</i> </div> <h4 class="modal-title">Yakin ingin batalkan berkas?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di batalkan, data tidak akan di tampilkan di berkas.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="batal_berkas/stnk/'+element.id_cetak+'"><button class="btn btn-warning" type="button">Ya, lanjutkan</button></a> </div> </div> </div> </div><div id="del_stnk'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box"> <i class="material-icons">check</i> </div> <h4 class="modal-title">Yakin ingin Delete?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di delete data akan terhapus dan tidak bisa di kembalikan.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="delete_berkas/stnk/'+element.id_cetak+'"><button class="btn btn-danger" type="button">Ya, Hapus</button></a> </div> </div> </div> </div>'); 
				}else if ($("#get_select").val() == 'stnk_h'){
					$("#modalnya").html('<div id="apstnk_h'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box"> <i class="material-icons">check</i> </div> <h4 class="modal-title">Yakin ingin melanjutkan?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di lanjutkan, anda akan beralih ke halaman input berkas jadi.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="input_berkas/stnk_hb/'+element.id_cetak+'"><button class="btn btn-success" type="button">Ya, lanjutkan</button></a> </div> </div> </div> </div> <div id="batal_stnkh'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box batal"> <i class="material-icons">close</i> </div> <h4 class="modal-title">Yakin ingin batalkan berkas?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di batalkan, data tidak akan di tampilkan di berkas.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="batal_berkas/stnk_hb/'+element.id_cetak+'"><button class="btn btn-warning" type="button">Ya, lanjutkan</button></a> </div> </div> </div> </div><div id="deletestnk_h'+element.no+'" class="modal fade"> <div class="modal-dialog modal-confirm"> <div class="modal-content"> <div class="modal-header"> <div class="icon-box"> <i class="material-icons">check</i> </div> <h4 class="modal-title">Yakin ingin Delete?</h4> <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a> </div> <div class="modal-body"> <p>Setelah di delete data akan terhapus dan tidak bisa di kembalikan.</p> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> <a href="delete_berkas/stnk_hb/'+element.id_cetak+'"><button class="btn btn-danger" type="button">Ya, Hapus</button></a> </div> </div> </div> </div>'); 
				}
			});
}
});

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
			val.nama,
			val.jenis_k+"<span style='color: red;'>("+val.jenis+")</span>",
			val.atas_nama,
			val.no_telp,
			val.uang_dp,
			val.wilayah,
			val.nopol,
			'<a href="#approve'+val.no+'" data-toggle="modal" data-tooltip="Terima Berkas" class="btn btn-link btn-success btn-just-icon"><i class="material-icons">check</i></a><a href="#batal'+val.no+'" data-toggle="modal" data-tooltip="Pembatalan Berkas" class="btn btn-link btn-warning btn-just-icon"><i class="material-icons">close</i></a><a href="#delete'+val.no+'" data-toggle="modal" data-tooltip="Hapus Berkas" class="btn btn-link btn-danger btn-just-icon"><i class="material-icons">delete</i></a>'
			];
		}else if (type == 'bn') {
			temp_array = [
			val.no,
			val.nama,
			val.jenis_k+"<span style='color: red;'>("+val.jenis+")</span>",
			val.atas_nama,
			val.no_telp,
			val.uang_dp,
			val.wilayah,
			val.nopol,
			'<a href="#balik'+val.no+'" data-toggle="modal" data-tooltip="Terima Berkas" class="btn btn-link btn-success btn-just-icon"><i class="material-icons">check</i></a><a href="#batal_bn'+val.no+'" data-toggle="modal" data-tooltip="Pembatalan Berkas" class="btn btn-link btn-warning btn-just-icon"><i class="material-icons">close</i></a><a href="#deletebalik'+val.no+'" data-toggle="modal" data-tooltip="Hapus Berkas" class="btn btn-link btn-danger btn-just-icon"><i class="material-icons">delete</i></a>'
			];
		}else if (type == 'mutasi') {
			temp_array = [
			val.no,
			val.nama,
			val.jenis_k+"<span style='color: red;'>("+val.jenis+")</span>",
			val.atas_nama,
			val.no_telp,
			val.uang_dp,
			val.wilayah,
			val.nopol,
			'<a href="#apmutasi'+val.no+'" data-toggle="modal" data-tooltip="Terima Berkas" class="btn btn-link btn-success btn-just-icon"><i class="material-icons">check</i></a><a href="#batal_mutasi'+val.no+'" data-toggle="modal" data-tooltip="Pembatalan Berkas" class="btn btn-link btn-warning btn-just-icon"><i class="material-icons">close</i></a><a href="#deletemutasi'+val.no+'" data-toggle="modal" data-tooltip="Hapus Berkas" class="btn btn-link btn-danger btn-just-icon"><i class="material-icons">delete</i></a>'
			];
		}else if (type == 'm_bn') {
			temp_array = [
			val.no,
			val.nama,
			val.jenis_k+"<span style='color: red;'>("+val.jenis+")</span>",
			val.atas_nama,
			val.no_telp,
			val.uang_dp,
			val.wilayah,
			val.nopol,
			'<a href="#mutasi_bn'+val.no+'" data-toggle="modal" data-tooltip="Terima Berkas" class="btn btn-link btn-success btn-just-icon"><i class="material-icons">check</i></a><a href="#batal_mbn'+val.no+'" data-toggle="modal" data-tooltip="Pembatalan Berkas" class="btn btn-link btn-warning btn-just-icon"><i class="material-icons">close</i></a><a href="#del_mbn'+val.no+'" data-toggle="modal" data-tooltip="Hapus Berkas" class="btn btn-link btn-danger btn-just-icon"><i class="material-icons">delete</i></a>'
			];
		}else if(type == 'stnk'){
			temp_array = [
			val.no,
			val.nama,
			val.jenis_k+"<span style='color: red;'>("+val.jenis+")</span>",
			val.atas_nama,
			val.no_telp,
			val.uang_dp,
			val.wilayah,
			val.nopol,
			'<a href="#sntk'+val.no+'" data-toggle="modal" data-tooltip="Terima Berkas" class="btn btn-link btn-success btn-just-icon"><i class="material-icons">check</i></a><a href="#batal_stnk'+val.no+'" data-toggle="modal" data-tooltip="Pembatalan Berkas" class="btn btn-link btn-warning btn-just-icon"><i class="material-icons">close</i></a><a href="#del_stnk'+val.no+'" data-toggle="modal" data-tooltip="Hapus Berkas" class="btn btn-link btn-danger btn-just-icon"><i class="material-icons">delete</i></a>'
			];
		}else if(type == 'stnk_h'){
			temp_array = [
			val.no,
			val.nama,
			val.jenis_k+"<span style='color: red;'>("+val.jenis+")</span>",
			val.atas_nama,
			val.no_telp,
			val.uang_dp,
			val.wilayah,
			val.nopol,
			'<a href="#apstnk_h'+val.no+'" data-toggle="modal" data-tooltip="Terima Berkas" class="btn btn-link btn-success btn-just-icon"><i class="material-icons">check</i></a><a href="#batal_stnk'+val.no+'" data-toggle="modal" data-tooltip="Pembatalan Berkas" class="btn btn-link btn-warning btn-just-icon"><i class="material-icons">close</i></a><a href="#deletestnk_h'+val.no+'" data-toggle="modal" data-tooltip="Hapus Berkas" class="btn btn-link btn-danger btn-just-icon"><i class="material-icons">delete</i></a>'
			];
		}


		array_data[array_data.length] = temp_array;
	});
return array_data;
}
function gantiharga() {
	$.ajax({
		url: url+'/main/ambilhargajasa/',
		type: 'POST',
		dataType:'html',
		data: {jenis: $("#get_harga").val()},
		success:function(datanya) {
			$("#tbodynya").html(datanya);
		}
	})

}

function print_pp() {
	window.print();

	return true;
}