<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPaket extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('paket', $data);
    }
    public function getPaket()
    {
        return $this->db->get('paket');
    }

    public function getPaketWhere($where = null)
    {
        return $this->db->get_where('paket', $where);
    }

    public function updatePaket($data = null, $where = null)
    {
        $this->db->update('paket', $data, $where);
    }

    public function hapusPaket($where = null)
    {
        $this->db->delete('paket', $where);
    }
}
