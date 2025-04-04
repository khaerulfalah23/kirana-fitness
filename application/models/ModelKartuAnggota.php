<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelKartuAnggota extends CI_Model
{
    public function insertKartuAnggota($data = null)
    {
        $this->db->insert('kartu_anggota', $data);
    }

    public function getKartuAnggotaWhere($where = null)
    {
        return $this->db->get_where('kartu_anggota', $where);
    }

    public function updateKartuAnggota($data,$where)
    {
        $this->db->update('kartu_anggota', $data, $where);
    }
}
