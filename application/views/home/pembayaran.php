<!-- Invoice -->
<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
  <div class="sm:w-11/12 lg:w-3/4 mx-auto">
    <?php 
    function rupiah($angka){
        $hasil = "Rp." . number_format($angka,2,',','.');
        return $hasil;
    } ?>
    <!-- Card -->
    <div class="flex flex-col mb-8 p-4 sm:p-10 bg-white shadow-md rounded-xl">
      <!-- Grid -->
      <div class="flex justify-between">
        <div>
          <img src="<?= base_url('assets/img/logo.jpg'); ?>" class="w-24" alt="logo">

          <h1 class="mt-2 text-lg md:text-xl font-semibold text-[#FF90BC]">Kirana Fitness</h1>
        </div>
        <!-- Col -->

        <div class="text-end">
          <h2 class="text-2xl md:text-3xl font-semibold text-gray-800">Tagihan #</h2>
          <h3 class="text-lg font-semibold text-gray-800"><?= $pembayaran['id']; ?></h3>
        </div>
        <!-- Col -->
      </div>
      <!-- End Grid -->

      <!-- Grid -->
      <div class="mt-8 grid sm:grid-cols-2 gap-3">
        <div>
          <h3 class="text-lg font-semibold text-gray-800">Pembayaran kepada:</h3>
          <h3 class="text-lg font-semibold text-gray-800"><?= $user['nama']; ?></h3>
        </div>
        <!-- Col -->

        <div class="sm:text-end space-y-2">
          <!-- Grid -->
          <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800">Tanggal pembayaran:</dt>
              <dd class="col-span-2 text-gray-500"><?= $pembayaran['tgl_pembayaran']; ?></dd>
            </dl>
            <dl class="grid sm:grid-cols-5 gap-x-3">
              <dt class="col-span-3 font-semibold text-gray-800">Jatuh tempo:</dt>
              <dd class="col-span-2 text-gray-500"><?= $pembayaran['jtempo']; ?></dd>
            </dl>
          </div>
          <!-- End Grid -->
        </div>
        <!-- Col -->
      </div>
      <!-- End Grid -->

      <!-- Table -->
      <div class="mt-6">
      <div class="border border-gray-200 p-4 rounded-lg space-y-4">
        <!-- Header for larger screens -->
        <div class="hidden sm:grid sm:grid-cols-5">
          <div class="text-start text-xs font-medium text-gray-500 uppercase">Paket</div>
          <div class="sm:col-span-2 text-xs font-medium text-gray-500 uppercase">No Pembayaran</div>
          <div class="text-start text-xs font-medium text-gray-500 uppercase">Metode Pembayaran</div>
          <div class="text-end text-xs font-medium text-gray-500 uppercase">Total Bayar</div>
        </div>

        <div class="hidden sm:block border-b border-gray-200"></div>

        <!-- Data rows for larger screens -->
        <div class="hidden sm:grid grid-cols-1 sm:grid-cols-5 gap-2">
          <div>
            <p class="text-gray-800"><?= $paket['durasi']; ?></p>
          </div>
          <div class="sm:col-span-2">
            <p class="font-medium text-gray-800"><?= $metode['no_bayar']; ?></p>
          </div>
          <div>
            <p class="text-gray-800"><?= $metode['metode_bayar']; ?></p>
          </div>
          <div>
            <p class="sm:text-end text-gray-800"><?= rupiah($pembayaran['jml_bayar']); ?></p>
          </div>
        </div>

        <!-- Data rows for smaller screens -->
        <div class="sm:hidden space-y-2">
          <div class="flex justify-between">
            <span class="text-xs font-medium text-gray-500 uppercase">No Pembayaran</span>
            <span class="font-medium text-gray-800"><?= $metode['no_bayar']; ?></span>
          </div>
          <div class="flex justify-between">
            <span class="text-xs font-medium text-gray-500 uppercase">Paket</span>
            <span class="text-gray-800"><?= $paket['durasi']; ?></span>
          </div>
          <div class="flex justify-between">
            <span class="text-xs font-medium text-gray-500 uppercase">Metode Pembayaran</span>
            <span class="text-gray-800"><?= $metode['metode_bayar']; ?></span>
          </div>
          <div class="flex justify-between">
            <span class="text-xs font-medium text-gray-500 uppercase">Total Bayar</span>
            <span class="text-gray-800"><?= rupiah($pembayaran['jml_bayar']); ?></span>
          </div>
        </div>
      </div>
      </div>
      <!-- End Table -->

      <!-- Grid -->
      <!-- <div class="mt-8 grid sm:grid-cols-2 gap-3"> -->
      <div class="mt-8 flex justify-between items-center flex-wrap gap-3">
        <div>
          <h3 class="text-lg font-semibold text-gray-800">Terima kasih!</h3>
          <p class="text-gray-500">Konfirmasi pembayaran anda :</p>
          <p>kirana@gmail.com</p>
          <p>08123456789</p>
        </div>
        <!-- Col -->

        <div class="sm:text-end space-y-2">
          <!-- Grid -->
          <form method="post" action="<?= base_url('userpembayaran/upload') ?>" enctype="multipart/form-data">
            <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
              <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">Upload bukti pembayaran</span>
                </div>
                <input name="image" type="file" class="file-input file-input-bordered file-input-sm w-full max-w-xs" />
                <input type="text" name="id" value="<?= $pembayaran['id']; ?>" hidden>
              </label>
              <button class="btn bg-[#FF90BC] text-white hover:bg-[#FAF3F0] hover:text-black">Kirim</button>
            </div>
          </form>
          <!-- End Grid -->
        </div>
        <!-- Col -->
      </div>
      <!-- End Grid -->


    </div>
    <!-- End Card -->
  </div>
</div>
<!-- End Invoice -->