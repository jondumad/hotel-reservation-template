<?php
require_once('function.php');
include_once('header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Hotel Reservation</h1>

    <?php
    if (isset($_POST['simpan'])) {
        if (tambah_reservasi($_POST) > 0) {
    ?>
            <div class="alert alert-success" role="alert">
                Reservation Successfully Saved!
            </div>
            
</div>
<?php
        } else {
?>
    <div class="alert alert-danger" role="alert">
        Failed to Save Reservation!
    </div>
<?php
        }
    }
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Hotel Reservation Data</h6>
        <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahModal">
            <span class="icon text-white-50"> <i class="fas fa-plus"></i></span>
            <span class="text">New Reservation</span>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Check-in Date</th>
                        <th>Check-out Date</th>
                        <th>Guest Name</th>
                        <th>Room Type</th>
                        <th>Phone Number</th>
                        <th>Special Requests</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Check-in Date</th>
                        <th>Check-out Date</th>
                        <th>Guest Name</th>
                        <th>Room Type</th>
                        <th>Phone Number</th>
                        <th>Special Requests</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    $reservations = query("SELECT * FROM `reservations`");
                    foreach ($reservations as $reservation) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $reservation['checkin_date'] ?></td>
                            <td><?= $reservation['checkout_date'] ?></td>
                            <td><?= $reservation['guest_name'] ?></td>
                            <td><?= $reservation['room_type'] ?></td>
                            <td><?= $reservation['phone'] ?></td>
                            <td><?= $reservation['special_requests'] ?></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-success" href="edit-reservation.php?id=<?= $reservation['id_reservation'] ?>">Edit</a>
                                    <a onclick="confirm('Are you sure you want to delete this reservation?')" href="delete-reservation.php?id=<?= $reservation['id_reservation'] ?>" class="btn btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$query = mysqli_query($koneksi, "SELECT max(id_reservation) as kodeTerbesar FROM `reservations`");
$data = mysqli_fetch_array($query);
$kodeReservation = $data['kodeTerbesar'];
$urutan = (int) substr($kodeReservation, 3, 3);
$urutan++;
$huruf = 'RSV';
$kodeReservation = $huruf . sprintf("%03s", $urutan);
?>

<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Reservation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <input type="hidden" name="id_reservation" id="id_reservation" value="<?= $kodeReservation ?>">
                    <div class="form-group row">
                        <label for="guest_name" class="col-sm-3 col-form-label">Guest Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="guest_name" id="guest_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="checkin_date" class="col-sm-3 col-form-label">Check-in Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="checkin_date" id="checkin_date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="checkout_date" class="col-sm-3 col-form-label">Check-out Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="checkout_date" id="checkout_date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="room_type" class="col-sm-3 col-form-label">Room Type</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="room_type" id="room_type">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Phone Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="phone" id="phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="special_requests" class="col-sm-3 col-form-label">Special Requests</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="special_requests" id="special_requests">
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

<!-- /.container-fluid -->

<?php
include_once('template/footer.php');
?>
