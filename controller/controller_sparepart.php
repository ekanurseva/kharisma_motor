<?php

require_once('function.php');

// Fungsi Input Sparepart
function input_sparepart($data_sparepart)
{
    global $conn;

    $jenis = htmlspecialchars($data_sparepart['jenis']);
    $harga = $data_sparepart['harga'];
    $deskripsi = $data_sparepart['deskripsi'];

    $result = mysqli_query($conn, "SELECT sparepart FROM sparepart WHERE sparepart = '$jenis'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Jenis Sparepart Sudah Dipakai! Silahkan gunakan jenis sparepart lain');
    </script>";
        return false;
    }

    mysqli_query($conn, "INSERT INTO sparepart VALUES (NULL, '$jenis', '$harga', '$deskripsi')");
    return mysqli_affected_rows($conn);
}
// Fungsi Input Sparepart Selesai

// Fungsi Edit Sparepart
function edit_sparepart($data_sparepart)
{
    global $conn;

    $idsparepart = $data_sparepart['idsparepart'];
    $oldjenis = htmlspecialchars($data_sparepart['oldjenis']);
    $jenis = htmlspecialchars($data_sparepart['jenis']);
    $harga = $data_sparepart['harga'];
    $deskripsi = $data_sparepart['deskripsi'];

    if ($jenis !== $oldjenis) {
        $result = mysqli_query($conn, "SELECT sparepart FROM sparepart WHERE sparepart = '$jenis'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('Nama Jenis Sparepart Sudah Ada!');
            </script>";
            return false;
        }
    }

    $query = "UPDATE sparepart SET 
                    sparepart = '$jenis',
                    harga = '$harga',
                    deskripsi = '$deskripsi'
              WHERE idsparepart = '$idsparepart'
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Fungsi Edit Sparepart Selesai

// Delete
if (isset($_GET['idsparepart'])) {
    global $conn;
    $idsparepart = dekripsi($_GET['idsparepart']);

    mysqli_query($conn, "DELETE FROM sparepart WHERE idsparepart = $idsparepart");

    if (mysqli_affected_rows($conn) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='../admin/sparepart.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Dihapus');
                    document.location.href='../admin/sparepart.php';
                </script>
            ";
    }
}

?>