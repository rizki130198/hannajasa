<?php
date_default_timezone_set('Asia/Jakarta');
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	//start dashboard//
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_back');
	}
	
	public function dashboard()
	{
		$data['title'] = "Halaman Dashboard";
		$this->load->view('admin',$data);
	}
	//end dashboard//

	//start perhitungan//
	public function perhitungan()
	{
		$data['title'] = "Halaman Perhitungan Jasa";
		$this->load->view('admin',$data);
	}

	//start perpanjang//
	public function perpanjang()
	{
		$data['catat'] = $this->db->query('SELECT * FROM catatan  WHERE `id_catat` IN (1,2,3) GROUP BY jenis');
		$data['jasa'] = $this->db->query('SELECT * FROM catatan  WHERE jenis_harga = "jasa_select" GROUP BY nama');
		$data['title'] = "Halaman Perpanjang STNK";
		$this->load->view('admin',$data);
	}
	public function transaksi_p($id)
	{
		$querynya = $this->db->get_where('perpanjang',array('id_perpanjang'=>$id));
		if ($querynya->num_rows() > 0) {
			$data['title'] = "Halaman Transaksi Perpanjang STNK";
			$data['perpanjang'] = $querynya->row();
			$this->load->view('admin',$data);
		}else{
			$this->session->set_flashdata('gagal', 'Data Tidak Di Temukan');
			redirect('main/dashboard');
		}
	}
	public function cetak_perpanjang($id)
	{
		$query = $this->db->query('SELECT * FROM cetak_perpanjang c INNER JOIN perpanjang p ON c.id_join = p.id_perpanjang where c.id_join='.$id.'');
		if ($query->num_rows() > 0) {
			$data['perpanjang'] = $query->row();
			$this->load->view('admin/cetak/c_perpanjang', $data);
		}else{
			redirect('main/transaksi_p');
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
		}
	}
	//end perpanjang//

	//start balik nama//
	public function balik_nama()
	{
		$data['title'] = "Halaman Balik Nama STNK";
		$data['catat'] = $this->db->query('SELECT * FROM catatan  WHERE `id_catat` IN (1,2,3) GROUP BY jenis');
		$data['jasa'] = $this->db->query('SELECT * FROM catatan  WHERE jenis_harga = "jasa_select" GROUP BY nama');
		$this->load->view('admin',$data);
	}
	public function transaksi_bn($id)
	{
		$querynya = $this->db->get_where('balik_nama',array('id_balik'=>$id));
		if ($querynya->num_rows() > 0) {
			$data['title'] = "Halaman Transaksi Balik Nama STNK";
			$data['balik'] = $querynya->row();
			$this->load->view('admin',$data);
		}else{
			$this->session->set_flashdata('gagal', 'Data Tidak Di Temukan');
			redirect('main/dashboard');
		}
	}
	
	public function cetak_balik($id)
	{
		$query = $this->db->query('SELECT * FROM cetak_balik c INNER JOIN balik_nama p ON c.id_join = p.id_balik where c.id_join='.$id.'');
		if ($query->num_rows() > 0) {
			$data['balik'] = $query->row();
			$this->load->view('admin/cetak/c_baliknama', $data);
		}else{
			redirect('main/transaksi_bn');
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
		}
	}
	//end balik nama//
	
	//start mutasi//
	public function mutasi()
	{
		$data['title'] = "Halaman Mutasi STNK";
		$data['catat'] = $this->db->query('SELECT * FROM catatan  WHERE `id_catat` IN (1,2,3) GROUP BY jenis');
		$data['jasa'] = $this->db->query('SELECT * FROM catatan  WHERE jenis_harga = "jasa_select" GROUP BY nama');
		$this->load->view('admin',$data);
	}
	public function transaksi_m($id)
	{
		$querynya = $this->db->get_where('mutasi',array('id_mutasi'=>$id));
		if ($querynya->num_rows() > 0) {
			$data['mutasi'] = $querynya->row();
			$data['title'] = "Halaman Transaksi Mutasi";
			$this->load->view('admin',$data);
		}else{
			$this->session->set_flashdata('gagal', 'Data Tidak Di Temukan');
			redirect('main/dashboard');
		}
	}
	public function cetak_mutasi($id)
	{
		$query = $this->db->query('SELECT * FROM cetak_mutasi c INNER JOIN mutasi p ON c.id_join = p.id_mutasi where c.id_join='.$id.'');
		if ($query->num_rows() > 0) {
			$data['mutasi'] = $query->row();
			$this->load->view('admin/cetak/c_mutasi',$data);
		}else{
			redirect('main/transaksi_p');
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
		}
	}
	//end mutasi//

	//start mutasi+balik nama//
	public function mutasibn()
	{
		$data['title'] = "Halaman Mutasi+Balik Nama STNK";
		$data['catat'] = $this->db->query('SELECT * FROM catatan WHERE `id_catat` IN (1,2,3) GROUP BY jenis');
		$data['jasa'] = $this->db->query('SELECT * FROM catatan  WHERE jenis_harga = "jasa_select" GROUP BY nama');
		$this->load->view('admin',$data);
	}
	public function transaksi_mb($id)
	{
		$querynya = $this->db->get_where('mutasi_bn',array('id_mutasibn'=>$id));
		if ($querynya->num_rows() > 0) {
			$data['mutasi'] = $querynya->row();
			$data['title'] = "Halaman Transaksi Balik Nama STNK";
			$this->load->view('admin',$data);
		}else{
			$this->session->set_flashdata('gagal', 'Data Tidak Di Temukan');
			redirect('main/dashboard');
		}
	}
	public function cetak_mutasibn($id)
	{
		$query = $this->db->query('SELECT * FROM cetak_mutasibn c INNER JOIN mutasi_bn p ON c.id_join = p.id_mutasibn where c.id_join='.$id.'');
		if ($query->num_rows() > 0) {
			$data['mutasibn'] = $query->row();
			$this->load->view('admin/cetak/c_mutasibn',$data);
		}else{
			redirect('main/mutasibn/'.$id);
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
		}
	}
	//start mutasi+balik nama//

	//start stnk hilang//
	public function stnk_hilang()
	{
		$data['title'] = "Halaman STNK Hilang";
		$data['catat'] = $this->db->query('SELECT * FROM catatan WHERE `id_catat` IN (1,2,3) GROUP BY jenis');
		$data['jasa'] = $this->db->query('SELECT * FROM catatan  WHERE jenis_harga = "jasa_select" GROUP BY nama');
		$this->load->view('admin',$data);
	}
	public function transaksi_sh($id)
	{
		$querynya = $this->db->get_where('stnk_hilang',array('id_stnk'=>$id));
		if ($querynya->num_rows() > 0) {
			$data['title'] = "Halaman Transaksi STNK Hilang";
			$data['stnk'] = $querynya->row();
			$this->load->view('admin',$data);
		}else{
			$this->session->set_flashdata('gagal', 'Data Tidak Di Temukan');
			redirect('main/dashboard');
		}
	}
	public function cetak_stnkhilang($id)
	{
		$query = $this->db->query('SELECT * FROM cetak_stnk c INNER JOIN stnk_hilang p ON c.id_join = p.id_stnk where c.id_join='.$id.'');
		if ($query->num_rows() > 0) {
			$data['stnk'] = $query->row();
			$this->load->view('admin/cetak/c_stnkhilang',$data);
		}else{
			redirect('main/transaksi_sh/'.$id);
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
		}
	}
	//end stnk hilang//

	//start stnk hilang//
	public function stnkh_bn()
	{
		$data['title'] = "Halaman STNK Hilang + Balik Nama";
		$data['catat'] = $this->db->query('SELECT * FROM catatan WHERE `id_catat` IN (1,2,3) GROUP BY jenis');
		$data['jasa'] = $this->db->query('SELECT * FROM catatan  WHERE jenis_harga = "jasa_select" GROUP BY nama');
		$this->load->view('admin',$data);
	}
	public function transaksi_sb($id)
	{
		$querynya = $this->db->get_where('stnk_balik',array('id_stnkb'=>$id));
		if ($querynya->num_rows() > 0) {
			$data['title'] = "Halaman Transaksi STNK Hilang + Balik Nama";
			$data['stnk'] = $querynya->row();
			$this->load->view('admin',$data);
		}else{
			$this->session->set_flashdata('gagal', 'Data Tidak Di Temukan');
			redirect('main/dashboard');
		}
	}
	public function cetak_stnkh_bn($id)
	{
		$query = $this->db->query('SELECT * FROM cetak_sb c INNER JOIN stnk_balik p ON c.id_join = p.id_stnkb where c.id_join='.$id.'');
		if ($query->num_rows() > 0) {
			$data['stnkhilang'] = $query->row();
			$this->load->view('admin/cetak/c_stnkh_bn',$data);
		}else{
			redirect('main/stnkh_bn/');
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
		}
	}
	//end stnk hilang//

	//start Input Berkas//
	public function berkas_jadi()
	{
		$data['title'] = "Halaman Berkas Jadi";
		$this->db->select('*');
		$this->db->join('perpanjang', 'cetak_perpanjang.id_join = perpanjang.id_perpanjang');
		$this->db->join('users', 'cetak_perpanjang.id_user = users.id_users');
		$data['berkas'] = $this->db->get_where('cetak_perpanjang',array('status' => '1'))->result();
		$this->load->view('admin',$data);
	}
	public function input_berkas($string)
	{
		$id = $this->uri->segment(4);
		$data['title'] = "Halaman Input Berkas Jadi";
		if ($string=='perpanjang') {
			$data['input_berkas'] = $this->M_back->getBerkas_p($id);
		}else if ($string=='balik_nama') {
			$data['input_berkas'] = $this->M_back->getBerkas_bn($id);
		}elseif ($string=='mutasi') {
			$data['input_berkas'] = $this->M_back->getBerkas_m($id);
		}elseif ($string=='mutasi_bn') {
			$data['input_berkas'] = $this->M_back->getBerkas_mbn($id);
		}elseif ($string=='stnk') {
			$data['input_berkas'] = $this->M_back->getBerkas_sh($id);
		}elseif ($string=='stnk_hb') {
			$data['input_berkas'] = $this->M_back->getBerkas_shb($id);
		}else{
			$data['input_berkas'] = $this->M_back->getBerkas_m($id);
		}
		$this->load->view('admin',$data);
	}
	public function batal_berkas($string)
	{
		$id = $this->uri->segment(4);
		$data['title'] = "Halaman Input Berkas Jadi";
		if ($string=='perpanjang') {
			$data['input_berkas'] = $this->M_back->backBerkas_p($id);
		}else if ($string=='balik_nama') {
			$data['input_berkas'] = $this->M_back->backBerkas_bn($id);
		}elseif ($string=='mutasi') {
			$data['input_berkas'] = $this->M_back->backBerkas_m($id);
		}elseif ($string=='mutasi_bn') {
			$data['input_berkas'] = $this->M_back->backBerkas_mbn($id);
		}elseif ($string=='stnk') {
			$data['input_berkas'] = $this->M_back->backBerkas_sh($id);
		}elseif ($string=='stnk_hb') {
			$data['input_berkas'] = $this->M_back->backBerkas_shb($id);
		}else{
			$data['input_berkas'] = $this->M_back->backBerkas_m($id);
		}
	}
	public function delete_berkas($string)
	{
		$id = $this->uri->segment(4);
		$data['title'] = "Halaman Input Berkas Jadi";
		if ($string=='perpanjang') {
			$data['input_berkas'] = $this->M_back->delBerkas_p($id);
		}else if ($string=='balik_nama') {
			$data['input_berkas'] = $this->M_back->delBerkas_bn($id);
		}elseif ($string=='mutasi') {
			$data['input_berkas'] = $this->M_back->delBerkas_m($id);
		}elseif ($string=='mutasi_bn') {
			$data['input_berkas'] = $this->M_back->delBerkas_mbn($id);
		}elseif ($string=='stnk') {
			$data['input_berkas'] = $this->M_back->delBerkas_sh($id);
		}elseif ($string=='stnk_hb') {
			$data['input_berkas'] = $this->M_back->delBerkas_shb($id);
		}else{
			$data['input_berkas'] = $this->M_back->delBerkas_m($id);
		}
	}


	//end input berkas//

	//START PROSES//
	public function proses_balik()
	{
		$this->M_back->proses_balik();
	}
	public function p_balik()
	{
		if (!$this->input->is_ajax_request()) {
			$json = array('msg'=>'No direct script access allowed','success'=>'false');

			exit('No direct script access allowed');
		}else{
			$this->M_back->cetak_balik();
		}
	}
	public function proses_mutasi()
	{
		$this->M_back->proses_mutasi();
	}
	public function p_mutasi()
	{
		if (!$this->input->is_ajax_request()) {
			$json = array('msg'=>'No direct script access allowed','success'=>'false');

			exit('No direct script access allowed');
		}else{
			$this->M_back->cetak_mutasi();
		}
	}
	public function proses_stnk()
	{
		$this->M_back->proses_stnk();
	}
	public function p_stnk()
	{
		if (!$this->input->is_ajax_request()) {
			$json = array('msg'=>'No direct script access allowed','success'=>'false');

			exit('No direct script access allowed');
		}else{
			$this->M_back->cetak_stnk();
		}
	}
	public function proses_stnkbalik()
	{
		$this->M_back->proses_sb();
	}
	public function p_stnkbalik()
	{
		if (!$this->input->is_ajax_request()) {
			$json = array('msg'=>'No direct script access allowed','success'=>'false');

			exit('No direct script access allowed');
		}else{
			$this->M_back->cetak_sb();
		}
	}
	public function proses_mbn()
	{
		$this->M_back->proses_mbn();
	}
	public function p_mutasibalik()
	{
		if (!$this->input->is_ajax_request()) {
			$json = array('msg'=>'No direct script access allowed','success'=>'false');

			exit('No direct script access allowed');
		}else{
			$this->M_back->cetak_mb();
		}
	}
	//END PROSES//

	//start report//
	public function report()
	{
		$data['title'] = "Halaman Report";
		// HARI
		$data['datahari_p'] = $this->M_back->getHariP();
		$data['datahari_bn'] = $this->M_back->getHariBN();
		$data['datahari_m'] = $this->M_back->getHariM();
		$data['datahari_sh'] = $this->M_back->getHariSH();
		//MINGGU
		$data['dataminggu_p'] = $this->M_back->getMingguP();
		$data['dataminggu_bn'] = $this->M_back->getMingguBN();
		$data['dataminggu_m'] = $this->M_back->getMingguM();
		$data['dataminggu_sh'] = $this->M_back->getMingguSH();
		//BULAN
		$data['databulan_p'] = $this->M_back->getBulanP();
		$data['databulan_bn'] = $this->M_back->getBulanBN();
		$data['databulan_m'] = $this->M_back->getBulanM();
		$data['databulan_sh'] = $this->M_back->getBulanSH();
		//TOTAL
		$data['datatotal_p'] = $this->M_back->getTotalP();
		$data['datatotal_bn'] = $this->M_back->getTotalBN();
		$data['datatotal_m'] = $this->M_back->getTotalM();
		$data['datatotal_sh'] = $this->M_back->getTotalSH();
		$this->load->view('admin',$data);
	}
	//end report//

	//start profle//
	public function profile()
	{
		$data['title'] = "Halaman Profile";
		$data['account'] = $this->M_back->getAccountProfile();
		$this->load->view('admin',$data);
	}
	//end profile//

	//View Berkas
	public function berkas($id)
	{
		$query = $this->db->get_where('cetak_berkas',array('id_berkas'=>$id));
		if ($query->num_rows() > 0) {
			$data['berkas'] = $query->row();
			$this->load->view('admin/berkas', $data);
		}else{
			redirect('main/berkas_jadi');
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
		}
	}
	//END

	//start progress kerja//
	public function prog_kerja()
	{
		$data['title'] = "Halaman Progress Kerja";
		$data['karyawan']=$this->M_back->load_karyawan();
		$this->load->view('admin',$data);	
	}
	//end progress kerja//

	//start kasir//
	public function daftar()
	{
		$data['title'] = "Halaman Tambah Pengguna";
		$this->load->view('admin',$data);
	}
	public function data_pengguna()
	{
		$data['title'] = "Halaman Data Pengguna";
		$this->load->view('admin',$data);
	}
	public function load_user()
	{
		$data = $this->m_back->load_user();
		echo json_encode($data);
	}
	public function deleteUsers()
	{
		$this->M_back->actDeleteUser($this->input->post('id_users'));
	}
	public function editUser($id)
	{
		$data['title'] = "Halaman Input Berkas Jadi";
		$data['user'] = $this->M_back->getUser($id);
		$this->load->view('admin',$data);
	}
	public function proses_edit_user()
	{
		$val = $this->M_back->action_edit_user();
		if ($val =="") {
			$this->session->set_flashdata('sukses', 'Data berhasil di ubah');
		}else{
			$this->session->set_flashdata('gagal', 'Data gagal di ubah');
		}
		redirect('main/data_pengguna');
	}
	public function proses_daftar()
	{
		$this->M_back->proses_daf();
	}
	//end kasir//

	//start Daftar Harga//
	public function harga()
	{
		$data['title'] = "Halaman Daftar Harga";
		$this->load->view('admin',$data);
	}
	public function load_harga()
	{
		$data = $this->M_back->load_harga();
		echo json_encode($data);
	}
	public function update_harga()
	{
		$this->M_back->act_update_harga();
	}
	//end daftar harga//

	//start Harga jasa//
	public function harga_jasa()
	{
		$data['title'] = "Halaman Harga Jasa";
		$data['data'] = $this->M_back->load_harga_jasa();
		$this->load->view('admin',$data);
	}
	public function load_harga_jasa()
	{
		$data['data'] = $this->M_back->load_harga_jasa();
		echo json_encode($data);
	}
	//end harga jasa//

	//start Stok Blanko//
	public function blanko()
	{
		$data['title'] = "Halaman Stok Blanko";
		$data['blanko'] = $this->db->get('blanko')->result();
		$this->load->view('admin',$data);
	}



	#######PROSES##########

	public function proses_cetak()
	{
		if (!$this->input->is_ajax_request()) {
			$json = array('msg'=>'No direct script access allowed','success'=>'false');

			exit('No Access');
		}else{
			$this->M_back->proses_cetak();
		}
	}
	public function load_data()
	{
		$data = $this->M_back->load_data();
		echo json_encode($data);
	}
	public function update_blanko()
	{
		$this->M_back->act_update_blanko();
	}
	//end Stok Blanko//
	public function proses_perpanjang()
	{
		$this->M_back->p_perpanjang();
	}
	public function ambilswdkjl()
	{
		$jenis = $this->input->post('jenis');
		$query = $this->db->query('SELECT * FROM catatan WHERE `id_catat` AND jenis="'.$jenis.'"');
		$i = 0;
		$data = "";
		foreach ($query->result() as $key) {
			$data[$i] = array(
				'harga'=>$key->harga,
			);
			$i++;
		}
		echo json_encode($data);
	}
	public function ambiljasa()
	{
		$nama = $this->input->post('nama');
		$query = $this->db->query('SELECT * FROM catatan WHERE jenis_harga="jasa_select" AND nama="'.$nama.'"');
		$i = 0;
		$data = "";
		foreach ($query->result() as $key) {
			$data[$i] = array(
				'harga'=>$key->harga,
			);
			$i++;
		}
		echo json_encode($data);
	}
	public function ambiljenis()
	{
		$jenis = $this->input->post('jenis');
		$query = $this->db->query('SELECT * FROM catatan WHERE `id_catat` IN (4,5,6,7,8) AND jenis="'.$jenis.'"');
		$i = 0;
		$data = "";
		foreach ($query->result() as $key) {
			$data[$i] = array(
				'harga'=>$key->harga,
			);
			$i++;
		}
		echo json_encode($data);
	}
	public function ambilharga()
	{
		$jenis = $this->input->post('jenis');
		$wilayah = $this->input->post('wilayah');
		$uri = $this->uri->segment(3);
		if ($uri == 'ambilbpkb') {
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="ACC BPKB" AND wilayah="'.$wilayah.'" AND jenis="'.$jenis.'"');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}else if($uri == 'ambilktp'){
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="ACC KTP / ACC Perizinan" AND wilayah="'.$wilayah.'" AND jenis="'.$jenis.'"');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}else if($uri == 'ambilskp'){
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="Adm SKP" AND wilayah="'.$wilayah.'" AND jenis="'.$jenis.'"');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}else if($uri == 'ambilloksus'){
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="Loksus" AND  wilayah="'.$wilayah.'" AND jenis="'.$jenis.'" ');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}else if ($uri == 'ambilbbn') {
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="BBN" AND wilayah="'.$wilayah.'" AND jenis="'.$jenis.'"');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}else if($uri == 'ambilstnk'){
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="Rubah Alamat STNK" AND proses="Balik Nama" AND wilayah="'.$wilayah.'" AND jenis="'.$jenis.'" ');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}else if($uri == 'ambilskpbalik'){
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="Adm SKP" AND wilayah="'.$wilayah.'" AND jenis="'.$jenis.'"');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}else if($uri == 'ambilalamat'){
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="Rubah Alamat BPKB" AND wilayah="'.$wilayah.'" AND jenis="'.$jenis.'"');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}else if($uri == 'ambilskpmutasi'){
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="SKP" AND wilayah="'.$wilayah.'" AND jenis="'.$jenis.'"');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}else if($uri == 'ambilbbnmutasi'){
			$query = $this->db->query('SELECT * FROM catatan WHERE nama="Balik Nama" AND proses="Mutasi" AND jenis="'.$jenis.'"');
			$i = 0;
			$data = "";
			foreach ($query->result() as $key) {
				$data[$i] = array(
					'harga'=>$key->harga,
				);
				$i++;
			}
		}else if($uri == 'ambilstnkmutasi'){
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="Stnk Hilang" AND wilayah="'.$wilayah.'" AND jenis="'.$jenis.'" AND proses="Mutasi"');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}else if($uri == 'ambillaporanmutasi'){
			$query = $this->db->query('SELECT * FROM catatan WHERE nama="Laporan Hilang"');
			$i = 0;
			$data = "";
			foreach ($query->result() as $key) {
				$data[$i] = array(
					'harga'=>$key->harga,
				);
				$i++;
			}
		}else if($uri == 'ambilskpstnk'){
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="ADM SKP STNK" AND wilayah="'.$wilayah.'" AND jenis="'.$jenis.'"');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}else if($uri == 'ambilstnkhl'){
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="STNK Hilang (Leasing)" AND wilayah="'.$wilayah.'" AND jenis="'.$jenis.'"');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}else if($uri == 'ambilstnkhb'){
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="STNK Hilang (BPKB Asli)" AND wilayah="'.$wilayah.'" AND jenis="'.$jenis.'"');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}else if($uri == 'rubahalamat'){
			$query = $this->db->query('SELECT * FROM catatan WHERE nama="Rubah Alamat" AND proses="STNK"');
			$i = 0;
			$data = "";
			foreach ($query->result() as $key) {
				$data[$i] = array(
					'harga'=>$key->harga,
				);
				$i++;
			}
		}else if($uri == 'ambilbaliks'){
			$query = $this->db->query('SELECT * FROM catatan WHERE nama="Balik Nama" AND proses="STNK"');
			$i = 0;
			$data = "";
			foreach ($query->result() as $key) {
				$data[$i] = array(
					'harga'=>$key->harga,
				);
				$i++;
			}
		}else if($uri == 'ambilplats'){
			$query = $this->db->query('SELECT * FROM catatan WHERE nama="Ganti Plat" AND proses="STNK"');
			$i = 0;
			$data = "";
			foreach ($query->result() as $key) {
				$data[$i] = array(
					'harga'=>$key->harga,
				);
				$i++;
			}
		}else if($uri == 'ambilstnkhg'){
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="STNK Gantung" AND proses="STNK" AND wilayah="'.$wilayah.'" AND jenis="'.$jenis.'"');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}else if($uri == 'ambilktpfcb'){
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="KTP dan Fc BPKB Ada" AND wilayah="'.$wilayah.'" AND jenis="'.$jenis.'"');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}else if($uri == 'ambiltktp'){
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="Tanpa KTP" AND wilayah="'.$wilayah.'" AND jenis="'.$jenis.'"');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}else if($uri == 'ambiltktpfcb'){
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="Tanpa KTP dan FC BPKB" AND wilayah="'.$wilayah.'" AND jenis="'.$jenis.'"');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}else if($uri == 'ambillaporans'){
			$query = $this->db->query('SELECT * FROM catatan WHERE nama="Laporan Hilang" and proses="STNK"');
			$i = 0;
			$data = "";
			foreach ($query->result() as $key) {
				$data[$i] = array(
					'harga'=>$key->harga,
				);
				$i++;
			}
		}else if($uri == 'ambilbbnsntkh'){
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="BBN" and proses="STNK" AND wilayah="'.$wilayah.'" AND jenis="'.$jenis.'"');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}else if($uri == 'rubahalamatstnk'){
			if ($wilayah==NULL) {
				$data = array('success'=> false, 'msg'=>'gagal');
			}else{
				$query = $this->db->query('SELECT * FROM catatan WHERE nama="Rubah Alamat STNK" AND proses="STNK" AND wilayah="'.$wilayah.'" AND jenis="'.$jenis.'"');
				$i = 0;
				$data = "";
				foreach ($query->result() as $key) {
					$data[$i] = array(
						'harga'=>$key->harga,
					);
					$i++;
				}
			}
		}
		
		
		echo json_encode($data);
	}
	//start cetak pdf//
	public function cetak()
	{
		if ($this->uri->segment(3)=="c_berkas") {
			$data['title'] = "Halaman Cetak Berkas Jadi";
			$id = $this->uri->segment(4);
			$row = $this->db->get_where('cetak_berkas',array('id_uri'=>$id))->row();
			$this->load->helper('pdfcrowd.php');
			$client = new \Pdfcrowd\HtmlToPdfClient("rizki", "e2ecd02e063d25d0a169400a7de725d6");
			$client->setPageSize("A4");
			$client->setOrientation("portrait");
			$url = "http://" . $_SERVER["SERVER_NAME"].'/'.$this->uri->segment(1).'/berkas/'.$id;
			$pdf = $client->convertUrl($url);
			// return var_dump($url);
			header("Content-Type: application/pdf");
			header("Cache-Control: no-cache");
			header("Accept-Ranges: none");
			header("Content-Disposition: inline; filename='c_berkas_".$row->nama_pemilik."'.pdf");
			echo $pdf;
			if($row == 'balik_nama'){
				$query = $this->db->update('cetak_balik',array(
					'status'=>'0'
				),
				array(
					'id_join'=>$id));
			}else if($row == 'perpajang'){
				$query = $this->db->update('cetak_perpanjang',array(
					'status'=>'0'
				),
				array(
					'id_join'=>$id));
			}else if($row == 'mutasi'){
				$query = $this->db->update('cetak_mutasi',array(
					'status'=>'0'
				),
				array(
					'id_join'=>$id));
			}
		}else if ($this->uri->segment(3)=="c_perpanjang") {
			$id = $this->uri->segment(4);
			$row = $this->db->query('SELECT * FROM cetak_perpanjang c INNER JOIN perpanjang p ON c.id_join = p.id_perpanjang where c.id_join='.$id.'')->row();
			$this->load->helper('pdfcrowd.php');
			$client = new \Pdfcrowd\HtmlToPdfClient("rizki", "e2ecd02e063d25d0a169400a7de725d6");
			$client->setPageSize("A2");
			$client->setOrientation("portrait");
			$url = "http://" . $_SERVER["SERVER_NAME"].'/'.$this->uri->segment(1).'/cetak_perpanjang/'.$id;
			$pdf = $client->convertUrl($url);
			//return var_dump($url);
			header("Content-Type: application/pdf");
			header("Cache-Control: no-cache");
			header("Accept-Ranges: none");
			header("Content-Disposition: inline; filename='".$row->no."'.pdf");
			echo $pdf;
		}else if ($this->uri->segment(3)=="c_baliknama") {
			$id = $this->uri->segment(4);
			$row = $this->db->query('SELECT * FROM cetak_balik c INNER JOIN balik_nama p ON c.id_join = p.id_balik where c.id_join='.$id.'')->row();
			$this->load->helper('pdfcrowd.php');
			$client = new \Pdfcrowd\HtmlToPdfClient("rizki", "e2ecd02e063d25d0a169400a7de725d6");
			$client->setPageSize("A2");
			$client->setOrientation("portrait");
			$url = "http://" . $_SERVER["SERVER_NAME"].'/'.$this->uri->segment(1).'/cetak_balik/'.$id;
			$pdf = $client->convertUrl($url);
			//return var_dump($url);
			header("Content-Type: application/pdf");
			header("Cache-Control: no-cache");
			header("Accept-Ranges: none");
			header("Content-Disposition: inline; filename='".$row->no."'.pdf");
			echo $pdf;
		}else if ($this->uri->segment(3)=="c_mutasi") {
			$id = $this->uri->segment(4);
			$row = $this->db->query('SELECT * FROM cetak_mutasi c INNER JOIN mutasi p ON c.id_join = p.id_mutasi where c.id_join='.$id.'')->row();
			$this->load->helper('pdfcrowd.php');
			$client = new \Pdfcrowd\HtmlToPdfClient("rizki", "e2ecd02e063d25d0a169400a7de725d6");
			$client->setPageSize("A2");
			$client->setOrientation("portrait");
			$url = "http://" . $_SERVER["SERVER_NAME"].'/'.$this->uri->segment(1).'/cetak_mutasi/'.$id;
			$pdf = $client->convertUrl($url);
			//return var_dump($url);
			header("Content-Type: application/pdf");
			header("Cache-Control: no-cache");
			header("Accept-Ranges: none");
			header("Content-Disposition: inline; filename='".$row->no."'.pdf");
			echo $pdf;
		}else if ($this->uri->segment(3)=="c_stnkhilang") {
			$id = $this->uri->segment(4);
			$this->load->helper('pdfcrowd.php');
			$client = new \Pdfcrowd\HtmlToPdfClient("rizki", "e2ecd02e063d25d0a169400a7de725d6");
			$client->setPageSize("A2");
			$client->setOrientation("portrait");
			$url = "http://" . $_SERVER["SERVER_NAME"].'/'.$this->uri->segment(1).'/cetak_stnkhilang/'.$id;
			$pdf = $client->convertUrl($url);
			//return var_dump($url);
			header("Content-Type: application/pdf");
			header("Cache-Control: no-cache");
			header("Accept-Ranges: none");
			header("Content-Disposition: inline; filename=\"'.$id.'.pdf\"");
			echo $pdf;
		}else{

		}
	}
	public function cetak_berkas($id)
	{
		$this->M_back->simpanberkas();
	}
	public function ambilselect()
	{
		if ($this->input->post('jenis') == 'perpanjang') {
			$this->db->select('*');
			$this->db->join('perpanjang', 'cetak_perpanjang.id_join = perpanjang.id_perpanjang');
			$this->db->join('users', 'cetak_perpanjang.id_user = users.id_users');
			$data['data'] = $this->db->get_where('cetak_perpanjang',array('status' => '1'))->result();
		}elseif ($this->input->post('jenis') == 'bn') {
			$this->db->select('*');
			$this->db->join('balik_nama', 'cetak_balik.id_join = balik_nama.id_balik');
			$this->db->join('users', 'cetak_balik.id_user = users.id_users');
			$data['data'] = $this->db->get_where('cetak_balik',array('status' => '1'))->result();
		}else if ($this->input->post('jenis') == 'mutasi') {
			$this->db->select('*');
			$this->db->join('mutasi', 'cetak_mutasi.id_join = mutasi.id_mutasi');
			$this->db->join('users', 'cetak_mutasi.id_user = users.id_users');
			$data['data'] = $this->db->get_where('cetak_mutasi',array('status' => '1'))->result();
		}else if ($this->input->post('jenis') == 'm_bn') {
			$this->db->select('*');
			$this->db->join('mutasi_bn', 'cetak_mutasi.id_join = mutasi_bn.id_mutasibn');
			$this->db->join('users', 'cetak_mutasi.id_user = users.id_users');
			$data['data'] = $this->db->get_where('cetak_mutasi',array('status' => '1'))->result();
		}else if ($this->input->post('jenis') == 'stnk') {
			$this->db->select('*');
			$this->db->join('stnk_hilang', 'cetak_stnk.id_join = stnk_hilang.id_stnk');
			$this->db->join('users', 'cetak_stnk.id_user = users.id_users');
			$data['data'] = $this->db->get_where('cetak_stnk',array('status' => '1'))->result();
		}else if ($this->input->post('jenis') == 'stnk_h') {
			$this->db->select('*');
			$this->db->join('stnk_balik', 'cetak_sb.id_join = stnk_balik.id_stnkb');
			$this->db->join('users', 'cetak_sb.id_user = users.id_users');
			$data['data'] = $this->db->get_where('cetak_sb',array('status' => '1'))->result();
		}else{
			$this->db->select('*');
			$this->db->join('perpanjang', 'cetak_perpanjang.id_join = perpanjang.id_perpanjang');
			$this->db->join('users', 'cetak_perpanjang.id_user = users.id_users');
			$data['data'] = $this->db->get_where('cetak_perpanjang',array('status' => '1'))->result();
		}
		echo json_encode($data);
		
	}
	public function ambilhargajasa()
	{
		if ($this->input->post('jenis') == 'perpanjang') {
			$data['data'] = $this->db->query("SELECT * FROM catatan WHERE proses = 'Perpanjang'")->result();
			$this->load->view('admin/hargajasa', $data);
		}elseif ($this->input->post('jenis') == 'bn') {
			$data['data'] = $this->db->query("SELECT * FROM catatan WHERE proses = 'Balik Nama'")->result();
			$this->load->view('admin/hargajasa', $data);
		}else if ($this->input->post('jenis') == 'mutasi') {
			$data['data'] = $this->db->query("SELECT * FROM catatan WHERE proses = 'Mutasi'")->result();
			$this->load->view('admin/hargajasa', $data);
		}else if ($this->input->post('jenis') == 'm_bn') {
			$data['data'] = $this->db->query("SELECT * FROM catatan WHERE proses = 'Mutasi'")->result();
			$this->load->view('admin/hargajasa', $data);
		}else if ($this->input->post('jenis') == 'stnk') {
			$data['data'] = $this->db->query("SELECT * FROM catatan WHERE proses = 'STNK'")->result();
			$this->load->view('admin/hargajasa', $data);
		}else if ($this->input->post('jenis') == 'stnk_h') {
			$data['data'] = $this->db->query("SELECT * FROM catatan WHERE proses = 'STNK'")->result();
			$this->load->view('admin/hargajasa', $data);
		}else{
			$data['data'] = $this->db->query("SELECT * FROM catatan WHERE proses != NULL")->result();
			$this->load->view('admin/hargajasa', $data);
		}
	}
	//end cetak pdf//

	public function datahistory($id)
	{
		$data['title'] = 'Halaman History';
		$data['perpanjang'] = $this->db->query("SELECT * FROM cetak_perpanjang c 
			INNER JOIN users u  ON c.id_user = u.id_users 
			INNER JOIN perpanjang p ON p.id_perpanjang = c.id_join
			where c.id_user='".$id."' AND c.tanggal='".date("Y-m-d")."'")->result();

		$data['balik'] = $this->db->query("SELECT * FROM cetak_balik c 
			INNER JOIN users u ON c.id_user = u.id_users
			INNER JOIN balik_nama p ON p.id_balik = c.id_join
			where c.id_user='".$id."' AND c.tanggal='".date("Y-m-d")."'")->result();
		
		$data['mutasi'] = $this->db->query("SELECT * FROM cetak_mutasi c 
			INNER JOIN users u ON c.id_user = u.id_users 
			INNER JOIN mutasi p ON p.id_mutasi = c.id_join
			where c.id_user='".$id."' AND c.tanggal='".date("Y-m-d")."'")->result();
		
		$data['mutasi_bn'] = $this->db->query("SELECT * FROM cetak_mutasibn c 
			INNER JOIN users u ON c.id_user = u.id_users 
			INNER JOIN mutasi_bn p ON p.id_mutasibn = c.id_join
			where c.id_user='".$id."' AND c.tanggal='".date("Y-m-d")."'")->result();
		
		$data['stnk'] = $this->db->query("SELECT * FROM cetak_stnk c 
			INNER JOIN users u ON c.id_user = u.id_users
			INNER JOIN stnk_hilang p ON p.id_stnk = c.id_join
			where c.id_user='".$id."' AND c.tanggal='".date("Y-m-d")."'")->result();
		
		$data['stnk_bn'] = $this->db->query("SELECT * FROM cetak_sb c 
			INNER JOIN users u ON c.id_user = u.id_users
			INNER JOIN stnk_balik p ON p.id_stnkb = c.id_join
			where c.id_user='".$id."' AND c.tanggal='".date("Y-m-d")."'")->result();

		$this->load->view('admin', $data);
	}
	public function tambahjasa()
	{
		$this->M_back->tambahjasa();
	}
	public function logout()
	{
		$sess = $this->session->sess_destroy();
		redirect('welcome/login');
	}
}
