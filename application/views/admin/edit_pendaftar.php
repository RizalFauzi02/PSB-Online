<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> DETAIL PENDAFTARAN SISWA </h3>
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
                    <div class="card-body row g-3">
                        <form class="forms-sample row g-3" method="POST" action="<?= base_url('admin/editProses'); ?>">
                            <?php foreach ($edit as $det) : ?>
                                <div class="alert alert-primary col-12">
                                    <strong>Data Calon Siswa</strong>
                                </div>
                                <input type="hidden" name="id_pendaftaran" value="<?= $det->id_pendaftaran; ?>">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_siswa" class="form-control" id="name" value="<?= $det->nama_siswa; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="panggil" class="form-label">Nama Panggilan</label>
                                    <input type="text" name="nama_panggil" class="form-control" id="panggil" value="<?= $det->nama_panggil; ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control" id="lahir" value="<?= $det->tempat_lahir; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="date">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" id="date" value="<?= $det->tanggal_lahir; ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="jk">Jenis Kelamin</label>
                                    <input type="text" name="jk" class="form-control" id="jk" value="<?= $det->jk; ?>">

                                </div>
                                <div class="col-md-6">
                                    <label for="agama">Agama</label>
                                    <input type="text" name="agama_siswa" class="form-control" id="agama" value="<?= $det->agama_siswa; ?>">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" name="alamat_siswa" id="alamat" rows="4"><?= $det->alamat_siswa; ?></textarea>
                                </div>

                                <!-- ORANG TUA -->
                                <div class="alert alert-primary col-12">
                                    <strong>Data Orang Tua / Wali</strong>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="nameortu" class="form-label">Nama Orang tua / Wali</label>
                                    <input type="text" name="nama_orangtua" class="form-control" id="nameortu" value="<?= $det->nama_orangtua; ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="pekerjaan" class="form-label">Pekerjaan Orang Tua / Wali</label>
                                    <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="<?= $det->pekerjaan; ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="agama" class="form-label">Agama Orang Tua / Wali</label>
                                    <input type="text" name="agama_orangtua" class="form-control" id="agama" value="<?= $det->agama_orangtua; ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="telp" class="form-label">No. Telp Orang Tua / Wali</label>
                                    <input type="number" name="telp" class="form-control" id="lahir" value="<?= $det->telp; ?>">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="inputEmail4" class="form-label">Alamat Orang Tua / Wali</label>
                                    <textarea class="form-control" name="alamat_orangtua" id="alamat" rows="4"><?= $det->alamat_orangtua; ?></textarea>
                                </div>
                            <?php endforeach; ?>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <!-- partial -->