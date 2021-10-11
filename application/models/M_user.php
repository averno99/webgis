<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
    
    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function tambahUser($upload_gambar)
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'gambar' => $upload_gambar,
            'role' => 'Admin',
            'status' => 'Aktif',
            'tgl_dibuat' => time()
        ];

        $this->db->insert('user', $data);
    }

    public function ubahUser()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'status' => htmlspecialchars($this->input->post('status', true))
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }

    public function resetPassword()
    {
        $data = [
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }

    public function getIdUser($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function hapusUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
	
}
