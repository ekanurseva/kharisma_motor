<?php
include("../controller/controller_pengguna.php");
validasi_admin();

if (isset($_POST["submit_admin"])) {
    if (register_admin($_POST) > 0) {
        echo "
        <script>
        alert('Data Admin Berhasil Ditambah');
        document.location.href='admin_kasir.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('Data Admin Gagal Ditambah');
        </script>";
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
                <h4>INPUR DATA ADMIN</h4>
            </div>
            <div class="box mt-4 mx-4">
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="masukkan nama">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="masukkan username">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="pw-1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="pwd" id="pw-1"
                                    placeholder="masukkan password">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="pw-2" class="form-label">Konformasi Password</label>
                                <input type="password" class="form-control" name="pwd2" id="pw-2"
                                    placeholder="masukkan konfirmasi password">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nohp" class="form-label">No. Handphone</label>
                        <input type="text" class="form-control" id="nohp" name="no_hp"
                            placeholder="masukkan no handphone">
                    </div>

                    <button type="submit" name="submit_admin" class="btn btn-primary w-100">
                        Submit
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