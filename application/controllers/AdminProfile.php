<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminProfile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        authorization();
    }
    // Management anggota
    public function index()
    {
        $data['title'] = 'User Data';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/navbar');
        $this->load->view('dashboard/admin/profile');
        $this->load->view('templates/admin/footer');
    }

    public function update()
    {
        $data['title'] = 'Form Edit Admin Profile';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => 'Name is required!!'
        ]);
        $this->form_validation->set_rules('notelp', 'Phone Number', 'required|trim|max_length[15]', [
            'required' => 'Phone Number is required!!',
            'max_length' => 'Phone Number is too long'
        ]);

        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        //memuat atau memanggil library upload
        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/navbar', $data);
            $this->load->view('dashboard/admin/update', $data);
            $this->load->view('templates/admin/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $old_image = $data['user']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }
                $gambar = $image['file_name'];
            } else { $gambar = $data['user']['image']; }

            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'image' => $gambar,
                'notelp' => htmlspecialchars($this->input->post('notelp', true)),
                'tanggal_input' => time()
            ];

            $this->ModelUser->updateUser($data, ['email' => $this->input->post('email')]);
            $this->session->set_flashdata('flash','Update Successfully');
            redirect('adminprofile');
        }
    }
}