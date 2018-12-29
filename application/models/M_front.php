<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_front extends CI_Model {

	public function proses_log($u,$p)
	{
		$this->db->from('users');
		$this->db->select('*');
		$this->db->where('username', $u);
		$this->db->where('password', md5($p));
		$this->db->or_where('email', $u);
		$log = $this->db->get();
		if ($log->num_rows() > 0) {
			$x = $log->row();
			$sessi = array(
				'id' => $x->id_users, 
				'email' => $x->email, 
				'user' => $x->username, 
				'nama' => $x->nama, 
				'hak_akses' => $x->hak_akses
			);
			$this->session->set_userdata($sessi);
			redirect('main/dashboard');
		}else{
			$this->session->set_flashdata('gagal', 'Tidak dapat login, harap periksa kembali username dan password anda');
			redirect('welcome/login');
		}
	}

}

/* End of file M_front.php */
/* Location: ./application/models/M_front.php */