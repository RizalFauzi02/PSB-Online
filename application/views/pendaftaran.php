<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="col-lg-8 mx-auto">
                <div class="page-header">
                    <h3 class="page-title"> <a href="<?= base_url('auth') ?>" class="text-primary">Login</a></h2>
                        <nav aria-label="breadcrumb">
                            <!-- <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
                        </ol> -->
                        </nav>
                </div>
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <?= $this->session->flashdata('pesan'); ?>
                                <h2 class="mb-3 text-center">PENDAFTARAN CALON SISWA</h2>
                                <form class="forms-sample row g-3" method="POST" action="<?= base_url('Pendaftaran/prosesDaftar'); ?>">
                                    <div class="alert alert-primary col-12">
                                        <strong>Data Calon Siswa</strong>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input type="text" name="nama_siswa" class="form-control" id="name" placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="panggil" class="form-label">Nama Panggilan</label>
                                        <input type="text" name="nama_panggil" class="form-control" id="panggil" placeholder="Nama Panggilan" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lahir">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" class="form-control" id="lahir" placeholder="Tempat Lahir" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" class="form-control" id="date" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="jk">Jenis Kelamin</label>
                                        <select class="form-control" id="jk" name="jk" required>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="agama">Agama</label>
                                        <input type="text" name="agama_siswa" class="form-control" id="agama" placeholder="Agama" required>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" name="alamat_siswa" id="alamat" rows="4" required></textarea>
                                    </div>

                                    <!-- ORANG TUA -->
                                    <div class="alert alert-primary col-12">
                                        <strong>Data Orang Tua / Wali</strong>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="nameortu" class="form-label">Nama Orang tua / Wali</label>
                                        <input type="text" name="nama_orangtua" class="form-control" id="nameortu" placeholder="Nama" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="pekerjaan" class="form-label">Pekerjaan Orang Tua / Wali</label>
                                        <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Pekerjaan" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="agama" class="form-label">Agama Orang Tua / Wali</label>
                                        <input type="text" name="agama_orangtua" class="form-control" id="agama" placeholder="Agama" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="telp" class="form-label">No. Telp Orang Tua / Wali</label>
                                        <input type="number" oninput="this.value=this.value.slice(0,this.maxLength)" class="form-control" name="telp" min="0" maxlength="14" placeholder="No Telpon / Hp" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="inputEmail4" class="form-label">Alamat Orang Tua / Wali</label>
                                        <textarea class="form-control" name="alamat_orangtua" id="exampleTextarea1" rows="4" required></textarea>
                                    </div>

                                    <!-- AKUN -->
                                    <div class="alert alert-primary col-12">
                                        <strong>Akun</strong>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?= set_value('username'); ?>" required>
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password1" class="form-label">Password</label>
                                        <input type="password" name="password1" class="form-control" id="password1" placeholder="Password" required>
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password2" class="form-label">Ulangi Password</label>
                                        <input type="password" name="password2" class="form-control" id="password2" placeholder="Ulangi Password" required>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-gradient-primary mr-2">Daftar</button>
                                        <button type="reset" class="btn btn-gradient-danger mr-2 float-right">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?= base_url('assets-app/'); ?>assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?= base_url('assets-app/'); ?>assets/js/off-canvas.js"></script>
<script src="<?= base_url('assets-app/'); ?>assets/js/hoverable-collapse.js"></script>
<script src="<?= base_url('assets-app/'); ?>assets/js/misc.js"></script>
<!-- endinject -->
</body>
<footer class="footer">
    <div class="container-fluid clearfix">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © RIZAL FAUZI <?php echo date('Y') ?></span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">RIZAL FAUZI</span>
    </div>
</footer>

</html>