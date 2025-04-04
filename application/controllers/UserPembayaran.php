<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPembayaran extends CI_Controller {
	public function __construct()
	{
        parent::__construct();
        cekadmin();
	}
	public function index()
	{
    	$data['title'] = 'Pembayaran';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['id'] = $this->uri->segment(3);
		$data['pembayaran'] = $this->ModelPembayaran->getPembayaranWhere($data['id']);
		$data['metode'] = $this->ModelMetodePembayaran->getMetodePembayaranWhere(['id' => $data['pembayaran']['id_metode_pembayaran']])->row_array();
		$data['paket'] = $this->ModelPaket->getPaketWhere(['id' => $data['pembayaran']['id_paket']])->row_array();

		$this->load->view('templates/user/header', $data);
		$this->load->view('home/pembayaran');
		$this->load->view('templates/user/footer');
	}

	public function upload() {
		$config['upload_path'] = './assets/img/pembayaran/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'bukti' . time();
        $this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			$image = $this->upload->data();
			$gambar = $image['file_name'];
		} else { $gambar = ''; }
		$data = ['bukti' => $gambar];

		$this->ModelPembayaran->updatePembayaran($this->input->post('id'), $data);		
		$this->session->set_flashdata('flash','Terimakasih telah melakukan pembayaran!');
		redirect('');
	}

	public function riwayat() {
		$data['title'] = 'Riwayat Pembayaran';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['pembayaran'] = $this->ModelPembayaran->getAllRiwayatPembayaran($data['user']['id']);

		if (!$data['pembayaran']) {
			$this->session->set_flashdata('flash', 'Belum ada riwayat pembayaran saat ini!');
			redirect(base_url());
		}

		$this->load->view('templates/user/header', $data);
		$this->load->view('home/riwayatpembayaran');
		$this->load->view('templates/user/footer');
	}
}