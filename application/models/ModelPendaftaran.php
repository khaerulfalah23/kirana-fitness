<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPendaftaran extends CI_Model
{
    public function simpanPendaftaran($data = null)
    {
        $this->db->insert('pendaftaran', $data);
    }

    public function getPendaftaran() 
    {
        $this->db->select('pendaftaran.*, user.nama, paket.durasi, paket.harga');
        $this->db->from('pendaftaran');
        $this->db->join('user', 'user.id = pendaftaran.id_user');
        $this->db->join('paket', 'paket.id = pendaftaran.id_paket');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTotalPendaftaran() 
    {
        return $this->db->get('pendaftaran');
    }
    
    public function deletePendaftaran($id = null)
    {
        $this->db->where('id', $id);
        $this->db->delete('pendaftaran');
    }
}
