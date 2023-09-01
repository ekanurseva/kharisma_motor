<?php
    require_once('function.php');

    function cek_transaksi() {
        global $conn;
        if (!isset($_GET['key'])) {
            echo "<script>
                    document.location.href='input_antrian.php';
                </script>";
            exit;
        }

        $id = dekripsi($_GET['key']);

        $result = mysqli_query($conn, "SELECT * FROM antrian WHERE nopol = '$id'");

        if ($result == false) {
            echo "<script>
                    document.location.href='input_antrian.php';
                </script>";
            exit;
        }
    }

    function kode_transaksi() {
        global $conn;

        $query = "SELECT * FROM transaksi";
        $kode = "";

        $jumlah = jumlah_data($query);
        $tanggal = date("Ymd");

        if($jumlah == 0) {
            $kode = "T-". $tanggal . "-1";
        } else {
            for($i = 1; $i <= $jumlah; $i++) { 
                $kode_transaksi = "T-". $tanggal . "-" . $i;
                $query1 = "SELECT COUNT(*) as total FROM transaksi WHERE kode_transaksi = '$kode_transaksi'";
                $result = mysqli_query($conn, $query1);
                $row = mysqli_fetch_assoc($result);
                $totalP = $row['total'];

                if ($totalP == 0) {
                    $kode = "T-". $tanggal . "-" . $i;
                    break;
                } else {
                    $angka = $jumlah + 1;
                    $kode = "T-". $tanggal . "-" . $angka;
                }
            };
        }

        return $kode;
    }

    function cek_estimasi_sparepart($data) {
        $keluhan = $data['keluhan'];

        foreach($keluhan as $k) {
            $data_sparepart = query("SELECT * FROM jenis_keluhan WHERE idkeluhan = $k")[0];

            $sparepart[] = $data_sparepart['idsparepart'];
        }

        $spare = array_values(array_unique($sparepart));

        return $spare;
    }

    function create_transaksi($data) {
        global $conn;

        $idantrian = $data['idantrian'];
        $idkeluhan = $data['keluhan'];
        $idsparepart = cek_estimasi_sparepart($data);
        $kode_transaksi = $data['kode_transaksi'];
        $status_transaksi = "Belum";

        for ($i = 0; $i < count($idkeluhan); $i++) {
            $query = "INSERT INTO transaksi
                    VALUES
                    (NULL, '$idantrian', '$idkeluhan[$i]', NULL, '$kode_transaksi', CURRENT_TIMESTAMP(), '$status_transaksi')";
            // var_dump($query);
            mysqli_query($conn, $query);
        }

        for ($j = 0; $j < count($idsparepart); $j++) {
            $query = "INSERT INTO transaksi
                    VALUES
                    (NULL, '$idantrian', NULL, '$idsparepart[$j]', '$kode_transaksi', CURRENT_TIMESTAMP(), '$status_transaksi')";
            // var_dump($query);
            mysqli_query($conn, $query);
        }
    }

    function cari_servis($data) {
        foreach($data as $dt) {
            if($dt['idkeluhan'] != NULL) {
                $idkeluhan = $dt['idkeluhan'];
                $data_keluhan = query("SELECT * FROM jenis_keluhan WHERE idkeluhan = $idkeluhan")[0];

                $idsevis_array[] = $data_keluhan['idservis'];
            }
        }
        
        $idservis = array_values(array_unique($idsevis_array));

        return $idservis;
    }

    function ubah_status($data) {
        global $conn;
        $idantrian = $data['idantrian'];
        $status = $data['status'];

        $query = "UPDATE antrian SET 
                    status = '$status'
              WHERE id_antrian = '$idantrian'
            ";
        
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function tambah_sparepart($data) {
        global $conn;

        $idantrian = $data['idantrian'];
        $kode_transaksi = $data['kode_transaksi'];
        $sparepart = $data['sparepart'];
        $status_transaksi = "Belum";

        $query = "INSERT INTO transaksi
                    VALUES
                    (NULL, '$idantrian', NULL, '$sparepart', '$kode_transaksi', CURRENT_TIMESTAMP(), '$status_transaksi')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

?>