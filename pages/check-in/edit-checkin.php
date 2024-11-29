<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/hotel-reservation-template/pages/template/header.php');
// Initialize $data as null
$data = null;

// Validate and sanitize the ID parameter
if (isset($_GET['id']) && preg_match('/^res\d{3}$/', $_GET['id'])) {
    $id = $_GET['id'];
    $result = query("SELECT * FROM reservations WHERE id_reservasi = '$id'");

    // Check if reservation exists
    if (!empty($result)) {
        $data = $result[0];
    } else {
        // Redirect if reservation not found
        echo "
            <script>
                alert('Reservation not found with ID: " . $id . "!');
                document.location.href = 'reservation.php';
            </script>
        ";
        exit;
    }
} else {
    // Redirect if no valid ID provided
    echo "
        <script>
            alert('Invalid reservation ID provided!');
            document.location.href = 'reservation.php';
        </script>
    ";
    exit;
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
                        alert('Reservation with ID: " . $id . " has been successfully updated!');
                        document.location.href = 'reservation.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Failed to update reservation with ID: " . $id . "!');
                        document.location.href = 'edit-reservation.php?id=" . $id . "';
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
                        <label for="id_reservasi" class="col-sm-3 col-form-label">Reservation ID</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" class="form-control" name="id_reservasi" id="id_reservasi" value="<?= htmlspecialchars($data['id_reservasi']) ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_kamar" class="col-sm-3 col-form-label">Room ID</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" class="form-control" name="id_kamar" id="id_kamar" value="<?= htmlspecialchars($data['id_kamar']) ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_tamu" class="col-sm-3 col-form-label">Guest ID</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" class="form-control" name="id_tamu" id="id_tamu" value="<?= htmlspecialchars($data['id_tamu']) ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_reservasi" class="col-sm-3 col-form-label">Reservation Date</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="date" class="form-control" name="tgl_reservasi" id="tgl_reservasi" value="<?= htmlspecialchars($data['tgl_reservasi']) ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jam_reservasi" class="col-sm-3 col-form-label">Reservation Time</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="time" class="form-control" name="jam_reservasi" id="jam_reservasi" value="<?= htmlspecialchars($data['jam_reservasi']) ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_checkin" class="col-sm-3 col-form-label">Check-in Date</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="date" class="form-control" name="tgl_checkin" id="tgl_checkin" value="<?= htmlspecialchars($data['tgl_checkin']) ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_checkout" class="col-sm-3 col-form-label">Check-out Date</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="date" class="form-control" name="tgl_checkout" id="tgl_checkout" value="<?= htmlspecialchars($data['tgl_checkout']) ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="status" id="status" required>
                                <option value="cancelled" <?= $data['status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                <option value="pending" <?= $data['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="confirmed" <?= $data['status'] === 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                            </select>
                        </div>
                    </div>
                    <div clas
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
include_once($_SERVER['DOCUMENT_ROOT'] . '/hotel-reservation-template/pages/template/footer.php'); ?>