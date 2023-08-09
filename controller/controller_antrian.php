<?php

require_once('function.php');

// Fungsi Input antrian
function input_antrian($data)
{
    global $conn;

    $antrian = htmlspecialchars($data['antrian']);
    $idservis = $data['idservis'];

    $result = mysqli_query($conn, "SELECT antrian FROM jenis_antrian WHERE antrian = '$antrian'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('antrian Sudah Ada!');
    </script>";
        return false;
    }

    mysqli_query($conn, "INSERT INTO jenis_antrian VALUES (NULL, '$idservis', '$antrian')");
    return mysqli_affected_rows($conn);
}
// Fungsi Input antrian Selesai
?>