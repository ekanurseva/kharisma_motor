<?php
require_once "../controller/controller_transaksi.php";
include("../controller/controller_servis.php");

$id = dekripsi($_COOKIE['KMmz19']);
$user = query("SELECT * FROM pengguna WHERE idpengguna = $id")[0];

$data = query("SELECT * FROM servis");
$jumlah_servis = jumlah_data("SELECT * FROM servis");
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
    <!-- navbar -->
    <?php
    // Cek peran pengguna dan masukkan file navbar yang sesuai
    if ($user['level'] === "Admin") {
        require_once('../navbar/navbar_admin.php');
    } elseif ($user['level'] === "Kasir") {
        require_once('../navbar/navbar_kasir.php');
    } else {
        // Jika peran tidak dikenali, Anda dapat menambahkan pesan error atau tindakan lain sesuai kebutuhan
        echo "Error: Peran pengguna tidak valid.";
    }
    ?>
    <!-- navbar selesai -->

    <!-- Content -->
    <div class="container">
        <div class="content py-3">
            <div class="title text-center text-uppercase">
                <h4>DETAIL TRANSAKSI</h4>
            </div>
            <div class="konten py-4">
                <div class="row">
                    <div class="col-8 mt-2">
                        <div class="row">
                            <div class="col-3">
                                <h6>Pelanggan</h6>
                            </div>
                            <div class="col-5">
                                <h6>: Mark</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-success">
                            <a class="text-decoration-none text-white" href="#">Cetak Struk</a>
                        </button>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-3">
                            <h6>Kode Transaksi</h6>
                        </div>
                        <div class="col-5">
                            <h6>: 001</h6>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-3">
                            <h6>Tanggal</h6>
                        </div>
                        <div class="col-5">
                            <h6>: 01/07/2023</h6>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary mt-3">
                    <a href="input_detail_transaksi.php" style="text-decoration: none; color: white; padding: 0 20px;">
                        Input Servis & Separepart Tambahan
                    </a>
                </button>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Servis</th>
                        <th>Sparepart</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>Ban</td>
                        <td>Ban</td>
                        <td>Rp 800.000</td>
                        <td>
                            <a href="edit_detail_transaksi.php"><i class="bi bi-pencil-fill"></i></a>
                            |
                            <a style="text-decoration: none;" href="#"
                                onclick="return confirm('Apakah anda yakin ingin menghapus data?')">
                                <i class="bi bi-trash-fill"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>Ban</td>
                        <td>Ban</td>
                        <td>Rp 800.000</td>
                        <td>
                            <a href="edit_detail_transaksi.php"><i class="bi bi-pencil-fill"></i></a>
                            |
                            <a style="text-decoration: none;" href="#"
                                onclick="return confirm('Apakah anda yakin ingin menghapus data?')">
                                <i class="bi bi-trash-fill"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <th>Total Pembayaran</th>
                        <th>Rp 1.600.000</th>
                    </tr>
                </tbody>
            </table>
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