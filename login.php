<?php
    require_once 'controller/controller_pengguna.php';

    if (isset($_POST["login"])) {
        if (login($_POST) == 1) {
            $error = true;
        }
    }

    if(isset($_COOKIE['KMmz19'])) {
        $id = dekripsi($_COOKIE['KMmz19']);
        $cek = query("SELECT * FROM pengguna WHERE idpengguna = $id")[0];

        if($cek['level'] == "Admin") {
            echo "<script>
                    document.location.href='admin';
                </script>";
            exit;
        } elseif($cek['level'] == "Kasir") {
            echo "<script>
                    document.location.href='kasir';
                </script>";
            exit;
        } else {
            echo "<script>
                    document.location.href='user';
                </script>";
            exit;
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
    <link rel="Icon" href="img/Logo.png">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navbar -->
    <?php require_once('navbar/navbar_login.php') ?>
    <!-- Navabar Selesai -->

    <!-- Content -->
    <div class="container">
        <div class="content py-3">
            <div class="title text-center text-uppercase">
                <h4>LOGIN</h4>
            </div>
            <div class="row d-flex align-items-center">
                <div class="col-6">
                    <div class="desk mt-4">
                        <div class="bg-image">
                        </div>
                        <h6 class="px-2 py-2" style="text-align: justify">Bengkel Mobil Kharisma Motor berdiri untuk
                            pertama
                            kalinya
                            pada tahun 1999 dengan nama Puji Motor yang terletak di jalan Raya Playangan, Gebang,
                            Cirebon.
                            Bengkel ini merupakan buah dari kerjakeras si pemilik bengkel tersebut yang bernama Bapak
                            Kasmari
                            yang merintis dari nol hingga saat ini.</h6>
                        <h6 class="px-2">Hubungi kontak ini : 0812-1419-7766</h6>
                        <span class="px-2 fw-semibold" style="color: black; font-size: 16px; text-align: justify">Untuk
                            menemukan alamat Bengkel Mobil Kharisma Motor <a
                                href="https://maps.app.goo.gl/hKiYp4xWJxwEM4ar7" style="text-decoration: none;"
                                target="_blank">Klik Di Sini</a></span>
                    </div>
                </div>
                <div class="col-6">
                    <form action="" method="post">
                        <div class="desk mt-4 py-5 px-3">
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger" role="alert">
                                    Username/Password Salah
                                </div>
                            <?php endif; ?>
                            <div class="mb-3 row">
                                <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputUsername" name="username">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword" name="password">
                                </div>
                            </div>

                            <div class="row text-end mt-4">
                                <span>Belum Punya Akun?
                                    <a type="submit" href="user/registrasi.php" class="text-decoration-none">
                                        Daftar
                                    </a>
                                </span>
                            </div>
                            <div class="row d-flex justify-content-center mt-4">
                                <button type="submit" name="login" class="btn btn-primary w-50">
                                    LOGIN
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- Content Selesai -->

    <!-- Footer -->
    <?php
    require_once('footer2.php');
    ?>
    <!-- Footer Selesai -->

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>