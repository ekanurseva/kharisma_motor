<?php

require_once('function.php');

// Fungsi Input Kendaraan
function input_kendaraan($data)
{
    global $conn;

    $jenis = htmlspecialchars($data['kendaraan']);

    $result = mysqli_query($conn, "SELECT nama_kendaraan FROM jenis_kendaraan WHERE nama_kendaraan = '$jenis'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Kenis Kendaraan Sudah Dipakai! Silahkan Masukkan Jenis Kendaraan Lain');
                document.location.href='kendaraan.php';
            </script>";
        return false;
    }

    mysqli_query($conn, "INSERT INTO jenis_kendaraan VALUES (NULL, '$jenis')");
    return mysqli_affected_rows($conn);
}
// Fungsi Input Kendaraan Selesai

// Fungsi Edit Kendaraan
function edit_kendaraan($data)
{
    global $conn;

    $idkendaraan = $data['idkendaraan'];
    $oldjenis = htmlspecialchars($data['oldjenis']);
    $jenis = htmlspecialchars($data['jenis']);

    if ($jenis !== $oldjenis) {
        $result = mysqli_query($conn, "SELECT nama_kendaraan FROM jenis_kendaraan WHERE nama_kendaraan = '$jenis'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('Nama Jenis kendaraan Sudah Ada!');
                document.location.href='kendaraan.php';
            </script>";
            return false;
        }
    }

    $query = "UPDATE jenis_kendaraan SET 
                    nama_kendaraan = '$jenis'
              WHERE idkendaraan = '$idkendaraan'
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Fungsi Edit kendaraan Selesai

// Delete
if (isset($_GET['idkendaraan'])) {
    global $conn;
    $idkendaraan = dekripsi($_GET['idkendaraan']);

    mysqli_query($conn, "DELETE FROM jenis_kendaraan WHERE idkendaraan = $idkendaraan");

    if (mysqli_affected_rows($conn) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='../admin/kendaraan.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data gagal dihapus karena ada data yang berelasi dengan tabel lain');
                    document.location.href='../admin/kendaraan.php';
                </script>
            ";
    }
}

?>