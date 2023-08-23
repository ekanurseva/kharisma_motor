<?php 
    require_once 'controller/function.php';

    $data_servis = query("SELECT * FROM servis");

    foreach($data_servis as $data) {
        for($i = 1; $i <= 3; $i++) {
            $keluhan = $data['jenis_servis'] . $i;
            $idservis = $data['idservis'];

            echo "Keluhan " . $keluhan . " dan idservis " . $idservis . "<br>";

            // mysqli_query($conn, "INSERT INTO jenis_keluhan VALUES (NULL, '$keluhan', '$idservis')");
            // return mysqli_affected_rows($conn);

            echo "INSERT INTO jenis_keluhan VALUES (NULL, '$keluhan', '$idservis')" . "<br><br>";
        }
    }
?>