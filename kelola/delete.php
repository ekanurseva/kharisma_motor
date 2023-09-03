<?php
require_once '../controller/function.php';
validasi_no_user();

<<<<<<< HEAD
if (isset($_GET['idtransaksi'])) {
    $idtransaksi = dekripsi($_GET['idtransaksi']);
=======
    if(isset($_GET['idtransaksi'])) {
        $idtransaksi = dekripsi($_GET['idtransaksi']);
        $antrian = query("SELECT idantrian FROM transaksi WHERE idtransaksi = $idtransaksi")[0];

        $idantrian = enkripsi($antrian['idantrian']);
>>>>>>> 8f179c29b79ca50e8ceee1146c72b9c52b1891e8

    mysqli_query($conn, "DELETE FROM transaksi WHERE idtransaksi = $idtransaksi");

    if (mysqli_affected_rows($conn) > 0) {
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