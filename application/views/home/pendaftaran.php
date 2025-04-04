<section class="py-10 container mx-auto flex justify-center px-3 xl:px-24">
  <div class="card bg-base-100 w-full max-w-3xl shadow-xl">
    <div class="card-body">
    <form class="" method="post" action="<?= base_url('userpendaftaran') ?>" enctype="multipart/form-data">
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text">Pilih Paket</span>
        </div>
        <select name="paket" class="select select-bordered w-full">
          <option disabled selected>Pilih paket yang anda inginkan</option>
          <?php foreach ($paket as $p) : ?>
            <option value="<?= $p['id'] ?>" <?= $id_paket == $p['id'] ? 'selected' : ''; ?> ><?= $p['durasi'] ?></option>
          <?php endforeach; ?>
        </select>
        <div class="label">
          <span class="label-text-alt text-red-500 text-lg"><?= form_error('paket', '<small class="text-danger">', '</small>'); ?></span>
        </div>
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text">Pilih Metode Pembayaran</span>
        </div>
        <select name="metode" class="select select-bordered w-full">
          <option disabled selected>Pilih metode pembayaran</option>
          <?php foreach ($metode_pembayaran as $m) : ?>
            <option value="<?= $m['id'] ?>"><?= $m['metode_bayar'] ?></option>
          <?php endforeach; ?>
        </select>
        <div class="label">
          <span class="label-text-alt text-red-500 text-lg"><?= form_error('metode', '<small class="text-danger">', '</small>'); ?></span>
        </div>
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text">Jenis Kelamin</span>
        </div>
        <select name="jkel" class="select select-bordered w-full">
          <option disabled selected>Pilih</option>
          <option value="Laki-Laki" >Laki-Laki</option>
          <option value="Perempuan" >Perempuan</option>
        </select>
        <div class="label">
          <span class="label-text-alt text-red-500 text-lg"><?= form_error('jkel', '<small class="text-danger">', '</small>'); ?></span>
        </div>
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text">Alamat</span>
        </div>
        <input type="text" name="alamat" placeholder="Masukkan Alamat" class="input input-bordered w-full" />
        <div class="label">
          <span class="label-text-alt text-red-500 text-lg"><?= form_error('alamat', '<small class="text-danger">', '</small>'); ?></span>
        </div>
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text">Nomor Telepon</span>
        </div>
        <input type="text" name="no_telp" placeholder="Masukkan Nomor Telepon" class="input input-bordered w-full" />
        <div class="label">
          <span class="label-text-alt text-red-500 text-lg"><?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?></span>
        </div>
      </label>
      <div class="card-actions justify-end">
        <a href="<?= base_url(); ?>" class="btn">Batal</a>
        <button class="btn bg-[#FF90BC] text-white hover:bg-[#FAF3F0] hover:text-black">Kirim</button>
      </div>
    </form>
    </div>
  </div>
</section>