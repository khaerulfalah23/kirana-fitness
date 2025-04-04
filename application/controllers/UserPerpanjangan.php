<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPerpanjangan extends CI_Controller {
  public function __construct()
	{
        parent::__construct();
        cekadmin();
	}
  
	public function index()
	{
		$data['title'] = 'Perpanjangan';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['id_paket'] = $this->uri->segment(3);
    $data['paket'] = $this->ModelPaket->getpaket()->result_array();
    $data['metode_pembayaran'] = $this->ModelMetodePembayaran->getMetodePembayaran()->result_array();
    
    $this->form_validation->set_rules('paket', 'Paket', 'required|trim', [
      'required' => 'Paket harus diisi!!',
    ]);
    $this->form_validation->set_rules('metode', 'Metode', 'required|trim', [
      'required' => 'Metode pembayaran harus diisi!!',
    ]);
    
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/user/header', $data);
      $this->load->view('home/perpanjangan');
      $this->load->view('templates/user/footer');
    } else {
      $id_paket = $this->input->post('paket', true);
      $paket = $this->ModelPaket->getPaketWhere(['id' => $id_paket])->row_array();
      $id = time();

      $perpanjangan = [
        'id' => $id,
        'tgl_perpanjangan' => date('Y-m-d'),
        'id_user' => $data['user']['id'],
        'id_paket' => $id_paket,
      ];
      
      $pembayaran = [
        'id' => $id,
        'tgl_pembayaran' => date('Y-m-d'),
        'jml_bayar' => $paket['harga'],
        'jtempo' => date('Y-m-d', strtotime('+1 day')),
        'status' => 'Tertunda',
      ];
      
      $detailPembayaran = [
        'id_pembayaran' => $id,
        'id_user' => $data['user']['id'],
        'id_paket' => $id_paket,
        'id_metode_pembayaran' => $this->input->post('metode', true),
      ];

      $this->ModelPerpanjangan->simpanPerpanjangan($perpanjangan);
      $this->ModelPembayaran->simpanPembayaran($pembayaran);
      $this->ModelPembayaran->simpanDetailPembayaran($detailPembayaran);

      redirect('UserPembayaran/index/'. $id);
    }
	}
}