<div class="hero min-h-screen">
<div class="card w-96 bg-base-100 shadow-xl">
  <form method="post" action="<?= base_url('UserProfile/update') ?>" enctype="multipart/form-data">
  <div class="card-body text-center">
    <label class="form-control w-full max-w-xs">
      <div class="label">
        <span class="label-text">Nama</span>
      </div>
      <input type="text" name="nama" placeholder="Type here" value="<?= $user['nama']; ?>" class="input input-bordered w-full max-w-xs" />
    </label>
    <label class="form-control w-full max-w-xs">
      <div class="label">
        <span class="label-text">Email</span>
      </div>
      <input type="text" name="email" readonly placeholder="Type here" value="<?= $user['email']; ?>" class="input input-bordered w-full max-w-xs" />
    </label>
    <label class="form-control w-full max-w-xs">
      <div class="label">
        <span class="label-text">Jenis Kelamin</span>
      </div>
      <select class="select select-bordered" name="jkel">
        <option disabled selected>Pilih</option>
        <option value="Laki-Laki" <?= $user['jkel'] == 'Laki-Laki' ? 'selected' : ''; ?>>Laki-Laki</option>
        <option value="Perempuan" <?= $user['jkel'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
      </select>
    </label>
    <label class="form-control w-full max-w-xs">
      <div class="label">
        <span class="label-text">No. Telp</span>
      </div>
      <input type="text" name="notelp" placeholder="Type here" value="<?= $user['notelp']; ?>" class="input input-bordered w-full max-w-xs" />
    </label>
    <label class="form-control w-full max-w-xs">
      <div class="label">
        <span class="label-text">Alamat</span>
      </div>
      <input type="text" name="alamat" placeholder="Type here" value="<?= $user['alamat']; ?>" class="input input-bordered w-full max-w-xs" />
    </label>
    <label class="form-control w-full max-w-xs">
      <div class="label">
        <span class="label-text">Upload Foto</span>
      </div>
      <input type="file" name="image" class="file-input file-input-bordered w-full max-w-xs" />
    </label>
    <div class="card-actions justify-end">
      <a href="<?= base_url(); ?>" class="btn mt-4">Kembali</a>
      <button type="submit" class="btn bg-[#FF90BC] text-white hover:bg-[#FAF3F0] hover:text-black mt-4">Submit</button>
    </div>
  </div>
  </form>
</div>
</div>