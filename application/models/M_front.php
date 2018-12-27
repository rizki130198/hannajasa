<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_front extends CI_Model {

	public function proses_log($u,$p)
	{
		$log = $this->db->get_where('users',array('nama' =>$u,'password' => md5($p)));
		if ($log->num_rows() > 0) {
			$x = $log->row();
			$sessi = array(
				'id_user' => $x->id_user, 
				'email' => $x->email, 
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