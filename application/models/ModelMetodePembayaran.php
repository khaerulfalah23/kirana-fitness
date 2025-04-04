<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelMetodePembayaran extends CI_Model
{
  public function getMetodePembayaran()
  {
      return $this->db->get('metode_pembayaran');
  }

  public function getMetodePembayaranWhere($where)
  {
      return $this->db->get_where('metode_pembayaran', $where);
  }
}
