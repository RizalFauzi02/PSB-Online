<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> EDIT PENGGUNA </h3>
            <nav aria-label="breadcrumb">
                <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
                </ol> -->
            </nav>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?= $this->session->flashdata('pesan'); ?>
                        <form class="forms-sample row g-3" method="POST" action="<?= base_url('Admin/data'); ?>">
                            <?php foreach ($edit as $det) : ?>
                                <div class=" col-md-6">
                                    <input type="hidden" name="id_users" value="<?= $det->id_users ?>">
                                    <label for="panggil" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="panggil" value="<?= $det->username; ?>" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nama Pengguna</label>
                                    <input type="text" name="namalengkap" class="form-control" id="name" value="<?= $det->namalengkap; ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lahir">Akses</label>
                                    <select name="akses" id="" class="form-control">
                                        <?php if ($det->akses == 1) { ?>
                                            <option value="<?= $det->akses; ?>"> <?php if ($det->akses == 1) {
                                                                                        echo "Admin";
                                                                                    } else {
                                                                                        echo "Siswa";
                                                                                    } ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $det->akses; ?>"> <?php if ($det->akses == 1) {
                                                                                        echo "Admin";
                                                                                    } else {
                                                                                        echo "Siswa";
                                                                                    } ?></option>
                                            <option value="1">Admin</option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-gradient-primary mr-2">Ubah</button>
                                    <a href="<?= base_url('Admin'); ?>" class="btn btn-light float-right">Kembali</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="<?= base_url('Admin/changepassword') ?>">
                            <input type="hidden" name="id_users" value="<?= $det->id_users ?>">
                        <?php endforeach; ?>
                        <?php if ($edit[0]->akses == 1) { ?>
                            <p style="color: red;">*anda tidak bisa mengubah password.</p>
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password Lama</label>
                                <div class="col-sm-9">
                                    <input type="password" name="currentpassword" class="form-control" id="exampleInputPassword2" placeholder="Password Lama" disabled required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Password Baru</label>
                                <div class="col-sm-9">
                                    <input type="password" name="newpassword" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password Baru" disabled required>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password Lama</label>
                                <div class="col-sm-9">
                                    <input type="password" name="currentpassword" class="form-control" id="exampleInputPassword2" placeholder="Password Lama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Password Baru</label>
                                <div class="col-sm-9">
                                    <input type="password" name="newpassword" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password Baru">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Ubah Password</button>
                        <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <!-- partial -->