<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/hotel-reservation-template/pages/template/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/hotel-reservation-template/function.php');
?>

<section class="content">
    <div class="container-fluid">
        <?php
        if (isset($_POST['simpan'])) {
            if (ubah_user($_POST) > 0) {
        ?>
                <div class="alert alert-success" role="alert">
                    Data berhasil diubah!
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-danger" role="alert">
                    Data gagal diubah!
                </div>
        <?php
            }
        }
        ?>
        <?php
        // Jika ada id_user di URL
        if (isset($_GET['id'])) {
            $id_user = $_GET['id'];
            // Ambil data user yang sesuai dengan id_user
            $data = query("SELECT * FROM users WHERE id_user = '$id_user'")[0];
        }
        ?>
        <div class="card shadow mb-4">
            <div class="modal-header">
                <h2 class="modal-title">Ubah Data User</h2>
            </div>
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" name="id_user" id="id_user" value="<?= $data['id_user'] ?>">
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">
                            <h5>Username</h5>
                        </label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" class="form-control" id="username" name="username" value="<?= $data['username'] ?>" style="margin-left: 10px;">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_role" class="col-sm-3 col-form-label">
                            <h5>User Role</h5>
                        </label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="user_role" id="user_role">
                                <option value="Admin" <?= $data['user_role'] == 'admin' ? 'selected' : ''; ?>>Administator</option>
                                <option value="Operator" <?= $data['user_role'] == 'operator' ? 'selected' : ''; ?>>Operator</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" data-dismiss="modal" href="user.php" style="color: black;">Kembali</a>
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/hotel-reservation-template/pages/template/footer.php'); ?>