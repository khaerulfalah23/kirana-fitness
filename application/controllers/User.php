<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['users'] = $this->ModelUser->getUser()->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => 'Name is required!!'
        ]);
        $this->form_validation->set_rules('email', 'Email address', 'required|trim|valid_email|is_unique[user.email]', [
            'valid_email' => 'Incorrect Email!!',
            'required' => 'Email is required!!',
            'is_unique' => 'Email is Registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Passwords are not the same!!',
            'required' => 'Password is required!!',
            'min_length' => 'Password Too Short'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('address', 'Address', 'required|trim', [
            'required' => 'Address is required!!',
        ]);
        $this->form_validation->set_rules('notelp', 'Phone Number', 'required|trim|max_length[15]', [
            'required' => 'Phone Number is required!!',
            'max_length' => 'Phone Number is too long'
        ]);
        $this->form_validation->set_rules('jkel', 'Gander', 'required|trim', [
            'required' => 'Gander is required!!',
        ]);

        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $config['file_name'] = 'img' . time();
        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
          $this->load->view('templates/admin/header', $data);
          $this->load->view('templates/admin/sidebar');
          $this->load->view('templates/admin/navbar');
          $this->load->view('dashboard/user/index');
          $this->load->view('templates/admin/footer');
        } else {
            if ($this->upload->do_upload('image')) 
            {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else { $gambar = 'default.jpg'; }
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'jkel ' => htmlspecialchars($this->input->post('jkel', true)),
                'alamat' => htmlspecialchars(ucwords(strtolower($this->input->post('address', true)))),
                'notelp' => htmlspecialchars($this->input->post('notelp', true)),
                'role_id' => 2,
                'image' => $gambar,
                'tanggal_input' => time()
            ];
            $this->ModelUser->simpanData($data);
            $this->session->set_flashdata('flash','Added Successfully');
            redirect('user');
        }
    }

    public function update()
    {
        $data['title'] = 'Form Edit User Data';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['userData'] = $this->ModelUser->getUserWhere(['id' => $this->uri->segment(3)])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => 'Name is required!!'
        ]);
        $this->form_validation->set_rules('email', 'Email address', 'required|trim|valid_email', [
            'valid_email' => 'Incorrect Email!!',
            'required' => 'Email is required!!'
        ]);
        $this->form_validation->set_rules('address', 'Address', 'required|trim', [
            'required' => 'Address is required!!',
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
            $this->load->view('dashboard/user/update', $data);
            $this->load->view('templates/admin/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $old_image = $data['userData']['image'];
                if($old_image != 'default.jpg') { unlink(FCPATH . 'assets/img/profile/' . $old_image);}
                $gambar = $image['file_name'];
            } else { $gambar = $data['userData']['image']; }
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'alamat' => htmlspecialchars(ucwords(strtolower($this->input->post('address', true)))),
                'notelp' => htmlspecialchars($this->input->post('notelp', true)),
                'image' => $gambar,
                'role_id' => 2,
                'tanggal_input' => time()
            ];

            $this->ModelUser->updateUser($data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('flash','Update Successfully');
            redirect('user');
        }
    }

    public function delete()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['userData'] = $this->ModelUser->getUserWhere(['id' => $this->uri->segment(3)])->row_array();
        $old_image = $data['userData']['image'];
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelUser->hapusUser($where);
        if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image);
        }
        $this->session->set_flashdata('flash','Delete Successfully');
        redirect('user');
    }
}