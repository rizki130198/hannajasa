<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function login()
	{
		$data['title'] = "Halaman Login";
		$this->load->view('include/head',$data);
		$this->load->view('bebas/login');
		$this->load->view('include/foot');
	}
	public function act_log()
	{
		 $u = $this->input->post('username');
		 $p = $this->input->post('password');
		 $this->M_front->proses_log($u,$p);
	}
	public function error404()
	{
		$this->load->view('include/head');
		$this->load->view('404');
		$this->load->view('include/foot');
	}
	public function proses_input()
	{
		$this->M_back->proses_input();
	}
}
