
	$( function() {
		$( "#datepicker" ).datepicker();
	} );
	function sum() {
		var txtFirstNumberValue = document.getElementById('txt1').value;
		var txtSecondNumberValue = document.getElementById('txt2').value;
		var txtThreeNumberValue = document.getElementById('txt3').value;
		var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue) * parseFloat(txtThreeNumberValue);
		if (!isNaN(result)) {
			document.getElementById('txt4').value = result;
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
	function normal() {
		var txtFirstNumberValue = document.getElementById('pkb_nor').value;
		var txtSecondNumberValue = document.getElementById('swdkllj').value;
		var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
		if (!isNaN(result)) {
			document.getElementById('total').value = result;
		}
	}
	function b_normal() {
		var txtFirstNumberValue = document.getElementById('pkb_b').value;
		var txtSecondNumberValue = document.getElementById('denda_b').value;
		var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
		if (!isNaN(result)) {
			document.getElementById('total_b').value = result;
		}
	}
	function b_bulan() {
		var txtFirstNumberValue = document.getElementById('pkb_bu').value;
		var txtSecondNumberValue = document.getElementById('denda_bu').value;
		var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
		if (!isNaN(result)) {
			document.getElementById('total_bu').value = result;
		}

		var txtFirstNumberValue = document.getElementById('pkb_bu').value;
		var txtSecondNumberValue = document.getElementById('denda_ba').value;
		var txtThreeNumberValue = document.getElementById('telat_bln').value;
		var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue) * parseFloat(txtThreeNumberValue);
		if (!isNaN(result)) {
			document.getElementById('total_ba').value = result;
		}
	}

	function haks() {
		if ($('#hak').val() == 'normal') {
			$('#pkb_n').show();
			$('#pkb_tahun').hide();
			$('#pkb_bulan').hide();
			$('#bulan').hide();
			$('#tahun').hide();
			$('#sank_pkb').hide();
			$('#sank_pkb_tahun').hide();
			$('#swd_n').show();
			$('#swd_b').hide();
			$('#swd_t').hide();
			$('#sank_swd').hide();
			$('#sank_swd_t').hide();
			$('#total_n').show();
		}else if($('#hak').val() == 'telat bulanan') { 
			$('#pkb_n').hide();
			$('#pkb_bulan').show();
			$('#pkb_tahun').hide();
			$('#bulan').show();
			$('#tahun').hide();
			$('#sank_pkb').show();
			$('#sank_pkb_tahun').hide();
			$('#swd_n').hide();
			$('#swd_b').show();
			$('#swd_t').hide();
			$('#sank_swd').show();
			$('#sank_swd_t').hide();
			$('#total_n').show();
		}else if($('#hak').val() == 'Telat lebih dari setahun') { 
			$('#pkb_n').show();
			$('#pkb_bulan').show();
			$('#pkb_tahun').show();
			$('#bulan').show();
			$('#tahun').show();
			$('#sank_pkb').show();
			$('#sank_pkb_tahun').show();
			$('#swd_n').show();
			$('#swd_b').show();
			$('#swd_t').show();
			$('#sank_swd').show();
			$('#sank_swd_t').show();
			$('#total_n').show();
		}else{
			$('#pkb_n').hide();
			$('#pkb_bulan').hide();
			$('#pkb_tahun').hide();
			$('#bulan').hide();
			$('#tahun').hide();
			$('#sank_pkb').hide();
			$('#sank_pkb_tahun').hide();
			$('#swd_n').hide();
			$('#swd_b').hide();
			$('#swd_t').hide();
			$('#sank_swd').hide();
			$('#sank_swd_t').hide();
			$('#total_n').hide();
		}
	}

	function balik() {
		if ($('#balik_nama').val() == 'normal') {
			$('#pkb_n').show();
			$('#pkb_bulan').hide();
			$('#pkb_bulan :input').val('');
			$('#pkb_tahun').hide();
			$('#pkb_tahun :input').val('');
		}else if($('#balik_nama').val() == 'telat bulanan') { 
			$('#pkb_n').hide();
			$('#pkb_n :input').val('');
			$('#pkb_tahun').hide();
			$('#pkb_tahun :input').val('');
			$('#pkb_bulan').show();
		}else if($('#balik_nama').val() == 'Telat lebih dari setahun') { 
			$('#pkb_n').hide();
			$('#pkb_n :input').val('');
			$('#pkb_tahun').show();
			$('#pkb_bulan').hide();
			$('#pkb_bulan :input').val('');
		}else{
			$('#pkb_n').hide();
			$('#adm_n').hide();
			$('#pkb_tahun').hide();
			$('#bulan').hide();
			$('#tahun').hide();
			$('#sank_pkb').hide();
			$('#sank_pkb_tahun').hide();
			$('#swd_n').hide();
			$('#sank_swd').hide();
			$('#total_n').hide();
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

	var rupiah = document.getElementById("rupiah");
	rupiah.addEventListener("keyup", function(e) {
		rupiah.value = formatRupiah(this.value, "Rp. ");
	});

	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
		split = number_string.split(","),
		sisa = split[0].length % 3,
		rupiah = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah += separator + ribuan.join(".");
		}

		rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
		return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
	}
	//batas//
	var rupiah2 = document.getElementById("rupiah2");
	rupiah2.addEventListener("keyup", function(e) {
		rupiah2.value = formatRupiah2(this.value, "Rp. ");
	});

	function formatRupiah2(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
		split = number_string.split(","),
		sisa = split[0].length % 3,
		rupiah2 = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah2 += separator + ribuan.join(".");
		}

		rupiah2 = split[1] != undefined ? rupiah2 + "," + split[1] : rupiah2;
		return prefix == undefined ? rupiah2 : rupiah2 ? "Rp. " + rupiah2 : "";
	}
	//batas//
	var rupiah3 = document.getElementById("rupiah3");
	rupiah3.addEventListener("keyup", function(e) {
		rupiah3.value = formatRupiah3(this.value, "Rp. ");
	});

	function formatRupiah3(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
		split = number_string.split(","),
		sisa = split[0].length % 3,
		rupiah3 = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah3 += separator + ribuan.join(".");
		}

		rupiah3 = split[1] != undefined ? rupiah3 + "," + split[1] : rupiah3;
		return prefix == undefined ? rupiah3 : rupiah3 ? "Rp. " + rupiah3 : "";
	}

	var rupiah4 = document.getElementById("rupiah4");
	rupiah4.addEventListener("keyup", function(e) {
		rupiah4.value = formatRupiah4(this.value, "Rp. ");
	});

	function formatRupiah4(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
		split = number_string.split(","),
		sisa = split[0].length % 3,
		rupiah4 = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah4 += separator + ribuan.join(".");
		}

		rupiah4 = split[1] != undefined ? rupiah4 + "," + split[1] : rupiah4;
		return prefix == undefined ? rupiah4 : rupiah4 ? "Rp. " + rupiah4 : "";
	}

	var rupiah5 = document.getElementById("rupiah5");
	rupiah5.addEventListener("keyup", function(e) {
		rupiah5.value = formatRupiah5(this.value, "Rp. ");
	});

	function formatRupiah5(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
		split = number_string.split(","),
		sisa = split[0].length % 3,
		rupiah5 = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah5 += separator + ribuan.join(".");
		}

		rupiah5 = split[1] != undefined ? rupiah5 + "," + split[1] : rupiah5;
		return prefix == undefined ? rupiah5 : rupiah5 ? "Rp. " + rupiah5 : "";
	}


	jQuery(window).load(function () {
		jQuery('#loader').fadeOut('slow');
	});