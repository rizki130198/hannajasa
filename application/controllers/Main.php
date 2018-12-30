<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function dashboard()
	{
		$data['title'] = "Halaman Dashboard";
		$this->load->view('admin',$data);
	}
	public function perhitungan()
	{
		$data['title'] = "Halaman Perhitungan Jasa";
		$this->load->view('admin',$data);
	}
	public function perpanjang()
	{
		$data['title'] = "Halaman Perpanjang STNK";
		$data['catat'] = $this->db->get('catatan');
		$this->load->view('admin',$data);
	}
	public function transaksi_p()
	{
		$data['title'] = "Halaman Transaksi Perpanjang STNK";
		$this->load->view('admin',$data);
	}
	public function c_perpanjang()
	{
		$data['title'] = "Halaman Cetak Perpanjang STNK";
		$this->load->library('pdf');
		$this->pdf->setPaper('A1', 'landscape');
		$this->pdf->filename = "laporan-petanikode.pdf";
		$this->load->view('admin',$data);
	}
	public function balik_nama()
	{
		$data['title'] = "Halaman Balik Nama STNK";
		$this->load->view('admin',$data);
	}
	public function daftar()
	{
		$data['title'] = "Halaman Tambah Cashier";
		$this->load->view('admin',$data);
	}
	public function harga()
	{
		$data['title'] = "Halaman Daftar Harga";
		$data['harga'] = $this->db->get('catatan')->result();
		$this->load->view('admin',$data);
	}
	public function proses_daftar()
	{
		$this->M_back->proses_daf();
	}
	public function logout()
	{
		$sess = $this->session->sess_destroy();
		redirect('welcome/login');
	}
}
