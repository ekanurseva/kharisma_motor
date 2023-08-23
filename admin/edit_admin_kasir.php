<?php
require_once('../controller/controller_pengguna.php');
validasi_admin();

$idpengguna = dekripsi($_GET['id']);
$data = query("SELECT * FROM pengguna WHERE idpengguna = $idpengguna")[0];

if (isset($_POST['submit_pengguna'])) {
    if (edit_pengguna($_POST) > 0) {
        echo "
                <script>
                alert('Data Berhasil Diubah');
                document.location.href='admin_kasir.php';
                </script>
            ";
    } else {
        echo "
                <script>
                alert('Data Gagal Diubah');
                document.location.href='admin_kasir.php';
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
                <h4>EDIT DATA ADMIN DAN KASIR</h4>
            </div>
            <div class="box mt-4 mx-4">
                <form action="" method="post">
                    <input type="hidden" name="idpengguna" value="<?= $data['idpengguna']; ?>">
                    <input type="hidden" name="oldusername" value="<?= $data['username']; ?>">
                    <input type="hidden" name="oldpwd" value="<?= $data['password']; ?>">
                    <input type="hidden" name="oldnama" value="<?= $data['nama']; ?>">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" value="<?= $data['nama']; ?>"
                            name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" value="<?= $data['username']; ?>"
                            name="username">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="pw-1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="pw-1"
                                    value="<?= $data['password']; ?>" name="pwd">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="pw-2" class="form-label">Konformasi Password</label>
                                <input type="password" class="form-control" id="pw-2"
                                    value="<?= $data['password']; ?>" name="pwd2">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nohp" class="form-label">No. Handphone</label>
                        <input type="text" class="form-control" id="nohp" value="<?= $data['no_hp']; ?>"
                            name="nohp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Level</label>
                        <div class="row">
                            <div class="col-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="level" id="kasir" value="Kasir"
                                        <?php if ($data['level'] === 'Kasir') {
                                            echo 'checked';
                                        } ?>>
                                    <label class="form-check-label" for="kasir">Kasir</label>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="level" id="admin" value="Admin"
                                        <?php if ($data['level'] === 'Admin') {
                                            echo 'checked';
                                        } ?>>
                                    <label class="form-check-label" for="admin">Admin</label>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="level" id="user" value="User"
                                        <?php if ($data['level'] === 'User') {
                                            echo 'checked';
                                        } ?>>
                                    <label class="form-check-label" for="user">User</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100" name="submit_pengguna">
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