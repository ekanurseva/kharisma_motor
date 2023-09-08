<?php
include("../controller/controller_pengguna.php");

if (isset($_POST["submit_user"])) {
    if (register_user($_POST) > 0) {
        echo "
        <script>
        alert('Data User Berhasil Ditambah');
        document.location.href='../admin/admin_kasir.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('Data User Gagal Ditambah');
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
    <!-- Content -->
    <div class="container">
        <div class="boxx mt-5 mb-5"
            style="border: 0.7px solid black; background: #d03119; border-radius: 12px; margin: 0 100px;">
            <h2 class="text-center text-white mt-2"><img src="../img/KHARISMA MOTOR.png"
                    style="width: 60px; margin-left: 10px">KHARISMA
                MOTOR</h2>
            <div class="content py-3">
                <div class="title text-center text-uppercase mx-4">
                    <h4 style="margin: 0;">REGISTRASI AKUN</h4>
                </div>
                <div class="box mt-4 mx-4 text-white">
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

                        <div class="row text-end mt-4 mb-4 me-1">
                            <span>Sudah Punya Akun?
                                <a type="submit" href="../login.php" class="text-decoration-none text-warning">
                                    Login
                                </a>
                            </span>
                        </div>
                        <button type="submit" name="submit_user" class="btn btn-success w-100">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Selesai -->

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>