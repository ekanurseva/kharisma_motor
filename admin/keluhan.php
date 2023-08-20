<?php
include("../controller/controller_keluhan.php");

$data = query("SELECT * FROM jenis_keluhan");
$jumlah_keluhan = jumlah_data("SELECT * FROM jenis_keluhan");
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
                <h4>KELOLA DATA KELUHAN</h4>
            </div>
            <div class="row">
                <div class="col-3 me-4 ms-4">
                    <div class="card my-4">
                        <div class="card-body">
                            <a href="input_keluhan.php" class="fw-medium text-decoration-none">
                                <i class="bi bi-plus-circle"></i>
                                <span>Input Data Keluhan</span>
                            </a>
                            <hr style="margin-top: 3px;  color: #0275d8; opacity: 1;">
                            <h6 class="card-subtitle ms-2">Jumlah Data Keluhan</h6>
                            <p class="card-text fw-bold">
                                <?php echo $jumlah_keluhan; ?>
                            </p>
                            <i class="icon bi bi-grid-3x3-gap"></i>
                        </div>
                    </div>
                </div>
                <div class="col-8 mt-4">
                    <table class="table table-hover mt-3" id="example">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">Jenis Servis</th>
                                <th scope="col">Keluhan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            <?php
                            $i = 1;
                            foreach ($data as $keluhan):
                                $idkeluhan = enkripsi($keluhan['idjkeluhan']);
                                ?>
                                <tr>
                                    <th>
                                        <?php echo $i; ?>
                                    </th>

                                    <?php
                                    $idservis = $keluhan['idservis'];
                                    $jenis_servis = query("SELECT jenis_servis FROM servis WHERE idservis = $idservis")[0];
                                    ?>
                                    <td>
                                        <?php echo $jenis_servis['jenis_servis']; ?>
                                    </td>
                                    <td>
                                        <?php echo $keluhan['keluhan']; ?>
                                    </td>
                                    <td>
                                        <a href="edit_keluhan.php?id=<?= $idkeluhan; ?>"><i
                                                class="bi bi-pencil-fill"></i></a>
                                        |
                                        <a style="text-decoration: none;"
                                            href="../controller/controller_keluhan.php?idjkeluhan=<?= $idkeluhan; ?>"
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