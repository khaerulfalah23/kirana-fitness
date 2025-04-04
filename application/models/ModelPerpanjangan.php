<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPerpanjangan extends CI_Model
{
    public function simpanPerpanjangan($data = null)
    {
        $this->db->insert('perpanjangan', $data);
    }

    public function getPerpanjangan() 
    {
        $this->db->select('perpanjangan.*, user.nama, paket.durasi, paket.harga');
        $this->db->from('perpanjangan');
        $this->db->join('user', 'user.id = perpanjangan.id_user');
        $this->db->join('paket', 'paket.id = perpanjangan.id_paket');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTotalPerpanjangan() 
    {
        return $this->db->get('perpanjangan');
    }

    public function deletePerpanjangan($id = null)
    {
        $this->db->where('id', $id);
        $this->db->delete('perpanjangan');
    }
}
