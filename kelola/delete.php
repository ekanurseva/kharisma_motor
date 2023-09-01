<?php 
    require_once '../controller/function.php';

    if(isset($_GET['idtransaksi'])) {
        $idtransaksi = dekripsi($_GET['idtransaksi']);

        mysqli_query($conn, "DELETE FROM transaksi WHERE idtransaksi = $idtransaksi");

        if(mysqli_affected_rows($conn) > 0) {
            echo "
                <script>
                    alert('Transaksi Berhasil Dihapus');
                    document.location.href='antrian.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Transaksi Gagal Dihapus');
                    document.location.href='antrian.php';
                </script>
            ";
        }
    }
?>