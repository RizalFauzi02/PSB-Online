<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> DETAIL PENGGUNA </h3>
            <nav aria-label="breadcrumb">
                <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
                </ol> -->
            </nav>
        </div>
        <div class="row">
            <div class="col-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body row g-3">
                        <?php foreach ($detail as $det) : ?>
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nama Pengguna</label>
                                <input type="text" name="nama_siswa" class="form-control" id="name" value="<?= $det->namalengkap; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="panggil" class="form-label">Username</label>
                                <input type="text" name="nama_panggil" class="form-control" id="panggil" value="<?= $det->username; ?>" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lahir">Akses</label>
                                <input type="text" name="tempat_lahir" class="form-control" id="lahir" value="<?php if ($det->akses == 1) {
                                                                                                                    echo "Admin";
                                                                                                                } else {
                                                                                                                    echo "Siswa";
                                                                                                                } ?>" disabled>
                            </div>
                        <?php endforeach; ?>

                        <div class="col-12">
                            <a href="<?= base_url('Admin'); ?>" class="btn btn-light float-right">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <!-- partial -->