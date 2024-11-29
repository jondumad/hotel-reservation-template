<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/hotel-reservation-template/function.php');

// Delete reservation confirmation
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize the ID
    if (delete_reservasi($id) > 0) {
        echo "<script>alert('Reservation data has been successfully deleted!');</script>";
        echo "<script>document.location.href = 'reservation.php';</script>"; // Redirect back to reservations list
    } else {
        echo "<script>alert('Failed to delete reservation data!');</script>";
    }
} else {
    echo "<script>alert('No reservation ID provided!');</script>";
    echo "<script>document.location.href = 'reservation.php';</script>"; // Redirect if no ID is provided
}
