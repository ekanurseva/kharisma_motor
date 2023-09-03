<?php
require_once('../controller/controller_kendaraan.php');
validasi_admin();

$idkendaraan = dekripsi($_GET['id']);
$data = query("SELECT * FROM jenis_kendaraan WHERE idkendaraan = $idkendaraan")[0];

if (isset($_POST['submit_kendaraan'])) {
    if (edit_kendaraan($_POST) > 0) {
        echo "
                <script>
                alert('Data Berhasil Diubah');
                document.location.href='kendaraan.php';
                </script>
            ";
    } else {
        echo "
                <script>
                alert('Data Gagal Diubah');
                document.location.href='edit_kendaraan.php?id=" . $_GET['id'] . "';
                </script>
            ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kharisma Motor</title>
    <link rel="Icon" href="../img/Logo.png">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <!-- Navbar -->
    <?php require_once('../navbar/navbar_admin.php') ?>
    <!-- Navbar Selesai -->

    <!-- Content -->
    <div class="container">
        <div class="content py-3">
            <div class="title text-center text-uppercase">
                <h4>EDIT DATA KENDARAAN</h4>
            </div>
            <div class="box mt-4 mx-4">
                <form method="post" action="">
                    <input type="hidden" name="idkendaraan" value="<?= $data['idkendaraan']; ?>">
                    <input type="hidden" name="oldjenis" value="<?= $data['nama_kendaraan']; ?>">

                    <div class="mb-3">
                        <label for="jkendaraan" class="form-label">Jenis kendaraan</label>
                        <input type="text" class="form-control" id="jkendaraan"
                            value="<?php echo $data['nama_kendaraan']; ?>" name="jenis"
                            placeholder="masukkan jenis kendaraan">
                    </div>

                    <button type="submit" name="submit_kendaraan" class="btn btn-primary w-100">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- Content Selesai -->

    <!-- Footer -->
    <?php
    require_once('../footer.php');
    ?>
    <!-- Footer Selesai -->


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>