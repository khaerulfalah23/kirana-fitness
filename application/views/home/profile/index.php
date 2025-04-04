<div class="hero flex flex-wrap justify-center gap-5 py-10 min-h-screen">
  <div class="card w-80 bg-base-100 shadow-xl">
    <figure class="px-10 pt-10">
      <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="Profile" class="w-40 h-40 rounded-full" />
    </figure>
    <div class="card-body items-center text-center">
      <h2 class="card-title"><?= $user['nama']; ?></h2>
      <p>Email : <?= $user['email']; ?></p>
      <p>Dibuat Sejak : <?= date('d F Y', $user['tanggal_input']); ?></p>
      <div class="card-actions mt-3">
        <a href="<?= base_url(''); ?>" class="btn">Kembali</a>
        <a href="<?= base_url('userprofile/update'); ?>" class="btn bg-[#FF90BC] text-white hover:bg-[#FAF3F0] hover:text-black">Ubah Profile</a>
      </div>
    </div>
  </div>
</div>