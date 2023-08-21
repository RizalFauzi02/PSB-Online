    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="brand-logo">
                  <center><img src="<?= base_url('assets-app/'); ?>assets/images/logo-lsp.png"></center>
                </div>
                <hr>
                <h2 class="text-center">LOGIN</h2>
                <form class="pt-3" action="<?= base_url('auth/prosessLogin'); ?>" method="POST">
                  <p>*silahkan login jika sudah melakukan pendaftaran.</p>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Username" name="username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg" type="submit">LOGIN</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"><a href="<?= base_url('/') ?>" class="text-primary">Pendaftaran</a>
                  </div>
                </form>
                <hr>
                <p>*silahkan unduh manual book untuk mendapatkan akses login.</p>
                <div class="text-center mt-4 font-weight-light"><a href="./manualBook.pdf">Unduh File Manual Book</a></div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>