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
	public function getBerkas($id)
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
		$sanksi_pkb1 = $this->input->post('sanksi_pkb1');
		$sanksi_pkb2 = $this->input->post('sanksi_pkb2');
		$swdllj1 = $this->input->post('swdllj1');
		$swdllj2 = $this->input->post('swdllj2');
		$swdllj3 = $this->input->post('swdllj3');
		$jenis_swd = $this->input->post('jenis_swd');
		$sanski_swdllj1 = $this->input->post('sanski_swdllj1');
		$sanski_swdllj2 = $this->input->post('sanski_swdllj2');
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
			'pkb'=>$pkb1,
			'pkb_bulan'=>$pkb2,
			'pkb_tahun'=>$pkb3,
			'telat'=>$telat_bln,
			'telat_tahun'=>$telat_thn,
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
			'total'=>intval($total),
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
			// 'harga_adm'=>$$harga_skp,
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
	public function proses_balik()
	{
		$random = '0123456789';
		$hitungrandom = strlen($random);
		$hasilrandom = '';
		for ($i=0; $i < 15 ; $i++) { 
			$hasilrandom .= $random[rand(0,$hitungrandom - 1)];
		}
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
			$adm_stnk = $bbnkb3;
		}else if($adm_stnk2 == NULL AND $adm_stnk3==NULL){
			$adm_stnk = $adm_stnk1;
		}else{
			$adm_stnk = $adm_stnk2;
		}
		if ($ganti1 == NULL) {
			$ganti = $ganti2;
		}else{
			$ganti = $ganti1;
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
			'jenis'=>$jenis,
			'jenis_k'=>$jenis_k, 
			'pkb'=>$pkb,
			'bbnk'=>intval($bbnk),
			'adm_stnk'=>intval($adm_stnk),
			'ganti'=>$ganti,
			'adm_tnkb'=>$adm_tnkb,
			'telat'=>$telat,
			'sanksi_pkb'=>intval($sanksi_pkb),
			'swdkllj'=>intval($swdllj),
			'sanksi_swdkllj'=>intval($sanksi_swdkllj),
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
			'tanggal'=>date('Y-m-d')
		));
		if ($query==TRUE) {
			redirect('main/cetak/c_baliknama/'.$id);
		}else{
			$this->session->set_flashdata('gagal', 'Database Error');
			redirect('main/dashboard');
		}
	}
	public function simpanberkas()
	{
		$query = $this->db->insert('cetak_berkas', array(
			'id_uri'=>$this->input->post('id'),
			'id_user'=>$this->session->userdata('id'),
			'nama_pemilik'=>$this->input->post('pem_bpkb'),
			'nopol'=>$this->input->post('nopol'),
			'faktur'=>$this->input->post('faktur1').','.$this->input->post('faktur2'),
			'biaya'=>$this->input->post('kurang'),
			'tgl_bpkb'=>date('y-m-d',strtotime($this->input->post('tanggal'))),
			'created_at'=>date('Y-m-d'),
		));
		if ($query==TRUE) {
			redirect('main/cetak/c_berkas/'.$id);
		}else{
			$this->session->set_flashdata('gagal', 'Database Error');
			redirect('main/dashboard');
		}
	}
}

/* End of file M_back.php */
/* Location: ./application/models/M_back.php */