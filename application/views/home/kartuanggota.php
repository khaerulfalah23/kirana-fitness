<div class="hero flex flex-wrap flex-col justify-center gap-5 py-10 min-h-screen">
  <div class="card w-80 bg-base-100 shadow-xl">
    <div class="card-body items-center text-center">
      <div class="w-full bg-[#FF90BC] h-[200px] absolute top-0 rounded-t-xl rounded-b-xl "></div>
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
  <div class="mt-3">
    <a href="<?= base_url(''); ?>" class="btn mr-3">Kembali</a>
    <a target="_blank" href="<?= base_url('userkartuanggota/print'); ?>" class="btn bg-[#FF90BC] text-white hover:bg-[#FAF3F0] hover:text-black">Print</a>
  </div>
</div>