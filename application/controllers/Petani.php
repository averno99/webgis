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
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('blokir');
        }

        $data['judul'] = 'Tambah Data Petani';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['status'] = ['Anggota Kelompok Tani', 'Non Anggota'];
		$data['poktan'] = $this->db->get('poktan')->result_array();
		$data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];
		$data['pendidikan'] = ['Sarjana', 'SMU/SMK', 'SLTP', 'SD', 'Tidak Tamat SD', 'Tidak Sekolah'];
		

        $this->form_validation->set_rules(
            'jabatan',
            'Jabatan',
            'required|trim',
            array('required' => 'Jabatan tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'pekerjaan_utama',
            'Pekerjaan_Utama',
            'required|trim',
            array('required' => 'Pekerjaan tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'pengolah_lahan',
            'Pengolah_Lahan',
            'required|trim',
            array('required' => 'Pengolahan Lahan tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'pekerjaan_utama',
            'Pekerjaan_Utama',
            'required|trim',
            array('required' => 'Pekerjaan tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'tanam',
            'Tanam',
            'required|trim',
            array('required' => 'Data Tanam tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'pemeliharaan',
            'Pemeliharaan',
            'required|trim',
            array('required' => 'Data Pemeliharaan tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'panen',
            'Panen',
            'required|trim',
            array('required' => 'Data Panen tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|trim',
            array('required' => 'Nama tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'status_keluarga',
            'Status Keluarga',
            'required|trim',
            array('required' => 'Status Keluarga tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'jml_anggota_keluarga',
            'Jumlah',
            'required|trim',
            array('required' => 'Jumlah Anggota Keluarga tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'jml_tanggungan',
            'Tanggungan',
            'required|trim',
            array('required' => 'Jumlah Tanggungan tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'riwayat_pelatihan',
            'Pelatihan',
            'required|trim',
            array('required' => 'Riwayat Pelatihan tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'no_hp',
            'No hp',
            'required|trim',
            array('required' => 'Nomor Hp tidak boleh kosong')
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
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('blokir');
        }

        $data['judul'] = 'Ubah Data Petani';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['petani'] = $this->M_petani->getIdPetani($id);
		$data['status'] = ['Anggota Kelompok Tani', 'Non Anggota'];
		$data['poktan'] = $this->db->get('poktan')->result_array();
		$data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];
		$data['pendidikan'] = ['Sarjana', 'SMU/SMK', 'SLTP', 'SD', 'Tidak Tamat SD', 'Tidak Sekolah'];
		
		$this->form_validation->set_rules(
            'jabatan',
            'Jabatan',
            'required|trim',
            array('required' => 'Jabatan tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'pekerjaan_utama',
            'Pekerjaan_Utama',
            'required|trim',
            array('required' => 'Pekerjaan tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'pengolah_lahan',
            'Pengolah_Lahan',
            'required|trim',
            array('required' => 'Pengolahan Lahan tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'pekerjaan_utama',
            'Pekerjaan_Utama',
            'required|trim',
            array('required' => 'Pekerjaan tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'tanam',
            'Tanam',
            'required|trim',
            array('required' => 'Data Tanam tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'pemeliharaan',
            'Pemeliharaan',
            'required|trim',
            array('required' => 'Data Pemeliharaan tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'panen',
            'Panen',
            'required|trim',
            array('required' => 'Data Panen tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|trim',
            array('required' => 'Nama tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'status_keluarga',
            'Status Keluarga',
            'required|trim',
            array('required' => 'Status Keluarga tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'jml_anggota_keluarga',
            'Jumlah',
            'required|trim',
            array('required' => 'Jumlah Anggota Keluarga tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'jml_tanggungan',
            'Tanggungan',
            'required|trim',
            array('required' => 'Jumlah Tanggungan tidak boleh kosong')
        );
		$this->form_validation->set_rules(
            'riwayat_pelatihan',
            'Pelatihan',
            'required|trim',
            array('required' => 'Riwayat Pelatihan tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'no_hp',
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
            redirect('petani/detail/'. $id);
        }
    }

    public function tambah_prasarana($id = NULL)
    {
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('blokir');
        }

        $data['judul'] = 'Tambah Data Prasarana';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['status'] = ['Pemilik', 'Penggarap'];
        $data['petani'] = $this->M_petani->getIdPetani($id);
		
        $this->form_validation->set_rules(
            'status_pemilik',
            'Status Pemilik',
            'required|trim',
            array('required' => 'Nama Gapoktan tidak boleh kosong')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/petani/tambah_prasarana', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {

            $this->M_petani->tambahPrasarana();
            // $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('petani/prasarana/'. $id);
        }
    }

	public function ubah_prasarana($id = NULL)
    {
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('blokir');
        }

        $data['judul'] = 'Ubah Data Sarana Pertanian';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['petani'] = $this->M_petani->getIdPetani($id);
		$data['status'] = ['Pemilik', 'Penggarap'];
		$data['prasarana'] = $this->db->get_where('prasarana_petani', ['id_petani' => $id])->row_array();
		
        $this->form_validation->set_rules(
            'status_pemilik',
            'Jumlah',
            'required|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/petani/ubah_prasarana', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {
			$data = [
            "status_pemilik" => htmlspecialchars($this->input->post('status_pemilik', true))
        ];

        	$this->db->where('id', $this->input->post('id'));
      		$this->db->update('prasarana_petani', $data);
            // $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('petani/prasarana/'. $id);
			
		}
	}

    public function tambah_sarana($id = NULL)
    {
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('blokir');
        }

        $data['judul'] = 'Tambah Data Sarana Pertanian';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['petani'] = $this->M_petani->getIdPetani($id);
		
        $this->form_validation->set_rules(
            'jumlah[]',
            'Jumlah',
            'numeric|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/petani/tambah_sarana', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {
			$idd = $_POST['id']; // Ambil data nis dan masukkan ke variabel nis
    		$sarana = $_POST['sarana']; // Ambil data nama dan masukkan ke variabel nama
    		$jumlah = $_POST['jumlah']; // Ambil data telp dan masukkan ke variabel telp
    		$satuan = $_POST['satuan']; // Ambil data alamat dan masukkan ke variabel alamat
    		$data = array();
    
    		$index = 0; // Set index array awal dengan 0
    		foreach($idd as $dataid){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      			array_push($data, array(
        			'id_petani'=>$dataid,
        			'sarana'=>$sarana[$index],  // Ambil dan set data nama sesuai index array dari $index
        			'jumlah'=>$jumlah[$index],  // Ambil dan set data telepon sesuai index array dari $index
        			'satuan'=>$satuan[$index],  // Ambil dan set data alamat sesuai index array dari $index
      			));
      			$index++;
    		}    
      		$this->M_petani->tambahSarana($data);
			redirect('petani/prasarana/'.$id);
			
		}
	}

    public function ubah_sarana($id = NULL)
    {
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('blokir');
        }

        $data['judul'] = 'Ubah Data Sarana Pertanian';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['petani'] = $this->M_petani->getIdPetani($id);
		$data['sarana'] = $this->db->get_where('sarana_pertanian', ['id_petani' => $id])->result_array();
		
        $this->form_validation->set_rules(
            'jumlah[]',
            'Jumlah',
            'numeric|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/petani/ubah_sarana', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {
			$idd = $_POST['id']; // Ambil data nis dan masukkan ke variabel nis
    		$sarana = $_POST['sarana']; // Ambil data nama dan masukkan ke variabel nama
    		$jumlah = $_POST['jumlah']; // Ambil data telp dan masukkan ke variabel telp
    		$satuan = $_POST['satuan']; // Ambil data alamat dan masukkan ke variabel alamat
    		$data = array();
    
    		$index = 0; // Set index array awal dengan 0
    		foreach($idd as $dataid){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      			array_push($data, array(
        			'id'=>$dataid,
        			'sarana'=>$sarana[$index],  // Ambil dan set data nama sesuai index array dari $index
        			'jumlah'=>$jumlah[$index],  // Ambil dan set data telepon sesuai index array dari $index
        			'satuan'=>$satuan[$index],  // Ambil dan set data alamat sesuai index array dari $index
      			));
      			$index++;
    		}    
      		$this->db->update_batch('sarana_pertanian',$data, 'id');
			redirect('petani/prasarana/'. $id);
			
		}
	}

	public function tambah_produksi($id = NULL)
    {
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('blokir');
        }

        $data['judul'] = 'Tambah Data Petani';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['petani'] = $this->M_petani->getIdPetani($id);
		$data['bidang'] = ['Tanaman Pangan', 'Tanaman Hortikultura', 'Tanaman Perkebunan'];
		$data['lahan'] = ['Sawah', 'Non Sawah'];
		$data['sistem'] = ['Monokultur', 'Multikultur'];
		$data['indeks'] = ['1 Kali (IP 100%)', '2 Kali (IP 200%)', '3 Kali (IP 300%)', '4 Kali (IP 400%)'];

        $this->form_validation->set_rules(
            'jenis_komoditas',
            'Komoditas',
            'required|trim',
            array('required' => 'Jenis Komoditas tidak boleh kosong')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/petani/tambah_produksi', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {

            $this->M_petani->tambahProduksi();
            // $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('petani/produksi/'.$id);
        }
    }

	public function ubah_produksi($id = NULL)
    {
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('blokir');
        }

        $data['judul'] = 'Tambah Data Petani';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['petani'] = $this->M_petani->getIdPetani($id);
		$data['produksi'] = $this->db->get_where('produksi_pertanian', ['id_petani' => $id])->row_array();
		$data['bidang'] = ['Tanaman Pangan', 'Tanaman Hortikultura', 'Tanaman Perkebunan'];
		$data['lahan'] = ['Sawah', 'Non Sawah'];
		$data['sistem'] = ['Monokultur', 'Multikultur'];
		$data['indeks'] = ['1 Kali (IP 100%)', '2 Kali (IP 200%)', '3 Kali (IP 300%)', '4 Kali (IP 400%)'];

        $this->form_validation->set_rules(
            'jenis_usaha',
            'Nama',
            'required|trim',
            array('required' => 'Nama Gapoktan tidak boleh kosong')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/petani/ubah_produksi', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {

            $this->M_petani->ubahProduksi();
            // $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('petani/produksi/'. $id);
        }
    }

	public function tambah_lokasi($id = NULL)
    {
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('blokir');
        }

        $data['judul'] = 'Tambah Data Lokasi Pertanian';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['petani'] = $this->M_petani->getIdPetani($id);
		
        $this->form_validation->set_rules(
            'luas_lahan_sendiri[]',
            'Jumlah',
            'numeric|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/petani/tambah_lokasi', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {
			$idd = $_POST['id']; // Ambil data nis dan masukkan ke variabel nis
    		$luas_lahan_sendiri = $_POST['luas_lahan_sendiri']; // Ambil data nama dan masukkan ke variabel nama
    		$luas_lahan_sewa = $_POST['luas_lahan_sewa'];
			$keterangan = $_POST['keterangan']; // Ambil data telp dan masukkan ke variabel telp
    		$latitude = $_POST['latitude'];
			$longitude = $_POST['longitude']; // Ambil data alamat dan masukkan ke variabel alamat
    		$data = array();
    
    		$index = 0; // Set index array awal dengan 0
    		foreach($idd as $dataid){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      			array_push($data, array(
        			'id_petani'=>$dataid,
        			'luas_lahan_sendiri'=>$luas_lahan_sendiri[$index],  // Ambil dan set data nama sesuai index array dari $index
        			'luas_lahan_sewa'=>$luas_lahan_sewa[$index],
					'keterangan'=>$keterangan[$index],  // Ambil dan set data telepon sesuai index array dari $index
        			'latitude'=>$latitude[$index],
					'longitude'=>$longitude[$index],  // Ambil dan set data alamat sesuai index array dari $index
      			));
      			$index++;
    		} 
      		$this->M_petani->tambahLokasi($data);
			redirect('petani/prasarana/'.$id);
			
		}
	}

	public function ubah_lokasi($id = NULL)
    {
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('blokir');
        }

        $data['judul'] = 'Ubah Data Lokasi Pertanian';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['petani'] = $this->M_petani->getIdPetani($id);
		$data['lokasi'] = $this->db->get_where('lokasi_pertanian', ['id_petani' => $id])->result_array();
		
        $this->form_validation->set_rules(
            'luas_lahan_sendiri[]',
            'Jumlah',
            'numeric|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/petani/ubah_lokasi', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {
			
			$idd = $_POST['id']; // Ambil data nis dan masukkan ke variabel nis
    		$luas_lahan_sendiri = $_POST['luas_lahan_sendiri']; // Ambil data nama dan masukkan ke variabel nama
    		$luas_lahan_sewa = $_POST['luas_lahan_sewa'];
			$keterangan = $_POST['keterangan']; // Ambil data telp dan masukkan ke variabel telp
    		$latitude = $_POST['latitude'];
			$longitude = $_POST['longitude']; // Ambil data alamat dan masukkan ke variabel alamat
    		$data = array();
    
    		$index = 0; // Set index array awal dengan 0
    		foreach($idd as $dataid){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      			array_push($data, array(
        			'id'=>$dataid,
        			'luas_lahan_sendiri'=>$luas_lahan_sendiri[$index],  // Ambil dan set data nama sesuai index array dari $index
        			'luas_lahan_sewa'=>$luas_lahan_sewa[$index],
					'keterangan'=>$keterangan[$index],  // Ambil dan set data telepon sesuai index array dari $index
        			'latitude'=>$latitude[$index],
					'longitude'=>$longitude[$index],  // Ambil dan set data alamat sesuai index array dari $index
      			));
      			$index++;
    		}
      		$this->db->update_batch('lokasi_pertanian',$data, 'id');
			redirect('petani/prasarana/'. $id);
			
		}
	}

	public function tambah_data_produksi($id = NULL)
    {
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('blokir');
        }

        $data['judul'] = 'Tambah Data Produksi Pertanian';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['petani'] = $this->M_petani->getIdPetani($id);
		
        $this->form_validation->set_rules(
            'luas[]',
            'Jumlah',
            'required|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/petani/tambah_data_produksi', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {
			$idd = $_POST['id']; // Ambil data nis dan masukkan ke variabel nis
    		$komoditas = $_POST['komoditas']; // Ambil data nama dan masukkan ke variabel nama
    		$luas = $_POST['luas'];
			$panen_kg = $_POST['panen_kg']; // Ambil data telp dan masukkan ke variabel telp
    		$harga = $_POST['harga'];
    		$data = array();
    
    		$index = 0; // Set index array awal dengan 0
    		foreach($idd as $dataid){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      			array_push($data, array(
        			'id_petani'=>$dataid,
        			'komoditas'=>$komoditas[$index],  // Ambil dan set data nama sesuai index array dari $index
        			'luas'=>$luas[$index],
					'panen_kg'=>$panen_kg[$index],  // Ambil dan set data telepon sesuai index array dari $index
        			'harga'=>$harga[$index],
				));
      			$index++;
    		} 
      		$this->M_petani->tambahDataProduksi($data);
			redirect('petani/produksi/'.$id);
			
		}
	}

	public function ubah_data_produksi($id = NULL)
    {
		if ($this->session->userdata('role') !== 'Admin') {
            redirect('blokir');
        }

        $data['judul'] = 'Ubah Data Produksi Pertanian';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['petani'] = $this->M_petani->getIdPetani($id);
		$data['data_produksi'] = $this->db->get_where('data_produksi', ['id_petani' => $id])->result_array();
		
        $this->form_validation->set_rules(
            'luas[]',
            'Jumlah',
            'required|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
			$this->load->view('backend/template/aside');
			$this->load->view('backend/template/topbar', $data);
			$this->load->view('backend/petani/ubah_data_produksi', $data);
			$this->load->view('backend/template/footer');
			$this->load->view('backend/template/user_panel', $data);
			$this->load->view('backend/template/js');
        } else {
			$idd = $_POST['id']; // Ambil data nis dan masukkan ke variabel nis
    		$komoditas = $_POST['komoditas']; // Ambil data nama dan masukkan ke variabel nama
    		$luas = $_POST['luas'];
			$panen_kg = $_POST['panen_kg']; // Ambil data telp dan masukkan ke variabel telp
    		$harga = $_POST['harga'];
    		$data = array();
    
    		$index = 0; // Set index array awal dengan 0
    		foreach($idd as $dataid){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      			array_push($data, array(
        			'id'=>$dataid,
        			'komoditas'=>$komoditas[$index],  // Ambil dan set data nama sesuai index array dari $index
        			'luas'=>$luas[$index],
					'panen_kg'=>$panen_kg[$index],  // Ambil dan set data telepon sesuai index array dari $index
        			'harga'=>$harga[$index],
				));
      			$index++;
    		} 
      		$this->db->update_batch('data_produksi',$data, 'id');
			redirect('petani/produksi/'.$id);
			
		}
	}

	public function updatesudah($id = NULL)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['petani'] = $this->M_petani->getAllPetani();

        $this->M_petani->updateSudah($id);
            // $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('petani');
    }

	public function updatebelum($id = NULL)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['petani'] = $this->M_petani->getAllPetani();

        $this->M_petani->updateBelum($id);
            // $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('petani');
    }
	
	public function blokir(){
		echo "Anda Tidak Memiliki Hak Akses";
	}

	public function hapus_petani($id = NULL)
    {
		$data['petani'] = $this->M_petani->getIdPetani($id);

        $gambar_lama = $data['petani']['foto'];
        if ($gambar_lama != 'default.png') {
            unlink(FCPATH . 'assets/gambar/petani/' . $gambar_lama);
        }

        $this->M_petani->hapusPetani($id);
        // $this->session->set_flashdata('flash', 'Dihapus');
        redirect('petani');
    }
}
