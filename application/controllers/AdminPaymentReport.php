<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminPaymentReport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        authorization();
    }

    // Management anggota
    public function index()
    {
        $data['title'] = 'Laporan Pembayaran';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['payment'] = $this->ModelPembayaran->getPembayaran();
        
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/navbar');
        $this->load->view('dashboard/payment/report');
        $this->load->view('templates/admin/footer');
    }

    public function print()
    {  
        $data['title'] = 'Laporan Pembayaran Kirana Fitness';
        $data['payment'] = $this->ModelPembayaran->getPembayaran();

        $this->load->view('dashboard/payment/print',$data);
    }

    public function pdf()
    {
        $data['title'] = 'Laporan Pembayaran Kirana Fitness';
        $data['payment'] = $this->ModelPembayaran->getPembayaran();
        
        $this->load->library('dompdf_gen');

        $this->load->view('dashboard/payment/pdf', $data);

        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape';//tipe format kertas potrait atau landscape
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_pembayaran_kiranan_fitnes.pdf", array('Attachment' => 0));
        //nama file pdf yang dihasilkan
    }

    public function excel()
    {
        $data=array(
            'title' => 'Laporan Pembayaran Kirana Fitness',
            'payment' => $this->ModelPembayaran->getPembayaran()
        );
        $this->load->view('dashboard/payment/excel', $data);
    }
}