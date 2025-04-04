      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-lg-9 m-auto">
                <div class="card">
                  <div class="card-header">
                    <h4><?= $title; ?></h4>
                  </div>
                  <div class="card-body">
                  <form class="" method="post" action="<?= base_url('user/update/' . $userData['id']) ?>" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Name</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-user"></i>
                        </div>
                      </div>
                      <input type="hidden" name="id" value="<?= $userData['id']; ?>">
                      <input value="<?= $userData['nama']; ?>" type="text" class="form-control" placeholder="Name" name="name" autocomplete="off" >
                    </div>
                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-envelope"></i>
                        </div>
                      </div>
                      <input value="<?= $userData['email']; ?>" type="text" class="form-control" placeholder="Email" name="email" autocomplete="off" readonly>
                    </div>
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-home"></i>
                        </div>
                      </div>
                      <input value="<?= $userData['alamat']; ?>" type="text" class="form-control" placeholder="Address" name="address" autocomplete="off" >
                    </div>
                    <?= form_error('address', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-phone"></i>
                        </div>
                      </div>
                      <input value="<?= $userData['notelp']; ?>" type="text" class="form-control" placeholder="Phone Number" name="notelp" autocomplete="off" >
                    </div>
                    <?= form_error('notelp', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-file"></i>
                      </div>
                      <input type="file" class="form-control form-control-user" id="image" name="image">
                    </div>
                  </div>
                  <div class="footer-button">
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect float-right">Update</button>
                    <a href="<?= base_url('user') ?>">
                      <button type="button" class="btn btn-danger m-t-15 waves-effect float-right mr-2">Back</button>
                    </a>
                  </div>
                </form>
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
        