<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontPetani extends CI_Controller {

    public function detail($id = NULL)
	{
        $this->load->model('M_petani');

		$data['judul'] = 'Petani';
		$data['petani'] = $this->M_petani->getIdPetani($id);

		$this->load->view('frontend/template/head', $data);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/topbar', $data);
		$this->load->view('frontend/petani/detail', $data);
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/js');
	}

    public function prasarana($id = NULL)
	{
        $this->load->model('M_petani');

		$data['judul'] = 'Prasarana & Sarana Pertanian';
		$data['petani'] = $this->M_petani->getIdPetani($id);
		$data['prasarana'] = $this->M_petani->getPrasarana($id);
        $data['lokasi'] = $this->M_petani->getLokasi($id);
        $data['sarana'] = $this->M_petani->getSarana($id);

		$this->load->view('frontend/template/head', $data);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/topbar', $data);
		$this->load->view('frontend/petani/prasarana', $data);
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/js');
	}

    public function produksi($id = NULL)
	{
		$this->load->model('M_petani');
        
        $data['judul'] = 'Produksi Pertanian';
		$data['petani'] = $this->M_petani->getIdPetani($id);
		$data['produksi'] = $this->M_petani->getProduksi($id);
        $data['data_produksi'] = $this->M_petani->getDataProduksi($id);

		$this->load->view('frontend/template/head', $data);
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/topbar', $data);
		$this->load->view('frontend/petani/produksi', $data);
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/js');
	}
}
