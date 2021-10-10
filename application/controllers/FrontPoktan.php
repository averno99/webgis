<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontPoktan extends CI_Controller {


	public function index()
	{
        $this->load->model('M_poktan');
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Poktan';
		$data['poktan'] = $this->M_poktan->getAllPoktanUmum();

		$this->load->view('frontend/template/head', $data);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/topbar', $data);
		$this->load->view('frontend/poktani/index', $data);
		$this->load->view('frontend/template/footer');
		// $this->load->view('frontend/template/user_panel', $data);
		$this->load->view('frontend/template/js');
	}

	public function detail($id = NULL) 
	{
        $this->load->model('M_poktan');
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Detail Poktan';
		$data['poktan'] = $this->M_poktan->getIdPoktan($id);
		$data['adminis'] = $this->M_poktan->getAdminis($id);
		$data['infras'] = $this->M_poktan->getInfras($id);

		$this->load->view('frontend/template/head', $data);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/topbar', $data);
		$this->load->view('frontend/poktani/detail_poktan', $data);
		$this->load->view('frontend/template/footer');
		// $this->load->view('frontend/template/user_panel', $data);
		$this->load->view('frontend/template/js');
	}

	public function adminis($id = NULL)
	{
		$this->load->model('M_poktan');
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Detail Poktan';
		$data['poktan'] = $this->M_poktan->getIdPoktan($id);
		$data['adminis'] = $this->M_poktan->getAdminis($id);
		$data['infras'] = $this->M_poktan->getInfras($id);

		$this->load->view('frontend/template/head', $data);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/topbar', $data);
		$this->load->view('frontend/poktani/adminis', $data);
		$this->load->view('frontend/template/footer');
		// $this->load->view('frontend/template/user_panel', $data);
		$this->load->view('frontend/template/js');
	}

	public function pengurus($id = NULL)
	{
		$this->load->model('M_poktan');
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Susunan Kepengurusan';
		$data['poktan'] = $this->M_poktan->getIdPoktan($id);
		$data['adminis'] = $this->M_poktan->getAdminis($id);
		$data['infras'] = $this->M_poktan->getInfras($id);
		$data['petani'] = $this->M_poktan->getPengurusUmum($id);

		$this->load->view('frontend/template/head', $data);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/topbar', $data);
		$this->load->view('frontend/poktani/kepengurusan', $data);
		$this->load->view('frontend/template/footer');
		// $this->load->view('frontend/template/user_panel', $data);
		$this->load->view('frontend/template/js');
	}

	public function infras($id = NULL)
	{
		$this->load->model('M_poktan');
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Detail Poktan';
		$data['poktan'] = $this->M_poktan->getIdPoktan($id);
		$data['adminis'] = $this->M_poktan->getAdminis($id);
		$data['infras'] = $this->M_poktan->getInfras($id);

		$this->load->view('frontend/template/head', $data);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/topbar', $data);
		$this->load->view('frontend/poktani/infras', $data);
		$this->load->view('frontend/template/footer');
		// $this->load->view('frontend/template/user_panel', $data);
		$this->load->view('frontend/template/js');
	}

}
