<?php

require_once('function.php');

// Fungsi Input keluhan
function input_keluhan($data)
{
    global $conn;

    $keluhan = htmlspecialchars($data['keluhan']);
    $idservis = $data['idservis'];
    $idsparepart = $data['idsparepart'];

    mysqli_query($conn, "INSERT INTO jenis_keluhan VALUES (NULL, '$keluhan', '$idservis', '$idsparepart')");
    return mysqli_affected_rows($conn);
}
// Fungsi Input keluhan Selesai

// Fungsi Edit keluhan
function edit_keluhan($data)
{
    global $conn;

    $idkeluhan = $data['idkeluhan'];
    $idservis = $data['idservis'];
    $idsparepart = $data['idsparepart'];
    $keluhan = htmlspecialchars($data['keluhan']);

    $query = "UPDATE jenis_keluhan SET 
                    keluhan = '$keluhan',
                    idservis = '$idservis',
                    idsparepart = '$idsparepart'
              WHERE idkeluhan = '$idkeluhan'
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Fungsi Edit keluhan Selesai

// Delete
if (isset($_GET['idkeluhan'])) {
    global $conn;
    $idkeluhan = dekripsi($_GET['idkeluhan']);

    mysqli_query($conn, "DELETE FROM jenis_keluhan WHERE idkeluhan = $idkeluhan");

    if (mysqli_affected_rows($conn) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='../admin/keluhan.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data gagal dihapus karena ada data yang berelasi dengan tabel lain');
                    document.location.href='../admin/keluhan.php';
                </script>
            ";
    }
}

?>