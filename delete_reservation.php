<?php
require_once('function.php');

// Delete reservation confirmation
if (isset($_GET['id_reservasi'])) {
    $id = $_GET['id_reservasi'];
    if (delete_reservasi($id) > 0) {
        echo "
            <script>
                alert('Reservation data has been successfully deleted!');
            </script>
        ";
        echo "<script>
                document.location.href = 'reservation.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Failed to delete reservation data!');
            </script>
        ";
    }
}
