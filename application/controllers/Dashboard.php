<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function __construct()
  {
      parent::__construct();
      authorization();
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

    $data['member'] = $this->ModelUser->getUserWhere(['role_id' => '3'])->num_rows();
    $data['members'] = $this->ModelUser->getUserLimit()->result_array();
    $data['pendaftaran'] = $this->ModelPendaftaran->getTotalPendaftaran()->num_rows();
    $data['perpanjangan'] = $this->ModelPerpanjangan->getTotalPerpanjangan()->num_rows();
    $data['pembayaran'] = $this->ModelPembayaran->getTotalPembayaran()->num_rows();
    $data['payment'] = $this->ModelPembayaran->getLimitPembayaran();

    foreach ($data['payment'] as $p) {
      $data['users'] = $this->ModelUser->getUserWhere(['id' => $p['id_user']])->row_array();
      $data['paket'] = $this->ModelPaket->getPaketWhere(['id' => $p['id_paket']])->row_array();
    }

    $detail = $this->db->query("SELECT * FROM user INNER JOIN kartu_anggota ON kartu_anggota.id_user = user.id WHERE CURDATE() > tgl_selesai AND user.role_id = '3'")->result_array();
    foreach ($detail as $d) {
        $this->db->query("DELETE FROM kartu_anggota WHERE id_user = $d[id_user]");
        $this->db->query("UPDATE user SET role_id = '2' WHERE id = $d[id_user]");
    }

    // Menghapus data pendaftaran dan pembayaran setiap pergantian bulan
    $this->db->query("DELETE pendaftaran FROM pendaftaran 
    JOIN user ON pendaftaran.id_user = user.id 
    WHERE MONTH(curdate()) > MONTH(tgl_pendaftaran) 
    AND YEAR(curdate()) >= YEAR(tgl_pendaftaran)");
    $this->db->query("DELETE pembayaran, detail_pembayaran FROM pembayaran 
    JOIN detail_pembayaran ON pembayaran.id = detail_pembayaran.id_pembayaran 
    WHERE MONTH(CURRENT_DATE()) > MONTH(pembayaran.tgl_pembayaran) 
    AND YEAR(CURRENT_DATE()) >= YEAR(pembayaran.tgl_pembayaran)");

    // JOIN digunakan antara tabel pembayaran dan detail_pembayaran berdasarkan kolom id_pembayaran.
    // Kondisi MONTH(CURRENT_DATE()) > MONTH(pembayaran.tgl_pembayaran) AND YEAR(CURRENT_DATE()) >= YEAR(pembayaran.tgl_pembayaran) memastikan bahwa kita hanya menghapus pembayaran dengan tanggal pembayaran di bulan sebelumnya atau sebelumnya.
    
    $this->load->view('templates/admin/header', $data);
    $this->load->view('templates/admin/sidebar');
    $this->load->view('templates/admin/navbar');
    $this->load->view('dashboard/index');
    $this->load->view('templates/admin/footer');
  }
}
