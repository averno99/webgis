<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
		$this->load->model('M_poktan');
		$this->load->model('M_petani');
    }

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Dashboard';
		$data['poktan'] = $this->M_poktan->getPetaPoktan();
		$data['petani'] = $this->M_petani->getPetaPetani();
		$data['gapoktan'] = $this->db->get('gapoktan')->result_array();

		if ($this->input->get('cari') != NULL ) {
            $data['poktan'] = $this->M_poktan->getIdPetaPoktan();
        } else {
			$data['poktan'] = $this->M_poktan->getPetaPoktan();
		}

		$this->load->view('backend/template/head', $data);
		$this->load->view('backend/template/aside');
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/dashboard/dashboard');
		$this->load->view('backend/template/footer');
		$this->load->view('backend/template/user_panel', $data);
		$this->load->view('backend/template/js');
	}
}
