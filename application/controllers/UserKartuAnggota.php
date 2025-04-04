<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserKartuAnggota extends CI_Controller
{
    public function __construct()
	{
        parent::__construct();
        cekadmin();
	}

    public function index()
    {
        $data['title'] = 'Kartu Anggota';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kartuAnggota'] = $this->ModelKartuAnggota->getKartuAnggotaWhere(['id_user' => $data['user']['id']])->row_array();

        $this->load->view('templates/user/header', $data);
        $this->load->view('home/kartuanggota');
        $this->load->view('templates/user/footer');
    }

    public function print()
    {  
        $data['title'] = 'Kartu Anggota';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kartuAnggota'] = $this->ModelKartuAnggota->getKartuAnggotaWhere(['id_user' => $data['user']['id']])->row_array();
        $this->load->view('home/printkartuanggota',$data);
    }
}