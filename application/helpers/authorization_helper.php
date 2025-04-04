<?php

function authorization()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
      $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda belum login!! </div>');
      redirect('auth');
    }

    if ($ci->session->userdata('role_id') == 2 || $ci->session->userdata('role_id') == 2) {
      $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda bukan admin!! </div>');
      redirect('auth');
    }

    $role_id = $ci->session->userdata('role_id');
    $id_user = $ci->session->userdata('id_user');
}