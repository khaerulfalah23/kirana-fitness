<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserProfile extends CI_Controller
{
    public function __construct()
	{
        parent::__construct();
        cekadmin();
	}
    
    public function index()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/user/header', $data);
		$this->load->view('home/profile/index');
		$this->load->view('templates/user/footer');
    }

    public function update()
    {
        $data['title'] = 'Form Edit User Profile';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Name', 'required', [
            'required' => 'Name is required!!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => 'Email is required!!'
        ]);
        $this->form_validation->set_rules('notelp', 'Phone Number', 'required|trim|max_length[15]', [
            'required' => 'Phone Number is required!!',
            'max_length' => 'Phone Number is too long'
        ]);
        $this->form_validation->set_rules('jkel', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin is required!!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat Kelamin is required!!'
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
            $this->load->view('templates/user/header', $data);
            $this->load->view('home/profile/update');
            $this->load->view('templates/user/footer');

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
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'jkel' => htmlspecialchars($this->input->post('jkel', true)),
                'image' => $gambar,
                'notelp' => htmlspecialchars($this->input->post('notelp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'tanggal_input' => time()
            ];

            $this->ModelUser->updateUser($data, ['email' => $this->input->post('email')]);
            $this->session->set_flashdata('flash','Update Successfully');
            redirect('userprofile');
        }
    }
}