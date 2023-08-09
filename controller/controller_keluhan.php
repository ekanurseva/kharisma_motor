<?php

require_once('function.php');

// Fungsi Input keluhan
function input_keluhan($data)
{
    global $conn;

    $keluhan = htmlspecialchars($data['keluhan']);
    $idservis = $data['idservis'];

    $result = mysqli_query($conn, "SELECT keluhan FROM jenis_keluhan WHERE keluhan = '$keluhan'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Keluhan Sudah Ada!');
    </script>";
        return false;
    }

    mysqli_query($conn, "INSERT INTO jenis_keluhan VALUES (NULL, '$idservis', '$keluhan')");
    return mysqli_affected_rows($conn);
}
// Fungsi Input keluhan Selesai

// Fungsi Edit keluhan
function edit_keluhan($data)
{
    global $conn;

    $idkeluhan = $data['idkeluhan'];
    $oldidservis = $data['oldidservis'];
    $oldkeluhan = htmlspecialchars($data['oldkeluhan']);
    $idservis = $data['idservis'];
    $keluhan = htmlspecialchars($data['keluhan']);

    if ($keluhan !== $oldkeluhan) {
        $result = mysqli_query($conn, "SELECT keluhan FROM jenis_keluhan WHERE keluhan = '$keluhan'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('keluhan Antrian Sudah Ada!');
            </script>";
            return false;
        }
    }

    $query = "UPDATE jenis_keluhan SET 
                    idservis = '$idservis',
                    keluhan = '$keluhan'
              WHERE idjkeluhan = '$idkeluhan'
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Fungsi Edit keluhan Selesai

// Delete
if (isset($_GET['idjkeluhan'])) {
    global $conn;
    $idkeluhan = dekripsi($_GET['idjkeluhan']);

    mysqli_query($conn, "DELETE FROM jenis_keluhan WHERE idjkeluhan = $idkeluhan");

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
                    alert('Data Gagal Dihapus');
                    document.location.href='../admin/keluhan.php';
                </script>
            ";
    }
}

?>