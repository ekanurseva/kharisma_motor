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
    <?php require_once('../navbar/navbar_kasir.php') ?>
    <!-- Navbar Selesai -->

    <!-- Content -->
    <div class="container">
        <div class="content py-3">
            <div class="title text-center text-uppercase">
                <h4>DETAIL TRANSAKSI</h4>
            </div>
            <div class="konten py-4">
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-3">
                                <h6>Pelanggan</h6>
                            </div>
                            <div class="col-5">
                                <h6>: Pelanggan 1</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-success">
                            <a class="text-decoration-none text-white" href="#">Cetak Struk</a>
                        </button>
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
                </div>

                <button type="button" class="btn btn-primary mt-3">
                    <a href="input_detail_transaksi.php" style="text-decoration: none; color: white; padding: 0 20px;">
                        Input Detail Transaksi
                    </a>
                </button>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Transaksi</th>
                        <th scope="col">Pelanggan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Servis</th>
                        <th scope="col">Sparepart</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>001</td>
                        <td>Mark</td>
                        <td>01-07-2023</td>
                        <td>Ban</td>
                        <td>Ban</td>
                        <td>Rp 800.000</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>002</td>
                        <td>Mark</td>
                        <td>01-07-2023</td>
                        <td>Ban</td>
                        <td>Ban</td>
                        <td>Rp 800.000</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
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