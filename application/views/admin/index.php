<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> LIST PENGGUNA </h3>
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
                        <!-- <button type="button" class="btn btn-gradient-primary btn-fw float-right">Tambah User</button> -->
                        <!-- <a href="<?= base_url('admin/form') ?>" class="btn btn-gradient-primary btn-fw float-right">Tambah Users</a><br> -->
                        <table class="table table-striped">
                            <thead>
                                <tr align="center">
                                    <th>#</th>
                                    <th>Nama Pengguna</th>
                                    <th>Username</th>
                                    <th>Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pengguna as $peng) : ?>
                                    <tr align="center">
                                        <td><?= $no++; ?></td>
                                        <td><?= $peng->namalengkap; ?></td>
                                        <td><?= $peng->username; ?></td>
                                        <td>
                                            <?php if ($peng->akses == 1) {
                                                echo "Admin";
                                            } else {
                                                echo "Siswa";
                                            } ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/detail/') . $peng->id_users; ?>" style="text-decoration:none" class="btn btn-gradient-info btn-sm">
                                                Detail
                                            </a>
                                            <a href="<?= base_url('admin/edit/') . $peng->id_users; ?>" style="text-decoration:none" class="btn btn-gradient-success btn-sm">
                                                Edit
                                            </a>
                                            <?php if ($peng->username == $this->session->userdata('username')) : ?>
                                                <button class="btn btn-gradient-secondary btn-sm">You</button>
                                            <?php else : ?>
                                                <a href="<?= base_url('admin/delete_admin/') . $peng->id_users; ?>" style="text-decoration:none" class="btn btn-gradient-danger btn-sm hapus" onclick="return confirm('Data akan dihapus?')">
                                                    Delete
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <!-- partial -->