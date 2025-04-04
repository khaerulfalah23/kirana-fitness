<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserDataReport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        authorization();
    }

    // Management anggota
    public function index()
    {
        $data['title'] = 'Laporan Data User';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['users'] = $this->ModelUser->getUser()->result_array();
        
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/navbar');
        $this->load->view('dashboard/user/report');
        $this->load->view('templates/admin/footer');
    }

    public function print()
    {  
        $data['title'] = 'Laporan Data User Kirana Fitness';
        $data['users'] = $this->ModelUser->getUserReport()->result_array();
        $this->load->view('dashboard/user/print',$data);
    }

    public function pdf()
    {
        $data['title'] = 'Laporan Data User Kirana Fitness';
        $data['users'] = $this->ModelUser->getUserReport()->result_array();

        $this->load->library('dompdf_gen');

        $this->load->view('dashboard/user/pdf', $data);

        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape';//tipe format kertas potrait atau landscape
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_user.pdf", array('Attachment' => 0));
        //nama file pdf yang dihasilkan
    }

    public function excel()
    {
        $data=array(
            'title' => 'Laporan Data User',
            'users' => $this->ModelUser->getUserReport()->result_array()
        );
        $this->load->view('dashboard/user/excel', $data);
    }
}