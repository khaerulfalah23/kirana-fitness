<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-user">
      <div class="sidebar-user-picture">
        <img alt="image" src="<?= base_url('assets/img/logo.jpg');?>">
      </div>
      <div class="sidebar-user-details">
        <div class="user-name">Kirana Fitness</div>
      </div>
    </div>
    <ul class="sidebar-menu">
      <?php if ($this->session->userdata('role_id') == 1) : ?>
        <li class="menu-header">Home</li>
        <li><a class="nav-link" href="<?= base_url('dashboard'); ?>"><i data-feather="monitor"></i><span>Dashboard</span></a></li>
        <li class="menu-header">Master Data</li>
        <li><a class="nav-link" href="<?= base_url('user'); ?>"><i data-feather="user"></i><span>User</span></a></li>
        <li><a class="nav-link" href="<?= base_url('member'); ?>"><i data-feather="user-check"></i><span>Member</span></a></li>
        <li><a class="nav-link" href="<?= base_url('paket'); ?>"><i data-feather="package"></i><span>Paket</span></a></li>
        <li class="menu-header">Transaksi</li>
        <li><a class="nav-link" href="<?= base_url('adminregistration'); ?>"><i data-feather="credit-card"></i><span>Pendaftaran</span></a></li>
        <li><a class="nav-link" href="<?= base_url('adminextension'); ?>"><i data-feather="database"></i><span>Perpanjangan</span></a></li>
        <li><a class="nav-link" href="<?= base_url('adminpayment'); ?>"><i data-feather="dollar-sign"></i><span>Pembayaran</span></a></li>
        <li class="menu-header">Report</li>
        <li><a class="nav-link" href="<?= base_url('adminmemberacceptance'); ?>"><i data-feather="file"></i><span>Penerimaan Member</span></a></li>
        <li><a class="nav-link" href="<?= base_url('adminpaymentreport'); ?>"><i data-feather="file"></i><span>Pembayaran</span></a></li>
        <li><a class="nav-link" href="<?= base_url('userdatareport'); ?>"><i data-feather="file"></i><span>User</span></a></li>
      <?php else :  ?>
        <li class="menu-header">Home</li>
        <li><a class="nav-link" href="<?= base_url('dashboard'); ?>"><i data-feather="monitor"></i><span>Dashboard</span></a></li>
        <li class="menu-header">Laporan</li>
        <li><a class="nav-link" href="<?= base_url('adminmemberacceptance'); ?>"><i data-feather="file"></i><span>Penerimaan Member</span></a></li>
      <?php endif; ?>
    </ul>
  </aside>
</div>