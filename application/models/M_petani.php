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

        $query = $this->db->select('*, lokasi_pertanian.id as idLokasi')
            ->from('lokasi_pertanian')
            ->join('petani', 'lokasi_pertanian.id_petani = petani.id')
            ->where('id_petani', $id)
            ->get()->result_array();
        return $query;
    }

    public function getPetaLokasi()
    {
        $query = $this->db->select('*, lokasi_pertanian.id as idLokasi, petani.nama as namaPetani, poktan.nama as namaPoktan, gapoktan.nama as namaGapoktan, lokasi_pertanian.id_petani as idPetani')
            ->from('lokasi_pertanian')
            ->join('petani', 'lokasi_pertanian.id_petani = petani.id')
            ->join('poktan', 'petani.id_poktan = poktan.id')
            ->join('gapoktan', 'poktan.id_gapoktan = gapoktan.id')
            ->get()->result_array();
        return $query;
    }

    public function getIdPetaLokasi($id = NULL)
    {
        $query = $this->db->select('*, lokasi_pertanian.id as idLokasi, petani.nama as namaPetani, poktan.nama as namaPoktan, gapoktan.nama as namaGapoktan, lokasi_pertanian.id_petani as idPetani')
            ->from('lokasi_pertanian')
            ->join('petani', 'lokasi_pertanian.id_petani = petani.id')
            ->join('poktan', 'petani.id_poktan = poktan.id')
            ->join('gapoktan', 'poktan.id_gapoktan = gapoktan.id')
            ->where('lokasi_pertanian.id', $id)
            ->get()->row_array();
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
            "foto" => htmlspecialchars($upload_foto),
            "status_post" => "Belum Di Post"
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
            "no_hp" => htmlspecialchars($this->input->post('no_hp', true)),
            "status_post" => "Belum Di Post"
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('petani', $data);
    }

     public function tambahPrasarana()
    {
        $data = [
            "id_petani" => htmlspecialchars($this->input->post('id_petani', true)),
            "status_pemilik" => htmlspecialchars($this->input->post('status_pemilik', true))
        ];
        $this->db->insert('prasarana_petani', $data);
    }

    public function tambahSarana($data)
    {
      return $this->db->insert_batch('sarana_pertanian', $data);
    }

    public function tambahLokasi($data)
    {
      return $this->db->insert_batch('lokasi_pertanian', $data);
    }

    public function tambahDataProduksi($data)
    {
      return $this->db->insert_batch('data_produksi', $data);
    }

    public function ubahProduksi()
    {
        $data = [
            "jenis_usaha" => htmlspecialchars($this->input->post('jenis_usaha', true)),
            "jenis_lahan" => htmlspecialchars($this->input->post('jenis_lahan', true)),
            "sistem_pertanian" => htmlspecialchars($this->input->post('sistem_pertanian', true)),
            "jenis_komoditas" => htmlspecialchars($this->input->post('jenis_komoditas', true)),
            "ip" => htmlspecialchars($this->input->post('ip', true)),
            "jadwal_tanam" => htmlspecialchars($this->input->post('jadwal_tanam', true)),
            "jadwal_panen" => htmlspecialchars($this->input->post('jadwal_panen', true)),
            "sistem_pengairan" => htmlspecialchars($this->input->post('sistem_pengairan', true))
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('produksi_pertanian', $data);
    }

    public function tambahProduksi()
    {
        $data = [
            "id_petani" => htmlspecialchars($this->input->post('id', true)),
            "jenis_usaha" => htmlspecialchars($this->input->post('jenis_usaha', true)),
            "jenis_lahan" => htmlspecialchars($this->input->post('jenis_lahan', true)),
            "sistem_pertanian" => htmlspecialchars($this->input->post('sistem_pertanian', true)),
            "jenis_komoditas" => htmlspecialchars($this->input->post('jenis_komoditas', true)),
            "ip" => htmlspecialchars($this->input->post('ip', true)),
            "jadwal_tanam" => htmlspecialchars($this->input->post('jadwal_tanam', true)),
            "jadwal_panen" => htmlspecialchars($this->input->post('jadwal_panen', true)),
            "sistem_pengairan" => htmlspecialchars($this->input->post('sistem_pengairan', true))
        ];

        $this->db->insert('produksi_pertanian', $data);
    }

    public function updateSudah($id)
    {
        $data = [
            "status_post" => "Sudah Di Post"
        ];

        $this->db->where('id', $id);
        $this->db->update('petani', $data);
    }

    public function updateBelum($id)
    {
        $data = [
            "status_post" => "Belum Di Post"
        ];

        $this->db->where('id', $id);
        $this->db->update('petani', $data);
    }

    public function hapusPetani($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('petani');
    }
	
}
