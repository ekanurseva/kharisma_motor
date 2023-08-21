<?php

    require_once('function.php');

    function kode_antrian() {
        global $conn;

        $query = "SELECT * FROM antrian";

        $jumlah = jumlah_data($query);

        $tanggal = date("Ymd");
        if($jumlah == 0) {
            $kode = $tanggal . "_1";
        } else {
            for($i = 1; $i <= $jumlah; $i++) { 
                $no_antrian = $tanggal . "_" . $i;
                $query1 = "SELECT COUNT(*) as total FROM antrian WHERE no_antrian = '$no_antrian'";
                $result = mysqli_query($conn, $query1);
                $row = mysqli_fetch_assoc($result);
                $totalP = $row['total'];

                if ($totalP == 0) {
                    $kode = $tanggal . "_" . $i;
                    break;
                } else {
                    $angka = $jumlah + 1;
                    $kode = $tanggal . "_" . $angka;
                }
            };
        }

        return $kode;
    }

    // Fungsi Input antrian
    function input_antrian($data)
    {
        global $conn;
        $idkendaraan = htmlspecialchars($data['kendaraan']);
        $no_antrian = htmlspecialchars($data['no_antrian']);
        $nama_pelanggan = htmlspecialchars($data['nama_pelanggan']);
        $no_hp = htmlspecialchars($data['no_hp']);
        $nopol = htmlspecialchars($data['nopol']);
        $alamat = htmlspecialchars($data['alamat']);
        $status = "Menunggu Antrian";

        var_dump($data);


        mysqli_query($conn, "INSERT INTO antrian VALUES (NULL, '$idkendaraan', '$no_antrian', '$nama_pelanggan', '$no_hp', CURRENT_TIMESTAMP(), '$nopol', '$alamat', '$status')");
        return mysqli_affected_rows($conn);
    }
    // Fungsi Input antrian Selesai
?>