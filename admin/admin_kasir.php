<?php
include("../controller/controller_pengguna.php");
validasi_admin();
$data = query("SELECT * FROM pengguna");

$jumlah_admin = jumlah_data("SELECT * FROM pengguna WHERE level = 'Admin'");
$jumlah_kasir = jumlah_data("SELECT * FROM pengguna WHERE level = 'Kasir'");
$jumlah_user = jumlah_data("SELECT * FROM pengguna WHERE level = 'User'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kharisma Motor</title>
    <link rel="Icon" href="../img/Logo.png">

    <!-- data tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <!-- Navbar -->
    <?php require_once('../navbar/navbar_admin.php'); ?>
    <!-- Navbar Selesai -->

    <!-- Content -->
    <div class="container">
        <div class="content py-3">
            <div class="title text-center text-uppercase">
                <h4>KELOLA DATA ADMIN DAN KASIR</h4>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="card my-4">
                        <div class="card-body">
                            <a href="input_admin.php" class="fw-medium text-decoration-none">
                                <i class="bi bi-plus-circle"></i>
                                <span>Admin</span>
                            </a>
                            <hr style="margin-top: 3px;  color: #0275d8; opacity: 1;">
                            <h6 class="card-subtitle ms-1">Jumlah Admin</h6>
                            <p class="card-text fw-bold">
                                <?php echo $jumlah_admin; ?>
                            </p>
                            <i class="icon bi bi-person-fill-check"></i>
                        </div>
                    </div>
                    <div class="card my-4">
                        <div class="card-body">
                            <span class="fw-medium text-primary">
                                Data Pelanggan
                            </span>
                            <hr style="margin-top: 3px;  color: #0275d8; opacity: 1;">
                            <h6 class="card-subtitle ms-4">Jumlah</h6>
                            <p class="card-text fw-bold">
                                <?php echo $jumlah_user; ?>
                            </p>
                            <i class="icon bi bi-person-fill-check"></i>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="card my-4">
                        <div class="card-body">
                            <a href="input_kasir.php" class="fw-medium text-decoration-none">
                                <i class="bi bi-plus-circle"></i>
                                <span>Kasir</span>
                            </a>
                            <hr style="margin-top: 3px;  color: #0275d8; opacity: 1;">
                            <h6 class="card-subtitle ms-2">Jumlah Kasir</h6>
                            <p class="card-text fw-bold">
                                <?php echo $jumlah_kasir; ?>
                            </p>
                            <i class="icon bi bi-person-fill-check"></i>
                        </div>
                    </div>
                </div>

                <div class="col-8 mt-4">
                    <table class="table table-hover mt-2" id="example">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">Username</th>
                                <th scope="col">Nama</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Level</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $i = 1;
                            foreach ($data as $p):
                                $idpengguna = enkripsi($p['idpengguna']);
                                ?>
                                <tr>
                                    <th>
                                        <?php echo $i; ?>
                                    </th>
                                    <td>
                                        <?php echo $p['username']; ?>
                                    </td>
                                    <td>
                                        <?php echo $p['nama']; ?>
                                    </td>
                                    <td>
                                        <?php echo $p['no_hp']; ?>
                                    </td>
                                    <td>
                                        <?php echo $p['level']; ?>
                                    </td>
                                    <td>
                                        <a href="edit_admin_kasir.php?id=<?= $idpengguna; ?>"><i
                                                class="bi bi-pencil-fill"></i></a>
                                        |
                                        <a href="../controller/controller_pengguna.php?idpengguna=<?= $idpengguna; ?>"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i
                                                class="bi bi-trash-fill"></i></a>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            endforeach
                            ?>
                        </tbody>
                    </table>
                </div>
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
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#example").DataTable();
        });
    </script>
</body>

</html>