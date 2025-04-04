<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminPayment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        authorization();
    }

    public function index()
    {
        $data['title'] = 'Data Pembayaran';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['payment'] = $this->ModelPembayaran->getPembayaran();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/navbar');
        $this->load->view('dashboard/payment/index');
        $this->load->view('templates/admin/footer');
    }

    public function update()
    {
		$id = $this->uri->segment(3);
        $pembayaran = $this->ModelPembayaran->getPembayaranWhere($id);
        $paket = $this->ModelPaket->getPaketWhere(['id' => $pembayaran['id_paket']])->row_array();
        $idUser = $pembayaran['id_user'];
        $kartuMember = $this->ModelKartuAnggota->getKartuAnggotaWhere(['id_user' => $idUser])->row_array();

        // Menggunakan regex untuk mengambil angka dan satuan waktu dari string
        preg_match('/(\d+)\s*(hari|minggu|bulan|tahun)/i', $paket['durasi'], $matches);

        // Konversi hasil ke integer dan tentukan unit waktu
        $amount = (int)$matches[1];
        $unit = strtolower($matches[2]); // Mengubah unit waktu menjadi huruf kecil

        // Pemetaan unit waktu ke format strtotime
        $unitsMap = [
            'hari' => 'days',
            'minggu' => 'weeks',
            'bulan' => 'months',
            'tahun' => 'years'
        ];

        // Menentukan format penambahan waktu yang sesuai untuk strtotime
        $timeToAdd = "+$amount " . ($unitsMap[$unit] ?? 'days');

        // Hitung tanggal selesai dengan menambahkan waktu yang sesuai
        $selesai = date('Y-m-d', strtotime($timeToAdd));

        // Check if $kartuMember exists and handle accordingly
        if (!$kartuMember) {
            $this->ModelKartuAnggota->insertKartuAnggota(['tgl_selesai' => $selesai, 'id_user' => $idUser]);
        } else {
            $new_expiry_date = date('Y-m-d', strtotime($kartuMember['tgl_selesai'] . " $timeToAdd"));
            $this->ModelKartuAnggota->updateKartuAnggota(['tgl_selesai' => $new_expiry_date], ['id_user' => $idUser]);
        }

        $this->ModelPembayaran->updatePembayaran($id, ['status' => 'Lunas']);
        $this->ModelUser->updateUser(['role_id' => 3], ['id' => $idUser]);
        $this->session->set_flashdata('flash','Update Successfully');
        redirect('adminPayment');
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $this->ModelPembayaran->deletePembayaran(['id' => $id]);
        $this->session->set_flashdata('flash','Delete Successfully');
        redirect('adminPayment');
    }
}