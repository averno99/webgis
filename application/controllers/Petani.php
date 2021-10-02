<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petani extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model('M_petani');
		$this->load->library('form_validation');
    }

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Petani';
        $data['petani'] = $this->M_petani->getAllPetani();

		$this->load->view('backend/template/head', $data);
		$this->load->view('backend/template/aside');
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/petani/index', $data);
		$this->load->view('backend/template/footer');
		$this->load->view('backend/template/user_panel', $data);
		$this->load->view('backend/template/js');
	}

    public function detail($id = NULL)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Detail Petani';
		$data['petani'] = $this->M_petani->getIdPetani($id);

		$this->load->view('backend/template/head', $data);
		$this->load->view('backend/template/aside');
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/petani/detail', $data);
		$this->load->view('backend/template/footer');
		$this->load->view('backend/template/user_panel', $data);
		$this->load->view('backend/template/js');
	}

    public function prasarana($id = NULL)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Prasarana & Sarana Pertanian';
		$data['petani'] = $this->M_petani->getIdPetani($id);
		$data['prasarana'] = $this->M_petani->getPrasarana($id);
        $data['lokasi'] = $this->M_petani->getLokasi($id);
        $data['sarana'] = $this->M_petani->getSarana($id);

		$this->load->view('backend/template/head', $data);
		$this->load->view('backend/template/aside');
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/petani/prasarana', $data);
		$this->load->view('backend/template/footer');
		$this->load->view('backend/template/user_panel', $data);
		$this->load->view('backend/template/js');
	}

    public function produksi($id = NULL)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Prasarana & Sarana Pertanian';
		$data['petani'] = $this->M_petani->getIdPetani($id);
		$data['produksi'] = $this->M_petani->getProduksi($id);
        $data['data_produksi'] = $this->M_petani->getDataProduksi($id);

		$this->load->view('backend/template/head', $data);
		$this->load->view('backend/template/aside');
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/petani/produksi', $data);
		$this->load->view('backend/template/footer');
		$this->load->view('backend/template/user_panel', $data);
		$this->load->view('backend/template/js');
	}

	public function tambah_petani()
    {
        $data['judul'] = 'Tambah Data Petani';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['status'] = ['Anggota Kelompok Tani', 'Non Anggota'];
		$data['poktan'] = $this->db->get('poktan')->result_array();
		$data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];
		$data['pendidikan'] = ['Sarjana', 'SMU/SMK', 'SLTP', 'SD', 'Tidak Tamat SD', 'Tidak Sekolah'];
		

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|trim',
            array('required' => 'Nama Gapoktan tidak boleh kosong')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/petani/tambah_petani', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {

            $upload_foto = $_FILES['foto']['name'];

            if ($upload_foto) {
                $config['allowed_types']    = 'jpg|jpeg|png|gif';
                $config['max_size']         = 10240;
                $config['upload_path']      = './assets/gambar/petani/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $foto_baru = $this->upload->data('file_name');
                    $this->db->set('foto', $foto_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->M_petani->tambahPetani($upload_foto);
            // $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('petani');
        }
    }

	public function ubah_petani($id = NULL)
    {
        $data['judul'] = 'Ubah Data Petani';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['petani'] = $this->M_petani->getIdPetani($id);
		$data['status'] = ['Anggota Kelompok Tani', 'Non Anggota'];
		$data['poktan'] = $this->db->get('poktan')->result_array();
		$data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];
		$data['pendidikan'] = ['Sarjana', 'SMU/SMK', 'SLTP', 'SD', 'Tidak Tamat SD', 'Tidak Sekolah'];
		

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|trim',
            array('required' => 'Nama Gapoktan tidak boleh kosong')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/petani/ubah_petani', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {

            $upload_foto = $_FILES['foto']['name'];

            if ($upload_foto) {
                $config['allowed_types']    = 'jpg|jpeg|png|gif';
                $config['max_size']         = 10240;
                $config['upload_path']      = './assets/gambar/petani/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $foto_lama = $data['petani']['foto'];
                    if ($foto_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/gambar/petani/' . $foto_lama);
                    }

                    $foto_baru = $this->upload->data('file_name');
                    $this->db->set('foto', $foto_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->M_petani->ubahPetani();
            // $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('petani');
        }
    }
}
