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
		$data['title'] = "Halaman Cetak Perpanjang STNK";
		$this->load->view('admin',$data);
	}
	public function transaksi_bn()
	{
		$data['title'] = "Halaman Transaksi Balik Nama STNK";
		$this->load->view('admin',$data);
	}
	//end balik nama//
	
	//start Input Berkas//
	public function berkas_jadi()
	{
		$data['title'] = "Halaman Berkas Jadi";
		$this->db->select('*');
		$this->db->join('perpanjang', 'cetak_perpanjang.id_join = perpanjang.id_perpanjang');
		$data['berkas'] = $this->db->get_where('cetak_perpanjang',array('status' => '1'));
		$this->load->view('admin',$data);
	}
	public function input_berkas($id)
	{
		$data['title'] = "Halaman Input Berkas Jadi";
		$data['input_berkas'] = $this->M_back->getBerkas($id);
		$this->load->view('admin',$data);
	}
	//end input berkas//
	
	//View Berkas
	public function berkas($id)
	{
		$query = $this->db->get_where('cetak_perpanjang',array('id_cetak'=>$id));
		if ($query->num_rows() > 0) {
			$data['berkas'] = $query->row();
		}else{
			redirect('main/berkas_jadi');
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
		}
		$this->load->view('admin/berkas', $data);
	}
	public function cetak_perpanjang($id)
	{
		$query = $this->db->query('SELECT * FROM cetak_perpanjang c INNER JOIN perpanjang p ON c.id_join = p.id_perpanjang where c.id_join='.$id.'');
		if ($query->num_rows() > 0) {
			$data['perpanjang'] = $query->row();
		}else{
			redirect('main/transaksi_p');
			$this->session->set_flashdata('gagal', 'Data yang anda cari tidak ada');
		}
		$this->load->view('admin/cetak/c_perpanjang', $data);
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
	public function update_users()
	{
		$this->M_back->act_update_users();
	}
	public function deleteUsers()
	{
		$this->M_back->actDeleteUser($this->input->post('id_users'));
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
		$data = $this->m_back->load_harga();
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
		$data = $this->m_back->load_data();
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
		$query = $this->db->query('SELECT * FROM catatan WHERE `id_catat` IN (1,2,3,9,10) AND jenis="'.$jenis.'"');
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
		$query = $this->db->query('SELECT * FROM catatan WHERE `id_catat` IN (4,5,6,7) AND jenis="'.$jenis.'"');
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
			$this->load->helper('pdfcrowd.php');
			$client = new \Pdfcrowd\HtmlToPdfClient("admin12", "d6bda03277c431fc9bed7045b9c6e497");
			$client->setPageSize("A4");
			$client->setOrientation("portrait");
			$url = "http://" . $_SERVER["SERVER_NAME"].'/'.$this->uri->segment(1).'/berkas/'.$id;
			$pdf = $client->convertUrl($url);
			// return var_dump($url);
			header("Content-Type: application/pdf");
			header("Cache-Control: no-cache");
			header("Accept-Ranges: none");
			header("Content-Disposition: inline; filename=\"example.pdf\"");
			echo $pdf;
		}else if ($this->uri->segment(3)=="c_perpanjang") {
			$id = $this->uri->segment(4);
			$this->load->helper('pdfcrowd.php');
			$client = new \Pdfcrowd\HtmlToPdfClient("admin12", "d6bda03277c431fc9bed7045b9c6e497");
			$client->setPageSize("A2");
			$client->setOrientation("portrait");
			$url = "http://" . $_SERVER["SERVER_NAME"].'/'.$this->uri->segment(1).'/cetak_perpanjang/'.$id;
			$pdf = $client->convertUrl($url);
			//return var_dump($url);
			header("Content-Type: application/pdf");
			header("Cache-Control: no-cache");
			header("Accept-Ranges: none");
			header("Content-Disposition: inline; filename=\"'.$id.'.pdf\"");
			echo $pdf;
		}else if ($this->uri->segment(3)=="c_baliknama") {
			$data['title'] = "Cetak Balik Nama";
			$this->load->view('admin/cetak/c_baliknama',$data);
		}else{

		}
	}
	//end cetak pdf//
	public function logout()
	{
		$sess = $this->session->sess_destroy();
		redirect('welcome/login');
	}
}
