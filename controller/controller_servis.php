<?php

require_once('function.php');

// Fungsi Input Servis
function input_servis($data)
{
    global $conn;

    $jenis = htmlspecialchars($data['jenis']);
    $harga_jasa = $data['harga_jasa'];
    $deskripsi = $data['deskripsi'];

    $result = mysqli_query($conn, "SELECT jenis_servis FROM servis WHERE jenis_servis = '$jenis'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('jenis servis Sudah Dipakai! Silahkan gunakan jenis servis lain');
                document.location.href='servis.php';
            </script>";
        return false;
    }

    mysqli_query($conn, "INSERT INTO servis VALUES (NULL, '$jenis', '$harga_jasa', '$deskripsi')");
    return mysqli_affected_rows($conn);
}
// Fungsi Input Servis Selesai

// Fungsi Edit servis
function edit_servis($data)
{
    global $conn;

    $idservis = $data['idservis'];
    $oldjenis = htmlspecialchars($data['oldjenis']);
    $jenis = htmlspecialchars($data['jenis']);
    $harga = $data['harga_jasa'];
    $deskripsi = $data['deskripsi'];

    if ($jenis !== $oldjenis) {
        $result = mysqli_query($conn, "SELECT jenis_servis FROM servis WHERE jenis_servis = '$jenis'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('Nama Jenis servis Sudah Ada!');
                document.location.href='servis.php';
            </script>";
            return false;
        }
    }

    $query = "UPDATE servis SET 
                    jenis_servis = '$jenis',
                    harga_jasa = '$harga',
                    deskripsi = '$deskripsi'
              WHERE idservis = '$idservis'
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Fungsi Edit servis Selesai

// Delete
if (isset($_GET['idservis'])) {
    global $conn;
    $idservis = dekripsi($_GET['idservis']);

    mysqli_query($conn, "DELETE FROM servis WHERE idservis = $idservis");

    if (mysqli_affected_rows($conn) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='../admin/servis.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Dihapus');
                    document.location.href='../admin/servis.php';
                </script>
            ";
    }
}

?>