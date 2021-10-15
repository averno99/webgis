<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model('M_user');
		$this->load->library('form_validation');
    }

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Profil';

        $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/profil/index', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
	}

    public function ubah_profil()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Profil';

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/profil/index', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {

            #Cek ada gambar upload
            
			$upload_gambar = $_FILES['gambar']['name'];

            if ($upload_gambar) {
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = 2048;
                $config['upload_path']      = './assets/gambar/user/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar_lama = $data['user']['gambar'];
                    if ($gambar_lama != 'default.png') {
                        unlink(FCPATH . 'assets/gambar/user/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('gambar', $gambar_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }
			
            $this->M_user->ubahProfil();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('profil');
        }
	}
}
