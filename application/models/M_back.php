<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_back extends CI_Model {
	public function proses_daf()
	{
		$v_user = $this->db->get_where('users', array('nama' => $this->input->post('nama',TRUE)))->row();
		$v_email = $this->db->get_where('users', array('email' => $this->input->post('email',TRUE)))->row();
		if (count($v_user) > 0 ) {
			$this->session->set_flashdata('gagal', 'nama yang anda masukan sudah terdaftar di website kami.');
		}else{
			if (count($v_email) > 0) {
				$this->session->set_flashdata('gagal', 'Email yang anda masukan sudah terdaftar di website kami.');
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
						redirect('main/daftar');
					}
				}else{
					$this->session->set_flashdata('gagal', 'Password tidak sama, harap periksa kembali dengan benar.');
					redirect('main/daftar');
				}
			}
		}
	}
	public function load_data()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('blanko');
		return $query->result_array();
	}
	function act_update_blanko($data, $id)
	{
		$this->db->where('id', $id);
		$query = $this->db->update('blanko', $data);
		if ($query == TRUE) {
			$tgl_update = date('d-m-Y');
			$this->db->update('blanko', array(
				'id'=>$id,
				'tgl_update'=>$tgl_update
			));	
		}	
	}
	public function p_perpanjang()
	{
		$jenis = $this->input->post('jenis');
		$jenis_k = $this->input->post('jenis_k');
		$pkb = $this->input->post('pkb');
		$telat_bln= $this->input->post('telat');
		$telat_thn= $this->input->post('telat_thn');
		$sanksi_pkb = $this->input->post('sanksi_pkb');
		$swdllj = $this->input->post('swdllj');
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
		for ($i=0; $i < count($jenis) ; $i++) {
			$query = $this->db->insert('perpanjang', array(
				'jenis'=>$jenis,
				'no'=>count($jenis).''.$gabungan,
				'jenis'=>$jenis_k, 
				'pkb'=>$pkb[$i],
				'telat'=>$telat_bln[$i],
				'telat_tahun'=>$telat_thn[$i],
				'sanksi_pkb'=>$sanksi_pkb[$i],
				'swdllj'=>$swdllj[$i],
				'sanski_swdllj'=>$sanski_swdllj[$i],
				'total'=>$total,
				'hari'=>$dayList[$day],
				'tanggal'=>$gabungan
			));
		}
		if ($query==TRUE) {
			$this->session->set_flashdata('sukses', 'Berhasil Simpan data');
			redirect('main/perpanjang');
		}else{
			$this->session->set_flashdata('gagal', 'Gagal Simpan data');
			redirect('main/perpanjang');
		}
	}
}

/* End of file M_back.php */
/* Location: ./application/models/M_back.php */