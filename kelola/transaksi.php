<?php
    require_once "../controller/controller_transaksi.php";

    validasi_no_user();

    $id = dekripsi($_COOKIE['KMmz19']);
    $user = query("SELECT * FROM pengguna WHERE idpengguna = $id")[0];
    $jumlah_transaksi = jumlah_data("SELECT * FROM transaksi");

    $transaksi = query("SELECT * FROM transaksi");

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
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
                <h4>KELOLA DATA TRANSAKSI</h4>
            </div>
            <div class="row">
                <div class="col-3 me-2" style="margin-left: 80px;">
                    <div class="card my-4">
                        <div class="card-body mt-3">
                            <h6 class="card-subtitle ms-4">Jumlah Transaksi</h6>
                            <p class="card-text fw-bold">
                                <?= $jumlah_transaksi; ?>
                            </p>
                            <i class="icon bi bi-file-earmark-ruled"></i>
                        </div>
                    </div>
                    <a class="text-decoration-none text-white" href="laporan.php">
                        <button class="btn btn-success w-100">
                            Laporan
                        </button>
                    </a>
                </div>
                <div class="col-7 mt-4">
                    <table class="table table-hover mt-3" id="example">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Transaksi</th>
                                <th scope="col">Pelanggan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Total</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <th scope="row">1</th>
                                <td>001</td>
                                <td>Mark</td>
                                <td>01-07-2023</td>
                                <td>Rp 800.000</td>
                                <td>
                                    <a class="text-decoration-none text-white" href="detail_transaksi.php">
                                        <button class="btn btn-success">
                                            Detail
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>002</td>
                                <td>Mark</td>
                                <td>01-07-2023</td>
                                <td>Rp 800.000</td>
                                <td>
                                    <a class="text-decoration-none text-white" href="detail_transaksi.php">
                                        <button class="btn btn-success">
                                            Detail
                                        </button>
                                    </a>
                                </td>
                            </tr>
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