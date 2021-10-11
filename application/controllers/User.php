<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
        if ($this->session->userdata('role') !== 'Super Admin') {
            redirect('blokir');
        }

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Kelola User';
        $data['users'] = $this->M_user->getAllUser();

		$this->load->view('backend/template/head', $data);
		$this->load->view('backend/template/aside');
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/user/index', $data);
		$this->load->view('backend/template/footer');
		$this->load->view('backend/template/user_panel', $data);
		$this->load->view('backend/template/js');
	}

    public function tambah_user()
    {
        if ($this->session->userdata('role') !== 'Super Admin') {
            redirect('blokir');
        }

        $data['judul'] = 'Tambah Data User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules(
            'nama',
            'Nama user',
            'required|trim',
            array('required' => 'Nama user tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|is_unique[user.username]|min_length[5]',
            array(
                'required' => 'Username tidak boleh kosong',
                'is_unique' => 'Username telah digunakan',
                'min_length' => 'Mohon masukkan username minimal 5 karakter'
            )
        );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[4]|max_length[16]',
            array(
                'min_length' => 'Mohon masukkan password dengan 4 - 16 karakter',
                'max_length' => 'Mohon masukkan password dengan 4 - 16 karakter',
                'required' => 'Password tidak boleh kosong'
            )
        );
        $this->form_validation->set_rules(
            'password2',
            'Ulangi password',
            'trim|matches[password1]',
            array('matches' => 'Password tidak sesuai.')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/user/tambah_user', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {

            $upload_gambar = $_FILES['gambar']['name'];

            if ($upload_gambar) {
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = 2048;
                $config['upload_path']      = './assets/gambar/user/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar_lama = $data['user']['gambar'];
                    
                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('gambar', $gambar_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->M_user->tambahUser($upload_gambar);
            // $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('user');
        }
        
    }

    public function ubah_user($id = NULL)
    {
        if ($this->session->userdata('role') !== 'Super Admin') {
            redirect('blokir');
        }

        $data['judul'] = 'Tambah Data User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['users'] = $this->M_user->getIdUser($id);
        $data['status'] = ['Aktif', 'Tidak Aktif'];

        $this->form_validation->set_rules(
            'nama',
            'Nama user',
            'required|trim',
            array('required' => 'Nama user tidak boleh kosong')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/user/ubah_user', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {

            $upload_gambar = $_FILES['gambar']['name'];

            if ($upload_gambar) {
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = 2048;
                $config['upload_path']      = './assets/gambar/user/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar_lama = $data['users']['gambar'];
                    if ($gambar_lama != 'default.png') {
                        unlink(FCPATH . 'assets/gambar/user/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('gambar', $gambar_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->M_user->ubahUser();
            // $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('user');
        }
        
    }

    public function reset_password($id = NULL)
    {
        if ($this->session->userdata('role') !== 'Super Admin') {
            redirect('blokir');
        }

        $data['judul'] = 'Reset Password User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['users'] = $this->M_user->getIdUser($id);

        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[4]|max_length[16]',
            array(
                'min_length' => 'Mohon masukkan password dengan 4 - 16 karakter',
                'max_length' => 'Mohon masukkan password dengan 4 - 16 karakter',
                'required' => 'Password tidak boleh kosong'
            )
        );
        $this->form_validation->set_rules(
            'password2',
            'Ulangi password',
            'trim|matches[password1]',
            array('matches' => 'Password tidak sesuai.')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/user/reset_password', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {

            $this->M_user->resetPassword();
            // $this->session->set_flashdata('flash', 'Diubah');
            redirect('user');
        }
    }

    public function detail_user($id = NULL)
    {
        if ($this->session->userdata('role') !== 'Super Admin') {
            redirect('blokir');
        }
        
        $data['judul'] = 'Detail Data User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['users'] = $this->M_user->getIdUser($id);

        $this->load->view('backend/template/head', $data);
		$this->load->view('backend/template/aside');
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/user/detail_user', $data);
		$this->load->view('backend/template/footer');
		$this->load->view('backend/template/user_panel', $data);
		$this->load->view('backend/template/js');
    }

    public function hapus_user($id = NULL)
    {
        $data['users'] = $this->M_user->getIdUser($id);

        $gambar_lama = $data['users']['gambar'];
        if ($gambar_lama != 'default.png') {
            unlink(FCPATH . 'assets/gambar/user/' . $gambar_lama);
        }

        $this->M_user->hapusUser($id);
        // $this->session->set_flashdata('flash', 'Dihapus');
        redirect('user');
    }

    public function blokir(){
		echo "Anda Tidak Memilik Hak Akses";
	}
}
