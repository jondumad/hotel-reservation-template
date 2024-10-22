<?php
require_once('koneksi.php');

// Query Database
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Tambah Data
function tambah_reservasi($data)
{
    global $koneksi;

    $id_reservasi = htmlspecialchars($data["id_reservasi"]);
    $id_kamar = htmlspecialchars($data["id_kamar"]);
    $id_tamu = htmlspecialchars($data["id_tamu"]);
    $tgl_reservasi = htmlspecialchars($data["tgl_reservasi"]);
    $jam_reservasi = htmlspecialchars($data["jam_reservasi"]);
    $tgl_checkin = htmlspecialchars($data["tgl_checkin"]);
    $tgl_checkout = htmlspecialchars($data["tgl_checkout"]);
    $status = htmlspecialchars($data["status"]);

    $query = "INSERT INTO `reservations` VALUES ('$id_reservasi', '$id_kamar', '$id_tamu', '$tgl_reservasi', '$jam_reservasi', '$tgl_checkin', '$tgl_checkout', '$status')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
?>
