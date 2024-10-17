<?php
require_once('koneksi.php');

// Query function to retrieve data
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        throw new Exception(mysqli_error($koneksi));
    }
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Function to add a reservation
function tambah_reservasi($data)
{
    global $koneksi;

    $kode = htmlspecialchars($data["reservation_id"]);
    $guest_name = htmlspecialchars($data["guest_name"]);
    $room_number = htmlspecialchars($data["room_number"]);
    $check_in = htmlspecialchars($data["check_in"]);
    $check_out = htmlspecialchars($data["check_out"]);
    $contact = htmlspecialchars($data["contact"]);
    $special_requests = htmlspecialchars($data["special_requests"]);

    $query = "INSERT INTO `reservations` VALUES ('$kode', '$guest_name', '$room_number', '$check_in', '$check_out', '$contact', '$special_requests')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// Function to update a reservation
function ubah_reservasi($data)
{
    global $koneksi;

    $id             = htmlspecialchars($data["reservation_id"]);
    $guest_name     = htmlspecialchars($data["guest_name"]);
    $room_number    = htmlspecialchars($data["room_number"]);
    $check_in       = htmlspecialchars($data["check_in"]);
    $check_out      = htmlspecialchars($data["check_out"]);
    $contact        = htmlspecialchars($data["contact"]);
    $special_requests = htmlspecialchars($data["special_requests"]);

    $query = "UPDATE `reservations` SET
                `guest_name` = '$guest_name',
                `room_number` = '$room_number',
                `check_in` = '$check_in',
                `check_out` = '$check_out',
                `contact` = '$contact',
                `special_requests` = '$special_requests'
                WHERE `reservation_id` = '$id'";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// Function to delete a reservation
function hapus_reservasi($id)
{
    global $koneksi;

    $query = "DELETE FROM `reservations` WHERE `reservation_id` = '$id'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// Fetch data if reservation_id is set in the URL
$data = [];
if (isset($_GET['id'])) {
    $reservation_id = $_GET['id'];
    $data = query("SELECT * FROM `reservations` WHERE reservation_id = '$reservation_id'");
    $data = count($data) > 0 ? $data[0] : [];
}
?>
