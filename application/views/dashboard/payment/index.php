      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header mt-2 mb-2">
                    <div class="col-md-2">
                      <h4><?= $title; ?></h4>
                    </div>
                  </div>
                  <?php if(validation_errors()){?>
                  <div class="alert alert-danger" role="alert">
                      <?= validation_errors();?>
                  </div>
                  <?php }?>
                  <div class="flash-data" title="Payment" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-id">
                        <thead>
                          <tr>
                            <th class="text-center">No</th>
                            <th>User</th>
                            <th>Paket</th>
                            <th>Status</th>
                            <th>Berakhir</th>
                            <th>Bukti</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($payment as $p): ?>
                        <?php if($p['status'] == 'Tertunda'): ?>
                          <tr>
                            <td class="text-center"><?= $i++ ?></td>
                            <td><?= $p['nama'] ?></td>
                            <td><?= $p['durasi'] ?></td>
                            <td><?= $p['status'] ?></td>
                            <td><?= $p['jtempo'] ?></td>
                            <td style="width: 50px; height: 50px;">
                              <picture>
                                <a href="#" data-toggle="modal" data-target="#exampleModal">
                                  <source srcset="" type="image/svg+xml">
                                  <img src="<?= base_url('assets/img/pembayaran/') . $p['bukti'];?>" class="img-fluid img-thumbnail" alt="...">
                                </a>
                              </picture>
                            </td>
                            <td>
                              <a href="<?= base_url('adminpayment/update/').$p['id'] ?>" class="btn btn-action bg-purple mr-1 tombol-edit" title="" data-original-title="Konfirmasi" data-toggle="tooltip" data-id="<?= $p['id']; ?>" >
                              <i class="fas fa-check"></i>
                              </a>
                              
                              <a href="<?= base_url('adminpayment/delete/').$p['id'] ?>" class="btn btn-danger btn-action mr-1 button-delete" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fas fa-trash"></i></a>
                            </td>
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
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true" style="display: none;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <img src="<?= base_url('assets/img/pembayaran/') . $p['bukti'];?>" class="img-fluid img-thumbnail" alt="no file">
              </div>
            </div>
          </div>
        </div>
