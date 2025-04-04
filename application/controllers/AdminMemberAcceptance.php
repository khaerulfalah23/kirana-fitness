<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminMemberAcceptance extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        authorization();
    }

    // Management anggota
    public function index()
    {
        $data['title'] = 'Laporan Penerimaan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['users'] = $this->ModelUser->getUserJoin();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/navbar');
        $this->load->view('dashboard/member/report');
        $this->load->view('templates/admin/footer');
    }

    public function print()
    {  
        $data['title'] = 'Laporan Penerimaan Anggota Kirana Fitness';
        $data['users'] = $this->ModelUser->getUserJoin();
        $this->load->view('dashboard/member/print',$data);
    }

    public function pdf()
    {
        $data['title'] = 'Laporan Penerimaan Anggota Kirana Fitness';
        $data['users'] = $this->ModelUser->getUserJoin();

        $this->load->library('dompdf_gen');
        $this->load->view('dashboard/member/pdf', $data);

        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape';//tipe format kertas potrait atau landscape
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_member.pdf", array('Attachment' => 0));
        //nama file pdf yang dihasilkan
    }

    public function excel()
    {
        $data=array(
            'title' => 'Laporan Penerimaan Anggota Kirana Fitness',
            'users' => $this->ModelUser->getUserJoin()
        );
        $this->load->view('dashboard/member/excel', $data);
    }
}