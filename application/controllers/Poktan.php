<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poktan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
		$this->load->model('M_poktan');
		$this->load->library('form_validation');
    }

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Poktan';
		$data['poktan'] = $this->M_poktan->getAllPoktan();

		$this->load->view('backend/template/head', $data);
		$this->load->view('backend/template/aside');
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/poktan/index', $data);
		$this->load->view('backend/template/footer');
		$this->load->view('backend/template/user_panel', $data);
		$this->load->view('backend/template/js');
	}

	public function detail($id = NULL)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Detail Poktan';
		$data['poktan'] = $this->M_poktan->getIdPoktan($id);
		$data['adminis'] = $this->M_poktan->getAdminis($id);
		$data['infras'] = $this->M_poktan->getInfras($id);

		$this->load->view('backend/template/head', $data);
		$this->load->view('backend/template/aside');
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/poktan/detail', $data);
		$this->load->view('backend/template/footer');
		$this->load->view('backend/template/user_panel', $data);
		$this->load->view('backend/template/js');
	}

	public function adminis($id = NULL)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Detail Poktan';
		$data['poktan'] = $this->M_poktan->getIdPoktan($id);
		$data['adminis'] = $this->M_poktan->getAdminis($id);
		$data['infras'] = $this->M_poktan->getInfras($id);

		$this->load->view('backend/template/head', $data);
		$this->load->view('backend/template/aside');
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/poktan/adminis', $data);
		$this->load->view('backend/template/footer');
		$this->load->view('backend/template/user_panel', $data);
		$this->load->view('backend/template/js');
	}

	public function pengurus($id = NULL)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Susunan Kepengurusan';
		$data['poktan'] = $this->M_poktan->getIdPoktan($id);
		$data['adminis'] = $this->M_poktan->getAdminis($id);
		$data['infras'] = $this->M_poktan->getInfras($id);
		$data['petani'] = $this->M_poktan->getPengurus($id);

		$this->load->view('backend/template/head', $data);
		$this->load->view('backend/template/aside');
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/poktan/kepengurusan', $data);
		$this->load->view('backend/template/footer');
		$this->load->view('backend/template/user_panel', $data);
		$this->load->view('backend/template/js');
	}

	public function infras($id = NULL)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Detail Poktan';
		$data['poktan'] = $this->M_poktan->getIdPoktan($id);
		$data['adminis'] = $this->M_poktan->getAdminis($id);
		$data['infras'] = $this->M_poktan->getInfras($id);

		$this->load->view('backend/template/head', $data);
		$this->load->view('backend/template/aside');
		$this->load->view('backend/template/topbar', $data);
		$this->load->view('backend/poktan/infras', $data);
		$this->load->view('backend/template/footer');
		$this->load->view('backend/template/user_panel', $data);
		$this->load->view('backend/template/js');
	}

	public function tambah_poktan()
    {
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('poktan/blokir');
        }
		
        $data['judul'] = 'Tambah Data Poktan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['gapoktan'] = $this->db->get('gapoktan')->result_array();
		$data['status'] = ['Terdaftar', 'Belum Terdaftar'];
		$data['pengukuhan'] = ['Ada', 'Tidak Ada'];

        $this->form_validation->set_rules(
            'gapoktan',
            'Gapoktan',
            'required|trim',
            array('required' => 'Nama Gapoktan tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'poktan',
            'Poktan',
            'required|is_unique[poktan.nama]|trim',
            array(
				'is_unique' => 'Data telah ada',
				'required' => 'Nama Poktan tidak boleh kosong')
        );
		// $this->form_validation->set_rules(
        //     'ketua',
        //     'Ketua',
        //     'required|trim',
        //     array('required' => 'Nama Ketua tidak boleh kosong')
        // );
		// $this->form_validation->set_rules(
        //     'kecamatan',
        //     'Kecamatan',
        //     'required|trim',
        //     array('required' => 'Nama Kecamatan tidak boleh kosong')
        // );
		// $this->form_validation->set_rules(
        //     'desa',
        //     'Desa',
        //     'required|trim',
        //     array('required' => 'Nama Desa tidak boleh kosong')
        // );
		// $this->form_validation->set_rules(
        //     'dusun',
        //     'Dusun',
        //     'required|trim',
        //     array('required' => 'Nama Dusun tidak boleh kosong')
        // );
		// $this->form_validation->set_rules(
        //     'rt',
        //     'Rt',
        //     'required|trim',
        //     array('required' => 'Nama Rt tidak boleh kosong')
        // );
		// $this->form_validation->set_rules(
        //     'rw',
        //     'Rw',
        //     'required|trim',
        //     array('required' => 'Nama Rw tidak boleh kosong')
        // );
		// $this->form_validation->set_rules(
        //     'warna',
        //     'Warna',
        //     'required|trim',
        //     array('required' => 'Data Warna tidak boleh kosong')
        // );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/poktan/tambah_poktan', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {

            $upload_geojson = $_FILES['geojson']['name'];

            if ($upload_geojson) {
                $config['allowed_types']    = 'geojson';
                $config['max_size']         = 10240;
                $config['upload_path']      = './assets/geojson/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('geojson')) {
                    $geojson_baru = $this->upload->data('file_name');
                    $this->db->set('geojson', $geojson_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->M_poktan->tambahPoktan($upload_geojson);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('poktan');
        }
    }

	public function ubah_poktan($id = NULL)
    {
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('poktan/blokir');
        }

        $data['judul'] = 'Tambah Data Poktan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['poktan'] = $this->M_poktan->getIdPoktan($id);
		$data['gapoktan'] = $this->db->get('gapoktan')->result_array();
		$data['status'] = ['Terdaftar', 'Belum Terdaftar'];
		$data['pengukuhan'] = ['Ada', 'Tidak Ada'];

        $this->form_validation->set_rules(
            'gapoktan',
            'Gapoktan',
            'required|trim',
            array('required' => 'Nama Gapoktan tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'poktan',
            'Poktan',
            'required|trim',
            array('required' => 'Nama Poktan tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'ketua',
            'Ketua',
            'required|trim',
            array('required' => 'Nama Ketua tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'kecamatan',
            'Kecamatan',
            'required|trim',
            array('required' => 'Nama Kecamatan tidak boleh kosong')
        );
		// $this->form_validation->set_rules(
        //     'desa',
        //     'Desa',
        //     'required|trim',
        //     array('required' => 'Nama Desa tidak boleh kosong')
        // );
		// $this->form_validation->set_rules(
        //     'dusun',
        //     'Dusun',
        //     'required|trim',
        //     array('required' => 'Nama Dusun tidak boleh kosong')
        // );
		// $this->form_validation->set_rules(
        //     'rt',
        //     'Rt',
        //     'required|trim',
        //     array('required' => 'Nomor Rt tidak boleh kosong')
        // );
		// $this->form_validation->set_rules(
        //     'rw',
        //     'Rw',
        //     'required|trim',
        //     array('required' => 'Nomor Rw tidak boleh kosong')
        // );
		// $this->form_validation->set_rules(
        //     'luas_lahan',
        //     'Luas_lahan',
        //     'numeric|trim',
        //     array('')
        // );
		// $this->form_validation->set_rules(
        //     'komoditas_unggul',
        //     'Komoditas_Unggul',
        //     'required|trim',
        //     array('required' => 'Komoditas Unggulan tidak boleh kosong')
        // );
		// $this->form_validation->set_rules(
        //     'warna',
        //     'Warna',
        //     'required|trim',
        //     array('required' => 'Data Warna tidak boleh kosong')
        // );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/poktan/ubah_poktan', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {

            $upload_geojson = $_FILES['geojson']['name'];

            if ($upload_geojson) {
                $config['allowed_types']    = 'geojson';
                $config['max_size']         = 10240;
                $config['upload_path']      = './assets/geojson/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('geojson')) {
                    $geojson_lama = $data['poktan']['geojson'];
                    if ($geojson_lama != 'default.geojson') {
                        unlink(FCPATH . 'assets/geojson/' . $geojson_lama);
                    }

                    $geojson_baru = $this->upload->data('file_name');
                    $this->db->set('geojson', $geojson_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->M_poktan->ubahPoktan();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('poktan/detail/'. $id);
        }
    }

	public function tambah_adminis($id = NULL)
    {
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('poktan/blokir');
        }

        $data['judul'] = 'Tambah Data Administrasi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['poktan'] = $this->M_poktan->getIdPoktan($id);
		
        $this->form_validation->set_rules(
            'jumlah[]',
            'Jumlah',
            'trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/poktan/tambah_adminis', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {
			$idd = $_POST['id']; // Ambil data nis dan masukkan ke variabel nis
    		$adminis_kelompok = $_POST['adminis_kelompok']; // Ambil data nama dan masukkan ke variabel nama
    		$jumlah = $_POST['jumlah']; // Ambil data telp dan masukkan ke variabel telp
    		$satuan = $_POST['satuan']; // Ambil data alamat dan masukkan ke variabel alamat
    		$data = array();
    
    		$index = 0; // Set index array awal dengan 0
    		foreach($idd as $dataid){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      			array_push($data, array(
        			'id_poktan'=>$dataid,
        			'adminis_kelompok'=>$adminis_kelompok[$index],  // Ambil dan set data nama sesuai index array dari $index
        			'jumlah'=>$jumlah[$index],  // Ambil dan set data telepon sesuai index array dari $index
        			'satuan'=>$satuan[$index],  // Ambil dan set data alamat sesuai index array dari $index
      			));
      			$index++;
    		}    
      		$this->M_poktan->tambahAdminis($data);
            $this->session->set_flashdata('flash', 'Ditambah');
			redirect('poktan/adminis/'.$id);
			
		}
	}

    public function tambah_adminis_lainnya($id = NULL)
    {
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('poktan/blokir');
        }

        $data['judul'] = 'Tambah Data Administrasi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['poktan'] = $this->M_poktan->getIdPoktan($id);
		
        $this->form_validation->set_rules(
            'jumlah[]',
            'Jumlah',
            'trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/poktan/tambah_adminis_lainnya', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {
			$idd = $_POST['id']; // Ambil data nis dan masukkan ke variabel nis
    		$adminis_kelompok = $_POST['adminis_kelompok']; // Ambil data nama dan masukkan ke variabel nama
    		$jumlah = $_POST['jumlah']; // Ambil data telp dan masukkan ke variabel telp
    		$satuan = $_POST['satuan']; // Ambil data alamat dan masukkan ke variabel alamat
    		$data = array();
    
    		$index = 0; // Set index array awal dengan 0
    		foreach($idd as $dataid){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      			array_push($data, array(
        			'id_poktan'=>$dataid,
        			'adminis_kelompok'=>$adminis_kelompok[$index],  // Ambil dan set data nama sesuai index array dari $index
        			'jumlah'=>$jumlah[$index],  // Ambil dan set data telepon sesuai index array dari $index
        			'satuan'=>$satuan[$index],  // Ambil dan set data alamat sesuai index array dari $index
      			));
      			$index++;
    		}    
      		$this->M_poktan->tambahAdminis($data);
            $this->session->set_flashdata('flash', 'Ditambah');
			redirect('poktan/adminis/'.$id);
			
		}
	}

	public function ubah_adminis($id = NULL)
    {
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('blokir');
        }
		
        $data['judul'] = 'Ubah Data Administrasi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['poktan'] = $this->M_poktan->getIdPoktan($id);
		$data['adminis'] = $this->db->get_where('keleng_adminis', ['id_poktan' => $id])->result_array();
		
        $this->form_validation->set_rules(
            'jumlah[]',
            'Jumlah',
            'numeric|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/poktan/ubah_adminis', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {
			$idd = $_POST['id']; // Ambil data nis dan masukkan ke variabel nis
    		$adminis_kelompok = $_POST['adminis_kelompok']; // Ambil data nama dan masukkan ke variabel nama
    		$jumlah = $_POST['jumlah']; // Ambil data telp dan masukkan ke variabel telp
    		$satuan = $_POST['satuan']; // Ambil data alamat dan masukkan ke variabel alamat
    		$data = array();
    
    		$index = 0; // Set index array awal dengan 0
    		foreach($idd as $dataid){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      			array_push($data, array(
        			'id'=>$dataid,
        			'adminis_kelompok'=>$adminis_kelompok[$index],  // Ambil dan set data nama sesuai index array dari $index
        			'jumlah'=>$jumlah[$index],  // Ambil dan set data telepon sesuai index array dari $index
        			'satuan'=>$satuan[$index],  // Ambil dan set data alamat sesuai index array dari $index
      			));
      			$index++;
    		}    
      		$this->db->update_batch('keleng_adminis',$data, 'id');
            $this->session->set_flashdata('flash', 'Diubah');
			redirect('poktan/adminis/'.$id);
			
		}
	}

	public function tambah_infras($id = NULL)
    {
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('blokir');
        }

        $data['judul'] = 'Tambah Data Infrastruktur';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['poktan'] = $this->M_poktan->getIdPoktan($id);
		
        $this->form_validation->set_rules(
            'jumlah[]',
            'Jumlah',
            'numeric|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/poktan/tambah_infras', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {
			$idd = $_POST['id']; // Ambil data nis dan masukkan ke variabel nis
    		$infra_pertanian = $_POST['infra_pertanian']; // Ambil data nama dan masukkan ke variabel nama
    		$jumlah = $_POST['jumlah']; // Ambil data telp dan masukkan ke variabel telp
    		$satuan = $_POST['satuan']; // Ambil data alamat dan masukkan ke variabel alamat
    		$data = array();
    
    		$index = 0; // Set index array awal dengan 0
    		foreach($idd as $dataid){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      			array_push($data, array(
        			'id_poktan'=>$dataid,
        			'infra_pertanian'=>$infra_pertanian[$index],  // Ambil dan set data nama sesuai index array dari $index
        			'jumlah'=>$jumlah[$index],  // Ambil dan set data telepon sesuai index array dari $index
        			'satuan'=>$satuan[$index],  // Ambil dan set data alamat sesuai index array dari $index
      			));
      			$index++;
    		}    
      		$this->M_poktan->tambahInfras($data);
            $this->session->set_flashdata('flash', 'Ditambah');
			redirect('poktan/infras/'.$id);
			
		}
	}

    public function tambah_infras_lainnya($id = NULL)
    {
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('blokir');
        }

        $data['judul'] = 'Tambah Data Infrastruktur';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['poktan'] = $this->M_poktan->getIdPoktan($id);
		
        $this->form_validation->set_rules(
            'jumlah[]',
            'Jumlah',
            'numeric|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/poktan/tambah_infras_lainnya', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {
			$idd = $_POST['id']; // Ambil data nis dan masukkan ke variabel nis
    		$infra_pertanian = $_POST['infra_pertanian']; // Ambil data nama dan masukkan ke variabel nama
    		$jumlah = $_POST['jumlah']; // Ambil data telp dan masukkan ke variabel telp
    		$satuan = $_POST['satuan']; // Ambil data alamat dan masukkan ke variabel alamat
    		$data = array();
    
    		$index = 0; // Set index array awal dengan 0
    		foreach($idd as $dataid){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      			array_push($data, array(
        			'id_poktan'=>$dataid,
        			'infra_pertanian'=>$infra_pertanian[$index],  // Ambil dan set data nama sesuai index array dari $index
        			'jumlah'=>$jumlah[$index],  // Ambil dan set data telepon sesuai index array dari $index
        			'satuan'=>$satuan[$index],  // Ambil dan set data alamat sesuai index array dari $index
      			));
      			$index++;
    		}    
      		$this->M_poktan->tambahInfras($data);
            $this->session->set_flashdata('flash', 'Ditambah');
			redirect('poktan/infras/'.$id);
			
		}
	}

	public function ubah_infras($id = NULL)
    {
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('blokir');
        }

        $data['judul'] = 'Tambah Data Infrastruktur';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['poktan'] = $this->M_poktan->getIdPoktan($id);
		$data['infras'] = $this->db->get_where('infrastruktur', ['id_poktan' => $id])->result_array();
		
        $this->form_validation->set_rules(
            'jumlah[]',
            'Jumlah',
            'numeric|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/poktan/ubah_infras', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {
			$idd = $_POST['id']; // Ambil data nis dan masukkan ke variabel nis
    		$infra_pertanian = $_POST['infra_pertanian']; // Ambil data nama dan masukkan ke variabel nama
    		$jumlah = $_POST['jumlah']; // Ambil data telp dan masukkan ke variabel telp
    		$satuan = $_POST['satuan']; // Ambil data alamat dan masukkan ke variabel alamat
    		$data = array();
    
    		$index = 0; // Set index array awal dengan 0
    		foreach($idd as $dataid){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      			array_push($data, array(
        			'id'=>$dataid,
        			'infra_pertanian'=>$infra_pertanian[$index],  // Ambil dan set data nama sesuai index array dari $index
        			'jumlah'=>$jumlah[$index],  // Ambil dan set data telepon sesuai index array dari $index
        			'satuan'=>$satuan[$index],  // Ambil dan set data alamat sesuai index array dari $index
      			));
      			$index++;
    		}    
      		$this->db->update_batch('infrastruktur', $data, 'id');
            $this->session->set_flashdata('flash', 'Diubah');
			redirect('poktan/infras/'.$id);
			
		}
	}

	public function updatesudah($id = NULL)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['poktan'] = $this->M_poktan->getAllPoktan();

        $this->M_poktan->updateSudah($id);
            // $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('poktan');
    }

	public function updatebelum($id = NULL)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['poktan'] = $this->M_poktan->getAllPoktan();

        $this->M_poktan->updateBelum($id);
            // $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('poktan');
    }
	
	public function blokir(){
		echo "Anda Tidak Memilik Hak Akses";
	}

	public function hapus_poktan($id = NULL)
    {
		$data['poktan'] = $this->M_poktan->getIdPoktan($id);

        $geojson_lama = $data['poktan']['geojson'];
        if ($geojson_lama != 'default.geojson') {
            unlink(FCPATH . 'assets/geojson/' . $geojson_lama);
        }

        $this->M_poktan->hapusPoktan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('poktan');
    }

    public function hapus_adminis($id = NULL, $idd = NULL)
    {
        $this->db->where('id', $idd);
        $this->db->delete('keleng_adminis');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('poktan/adminis/'.$id);
    }

        public function hapus_infras($id = NULL, $idd = NULL)
    {
        $this->db->where('id', $idd);
        $this->db->delete('infrastruktur');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('poktan/infras/'.$id);
    }
}
