<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }
    
    public function getUser()
    {
        return $this->db->get('user');
    }

    public function getUserJoin()
    {
        $this->db->select('user.*, kartu_anggota.*');
        $this->db->from('user');
        $this->db->join('kartu_anggota', 'kartu_anggota.id_user = user.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function getUserReport() {
        $this->db->from('user');
        $this->db->where('role_id', 2);
        $this->db->or_where('role_id', 3);
        return $this->db->get();
    }

    public function cekUserAccess($where = null)
    {
        $this->db->select('*');
        $this->db->from('access_menu');
        $this->db->where($where);
        return $this->db->get();
    }

    public function getUserLimit()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id', 3);
        $this->db->limit(5);
        return $this->db->get();
    }

    public function updateUser($data = null, $where = null)
    {
        $this->db->update('user', $data, $where);
    }

    public function hapusUser($where = null)
    {
        $this->db->delete('user', $where);
    }
}
