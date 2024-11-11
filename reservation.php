<?php
include_once('header.php');
include_once('koneksi.php');
?>
<section class="content">
    <div class="container-fluid">
        <!-- Alert -->
        <?php
        if (isset($_POST['simpan'])) {
            if (tambah_reservasi($_POST) > 0) {
        ?>
                <div class="alert alert-success" role="alert">
                    Reservation data has been successfully saved!
                </div>

            <?php
            } else {
            ?>
                <div class="alert alert-danger" role="alert">
                    Failed to save reservation data!
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
                        <h1>Reservation Data</h1>
                        <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#tambahModal">
                            <i class="material-icons">library_add</i>
                            <span>Add Reservation Data</span>
                        </button>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Reservation ID</th>
                                        <th>Room ID</th>
                                        <th>Guest ID</th>
                                        <th>Reservation Date</th>
                                        <th>Reservation Time</th>
                                        <th>Check-in Date</th>
                                        <th>Check-out Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                $no = 1;
                                $reservations = query("SELECT * FROM `reservations`");
                                foreach ($reservations as $reservation) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $reservation['id_reservasi'] ?></td>
                                        <td><?= $reservation['id_kamar'] ?></td>
                                        <td><?= $reservation['id_tamu'] ?></td>
                                        <td><?= $reservation['tgl_reservasi'] ?></td>
                                        <td><?= $reservation['jam_reservasi'] ?></td>
                                        <td><?= $reservation['tgl_checkin'] ?></td>
                                        <td><?= $reservation['tgl_checkout'] ?></td>
                                        <td><?= $reservation['status'] ?></td>
                                        <td>
                                            <a href="edit-reservation.php?id_reservasi=<?= $reservation['id_reservasi'] ?>" class="btn btn-success waves-effect">Edit</a>
                                            <a onclick="confirm('Are you sure?')" class="btn btn-danger waves-effect" href="delete_reservation.php?id_reservasi=<?= $reservation['id_reservasi'] ?>">Delete</a>
                                        </td>
                                    </tr>   
                                <?php endforeach; ?>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Reservation ID</th>
                                        <th>Room ID</th>
                                        <th>Guest ID</th>
                                        <th>Reservation Date</th>
                                        <th>Reservation Time</th>
                                        <th>Check-in Date</th>
                                        <th>Check-out Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>

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
        $query = mysqli_query($koneksi, "SELECT max(id_reservasi) as kodeTerbesar FROM `reservations`");
        $data = mysqli_fetch_array($query);
        $kodeReservasi = $data['kodeTerbesar'];
        $urutan = (int) substr($kodeReservasi, 3, 3);
        $urutan++;
        $huruf = 'res';
        $kodeReservasi = $huruf . sprintf("%03s", $urutan);
        ?>
        <!-- #END# Automatic ID -->

        <!-- Modal -->
        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Reservation Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="form-group row align-items-center">
                                    <label for="id_reservasi" class="col-sm-3 col-form-label">Reservation ID</label>
                                    <div class="col-sm-8">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="id_reservasi" id="id_reservasi" value="<?= $kodeReservasi ?>">
                                        </div>
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
                                <label for="id_tamu" class="col-sm-3 col-form-label">Guest ID</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="id_tamu" id="id_tamu">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgl_reservasi" class="col-sm-3 col-form-label">Reservation Date</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="tgl_reservasi" id="tgl_reservasi">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jam_reservasi" class="col-sm-3 col-form-label">Reservation Time</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="time" class="form-control" name="jam_reservasi" id="jam_reservasi">
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
                                <label for="tgl_checkout" class="col-sm-3 col-form-label">Check-out Date</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="tgl_checkout" id="tgl_checkout">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-8">
                                    <select class="custom-select" name="status" id="status">
                                        <option value="cancelled">Cancelled</option>
                                        <option value="pending">Pending</option>
                                        <option value="confirmed">Confirmed</option>
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

<?php include_once('footer.php'); ?>