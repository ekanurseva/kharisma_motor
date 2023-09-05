<?php
require_once 'function.php';

function input_harga($data)
{
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

    // $harga = [
    //     1500000,
    //     300000,
    //     118000,
    //     1760000,
    //     755000,
    //     470050,
    //     450000,
    //     289500,
    //     410000,
    //     850000,
    //     38000,
    //     910000,
    //     1620000,
    //     195000,
    //     290000,
    //     187000,
    //     109000,
    //     820000,
    //     190000,
    //     270000,
    //     156000,
    //     111000,
    //     698000,
    //     25000,
    //     550000,
    //     85000,
    //     181000,
    //     350000,
    //     900000,
    //     300000,
    //     430000,
    //     230000,
    //     90000,
    //     250000,
    //     950000,
    //     400000,
    //     87000,
    //     70000,
    //     2800000,
    //     30000,
    //     300000,
    //     800000,
    //     1700000,
    //     580000,
    //     900000,
    //     500000,
    //     100000,
    //     400000,
    //     180000,
    //     300000,
    //     310000,
    //     227000
    // ];

    // for ($i = 0; $i < count($harga); $i++) {
    //     $har = $harga[$i];
    //     $idsparepart = $i + 1;
    //     mysqli_query($conn, "INSERT INTO harga_sparepart VALUES (NULL, '$idkendaraan', '$idsparepart', '$har')");
    // }
}

function edit_harga($data)
{
    global $conn;
    $idharga = $data['idharga'];
    $idkendaraan = $data['idkendaraan'];
    $idsparepart = $data['idsparepart'];
    $idkendaraaanold = $data['idkendaraanold'];
    $idsparepartold = $data['idsparepartold'];
    $harga = $data['harga'];

    $id = enkripsi($idharga);

    if ($idkendaraaanold != $idkendaraan || $idsparepartold != $idsparepart) {
        $result = mysqli_query($conn, "SELECT * FROM harga_sparepart WHERE idkendaraan = '$idkendaraan' AND idsparepart = '$idsparepart'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('Sparepart tersebut sudah memiliki harga di kendaraan tersebut!');
                    document.location.href='edit_harga.php?id=" . $id . "';
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