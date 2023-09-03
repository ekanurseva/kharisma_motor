<?php 
    require_once '../controller/function.php';
    validasi_no_user();

    if(isset($_GET['idtransaksi'])) {
        $idtransaksi = dekripsi($_GET['idtransaksi']);
        $antrian = query("SELECT idantrian FROM transaksi WHERE idtransaksi = $idtransaksi")[0];

        $idantrian = enkripsi($antrian['idantrian']);

        mysqli_query($conn, "DELETE FROM transaksi WHERE idtransaksi = $idtransaksi");

        if(mysqli_affected_rows($conn) > 0) {
            echo "
                <script>
                    alert('Transaksi Berhasil Dihapus');
                    document.location.href='detail_transaksi.php?id=" . $idantrian . "';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Transaksi Gagal Dihapus');
                    document.location.href='detail_transaksi.php?id=" . $idantrian . "';
                </script>
            ";
        }
    }
?>