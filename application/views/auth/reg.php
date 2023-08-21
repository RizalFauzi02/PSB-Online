    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-5 mx-auto">
              <div class="auth-form-light text-left p-5">
                <!-- <div class="brand-logo">
                  <img src="<?= base_url('assets-app/'); ?>assets/images/logo.svg">
                </div> -->
                <h2 class="text-center">Daftar Akun</h2>
                <?= $this->session->flashdata('pesan'); ?>

                <form class="pt-3" method="POST" action="<?= base_url('auth/prosesReg'); ?>">
                  <div class="form-group">
                    <input type="text" name="namalengkap" class="form-control form-control-lg" placeholder="Nama Lengkap" value="<?= set_value('namalengkap'); ?>">
                    <?= form_error('namalengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="form-group row">
                    <!-- <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password"> -->
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="password" class="form-control form-control-lg" id="password1" name="password1" placeholder="Password" required>
                    </div>
                    <div class="col-sm-6">
                      <input type="password" class="form-control form-control-lg" id="password2" name="password2" placeholder="Ulangi Password" required>
                    </div>
                    <div class="col-sm-10">
                      <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="mt-3">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit">DAFTAR</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Sudah punya akun? <a href="<?= base_url('auth') ?>" class="text-primary">Login</a>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>