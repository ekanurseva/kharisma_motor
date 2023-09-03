<?php 
    require_once 'function.php';

    function input_harga($data) {
        global $conn;

        $idkendaraan = $data['idkendaraan'];
        $idsparepart = $data['idsparepart'];
        $harga = $data['harga'];

        $result = mysqli_query($conn, "SELECT * FROM harga_sparepart WHERE idkendaraan = '$idkendaraan' AND idsparepart = '$idsparepart'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('Sparepart tersebut sudah memiliki harga di kendaraan tersebut!');
                document.location.href='harga_sparepart.php';
            </script>";
            return false;
        }

        mysqli_query($conn, "INSERT INTO harga_sparepart VALUES (NULL, '$idkendaraan', '$idsparepart','$harga')");
        return mysqli_affected_rows($conn);
    }

    function edit_harga($data) {
        global $conn;
        $idharga = $data['idharga'];
        $idkendaraan = $data['idkendaraan'];
        $idsparepart = $data['idsparepart'];
        $idkendaraaanold = $data['idkendaraanold'];
        $idsparepartold = $data['idsparepartold'];
        $harga = $data['harga'];

        if($idkendaraaanold != $idkendaraan || $idsparepartold != $idsparepart) {
            $result = mysqli_query($conn, "SELECT * FROM harga_sparepart WHERE idkendaraan = '$idkendaraan' AND idsparepart = '$idsparepart'");

            if (mysqli_fetch_assoc($result)) {
                echo "<script>
                    alert('Sparepart tersebut sudah memiliki harga di kendaraan tersebut!');
                    document.location.href='harga_sparepart.php';
                </script>";
                return false;
            }
        }

        $query = "UPDATE harga_sparepart SET 
                    idkendaraan = '$idkendaraan',
                    idsparepart = '$idsparepart',
                    harga = '$harga'
              WHERE idharga = '$idharga'
            ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    if (isset($_GET['idharga'])) {
        global $conn;
        $idharga = dekripsi($_GET['idharga']);
    
        mysqli_query($conn, "DELETE FROM harga_sparepart WHERE idharga = $idharga");
    
        if (mysqli_affected_rows($conn) > 0) {
            echo "
                    <script>
                        alert('Data Berhasil Dihapus');
                        document.location.href='../admin/harga_sparepart.php';
                    </script>
                ";
        } else {
            echo "
                    <script>
                        alert('Data gagal dihapus karena ada data yang berelasi dengan tabel lain');
                        document.location.href='../admin/harga_sparepart.php';
                    </script>
                ";
        }
    }
?>