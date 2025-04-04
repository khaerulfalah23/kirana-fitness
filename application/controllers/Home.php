<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
			parent::__construct();
			cekadmin();
	}
	public function index()
	{
		$data['title'] = 'Beranda';
		$data['paket'] = $this->ModelPaket->getPaket()->result_array();
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/user/header', $data);
		$this->load->view('home/index');
		$this->load->view('templates/user/footer');
	}

	public function tambahTransaksi()
	{
		$id_paket = $this->uri->segment(3);
		$user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$instruktur = $this->ModelInstructor->getInstructor()->result_array();
		$id_transaksi = intval(substr(time() . mt_rand(1000, 9999), 0, 10));
	
		$transaksi = [
			'id' =>  $id_transaksi,
			'tgl_transaksi' => date('Y-m-d'),
			'id_pelanggan' => $user['id'],
		];
		
		$detailTransaksi = [
			'id_transaksi' => $id_transaksi,
			'id_paket' => $id_paket,
			'id_instruktur' => $instruktur[0]['id'],
		];

		$existingTransaksi = $this->ModelTransaksi->getTransaksiWhere(['id_pelanggan' => $user['id']])->result_array();

		if ($existingTransaksi) {
			$this->session->set_flashdata('flash','Selesaikan transaksi sebelumnya terlebih dahulu!');
			redirect(base_url());
		} else {
			$this->ModelTransaksi->tambahTransaksi($transaksi);
			$this->ModelTransaksi->tambahDetailTransaksi($detailTransaksi);
		}

		redirect(base_url() . 'transaksi');
	}
}