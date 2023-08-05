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
    <?php require_once('../navbar/navbar_kasir.php'); ?>
    <!-- Navbar Selesai -->

    <!-- Content -->
    <div class="container">
        <div class="content py-3">
            <div class="title text-center text-uppercase">
                <h4>KELOLA DATA TRANSAKSI</h4>
            </div>
            <div class="row">
                <div class="col-3 me-2" style="margin-left: 80px;">
                    <div class="card my-4">
                        <div class="card-body">
                            <a href="input_servis.php" class="fw-medium text-decoration-none">
                                <i class="bi bi-plus-circle"></i>
                                <span>Input Transaksi</span>
                            </a>
                            <hr style="margin-top: 3px;  color: #0275d8; opacity: 1;">
                            <h6 class="card-subtitle ms-4">Jumlah Transaksi</h6>
                            <p class="card-text fw-bold">2</p>
                            <i class="icon bi bi-file-earmark-ruled"></i>
                        </div>
                    </div>
                    <button class="btn btn-success w-100">
                        <a class="text-decoration-none text-white" href="laporan.php">Laporan</a>
                    </button>
                </div>
                <div class="col-7 mt-4">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                    <div class="dataTables_wrapper mt-3">
                        <div class="dataTables_length">
                            <label for="">
                                show
                                <select name="example_length" aria-controls="example" class="">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                entries
                            </label>
                        </div>
                    </div>

                    <table class="table table-hover mt-3">
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
                                    <button class="btn btn-success">
                                        <a class="text-decoration-none text-white"
                                            href="detail_transaksi.php">Detail</a>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>002</td>
                                <td>Mark</td>
                                <td>01-07-2023</td>
                                <td>Rp 800.000</td>
                                <td>
                                    <button class="btn btn-success">
                                        <a class="text-decoration-none text-white"
                                            href="detail_transaksi.php">Detail</a>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
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
    <script src="../script.js"></script>
</body>

</html>