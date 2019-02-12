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
		$query = $this->db->query("SELECT * FROM catatan WHERE jenis_harga='swdkllj' or jenis_harga='stnk' or jenis_harga='tnkb' or jenis_harga='sanksi'");
		return $query->result_array();
	}
	public function load_harga_jasa()
	{
		$query = $this->db->query("SELECT * FROM catatan WHERE jenis_harga='jasa_select' or jenis_harga='jasa'");
		return $query->result();
	}
	function act_update_harga()
	{
		$id = $this->input->post('id_catat');
		$row = $this->db->get_where('catatan',array('id_catat'=>$id))->row();
		if ($this->input->post('value') != $row->harga) {
			$query = $this->db->update('catatan', array(
				'harga'=> $this->input->post('value'),
				'created_at' => date('Y-m-d')
			),array('id_catat'=>$id));
		}
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
		$jenis_jasa = $this->input->post('jenis_jasa');
		$wilayah = $this->input->post('wilayah');
		$total_pajak = $this->input->post('total_pajak');
		$total_pajak1 = $this->input->post('total_pajak1');
		$total_pajak2 = $this->input->post('total_pajak2');
		$biaya_jasa = $this->input->post('biaya_jasa');
		$biaya_jasa1 = $this->input->post('biaya_jasa1');
		$biaya_jasa2 = $this->input->post('biaya_jasa2');
		$jenis_k = $this->input->post('jenis_k');
		$pkb1 = $this->input->post('pkb1');
		$pkb2 = $this->input->post('pkb2');
		$pkb3 = $this->input->post('pkb3');
		$sanksi_pkb1 = $this->input->post('sanksi_pkb1');
		$sanksi_pkb2 = $this->input->post('sanksi_pkb2');
		$swdllj1 = $this->input->post('swdllj1');
		if ($jenis == 'Telat lebih dari setahun') {
			
			$swdllj2 = $this->input->post('swdllj2');
			$swdllj3 = $this->input->post('swdllj3');
			$sanski_swdllj1 = $this->input->post('sanski_swdllj1');
			$sanski_swdllj2 = $this->input->post('sanski_swdllj2');
		}else{
			$swdllj2 = NULL;
			$swdllj3 =  NULL;
			$sanski_swdllj1 =  NULL;
			$sanski_swdllj2 =  NULL;
		}
		$jenis_swd = $this->input->post('jenis_swd');
		$telat_bln= $this->input->post('telat');
		$telat_b_t= $this->input->post('telat_bulan');
		$telat_thn= $this->input->post('telat_thn');
		$swdllj = $this->input->post('swdllj1');
		$ganti = $this->input->post('ganti');
		$adm_stnk = $this->input->post('adm_stnk');
		$adm_tnkb = $this->input->post('adm_tnkb');
		
		$accbpkb = $this->input->post('accbpkb');
		$accktp = $this->input->post('accktp');
		$admskp = $this->input->post('admskp');
		$loksus = $this->input->post('loksus');

		$jenis_k_bpkb = $this->input->post('jenis_k_bpkb');
		$jenis_k_ktp = $this->input->post('jenis_k_ktp');
		$jenis_k_skp = $this->input->post('jenis_k_skp');
		$jenis_k_loksus = $this->input->post('jenis_k_loksus');

		$jasa_bpkb = $this->input->post('jasa_bpkb');
		$jasa_ktp = $this->input->post('jasa_ktp');
		$jasa_skp = $this->input->post('jasa_skp');
		$jasa_loksus = $this->input->post('jasa_loksus');

		$total1 = $this->input->post('total1');
		$total2 = $this->input->post('total2');
		$total3 = $this->input->post('total3');
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
		if ($total_pajak == NULL AND $total_pajak1==NULL) {
			$pajak = $total_pajak2;
		}else if($total_pajak == NULL AND $total_pajak2==NULL){
			$pajak = $total_pajak1;
		}else{
			$pajak = $total_pajak;
		}

		if ($biaya_jasa == NULL AND $biaya_jasa1==NULL) {
			$biaya = $biaya_jasa2;
		}else if($biaya_jasa == NULL AND $biaya_jasa2==NULL){
			$biaya = $biaya_jasa1;
		}else{
			$biaya = $biaya_jasa;
		}

		if ($total1 == NULL AND $total2==NULL) {
			$total = $total3;
		}else if($total1 == NULL AND $total3==NULL){
			$total = $total2;
		}else{
			$biaya = $total1;
		}

		$query = $this->db->insert('perpanjang', array(
			'id_user'=>$this->session->userdata('id'),
			'no'=>$hasilrandom,
			'perhitungan'=>$jenis_swd,
			'jenis'=>$jenis,
			'jenis_jasa'=>$jenis_jasa,
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
			'wilayah'=>$wilayah,
			'ganti_lainnya'=>$accbpkb.','.$accktp.','.$admskp.','.$loksus.',',
			'kendaraan'=>$jenis_k_bpkb.','.$jenis_k_ktp.','.$jenis_k_skp.','.$jenis_k_loksus.',',
			'biaya_lainnya'=>$jasa_bpkb.','.$jasa_ktp.','.$jasa_skp.','.$jasa_loksus.',',
			'biaya_jasa'=>filter_var($biaya,FILTER_SANITIZE_NUMBER_INT),
			'total_pajak'=>filter_var($pajak,FILTER_SANITIZE_NUMBER_INT),
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
			$json = array('success'=>false, 'msg'=>'warning','id'=>$this->input->post('id'));
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
				'total_cpajak'=>$total_pajak,
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
				if ($getdata->jenis != 'normal' OR $getdata->ganti_plat != NULL) {
					$update = $this->db->query('UPDATE blanko SET stok_blanko = stok_blanko - 1');
					if ($update==TRUE) {
						$json =  array('success'=>true, 'msg'=>'Berhasil','id'=>$id);
					}else{
						$json =  array('success'=>false, 'msg'=>'Berhasil','id'=>$id);
					}
				}else{
					$json = array('success'=>true, 'msg'=>'Berhasil','id'=>$id);
				}
			}else{
				$json =  array('success'=>true, 'msg'=>'Gagal');
			}
		}
		echo json_encode($json);
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
		$jenis_jasa = $this->input->post('jenis_jasa');
		$wilayah = $this->input->post('wilayah');
		$jenis = $this->input->post('jenis_b');
		if ($jenis == 'Pajak Hidup') {
			$pkb = $this->input->post('pkb1');
			$bbnk = $this->input->post('bbnkb1');
			$adm_stnk = $this->input->post('adm_stnk1');
			$biaya_jasa = $this->input->post('biaya_jasa1');
			$total_pajak = $this->input->post('total_pajak1');
			$total = $this->input->post('total_hidup');
		}else if($jenis == 'Pajak Normal'){
			$pkb = $this->input->post('pkb2');
			$bbnk = $this->input->post('bbnkb2');
			$swdllj = $this->input->post('swdllj1');
			$adm_stnk = $this->input->post('adm_stnk2');
			$ganti = $this->input->post('ganti1');
			$jenis_k = $this->input->post('jenis_k');
			$adm_tnkb = $this->input->post('adm_tnkb1');
			$accbpkb = $this->input->post('accbpkb');
			$accktp = $this->input->post('accktp');
			$loksus = $this->input->post('loksus');
			$admskp = $this->input->post('admskp');
			$jenis_k_bpkb = $this->input->post('jenis_k_bpkb');
			$jenis_k_ktp = $this->input->post('jenis_k_ktp');
			$jenis_k_loksus = $this->input->post('jenis_k_loksus');
			$jenis_k_skp = $this->input->post('jenis_k_skp');
			$jasa_bpkb = $this->input->post('jasa_bpkb');
			$jasa_ktp = $this->input->post('jasa_ktp');
			$jasa_loksus = $this->input->post('jasa_loksus');
			$jasa_skp = $this->input->post('jasa_skp');
			$biaya_jasa = $this->input->post('biaya_jasa2');
			$total_pajak = $this->input->post('total_pajak2');
			$total = $this->input->post('total_normal');
		}else if($jenis == 'Telat bulanan'){
			$pkb = $this->input->post('pkb3');
			$bbnkb = $this->input->post('bbnkb3');
			$telat = $this->input->post('telat_bln_t');
			$sanksi_pkb = $this->input->post('sanksi_pkb1');
			$swdllj = $this->input->post('swdllj2');
			$sanksi_swdkllj = $this->input->post('sanksi_swdllj_b1');
			$adm_stnk = $this->input->post('adm_stnk3');
			$ganti2 = $this->input->post('ganti2');
			$jenis_k = $this->input->post('jenis_k2');
			$adm_tnkb = $this->input->post('adm_tnkb2');
			$accbpkb = $this->input->post('accbpkb2');
			$accktp = $this->input->post('accktp2');
			$loksus = $this->input->post('loksus2');
			$admskp = $this->input->post('admskp2');
			$jenis_k_bpkb = $this->input->post('jenis_k_bpkb2');
			$jenis_k_ktp = $this->input->post('jenis_k_ktp2');
			$jenis_k_loksus = $this->input->post('jenis_k_loksus2');
			$jenis_k_skp = $this->input->post('jenis_k_skp2');
			$jasa_bpkb = $this->input->post('jasa_bpkb2');
			$jasa_ktp = $this->input->post('jasa_ktp2');
			$jasa_loksus = $this->input->post('jasa_loksus2');
			$jasa_skp = $this->input->post('jasa_skp2');
			$biaya_jasa = $this->input->post('biaya_jasa3');
			$total_pajak = $this->input->post('total_pajak3');
			$total = $this->input->post('total_bulan');
		}else if($jenis == 'Pajak Telat Lebih dari 1 Tahun'){
			// Normal
			$pkb = $this->input->post('pkb2');
			$bbnk = $this->input->post('bbnkb2');
			$swdllj = $this->input->post('swdllj1');
			$adm_stnk = $this->input->post('adm_stnk2');
			$ganti = $this->input->post('ganti1');
			$jenis_k = $this->input->post('jenis_k');
			$adm_tnkb = $this->input->post('adm_tnkb1');
			$accbpkb = $this->input->post('accbpkb');
			$accktp = $this->input->post('accktp');
			$loksus = $this->input->post('loksus');
			$admskp = $this->input->post('admskp');
			$jenis_k_bpkb = $this->input->post('jenis_k_bpkb');
			$jenis_k_ktp = $this->input->post('jenis_k_ktp');
			$jenis_k_loksus = $this->input->post('jenis_k_loksus');
			$jenis_k_skp = $this->input->post('jenis_k_skp');
			$jasa_bpkb = $this->input->post('jasa_bpkb');
			$jasa_ktp = $this->input->post('jasa_ktp');
			$jasa_loksus = $this->input->post('jasa_loksus');
			$jasa_skp = $this->input->post('jasa_skp');
			
			//Telat Bulan
			$pkb3 = $this->input->post('pkb3');
			$bbnkb3 = $this->input->post('bbnkb3');
			$telat = $this->input->post('telat_bln_t');
			$sanksi_pkb = $this->input->post('sanksi_pkb1');
			$swdllj2 = $this->input->post('swdllj2');
			$sanksi_swdkllj = $this->input->post('sanksi_swdllj_b1');
			$adm_stnk2 = $this->input->post('adm_stnk3');
			$ganti2 = $this->input->post('ganti2');
			$adm_tnkb2 = $this->input->post('adm_tnkb2');
			$jenis_k2 = $this->input->post('jenis_k2');
			$accbpkb2 = $this->input->post('accbpkb2');
			$accktp2 = $this->input->post('accktp2');
			$loksus2 = $this->input->post('loksus2');
			$admskp2 = $this->input->post('admskp2');
			$jenis_k_bpkb2 = $this->input->post('jenis_k_bpkb2');
			$jenis_k_ktp2 = $this->input->post('jenis_k_ktp2');
			$jenis_k_loksus2 = $this->input->post('jenis_k_loksus2');
			$jenis_k_skp2 = $this->input->post('jenis_k_skp2');
			$jasa_bpkb2 = $this->input->post('jasa_bpkb2');
			$jasa_ktp2 = $this->input->post('jasa_ktp2');
			$jasa_loksus2 = $this->input->post('jasa_loksus2');
			$jasa_skp2 = $this->input->post('jasa_skp2');

			// Tahun Lalu
			$pkb4 = $this->input->post('pkb4');
			$telat_bln = $this->input->post('telat_bln2');
			$telat_thn = $this->input->post('telat_thn');
			$sanksi_pkb2 = $this->input->post('sanksi_pkb2');
			$swdllj3 = $this->input->post('swdllj3');
			$sanksi_swdllj_b2 = $this->input->post('sanksi_swdllj_b2');
			$biaya_jasa = $this->input->post('biaya_jasa4');
			$total_pajak = $this->input->post('total_pajak4');
			$total = $this->input->post('total_tahun');

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
			'jenis_jasa'=>$jenis_jasa,
			'wilayah'=>$wilayah,
			'jenis_k'=>$jenis_k, 
			'jenis_ktahun'=>$jenis_k2, 
			'pkb'=>$pkb,
			'pkb_bulan'=>$pkb3,
			'pkb_tahun'=>$pkb4,
			'bbnk'=>$bbnk,
			'bbnk_bulan'=>$bbnkb3,
			'adm_stnk'=>filter_var($adm_stnk,FILTER_SANITIZE_NUMBER_INT),
			'adm_stnkb'=>filter_var($adm_stnk2,FILTER_SANITIZE_NUMBER_INT),
			'ganti'=>$ganti,
			'ganti1'=>$ganti2,
			'adm_tnkb'=>$adm_tnkb,
			'adm_tnkb_bulan'=>$adm_tnkb,
			'telat'=>$telat,
			'telat_t_t'=>$telat_thn,
			'telat_b_t'=>$telat_bln,
			'sanksi_pkb'=>filter_var($sanksi_pkb,FILTER_SANITIZE_NUMBER_INT),
			'sanksi_pkbt'=>filter_var($sanksi_pkb2,FILTER_SANITIZE_NUMBER_INT),
			'swdkllj'=>filter_var($swdllj,FILTER_SANITIZE_NUMBER_INT),
			'swdkllj_bulan'=>filter_var($swdllj2,FILTER_SANITIZE_NUMBER_INT),
			'swdkllj_tahun'=>filter_var($swdllj3,FILTER_SANITIZE_NUMBER_INT),
			'sanksi_swdkllj'=>filter_var($sanksi_swdkllj,FILTER_SANITIZE_NUMBER_INT),
			'sanksi_swdkllj_t'=>filter_var($sanksi_swdllj_b2,FILTER_SANITIZE_NUMBER_INT),

			'ganti_lainnya'=>$accbpkb.','.$accktp.','.$admskp.','.$loksus.',',
			'kendaraan'=>$jenis_k_bpkb.','.$jenis_k_ktp.','.$jenis_k_skp.','.$jenis_k_loksus.',',
			'biaya_lainnya'=>$jasa_bpkb.','.$jasa_ktp.','.$jasa_skp.','.$jasa_loksus.',',

			'ganti_bulan'=>$accbpkb2.','.$accktp2.','.$admskp2.','.$loksus2.',',
			'kendaraan_bulan'=>$jenis_k_bpkb2.','.$jenis_k_ktp2.','.$jenis_k_skp2.','.$jenis_k_loksus2.',',
			'biaya_bulan'=>$jasa_bpkb2.','.$jasa_ktp2.','.$jasa_skp2.','.$jasa_loksus2.',',

			'biaya_jasa'=>filter_var($biaya_jasa,FILTER_SANITIZE_NUMBER_INT),
			'total_pajak'=>filter_var($total_pajak,FILTER_SANITIZE_NUMBER_INT),
			'total'=>filter_var($total,FILTER_SANITIZE_NUMBER_INT),
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
			$json = array('success'=>false, 'msg'=>'warning','id'=>$this->input->post('id'));
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
				'total_cpajak'=>$total_pajak,
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
				$json =  array('success'=>true, 'msg'=>'Berhasil','id'=>$id);
			}else{
				$json =  array('success'=>true, 'msg'=>'Gagal');
			}
		}
		echo json_encode($json);
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
		$wilayah = $this->input->post('wilayah');
		$jenis_jasa = $this->input->post('jenis_jasa');
		$jenis_swd = $this->input->post('jenis_swd');
		if ($jenis == 'Pajak Hidup') {
			$pkb = $this->input->post('pkb1');
			$swdllj = $this->input->post('swdllj1');
			$adm_stnk = $this->input->post('adm_stnk1');
			$adm_tnkb = $this->input->post('adm_tnkb1');
			$biaya_jasa = $this->input->post('biaya_jasa1');
			$total_pajak = $this->input->post('total_pajak1');
			$total = $this->input->post('total_hidup');
		}elseif ($jenis == 'Telat bulanan') {
			$pkb = $this->input->post('pkb2');
			$telat = $this->input->post('telat');
			$sanksi_pkb = $this->input->post('sanksi_pkb1');
			$swdllj = $this->input->post('swdllj2');
			$skp = $this->input->post('skp');
			$jenis_k = $this->input->post('jenis_k2');
			$jasa_skp = $this->input->post('jasa_skp');
			$baliknama = $this->input->post('baliknama');
			$jenis_balik = $this->input->post('jenis_k_balik');
			$balik = $this->input->post('balik_nama');
			$stnk = $this->input->post('stnk_h');
			$jenis_stnk = $this->input->post('jenis_k_stnk');
			$stnk_h = $this->input->post('stnk_hilang');
			$laporan_h = $this->input->post('laporan_h');
			$jenis_laporan = $this->input->post('jenis_k_laporan');
			$laporan = $this->input->post('laporan_hilang');
			$pkb1 = $this->input->post('pkb3');
			$swdllj1 = $this->input->post('swdllj3');
			$adm_stnk = $this->input->post('adm_stnk2');
			$adm_tnkb = $this->input->post('adm_tnkb2');
			$biaya_jasa = $this->input->post('biaya_jasa2');
			$total_pajak = $this->input->post('total_pajak2');
			$total = $this->input->post('total_bulan');
		}else{
			$pkb = $this->input->post('pkb4');
			$tahun_thn = $this->input->post('telat_thn');
			$telat = $this->input->post('telat2');
			$sanksi_pkb = $this->input->post('sanksi_pkb2');
			$swdllj = $this->input->post('swdllj4');
			$sanksi_swdkllj = $this->input->post('sanski_swdllj2');
			$skp = $this->input->post('skp_t');
			$jenis_skp = $this->input->post('jenis_skp');
			$jasa_skp = $this->input->post('adm_skp_t');
			$baliknama = $this->input->post('balik_n_t');
			$jenis_balik = $this->input->post('jenis_balik_t');
			$balik = $this->input->post('jasa_balik_t');
			$stnk = $this->input->post('stnk_h_t');
			$jenis_stnk = $this->input->post('jenis_stnk_t');
			$stnk_h = $this->input->post('jasa_stnk_t');
			$laporan_h = $this->input->post('laporan_h_t');
			$jenis_laporan = $this->input->post('jenis_laporan_t');
			$laporan = $this->input->post('jasa_laporan_t');
			$pkb1 = $this->input->post('pkb5');
			$swdllj1 = $this->input->post('swdllj5');
			$adm_stnk = $this->input->post('adm_stnk3');
			$adm_tnkb = $this->input->post('adm_tnkb3');
			$biaya_jasa = $this->input->post('biaya_jasa3');
			$total_pajak = $this->input->post('total_pajak3');
			$total = $this->input->post('total_su');
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
			'wilayah'=>$wilayah, 
			'sanksi_pkb'=>$sanksi_pkb, 
			'jasa'=>$skp.','.$baliknama.','.$stnk.','.$laporan_h.',', 
			'jenis_biaya'=>$jenis_skp.','.$jenis_balik.','.$jenis_stnk.','.$jenis_laporan.',', 
			'harga_jasa'=>$jasa_skp.','.$balik.','.$stnk_h.','.$laporan.',',
			'jenis_jasa'=>$jenis_jasa, 
			'pkb'=>$pkb,
			'pkb1'=>$pkb1,
			'swdkllj'=>$swdllj,
			'swdkllj1'=>$swdllj1,
			'sanksi_swdkllj'=>$sanksi_swdkllj,
			'adm_stnk'=>$adm_stnk,
			'adm_tnkb'=>$adm_tnkb,
			'telat'=>$telat,
			'telat_tahun'=>$tahun_thn,
			'biaya_jasa'=>filter_var($biaya_jasa,FILTER_SANITIZE_NUMBER_INT),
			'total_pajak'=>filter_var($total_pajak,FILTER_SANITIZE_NUMBER_INT),
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
				redirect('main/berkas/'.$id);
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
			$json = array('success'=>false, 'msg'=>'warning','id'=>$this->input->post('id'));
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
				'total_cpajak'=>$total_pajak,
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
				$json =  array('success'=>true, 'msg'=>'Berhasil','id'=>$id);
			}else{
				$json =  array('success'=>true, 'msg'=>'Gagal');
			}
		}
		echo json_encode($json);
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
		$jenis_jasa = $this->input->post('jenis_jasa');
		$wilayah = $this->input->post('wilayah');
		if ($jenis=='Pajak Hidup') {
			$adm_stnk = $this->input->post('adm_stnk1');
			$biaya_jasa = $this->input->post('biaya_jasa1');
		}else if ($jenis=='Pajak Normal') {
			$pkb = $this->input->post('pkb1');
			$swdllj = $this->input->post('swdllj1');
			$adm_stnk = $this->input->post('adm_stnk2');
			$skp = $this->input->post('skp1');
			$jenis_skp = $this->input->post('jenis_skp1');
			$jasa_skp = $this->input->post('jasa_skp1');
			$stnk_hb = $this->input->post('stnk_hb1');
			$jenis_stnkhb = $this->input->post('jenis_stnkhb1');
			$jasa_stnkhb = $this->input->post('jasa_stnkhb1');
			$stnk_hl = $this->input->post('stnk_hl1');
			$jenis_stnkhl = $this->input->post('jenis_stnkhl1');
			$jasa_stnkhl = $this->input->post('jasa_stnkhl1');
			$rubah_bpkb = $this->input->post('rubah_bpkb1');
			$jenis_r_bpkb = $this->input->post('jenis_r_bpkb1');
			$jasa_rbpkb = $this->input->post('jasa_rbpkb1');
			$baliknama = $this->input->post('baliknama1');
			$jenis_balikn = $this->input->post('jenis_balikn1');
			$jasa_balikn = $this->input->post('jasa_balikn1');
			$ganti = $this->input->post('ganti1');
			$jenis_plat = $this->input->post('jenis_plat1');
			$adm_tnkb = $this->input->post('adm_tnkb1');
			$stnk_gantung = $this->input->post('stnk_gantung1');
			$jenis_stnkg = $this->input->post('jenis_stnkg1');
			$jasa_stnkg = $this->input->post('jasa_stnkg1');
			$ktp_bpkb = $this->input->post('ktp_bpkb1');
			$jenis_ktp_f = $this->input->post('jenis_ktp_f1');
			$jasa_ktp_f = $this->input->post('jasa_ktp_f1');
			$tanpa_ktp = $this->input->post('tanpa_ktp1');
			$jenis_tktp = $this->input->post('jenis_tktp1');
			$jasa_tktp = $this->input->post('jasa_tktp1');
			$tanpa_ktpbpkb = $this->input->post('tanpa_ktpbpkb1');
			$jenis_t_ktpfc = $this->input->post('jenis_t_ktpfc1');
			$jasa_t_ktpfc = $this->input->post('jasa_t_ktpfc1');
			$laporan_h = $this->input->post('laporan_h1');
			$jenis_laporan = $this->input->post('jenis_laporan1');
			$laporan_hilang = $this->input->post('laporan_hilang1');
			$biaya_jasa = $this->input->post('biaya_jasa2');
			$total_pajak = $this->input->post('total_pajak1');
			$total = $this->input->post('total_hidup');
		}else if ($jenis=='Telat bulanan') {
			$pkb = $this->input->post('pkb2');
			$telat = $this->input->post('telat');
			$sanksi_pkb = $this->input->post('sanksi_pkb1');
			$swdllj = $this->input->post('swdllj2');
			$sanksi_swdkllj = $this->input->post('sanksi_swdllj_b1');	
			$adm_stnk = $this->input->post('adm_stnk3');	
			$skp = $this->input->post('skp2');
			$jenis_skp = $this->input->post('jenis_skp2');
			$jasa_skp = $this->input->post('jasa_skp2');
			$stnk_hb = $this->input->post('stnk_hb2');
			$jenis_stnkhb = $this->input->post('jenis_stnkhb2');
			$jasa_stnkhb = $this->input->post('jasa_stnkhb2');
			$stnk_hl = $this->input->post('stnk_hl2');
			$jenis_stnkhl = $this->input->post('jenis_stnkhl2');
			$jasa_stnkhl = $this->input->post('jasa_stnkhl2');
			$rubah_bpkb = $this->input->post('rubah_bpkb2');
			$jenis_r_bpkb = $this->input->post('jenis_r_bpkb2');
			$jasa_rbpkb = $this->input->post('jasa_rbpkb2');
			$baliknama = $this->input->post('baliknama2');
			$jenis_balikn = $this->input->post('jenis_balikn2');
			$jasa_balikn = $this->input->post('jasa_balikn2');
			$ganti = $this->input->post('ganti2');
			$jenis_plat = $this->input->post('jenis_plat2');
			$adm_tnkb = $this->input->post('adm_tnkb2');
			$stnk_gantung = $this->input->post('stnk_gantung2');
			$jenis_stnkg = $this->input->post('jenis_stnkg2');
			$jasa_stnkg = $this->input->post('jasa_stnkg2');
			$ktp_bpkb = $this->input->post('ktp_bpkb2');
			$jenis_ktp_f = $this->input->post('jenis_ktp_f2');
			$jasa_ktp_f = $this->input->post('jasa_ktp_f2');
			$tanpa_ktp = $this->input->post('tanpa_ktp2');
			$jenis_tktp = $this->input->post('jenis_tktp2');
			$jasa_tktp = $this->input->post('jasa_tktp2');
			$tanpa_ktpbpkb = $this->input->post('tanpa_ktpbpkb2');
			$jenis_t_ktpfc = $this->input->post('jenis_t_ktpfc2');
			$jasa_t_ktpfc = $this->input->post('jasa_t_ktpfc2');
			$laporan_h = $this->input->post('laporan_h2');
			$jenis_laporan = $this->input->post('jenis_laporan2');
			$laporan_hilang = $this->input->post('laporan_hilang2');
			$biaya_jasa = $this->input->post('biaya_jasa3');
			$total_pajak = $this->input->post('total_pajak2');
			$total = $this->input->post('total_bulan');
		}else{
			$pkb = $this->input->post('pkb3');
			$telat_thn = $this->input->post('telat_thn');
			$telat = $this->input->post('telat_t_bln');
			$sanksi_pkb = $this->input->post('sanksi_pkb2');
			$swdllj = $this->input->post('swdllj3');
			$sanski_swdllj = $this->input->post('sanski_swdllj1');

			$pkb1 = $this->input->post('pkb4');
			$cek_telat = $this->input->post('cek_telat');
			$jenis_telat = $this->input->post('jenis_telat');
			$telat_thn1 = $this->input->post('telat_thn1');
			$telat1 = $this->input->post('telat_t_bln1');
			$sanksi_pkb1 = $this->input->post('sanksi_pkb3');
			$sanski_swdllj1 = $this->input->post('sanski_swdllj3');
			$swdllj1 = $this->input->post('swdllj4');
			$adm_stnk = $this->input->post('adm_stnk4');

			$skp = $this->input->post('skp3');
			$jenis_skp = $this->input->post('jenis_skp3');
			$jasa_skp = $this->input->post('jasa_skp3');
			$stnk_hb = $this->input->post('stnk_hb3');
			$jenis_stnkhb = $this->input->post('jenis_stnkhb3');
			$jasa_stnkhb = $this->input->post('jasa_stnkhb3');
			$stnk_hl = $this->input->post('stnk_hl3');
			$jenis_stnkhl = $this->input->post('jenis_stnkhl3');
			$jasa_stnkhl = $this->input->post('jasa_stnkhl3');
			$rubah_bpkb = $this->input->post('rubah_bpkb3');
			$jenis_r_bpkb = $this->input->post('jenis_r_bpkb3');
			$jasa_rbpkb = $this->input->post('jasa_rbpkb3');
			$baliknama = $this->input->post('baliknama3');
			$jenis_balikn = $this->input->post('jenis_balikn3');
			$jasa_balikn = $this->input->post('jasa_balikn3');
			$ganti = $this->input->post('ganti3');
			$jenis_plat = $this->input->post('jenis_plat3');
			$adm_tnkb = $this->input->post('adm_tnkb3');
			$stnk_gantung = $this->input->post('stnk_gantung3');
			$jenis_stnkg = $this->input->post('jenis_stnkg3');
			$jasa_stnkg = $this->input->post('jasa_stnkg3');
			$ktp_bpkb = $this->input->post('ktp_bpkb3');
			$jenis_ktp_f = $this->input->post('jenis_ktp_f3');
			$jasa_ktp_f = $this->input->post('jasa_ktp_f3');
			$tanpa_ktp = $this->input->post('tanpa_ktp3');
			$jenis_tktp = $this->input->post('jenis_tktp3');
			$jasa_tktp = $this->input->post('jasa_tktp3');
			$tanpa_ktpbpkb = $this->input->post('tanpa_ktpbpkb3');
			$jenis_t_ktpfc = $this->input->post('jenis_t_ktpfc3');
			$jasa_t_ktpfc = $this->input->post('jasa_t_ktpfc3');
			$laporan_h = $this->input->post('laporan_h3');
			$jenis_laporan = $this->input->post('jenis_laporan3');
			$laporan_hilang = $this->input->post('laporan_hilang3');
			$biaya_jasa = $this->input->post('biaya_jasa4');
			$total_pajak = $this->input->post('total_pajak3');
			$total = $this->input->post('total_bulan2');
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
			'wilayah' =>$wilayah,
			'jenis_jasa'=>$jenis_jasa,
			'ganti'=>$skp.','.$stnk_hb.','.$stnk_hl.','.$rubah_bpkb.','.$baliknama.','.$ganti.','.$stnk_gantung.','.$ktp_bpkb.','.$tanpa_ktp.','.$tanpa_ktpbpkb.','.$laporan_h.',',
			'jasa'=>$jenis_skp.','.$jenis_stnkhb.','.$jenis_stnkhl.','.$jenis_r_bpkb.','.$jenis_balikn.','.$jenis_plat.','.$jenis_stnkg.','.$jenis_ktp_f.','.$jenis_tktp.','.$jenis_t_ktpfc.','.$jenis_laporan.',',
			'harga_jasa'=> $jasa_skp.','.$jasa_stnkhb.','.$jasa_stnkhl.','.$jasa_rbpkb.','.$jasa_balikn.','.$adm_tnkb.','.$jasa_stnkg.','.$jasa_ktp_f.','.$jasa_tktp.','.$jasa_t_ktpfc.','.$laporan_hilang.',',
			'pkb'=>$pkb,
			'pkb1'=>$pkb1,
			'swdkllj'=>$swdllj,
			'swdkllj1'=>$swdllj1,
			'sanksi_swdkllj'=>$sanksi_swdkllj,
			'sanksi_swdkllj1'=>$sanski_swdllj1,
			'sanksi_pkb'=>$sanksi_pkb,
			'sanksi_pkb1'=>$sanksi_pkb1,
			'adm_stnk'=>$adm_stnk,
			'adm_tnkb'=>$adm_tnkb,
			'telat'=>$telat,
			'telat_t'=>$telat_thn,
			'telat1'=>$telat_thn1,
			'telat_b_t'=>$telat1,
			'k_telat'=>$cek_telat,
			'biaya_jasa'=>filter_var($biaya_jasa,FILTER_SANITIZE_NUMBER_INT),
			'total_pajak'=>filter_var($total_pajak,FILTER_SANITIZE_NUMBER_INT),
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
			$json = array('success'=>false, 'msg'=>'warning','id'=>$this->input->post('id'));
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
				'total_cpajak'=>$total_pajak,

				'biaya_ps'=>$biaya_ps,
				'harga_ps'=>$harga_ps,
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
				'psl'=>$psl,
				'harga_psl'=>$harga_psl,
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
				$json =  array('success'=>true, 'msg'=>'Berhasil','id'=>$id);
			}else{
				$json =  array('success'=>true, 'msg'=>'Gagal');
			}
		}
		echo json_encode($json);
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
		$jenis_jasa = $this->input->post('jenis_jasa');
		if ($jenis=='Pajak Hidup') {
			$pkb = $this->input->post('pkb1');
			$bbnk = $this->input->post('bbnkb1');
			$adm_stnk = $this->input->post('adm_stnk1');
			$biaya_jasa = $this->input->post('biaya_jasa1');
			$total_pajak = $this->input->post('total_pajak1');
			$total = $this->input->post('total_hidup');
		}else if($jenis=='Pajak Hidup'){
			$pkb = $this->input->post('pkb2');
			$bbnkb = $this->input->post('bbnkb2');
			$swdllj = $this->input->post('swdllj1');
			$adm_stnk = $this->input->post('adm_stnk2');
			$skp = $this->input->post('skp1');
			$jenis_skp = $this->input->post('jenis_skp1');
			$jasa_skp = $this->input->post('jasa_skp1');
			$stnk_hb = $this->input->post('stnk_hb1');
			$jenis_stnkhb = $this->input->post('jenis_stnkhb1');
			$jasa_stnkhb = $this->input->post('jasa_stnkhb1');
			$stnk_hl = $this->input->post('stnk_hl1');
			$jenis_stnkhl = $this->input->post('jenis_stnkhl1');
			$jasa_stnkhl = $this->input->post('jasa_stnkhl1');
			$rubah_bpkb = $this->input->post('rubah_bpkb1');
			$jenis_r_bpkb = $this->input->post('jenis_r_bpkb1');
			$jasa_rbpkb = $this->input->post('jasa_rbpkb1');
			$rubah_stnk = $this->input->post('rubah_stnkbpkb1');
			$jenis_r_stnk = $this->input->post('jenis_r_stnk1');
			$rubah_rstnk = $this->input->post('rubah_rstnk');
			$baliknama = $this->input->post('baliknama1');
			$jenis_balikn = $this->input->post('jenis_balikn1');
			$jasa_balikn = $this->input->post('jasa_balikn1');
			$ganti = $this->input->post('ganti1');
			$jenis_plat = $this->input->post('jenis_plat1');
			$adm_tnkb = $this->input->post('adm_tnkb1');
			$stnk_gantung = $this->input->post('stnk_gantung1');
			$jenis_stnkg = $this->input->post('jenis_stnkg1');
			$jasa_stnkg = $this->input->post('jasa_stnkg1');
			$ktp_bpkb = $this->input->post('ktp_bpkb1');
			$jenis_ktp_f = $this->input->post('jenis_ktp_f1');
			$jasa_ktp_f = $this->input->post('jasa_ktp_f1');
			$tanpa_ktp = $this->input->post('tanpa_ktp1');
			$jenis_tktp = $this->input->post('jenis_tktp1');
			$jasa_tktp = $this->input->post('jasa_tktp1');
			$tanpa_ktpbpkb = $this->input->post('tanpa_ktpbpkb1');
			$jenis_t_ktpfc = $this->input->post('jenis_t_ktpfc1');
			$jasa_t_ktpfc = $this->input->post('jasa_t_ktpfc1');
			$laporan_h = $this->input->post('laporan_h1');
			$jenis_laporan = $this->input->post('jenis_laporan1');
			$laporan_hilang = $this->input->post('laporan_hilang1');
			$bbn = $this->input->post('bbn1');
			$jenis_bbn = $this->input->post('jenis_bbn1');
			$jasa_bbn = $this->input->post('jasa_bbn1');
			$biaya_jasa = $this->input->post('biaya_jasa2');
			$total_pajak = $this->input->post('total_pajak2');
			$total = $this->input->post('total_normal');
		}else if($jenis=='Telat bulanan'){
			$pkb = $this->input->post('pkb3');
			$bbnkb = $this->input->post('bbnkb3');
			$telat = $this->input->post('telat');
			$sanksi_pkb = $this->input->post('sanksi_pkb1');
			$swdllj = $this->input->post('swdllj2');
			$sanksi_swdllj = $this->input->post('sanksi_swdllj_b1');
			$adm_stnk3 = $this->input->post('adm_stnk3');
			$skp = $this->input->post('skp2');
			$jenis_skp = $this->input->post('jenis_skp2');
			$jasa_skp = $this->input->post('jasa_skp2');
			$stnk_hb = $this->input->post('stnk_hb2');
			$jenis_stnkhb = $this->input->post('jenis_stnkhb2');
			$jasa_stnkhb = $this->input->post('jasa_stnkhb2');
			$stnk_hl = $this->input->post('stnk_hl2');
			$jenis_stnkhl = $this->input->post('jenis_stnkhl2');
			$jasa_stnkhl = $this->input->post('jasa_stnkhl2');
			$rubah_bpkb = $this->input->post('rubah_bpkb2');
			$jenis_r_bpkb = $this->input->post('jenis_r_bpkb2');
			$jasa_rbpkb = $this->input->post('jasa_rbpkb2');
			$rubah_stnk = $this->input->post('rubah_stnkbpkb2');
			$jenis_r_stnk = $this->input->post('jenis_r_stnk2');
			$rubah_rstnk = $this->input->post('rubah_rstnk');
			$baliknama = $this->input->post('baliknama2');
			$jenis_balikn = $this->input->post('jenis_balikn2');
			$jasa_balikn = $this->input->post('jasa_balikn2');
			$ganti = $this->input->post('ganti2');
			$jenis_plat = $this->input->post('jenis_plat2');
			$adm_tnkb = $this->input->post('adm_tnkb2');
			$stnk_gantung = $this->input->post('stnk_gantung2');
			$jenis_stnkg = $this->input->post('jenis_stnkg2');
			$jasa_stnkg = $this->input->post('jasa_stnkg2');
			$ktp_bpkb = $this->input->post('ktp_bpkb2');
			$jenis_ktp_f = $this->input->post('jenis_ktp_f2');
			$jasa_ktp_f = $this->input->post('jasa_ktp_f2');
			$tanpa_ktp = $this->input->post('tanpa_ktp2');
			$jenis_tktp = $this->input->post('jenis_tktp2');
			$jasa_tktp = $this->input->post('jasa_tktp2');
			$tanpa_ktpbpkb = $this->input->post('tanpa_ktpbpkb2');
			$jenis_t_ktpfc = $this->input->post('jenis_t_ktpfc2');
			$jasa_t_ktpfc = $this->input->post('jasa_t_ktpfc2');
			$laporan_h = $this->input->post('laporan_h2');
			$jenis_laporan = $this->input->post('jenis_laporan2');
			$laporan_hilang = $this->input->post('laporan_hilang2');
			$bbn = $this->input->post('bbn2');
			$jenis_bbn = $this->input->post('jenis_bbn2');
			$jasa_bbn = $this->input->post('jasa_bbn2');
			$biaya_jasa = $this->input->post('biaya_jasa3');
			$total_pajak = $this->input->post('total_pajak3');
			$total = $this->input->post('total_bulan');
		}else{
			$pkb = $this->input->post('pkb4');
			$telat = $this->input->post('telat_t_bln');
			$telat_thn = $this->input->post('telat_thn');
			$sanksi_pkb = $this->input->post('sanksi_pkb2');
			$swdllj = $this->input->post('swdllj3');
			$sanski_swdllj = $this->input->post('sanski_swdllj1');
			$pkb1 = $this->input->post('pkb5');
			$bbnkb_thn = $this->input->post('bbnkb_thn');
			$cek_telat = $this->input->post('cek_telat');
			$jenis_telat = $this->input->post('jenis_telat');
			$telat_thn1 = $this->input->post('telat_thn1');
			$sanksi_pkb1 = $this->input->post('sanksi_pkb3');
			$swdllj1 = $this->input->post('swdllj4');
			$sanski_swdllj1 = $this->input->post('sanski_swdllj2');
			$adm_stnk = $this->input->post('adm_stnk4');
			$skp = $this->input->post('skp3');
			$jenis_skp = $this->input->post('jenis_skp3');
			$jasa_skp = $this->input->post('jasa_skp3');
			$stnk_hb = $this->input->post('stnk_hb3');
			$jenis_stnkhb = $this->input->post('jenis_stnkhb3');
			$jasa_stnkhb = $this->input->post('jasa_stnkhb3');
			$stnk_hl = $this->input->post('stnk_hl3');
			$jenis_stnkhl = $this->input->post('jenis_stnkhl3');
			$jasa_stnkhl = $this->input->post('jasa_stnkhl3');
			$rubah_bpkb = $this->input->post('rubah_bpkb3');
			$jenis_r_bpkb = $this->input->post('jenis_r_bpkb3');
			$jasa_rbpkb = $this->input->post('jasa_rbpkb3');
			$rubah_stnk = $this->input->post('rubah_stnkbpkb3');
			$jenis_r_stnk = $this->input->post('jenis_r_stnk3');
			$rubah_rstnk = $this->input->post('rubah_rstnk');
			$baliknama = $this->input->post('baliknama3');
			$jenis_balikn = $this->input->post('jenis_balikn3');
			$jasa_balikn = $this->input->post('jasa_balikn3');
			$ganti = $this->input->post('ganti3');
			$jenis_plat = $this->input->post('jenis_plat3');
			$adm_tnkb = $this->input->post('adm_tnkb3');
			$stnk_gantung = $this->input->post('stnk_gantung3');
			$jenis_stnkg = $this->input->post('jenis_stnkg3');
			$jasa_stnkg = $this->input->post('jasa_stnkg3');
			$ktp_bpkb = $this->input->post('ktp_bpkb3');
			$jenis_ktp_f = $this->input->post('jenis_ktp_f3');
			$jasa_ktp_f = $this->input->post('jasa_ktp_f3');
			$tanpa_ktp = $this->input->post('tanpa_ktp3');
			$jenis_tktp = $this->input->post('jenis_tktp3');
			$jasa_tktp = $this->input->post('jasa_tktp3');
			$tanpa_ktpbpkb = $this->input->post('tanpa_ktpbpkb3');
			$jenis_t_ktpfc = $this->input->post('jenis_t_ktpfc3');
			$jasa_t_ktpfc = $this->input->post('jasa_t_ktpfc3');
			$laporan_h = $this->input->post('laporan_h3');
			$jenis_laporan = $this->input->post('jenis_laporan3');
			$laporan_hilang = $this->input->post('laporan_hilang3');
			$bbn = $this->input->post('bbn3');
			$jenis_bbn = $this->input->post('jenis_bbn3');
			$jasa_bbn = $this->input->post('jasa_bbn3');
			$biaya_jasa = $this->input->post('biaya_jasa4');
			$total_pajak = $this->input->post('total_pajak4');
			$total_tahun = $this->input->post('total_tahun');
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
			'wilayah'=>$wilayah,
			'ganti'=>$skp.','.$stnk_hb.','.$stnk_hl.','.$rubah_bpkb.','.$rubah_stnk.','.$baliknama.','.$ganti.','.$stnk_gantung.','.$ktp_bpkb.','.$tanpa_ktp.','.$tanpa_ktpbpkb.','.$laporan_h.','.$bbn.',',
			'jasa'=>$jenis_skp.','.$jenis_stnkhb.','.$jenis_stnkhl.','.$jenis_r_bpkb.','.$jenis_r_stnk.','.$jenis_balikn.','.$jenis_plat.','.$jenis_stnkg.','.$jenis_ktp_f.','.$jenis_tktp.','.$jenis_t_ktpfc.','.$jenis_laporan.','.$jenis_bbn.',',
			'harga_jasa'=> $jasa_skp.','.$jasa_stnkhb.','.$jasa_stnkhl.','.$jasa_rbpkb.','.$rubah_rstnk.','.$jasa_balikn.','.$adm_tnkb.','.$jasa_stnkg.','.$jasa_ktp_f.','.$jasa_tktp.','.$jasa_t_ktpfc.','.$laporan_hilang.','.$jasa_bbn.',',
			'jenis_kendaraan' => $jenis_kendaraan, 
			'jenis_jasa' => $jenis_jasa, 
			'pkb'=>$pkb,
			'pkb1' => $pkb1,
			'bbnk'=>$bbnk,
			'adm_stnk'=>filter_var($adm_stnk,FILTER_SANITIZE_NUMBER_INT),
			'adm_tnkb'=>filter_var($adm_tnkb,FILTER_SANITIZE_NUMBER_INT),
			'cek_telat'=>$cek_telat,
			'jenis_telat'=>$jenis_telat,
			'sanksi_pkb'=>filter_var($sanksi_pkb,FILTER_SANITIZE_NUMBER_INT),
			'sanksi_pkb1'=>filter_var($sanksi_pkb1,FILTER_SANITIZE_NUMBER_INT),
			'swdkllj'=>filter_var($swdllj,FILTER_SANITIZE_NUMBER_INT),
			'swdkllj1'=>filter_var($swdllj1,FILTER_SANITIZE_NUMBER_INT),
			'sanksi_swdkllj'=>filter_var($sanksi_swdkllj,FILTER_SANITIZE_NUMBER_INT),
			'sanksi_swdkllj1'=>filter_var($sanski_swdllj1,FILTER_SANITIZE_NUMBER_INT),
			'biaya_jasa'=>filter_var($biaya_jasa,FILTER_SANITIZE_NUMBER_INT),
			'total_pajak'=>filter_var($total_pajak,FILTER_SANITIZE_NUMBER_INT),
			'telat'=>$telat,
			'telat_thn'=>$telat_thn,
			'telat_b_t'=>$telat_thn1,
			'hari'=>$dayList[$day],
			'tanggal'=>$gabungan
		));
		if ($query==TRUE) {
			$this->session->set_flashdata('sukses', 'Berhasil Simpan data');
			$id = $this->db->insert_id();
			redirect('main/transaksi_sb/'.$id);
		}else{
			$this->session->set_flashdata('gagal', 'Gagal Simpan data');
			redirect('main/dashboard');
		}
	}
	public function cetak_sb()
	{
		$cek = $this->db->get_where('cetak_sb', array('id_join'=>$this->input->post('id')))->num_rows();
		if ($cek > 0) {
			//$this->session->set_flashdata('gagal', 'Data sudah di isi');
			$json = array('success'=>false, 'msg'=>'warning','id'=>$this->input->post('id'));
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
			$sim1 = $this->input->post('sim1');
			$sim2 = $this->input->post('sim2');
			$stnk1 = $this->input->post('stnk1');
			$stnk2 = $this->input->post('stnk2');
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
			$proses_sh = $this->input->post('proses_sh');
			$harga_sh = $this->input->post('harga_sh');
			$biaya_bn = $this->input->post('biaya_bn');
			$harga_bn = $this->input->post('harga_bn');
			$adm_skp = $this->input->post('adm_skp');
			$harga_adm = $this->input->post('harga_adm');
			$slp = $this->input->post('slp');
			$harga_slp = $this->input->post('harga_slp');
			$plat = $this->input->post('plat');
			$harga_plat = $this->input->post('harga_plat');
			$bn_gp = $this->input->post('bn_gp');
			$harga_balik = $this->input->post('harga_balik');
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
			$query = $this->db->insert('cetak_sb', array(
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
				'tahun_pajak'=>$pajak,
				'lainnya'=>$lainnya,
				'pengurusan'=>$balik.','.$penyesuaian,
				'pajak_ini'=>$pajak_ini,
				'pajak_lalu'=>$pajak_lalu,
				'harga_pajak_ini'=>$harga_ini,
				'harga_pajak_lalu'=>$harga_lalu,
				'total_cpajak'=>$total_pajak,
				'proses_sh'=>$proses_sh,
				'harga_sh'=>$harga_sh,
				'proses_bn'=>$biaya_bn,
				'harga_bn'=>$harga_bn,
				'adm_skp'=>$adm_skp,
				'harga_adm'=>$harga_adm,
				'surat_lp'=>$slp,
				'harga_lp'=>$harga_slp,
				'plat'=>$plat,
				'harga_plat'=>$harga_plat,
				'balik_nama'=>$bn_gp,
				'harga_balik'=>$harga_balik,
				'proses_pa'=>$p_alamat,
				'harga_pa'=>$harga_alamat,
				'psl'=>$psl,
				'harga_psl'=>$harga_psl,
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
				$json =  array('success'=>true, 'msg'=>'Berhasil','id'=>$id);
			}else{
				$json =  array('success'=>true, 'msg'=>'Gagal');
			}
		}
		echo json_encode($json);
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
		$wilayah = $this->input->post('wilayah');
		$jenis_jasa = $this->input->post('jenis_jasa');
		$jenis_swd = $this->input->post('jenis_swd');
		if ($jenis == 'Pajak Hidup') {
			$pkb = $this->input->post('pkb1');
			$bbnkb = $this->input->post('bbnkb1');
			$swdllj = $this->input->post('swdllj1');
			$adm_stnk = $this->input->post('adm_stnk1');
			$adm_tnkb = $this->input->post('adm_tnkb1');
			$biaya_jasa = $this->input->post('biaya_jasa1');
			$total_pajak = $this->input->post('total_pajak1');
			$total = $this->input->post('total_hidup');
		}elseif ($jenis == 'Telat bulanan') {
			$pkb = $this->input->post('pkb2');
			$telat = $this->input->post('telat');
			$sanksi_pkb = $this->input->post('sanksi_pkb1');
			$swdllj = $this->input->post('swdllj2');
			$sanksi_swdkllj = $this->input->post('sanksi_swdllj_b1');

			$skp = $this->input->post('skp');
			$jenis_k = $this->input->post('jenis_k2');
			$jasa_skp = $this->input->post('jasa_skp');

			$baliknama = $this->input->post('baliknama');
			$jenis_balik = $this->input->post('jenis_k_balik');
			$balik = $this->input->post('balik_nama');

			$stnk = $this->input->post('stnk_h');
			$jenis_stnk = $this->input->post('jenis_k_stnk');
			$stnk_h = $this->input->post('stnk_hilang');

			$laporan_h = $this->input->post('laporan_h');
			$jenis_laporan = $this->input->post('jenis_k_laporan');
			$laporan = $this->input->post('laporan_hilang');

			$ganti = $this->input->post('ganti1');
			$jenis_ganti = $this->input->post('jenis_k');
			$adm_ganti = $this->input->post('adm_tnkb1');

			$bbn = $this->input->post('bbn');
			$jenis_bbn = $this->input->post('jenis_k_bbn');
			$jasa_bbn = $this->input->post('jasa_bbn');

			$rubah_alamat = $this->input->post('rubah_alamat');
			$jenis_rubah = $this->input->post('jenis_k_rubah');
			$jasa_rubah = $this->input->post('jasa_rubah');

			$rubah_bpkb = $this->input->post('rubah_bpkb');
			$jenis_bpkb = $this->input->post('jenis_r_bpkb');
			$jasa_rbpkb = $this->input->post('jasa_rbpkb');
			
			$pkb1 = $this->input->post('pkb3');
			$bbnkb = $this->input->post('bbnkb2');
			$swdllj1 = $this->input->post('swdllj3');
			$adm_stnk = $this->input->post('adm_stnk2');
			$adm_tnkb = $this->input->post('adm_tnkb2');
			$biaya_jasa = $this->input->post('biaya_jasa2');
			$total_pajak = $this->input->post('total_pajak2');
			$total = $this->input->post('total_bulan');
		}else{
			$pkb = $this->input->post('pkb4');
			$tahun_thn = $this->input->post('telat_thn');
			$telat = $this->input->post('telat_t_bln');
			$sanksi_pkb = $this->input->post('sanksi_pkb2');
			$swdllj = $this->input->post('swdllj4');
			$sanksi_swdkllj = $this->input->post('sanski_swdllj2');

			$skp = $this->input->post('skp2');
			$jenis_k = $this->input->post('jenis_k_skp');
			$jasa_skp = $this->input->post('jasa_skp2');

			$baliknama = $this->input->post('baliknama2');
			$jenis_balik = $this->input->post('jenis_k_balik2');
			$balik = $this->input->post('balik_nama2');

			$stnk = $this->input->post('stnk_h2');
			$jenis_stnk = $this->input->post('jenis_k_stnk2');
			$stnk_h = $this->input->post('stnk_hilang2');

			$laporan_h = $this->input->post('laporan_h2');
			$jenis_laporan = $this->input->post('jenis_k_laporan2');
			$laporan = $this->input->post('laporan_hilang2');

			$ganti = $this->input->post('ganti2');
			$jenis_ganti = $this->input->post('jenis_ganti');
			$adm_ganti = $this->input->post('adm_tnkb1');

			$bbn = $this->input->post('bbn2');
			$jenis_bbn = $this->input->post('jenis_k_bbn2');
			$jasa_bbn = $this->input->post('jasa_bbn2');

			$rubah_alamat = $this->input->post('rubah_alamat');
			$jenis_rubah = $this->input->post('jenis_k_rubah2');
			$jasa_rubah = $this->input->post('jasa_rubah2');

			$rubah_bpkb = $this->input->post('rubah_bpkb2');
			$jenis_bpkb = $this->input->post('jenis_r_bpkb');
			$jasa_rbpkb = $this->input->post('jasa_rbpkb2');

			$pkb1 = $this->input->post('pkb5');
			$bbnkb = $this->input->post('bbnkb3');
			$swdllj1 = $this->input->post('swdllj5');
			$adm_stnk = $this->input->post('adm_stnk3');
			$adm_tnkb = $this->input->post('adm_tnkb3');
			$biaya_jasa = $this->input->post('biaya_jasa3');
			$total_pajak = $this->input->post('total_pajak3');
			$total = $this->input->post('total_su');
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
			'wilayah'=>$wilayah,
			'jasa'=>$skp.','.$baliknama.','.$stnk.','.$laporan_h.','.$bbn.','.$rubah_alamat.','.$rubah_bpkb.',', 
			'jenis_biaya'=>$jenis_k.','.$jenis_balik.','.$jenis_stnk.','.$jenis_laporan.','.$jenis_bbn.','.$jenis_rubah.','.$jenis_bpkb.',', 
			'harga_jasa'=>$jasa_skp.','.$balik.','.$stnk_h.','.$laporan.','.$jasa_bbn.','.$jasa_rubah.','.$jasa_rbpkb.',', 
			'jenis_jasa'=>$jenis_jasa, 
			'bbnkb'=>filter_var($bbnkb,FILTER_SANITIZE_NUMBER_INT), 
			'telat_thn'=>$tahun_thn, 
			'pkb'=>$pkb,
			'pkb1'=>$pkb1,
			'swdkllj'=>$swdllj,
			'swdkllj1'=>$swdllj1,
			'sanksi_swdkllj'=>$sanksi_swdkllj,
			'sanksi_pkb'=>$sanksi_pkb,
			'adm_stnk'=>$adm_stnk,
			'adm_tnkb'=>$adm_tnkb,
			'telat'=>$telat,
			'biaya_jasa'=>filter_var($biaya_jasa,FILTER_SANITIZE_NUMBER_INT),
			'total_pajak'=>filter_var($total_pajak,FILTER_SANITIZE_NUMBER_INT),
			'total'=>filter_var($total,FILTER_SANITIZE_NUMBER_INT),
			'hari'=>$dayList[$day],
			'tanggal'=>$gabungan
		));
		if ($query==TRUE) {
			$this->session->set_flashdata('sukses', 'Berhasil Simpan data');
			$id = $this->db->insert_id();
			redirect('main/transaksi_mb/'.$id);
		}else{
			$this->session->set_flashdata('gagal', 'Gagal Simpan data');
			redirect('main/mutasi');
		}
	}
	public function cetak_mb()
	{
		$cek = $this->db->get_where('cetak_mutasibn', array('id_join'=>$this->input->post('id')))->num_rows();
		if ($cek > 0) {
			$json = array('success'=>false, 'msg'=>'warning','id'=>$this->input->post('id'));
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
			$balik = $this->input->post('balik');
			$penyesuaian = $this->input->post('penyesuaian');
			$pajak_ini = $this->input->post('pajak_ini');
			$harga_ini = $this->input->post('harga_ini');
			$pajak_lalu = $this->input->post('pajak_lalu');
			$harga_lalu = $this->input->post('harga_lalu');
			$total_pajak = $this->input->post('total_pajak');

			$biaya_pm = $this->input->post('biaya_pm');
			$harga_pm = $this->input->post('harga_pm');
			$biaya_bn = $this->input->post('biaya_bn');
			$harga_bn = $this->input->post('harga_bn');
			$adm_skp = $this->input->post('adm_skp');
			$harga_adm = $this->input->post('harga_adm');
			$stnk_hilang = $this->input->post('stnk_hilang');
			$harga_hilang = $this->input->post('harga_hilang');
			$slk = $this->input->post('slk');
			$harga_slk = $this->input->post('harga_slk');
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
			$query = $this->db->insert('cetak_mutasibn', array(
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
				'pengurusan'=>$balik.','.$penyesuaian,
				'pajak_ini'=>$pajak_ini,
				'pajak_ini'=>$pajak_ini,
				'pajak_lalu'=>$pajak_lalu,
				'harga_pajak_ini'=>$harga_ini,
				'harga_pajak_lalu'=>$harga_lalu,
				'total_cpajak'=>$total_pajak,
				'proses_pm'=>$biaya_pm,
				'harga_pm'=>$harga_pm,
				'proses_bn'=>$biaya_bn,
				'harga_bn'=>$harga_bn,
				'adm_skp'=>$adm_skp,
				'harga_adm'=>$harga_adm,
				'stnk_hilang'=>$stnk_hilang,
				'harga_hilang'=>$harga_hilang,
				'surat_lk'=>$slk,
				'harga_lk'=>$harga_slk,
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
				$json =  array('success'=>true, 'msg'=>'Berhasil','id'=>$id);
			}else{
				$json =  array('success'=>true, 'msg'=>'Gagal');
			}
		}
		echo json_encode($json);
	}
	//Tambah Jasa
	public function tambahjasa()
	{
		$query = $this->db->insert('catatan', array(
			'proses'=>$this->input->post('proses'),
			'nama'=>$this->input->post('nama'),
			'jenis'=>$this->input->post('jenis_k'),
			'jenis_harga'=>'jasa',
			'harga'=>$this->input->post('harga'),
			'wilayah'=>$this->input->post('wilayah'),
			'created_at'=>date('Y-m-d'),
		));
		if ($query==TRUE) {
			redirect('main/harga_jasa');
			$this->session->set_flashdata('sukses', 'Berhasil Tambah data');
		}else{
			redirect('main/harga_jasa');
			$this->session->set_flashdata('gagal', 'Gagal Tambah data');
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