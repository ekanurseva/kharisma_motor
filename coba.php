<?php 
    require_once 'controller/function.php';

    // $data_servis = query("SELECT * FROM servis");

    // foreach($data_servis as $data) {
    //     for($i = 1; $i <= 3; $i++) {
    //         $keluhan = $data['jenis_servis'] . $i;
    //         $idservis = $data['idservis'];

    //         echo "Keluhan " . $keluhan . " dan idservis " . $idservis . "<br>";

    //         // mysqli_query($conn, "INSERT INTO jenis_keluhan VALUES (NULL, '$keluhan', '$idservis')");
    //         // return mysqli_affected_rows($conn);

    //         echo "INSERT INTO jenis_keluhan VALUES (NULL, '$keluhan', '$idservis')" . "<br><br>";
    //     }
    // }

    // $idkendaraan_array = [1, 2];
    // $harga_array = [660000,700000];

    $data = array(
        "Fullset Engine",
        "Gasket Cylinder Head",
        "Gasket Cover Cylinder Head",
        "Tutup Timing Chain",
        "Engine Mounting Kanan/Kiri",
        "Engine Mounting Belakang",
        "Ring Piston/Seker (Ukuran Standar)",
        "Piston/Seker & Pen (Ukuran Standar)",
        "Pulley AS Crank",
        "Timing Chain",
        "Saringan Oli",
        "Kerodong & Kipas Radiator",
        "Radiator",
        "Saringan Udara",
        "Koil",
        "Van Belt",
        "Busi",
        "Sensor ISC",
        "Injektor",
        "Thermostat",
        "Metal",
        "karet kaliper",
        "boster rem",
        "karet rem",
        "kanvas rem",
        "baterai remote",
        "door lock",
        "remote",
        "module remote",
        "per",
        "shockbreaker",
        "ball joint",
        "bantalan suspensi",
        "regulator kaca",
        "dinamo ampere",
        "gulungan dinamo",
        "belt dinamo",
        "bohlam",
        "body repair",
        "ripet body",
        "kabel body",
        "bumper",
        "kopling set",
        "kampas kopling",
        "gigi",
        "master kopling",
        "oli gardan",
        "paking head",
        "master rem",
        "speaker",
        "tie rod",
        "Kipas Radiator"
    );

    $prices1 = array(
        1450000,
        200000,
        112000,
        1550000,
        455000,
        475000,
        430000,
        285000,
        350000,
        660000,
        27000,
        810000,
        1400000,
        155000,
        235000,
        135000,
        90000,
        550000,
        150000,
        250000,
        150000,
        100000,
        600000,
        20000,
        250000,
        55000,
        170000,
        300000,
        800000,
        215000,
        400000,
        225000,
        80000,
        250000,
        950000,
        300000,
        75000,
        50000,
        2500000,
        15000,
        250000,
        700000,
        1500000,
        500000,
        800000,
        450000,
        80000,
        300000,
        150000,
        200000,
        200000,
        215000
    );

    $prices2 = array(
        1550000,
        270000,
        117000,
        1560000,
        555000,
        475050,
        430000,
        285500,
        390000,
        700000,
        40000,
        810000,
        1400000,
        175000,
        235000,
        135000,
        100000,
        550000,
        150000,
        250000,
        150000,
        100000,
        600000,
        20000,
        250000,
        55000,
        170000,
        300000,
        800000,
        215000,
        400000,
        225000,
        80000,
        250000,
        950000,
        300000,
        75000,
        50000,
        2500000,
        15000,
        250000,
        700000,
        1500000,
        500000,
        800000,
        450000,
        80000,
        300000,
        150000,
        200000,
        200000,
        215000
    );

    $cek = in_array(215000, $prices1) ? "Ada" : "Gk";

    var_dump($cek);
    
    
    

    // for($i = 0; $i < count($data); $i++) {
    //     $sparepart = $data[$i];
    //     mysqli_query($conn, "INSERT INTO sparepart VALUES (NULL, '$sparepart', 'asdasdasd')");
    // }
    for($i = 0; $i < count($data); $i++) {
        $idsparepart = $i + 1;
        for($j = 1; $j <= 2; $j++) {
            $harga = ${'prices' . $j}[$i];
            // $query = "INSERT INTO harga_sparepart VALUES (NULL, '$j', '$idsparepart', '$harga')";
            // mysqli_query($conn, "INSERT INTO harga_sparepart VALUES (NULL, '$j', '$idsparepart', '$harga')");
        }
    }
?>