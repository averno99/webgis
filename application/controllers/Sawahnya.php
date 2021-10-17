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
		$data['judul'] = 'Sawahnya';
		$data['poktan'] = $this->M_poktan->getPetaPoktan();
		$data['petani'] = $this->M_petani->getPetaPetani();
		$data['gapoktan'] = $this->db->get('gapoktan')->result_array();
		$data['gapoktanTani'] = $this->db->get('gapoktan')->result_array();

		if ($this->input->get('cari') != NULL ) {
            $data['poktan'] = $this->M_poktan->getIdPetaPoktan();
			$data['gapoktanTani'] = $this->db->get_where('gapoktan', ['id' => $this->input->get('cari')])->result_array();
        } else {
			$data['poktan'] = $this->M_poktan->getPetaPoktan();
			$data['gapoktanTani'] = $this->db->get('gapoktan')->result_array();
		}

		$this->load->view('backend/template/head', $data);
		$this->load->view('backend/template/aside');
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/sawah/sawahnya');
		$this->load->view('backend/template/footer');
		$this->load->view('backend/template/user_panel', $data);
		$this->load->view('backend/template/js');
	}

	public function detail($id = NULL)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Sawahnya';
		$data['poktan'] = $this->M_poktan->getPetaPoktan();
		$data['poktanId'] = $this->M_poktan->getPetaIdPoktan($id);
		$data['petani'] = $this->M_petani->getPetaPetani();
		$data['gapoktan'] = $this->db->get('gapoktan')->result_array();

		$this->load->view('backend/template/head', $data);
		$this->load->view('backend/template/aside');
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/sawah/sawahnya');
		$this->load->view('backend/template/footer');
		$this->load->view('backend/template/user_panel', $data);
		$this->load->view('backend/template/js');
	}
}
