<section class="max-w-screen-2xl container mx-auto px-3 xl:px-24">
  <div class="flex flex-col md:flex-row-reverse items-center justify-between gap-8">
    <img src="<?= base_url('assets/img/hero/hero.png') ?>" class="w-full md:w-1/2" alt="hero">
    <div class="md:w-1/2 px-4 md:px-2 lg:px-0 space-y-4 md:space-y-7">
      <h2 class="lg:text-5xl md:text-4xl text-3xl font-bold md:leading-normal leading-tight">
        Tetap Sehat Bersama Kirana Fitness
      </h2>
      <p class="text-[#4A4A4A] text-lg">
      Berlatihlah bersama kami, menjadi lebih bugar <br> lebih kuat dan lebih percaya diri.
      </p>
      <a href="#paket" class="bg-[#FF90BC] font-semibold btn text-white px-8 py-3 rounded-full" >
        Bergabung
      </a>
    </div>
  </div>
</section>

<div class="max-w-screen-2xl container mx-auto xl:px-24 px-4 my-16" id="testimoni">
  <div class="flex flex-col md:flex-row items-center justify-between gap-12">
    <div class="md:w-1/2">
      <img src="<?= base_url('assets/img/testimonial/testimonial.svg'); ?>" alt="">
    </div>
    <div class="md:w-1/2">
      <div class="text-left md:w-4/5">
        <p class="text-[#FF90BC] uppercase tracking-wide font-semibold text-lg">Testimoni</p>
        <h2 class="text-4xl md:text-5xl md:leading-snug font-bold my-2">Apa Kata Pelanggan Kami Tentang Kami</h2>
        <blockquote class="my-5 text-[#4A4A4A] text-lg leading-[30px]">
          “Saya suka berlangganan gym di Kirana fitness, dan sampai sekarang saya masih berlangganan! karena pelayanan yang ditawarkan dan layanan sempurna”
        </blockquote>
      </div>
    </div>
  </div>
</div>

<div class="max-w-screen-2xl container mx-auto xl:px-24 px-4 py-16">
  <?php if(validation_errors()){?>
    <div class="alert alert-danger" role="alert">
        <?= validation_errors();?>
    </div>
  <?php }?>
  <div class="flash-data" title="Success" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
  <div class="text-center" id="paket">
    <p class="text-[#FF90BC] uppercase tracking-wide font-semibold text-lg">Pilih Paket Sesuai Kebutuhanmu</p>
    <h2 class="text-4xl md:text-5xl md:leading-snug font-bold my-2">Kategori Paket</h2>
  </div>
  <div class="flex flex-wrap justify-center gap-8 mt-12 ">
  <?php 
    function rupiah($angka){
        $hasil = number_format($angka,2,',','.');
        return $hasil;
    }
    foreach ($paket as $p) : ?>
    <div class="card w-80 bg-base-100 shadow-xl">
      <div class="card-body">
        <h2 class="card-title font-bold text-[#FF90BC] text-3xl"><?= $p['durasi']; ?></h2>
        <p class="pb-2 font-semibold text-lg">Rp <span class="font-bold"><?= rupiah($p['harga']); ?></span></p>
        <hr>
        <div class="my-10">
          <div class="flex gap-3">
            <img class="mt-1 w-6 h-6" src="<?= base_url('assets/img/check.svg') ?>" alt="check">
            <p><span class="font-bold">Akses tak terbatas</span> ke seluruh Kirana Fitness di Indonesia</p>
          </div>
          <div class="flex align-center gap-3 py-5">
            <img class="w-6 h-6" src="<?= base_url('assets/img/check.svg') ?>" alt="check">
            <p><span class="font-bold">Gratis Kelas</span> Setiap Harinya</p>
          </div>
          <div class="flex align-center gap-3">
            <img class="w-6 h-6" src="<?= base_url('assets/img/check.svg') ?>" alt="check">
            <p class="pb-2"><span class="font-bold">Gratis <?= $p['sesi']; ?> Sesi</span> Personal Training</p>
          </div>
        </div>
        <hr>
        <?php if ($user) : ?>
          <?php if ($this->db->get_where('kartu_anggota',['id_user' => $user['id']])->row_array()) : ?>
            <a href="<?= base_url('userperpanjangan/index/'.$p['id']); ?>" class="mt-4 btn bg-[#FF90BC] text-white hover:bg-[#FAF3F0] hover:text-black" >Perpanjang</a>
          <?php else : ?>
            <a href="<?= base_url('userpendaftaran/index/'.$p['id']); ?>" class="mt-4 btn bg-[#FF90BC] text-white hover:bg-[#FAF3F0] hover:text-black" >Bergabung</a>
          <?php endif; ?>
        <?php else : ?>
          <a href="<?= base_url('auth'); ?>" class="mt-4 btn bg-[#FF90BC] text-white hover:bg-[#FAF3F0] hover:text-black" >Bergabung</a>
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>
  </div>
</div>

<div class="max-w-screen-2xl container mx-auto xl:px-24 px-4 my-16" id="layanan">
  <div class="flex flex-col md:flex-row items-center justify-between gap-12">
    <div class="md:w-1/2">
      <div class="text-left md:w-4/5">
        <h2 class="text-4xl md:text-5xl md:leading-snug font-bold my-2">Layanan kami</h2>
        <p class="my-5 text-lg text-[#4A4A4A] leading-[30px]">
          Berakar pada semangat, kami memberikan pengalaman berlangganan gym yang tak terlupakan dan menawarkan layanan yang luar biasa.
        </p>
        <a href="#paket" class="bg-[#FF90BC] font-semibold btn text-white px-8 py-3 rounded-full" >
          Bergabung
        </a>
      </div>
    </div>
    <div class="md:w-1/2">
      <div class="flex flex-wrap justify-center gap-8 items-center">
      <div class="shadow-md md:w-[250px] w-[220px] rounded-[30px] py-5 px-4 text-center space-y-2 text-green cursor-pointer hover:border hover:border-[#FF90BC] transition-all duration-200">
        <img src="<?= base_url('assets/img/service/icon1.svg'); ?>" class="mx-auto w-[64px] h-[64px]" alt="icon our services">
        <h5 class="pt-3 font-semibold text-[#FF90BC]"> Aman</h5>
        <p class="text-[#FF90BC]">Kami menjamin keamanan transaksi anda</p>
      </div>
      <div class="shadow-md md:w-[250px] w-[220px] rounded-[30px] py-5 px-4 text-center space-y-2 text-green cursor-pointer hover:border hover:border-[#FF90BC] transition-all duration-200">
        <img src="<?= base_url('assets/img/service/icon3.svg'); ?>" class="mx-auto w-[64px] h-[64px]" alt="icon our services">
        <h5 class="pt-3 font-semibold text-[#FF90BC]"> Hadiah</h5>
        <p class="text-[#FF90BC]">Anda bisa mendapatkan hadiah menarik dari kami</p>
      </div>
      <div class="shadow-md md:w-[250px] w-[220px] rounded-[30px] py-5 px-4 text-center space-y-2 text-green cursor-pointer hover:border hover:border-[#FF90BC] transition-all duration-200">
        <img src="<?= base_url('assets/img/service/icon2.svg'); ?>" class="mx-auto w-[64px] h-[64px]" alt="icon our services">
        <h5 class="pt-3 font-semibold text-[#FF90BC]"> Cepat</h5>
        <p class="text-[#FF90BC]">Kami melayani anda dengan cepat dan terpercaya</p>
      </div>
      </div>
    </div>
  </div>
</div>