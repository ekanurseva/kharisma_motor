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

    function create_transaksi($data) {
        global $conn;

        $idantrian = $data['idantrian'];
        $idservis = $data['servis'];
        $kode_transaksi = $data['kode_transaksi'];
        $status_transaksi = "Belum";

        for ($i = 0; $i < count($idservis); $i++) {
            $query = "INSERT INTO transaksi
                    VALUES
                    (NULL, '$idantrian', '$idservis[$i]', NULL, '$kode_transaksi', CURRENT_TIMESTAMP(), '$status_transaksi')";
            var_dump($query);
            mysqli_query($conn, $query);
        }
        return mysqli_affected_rows($conn);
    }
?>