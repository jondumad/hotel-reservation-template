<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/hotel-reservation-template/pages/template/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/hotel-reservation-template/koneksi.php');
?>
<section class="content">
    <div class="container-fluid">
        <!-- Alert -->
        <?php
        if (isset($_POST['simpan'])) {
            try {
                $result = tambah_checkin($_POST);

                if ($result > 0) {
                    echo '<div class="alert alert-success" role="alert">
                    Guest data has been successfully saved!
                    </div>';
                } else {
                    throw new Exception("The operation returned a failure. Please verify your input and try again.");
                }
            } catch (Exception $e) {
                $errorMessage = $e->getMessage();

                // Additional database error reporting
                if (isset($koneksi) && mysqli_error($koneksi)) {
                    $dbError = mysqli_error($koneksi);
                    $errorMessage .= " Database error: $dbError";
                }

                echo '<div class="alert alert-danger" role="alert">
                Failed to save guest data. Error details: ' . htmlspecialchars($errorMessage) . '
                </div>';
            }
        }
        ?>
        <!-- #END# Alert -->

        <!-- Data Tables -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h1>Guest Data</h1>
                        <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#tambahModal">
                            <i class="material-icons">library_add</i>
                            <span>Add Guest Data</span>
                        </button>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Guest ID</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $guests = query("SELECT * FROM `ident_tamu`");
                                    foreach ($guests as $guest) : ?>
                                        <tr>
                                            <td><?= htmlspecialchars($no++); ?></td>
                                            <td><?= htmlspecialchars($guest['id_tamu'] ?? 'N/A') ?></td>
                                            <td><?= htmlspecialchars($guest['nama'] ?? 'N/A') ?></td>
                                            <td><?= htmlspecialchars($guest['alamat'] ?? 'N/A') ?></td>
                                            <td><?= htmlspecialchars($guest['no_hp'] ?? 'N/A') ?></td>
                                            <td><?= htmlspecialchars($guest['email'] ?? 'N/A') ?></td>
                                            <td><?= htmlspecialchars($guest['status'] ?? 'N/A') ?></td>
                                            <td>
                                                <a href="edit-guest.php?id=<?= htmlspecialchars($guest['id_tamu']) ?>" class="btn btn-success waves-effect">Edit</a>
                                                <a href="javascript:void(0);"
                                                    onclick="if(confirm('Are you sure you want to delete this guest?')) { window.location.href='delete_guest.php?id=<?= htmlspecialchars($guest['id_tamu']) ?>'; }"
                                                    class="btn btn-danger waves-effect">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Guest ID</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Data Tables -->

        <!-- Automatic ID -->
        <?php
        $query = mysqli_query($koneksi, "SELECT max(id_tamu) as kodeTerbesar FROM `guests`");
        $data = mysqli_fetch_array($query);
        $kodeTamu = $data['kodeTerbesar'];
        $urutan = (int) substr($kodeTamu, 3, 3);
        $urutan++;
        $huruf = 'gue';
        $kodeTamu = $huruf . sprintf("%03s", $urutan);
        ?>
        <!-- #END# Automatic ID -->

        <!-- Modal -->
        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Guest Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="form-group row align-items-center">
                                    <label for="id_tamu" class="col-sm-3 col-form-label">Guest ID</label>
                                    <div class="col-sm-8">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="id_tamu" id="id_tamu" value="<?= $kodeTamu ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama" id="nama">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="alamat" id="alamat">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_hp" class="col-sm-3 col-form-label">Phone Number</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="no_hp" id="no_hp">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" id="email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-8">
                                    <select class="custom-select" name="status" id="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="simpan">Save</button>
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
