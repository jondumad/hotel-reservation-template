<?php
include_once('header.php');
include_once('koneksi.php');
?>

<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Reservation Table
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No. Reservasi</th>
                                        <th>No. Kamar</th>
                                        <th>No. Tamu</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Jam Pesan</th>
                                        <th>Tanggal Check-In</th>
                                        <th>Tanggal Check-Out</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tr>
                                    <?php
                                    $no = 1;
                                    $reservations = query("SELECT * FROM `reservations`");
                                    foreach ($reservations as $reservation) : ?>
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
                                            <button type="button" class="btn btn-success waves-effect">Edit</button>
                                            <button type="button" class="btn btn-danger waves-effect">Delete</button>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>

                                <tfoot>
                                    <tr>
                                        <th>No. Reservasi</th>
                                        <th>No. Kamar</th>
                                        <th>No. Tamu</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Jam Pesan</th>
                                        <th>Tanggal Check-In</th>
                                        <th>Tanggal Check-Out</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
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
</section>

<?php include_once('footer.php'); ?>