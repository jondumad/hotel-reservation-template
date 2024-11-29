<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/hotel-reservation-template/pages/template/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/hotel-reservation-template/koneksi.php');
?>
?>
<section class="content">
    <div class="container-fluid">
        <!-- Alert -->
        <?php
        // Jika ada tombol simpan
        if (isset($_POST['simpan'])) {
            if (tambah_user($_POST) > 0) {
        ?>
                <div class="alert alert-success" role="alert">
                    Data berhasil disimpan!
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-danger" role="alert">
                    Data gagal disimpan!
                </div>
            <?php
            }
        } else if (isset($_POST['ganti_password'])) {
            if (ganti_password($_POST) > 0) {
            ?>
                <div class="alert alert-success" role="alert">
                    Password berhasil diganti!
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-danger" role="alert">
                    Password gagal diganti!
                </div>
        <?php
            }
        }
        ?>
        <!-- #END# Alert -->
        <!-- #END# Alert -->

        <!-- Data Tables -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h1>Data User</h1>
                        <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#tambahModal">
                            <i class="material-icons">library_add</i>
                            <span>Tambah Data User</span>
                        </button>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>User Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $users = query("SELECT * FROM users");
                                    foreach ($users as $user) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $user['username'] ?></td>
                                            <td><?= $user['user_role'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-info waves-effect" data-toggle="modal" data-target="#gantiPassword" data-id="<?= $user['id_user'] ?>">
                                                    <span class="text">
                                                        Ubah Password
                                                    </span>
                                                </button>
                                                <a class="btn btn-success waves-effect" href="edit-user.php?id=<?= $user['id_user'] ?>">Ubah</a>
                                                <a onclick="return confirm('apakah anda yakin menghapus data ini')" class="btn btn-danger waves-effect" href="hapus-user.php?id=<?= $user['id_user'] ?>">Hapus</a>
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
        <!-- #END# Data Tables -->

        <!-- Automatic ID -->
        <?php
        $query = mysqli_query($koneksi, "SELECT max(id_user) as kodeTerbesar FROM users");
        $data = mysqli_fetch_array($query);
        $kodeuser = $data['kodeTerbesar'];
        $urutan = (int) substr($kodeuser, 3, 2);
        $urutan++;
        $huruf = "usr";
        $kodeuser = $huruf . sprintf("%02s", $urutan);
        ?>
        <!-- #END# Automatic ID -->

        <!-- Modal -->
        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" id="id_user" value="<?= $kodeuser ?>">
                            <div class="form-group row">
                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="username" id="username">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="password" id="password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user_role" class="col-sm-3 col-form-label">user_role</label>
                                <div class="col-sm-8">
                                    <select class="custom-select" name="user_role" id="user_role">
                                        <option value="Admin">Administator</option>
                                        <option value="Operator">Operator</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ganti Password -->
        <div class="modal fade" id="gantiPassword" tabindex="-1" aria-labelledby="gantiPasswordLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="">
                            <input type="text" name="id_user" id="id_user">
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Password Baru</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="password" id="password">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary" name="ganti_password">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Modal -->
    </div>
</section>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/hotel-reservation-template/pages/template/footer.php'); ?>