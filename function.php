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

function edit_reservasi($data)
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

    $query = "UPDATE `reservations` SET
                `id_kamar` = '$id_kamar',
                `id_tamu` = '$id_tamu',
                `tgl_reservasi` = '$tgl_reservasi',
                `jam_reservasi` = '$jam_reservasi',
                `tgl_checkin` = '$tgl_checkin',
                `tgl_checkout` = '$tgl_checkout',
                `status` = '$status'
                WHERE `id_reservasi` = '$id_reservasi'";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function delete_reservasi($id_reservasi)
{
    global $koneksi;
    $query = "DELETE FROM `reservations` WHERE `id_reservasi` = '$id_reservasi'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
} 


function tambah_user($data)
{
    global $koneksi;

    $kode = htmlspecialchars($data["id_user"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $user_role = htmlspecialchars($data["user_role"]);

    // enkripsi password dengan password hash
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users VALUES ('$kode', '$username', '$password_hash', '$user_role')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapus_user($id)
{
    global $koneksi;

    $query = "DELETE FROM users WHERE id_user = '$id'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function ubah_user($data)
{
    global $koneksi;

    $kode = htmlspecialchars($data["id_user"]);
    $username = htmlspecialchars($data["username"]);
    $user_role = htmlspecialchars($data["user_role"]);

    $query = "UPDATE users SET
            username = '$username',
            user_role = '$user_role'
            WHERE id_user = '$kode'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function ganti_password($data)
{
    global $koneksi;

    $kode = htmlspecialchars($data["id_user"]);
    $password = htmlspecialchars($data["password"]);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE users SET
              password = '$password_hash'
              WHERE id_user = '$kode' ";

    mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

    return mysqli_affected_rows($koneksi);
}
?>
