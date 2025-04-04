      <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
              <div class="card author-box">
                <div class="card-body">
                  <div class="author-box-center">
                    <img alt="image" class="user-img-radius-style rounded-circle" style="width: 191px;" src="<?= base_url('assets/img/profile/' . $user['image']) ?>">
                  </div>
                  <div class="text-center">
                    <div class="author-box-description">
                    <a href="<?= base_url('adminprofile/update').$this->session->userdata('id_admin') ?>" class="btn btn-primary ">Update Profile</a>                       
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <h4>Profile</h4>
                  <a href="<?= base_url('dashboard') ?>" class="btn btn-info"> <i class="fa fa-backward"></i> Kembali</a>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>Name</label>
                      <input type="text" class="form-control" value="<?= $user['nama'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Email</label>
                      <input type="text" class="form-control" value="<?= $user['email'] ?>" readonly>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>Created</label>
                      <input type="tel" class="form-control" value="<?= date('d F Y', $user['tanggal_input']); ?>" readonly>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Phone Number</label>
                      <input type="tel" class="form-control" value="<?= $user['notelp'] ?>" readonly>
                    </div>
                  </div>                
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label>
                    <span class="control-label p-r-20">Mini Sidebar</span>
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
               
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
