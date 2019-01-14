<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_back extends CI_Model {
	public function proses_daf()
	{
		$v_user = $this->db->get_where('users', array('nama' => $this->input->post('nama',TRUE)))->row();
		$v_email = $this->db->get_where('users', array('email' => $this->input->post('email',TRUE)))->row();
		if (count($v_user) > 0 ) {
			$this->session->set_flashdata('gagal', 'nama yang anda masukan sudah terdaftar di website kami.');
			redirect('main/daftar');
		}else{
			if (count($v_email) > 0) {
				$this->session->set_flashdata('gagal', 'Email yang anda masukan sudah terdaftar di website kami.');
				redirect('main/daftar');
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
						redirect('main/data_pengguna');
					}
				}else{
					$this->session->set_flashdata('gagal', 'Password tidak sama, harap periksa kembali dengan benar.');
					redirect('main/daftar');
				}
			}
		}
	}
	public function getAccountProfile()
	{
	  	$data = array ('id_users' => $this->session->userdata('id'));
	  	$query = $this->db->get_where('users',$data);
	  	return $query->result_array();
	}
	public function load_user()
	{
		$this->db->order_by('id_users', 'DESC');
		$query = $this->db->get('users');
		return $query->result_array();
	}
	public function getUser($id)
	{
		$idnya = array('id_users' => $id);
		$q = $this->db->get_where('users',$idnya);
		if ($q->num_rows() > 0) {
			$query = $q->result();
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/data_pengguna');
		}
		return $query;
	}
	public function action_edit_user()
	{
		$this->db->update('users', array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'ulang_password' => $this->input->post('password'),
			'hak_akses' => $this->input->post('hak_akses')
		), array('id_users' => $this->uri->segment(3)));
	}
	function act_update_users()
	{
		$id = $this->input->post('id_users');
		$query = $this->db->update('users', array(
			'nama'=> $this->input->post('value')
		),array('id_users'=>$id));
	}
	function actDeleteUser($id)
	{
		$this->db->where('id_users', $id);
		$this->db->delete('users');
	}
	public function load_karyawan()
	{
		$query = $this->db->query("SELECT * FROM users WHERE hak_akses='cashier' or hak_akses='orang_lapangan' ORDER BY id_users DESC");
		return $query->result_array();
	}
	public function getBerkas_p($id)
	{
		$idnya = array('id_cetak' => $id);
		$q = $this->db->get_where('cetak_perpanjang',$idnya);
		if ($q->num_rows() > 0) {
			$query = $q->result();
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/berkas_jadi');
		}
		return $query;
	}
	public function getBerkas_bn($id)
	{
		$idnya = array('id_cetak' => $id);
		$q = $this->db->get_where('cetak_balik',$idnya);
		if ($q->num_rows() > 0) {
			$query = $q->result();
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/berkas_jadi');
		}
		return $query;
	}
	public function getBerkas_m($id)
	{
		$idnya = array('id_cetak' => $id);
		$q = $this->db->get_where('cetak_mutasi',$idnya);
		if ($q->num_rows() > 0) {
			$query = $q->result();
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/berkas_jadi');
		}
		return $query;
	}
	public function getBerkas_mbn($id)
	{
		$idnya = array('id_cetak' => $id);
		$q = $this->db->get_where('cetak_mutasibn',$idnya);
		if ($q->num_rows() > 0) {
			$query = $q->result();
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/berkas_jadi');
		}
		return $query;
	}
	public function getBerkas_sh($id)
	{
		$idnya = array('id_cetak' => $id);
		$q = $this->db->get_where('cetak_stnk',$idnya);
		if ($q->num_rows() > 0) {
			$query = $q->result();
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/berkas_jadi');
		}
		return $query;
	}
	public function getBerkas_shb($id)
	{
		$idnya = array('id_cetak' => $id);
		$q = $this->db->get_where('cetak_sb',$idnya);
		if ($q->num_rows() > 0) {
			$query = $q->result();
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/berkas_jadi');
		}
		return $query;
	}
	public function backBerkas_p($id)
	{
		$idnya = array('id_cetak' => $id);
		$q = $this->db->get_where('cetak_perpanjang',$idnya);
		if ($q->num_rows() > 0) {
			$query = $this->db->update('cetak_perpanjang', array(
				'status'=>'2',
			),array(
				'id_cetak'=>$id));
			redirect('main/berkas_jadi');
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/berkas_jadi');
		}
	}
	public function backBerkas_bn($id)
	{
		$idnya = array('id_cetak' => $id);
		$q = $this->db->get_where('cetak_balik',$idnya);
		if ($q->num_rows() > 0) {
			$query = $this->db->update('cetak_balik', array(
				'status'=>'2',
			),array(
				'id_cetak'=>$id));
			redirect('main/berkas_jadi');
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/berkas_jadi');
		}
		// return $query;
	}
	public function backBerkas_m($id)
	{
		$idnya = array('id_cetak' => $id);
		$q = $this->db->get_where('cetak_mutasi',$idnya);
		if ($q->num_rows() > 0) {
			$query = $this->db->update('cetak_mutasi', array(
				'status'=>'2',
			),array(
				'id_cetak'=>$id));
			redirect('main/berkas_jadi');
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/berkas_jadi');
		}
		// return $query;
	}
	public function backBerkas_mbn($id)
	{
		$idnya = array('id_cetak' => $id);
		$q = $this->db->get_where('cetak_mutasibn',$idnya);
		if ($q->num_rows() > 0) {
			$query = $this->db->update('cetak_mutasibn', array(
				'status'=>'2',
			),array(
				'id_cetak'=>$id));
			redirect('main/berkas_jadi');
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/berkas_jadi');
		}
		// return $query;
	}
	public function backBerkas_sh($id)
	{
		$idnya = array('id_cetak' => $id);
		$q = $this->db->get_where('cetak_stnk',$idnya);
		if ($q->num_rows() > 0) {
			$query = $this->db->update('cetak_stnk', array(
				'status'=>'2',
			),array(
				'id_cetak'=>$id));
			redirect('main/berkas_jadi');
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/berkas_jadi');
		}
		// return $query;
	}
	public function backBerkas_shb($id)
	{
		$idnya = array('id_cetak' => $id);
		$q = $this->db->get_where('cetak_sb',$idnya);
		if ($q->num_rows() > 0) {
			$query = $this->db->update('cetak_sb', array(
				'status'=>'2',
			),array(
				'id_cetak'=>$id));
			redirect('main/berkas_jadi');
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/berkas_jadi');
		}
		// return $query;
	}
	public function delBerkas_p($id)
	{
		$idnya = array('id_cetak' => $id);
		$q = $this->db->get_where('cetak_perpanjang',$idnya);
		if ($q->num_rows() > 0) {
			$query = $this->db->delete('cetak_perpanjang',array('id_cetak'));
			redirect('main/berkas_jadi');
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/berkas_jadi');
		}
		// return $query;
	}
	public function delBerkas_bn($id)
	{
		$idnya = array('id_cetak' => $id);
		$q = $this->db->get_where('cetak_balik',$idnya);
		if ($q->num_rows() > 0) {
			$query = $this->db->delete('cetak_balik',array('id_cetak'));
			redirect('main/berkas_jadi');
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/berkas_jadi');
		}
		// return $query;
	}
	public function delBerkas_m($id)
	{
		$idnya = array('id_cetak' => $id);
		$q = $this->db->get_where('cetak_mutasi',$idnya);
		if ($q->num_rows() > 0) {
			$query = $this->db->delete('cetak_mutasi',array('id_cetak'));
			redirect('main/berkas_jadi');
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/berkas_jadi');
		}
		// return $query;
	}
	public function delBerkas_mbn($id)
	{
		$idnya = array('id_cetak' => $id);
		$q = $this->db->get_where('cetak_mutasibn',$idnya);
		if ($q->num_rows() > 0) {
			$query = $this->db->delete('cetak_mutasibn',array('id_cetak'));
			redirect('main/berkas_jadi');
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/berkas_jadi');
		}
		// return $query;
	}
	public function delBerkas_sh($id)
	{
		$idnya = array('id_cetak' => $id);
		$q = $this->db->get_where('cetak_stnk',$idnya);
		if ($q->num_rows() > 0) {
			$query = $this->db->delete('cetak_stnk',array('id_cetak'));
			redirect('main/berkas_jadi');
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/berkas_jadi');
		}
		// return $query;
	}
	public function delBerkas_shb($id)
	{
		$idnya = array('id_cetak' => $id);
		$q = $this->db->get_where('cetak_sb',$idnya);
		if ($q->num_rows() > 0) {
			$query = $this->db->delete('cetak_sb',array('id_cetak'));
			redirect('main/berkas_jadi');
		}else{
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
			redirect('main/berkas_jadi');
		}
		// return $query;
	}
	// Start Harga //
	public function load_harga()
	{
		$this->db->order_by('id_catat');
		$query = $this->db->get('catatan');
		return $query->result_array();
	}
	function act_update_harga()
	{
		$id = $this->input->post('id_catat');
		$query = $this->db->update('catatan', array(
			'harga'=> $this->input->post('value'),
			'created_at' => date('Y-m-d')
		),array('id_catat'=>$id));
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
		$row = $this->db->get('blanko')->row();
		if ($this->input->post('value') != $row->stok_blanko) {
			$id = $this->input->post('id');
			$query = $this->db->update('blanko', array(
				'stok_blanko'=> $this->input->post('value'),
				'tgl_update' => date('Y-m-d')
			),array('id'=>$id));
		}

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
		$jenis_k = $this->input->post('jenis_swd');
		$pkb1 = $this->input->post('pkb1');
		$pkb2 = $this->input->post('pkb2');
		$pkb3 = $this->input->post('pkb3');
		$sanksi_pkb1 = $this->input->post('sanksi_pkb1');
		$sanksi_pkb2 = $this->input->post('sanksi_pkb2');
		$swdllj1 = $this->input->post('swdllj1');
		$swdllj2 = $this->input->post('swdllj2');
		$swdllj3 = $this->input->post('swdllj3');
		$jenis_swd = $this->input->post('jenis_swd');
		$sanski_swdllj1 = $this->input->post('sanski_swdllj1');
		$sanski_swdllj2 = $this->input->post('sanski_swdllj2');
		$telat_bln= $this->input->post('telat');
		$telat_b_t= $this->input->post('telat_bulan');
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
			'pkb'=>$pkb1,
			'pkb_bulan'=>$pkb2,
			'pkb_tahun'=>$pkb3,
			'telat'=>$telat_bln,
			'telat_tahun'=>$telat_thn,
			'telat_bulan'=>$telat_b_t,
			'sanksi_pkb'=>$sanksi_pkb1,
			'sanksi_pkb_t'=>$sanksi_pkb2,
			'swdkllj'=>$swdllj1,
			'swdkllj_bulan'=>$swdllj2,
			'swdkllj_tahun'=>$swdllj3,
			'sanksi_swdkllj'=>$sanski_swdllj1,
			'sanksi_swdkllj_t'=>$sanski_swdllj2,
			'ganti_plat'=>$ganti,
			'adm_stnk'=>$adm_stnk,
			'adm_tnkb'=>$adm_tnkb,
			'total'=>filter_var($total,FILTER_SANITIZE_NUMBER_INT),
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
		$cek = $this->db->get_where('cetak_perpanjang', array('id_join'=>$this->input->post('id')))->num_rows();
		if ($cek > 0) {
			redirect('main/cetak/c_perpanjang/'.$this->input->post('id'));
		}else{
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
			$gabungan = date('Y-m-d');
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
			// 'harga_adm'=>$$harga_skp,
				'biaya_prediksi'=>$prediski,
				'biaya_kurang'=>$kurang,
				'hari'=>$dayList[$day],
				'tanggal'=>$gabungan
			));
			if ($query==TRUE) {
				$getdata =  $this->db->get_where('perpanjang', array('id_perpanjang'=>$id))->row(); 
				if ($getdata->jenis != 'normal' OR $getdata->ganti != NULL) {
					$this->db->query('UPDATE blanko SET stok_blanko = stok_blanko - 1');
				}
				redirect('main/cetak/c_perpanjang/'.$id);
			}else{
				$this->session->set_flashdata('gagal', 'Database Error');
				redirect('main/dashboard');
			}
		}
	}
	public function proses_balik()
	{
		$random = '0123456789';
		$hitungrandom = strlen($random);
		$hasilrandom = '';
		for ($i=0; $i < 15 ; $i++) { 
			$hasilrandom .= $random[rand(0,$hitungrandom - 1)];
		}

		$jenis_swd = $this->input->post('jenis_swd');
		$jenis = $this->input->post('jenis_b');
		$jenis_k = $this->input->post('jenis_k');
		$pkb1 = $this->input->post('pkb1');
		$bbnk1 = $this->input->post('bbnkb1');
		$adm_stnk1 = $this->input->post('adm_stnk1');

		$pkb2 = $this->input->post('pkb2');
		$bbnkb2 = $this->input->post('bbnkb2');
		$adm_stnk2 = $this->input->post('adm_stnk2');
		$ganti1 = $this->input->post('ganti1');
		$adm_tnkb1 = $this->input->post('adm_tnkb1');

		$pkb3 = $this->input->post('pkb3');
		$bbnkb3 = $this->input->post('bbnkb3');
		$telat_bln1 = $this->input->post('telat_bln1');
		$sanksi_pkb1 = $this->input->post('sanksi_pkb1');
		$swdllj1 = $this->input->post('swdllj1');
		$sanksi_swdllj_b1 = $this->input->post('sanksi_swdllj_b1');
		$adm_stnk3 = $this->input->post('adm_stnk3');
		$ganti2 = $this->input->post('ganti2');
		$adm_tnkb2 = $this->input->post('adm_tnkb2');

		$pkb3 = $this->input->post('pkb4');
		$telat_bln2 = $this->input->post('telat_bln2');
		$telat_thn = $this->input->post('telat_thn');
		$telat_bln_t = $this->input->post('telat_bln_t');
		$sanksi_pkb2 = $this->input->post('sanksi_pkb2');
		$swdllj2 = $this->input->post('swdllj2');
		$sanksi_swdllj_b2 = $this->input->post('sanksi_swdllj_b2');

		if ($pkb1 == NULL AND $pkb2==NULL) {
			$pkb = $pkb3;
		}else if($pkb2 == NULL AND $pkb3==NULL){
			$pkb = $pkb1;
		}else{
			$pkb = $pkb2;
		}

		if ($bbnk1 == NULL AND $bbnkb2==NULL) {
			$bbnk = $bbnkb3;
		}else if($bbnkb2 == NULL AND $bbnkb3==NULL){
			$bbnk = $bbnk1;
		}else{
			$bbnk = $bbnkb2;
		}

		if ($adm_stnk1 == NULL AND $adm_stnk2==NULL) {
			$adm_stnk = $adm_stnk3;
		}else if($adm_stnk2 == NULL AND $adm_stnk3==NULL){
			$adm_stnk = $adm_stnk1;
		}else{
			$adm_stnk = $adm_stnk2;
		}

		if ($ganti1 == NULL) {
			$ganti = $ganti2;
		}else if($ganti2 == NULL){
			$ganti = $ganti1;
		}else if($ganti1 != NULL AND $ganti2 != NULL ){
			$ganti = $ganti1;
			$ganti3 = $ganti2;
		}
		if ($adm_tnkb1 == NULL) {
			$adm_tnkb = $adm_tnkb2;
		}else{
			$adm_tnkb = $adm_tnkb1;
		}

		if ($telat_bln1 == NULL) {
			$telat = $telat_bln2;
		}else{
			$telat = $telat_bln1;
		}

		if ($telat_bln1 == NULL) {
			$sanksi_pkb = $sanksi_pkb2;
		}else{
			$sanksi_pkb = $sanksi_pkb1;
		}

		if ($swdllj1 == NULL) {
			$swdllj = $swdllj2;
		}else{
			$swdllj = $swdllj1;
		}
		if ($sanksi_swdllj_b1 == NULL) {
			$sanksi_swdkllj = $sanksi_swdllj_b2;
		}else{
			$sanksi_swdkllj = $sanksi_swdllj_b1;
		}
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
		$query = $this->db->insert('balik_nama', array(
			'id_user'=>$this->session->userdata('id'),
			'no'=>$hasilrandom,
			'perhitungan'=>$jenis_swd,
			'jenis'=>$jenis,
			'jenis_k'=>$jenis_k, 
			'pkb'=>$pkb,
			'bbnk'=>filter_var($bbnk,FILTER_SANITIZE_NUMBER_INT),
			'adm_stnk'=>filter_var($adm_stnk,FILTER_SANITIZE_NUMBER_INT),
			'ganti'=>$ganti,
			'ganti1'=>$ganti3,
			'adm_tnkb'=>$adm_tnkb,
			'telat'=>$telat,
			'telat_t_t'=>$telat_thn,
			'telat_b_t'=>$telat_bln_t,
			'sanksi_pkb'=>filter_var($sanksi_pkb,FILTER_SANITIZE_NUMBER_INT),
			'swdkllj'=>filter_var($swdllj,FILTER_SANITIZE_NUMBER_INT),
			'sanksi_swdkllj'=>filter_var($sanksi_swdkllj,FILTER_SANITIZE_NUMBER_INT),
			'hari'=>$dayList[$day],
			'tanggal'=>$gabungan
		));
		if ($query==TRUE) {
			$this->session->set_flashdata('sukses', 'Berhasil Simpan data');
			$id = $this->db->insert_id();
			redirect('main/transaksi_bn/'.$id);
		}else{
			$this->session->set_flashdata('gagal', 'Gagal Simpan data');
			redirect('main/balik_nama');
		}
	}
	public function cetak_balik()
	{
		$cek = $this->db->get_where('cetak_balik', array('id_join'=>$this->input->post('id')))->num_rows();
		if ($cek > 0) {
			//$this->session->set_flashdata('gagal', 'Data sudah di isi');
			redirect('main/cetak/c_baliknama/'.$this->input->post('id'));
		}else{
			$id = $this->input->post('id');
			$penerima = $this->input->post('penerima');
			$telp = $this->input->post('no_telp');
			$nama = $this->input->post('atas_nama');
			$dp = $this->input->post('dp');
			$bpkb1 = $this->input->post('bpkb1');
			$bpkb2 = $this->input->post('bpkb2');
			$sim1 = $this->input->post('sim1');
			$sim2 = $this->input->post('sim2');
			$wilayah = $this->input->post('wilayah');
			$nopol = $this->input->post('nopol');
			$jenis_k = $this->input->post('jenis_k');
			$pajak = $this->input->post('pajak');
			$lainnya = $this->input->post('lainnya');
			$balik = $this->input->post('balik');
			$penyesuaian = $this->input->post('penyesuaian');
			$pajak_ini = $this->input->post('pajak_ini');
			$harga_ini = $this->input->post('harga_ini');
			$pajak_lalu = $this->input->post('pajak_lalu');
			$harga_lalu = $this->input->post('harga_lalu');
			$total_pajak = $this->input->post('total_pajak');
			$biaya_bn = $this->input->post('biaya_bn');
			$harga_bn = $this->input->post('harga_bn');
			$adm_skp = $this->input->post('adm_skp');
			$harga_adm = $this->input->post('harga_adm');
			$slp = $this->input->post('slp');
			$harga_slp = $this->input->post('harga_slp');
			$fisik = $this->input->post('fisik');
			$harga_fisik = $this->input->post('harga_fisik');
			$lainnya1 = $this->input->post('lainnya1');
			$harga_lainnya = $this->input->post('harga_lainnya');
			$lainnya2 = $this->input->post('lainnya2');
			$harga_lainnya2 = $this->input->post('harga_lainnya2');
			$total = $this->input->post('total');
			$prediski = $this->input->post('prediski');
			$kurang = $this->input->post('kurang');
			$gabungan = date('Y-m-d');
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
			$query = $this->db->insert('cetak_balik', array(
				'id_user'=>$this->session->userdata('id'),
				'id_join'=>$id,
				'penerima'=>$penerima,
				'no_telp'=>$telp,
				'atas_nama'=>$nama,
				'uang_dp'=>$dp,
				'bpkb'=>$bpkb1.','.$bpkb2.',',
				'sim'=>$sim1.','.$sim2,
				'wilayah'=>$wilayah,
				'nopol'=>$nopol,
				'jenis_kendaraan'=>$jenis_k,
				'tahun_pajak'=>$pajak,
				'lainnya'=>$lainnya,
				'pengurusan'=>$balik.','.$penyesuaian,
				'pajak_ini'=>$pajak_ini,
				'pajak_lalu'=>$pajak_lalu,
				'harga_pajak_ini'=>$harga_ini,
				'harga_pajak_lalu'=>$harga_lalu,
				'total_pajak'=>$total_pajak,
				'proses_bn'=>$biaya_bn,
				'harga_bn'=>$harga_bn,
				'adm_skp'=>$adm_skp,
				'harga_adm'=>$harga_adm,
				'surat_lp'=>$slp,
				'harga_lp'=>$harga_slp,
				'plat'=>$fisik,
				'harga_plat'=>$harga_fisik,
				'p_lainnya'=>$lainnya1,
				'h_lainnya'=>$harga_lainnya,
				'proses_lain'=>$lainnya2,
				'harga_lainnya'=>$harga_lainnya2,
				'total_proses'=>$total,
				'biaya_prediksi'=>$prediski,
				'biaya_kurang'=>$kurang,
				'hari'=>$dayList[$day],
				'tanggal'=>$gabungan
			));
			if ($query==TRUE) {
				redirect('main/cetak/c_baliknama/'.$id);
			}else{
				$this->session->set_flashdata('gagal', 'Database Error');
				redirect('main/dashboard');
			}
		}
	}
	public function proses_mutasi()
	{
		$random = '0123456789';
		$hitungrandom = strlen($random);
		$hasilrandom = '';
		for ($i=0; $i < 15 ; $i++) { 
			$hasilrandom .= $random[rand(0,$hitungrandom - 1)];
		}
		$jenis = $this->input->post('jenis_b');
		$jenis_swd = $this->input->post('jenis_swd');
		
		$pkb1 = $this->input->post('pkb1');
		$swdllj1 = $this->input->post('swdllj1');
		$adm_stnk1 = $this->input->post('adm_stnk1');
		$adm_tnkb1 = $this->input->post('adm_tnkb1');
		$total_hidup = $this->input->post('total_hidup');

		$pkb2 = $this->input->post('pkb2');
		$telat_b = $this->input->post('telat');
		$sanksi_pkb1 = $this->input->post('sanksi_pkb1');
		$swdllj2 = $this->input->post('swdllj2');
		$sanksi_swdllj_b1 = $this->input->post('sanksi_swdllj_b1');
		$pkb3 = $this->input->post('pkb3');
		$swdllj3 = $this->input->post('swdllj3');
		$adm_stnk2 = $this->input->post('adm_stnk2');
		$adm_tnkb2 = $this->input->post('adm_tnkb2');
		$total_bulan = $this->input->post('total_bulan');
		
		$pkb4 = $this->input->post('pkb4');
		$telat_thn = $this->input->post('telat_thn');
		$telat2 = $this->input->post('telat2');
		$sanksi_pkb2 = $this->input->post('sanksi_pkb2');
		$swdllj4 = $this->input->post('swdllj4');
		$sanski_swdllj2 = $this->input->post('sanski_swdllj2');
		$pkb5 = $this->input->post('pkb5');
		$swdllj5 = $this->input->post('swdllj5');
		$adm_stnk3 = $this->input->post('adm_stnk3');
		$adm_tnkb3 = $this->input->post('adm_tnkb3');
		$total_su = $this->input->post('total_su');

		if ($pkb1 == NULL AND $pkb2==NULL) {
			$pkb = $pkb4;
		}else if($pkb2 == NULL AND $pkb4==NULL){
			$pkb = $pkb1;
		}else{
			$pkb = $pkb2;
		}


		if ($pkb3 == NULL) {
			$pkb_1 = $pkb5;
		}else{
			$pkb_1 = $pkb3;
		}

		if ($adm_stnk1 == NULL AND $adm_stnk2==NULL) {
			$adm_stnk = $adm_stnk3;
		}else if($adm_stnk2 == NULL AND $adm_stnk3==NULL){
			$adm_stnk = $adm_stnk1;
		}else{
			$adm_stnk = $adm_stnk2;
		}
		
		if ($adm_tnkb1 == NULL AND $adm_tnkb2==NULL) {
			$adm_tnkb = $adm_tnkb3;
		}else if($adm_tnkb2 == NULL AND $adm_tnkb3==NULL){
			$adm_tnkb = $adm_tnkb1;
		}else{
			$adm_tnkb = $adm_tnkb2;
		}

		if ($telat_b == NULL) {
			$telat = $telat2;
		}else{
			$telat = $telat_b;
		}

		if ($sanksi_pkb1 == NULL) {
			$sanksi_pkb = $sanksi_pkb2;
		}else{
			$sanksi_pkb = $sanksi_pkb1;
		}

		if ($swdllj1 == NULL AND $swdllj2 == NULL ) {
			$swdllj = $swdllj4;
		}else if($swdllj2 == NULL AND $swdllj4 == NULL ){
			$swdllj = $swdllj1;
		}else{
			$swdllj = $swdllj2;
		}

		if ($swdllj3 == NULL) {
			$swdllj_1 = $swdllj5;
		}else{
			$swdllj_1 = $swdllj3;
		}

		if ($sanksi_swdllj_b1 == NULL) {
			$sanksi_swdkllj = $sanski_swdllj2;
		}else{
			$sanksi_swdkllj = $sanksi_swdllj_b1;
		}

		if ($total_hidup == NULL AND $total_bulan==NULL) {
			$total = $total_su;
		}else if($total_su == NULL AND $total_bulan==NULL){
			$total = $total_hidup;
		}else{
			$total = $total_bulan;
		}

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
		$query = $this->db->insert('mutasi', array(
			'id_user'=>$this->session->userdata('id'),
			'no'=>$hasilrandom,
			'jenis'=>$jenis,
			'jenis_k'=>$jenis_swd, 
			'pkb'=>$pkb,
			'pkb1'=>$pkb_1,
			'swdkllj'=>$swdllj,
			'swdkllj1'=>$swdllj_1,
			'sanksi_swdkllj'=>$sanksi_swdkllj,
			'adm_stnk'=>$adm_stnk,
			'adm_tnkb'=>$adm_tnkb,
			'telat'=>$telat,
			'telat_tahun'=>$tahun_thn,
			'total'=>filter_var($total,FILTER_SANITIZE_NUMBER_INT),
			'hari'=>$dayList[$day],
			'tanggal'=>$gabungan
		));
		if ($query==TRUE) {
			$this->session->set_flashdata('sukses', 'Berhasil Simpan data');
			$id = $this->db->insert_id();
			redirect('main/transaksi_m/'.$id);
		}else{
			$this->session->set_flashdata('gagal', 'Gagal Simpan data');
			redirect('main/mutasi');
		}
	}
	public function simpanberkas()
	{
		$cek = $this->db->get_where('cetak_berkas', array('id_uri'=>$this->input->post('id')))->num_rows();
		if ($cek > 0) {
			//$this->session->set_flashdata('gagal', 'Data sudah di isi');
			redirect('main/cetak/c_berkas/'.$this->input->post('id'));
		}else{
			$gabungan = date('Y-m-d');
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
			$id = $this->input->post('id');
			$jenis = $this->input->post('type');
			$query = $this->db->insert('cetak_berkas', array(
				'id_uri'=>$this->input->post('id'),
				'jenis'=>$this->input->post('type'),
				'id_user'=>$this->session->userdata('id'),
				'nama_pemilik'=>$this->input->post('pem_bpkb'),
				'nopol'=>$this->input->post('nopol'),
				'faktur'=>$this->input->post('faktur1').','.$this->input->post('faktur2'),
				'biaya'=>$this->input->post('kurang'),
				'tgl_bpkb'=>date('y-m-d',strtotime($this->input->post('tanggal'))),
				'hari'=>$dayList[$day],
				'created_at'=>$gabungan,
			));
			if ($query==TRUE) {
				redirect('main/cetak/c_berkas/'.$id.'/'.$jenis);
			}else{
				$this->session->set_flashdata('gagal', 'Database Error');
				redirect('main/dashboard');
			}
		}
	}
	public function cetak_mutasi()
	{
		$cek = $this->db->get_where('cetak_mutasi', array('id_join'=>$this->input->post('id')))->num_rows();
		if ($cek > 0) {
			//$this->session->set_flashdata('gagal', 'Data sudah di isi');
			redirect('main/cetak/c_mutasi/'.$this->input->post('id'));
		}else{
			$id = $this->input->post('id');
			$penerima = $this->input->post('penerima');
			$telp = $this->input->post('no_telp');
			$nama = $this->input->post('atas_nama');
			$dp = $this->input->post('dp');
			$bpkb1 = $this->input->post('bpkb1');
			$bpkb2 = $this->input->post('bpkb2');
			$sim1 = $this->input->post('sim1');
			$sim2 = $this->input->post('sim2');
			$stnk1 = $this->input->post('stnk1');
			$stnk2 = $this->input->post('stnk2');
			$wilayah = $this->input->post('wilayah');
			$nopol = $this->input->post('nopol');
			$jenis_k = $this->input->post('jenis_k');
			$pajak = $this->input->post('pajak');
			$lainnya = $this->input->post('lainnya');
			$m_stnk = $this->input->post('keperluan_m');
			$m_stnk2 = $this->input->post('keperluan_ke');
			$c_berkas = $this->input->post('cabut_b');
			$c_berkas2 = $this->input->post('cabut_ke');
			$pajak_ini = $this->input->post('pajak_ini');
			$harga_ini = $this->input->post('harga_ini');
			$pajak_lalu = $this->input->post('pajak_lalu');
			$harga_lalu = $this->input->post('harga_lalu');
			$total_pajak = $this->input->post('total_pajak');

			$biaya_pm = $this->input->post('biaya_pm');
			$harga_pm = $this->input->post('harga_pm');
			$adm_skp = $this->input->post('adm_skp');
			$harga_adm = $this->input->post('harga_adm');
			$stnk_hilang = $this->input->post('stnk_hilang');
			$harga_hilang = $this->input->post('harga_hilang');
			$lainnya1 = $this->input->post('lainnya1');
			$harga_lainnya = $this->input->post('harga_lainnya');
			$lainnya2 = $this->input->post('lainnya2');
			$harga_lainnya2 = $this->input->post('harga_lainnya2');
			$total = $this->input->post('total');
			$prediski = $this->input->post('prediski');
			$kurang = $this->input->post('kurang');

			$gabungan = date('Y-m-d');
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
			$query = $this->db->insert('cetak_mutasi', array(
				'id_user'=>$this->session->userdata('id'),
				'id_join'=>$id,
				'penerima'=>$penerima,
				'no_telp'=>$telp,
				'atas_nama'=>$nama,
				'uang_dp'=>$dp,
				'bpkb'=>$bpkb1.','.$bpkb2.',',
				'sim'=>$sim1.','.$sim2,
				'stnk'=>$stnk1.','.$stnk2,
				'wilayah'=>$wilayah,
				'nopol'=>$nopol,
				'jenis_kendaraan'=>$jenis_k,
				'tahun_pajak'=>$pajak,
				'lainnya'=>$lainnya,
				'm_stnk'=>$m_stnk.','.$m_stnk2,
				'c_berkas'=>$c_berkas.','.$c_berkas2,
				'pajak_ini'=>$pajak_ini,
				'pajak_lalu'=>$pajak_lalu,
				'harga_pajak_ini'=>$harga_ini,
				'harga_pajak_lalu'=>$harga_lalu,
				'total_pajak'=>$total_pajak,
				'proses_pm'=>$biaya_pm,
				'harga_pm'=>$harga_pm,
				'adm_skp'=>$adm_skp,
				'harga_adm'=>$harga_adm,
				'stnk_hilang'=>$stnk_hilang,
				'harga_hilang'=>$harga_hilang,
				'p_lainnya'=>$lainnya1,
				'h_lainnya'=>$harga_lainnya,
				'proses_lain'=>$lainnya2,
				'harga_lainnya'=>$harga_lainnya2,
				'total_proses'=>$total,
				'biaya_prediksi'=>$prediski,
				'biaya_kurang'=>$kurang,
				'hari'=>$dayList[$day],
				'tanggal'=>$gabungan
			));
			if ($query==TRUE) {
				redirect('main/cetak/c_mutasi/'.$id);
			}else{
				$this->session->set_flashdata('gagal', 'Database Error');
				redirect('main/dashboard');
			}
		}
	}
	public function proses_stnk()
	{
		$random = '0123456789';
		$hitungrandom = strlen($random);
		$hasilrandom = '';
		for ($i=0; $i < 15 ; $i++) { 
			$hasilrandom .= $random[rand(0,$hitungrandom - 1)];
		}
		$jenis = $this->input->post('jenis_b');
		$jenis_swd = $this->input->post('jenis_swd');
		$adm_stnk1 = $this->input->post('adm_stnk1');
		
		$pkb1 = $this->input->post('pkb1');
		$swdllj1 = $this->input->post('swdllj1');
		$adm_stnk2 = $this->input->post('adm_stnk2');
		$ganti1 = $this->input->post('ganti1');
		$jenis_k1 = $this->input->post('jenis_k1');
		$adm_tnkb1 = $this->input->post('adm_tnkb1');
		$total_hidup = $this->input->post('total_hidup');

		$pkb2 = $this->input->post('pkb2');
		$telat_b = $this->input->post('telat');
		$sanksi_pkb1 = $this->input->post('sanksi_pkb1');
		$swdllj2 = $this->input->post('swdllj2');
		$sanksi_swdllj_b1 = $this->input->post('sanksi_swdllj_b1');
		$adm_stnk3 = $this->input->post('adm_stnk3');
		$ganti2 = $this->input->post('ganti2');
		$jenis_k2 = $this->input->post('jenis_k2');
		$adm_tnkb2 = $this->input->post('adm_tnkb2');
		$total_bulan = $this->input->post('total_bulan');
		
		$pkb3 = $this->input->post('pkb3');
		$telat_thn = $this->input->post('telat_thn');
		$sanksi_pkb2 = $this->input->post('sanksi_pkb2');
		$swdllj3 = $this->input->post('swdllj3');
		$sanski_swdllj1 = $this->input->post('sanski_swdllj1');
		$pkb4 = $this->input->post('pkb4');
		$cek_telat = $this->input->post('cek_telat');
		$jenis_telat = $this->input->post('jenis_telat');
		$telat_thn1 = $this->input->post('telat_thn1');
		$telat_t_bln1 = $this->input->post('telat_t_bln1');
		$sanksi_pkb3 = $this->input->post('sanksi_pkb3');
		$swdllj4 = $this->input->post('swdllj4');
		$sanski_swdllj3 = $this->input->post('sanski_swdllj3');
		$adm_stnk4 = $this->input->post('adm_stnk4');
		$ganti3 = $this->input->post('ganti3');
		$jenis_k3 = $this->input->post('jenis_k3');
		$adm_tnkb3 = $this->input->post('adm_tnkb3');
		$total_bulan2 = $this->input->post('total_bulan2');

		if ($swdllj1 == NULL AND $swdllj2 == NULL ) {
			$swdllj = $swdllj4;
		}else if($swdllj2 == NULL AND $swdllj4 == NULL ){
			$swdllj = $swdllj1;
		}else{
			$swdllj = $swdllj2;
		}

		if ($ganti1 == NULL AND $ganti2 == NULL ) {
			$ganti = $ganti3;
		}else if($ganti3 == NULL AND $ganti2 == NULL ){
			$ganti = $ganti1;
		}else{
			$ganti = $ganti2;
		}

		if ($sanksi_swdllj_b1 == NULL) {
			$sanksi_swdkllj = $sanski_swdllj1;
		}else{
			$sanksi_swdkllj = $sanksi_swdllj_b1;
		}

		if ($total_hidup == NULL AND $total_bulan==NULL) {
			$total = $total_bulan2;
		}else if($total_bulan2 == NULL AND $total_bulan==NULL){
			$total = $total_hidup;
		}else{
			$total = $total_bulan;
		}

		if ($pkb1 == NULL AND $pkb2==NULL) {
			$pkb = $pkb3;
		}else if($pkb2 == NULL AND $pkb3==NULL){
			$pkb = $pkb1;
		}else{
			$pkb = $pkb2;
		}

		if ($adm_stnk2 == NULL AND $adm_stnk4==NULL AND $adm_stnk1) {
			$adm_stnk = $adm_stnk3;
		}else if($adm_stnk4 == NULL AND $adm_stnk3==NULL AND $adm_stnk1){
			$adm_stnk = $adm_stnk2;
		}else if($adm_stnk2 == NULL AND $adm_stnk3==NULL AND $adm_stnk1){
			$adm_stnk = $adm_stnk4;
		}else{
			$adm_stnk = $adm_stnk1;
		}
		
		if ($adm_tnkb1 == NULL AND $adm_tnkb2==NULL) {
			$adm_tnkb = $adm_tnkb3;
		}else if($adm_tnkb2 == NULL AND $adm_tnkb3==NULL){
			$adm_tnkb = $adm_tnkb1;
		}else{
			$adm_tnkb = $adm_tnkb2;
		}

		if ($telat_b == NULL) {
			$telat = $telat_t_bln;
		}else{
			$telat = $telat_b;
		}

		if ($sanksi_pkb1 == NULL) {
			$sanksi_pkb = $sanksi_pkb2;
		}else{
			$sanksi_pkb = $sanksi_pkb1;
		}

		

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
		$query = $this->db->insert('stnk_hilang', array(
			'id_user'=>$this->session->userdata('id'),
			'no'=>$hasilrandom,
			'jenis'=>$jenis,
			'jenis_k'=>$jenis_swd, 
			'jenis_k1'=>$jenis_telat,
			'ganti'=>$ganti,
			'pkb'=>$pkb,
			'pkb1'=>$pkb4,
			'swdkllj'=>$swdllj,
			'swdkllj1'=>$swdllj4,
			'sanksi_swdkllj'=>$sanksi_swdkllj,
			'sanksi_swdkllj1'=>$sanski_swdllj3,
			'sanksi_pkb'=>$sanksi_pkb,
			'sanksi_pkb1'=>$sanksi_pkb3,
			'adm_stnk'=>$adm_stnk,
			'adm_tnkb'=>$adm_tnkb,
			'telat'=>$telat,
			'telat_t'=>$telat_thn,
			'telat1'=>$telat_thn1,
			'telat_b_t'=>$telat_t_bln1,
			'k_telat'=>$cek_telat,
			'total'=>filter_var($total,FILTER_SANITIZE_NUMBER_INT),
			'hari'=>$dayList[$day],
			'tanggal'=>$gabungan
		));
		if ($query==TRUE) {
			$this->session->set_flashdata('sukses', 'Berhasil Simpan data');
			$id = $this->db->insert_id();
			redirect('main/transaksi_sh/'.$id);
		}else{
			$this->session->set_flashdata('gagal', 'Gagal Simpan data');
			redirect('main/stnk_hilang');
		}
	}
	public function cetak_stnk()
	{
		$cek = $this->db->get_where('cetak_stnk', array('id_join'=>$this->input->post('id')))->num_rows();
		if ($cek > 0) {
			//$this->session->set_flashdata('gagal', 'Data sudah di isi');
			redirect('main/cetak_stnkhilang/'.$this->input->post('id'));
		}else{
			$id = $this->input->post('id');
			$penerima = $this->input->post('penerima');
			$telp = $this->input->post('no_telp');
			$nama = $this->input->post('atas_nama');
			$dp = $this->input->post('dp');
			$bpkb1 = $this->input->post('bpkb1');
			$bpkb2 = $this->input->post('bpkb2');
			$sim1 = $this->input->post('sim1');
			$sim2 = $this->input->post('sim2');
			$stnk1 = $this->input->post('stnk1');
			$stnk2 = $this->input->post('stnk2');
			$wilayah = $this->input->post('wilayah');
			$nopol = $this->input->post('nopol');
			$jenis_k = $this->input->post('jenis_k');
			$lainnya = $this->input->post('lainnya');
			$m_stnk = $this->input->post('keperluan_m');
			$m_stnk2 = $this->input->post('keperluan_ke');
			$c_berkas = $this->input->post('cabut_b');
			$c_berkas2 = $this->input->post('cabut_ke');
			$pajak_ini = $this->input->post('pajak_ini');
			$harga_ini = $this->input->post('harga_ini');
			$pajak_lalu = $this->input->post('pajak_lalu');
			$harga_lalu = $this->input->post('harga_lalu');
			$total_pajak = $this->input->post('total_pajak');

			$biaya_ps = $this->input->post('biaya_ps');
			$harga_ps = $this->input->post('harga_ps');
			$adm_skp = $this->input->post('adm_skp');
			$harga_adm = $this->input->post('harga_adm');
			$slp = $this->input->post('slp');
			$harga_slp = $this->input->post('harga_slp');
			$plat = $this->input->post('plat');
			$harga_plat = $this->input->post('harga_plat');
			$bn_gp = $this->input->post('bn_gp');
			$harga_bn = $this->input->post('harga_bn');
			$p_alamat = $this->input->post('p_alamat');
			$harga_alamat = $this->input->post('harga_alamat');
			$psl = $this->input->post('psl');
			$harga_psl = $this->input->post('harga_psl');
			$lainnya1 = $this->input->post('lainnya1');
			$harga_lainnya = $this->input->post('harga_lainnya');
			$lainnya2 = $this->input->post('lainnya2');
			$harga_lainnya2 = $this->input->post('harga_lainnya2');
			$total = $this->input->post('total');
			$prediski = $this->input->post('prediski');
			$kurang = $this->input->post('kurang');

			$gabungan = date('Y-m-d');
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
			$query = $this->db->insert('cetak_stnk', array(
				'id_user'=>$this->session->userdata('id'),
				'id_join'=>$id,
				'penerima'=>$penerima,
				'no_telp'=>$telp,
				'atas_nama'=>$nama,
				'uang_dp'=>$dp,
				'bpkb'=>$bpkb1.','.$bpkb2.','.$bpkb3.','.$bpkb4.',',
				'sim'=>$sim1.','.$sim2,
				'stnk'=>$stnk1.','.$stnk2,
				'wilayah'=>$wilayah,
				'nopol'=>$nopol,
				'jenis_kendaraan'=>$jenis_k,
				'lainnya'=>$lainnya,
				'pajak_ini'=>$pajak_ini,
				'pajak_lalu'=>$pajak_lalu,
				'harga_pajak_ini'=>$harga_ini,
				'harga_pajak_lalu'=>$harga_lalu,
				'total_pajak'=>$total_pajak,

				'biaya_ps'=>$biaya_pm,
				'harga_ps'=>$harga_pm,
				'adm_skp'=>$adm_skp,
				'harga_adm'=>$harga_adm,
				'slp'=>$slp,
				'harga_slp'=>$harga_slp,
				'plat'=>$plat,
				'harga_plat'=>$harga_plat,
				'balik_nama'=>$bn_gp,
				'harga_gb'=>$harga_bn,
				'p_alamat'=>$p_alamat,
				'harga_pa'=>$harga_alamat,
				'psl'=>$harga_hilang,
				'harga_psl'=>$harga_hilang,
				'p_lain'=>$lainnya1,
				'harga_lain'=>$harga_lainnya,
				'p_lainnya'=>$lainnya2,
				'harga_lainnya'=>$harga_lainnya2,
				'total_proses'=>$total,
				'biaya_prediksi'=>$prediski,
				'biaya_kurang'=>$kurang,
				'hari'=>$dayList[$day],
				'tanggal'=>$gabungan
			));
			if ($query==TRUE) {
				redirect('main/cetak_stnkhilang/'.$id);
			}else{
				$this->session->set_flashdata('gagal', 'Database Error');
				redirect('main/dashboard');
			}
		}
	}
	public function proses_sb()
	{
		$random = '0123456789';
		$hitungrandom = strlen($random);
		$hasilrandom = '';
		for ($i=0; $i < 15 ; $i++) { 
			$hasilrandom .= $random[rand(0,$hitungrandom - 1)];
		}

		$jenis = $this->input->post('jenis_b');
		$jenis_swd = $this->input->post('jenis_swd');
		$pkb1 = $this->input->post('pkb1');
		$bbnk1 = $this->input->post('bbnkb1');
		$adm_stnk1 = $this->input->post('adm_stnk1');
		$total_hidup = $this->input->post('total_hidup');

		$pkb2 = $this->input->post('pkb2');
		$bbnkb2 = $this->input->post('bbnkb2');
		$swdllj1 = $this->input->post('swdllj1');
		$adm_stnk2 = $this->input->post('adm_stnk2');
		$ganti1 = $this->input->post('ganti1');
		$jenis_k1 = $this->input->post('jenis_k1');
		$adm_tnkb1 = $this->input->post('adm_tnkb1');
		$total_normal = $this->input->post('total_normal');

		$pkb3 = $this->input->post('pkb3');
		$bbnkb3 = $this->input->post('bbnkb3');
		$telat_bln = $this->input->post('telat');
		$sanksi_pkb1 = $this->input->post('sanksi_pkb1');
		$swdllj2 = $this->input->post('swdllj2');
		$sanksi_swdllj_b1 = $this->input->post('sanksi_swdllj_b1');
		$adm_stnk3 = $this->input->post('adm_stnk3');
		$ganti2 = $this->input->post('ganti2');
		$jenis_k2 = $this->input->post('jenis_k2');
		$adm_tnkb2 = $this->input->post('adm_tnkb2');
		$total_bulan = $this->input->post('total_bulan');

		$pkb4 = $this->input->post('pkb4');
		$telat_thn = $this->input->post('telat_thn');
		$telat_t_bln = $this->input->post('telat_t_bln');
		$sanksi_pkb2 = $this->input->post('sanksi_pkb2');
		$swdllj3 = $this->input->post('swdllj3');
		$sanski_swdllj1 = $this->input->post('sanski_swdllj1');

		$pkb_tahun = $this->input->post('pkb_tahun');
		$cek_telat = $this->input->post('cek_telat');
		$jenis_telat = $this->input->post('jenis_telat');
		$telat_thn1 = $this->input->post('telat_thn1');
		$sanksi_pkb3 = $this->input->post('sanksi_pkb3');
		$swdllj4 = $this->input->post('swdllj4');
		$sanski_swdllj2 = $this->input->post('sanski_swdllj2');

		//
		$bbnkb_thn = $this->input->post('bbnkb_thn');
		$bbnkb_thn = $this->input->post('bbnkb_thn');
		$adm_stnk4 = $this->input->post('adm_stnk4');
		$ganti3 = $this->input->post('ganti3');
		$jenis_k3 = $this->input->post('jenis_k3');
		$adm_tnkb3 = $this->input->post('adm_tnkb3');
		$total_tahun = $this->input->post('total_tahun');

		if ($telat_bln == NULL) {
			$telat = $telat_t_bln; 
		}else{
			$telat = $telat_bln;
		}

		if ($sanksi_pkb1 == NULL) {
			$sanksi_pkb = $sanksi_pkb2; 
		}else{
			$sanksi_pkb = $sanksi_pkb1;
		}

		if ($jenis_k1 == NULL AND $jenis_k3) {
			$jenis_kendaraan = $jenis_k2; 
		}else if($jenis_k2 == NULL AND $jenis_k3){
			$jenis_kendaraan = $jenis_k1;
		}else{
			$jenis_kendaraan = $jenis_k3;
		}

		if ($adm_tnkb1 == NULL AND $adm_tnkb3) {
			$adm_tnkb = $adm_tnkb2;
		}else if($adm_tnkb2 == NULL AND $adm_tnkb3){
			$adm_tnkb = $adm_tnkb1;
		}else if($adm_tnkb2 == NULL AND $adm_tnkb3){
			$adm_tnkb = $adm_tnkb3;
		}

		if ($ganti1 == NULL AND $ganti3) {
			$ganti = $ganti2;
		}else if($ganti2 == NULL AND $ganti3){
			$ganti = $ganti1;
		}else if($ganti2 == NULL AND $ganti3){
			$ganti = $ganti3;
		}

		if ($swdllj1 == NULL AND $swdllj2 == NULL ) {
			$swdllj = $swdllj3;
		}else if($swdllj2 == NULL AND $swdllj3 == NULL ){
			$swdllj = $swdllj1;
		}else{
			$swdllj = $swdllj2;
		}

		if ($sanksi_swdllj_b1 == NULL) {
			$sanksi_swdkllj = $sanski_swdllj1;
		}else{
			$sanksi_swdkllj = $sanksi_swdllj_b1;
		}


		if ($pkb1 == NULL AND $pkb2==NULL AND $pkb4==NULL) {
			$pkb = $pkb3;
		}else if($pkb2 == NULL AND $pkb3==NULL AND $pkb4==NULL){
			$pkb = $pkb1;
		}else if($pkb1 == NULL AND $pkb3==NULL AND $pkb4==NULL){
			$pkb = $pkb2;
		}else{
			$pkb = $pkb4;
		}

		if ($bbnk1 == NULL AND $bbnkb2==NULL AND $bbnkb_thn==NULL) {
			$bbnk = $bbnkb3;
		}else if($bbnkb2 == NULL AND $bbnkb3==NULL AND $bbnkb_thn==NULL){
			$bbnk = $bbnk1;
		}else if($bbnk1 == NULL AND $bbnkb3==NULL AND $bbnkb_thn==NULL){
			$bbnk = $bbnkb2;
		}else{
			$bbnk = $bbnkb_thn;
		}

		if ($adm_stnk1 == NULL AND $adm_stnk2==NULL AND $adm_stnk4==NULL) {
			$adm_stnk = $adm_stnk3;
		}else if($adm_stnk2 == NULL AND $adm_stnk3==NULL AND $adm_stnk4==NULL){
			$adm_stnk = $adm_stnk1;
		}else if($adm_stnk1 == NULL AND $adm_stnk3==NULL AND $adm_stnk4==NULL){
			$adm_stnk = $adm_stnk2;
		}else{
			$adm_stnk = $adm_stnk4;
		}

		if ($total_bulan==NULL AND $total_normal==NULL AND $total_tahun==NULL) {
			$total = $total_hidup;
		}else if($total_hidup == NULL AND $total_normal==NULL AND $total_tahun==NULL){
			$total = $total_bulan;
		}else if($total_bulan == NULL AND $total_hidup==NULL AND $total_tahun==NULL){
			$total = $total_normal;
		}else{
			$total = $total_tahun;
		}

		
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
		$query = $this->db->insert('stnk_balik', array(
			'id_user'=>$this->session->userdata('id'),
			'no'=>$hasilrandom,
			'perhitungan'=>$jenis_swd,
			'jenis'=>$jenis,
			'jenis_kendaraan' => $jenis_kendaraan, 
			'pkb'=>$pkb,
			'pkb1' => $pkb_tahun,
			'bbnk'=>filter_var($bbnk,FILTER_SANITIZE_NUMBER_INT),
			'adm_stnk'=>filter_var($adm_stnk,FILTER_SANITIZE_NUMBER_INT),
			'adm_tnkb'=>filter_var($adm_tnkb,FILTER_SANITIZE_NUMBER_INT),
			'ganti'=>$ganti,
			'cek_telat'=>$cek_telat,
			'jenis_telat'=>$jenis_telat,
			'sanksi_pkb'=>filter_var($sanksi_pkb,FILTER_SANITIZE_NUMBER_INT),
			'sanksi_pkb1'=>filter_var($sanksi_pkb3,FILTER_SANITIZE_NUMBER_INT),
			'swdkllj'=>filter_var($swdllj,FILTER_SANITIZE_NUMBER_INT),
			'swdkllj1'=>filter_var($swdllj4,FILTER_SANITIZE_NUMBER_INT),
			'sanksi_swdkllj'=>filter_var($sanksi_swdkllj,FILTER_SANITIZE_NUMBER_INT),
			'sanksi_swdkllj1'=>filter_var($sanski_swdllj2,FILTER_SANITIZE_NUMBER_INT),
			'telat'=>$telat,
			'telat_thn'=>$telat_thn,
			'telat_b_t'=>$telat_thn1,
			'hari'=>$dayList[$day],
			'tanggal'=>$gabungan
		));
		if ($query==TRUE) {
			$this->session->set_flashdata('sukses', 'Berhasil Simpan data');
			$id = $this->db->insert_id();
			redirect('main/transaksi_bn/'.$id);
		}else{
			$this->session->set_flashdata('gagal', 'Gagal Simpan data');
			redirect('main/balik_nama');
		}
	}
	public function cetak_sb()
	{
		$cek = $this->db->get_where('cetak_sb', array('id_join'=>$this->input->post('id')))->num_rows();
		if ($cek > 0) {
			//$this->session->set_flashdata('gagal', 'Data sudah di isi');
			redirect('main/cetak/c_baliknama/'.$this->input->post('id'));
		}else{
			$id = $this->input->post('id');
			$penerima = $this->input->post('penerima');
			$telp = $this->input->post('no_telp');
			$nama = $this->input->post('atas_nama');
			$dp = $this->input->post('dp');
			$bpkb1 = $this->input->post('bpkb1');
			$bpkb2 = $this->input->post('bpkb2');
			$sim1 = $this->input->post('sim1');
			$sim2 = $this->input->post('sim2');
			$wilayah = $this->input->post('wilayah');
			$nopol = $this->input->post('nopol');
			$jenis_k = $this->input->post('jenis_k');
			$pajak = $this->input->post('pajak');
			$lainnya = $this->input->post('lainnya');
			$balik = $this->input->post('balik');
			$penyesuaian = $this->input->post('penyesuaian');
			$pajak_ini = $this->input->post('pajak_ini');
			$harga_ini = $this->input->post('harga_ini');
			$pajak_lalu = $this->input->post('pajak_lalu');
			$harga_lalu = $this->input->post('harga_lalu');
			$total_pajak = $this->input->post('total_pajak');
			$biaya_bn = $this->input->post('biaya_bn');
			$harga_bn = $this->input->post('harga_bn');
			$adm_skp = $this->input->post('adm_skp');
			$harga_adm = $this->input->post('harga_adm');
			$slp = $this->input->post('slp');
			$harga_slp = $this->input->post('harga_slp');
			$fisik = $this->input->post('fisik');
			$harga_fisik = $this->input->post('harga_fisik');
			$lainnya1 = $this->input->post('lainnya1');
			$harga_lainnya = $this->input->post('harga_lainnya');
			$lainnya2 = $this->input->post('lainnya2');
			$harga_lainnya2 = $this->input->post('harga_lainnya2');
			$total = $this->input->post('total');
			$prediski = $this->input->post('prediski');
			$kurang = $this->input->post('kurang');
			$gabungan = date('Y-m-d');
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
			$query = $this->db->insert('cetak_sb', array(
				'id_user'=>$this->session->userdata('id'),
				'id_join'=>$id,
				'penerima'=>$penerima,
				'no_telp'=>$telp,
				'atas_nama'=>$nama,
				'uang_dp'=>$dp,
				'bpkb'=>$bpkb1.','.$bpkb2.',',
				'sim'=>$sim1.','.$sim2,
				'wilayah'=>$wilayah,
				'nopol'=>$nopol,
				'jenis_kendaraan'=>$jenis_k,
				'tahun_pajak'=>$pajak,
				'lainnya'=>$lainnya,
				'pengurusan'=>$balik.','.$penyesuaian,
				'pajak_ini'=>$pajak_ini,
				'pajak_lalu'=>$pajak_lalu,
				'harga_pajak_ini'=>$harga_ini,
				'harga_pajak_lalu'=>$harga_lalu,
				'total_pajak'=>$total_pajak,
				'proses_bn'=>$biaya_bn,
				'harga_bn'=>$harga_bn,
				'adm_skp'=>$adm_skp,
				'harga_adm'=>$harga_adm,
				'surat_lp'=>$slp,
				'harga_lp'=>$harga_slp,
				'plat'=>$fisik,
				'harga_plat'=>$harga_fisik,
				'p_lainnya'=>$lainnya1,
				'h_lainnya'=>$harga_lainnya,
				'proses_lain'=>$lainnya2,
				'harga_lainnya'=>$harga_lainnya2,
				'total_proses'=>$total,
				'biaya_prediksi'=>$prediski,
				'biaya_kurang'=>$kurang,
				'hari'=>$dayList[$day],
				'tanggal'=>$gabungan
			));
			if ($query==TRUE) {
				redirect('main/cetak/c_baliknama/'.$id);
			}else{
				$this->session->set_flashdata('gagal', 'Database Error');
				redirect('main/dashboard');
			}
		}
	}
	public function proses_mbn()
	{
		$random = '0123456789';
		$hitungrandom = strlen($random);
		$hasilrandom = '';
		for ($i=0; $i < 15 ; $i++) { 
			$hasilrandom .= $random[rand(0,$hitungrandom - 1)];
		}
		$jenis = $this->input->post('jenis_b');
		$jenis_swd = $this->input->post('jenis_swd');
		
		$pkb1 = $this->input->post('pkb1');
		$bbnkb1 = $this->input->post('bbnkb1');
		$swdllj1 = $this->input->post('swdllj1');
		$adm_stnk1 = $this->input->post('adm_stnk1');
		$adm_tnkb1 = $this->input->post('adm_tnkb1');
		$total_hidup = $this->input->post('total_hidup');

		$pkb2 = $this->input->post('pkb2');
		$telat_b = $this->input->post('telat');
		$sanksi_pkb1 = $this->input->post('sanksi_pkb1');
		$swdllj2 = $this->input->post('swdllj2');
		$sanksi_swdllj_b1 = $this->input->post('sanksi_swdllj_b1');
		//
		$pkb3 = $this->input->post('pkb3');
		$swdllj3 = $this->input->post('swdllj3');
//
		$bbnkb2 = $this->input->post('bbnkb2');
		$adm_stnk2 = $this->input->post('adm_stnk2');
		$adm_tnkb2 = $this->input->post('adm_tnkb2');
		$total_bulan = $this->input->post('total_bulan');
		

		$pkb4 = $this->input->post('pkb4');
		$telat_thn = $this->input->post('telat_thn');
		//
		$telat_t_bln = $this->input->post('telat_t_bln');

		$sanksi_pkb2 = $this->input->post('sanksi_pkb2');
		$swdllj4 = $this->input->post('swdllj4');
		$sanski_swdllj2 = $this->input->post('sanski_swdllj2');
		//
		$pkb5 = $this->input->post('pkb5');
		$swdllj5 = $this->input->post('swdllj5');

		$bbnkb3 = $this->input->post('bbnkb3');
		$adm_stnk3 = $this->input->post('adm_stnk3');
		$adm_tnkb3 = $this->input->post('adm_tnkb3');
		$total_su = $this->input->post('total_su');

		if ($bbnkb1 == NULL AND $bbnkb2==NULL) {
			$bbnkb = $bbnkb3;
		}else if($bbnkb2 == NULL AND $bbnkb3==NULL){
			$bbnkb = $bbnkb1;
		}else{
			$bbnkb = $bbnkb2;
		}

		if ($pkb1 == NULL AND $pkb2==NULL) {
			$pkb = $pkb4;
		}else if($pkb2 == NULL AND $pkb4==NULL){
			$pkb = $pkb1;
		}else{
			$pkb = $pkb2;
		}


		if ($pkb3 == NULL) {
			$pkb_1 = $pkb5;
		}else{
			$pkb_1 = $pkb3;
		}

		if ($adm_stnk1 == NULL AND $adm_stnk2==NULL) {
			$adm_stnk = $adm_stnk3;
		}else if($adm_stnk2 == NULL AND $adm_stnk3==NULL){
			$adm_stnk = $adm_stnk1;
		}else{
			$adm_stnk = $adm_stnk2;
		}
		
		if ($adm_tnkb1 == NULL AND $adm_tnkb2==NULL) {
			$adm_tnkb = $adm_tnkb3;
		}else if($adm_tnkb2 == NULL AND $adm_tnkb3==NULL){
			$adm_tnkb = $adm_tnkb1;
		}else{
			$adm_tnkb = $adm_tnkb2;
		}

		if ($telat_b == NULL) {
			$telat = $telat_t_bln;
		}else{
			$telat = $telat_b;
		}

		if ($sanksi_pkb1 == NULL) {
			$sanksi_pkb = $sanksi_pkb2;
		}else{
			$sanksi_pkb = $sanksi_pkb1;
		}

		if ($swdllj1 == NULL AND $swdllj2 == NULL ) {
			$swdllj = $swdllj4;
		}else if($swdllj2 == NULL AND $swdllj4 == NULL ){
			$swdllj = $swdllj1;
		}else{
			$swdllj = $swdllj2;
		}

		if ($swdllj3 == NULL) {
			$swdllj_1 = $swdllj5;
		}else{
			$swdllj_1 = $swdllj3;
		}

		if ($sanksi_swdllj_b1 == NULL) {
			$sanksi_swdkllj = $sanski_swdllj2;
		}else{
			$sanksi_swdkllj = $sanksi_swdllj_b1;
		}

		if ($total_hidup == NULL AND $total_bulan==NULL) {
			$total = $total_su;
		}else if($total_su == NULL AND $total_bulan==NULL){
			$total = $total_hidup;
		}else{
			$total = $total_bulan;
		}

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
		$query = $this->db->insert('mutasi_bn', array(
			'id_user'=>$this->session->userdata('id'),
			'no'=>$hasilrandom,
			'jenis'=>$jenis,
			'jenis_k'=>$jenis_swd, 
			'bbnkb'=>$bbnkb, 
			'telat_thn'=>$telat_thn, 
			'pkb'=>$pkb,
			'pkb1'=>$pkb_1,
			'swdkllj'=>$swdllj,
			'swdkllj1'=>$swdllj_1,
			'sanksi_swdkllj'=>$sanksi_swdkllj,
			'sanksi_pkb'=>$sanksi_pkb,
			'adm_stnk'=>$adm_stnk,
			'adm_tnkb'=>$adm_tnkb,
			'telat'=>$telat,
			'total'=>filter_var($total,FILTER_SANITIZE_NUMBER_INT),
			'hari'=>$dayList[$day],
			'tanggal'=>$gabungan
		));
		if ($query==TRUE) {
			$this->session->set_flashdata('sukses', 'Berhasil Simpan data');
			$id = $this->db->insert_id();
			redirect('main/dashboard/');
		}else{
			$this->session->set_flashdata('gagal', 'Gagal Simpan data');
			redirect('main/mutasi');
		}
	}
	// HARI
	function getHariP()
	{
		$q = $this->db->query("SELECT count(*) as jml_p FROM cetak_perpanjang WHERE status='1' AND tanggal = date(NOW())");
		return $q;	
	}
	function getHariBN()
	{
		$q = $this->db->query("SELECT count(*) as jml_bn FROM cetak_balik WHERE status='1' AND tanggal = date(NOW())");
		return $q;	
	}
	function getHariM()
	{
		$q = $this->db->query("SELECT count(*) as jml_m FROM cetak_mutasi WHERE status='1' AND tanggal = date(NOW())");
		return $q;	
	}
	function getHariSH()
	{
		$q = $this->db->query("SELECT count(*) as jml_sh FROM cetak_stnk WHERE status='1' AND tanggal = date(NOW())");
		return $q;	
	}
	// MINGGU
	function getMingguP()
	{
		$q = $this->db->query("SELECT count(*) as jml_p FROM cetak_perpanjang WHERE status='1' AND YEARWEEK(tanggal)=YEARWEEK(NOW())");
		return $q;
	}
	function getMingguBN()
	{
		$q = $this->db->query("SELECT count(*) as jml_bn FROM cetak_balik WHERE status='1' AND YEARWEEK(tanggal)=YEARWEEK(NOW())");
		return $q;
	}
	function getMingguM()
	{
		$q = $this->db->query("SELECT count(*) as jml_m FROM cetak_mutasi WHERE status='1' AND YEARWEEK(tanggal)=YEARWEEK(NOW())");
		return $q;
	}
	function getMingguSH()
	{
		$q = $this->db->query("SELECT count(*) as jml_sh FROM cetak_stnk WHERE status='1' AND YEARWEEK(tanggal)=YEARWEEK(NOW())");
		return $q;
	}
	// MINGGU
	function getBulanP()
	{
		$q = $this->db->query("SELECT CONCAT(YEAR(tanggal),'/',MONTH(tanggal)) AS jml_p, COUNT(*) AS jml_p FROM cetak_perpanjang WHERE status='1' AND CONCAT(YEAR(tanggal),'/',MONTH(tanggal))=CONCAT(YEAR(NOW()),'/',MONTH(NOW()))");
		return $q;
	}
	function getBulanBN()
	{
		$q = $this->db->query("SELECT CONCAT(YEAR(tanggal),'/',MONTH(tanggal)) AS jml_bn, COUNT(*) AS jml_bn FROM cetak_balik WHERE status='1' AND CONCAT(YEAR(tanggal),'/',MONTH(tanggal))=CONCAT(YEAR(NOW()),'/',MONTH(NOW()))");
		return $q;
	}
	function getBulanM()
	{
		$q = $this->db->query("SELECT CONCAT(YEAR(tanggal),'/',MONTH(tanggal)) AS jml_m, COUNT(*) AS jml_m FROM cetak_mutasi WHERE status='1' AND CONCAT(YEAR(tanggal),'/',MONTH(tanggal))=CONCAT(YEAR(NOW()),'/',MONTH(NOW()))");
		return $q;
	}
	function getBulanSH()
	{
		$q = $this->db->query("SELECT CONCAT(YEAR(tanggal),'/',MONTH(tanggal)) AS jml_sh, COUNT(*) AS jml_sh FROM cetak_stnk WHERE status='1' AND CONCAT(YEAR(tanggal),'/',MONTH(tanggal))=CONCAT(YEAR(NOW()),'/',MONTH(NOW()))");
		return $q;
	}
	//Total
	function getTotalP()
	{
		$q = $this->db->query("SELECT count(*) as jml_p FROM cetak_perpanjang WHERE status='1'");
		return $q;
	}
	function getTotalBN()
	{
		$q = $this->db->query("SELECT count(*) as jml_bn FROM cetak_balik WHERE status='1'");
		return $q;
	}
	function getTotalM()
	{
		$q = $this->db->query("SELECT count(*) as jml_m FROM cetak_mutasi WHERE status='1'");
		return $q;
	}
	function getTotalSH()
	{
		$q = $this->db->query("SELECT count(*) as jml_sh FROM cetak_stnk WHERE status='1'");
		return $q;
	}
}

/* End of file M_back.php */
/* Location: ./application/models/M_back.php */