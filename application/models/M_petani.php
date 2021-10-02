<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_petani extends CI_Model {
    
    public function getAllPetani()
    {
        $query = $this->db->select('petani.*, poktan.nama as namaPoktan, poktan.id as idPoktan')
            ->from('petani')
            ->join('poktan', 'petani.id_poktan = poktan.id')
            ->get()->result_array();
        return $query;
    }

     public function getIdPetani($id = NULL)
    {

        $query = $this->db->select('petani.*, poktan.nama as namaPoktan, poktan.id as idPoktan, gapoktan.nama as namaGapoktan')
            ->from('petani')
            ->join('poktan', 'petani.id_poktan = poktan.id')
            ->join('gapoktan', 'poktan.id_gapoktan = gapoktan.id')
            ->where('petani.id', $id)
            ->get()->row_array();
        return $query;
    }

    public function getPrasarana($id = NULL)
    {

        $query = $this->db->select('*')
            ->from('prasarana_petani')
            ->join('petani', 'prasarana_petani.id_petani = petani.id')
            ->where('id_petani', $id)
            ->get()->row_array();
        return $query;
    }

    public function getLokasi($id = NULL)
    {

        $query = $this->db->select('*')
            ->from('lokasi_pertanian')
            ->join('petani', 'lokasi_pertanian.id_petani = petani.id')
            ->where('id_petani', $id)
            ->get()->result_array();
        return $query;
    }

    public function getSarana($id = NULL)
    {

        $query = $this->db->select('*')
            ->from('sarana_pertanian')
            ->join('petani', 'sarana_pertanian.id_petani = petani.id')
            ->where('id_petani', $id)
            ->get()->result_array();
        return $query;
    }

    public function getProduksi($id = NULL)
    {

        $query = $this->db->select('*')
            ->from('produksi_pertanian')
            ->join('petani', 'produksi_pertanian.id_petani = petani.id')
            ->where('id_petani', $id)
            ->get()->row_array();
        return $query;
    }

    public function getDataProduksi($id = NULL)
    {

        $query = $this->db->select('*')
            ->from('data_produksi')
            ->join('petani', 'data_produksi.id_petani = petani.id')
            ->where('id_petani', $id)
            ->get()->result_array();
        return $query;
    }

    public function tambahPetani($upload_foto)
    {
        $data = [
            "status_anggota" => htmlspecialchars($this->input->post('status_anggota', true)),
            "id_poktan" => htmlspecialchars($this->input->post('poktan', true)),
            "jabatan" => htmlspecialchars($this->input->post('jabatan', true)),
            "pekerjaan_utama" => htmlspecialchars($this->input->post('pekerjaan_utama', true)),
            "pengolah_lahan" => htmlspecialchars($this->input->post('pengolah_lahan', true)),
            "tanam" => htmlspecialchars($this->input->post('tanam', true)),
            "pemeliharaan" => htmlspecialchars($this->input->post('pemeliharaan', true)),
            "panen" => htmlspecialchars($this->input->post('panen', true)),
            "nama" => htmlspecialchars($this->input->post('nama', true)),
            "jenis_kelamin" => htmlspecialchars($this->input->post('jenis_kelamin', true)),
            "status_keluarga" => htmlspecialchars($this->input->post('status_keluarga', true)),
            "jml_anggota_keluarga" => htmlspecialchars($this->input->post('jml_anggota_keluarga', true)),
            "jml_tanggungan" => htmlspecialchars($this->input->post('jml_tanggungan', true)),
            "pendidikan" => htmlspecialchars($this->input->post('pendidikan', true)),
            "riwayat_pelatihan" => htmlspecialchars($this->input->post('riwayat_pelatihan', true)),
            "no_hp" => htmlspecialchars($this->input->post('no_hp', true)),
            "foto" => htmlspecialchars($upload_foto)
        ];

        $this->db->insert('petani', $data);
    }

    public function ubahPetani()
    {
        $data = [
            "status_anggota" => htmlspecialchars($this->input->post('status_anggota', true)),
            "id_poktan" => htmlspecialchars($this->input->post('poktan', true)),
            "jabatan" => htmlspecialchars($this->input->post('jabatan', true)),
            "pekerjaan_utama" => htmlspecialchars($this->input->post('pekerjaan_utama', true)),
            "pengolah_lahan" => htmlspecialchars($this->input->post('pengolah_lahan', true)),
            "tanam" => htmlspecialchars($this->input->post('tanam', true)),
            "pemeliharaan" => htmlspecialchars($this->input->post('pemeliharaan', true)),
            "panen" => htmlspecialchars($this->input->post('panen', true)),
            "nama" => htmlspecialchars($this->input->post('nama', true)),
            "jenis_kelamin" => htmlspecialchars($this->input->post('jenis_kelamin', true)),
            "status_keluarga" => htmlspecialchars($this->input->post('status_keluarga', true)),
            "jml_anggota_keluarga" => htmlspecialchars($this->input->post('jml_anggota_keluarga', true)),
            "jml_tanggungan" => htmlspecialchars($this->input->post('jml_tanggungan', true)),
            "pendidikan" => htmlspecialchars($this->input->post('pendidikan', true)),
            "riwayat_pelatihan" => htmlspecialchars($this->input->post('riwayat_pelatihan', true)),
            "no_hp" => htmlspecialchars($this->input->post('no_hp', true))
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('petani', $data);
    }
	
}
