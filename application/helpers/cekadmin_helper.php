<?php

function cekadmin()
{
    $ci = get_instance();

    if ($ci->session->userdata('role_id') == 1 || $ci->session->userdata('role_id') == 4) {
      $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Bukan Pelanggan!! </div>');
      redirect('auth');
    }

    $role_id = $ci->session->userdata('role_id');
    $id_user = $ci->session->userdata('id_user');
}