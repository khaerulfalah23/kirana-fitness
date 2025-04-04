<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- DaisyUI -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>  
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dashboard/css/sweetalert2.min.css'); ?>">
  <link rel='shortcut icon' type='image/x-icon' href='<?= base_url('assets/img/logo.jpg'); ?>' />
  <title><?= $title; ?> | Kirana Fitness</title>
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>
<body class="bg-gradient-to-r from-0% from-[#FAFAFA] to-[#FCFCFC] to-100%">
<header classs="max-w-screen-2xl container mx-auto fixed top-0 left-0 right-0 z-50 transition-all duration-300 ease-in-out">
<div class="navbar xl:px-24">
  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </div>
      <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
        <li><a href="<?= base_url('') ?>">Beranda</a></li>
        <li><a href="#testimoni">Testimoni</a></li>
        <li><a href="#paket">Paket</a></li>
        <li><a href="#layanan">Layanan</a></li>
      </ul>
    </div>
    <div class="flex items-center gap-2">
      <img src="<?= base_url('assets/img/logo.jpg'); ?>" class="w-10 rounded-full border border-gray-200" alt="Logo">
      <a href="<?= base_url(''); ?>" class="font-bold text-[#FF90BC]">Kirana Fitness</a>
    </div>
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li><a href="<?= base_url('') ?>">Beranda</a></li>
      <li><a href="<?= base_url('/#testimoni') ?>">Testimoni</a></li>
      <li><a href="<?= base_url('/#paket') ?>">Paket</a></li>
      <li><a href="<?= base_url('/#layanan') ?>">Layanan</a></li>
    </ul>
  </div>
<div class="navbar-end">
  <?php if ($user) : ?>
    <div class="dropdown dropdown-end">
      <div tabindex="0" role="button" class="btn w-40 btn-ghost btn-circle avatar">
          <p class="font-bold capitalize" ><?= $user['nama'] ?></p>
        <div class="w-10 rounded-full">
          <img alt="Tailwind CSS Navbar component" src="<?= base_url('assets/img/profile/' . $user['image']) ?>" />
        </div>
      </div>
      <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
        <li><a class="<?= ($title == 'Profile') ? 'text-[#FF90BC]' : '' ?>" href="<?= base_url('userProfile') ?>">Profile</a></li>
        <?php if ($user && $this->db->get_where('kartu_anggota',['id_user' => $user['id']])->row_array()): ?>
        <li><a class="<?= ($title == 'Kartu Anggota') ? 'text-[#FF90BC]' : '' ?>" href="<?= base_url('UserKartuAnggota') ?>">Kartu Anggota</a></li>
        <li><a class="<?= ($title == 'Perpanjangan') ? 'text-[#FF90BC]' : '' ?>" href="<?= base_url('UserPerpanjangan') ?>">Perpanjangan</a></li>
        <li><a class="<?= ($title == 'Riwayat Pembayaran') ? 'text-[#FF90BC]' : '' ?>" href="<?= base_url('userpembayaran/riwayat') ?>">Riwayat Pembayaran</a></li>
        <?php endif ?>
        <li><a href="<?= base_url('auth/logout') ?>">Logout</a></li>
      </ul>
    </div>
  <?php else : ?>
    <a href="<?= base_url('auth') ?>" class="btn bg-[#FF90BC] text-white hover:bg-[#FAF3F0] hover:text-black">Login</a>
  <?php endif ?>
</div>
</div>
</header>