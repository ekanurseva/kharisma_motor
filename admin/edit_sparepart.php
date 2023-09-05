<?php
require_once('../controller/controller_sparepart.php');
validasi_admin();

$idsparepart = dekripsi($_GET['id']);
$data_sparepart = query("SELECT * FROM sparepart WHERE idsparepart = $idsparepart")[0];

if (isset($_POST['submit_sparepart'])) {
    if (edit_sparepart($_POST) > 0) {
        echo "
                    <script>
                    alert('Data Berhasil Diubah');
                    document.location.href='sparepart.php';
                    </script>
                ";
    } else {
        echo "
                    <script>
                    alert('Data Gagal Diubah');
                    document.location.href='edit_sparepart.php?id=" . $_GET['id'] . "';
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
                <h4>EDIT DATA SPAREPART</h4>
            </div>
            <div class="box mt-4 mx-4">
                <form method="post" action="">
                    <input type="hidden" name="idsparepart" value="<?= $data_sparepart['idsparepart']; ?>">
                    <input type="hidden" name="oldjenis" value="<?= $data_sparepart['sparepart']; ?>">

                    <div class="mb-3">
                        <label for="jsparepart" class="form-label">Jenis Sparepart</label>
                        <input type="text" class="form-control" value="<?php echo $data_sparepart['sparepart']; ?>"
                            name="jenis" id="jsparepart" placeholder="masukkan jenis sparepart">
                    </div>

                    <button type="submit" name="submit_sparepart" class="btn btn-primary w-100">
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