<?php

require_once('function.php');

// Fungsi Input Sparepart
function input_sparepart($data_sparepart)
{
    global $conn;

    $sparepart = htmlspecialchars($data_sparepart['sparepart']);
    $deskripsi = $data_sparepart['deskripsi'];

    $result = mysqli_query($conn, "SELECT sparepart FROM sparepart WHERE sparepart = '$sparepart'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('Nama Jenis Sparepart Sudah Ada!');
                document.location.href='sparepart.php';
            </script>";
            return false;
        }

    mysqli_query($conn, "INSERT INTO sparepart VALUES (NULL,'$sparepart','$deskripsi')");
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
    $deskripsi = $data_sparepart['deskripsi'];
    $id = enkripsi($idsparepart);

    if ($jenis !== $oldjenis) {
        $result = mysqli_query($conn, "SELECT sparepart FROM sparepart WHERE sparepart = '$jenis'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('Nama Jenis Sparepart Sudah Ada!');
                document.location.href='edit_admin_kasir.php?id=" . $id . "';
            </script>";
            return false;
        }
    }

    $query = "UPDATE sparepart SET 
                    sparepart = '$jenis',
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
                    alert('Data gagal dihapus karena ada data yang berelasi dengan tabel lain');
                    document.location.href='../admin/sparepart.php';
                </script>
            ";
    }
}

?>