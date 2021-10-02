<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gapoktan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
		$this->load->library('form_validation');
    }

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Gapoktan';
        $data['gapoktan'] = $this->db->get('gapoktan')->result_array();

		$this->load->view('backend/template/head', $data);
		$this->load->view('backend/template/aside');
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/gapoktan/index', $data);
		$this->load->view('backend/template/footer');
		$this->load->view('backend/template/user_panel', $data);
		$this->load->view('backend/template/js');
	}

    public function tambah_gapoktan()
    {
        $data['judul'] = 'Tambah Data Gaoktan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['gapoktan'] = $this->db->get('gapoktan')->result_array();

        $this->form_validation->set_rules(
            'gapoktan',
            'Gapoktan',
            'required|trim',
            array('required' => 'Nama Gapoktan tidak boleh kosong')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/gapoktan/tambah_gapoktan', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {

            $data = [
                "nama" => htmlspecialchars($this->input->post('gapoktan', true))
            ];

            $this->db->insert('gapoktan', $data);
            redirect('gapoktan');
        }
    }

    public function ubah($id = NULL)
    {
        $data['judul'] = 'TUbah Data Gaoktan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['gapoktan'] = $this->db->get_where('gapoktan', ['id' => $id])->row_array();

        $this->form_validation->set_rules(
            'gapoktan',
            'Gapoktan',
            'required|trim',
            array('required' => 'Nama Gapoktan tidak boleh kosong')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/gapoktan/ubah_gapoktan', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {

            $data = [
            "nama" => htmlspecialchars($this->input->post('gapoktan', true))
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('gapoktan', $data);
            redirect('gapoktan');
        }
    }

    public function hapus($id = NULL)
    {
        $this->db->where('id', $id);
        $this->db->delete('gapoktan');
        redirect('gapoktan');
    }
}
