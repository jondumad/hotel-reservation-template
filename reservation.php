<?php
include_once('header.php');
include_once('koneksi.php');
?>

<section class="content">
    <div class="container-fluid">
        <?php
        if (isset($_POST['simpan'])) {
            if (tambah_reservasi($_POST) > 0) {
        ?>
                <div class="alert alert-success" role="alert">
                    Data Reservasi Berhasil Disimpan!
                </div>

            <?php
            } else {
            ?>
                <div class="alert alert-danger" role="alert">
                    Data Reservasi Gagal Disimpan!
                </div>
        <?php
            }
        }
        ?>
        <!-- Data Tables -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h1>Data Reservasi</h1>
                        <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#tambahModal">
                            <i class="material-icons">library_add</i>
                            <span>Tambah Data Reservasi</span>
                        </button>
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Reservasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="id_reservasi" class="col-sm-3 col-form-label">No. Reservasi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="id_reservasi" id="id_reservasi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_kamar" class="col-sm-3 col-form-label">No. Kamar</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="id_kamar" id="id_kamar">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_tamu" class="col-sm-3 col-form-label">No. Tamu</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="id_tamu" id="id_tamu">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgl_reservasi" class="col-sm-3 col-form-label">Tanggal Pesan</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="tgl_reservasi" id="tgl_reservasi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jam_reservasi" class="col-sm-3 col-form-label">Jam Pesan</label>
                                <div class="col-sm-8">
                                    <input type="time" class="form-control" name="jam_reservasi" id="jam_reservasi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgl_checkin" class="col-sm-3 col-form-label">Tanggal Check-In</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="tgl_checkin" id="tgl_checkin">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgl_checkout" class="col-sm-3 col-form-label">Tanggal Check-Out</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="tgl_checkout" id="tgl_checkout">
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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
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