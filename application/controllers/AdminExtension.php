<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminExtension extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        authorization();
    }

    public function index()
    {
        $data['title'] = 'Data Perpanjangan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['extension'] = $this->ModelPerpanjangan->getPerpanjangan();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/navbar');
        $this->load->view('dashboard/extension/index');
        $this->load->view('templates/admin/footer');
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $this->ModelPerpanjangan->deletePerpanjangan($id);
        $this->session->set_flashdata('flash','Delete Successfully');
        redirect('adminextension');
    }
}