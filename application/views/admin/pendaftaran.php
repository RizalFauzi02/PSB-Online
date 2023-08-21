<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> LIST DATA PENDAFTARAN CALON SISWA </h3>
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
                        <!-- <a href="<?= base_url('siswa/form') ?>" class="btn btn-gradient-primary btn-fw float-right mb-4">Pendaftaran</a><br> -->
                        <table class="table table-striped">
                            <thead>
                                <tr align="center">
                                    <th>#</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($daftar) == 0) : ?>
                                    <td colspan="7" class="text-center">Tidak ada data pendaftar</td>
                                <?php else : ?>
                                    <?php $no = 1;
                                    foreach ($daftar as $daft) : ?>
                                        <tr align="center">
                                            <td><?= $no++; ?></td>
                                            <td><?= $daft->nama_siswa; ?></td>
                                            <td><?= $daft->tempat_lahir; ?></td>
                                            <td><?= $daft->tanggal_lahir; ?></td>
                                            <td><?= $daft->jk; ?></td>
                                            <td>
                                                <?php if ($daft->status == 'Menunggu..') { ?>
                                                    <label class="badge badge-gradient-info"><?= $daft->status; ?></label>
                                                <?php } elseif ($daft->status == 'Diterima') { ?>
                                                    <label class="badge badge-gradient-success"><?= $daft->status; ?></label>
                                                <?php } elseif ($daft->status == 'Cadangan') { ?>
                                                    <label class="badge badge-gradient-dark"><?= $daft->status; ?></label>
                                                <?php } else { ?>
                                                    <label class="badge badge-gradient-danger"><?= $daft->status; ?></label>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('admin/detaildaftar/') . $daft->id_pendaftaran; ?>" style="text-decoration:none" class="btn btn-gradient-info btn-sm">
                                                    Detail
                                                </a>
                                                <a href="<?= base_url('admin/editPendaftar/') . $daft->id_pendaftaran; ?>" style="text-decoration:none" class="btn btn-gradient-success btn-sm">
                                                    Edit
                                                </a>
                                                <a href="<?= base_url('admin/delete_pendaftar/') . $daft->id_pendaftaran; ?>" style="text-decoration:none" class="btn btn-gradient-danger btn-sm hapus" onclick="return confirm('Data akan dihapus?')">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
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