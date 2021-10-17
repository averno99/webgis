<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// public function __construct()
    // {
    //     // parent::__construct();
    //     // if (!$this->session->userdata('username')) {
    //     //     redirect('auth');
    //     // }
	// 	$this->load->model('M_poktan');
    // }

	public function index()
	{
        $this->load->model('M_poktan');
		$this->load->model('M_petani');
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Dashboard';
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

		$this->load->view('frontend/template/head', $data);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/topbar',);
        $this->load->view('frontend/dashboard/dashboard', $data);
		$this->load->view('frontend/template/footer');
		// $this->load->view('frontend/template/user_panel',);
		$this->load->view('frontend/template/js');
        // echo "hai";
	}
}
