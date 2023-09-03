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

    function create_servis($data) {
        global $conn;

        $id = dekripsi($_COOKIE['KMmz19']);
        $user = query("SELECT * FROM pengguna WHERE idpengguna = $id")[0];
        
        if(!isset($data['servis'])) {
            echo "
                <script>
                    alert('Harap isi servis terlebih dahulu');
                </script>
            ";

            if ($user['level'] === "User") {
                echo "
                    <script>
                        document.location.href='../user';
                    </script>
                ";
            } elseif ($user['level'] === "Admin") {
                echo "
                    <script>
                        document.location.href='../admin';
                    </script>
                ";
            } elseif ($user['level'] === "Kasir") {
                echo "
                    <script>
                        document.location.href='../kasir';
                    </script>
                ";
            }
        } else {
            $servis = $data['servis'];
            $idantrian = $data['idantrian'];
            $status_transaksi = "Belum";
            $kode_transaksi = $data['kode_transaksi'];

            for ($i = 0; $i < count($servis); $i++) {
                $query = "INSERT INTO transaksi
                        VALUES
                        (NULL, '$idantrian', '$servis[$i]', NULL, '$kode_transaksi', CURRENT_TIMESTAMP(), '$status_transaksi')";
                // var_dump($query);
                mysqli_query($conn, $query);
            }

            return mysqli_affected_rows($conn);
        }


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
            $query = "INSERT INTO transaksi_keluhan
                    VALUES
                    (NULL, '$idantrian', '$idkeluhan[$i]')";
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

    function tambah_servis($data) {
        global $conn;

        $idantrian = $data['idantrian'];
        $kode_transaksi = $data['kode_transaksi'];
        $servis = $data['servis'];
        $status_transaksi = "Belum";

        $query = "INSERT INTO transaksi
                    VALUES
                    (NULL, '$idantrian', '$servis', NULL, '$kode_transaksi', CURRENT_TIMESTAMP(), '$status_transaksi')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function transaksi($data) {
        global $conn;
        $idantrian = $data['idantrian'];

        $query = "UPDATE transaksi SET 
                    status_transaksi = 'Lunas',
                    tanggal_pelunasan = CURRENT_TIMESTAMP()
              WHERE idantrian = '$idantrian'
            ";
        
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function estimasi_waktu($data) {
        $waktu = 0;

        $waktuSekarang = date("Y-m-d H:i:s");

        $waktu_sekarang = strtotime($waktuSekarang);

        $idantrian = $data['id_antrian'];

        $semua_antrian = query("SELECT * FROM antrian WHERE id_antrian <= $idantrian AND status <> 'Selesai'");

        foreach($semua_antrian as $seman) {
            $idant = $seman['id_antrian'];
            $data_transaksi = query("SELECT * FROM transaksi WHERE idantrian = $idant");

            foreach($data_transaksi as $datran) {
                if($datran['idservis'] != NULL) {
                    $idservis = $datran['idservis'];
                    $data_servis = query("SELECT * FROM servis WHERE idservis = $idservis")[0];

                    $waktu += $data_servis['waktu_pengerjaan'];
                }
            }
        }
        $data_transaksi2 = query("SELECT * FROM transaksi WHERE idantrian = $idantrian");

        foreach($data_transaksi2 as $data_trans) {
            if($data_trans['idservis'] != NULL) {
                $idservis = $data_trans['idservis'];
                $data_servis2 = query("SELECT * FROM servis WHERE idservis = $idservis")[0];
    
                $waktu += $data_servis2['waktu_pengerjaan'];
            }
        }

        $waktu += $waktu_sekarang;

        return $waktu;
    }

    function jumlah_transaksi() {
        $antrian = query("SELECT * FROM antrian");
        $jumlah_lunas = 0;

        foreach($antrian as $an) {
            $idantrian = $an['id_antrian'];
            $jumlah = jumlah_data("SELECT * FROM transaksi WHERE idantrian = $idantrian");

            if($jumlah > 0 ) {
                $transaksi = query("SELECT * FROM transaksi WHERE idantrian = $idantrian");

                if($transaksi[0]['status_transaksi'] == "Lunas") {
                    $jumlah_lunas += 1;
                }
            }
        }

        return $jumlah_lunas;
    }

    function total($id, $data) {
        $total = 0;
        foreach($data as $da) {
            if($da['idservis'] != NULL) {
                $idservis = $da['idservis'];

                $datser = query("SELECT * FROM servis WHERE idservis = $idservis")[0];

                $total += $datser['harga_jasa'];
            } elseif($da['idsparepart'] != NULL) {
                $idsparepart = $da['idsparepart'];

                $dahar = query("SELECT * FROM harga_sparepart WHERE idkendaraan = $id AND idsparepart = $idsparepart")[0];

                $total += $dahar['harga'];
            }
        }

        return $total;
    }

    function cari_antrian($data) {
        $dari = $data['dari'];
        $sampai = date('Y-m-d', strtotime($data['sampai']) + 86400);

        $transaksi = query("SELECT * FROM transaksi WHERE status_transaksi = 'Lunas' AND tanggal_pelunasan BETWEEN '$dari' AND '$sampai';");

        foreach($transaksi as $trans) {
            $idantrian[] = $trans['idantrian'];
        }

        $id = array_values(array_unique($idantrian));

        foreach($id as $i) {
            $data_antrian = query("SELECT * FROM antrian WHERE id_antrian = $i")[0];

            $antrian[] = $data_antrian;
        }

        return $antrian;
    }
?>