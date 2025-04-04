
<div class="max-w-screen-2xl container mx-auto xl:px-24 px-4 py-16">
  <div class="text-center">
    <h2 class="text-4xl md:text-5xl md:leading-snug font-bold my-2">Riwayat Pembayaran</h2>
    <p class="text-red uppercase tracking-wide font-semibold text-lg">Terima Kasih Sudah Berlangganan</p>
  </div>
  <div class="flex flex-wrap justify-center gap-8 mt-12 ">
    <div class="overflow-x-auto h-96">
      <table class="table">
        <!-- head -->
        <thead>
          <tr>
            <th>Kode Pembayaran</th>
            <th>Paket</th>
            <th>Metode Pembayaran</th>
            <th>Harga</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        function rupiah($angka){
            $hasil = "Rp." . number_format($angka,2,',','.');
            return $hasil;
        }
        foreach ($pembayaran as $p) : ?>
          <tr>
            <th><?= $p['id'] ?></th>
            <td><?= $p['durasi'] ?></td>
            <td><?= $p['metode_bayar'] ?></td>
            <td><?= rupiah($p['jml_bayar']); ?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>