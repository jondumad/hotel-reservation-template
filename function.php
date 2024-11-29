<?php
require_once('koneksi.php');

// Execute a database query and return the result as an array
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

// Add a new reservation to the database
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

// Update an existing reservation in the database
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
                `tgl_checkin` = '$tgl_checkin', `tgl_checkout` = '$tgl_checkout', `status` = '$status'
                WHERE `id_reservasi` = '$id_reservasi'";

    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        throw new Exception("Error updating reservation: " . mysqli_error($koneksi));
    }

    return mysqli_affected_rows($koneksi);
}

// Delete a reservation from the database
function delete_reservasi($id_reservasi)
{
    global $koneksi;
    var_dump($id_reservasi);
    echo "Deleting reservation with id: $id_reservasi... ";
    $query = "DELETE FROM `reservations` WHERE `id_reservasi` = '$id_reservasi'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        echo "Error: " . mysqli_error($koneksi);
    }
    if (mysqli_affected_rows($koneksi) > 0) {
        echo "Success! ";
    } else {
        echo "Failed! ";
    }
    return mysqli_affected_rows($koneksi);
}

// Add a new checkout record to the database
function tambah_checkout($data)
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

// Update an existing checkout record in the database
function edit_checkout($data)
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
                `tgl_checkin` = '$tgl_checkin', `tgl_checkout` = '$tgl_checkout', `status` = '$status'
                WHERE `id_reservasi` = '$id_reservasi'";

    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        throw new Exception("Error updating reservation: " . mysqli_error($koneksi));
    }

    return mysqli_affected_rows($koneksi);
}

// Delete a checkout record from the database
function delete_checkout($id_reservasi)
{
    global $koneksi;
    var_dump($id_reservasi);
    echo "Deleting reservation with id: $id_reservasi... ";
    $query = "DELETE FROM `reservations` WHERE `id_reservasi` = '$id_reservasi'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        echo "Error: " . mysqli_error($koneksi);
    }
    if (mysqli_affected_rows($koneksi) > 0) {
        echo "Success! ";
    } else {
        echo "Failed! ";
    }
    return mysqli_affected_rows($koneksi);
}

// Add a new check-in record to the database
function tambah_checkin($data)
{
    global $koneksi;

    $id_reg = htmlspecialchars($data["id_reg"]);
    $id_tamu = htmlspecialchars($data["id_tamu"]);
    $id_kamar = htmlspecialchars($data["id_kamar"]);
    $tgl_checkin = htmlspecialchars($data["tgl_checkin"]);
    $jam_checkin = htmlspecialchars($data["jam_checkin"]);
    $uang_muka = htmlspecialchars($data["uang_muka"]);
    $status = htmlspecialchars($data["status"]);

    $query = "INSERT INTO `checkin` VALUES ('$id_reg', '$id_kamar', '$id_tamu', '$jam_checkin', '$tgl_checkin', '$status', '$uang_muka')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// Update an existing check-in record in the database
function edit_checkin($data)
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

// Delete a check-in record from the database
function delete_checkin($id_reservasi)
{
    global $koneksi;
    $query = "DELETE FROM `reservations` WHERE `id_reservasi` = '$id_reservasi'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// Add a new user to the database
function tambah_user($data)
{
    global $koneksi;

    $kode = htmlspecialchars($data["id_user"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $user_role = htmlspecialchars($data["user_role"]);

    // Encrypt password using password hash
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users VALUES ('$kode', '$username', '$password_hash', '$user_role')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// Delete a user from the database
function hapus_user($id)
{
    global $koneksi;

    $query = "DELETE FROM users WHERE id_user = '$id'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// Update user information in the database
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

// Change user's password in the database
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

