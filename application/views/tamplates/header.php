<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PSB Online</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('assets-app/'); ?>assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets-app/'); ?>assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="<?= base_url('assets-app/'); ?>assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?= base_url('assets-app/'); ?>assets/images/logoo.png" />
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url('app-assets/'); ?>assets/vendors/sweetalert2/dist/notiflix-2.6.0.min.css">
  <script src="<?= base_url('app-assets/'); ?>assets/vendors/sweetalert2/dist/notiflix-2.6.0.min.js"></script>
  <script src="<?= base_url('app-assets/'); ?>assets/vendors/sweetalert2/dist/sweetalert2.all.js"></script>
  <!-- SWEETALERT FIX -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="<?= base_url('assets-app/'); ?>assets/images/logo-lsp.png" alt="logo" /></a>
        <!-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?= base_url('assets-app/'); ?>assets/images/logo-mini.svg" alt="logo" /></a> -->
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <!-- <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button> -->
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="<?= base_url('auth/logout') ?>">
              <i class="mdi mdi-power"></i> Logout
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>