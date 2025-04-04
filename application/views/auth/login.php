<div id="app">
  <section class="section" style="min-height: 100vh; display: flex; align-items: center;">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="card card-primary">
            <div class="card-header">
              <h4>Login</h4>
            </div>
            <div class="card-body">
            <?= $this->session->flashdata('pesan'); ?>
              <form class="user" method="post" action="<?= base_url('auth'); ?>">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" type="text" class="form-control" name="email" value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input id="password" type="password" class="form-control" name="password" value="<?= set_value('password'); ?>">
                  <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                  </button>
                </div>
              </form>
              <div class="mb-3 text-muted text-center">
                Don't have an account? <a href="<?= base_url('auth/register'); ?>">Create One</a>
              </div>
              <div class="mb-3 text-muted text-center">
                <a href="<?= base_url(); ?>">Back to Home</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>