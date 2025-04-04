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
</head>
<body class="bg-gradient-to-r from-0% from-[#FAFAFA] to-[#FCFCFC] to-100%">
<div class="hero flex flex-wrap flex-col justify-center gap-5 py-10 min-h-screen">
  <div class="card w-80 bg-base-100 shadow-xl">
    <div class="card-body items-center text-center">
      <div class="w-full bg-[#FF90BC] h-[200px] absolute top-0 rounded-t-xl rounded-b-xl"></div>
      <div class="relative">
        <h1 class="text-white font-semibold text-3xl">Kirana Fitness</h1>
        <figure class="px-10 py-10">
          <img src="<?= base_url('assets/img/qrcode.jpg'); ?>" alt="Profile" class="w-40 h-40 rounded-xl border-4 border-[#FF90BC]" />
        </figure>
      </div>
      <h2 class="card-title capitalize"><?= $user['nama']; ?></h2>
      <p>Aktif Sampai : <?= date('d M Y', strtotime($kartuAnggota['tgl_selesai'])); ?></p>
    </div>
  </div>
</div>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>