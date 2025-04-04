<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        authorization();
    }

    // Management anggota
    public function index()
    {
        $data['title'] = 'Data Paket';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['paket'] = $this->ModelPaket->getPaket()->result_array();

        $this->form_validation->set_rules('durasi', 'Durasi', 'required|trim', [
            'required' => 'Durasi harus diisi!!',
        ]);
        $this->form_validation->set_rules('sesi', 'Sesi', 'required|trim|max_length[2]', [
            'required' => 'Sesi harus diisi!!',
            'max_length' => 'Sesi terlalu panjang!!',
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|max_length[11]', [
            'required' => 'Harga harus diisi!!',
            'max_length' => 'Harga terlalu panjang!!',
        ]);

        if ($this->form_validation->run() == false) {
          $this->load->view('templates/admin/header', $data);
          $this->load->view('templates/admin/sidebar');
          $this->load->view('templates/admin/navbar');
          $this->load->view('dashboard/paket/index');
          $this->load->view('templates/admin/footer');
        } else {
            $harga = $this->input->post('harga', true);
            $data = [
                'durasi' => htmlspecialchars($this->input->post('durasi', true)),
                'sesi' => htmlspecialchars($this->input->post('sesi', true)),
                'harga' => (int) $harga,
            ];

            $this->ModelPaket->simpanData($data);
            $this->session->set_flashdata('flash','Added Successfully');
            redirect('paket');
        }
    }

    public function update()
    {
        $data['title'] = 'Form Edit Data Paket';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['paket'] = $this->ModelPaket->getPaketWhere(['id' => $this->uri->segment(3)])->row_array();

        $this->form_validation->set_rules('durasi', 'Durasi', 'required|trim', [
            'required' => 'Durasi harus diisi!!',
        ]);
        $this->form_validation->set_rules('sesi', 'Sesi', 'required|trim|max_length[2]', [
            'required' => 'Sesi harus diisi!!',
            'max_length' => 'Sesi terlalu panjang!!',
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|max_length[11]', [
            'required' => 'Harga harus diisi!!',
            'max_length' => 'Harga terlalu panjang!!',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/navbar', $data);
            $this->load->view('dashboard/paket/update', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $harga = $this->input->post('harga', true);
            $data = [
                'durasi' => htmlspecialchars($this->input->post('durasi', true)),
                'sesi' => htmlspecialchars($this->input->post('sesi', true)),
                'harga' => (int) $harga,
            ];

            $this->ModelPaket->updatePaket($data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('flash','Update Successfully');
            redirect('paket');
        }
    }

    public function delete()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelPaket->hapusPaket($where);
        $this->session->set_flashdata('flash','Delete Successfully');
        redirect('paket');
    }
}