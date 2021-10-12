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
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Dashboard';
		$data['poktan'] = $this->M_poktan->getPetaPoktan();

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
