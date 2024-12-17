<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/hotel-reservation-template/pages/template/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/hotel-reservation-template/koneksi.php');
?>
<section class="content">
    <div class="container-fluid">
        <!-- Alert -->
        <?php
        if (isset($_POST['simpan'])) {
            if (tambah_checkin($_POST) > 0) {
        ?>
                <div class="alert alert-success" role="alert">
                    Check-In data has been successfully saved!
                </div>

            <?php
            } else {
            ?>
                <div class="alert alert-danger" role="alert">
                    Failed to save check-In data!
                </div>
        <?php
            }
        }
        ?>
        <!-- #END# Alert -->

        <!-- Data Tables -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h1>Check-In Data</h1>
                        <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#tambahModal">
                            <i class="material-icons">library_add</i>
                            <span>Add Check-In Data</span>
                        </button>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Registration ID</th>
                                        <th>Guest ID</th>
                                        <th>Room ID</th>
                                        <th>Check-in Date</th>
                                        <th>Check-in Time</th>
                                        <th>Down Payment</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $checkins = query("SELECT * FROM `checkin`");
                                    foreach ($checkins as $check) : ?>
                                        <tr>
                                            <td><?= htmlspecialchars($no++); ?></td>
                                            <td><?= htmlspecialchars($check['id_reg'] ?? 'N/A') ?></td>
                                            <td><?= htmlspecialchars($check['id_tamu'] ?? 'N/A') ?></td>
                                            <td><?= htmlspecialchars($check['id_kamar'] ?? 'N/A') ?></td>
                                            <td><?= htmlspecialchars($check['tgl_checkin'] ?? 'N/A') ?></td>
                                            <td><?= htmlspecialchars($check['jam_checkin'] ?? 'N/A') ?></td>
                                            <td><?= htmlspecialchars($check['uang_muka'] ?? 'N/A') ?></td>
                                            <td><?= htmlspecialchars($check['status'] ?? 'N/A') ?></td>
                                            <td>
                                                <a href="edit-checkin.php?id=<?= htmlspecialchars($check['id_reg']) ?>"
                                                    class="btn btn-success waves-effect">Edit</a>
                                                <a href="javascript:void(0);"
                                                    onclick="if(confirm('Are you sure you want to delete this reservation?')) { window.location.href='delete_checkin.php?id=<?= htmlspecialchars($check['id_reg']) ?>'; }"
                                                    class="btn btn-danger waves-effect">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Registration ID</th>
                                        <th>Guest ID</th>
                                        <th>Room ID</th>
                                        <th>Check-in Date</th>
                                        <th>Check-in Time</th>
                                        <th>Down Payment</th>
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
        $query = mysqli_query($koneksi, "SELECT max(id_reg) as kodeTerbesar FROM `checkin`");
        $data = mysqli_fetch_array($query);
        $kodeCheckin = $data['kodeTerbesar'];
        $urutan = (int) substr($kodeCheckin, 3, 3);
        $urutan++;
        $huruf = 'cin';
        $kodeCheckin = $huruf . sprintf("%03s", $urutan);
        ?>
        <!-- #END# Automatic ID -->

        <!-- Modal -->
        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Check-In Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="id_reg" class="col-sm-3 col-form-label">Registration ID</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="id_reg" id="id_reg" value="<?= $kodeCheckin ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_tamu" class="col-sm-3 col-form-label">Guest ID</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="id_tamu" id="id_tamu">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_kamar" class="col-sm-3 col-form-label">Room ID</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="id_kamar" id="id_kamar">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgl_checkin" class="col-sm-3 col-form-label">Check-in Date</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="tgl_checkin" id="tgl_checkin">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jam_checkin" class="col-sm-3 col-form-label">Check-in Time</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="time" class="form-control" name="jam_checkin" id="jam_checkin">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="uang_muka" class="col-sm-3 col-form-label">Down Payment</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="uang_muka" id="uang_muka">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-8">
                                    <select class="custom-select" name="status" id="status">
                                        <option value="pending">Pending</option>
                                        <option value="confirmed">Confirmed</option>
                                        <option value="cancelled">Cancelled</option>
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