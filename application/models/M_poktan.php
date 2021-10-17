<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_poktan extends CI_Model {
    
    public function getAllPoktan()
    {
        $query = $this->db->select('poktan.*, poktan.nama as namaPoktan, gapoktan.nama as namaGapoktan, gapoktan.id as idGapoktan')
            ->from('poktan')
            ->join('gapoktan', 'poktan.id_gapoktan = gapoktan.id')
            ->get()->result_array();
        return $query;
    }

    public function getPetaPoktan()
    {
        $query = $this->db->select('poktan.*, poktan.id as idPoktan, poktan.nama as namaPoktan, gapoktan.nama as namaGapoktan, gapoktan.id as idGapoktan')
            ->from('poktan')
            ->join('gapoktan', 'poktan.id_gapoktan = gapoktan.id')
            ->get()->result_array();
        return $query;
    }

    public function getPetaIdPoktan($id)
    {
        $query = $this->db->select('poktan.*, poktan.id as idPoktan, poktan.nama as namaPoktan, gapoktan.nama as namaGapoktan, gapoktan.id as idGapoktan')
            ->from('poktan')
            ->join('gapoktan', 'poktan.id_gapoktan = gapoktan.id')
            ->where('poktan.id', $id)
            ->get()->row_array();
        return $query;
    }

    public function getAllPoktanUmum()
    {
        $query = $this->db->select('poktan.*, poktan.nama as namaPoktan, gapoktan.nama as namaGapoktan, gapoktan.id as idGapoktan')
            ->from('poktan')
            ->join('gapoktan', 'poktan.id_gapoktan = gapoktan.id')
            ->where('poktan.status_post', 'Sudah di Post')
            ->get()->result_array();
        return $query;
    }

    public function getIdPetaPoktan()
    {
        $keyword = $this->input->get('cari');

        $query = $this->db->select('poktan.*, poktan.id as idPoktan, poktan.nama as namaPoktan, gapoktan.nama as namaGapoktan, gapoktan.id as idGapoktan')
            ->from('poktan')
            ->join('gapoktan', 'poktan.id_gapoktan = gapoktan.id')
            ->where('poktan.id_gapoktan', $keyword)
            ->get()->result_array();
        return $query;
    }

    public function getPetaPoktanId($id = NULL)
    {
        $query = $this->db->select('*, poktan.id as idPoktan, poktan.nama as namaPoktan, gapoktan.nama as namaGapoktan, gapoktan.id as idGapoktan')
            ->from('poktan')
            ->join('gapoktan', 'poktan.id_gapoktan = gapoktan.id')
            ->where('poktan.id', $id)
            ->get()->row_array();
        return $query;
    }

    public function getIdPoktan($id = NULL)
    {

        $query = $this->db->select('poktan.*, poktan.nama as namaPoktan, gapoktan.nama as namaGapoktan, gapoktan.id as idGapoktan')
            ->from('poktan')
            ->join('gapoktan', 'poktan.id_gapoktan = gapoktan.id')
            ->where('poktan.id', $id)
            ->get()->row_array();
        return $query;
    }

    public function getIdUmumPoktan($id = NULL)
    {

        $query = $this->db->select('poktan.*, poktan.nama as namaPoktan, gapoktan.nama as namaGapoktan, gapoktan.id as idGapoktan')
            ->from('poktan')
            ->join('gapoktan', 'poktan.id_gapoktan = gapoktan.id')
            ->where('poktan.id', $id)
            ->where('poktan.status_post', 'Sudah di Post')
            ->get()->row_array();
        return $query;
    }

    public function getPengurus($id = NULL)
    {

        $query = $this->db->select('petani.nama as namaPetani, petani.id as idPetani, petani.*, poktan.*')
            ->from('petani')
            ->join('poktan', 'petani.id_poktan = poktan.id')
            ->where('id_poktan', $id)
            ->get()->result_array();
        return $query;
    }

    public function getPengurusUmum($id = NULL)
    {
        $query = $this->db->select('petani.nama as namaPetani, petani.id as idPetani, petani.*, poktan.*')
            ->from('petani')
            ->join('poktan', 'petani.id_poktan = poktan.id')
            ->where('id_poktan', $id)
            ->where('petani.status_post', 'Sudah di Post')
            ->get()->result_array();
        return $query;
    }

    public function getAdminis($id = NULL)
    {

        $query = $this->db->select('*, keleng_adminis.id as idAdminis')
            ->from('keleng_adminis')
            ->join('poktan', 'keleng_adminis.id_poktan = poktan.id')
            ->where('id_poktan', $id)
            ->get()->result_array();
        return $query;
    }

    public function getInfras($id = NULL)
    {

        $query = $this->db->select('*, infrastruktur.id as idInfras')
            ->from('infrastruktur')
            ->join('poktan', 'infrastruktur.id_poktan = poktan.id')
            ->where('id_poktan', $id)
            ->get()->result_array();
        return $query;
    }

    public function tambahPoktan($upload_geojson)
    {
        $data = [
            "id_gapoktan" => htmlspecialchars($this->input->post('gapoktan', true)),
            "poktan_dibuat" => htmlspecialchars($this->input->post('dibuat', true)),
            "nama" => htmlspecialchars($this->input->post('poktan', true)),
            "nama_ketua" => htmlspecialchars($this->input->post('ketua', true)),
            "status" => htmlspecialchars($this->input->post('status', true)),
            "pengukuhan" => htmlspecialchars($this->input->post('pengukuhan', true)),
            "kecamatan" => htmlspecialchars($this->input->post('kecamatan', true)),
            "desa" => htmlspecialchars($this->input->post('desa', true)),
            "dusun" => htmlspecialchars($this->input->post('dusun', true)),
            "rt" => htmlspecialchars($this->input->post('rt', true)),
            "rw" => htmlspecialchars($this->input->post('rw', true)),
            "luas_lahan" => htmlspecialchars($this->input->post('luas_lahan', true)),
            "komoditas_unggul" => htmlspecialchars($this->input->post('komoditas_unggul', true)),
            "geojson" => $upload_geojson,
            "status_post" => "Belum Di Post",
            "warna" => htmlspecialchars($this->input->post('warna', true))
        ];

        $this->db->insert('poktan', $data);
    }

    public function ubahPoktan()
    {
        $data = [
            "id_gapoktan" => htmlspecialchars($this->input->post('gapoktan', true)),
            "poktan_diubah" => htmlspecialchars($this->input->post('diubah', true)),
            "nama" => htmlspecialchars($this->input->post('poktan', true)),
            "nama_ketua" => htmlspecialchars($this->input->post('ketua', true)),
            "status" => htmlspecialchars($this->input->post('status', true)),
            "pengukuhan" => htmlspecialchars($this->input->post('pengukuhan', true)),
            "kecamatan" => htmlspecialchars($this->input->post('kecamatan', true)),
            "desa" => htmlspecialchars($this->input->post('desa', true)),
            "dusun" => htmlspecialchars($this->input->post('dusun', true)),
            "rt" => htmlspecialchars($this->input->post('rt', true)),
            "rw" => htmlspecialchars($this->input->post('rw', true)),
            "luas_lahan" => htmlspecialchars($this->input->post('luas_lahan', true)),
            "komoditas_unggul" => htmlspecialchars($this->input->post('komoditas_unggul', true)),
            "status_post" => "Belum Di Post",
            "warna" => htmlspecialchars($this->input->post('warna', true))
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('poktan', $data);
    }

    public function tambahAdminis($data)
    {
      return $this->db->insert_batch('keleng_adminis', $data);
    }

    public function ubahAdminis($data)
    {
       
        $this->db->update_batch('keleng_adminis', $data);
    }

    public function tambahInfras($data)
    {
      return $this->db->insert_batch('infrastruktur', $data);
    }

    public function updateSudah($id)
    {
        $data = [
            "status_post" => "Sudah Di Post"
        ];

        $this->db->where('id', $id);
        $this->db->update('poktan', $data);
    }

    public function updateBelum($id)
    {
        $data = [
            "status_post" => "Belum Di Post"
        ];

        $this->db->where('id', $id);
        $this->db->update('poktan', $data);
    }

    public function hapusPoktan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('poktan');
    }
	
}
