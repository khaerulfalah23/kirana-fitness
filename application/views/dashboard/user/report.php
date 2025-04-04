      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header mt-2 mb-2">
                    <div class="col-md-3">
                      <h4><?= $title; ?></h4>
                    </div>
                  </div>
                  <?php if(validation_errors()){?>
                  <div class="alert alert-danger" role="alert">
                      <?= validation_errors();?>
                  </div>
                  <?php }?>
                  <div class="flash-data" title="User" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                <div class="col-lg-6 ml-3">
                  <a target="_blank" href="<?= base_url('userdatareport/print'); ?>" class="btn btn-primary"><i class="fas fa-print"></i> Print</a>
                  <a target="_blank" href="<?= base_url('userdatareport/pdf'); ?>" class="btn btn-warning"><i class="far fa-file-pdf"></i> Download Pdf</a>
                  <a target="_blank" href="<?= base_url('userdatareport/excel'); ?>" class="btn btn-success"><i class="far fa-file-excel"></i> Export ke Excel</a>
                </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-id">
                        
                        <thead>
                          <tr>
                            <th class="text-center">No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Gander</th>
                            <th>Phone Number</th>
                            <th>Created</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($users as $user): ?>
                        <?php if($user['role_id'] != 1 && $user['role_id'] != 4): ?>
                          <tr>
                            <td class="text-center"><?= $i++ ?></td>
                            <td><?= $user['nama'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['alamat'] ?></td>
                            <td><?= $user['jkel'] ?></td>
                            <td><?= $user['notelp'] ?></td>
                            <td><?= date('d F Y', $user['tanggal_input']); ?></td>
                          </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
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