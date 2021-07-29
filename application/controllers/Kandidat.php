<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandidat extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('string');
		$this->Auth_model->cekLogin($this->session->userdata('username'));
	}

	public function index()
	{
		$data = [
			'title' => 'Kandidat',
			'kandidat' => $this->db->get('kandidat')->result(),
		];
		$this->load->view('partials/navbar', $data);
		$this->load->view('admin/kandidat/index', $data);
		$this->load->view('partials/sidebar', $data);
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah Data Kandidat',
		];

		$this->form_validation->set_rules('nama_kandidat', 'Nama Kandidat', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/kandidat/create', $data);
		} else {
			$this->store();
		}
		$this->load->view('partials/navbar', $data);
		$this->load->view('admin/kandidat/create', $data);
		$this->load->view('partials/sidebar', $data);
	}

	public function store()
	{
		$config['upload_path']          = './public/backend/images/kandidat/';
       $config['allowed_types']        = 'jpg|png';
       $config['encrypt_name']        = true;

       $this->load->library('upload', $config);

       if ($this->upload->do_upload('foto_kandidat'))
       {
       	$upload = $this->upload->data();
       	$data = [
       		'nama_kandidat' => $this->input->post('nama_kandidat'),
       		'no_kandidat' => random_string('alnum', 20),
       		'foto_kandidat' => $upload['file_name'],
       	];
       }
       else
       {
         $this->session->set_flashdata('error', $this->upload->display_errors());
			redirect('admin/kandidat/create');
       }
		

		$this->db->insert('kandidat', $data);
   	$this->session->set_flashdata('success', '<div class="alert alert-success">Data Kandidat Berhasil Ditambahkan.</div>');
		redirect('admin/kandidat');
	}

	public function delete($id)
	{
		$kandidat = $this->db->get_where('kandidat' , ['id_kandidat' => $id])->row();
		if($kandidat->foto_kandidat != null) {
			unlink('./public/backend/images/kandidat/' . $kandidat->foto_kandidat);
		}
		$this->db->delete('kandidat', ['id_kandidat' => $id]);
   	$this->session->set_flashdata('success', '<div class="alert alert-success">Data Kandidat Berhasil Dihapus.</div>');
		redirect('admin/kandidat');
	}

	public function edit($id)
	{
		$kandidat = $this->db->get_where('kandidat' , ['id_kandidat' => $id])->row();
		$data = [
			'title' => 'Edit Data Kandidat - ' . $kandidat->nama_kandidat,
			'kandidat' => $kandidat
		];

		// cek no_kandidat
		if($kandidat->no_kandidat == $this->input->post('no_kandidat')) {
			$rules = 'max_length[20]';
		} else {
			$rules = 'max_length[20]|is_unique[kandidat.no_kandidat]';
		}

		$this->form_validation->set_rules('nama_kandidat', 'Nama Kandidat', 'required');
		$this->form_validation->set_rules('no_kandidat', 'No.Kandidat', $rules);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/kandidat/edit', $data);
		} else {
			$this->update($id);
		}

		$this->load->view('partials/navbar', $data);
		$this->load->view('admin/kandidat/edit', $data);
		$this->load->view('partials/sidebar', $data);
	}

	public function update($id)
	{
		$config['upload_path']          = './public/backend/images/kandidat/';
       $config['allowed_types']        = 'jpg|png';
       $config['encrypt_name']        = true;

       $this->load->library('upload', $config);

       if ($this->upload->do_upload('foto_kandidat'))
       {
       	$upload = $this->upload->data();
       	$foto = $upload['file_name'];
       	unlink('./public/backend/images/kandidat/' . $this->input->post('foto_kandidat_lama'));
       }
       else
       {
         $foto = $this->input->post('foto_kandidat_lama');
       }
		$data = [
			'nama_kandidat' => $this->input->post('nama_kandidat'),
			'no_kandidat' => random_string('alnum', 20),
			'foto_kandidat' => $foto,
		];

		$this->db->where('id_kandidat', $id);
		$this->db->update('kandidat', $data);
   	$this->session->set_flashdata('success', '<div class="alert alert-success">Data Kandidat Berhasil Diedit.</div>');
		redirect('admin/kandidat');
	}

	public function laporan()
	{
		$data = [
			'title' => 'Laporan Kandidat',
			'kandidat' => $this->db->get('kandidat')->result(),
		];
		$this->load->view('partials/navbar', $data);
		$this->load->view('admin/kandidat/laporan', $data);
		$this->load->view('partials/sidebar', $data);
	}

	public function cetak()
	{
		$data = [
			'kandidat' => $this->db->get('kandidat')->result(),
		];
		$this->load->view('admin/kandidat/cetak', $data);
	}

	public function suara()
	{
		$suaraMasuk = $this->db->get('pilih')->num_rows();
		$data = [
			'title' => 'Laporan Penghitung Suara',
			'kandidat' => $this->db->get('kandidat')->result(),
			'suaraMasuk' => $suaraMasuk,
		];
		$this->load->view('partials/navbar', $data);
		$this->load->view('admin/kandidat/laporan-suara', $data);
		$this->load->view('partials/sidebar', $data);
	}

	public function cetak_suara()
	{
		$suaraMasuk = $this->db->get('pilih')->num_rows();
		$data = [
			'title' => 'Laporan Penghitung Suara',
			'kandidat' => $this->db->get('kandidat')->result(),
			'suaraMasuk' => $suaraMasuk,
		];
		$this->load->view('admin/kandidat/cetak-suara', $data);
	}

}
