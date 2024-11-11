<?php
include_once('header.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = query("SELECT * FROM reservations WHERE id_reservasi = $id")[0];
}
?>
<section class="content">
    <div class="container-fluid">
        <h2>Edit Reservation</h2>

        <?php
        if (isset($_POST['save'])) {
            if (edit_reservasi($_POST) > 0) {
                echo "
                    <script>
                        alert('Reservation data has been successfully saved!');
                        document.location.href = 'reservation.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Failed to save reservation data!');
                        document.location.href = 'edit-reservation.php';
                    </script>
                ";
            }
        }
        ?>
        <div class="card">
            <div class="header">
                <h2>Reservation Data</h2>
            </div>
            <div class="body">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="reservationId" class="col-sm-3 col-form-label">Reservation ID</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" class="form-control" name="reservationId" id="reservationId" value="<?= $data['id_reservasi'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="roomId" class="col-sm-3 col-form-label">Room ID</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" class="form-control" name="roomId" id="roomId" value="<?= $data['id_kamar'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="guestId" class="col-sm-3 col-form-label">Guest ID</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" class="form-control" name="guestId" id="guestId" value="<?= $data['id_tamu'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="reservationDate" class="col-sm-3 col-form-label">Reservation Date</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="date" class="form-control" name="reservationDate" id="reservationDate" value="<?= $data['tgl_reservasi'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="reservationTime" class="col-sm-3 col-form-label">Reservation Time</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="time" class="form-control" name="reservationTime" id="reservationTime" value="<?= $data['jam_reservasi'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="checkinDate" class="col-sm-3 col-form-label">Check-in Date</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="date" class="form-control" name="checkinDate" id="checkinDate" value="<?= $data['tgl_checkin'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="checkoutDate" class="col-sm-3 col-form-label">Check-out Date</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="date" class="form-control" name="checkoutDate" id="checkoutDate" value="<?= $data['tgl_checkout'] ?>">
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
                        <a href="reservation.php" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include_once('footer.php');
?>