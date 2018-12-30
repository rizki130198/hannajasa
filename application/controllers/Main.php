<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	//start dashboard//
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
		$data['catat'] = $this->db->get('catatan');
		$data['title'] = "Halaman Perpanjang STNK";
		$this->load->view('admin',$data);
	}
	public function transaksi_p()
	{
		$data['title'] = "Halaman Transaksi Perpanjang STNK";
		$this->load->view('admin',$data);
	}
	//end perpanjang//

	//start balik nama//
	public function balik_nama()
	{
		$this->load->library('pdf');
		$this->pdf->setPaper('A1', 'landscape');
		$this->pdf->filename = "laporan-petanikode.pdf";
		$data['title'] = "Halaman Cetak Perpanjang STNK";
		$this->load->view('admin',$data);
	}
	//end balik nama//

	//start cetak pdf//
	public function cetak()
	{
		if ($this->uri->segment(3)=="c_berkas") {
			$this->load->library('pdf');
			$this->pdf->setPaper('A1', 'portrait');
			$this->pdf->filename = "laporan-petanikode.pdf";
			$data['title'] = "Halaman Cetak Berkas Jadi";
			$this->pdf->load_view('admin',$data);
		}else if ($this->uri->segment(3)=="c_perpanjang") {
			$data['title'] = "Halaman Cetak Perpanjang STNK";
			$this->load->library('pdf');
			$this->pdf->setPaper('A1', 'portrait');
			$this->pdf->filename = "laporan-petanikode.pdf";
			$this->load->view('admin',$data);
		}else{

		}
	}
	//end cetak pdf//
	
	//start Input Berkas//
	public function berkas_jadi()
	{
		$data['title'] = "Halaman Berkas Jadi";
		$this->load->view('admin',$data);
	}
	public function input_berkas()
	{
		$data['title'] = "Halaman Input Berkas Jadi";
		$this->load->view('admin',$data);
	}
	//end input berkas//

	//start kasir//
	public function daftar()
	{
		$data['title'] = "Halaman Tambah Cashier";
		$this->load->view('admin',$data);
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
		$data['harga'] = $this->db->get('catatan')->result();
		$this->load->view('admin',$data);
	}
	//end daftar harga//
	public function logout()
	{
		$sess = $this->session->sess_destroy();
		redirect('welcome/login');
	}
}
