<?php

class Auth extends CI_Controller
{

    public function index()
    {
        //jika statusnya sudah login, maka tidak bisa mengakses halaman login alias dikembalikan ke tampilan dashboard atau home
        if($this->session->userdata('email')) {
            if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 4) {
                redirect('dashboard');
            }
            redirect('home');
        }

        $this->form_validation->set_rules('email', 'Email address', 'required|trim|valid_email', [
            'valid_email' => 'Incorrect Email!!',
            'required' => 'Email is required!!'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password is required!!',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/auth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);

        $user = $this->ModelUser->cekData(['email' => $email])->row_array();

        //jika usernya ada
        if ($user) {
            //cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];

                $this->session->set_userdata($data);
                if ($data['role_id'] == 1 || $data['role_id'] == 4) {
                    redirect('dashboard');
                }
                redirect('home');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password wrong!!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email not registered!!</div>');
            redirect('auth');
        }
    }

    public function register()
    {
        if($this->session->userdata('email')) {
            if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 4) {
                redirect('dashboard');
            }
            redirect('home');
        }

        //membuat rule untuk inputan nama agar tidak boleh kosong dengan membuat pesan error dengan 
        //bahasa sendiri yaitu 'Nama Belum diisi'
        $this->form_validation->set_rules('name', 'Full Name', 'required', [
            'required' => 'Name is required!!'
        ]);
        //membuat rule untuk inputan email agar tidak boleh kosong, tidak ada spasi, format email harus valid
        //dan email belum pernah dipakai sama user lain dengan membuat pesan error dengan bahasa sendiri 
        //yaitu jika format email tidak benar maka pesannya 'Email Tidak Benar!!'. jika email belum diisi,
        //maka pesannya adalah 'Email Belum diisi', dan jika email yang diinput sudah dipakai user lain,
        //maka pesannya 'Email Sudah dipakai'
        $this->form_validation->set_rules('email', 'Email address', 'required|trim|valid_email|is_unique[user.email]', [
            'valid_email' => 'Incorrect Email!!',
            'required' => 'Email is required!!',
            'is_unique' => 'Email is Registered!'
        ]);
        //membuat rule untuk inputan password agar tidak boleh kosong, tidak ada spasi, tidak boleh kurang dari
        //dari 3 digit, dan password harus sama dengan repeat password dengan membuat pesan error dengan  
        //bahasa sendiri yaitu jika password dan repeat password tidak diinput sama, maka pesannya
        //'Password Tidak Sama'. jika password diisi kurang dari 3 digit, maka pesannya adalah 
        //'Password Terlalu Pendek'.
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Passwords are not the same!!',
            'required' => 'Password is required!!',
            'min_length' => 'Password Too Short'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
        //jika jida disubmit kemudian validasi form diatas tidak berjalan, maka akan tetap berada di
        //tampilan registrasi. tapi jika disubmit kemudian validasi form diatas berjalan, maka data yang 
        //diinput akan disimpan ke dalam tabel user
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Sign Up';
            $this->load->view('templates/auth/header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'image' => 'default.jpg',
                'role_id' => 2,
                'tanggal_input' => time()
            ];

            $this->ModelUser->simpanData($data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Congratulations, your account has been created, Login please!!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">You have successfully logout!</div>');
        redirect('auth');
    }
}