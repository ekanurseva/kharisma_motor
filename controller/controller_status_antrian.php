<?php

require_once('function.php');

// Fungsi Input status
function input_status($data_status)
{
    global $conn;

    $status = htmlspecialchars($data_status['status']);
    $deskripsi = $data_status['deskripsi'];

    $result = mysqli_query($conn, "SELECT status FROM status_antrian WHERE status = '$status'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Status Antrian Sudah Dipakai! Silahkan gunakan status antrian lain');
    </script>";
        return false;
    }

    mysqli_query($conn, "INSERT INTO status_antrian VALUES (NULL, '$status', '$deskripsi')");
    return mysqli_affected_rows($conn);
}
// Fungsi Input status Selesai

// Fungsi Edit status
function edit_status($data_status)
{
    global $conn;

    $idstatus = $data_status['idstatus'];
    $oldstatus = htmlspecialchars($data_status['oldstatus']);
    $status = htmlspecialchars($data_status['status']);
    $deskripsi = $data_status['deskripsi'];

    if ($status !== $oldstatus) {
        $result = mysqli_query($conn, "SELECT status FROM status_antrian WHERE status = '$status'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('Status Antrian Sudah Ada!');
            </script>";
            return false;
        }
    }

    $query = "UPDATE status_antrian SET 
                    status = '$status',
                    deskripsi = '$deskripsi'
              WHERE idstatus = '$idstatus'
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Fungsi Edit status Selesai

// Delete
if (isset($_GET['idstatus'])) {
    global $conn;
    $idstatus = dekripsi($_GET['idstatus']);

    mysqli_query($conn, "DELETE FROM status_antrian WHERE idstatus = $idstatus");

    if (mysqli_affected_rows($conn) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='../admin/status_antrian.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Dihapus');
                    document.location.href='../admin/status_antrian.php';
                </script>
            ";
    }
}

?>