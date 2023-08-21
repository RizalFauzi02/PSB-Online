      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
          <!-- partial:partials/_sidebar.html -->
          <nav class="sidebar sidebar-offcanvas" id="sidebar">
              <ul class="nav">
                  <li class="nav-item nav-profile">
                      <a href="#" class="nav-link">
                          <div class="nav-profile-image">
                              <img src="<?= base_url('assets-app/') ?>assets/images/user.png" alt="profile">
                              <span class="login-status online"></span>
                              <!--change to offline or busy as needed-->
                          </div>
                          <div class="nav-profile-text d-flex flex-column">
                              <span class="font-weight-bold mb-2"><?= $users['namalengkap']; ?></span>
                              <?php if ($users['akses'] == 1) : ?>
                                  <span class="text-secondary text-small">ADMIN</span>
                              <?php elseif ($users['akses'] == 2) : ?>
                                  <span class="text-secondary text-small">SISWA</span>
                              <?php endif; ?>
                          </div>
                          <!-- <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i> -->
                      </a>
                  </li>
                  <?php if ($users['akses'] == 1) : ?>
                      <!-- MENU ADMIN -->

                      <li class="nav-item <?= $menu_view_admin['pengguna']; ?>">
                          <a class="nav-link" href="<?= base_url('admin/index') ?>">
                              <span class="menu-title">Pengguna</span>
                              <i class="mdi mdi-account menu-icon"></i>
                          </a>
                      </li>

                      <li class="nav-item <?= $menu_view_admin['daftar']; ?>">
                          <a class="nav-link" href="<?= base_url('admin/pendaftaran') ?>">
                              <span class="menu-title">Data Pendaftaran</span>
                              <i class="mdi mdi-account menu-icon"></i>
                          </a>
                      </li>

                  <?php elseif ($users['akses'] == 2) : ?>
                      <!-- MENU SISWA -->

                      <li class="nav-item <?= $menu_view['req']; ?>">
                          <a class="nav-link" href="<?= base_url('siswa/index') ?>">
                              <span class="menu-title">Pendaftaran</span>
                              <i class="mdi mdi-account menu-icon"></i>
                          </a>
                      </li>
                  <?php endif; ?>


                  <li class="nav-item ">
                      <!-- ["users"]=> string(6) "active" } -->
                      <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                          <span class="menu-title">Logout</span>
                          <i class="mdi mdi-sign-out menu-icon"></i>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- partial -->