<div class="navbar-bg"></div>
  <nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
              collapse-btn"> <i data-feather="align-justify"></i></a></li>
        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
            <i data-feather="maximize"></i>
          </a></li>
      </ul>
    </div>
    <ul class="navbar-nav navbar-right">
      <div class="author-box-name mt-2">
        <a class="font-weight-bold text-capitalize" href="#"><?= $user['nama']; ?></a>
      </div>
      <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <img alt="image" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="user-img-radious-style"> 
        </a>
        <div class="dropdown-menu dropdown-menu-right pullDown">
          <div class="dropdown-title">Hello <?= $user['nama']; ?></div>
          <a href="<?= base_url('adminprofile'); ?>" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile
          <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
            Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>