<?php
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
		$data['title'] = "Halaman Perpanjang STNK";
		$this->load->view('admin',$data);
	}
	public function transaksi_p($id)
	{
		$querynya = $this->db->get_where('perpanjang',array('id_perpanjang'=>$id));
		if ($querynya->num_rows() > 0) {
			$data['title'] = "Halaman Transaksi Perpanjang STNK";
			$this->load->view('admin',$data);
		}else{
			$this->session->set_flashdata('gagal', 'Data Tidak Di Temukan');
			redirect('main/dashboard');
		}
	}
	//end perpanjang//

	//start balik nama//
	public function balik_nama()
	{
		$data['title'] = "Halaman Balik Nama STNK";
		$data['catat'] = $this->db->query('SELECT * FROM catatan  WHERE `id_catat` IN (1,2,3) GROUP BY jenis');
		$this->load->view('admin',$data);
	}
	public function transaksi_bn($id)
	{
		$querynya = $this->db->get_where('balik_nama',array('id_balik'=>$id));
		if ($querynya->num_rows() > 0) {
			$data['title'] = "Halaman Transaksi Balik Nama STNK";
			$this->load->view('admin',$data);
		}else{
			$this->session->set_flashdata('gagal', 'Data Tidak Di Temukan');
			redirect('main/dashboard');
		}
	}
	public function proses_balik()
	{
		$this->M_back->proses_balik();
	}
	public function p_balik()
	{
		$this->M_back->cetak_balik();
	}
	public function proses_mutasi()
	{
		$this->M_back->proses_mutasi();
	}
	public function p_mutasi()
	{
		$this->M_back->cetak_mutasi();
	}
	//end balik nama//
	
	//start mutasi//
	public function mutasi()
	{
		$data['title'] = "Halaman Mutasi STNK";
		$data['catat'] = $this->db->query('SELECT * FROM catatan  WHERE `id_catat` IN (1,2,3) GROUP BY jenis');
		$this->load->view('admin',$data);
	}
	public function transaksi_m($id)
	{
		$querynya = $this->db->get_where('mutasi',array('id_mutasi'=>$id));
		if ($querynya->num_rows() > 0) {
		$data['title'] = "Halaman Transaksi Mutasi";
		$this->load->view('admin',$data);
		}else{
			$this->session->set_flashdata('gagal', 'Data Tidak Di Temukan');
			redirect('main/dashboard');
		}
	}
	//end mutasi//

	//start mutasi+balik nama//
	public function mutasibn()
	{
		$data['title'] = "Halaman Mutasi+Balik Nama STNK";
		$data['catat'] = $this->db->query('SELECT * FROM catatan WHERE `id_catat` IN (1,2,3) GROUP BY jenis');
		$this->load->view('admin',$data);
	}
	//start mutasi+balik nama//

	//start stnk hilang//
	public function stnk_hilang()
	{
		$data['title'] = "Halaman STNK Hilang";
		$data['catat'] = $this->db->query('SELECT * FROM catatan WHERE `id_catat` IN (1,2,3) GROUP BY jenis');
		$this->load->view('admin',$data);
	}
	public function transaksi_sh()
	{
		// $querynya = $this->db->get_where('perpanjang',array('id_perpanjang'=>$id));
		// if ($querynya->num_rows() > 0) {
			$data['title'] = "Halaman Transaksi STNK Hilang";
			$this->load->view('admin',$data);
		// }else{
			// $this->session->set_flashdata('gagal', 'Data Tidak Di Temukan');
			// redirect('main/dashboard');
		// }
	}
	//end stnk hilang//

	//start Input Berkas//
	public function berkas_jadi()
	{
		$data['title'] = "Halaman Berkas Jadi";
		$this->db->select('*');
		$this->db->join('perpanjang', 'cetak_perpanjang.id_join = perpanjang.id_perpanjang');
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
		}else{
			$data['input_berkas'] = $this->M_back->getBerkas_m($id);
		}
		$this->load->view('admin',$data);
	}

	//end input berkas//
	
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
	public function cetak_perpanjang($id)
	{
		$query = $this->db->query('SELECT * FROM cetak_perpanjang c INNER JOIN perpanjang p ON c.id_join = p.id_perpanjang where c.id_join='.$id.'');
		//return var_dump($query);
		if ($query->num_rows() > 0) {
			$data['perpanjang'] = $query->row();
		}else{
			redirect('main/transaksi_p');
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
		}
		$this->load->view('admin/cetak/c_perpanjang', $data);
	}
	public function cetak_balik($id)
	{
		$query = $this->db->query('SELECT * FROM cetak_balik c INNER JOIN balik_nama p ON c.id_join = p.id_balik where c.id_join='.$id.'');
		//return var_dump($query);
		if ($query->num_rows() > 0) {
			$data['balik'] = $query->row();
			$this->load->view('admin/cetak/c_baliknama', $data);
		}else{
			redirect('main/transaksi_bn');
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
		}
	}
	public function cetak_mutasi($id)
	{
		$query = $this->db->query('SELECT * FROM cetak_mutasi c INNER JOIN mutasi p ON c.id_join = p.id_mutasi where c.id_join='.$id.'');
		// return var_dump($query);
		if ($query->num_rows() > 0) {
			$data['mutasi'] = $query->row();
			$this->load->view('admin/cetak/c_mutasi',$data);
		}else{
			redirect('main/transaksi_p');
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
		}
	}
	//END

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
		$this->M_back->proses_cetak();
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
			$query = $this->db->update('cetak_berkas',array(
			    'status'=>'0'
			  ),
			  array(
			      'id_uri'=>$id));
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
			$query = $this->db->update('cetak_perpanjang',array(
			    'status'=>'0'
			  ),
			  array(
			      'id_join'=>$id));
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
			$query = $this->db->update('cetak_balik',array(
			    'status'=>'0'
			  ),
			  array(
			      'id_join'=>$id));
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
			$query = $this->db->update('cetak_mutasi',array(
			    'status'=>'0'
			  ),
			  array(
			      'id_join'=>$id));
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
			$data['data'] = $this->db->get_where('cetak_perpanjang',array('status' => '1'))->result();
		}elseif ($this->input->post('jenis') == 'bn') {
			$this->db->select('*');
			$this->db->join('balik_nama', 'cetak_balik.id_join = balik_nama.id_balik');
			$data['data'] = $this->db->get_where('cetak_balik',array('status' => '1'))->result();
		}else if ($this->input->post('jenis') == 'mutasi') {
			$this->db->select('*');
			$this->db->join('perpanjang', 'cetak_perpanjang.id_join = perpanjang.id_perpanjang');
			$data['data'] = $this->db->get_where('cetak_perpanjang',array('status' => '1'))->result();
		}else{
			$this->db->select('*');
			$this->db->join('perpanjang', 'cetak_perpanjang.id_join = perpanjang.id_perpanjang');
			$data['data'] = $this->db->get_where('cetak_perpanjang',array('status' => '1'))->result();
		}
		echo json_encode($data);
		
	}
	//end cetak pdf//
	public function logout()
	{
		$sess = $this->session->sess_destroy();
		redirect('welcome/login');
	}
}
