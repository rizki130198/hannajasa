<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_back extends CI_Model {
	public function proses_daf()
	{
		$v_user = $this->db->get_where('users', array('nama' => $this->input->post('nama',TRUE)))->row();
		$v_email = $this->db->get_where('users', array('email' => $this->input->post('email',TRUE)))->row();
		if (count($v_user) > 0 ) {
			$this->session->set_flashdata('gagal', 'nama yang anda masukan sudah terdaftar di website kami.');
		}else{
			if (count($v_email) > 0) {
				$this->session->set_flashdata('gagal', 'Email yang anda masukan sudah terdaftar di website kami.');
			}else{
				if ($this->input->post('password') == $this->input->post('ulang_password')) {
					$val = $this->db->insert('users', array(
						'nama' => $this->input->post('nama',TRUE),
						'email' => $this->input->post('email',TRUE),
						'username' => $this->input->post('user',TRUE),
						'password' => md5($this->input->post('password',TRUE)),
						'ulang_password' => $this->input->post('ulang_password',TRUE),
						'hak_akses' => $this->input->post('hak_akses'),
						'created_date' => date('Y-m-d H:i:s')
					));
					if ($val == TRUE) {
						$this->session->set_flashdata('sukses', 'Berhasil di daftarkan.');
						redirect('main/daftar');
					}
				}else{
					$this->session->set_flashdata('gagal', 'Password tidak sama, harap periksa kembali dengan benar.');
					redirect('main/daftar');
				}
			}
		}
	}
	// Start Harga //
	public function getSwd()
	{
		$dimana = array('jenis_harga' => 'swdkllj');
		$q = $this->db->get_where('catatan',$dimana);
		return $q->result_array();
	}
	public function getStnk()
	{
		$dimana = array('jenis_harga' => 'stnk');
		$q = $this->db->get_where('catatan',$dimana);
		return $q->result_array();
	}
	public function getTnkb()
	{
		$dimana = array('jenis_harga' => 'tnkb');
		$q = $this->db->get_where('catatan',$dimana);
		return $q->result_array();
	}
	public function getSanksi()
	{
		$dimana = array('jenis_harga' => 'sanksi');
		$q = $this->db->get_where('catatan',$dimana);
		return $q->result_array();
	}
	// End Harga //
	
	public function load_data()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('blanko');
		return $query->result_array();
	}
	function act_update_blanko()
	{
		$id = $this->input->post('id');
		$query = $this->db->update('blanko', array(
			'stok_blanko'=> $this->input->post('value'),
			'tgl_update' => date('Y-m-d')
		),array('id'=>$id));	
	}
	public function p_perpanjang()
	{
		$random = '0123456789';
		$hitungrandom = strlen($random);
		$hasilrandom = '';
		for ($i=0; $i < 15 ; $i++) { 
			$hasilrandom .= $random[rand(0,$hitungrandom - 1)];
		}
		$jenis = $this->input->post('jenis');
		$jenis_k = $this->input->post('jenis_k');
		$pkb1 = $this->input->post('pkb1');
		$pkb2 = $this->input->post('pkb2');
		$pkb3 = $this->input->post('pkb3');
		if ($pkb3 ==NULL AND $pkb2 == NULL) {
			$pkb = $pkb1;
		}else if($pkb3==NULL AND $pkb1 == NULL){
			$pkb = $pkb2;
		}else{
			$pkb = $pkb3;
		}

		$sanksi_pkb1 = $this->input->post('sanksi_pkb1');
		$sanksi_pkb2 = $this->input->post('sanksi_pkb2');
		if ($sanksi_pkb1 ==NULL) {
			$sanksi_pkb = $sanksi_pkb2;
		}else{
			$sanksi_pkb = $sanksi_pkb1;
		}

		$swdllj1 = $this->input->post('swdllj1');
		$swdllj2 = $this->input->post('swdllj2');
		$swdllj3 = $this->input->post('swdllj3');
		if ($swdllj3 ==NULL AND $swdllj2 == NULL) {
			$swdllj = $swdllj1;
		}else if($swdllj3==NULL AND $swdllj1 == NULL){
			$swdllj = $swdllj2;
		}else{
			$swdllj = $swdllj3;
		}

		$jenis_swd = $this->input->post('jenis_swd');

		$sanski_swdllj1 = $this->input->post('sanski_swdllj1');
		$sanski_swdllj2 = $this->input->post('sanski_swdllj2');
		if ($sanski_swdllj1 ==NULL) {
			$sanski_swdllj = $sanski_swdllj2;
		}else{
			$sanski_swdllj = $sanski_swdllj1;
		}
		$telat_bln= $this->input->post('telat');
		$telat_thn= $this->input->post('telat_thn');
		$swdllj = $this->input->post('swdllj1');
		$ganti = $this->input->post('ganti');
		$adm_stnk = $this->input->post('adm_stnk');
		$adm_tnkb = $this->input->post('adm_tnkb');
		$total = $this->input->post('total');
		$gabungan = date("Y-m-d");
		$day = date('D', strtotime($gabungan));
		$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
		);
		$query = $this->db->insert('perpanjang', array(
			'id_user'=>$this->session->userdata('id'),
			'no'=>$hasilrandom,
			'perhitungan'=>$jenis_swd,
			'jenis'=>$jenis,
			'jenis_k'=>$jenis_k, 
			'pkb'=>$pkb,
			'telat'=>$telat_bln,
			'telat_tahun'=>$telat_thn,
			'sanksi_pkb'=>$sanksi_pkb,
			'swdkllj'=>$swdllj,
			'sanksi_swdkllj'=>$sanski_swdllj,
			'ganti_plat'=>$ganti,
			'adm_stnk'=>$adm_stnk,
			'adm_tnkb'=>$adm_tnkb,
			'total'=>$total,
			'hari'=>$dayList[$day],
			'tanggal'=>$gabungan
		));
		if ($query==TRUE) {
			$this->session->set_flashdata('sukses', 'Berhasil Simpan data');
			$id = $this->db->insert_id();
			redirect('main/transaksi_p/'.$id);
		}else{
			$this->session->set_flashdata('gagal', 'Gagal Simpan data');
			redirect('main/perpanjang');
		}
	}
	public function proses_cetak()
	{
		$id = $this->input->post('id');
		$penerima = $this->input->post('penerima');
		$telp = $this->input->post('no_telp');
		$nama = $this->input->post('atas_nama');
		$dp = $this->input->post('dp');
		$bpkb1 = $this->input->post('bpkb1');
		$bpkb2 = $this->input->post('bpkb2');
		$bpkb3 = $this->input->post('bpkb3');
		$bpkb4 = $this->input->post('bpkb4');
		$bpkb5 = $this->input->post('bpkb5');
		$sim1 = $this->input->post('sim1');
		$sim2 = $this->input->post('sim2');
		$wilayah = $this->input->post('wilayah');
		$nopol = $this->input->post('nopol');
		$jenis_k = $this->input->post('jenis_k');
		$pajak = $this->input->post('pajak');
		$lainnya = $this->input->post('lainnya');
		$pajak_ini = $this->input->post('pajak_ini');
		$harga_ini = $this->input->post('harga_ini');
		$pajak_lalu = $this->input->post('pajak_lalu');
		$harga_lalu = $this->input->post('harga_lalu');
		$total_pajak = $this->input->post('total_pajak');
		$biaya_jasa = $this->input->post('biaya_jasa');
		$harga_jasa = $this->input->post('harga_jasa');
		$acc_bpkb = $this->input->post('acc_bpkb');
		$harga_acc = $this->input->post('harga_acc');
		$fisik = $this->input->post('fisik');
		$harga_fisik = $this->input->post('harga_fisik');
		$skp_lalu = $this->input->post('skp_lalu');
		$harga_skp = $this->input->post('harga_skp');
		$progresif = $this->input->post('progresif');
		$harga_progresif = $this->input->post('harga_progresif');
		$pajaklainnya = $this->input->post('pajaklainnya');
		$harga_lain = $this->input->post('harga_lain');
		$total = $this->input->post('total');
		$prediski = $this->input->post('prediski');
		$kurang = $this->input->post('kurang');
		$query = $this->db->insert('cetak_perpanjang', array(
			'id_user'=>$this->session->userdata('id'),
			'id_join'=>$id,
			'penerima'=>$penerima,
			'no_telp'=>$telp,
			'atas_nama'=>$nama,
			'uang_dp'=>$dp,
			'bpkb'=>$bpkb1.','.$bpkb2.','.$bpkb3.','.$bpkb4.','.$bpkb5.',',
			'sim'=>$sim1.','.$sim2,
			'wilayah'=>$wilayah,
			'nopol'=>$nopol,
			'jenis_kendaraan'=>$jenis_k,
			'tahun_pajak'=>$pajak,
			'lainnya'=>$lainnya,
			'pajak_ini'=>$pajak_ini,
			'pajak_lalu'=>$pajak_lalu,
			'harga_pajak_ini'=>$harga_ini,
			'harga_pajak_lalu'=>$harga_lalu,
			'total_pajak'=>$total_pajak,
			'biaya_jasa'=>$biaya_jasa,
			'acc_bpkb'=>$acc_bpkb,
			'plat'=>$fisik,
			'adm_skp'=>$skp_lalu,
			'progresif'=>$progresif,
			'proses_lain'=>$pajaklainnya,
			'harga_jasa'=>$harga_jasa,
			'harga_bpkb'=>$harga_acc,
			'harga_plat'=>$harga_fisik,
			'harga_blokir'=>$harga_progresif,
			'harga_lainnya'=>$harga_lain,
			'total_proses'=>$total,
			'harga_adm'=>$$harga_skp,
			'biaya_prediksi'=>$prediski,
			'biaya_kurang'=>$kurang,
			'tanggal'=>date('Y-m-d')
		));
		if ($query==TRUE) {
			redirect('main/cetak_perpanjang/'.$id);
		}else{
			$this->session->set_flashdata('gagal', 'Database Error');
			redirect('main/dashboard');
		}
	}
}

/* End of file M_back.php */
/* Location: ./application/models/M_back.php */