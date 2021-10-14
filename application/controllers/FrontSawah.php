<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontSawah extends CI_Controller {

	
	public function index($id = NULL)
	{
        $this->load->model('M_poktan');
        $this->load->model('M_petani');
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Sawah';
		$data['poktan'] = $this->M_poktan->getPetaPoktan();
        $data['lokasi'] = $this->M_petani->getPetaLokasi();
		$data['lokasiId'] = $this->M_petani->getIdPetaLokasi($id);
		$data['gapoktan'] = $this->db->get('gapoktan')->result_array();

		$this->load->view('frontend/template/head', $data);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/topbar', $data);
		$this->load->view('frontend/sawah/sawah');
		$this->load->view('frontend/template/footer');
		// $this->load->view('frontend/template/user_panel', $data);
		$this->load->view('frontend/template/js');
	}

	public function detail($id = NULL)
	{
        $this->load->model('M_poktan');
        $this->load->model('M_petani');
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Sawah';
		$data['poktan'] = $this->M_poktan->getPetaPoktan();
        $data['lokasi'] = $this->M_petani->getPetaLokasi();
        $data['lokasiId'] = $this->M_petani->getIdPetaLokasi($id);
		$data['gapoktan'] = $this->db->get('gapoktan')->result_array();

		$this->load->view('frontend/template/head', $data);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/topbar', $data);
		$this->load->view('frontend/sawah/sawah', $data);
		$this->load->view('frontend/template/footer');
		// $this->load->view('frontend/template/user_panel', $data);
		$this->load->view('frontend/template/js');
	}
}
