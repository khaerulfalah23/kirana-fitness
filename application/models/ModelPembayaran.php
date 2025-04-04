<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPembayaran extends CI_Model
{
    public function simpanPembayaran($data = null)
    {
        $this->db->insert('pembayaran', $data);
    }

    public function simpanDetailPembayaran($data = null)
    {
        $this->db->insert('detail_pembayaran', $data);
    }

    public function getPembayaran() {
        $this->db->select('pembayaran.*, detail_pembayaran.*, paket.durasi, user.nama');
        $this->db->from('pembayaran');
        $this->db->join('detail_pembayaran', 'detail_pembayaran.id_pembayaran = pembayaran.id');
        $this->db->join('paket', 'paket.id = detail_pembayaran.id_paket');
        $this->db->join('user', 'user.id = detail_pembayaran.id_user');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPembayaranWhere($id = null) {
        $this->db->select('pembayaran.*, detail_pembayaran.*');
        $this->db->from('pembayaran');
        $this->db->join('detail_pembayaran', 'detail_pembayaran.id_pembayaran = pembayaran.id');
        $this->db->where('pembayaran.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function getAllRiwayatPembayaran($id = null)
    {
        $this->db->select('pembayaran.*, detail_pembayaran.*, paket.durasi, metode_pembayaran.metode_bayar');
        $this->db->from('pembayaran');
        $this->db->join('detail_pembayaran', 'detail_pembayaran.id_pembayaran = pembayaran.id');
        $this->db->join('paket', 'paket.id = detail_pembayaran.id_paket');
        $this->db->join('metode_pembayaran', 'metode_pembayaran.id = detail_pembayaran.id_metode_pembayaran');
        $this->db->where('detail_pembayaran.id_user', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTotalPembayaran()
    {
        return $this->db->get('pembayaran');
    }

    public function getLimitPembayaran()
    {
        $this->db->select('pembayaran.*, detail_pembayaran.*, paket.durasi');
        $this->db->from('pembayaran');
        $this->db->join('detail_pembayaran', 'detail_pembayaran.id_pembayaran = pembayaran.id');
        $this->db->join('paket', 'paket.id = detail_pembayaran.id_paket');
        $this->db->order_by('pembayaran.tgl_pembayaran', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function deletePembayaran($where = null)
    {
        $this->db->delete('pembayaran', $where);
    }

    public function updatePembayaran($id = null, $data = null)
    {
        $this->db->where('id', $id);
        $this->db->update('pembayaran', $data);
    }
}
