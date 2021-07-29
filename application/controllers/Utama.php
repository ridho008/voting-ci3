<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {
	public function index()
	{
		$sudahMemilih = $this->db->get_where('pilih', ['id_pemilih' => $this->session->userdata('id_pemilih')]);
		$data = [
			'title' => 'Pemilihan',
			'kandidat' => $this->db->get('kandidat')->result(),
			'sudahMemilih' => $sudahMemilih,
		];
		$this->load->view('partials/navbar', $data);
		$this->load->view('utama/pemilihan', $data);
		$this->load->view('partials/sidebar', $data);
	}

	public function pilih($id_kandidat)
	{
		$data = [
			'id_kandidat' => $id_kandidat,
			'id_pemilih' => $this->session->userdata('id_pemilih'),
			'tgl_rekam' => date('Y-m-d H:i:s'),
		];
		$this->db->insert('pilih', $data);
		$this->session->set_flashdata('success', '<div class="alert alert-success">Anda Berhasil Memilih Kandidat.</div>');
		redirect('utama');
	}
}
