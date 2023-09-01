<?php
include("../controller/controller_sparepart.php");
validasi_admin();

$data_sparepart = query("SELECT * FROM harga_sparepart");
$jumlah_sparepart = jumlah_data("SELECT * FROM harga_sparepart");

$sparepart = query("SELECT * FROM sparepart");
$kendaraan = query("SELECT * FROM jenis_kendaraan");
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
                <h4>KELOLA DATA HARGA SPAREPART</h4>
            </div>
            <div class="row">
                <div class="col-3 me-4 ms-4">
                    <div class="card my-4">
                        <div class="card-body">
                            <a class="fw-medium text-decoration-none" data-bs-toggle="modal" data-bs-target="#myModal">
                                <i class="bi bi-plus-circle"></i>
                                <span>Input Sparepart</span>
                            </a>
                            <hr style="margin-top: 3px;  color: #0275d8; opacity: 1;">
                            <h6 class="card-subtitle ms-4">Jumlah Data</h6>
                            <p class="card-text fw-bold">
                                <?php echo $jumlah_sparepart; ?>
                            </p>
                            <i class="icon bi bi-gear"></i>
                        </div>
                    </div>
                </div>

                <div class="col-8 mt-4">
                    <table class="table table-hover mt-3" id="example">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Sparepart</th>
                                <th scope="col">Jenis Kendaraan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            <?php
                            $i = 1;
                            foreach ($data_sparepart as $s):
                                $idsparepart = enkripsi($s['idharga']);
                                ?>
                                <tr>
                                    <th>
                                        <?php echo $i; ?>
                                    </th>
                                    <td>
                                        <?php echo $s['harga']; ?>
                                    </td>
                                    <td>
                                        <?php echo $s['harga']; ?>
                                    </td>
                                    <td>
                                        <?php echo $s['harga']; ?>
                                    </td>
                                    <td>
                                        <a href="edit_sparepart.php?id=<?= $idsparepart; ?>"><i
                                                class="bi bi-pencil-fill"></i></a>
                                        |
                                        <a style="text-decoration: none;"
                                            href="../controller/controller_sparepart.php?idharga=<?= $idsparepart; ?>"
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

            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Input Harga Sparepart</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="" method="post">
                            <!-- Modal body -->
                            <div class="modal-body">
                                <label for="kriteria">Jenis Sparepart</label>
                                <select class="form-select" id="kriteria" aria-label="Default select example"
                                    name="kriteria">
                                    <option selected hidden value="">-- Pilih Sparepart --</option>
                                    <?php foreach ($sparepart as $s): ?>
                                        <option value="<?= $s['idsparepart']; ?>"><?= $s['sparepart']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <label for="kriteria">Jenis Kendaraan</label>
                                <select class="form-select" id="kriteria" aria-label="Default select example"
                                    name="kriteria">
                                    <option selected hidden value="">-- Pilih Kendaraan --</option>
                                    <?php foreach ($kendaraan as $k): ?>
                                        <option value="<?= $k['idkendaraan']; ?>"><?= $k['nama_kendaraan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <label for="indikator">Harga :</label>
                                <input class="form-control" id="indikator" name="indikator">

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">

                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" name="submit" class="btn btn-primary" data-bs-dismi
                                    ss="modal">Kirim</button>
                            </div>
                        </form>

                    </div>
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