<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> LIST PENDAFTARAN </h3>
            <nav aria-label="breadcrumb">
                <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
                </ol> -->
            </nav>
        </div>

        <?php foreach ($daftar as $daft) : ?>
            <?php if ($daft->status == 'Menunggu..') : ?>
                <!-- UNTUK STATUS MENUNGGU INFORMASI KOSONG -->
            <?php elseif ($daft->status == 'Diterima') : ?>
                <div class="col stretch-card grid-margin">
                    <div class="card bg-gradient-success card-img-holder text-white">
                        <div class="card-body">
                            <!-- <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" /> -->
                            <h2 class="mb-2">SELAMAT ANDA DI TERIMA!!</h2>
                            <h4>Silahkan melakukan daftar ulang pada tanggal yang akan diinformasikan nanti..!</h4>
                        </div>
                    </div>
                </div>
            <?php elseif ($daft->status == 'Cadangan') : ?>
                <div class="col stretch-card grid-margin">
                    <div class="card bg-gradient-dark card-img-holder text-white">
                        <div class="card-body">
                            <!-- <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" /> -->
                            <h2 class="mb-2">ANDA DI CADANGAN!!</h2>
                            <h4>Jangan khawatir dan berputus asa, masih ada kesempatan anda untuk diterima..!</h4>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="col stretch-card grid-margin">
                    <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body">
                            <!-- <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" /> -->
                            <h2 class="mb-2">MOHON MAAF ANDA BELUM DITERIMA :((</h2>
                            <h4>Jangan berkecil hati dan berputus asa, silahkan terus mencoba di sekolah lain dan tetap semangaat!!</h4>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>


        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?= $this->session->flashdata('pesan'); ?>
                        <!-- <button type="button" class="btn btn-gradient-primary btn-fw float-right">Tambah User</button> -->
                        <?php if (count($daftar) == 1) { ?>
                            <!-- <a href="<?= base_url('siswa/form') ?>" class="btn btn-gradient-primary btn-fw float-right mb-4">Pendaftaran</a><br> -->
                        <?php } else { ?>
                            <a href="<?= base_url('siswa/form') ?>" class="btn btn-gradient-primary btn-fw float-right mb-4">Pendaftaran</a><br>
                        <?php } ?>

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
                                                <a href="<?= base_url('siswa/detail/' . $daft->id_pendaftaran) ?>" style="text-decoration:none">
                                                    <i class="mdi mdi-eye"></i>
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