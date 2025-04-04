<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPendaftaran extends CI_Controller {
  public function __construct()
	{
        parent::__construct();
        cekadmin();
	}
  
	public function index()
	{
		$data['title'] = 'Pendaftaran';
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
    $this->form_validation->set_rules('jkel', 'Jenis Kelamin', 'required|trim', [
      'required' => 'Jenis Kelamin harus diisi!!',
    ]);
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
      'required' => 'Alamat harus diisi!!',
    ]);
    $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim|max_length[15]', [
        'required' => 'Nomor Telepon harus diisi!!',
        'max_length' => 'Nomor Telepon terlalu panjang!!',
    ]);
    
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/user/header', $data);
      $this->load->view('home/pendaftaran');
      $this->load->view('templates/user/footer');
    } else {
      $id_paket = $this->input->post('paket', true);
      $paket = $this->ModelPaket->getPaketWhere(['id' => $id_paket])->row_array();
      $id = time();

      $pendaftaran = [
        'id' => $id,
        'tgl_pendaftaran' => date('Y-m-d'),
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

      $anggota = [
        'jkel' => htmlspecialchars($this->input->post('jkel', true)),
        'alamat' => htmlspecialchars($this->input->post('alamat', true)),
        'notelp' => htmlspecialchars($this->input->post('no_telp', true)),
      ];

      $this->ModelPendaftaran->simpanPendaftaran($pendaftaran);
      $this->ModelPembayaran->simpanPembayaran($pembayaran);
      $this->ModelPembayaran->simpanDetailPembayaran($detailPembayaran);
      $this->ModelUser->updateUser($anggota, ['id' => $data['user']['id']]);

      redirect('UserPembayaran/index/'. $id);
    }
	}
}