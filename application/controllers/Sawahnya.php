<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sawahnya extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
		$this->load->model('M_poktan');
        $this->load->model('M_petani');
    }

	public function index($id = NULL)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Sawah Nya';
		$data['poktan'] = $this->M_poktan->getPetaPoktan();
        $data['lokasi'] = $this->M_petani->getPetaLokasi();
        $data['lokasiId'] = $this->M_petani->getIdPetaLokasi($id);
		$data['gapoktan'] = $this->db->get('gapoktan')->result_array();

		$this->load->view('backend/template/head', $data);
		$this->load->view('backend/template/aside');
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/sawah/sawahnya', $data);
		$this->load->view('backend/template/footer');
		$this->load->view('backend/template/user_panel', $data);
		$this->load->view('backend/template/js');
	}
}
