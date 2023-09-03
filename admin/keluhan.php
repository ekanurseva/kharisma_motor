<?php
    include("../controller/controller_keluhan.php");
    validasi_admin();

    $keluhan = query("SELECT * FROM jenis_keluhan");
    $jumlah_keluhan = jumlah_data("SELECT * FROM jenis_keluhan");

    $sparepart = query("SELECT * FROM sparepart");
    $servis = query("SELECT * FROM servis");

    if(isset($_POST['submit'])) {
        if (input_keluhan($_POST) > 0) {
            echo "
            <script>
            alert('Data Berhasil Ditambah');
            document.location.href='keluhan.php';
            </script>
            ";
        } else {
            echo "<script>
            alert('Data Gagal Ditambah');
            document.location.href='keluhan.php';
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
                            <a class="fw-medium text-decoration-none" data-bs-toggle="modal" data-bs-target="#myModal">
                                <i class="bi bi-plus-circle"></i>
                                <span>Input Keluhan</span>
                            </a>
                            <hr style="margin-top: 3px;  color: #0275d8; opacity: 1;">
                            <h6 class="card-subtitle ms-4">Jumlah Data</h6>
                            <p class="card-text fw-bold">
                                <?php echo $jumlah_keluhan; ?>
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
                                <th scope="col">Jenis Servis</th>
                                <th scope="col">Jenis Sparepart</th>
                                <th scope="col">Keluhan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            <?php
                                $i = 1;
                                foreach ($keluhan as $s):
                                    $idkeluhan = enkripsi($s['idkeluhan']);
                                    $idservis = $s['idservis'];
                                    $idsparepart = $s['idsparepart'];

                                    $data_servis = query("SELECT * FROM servis WHERE idservis = $idservis")[0];
                                    $data_sparepart = query("SELECT * FROM sparepart WHERE idsparepart = $idsparepart")[0];
                            ?>
                                <tr>
                                    <th>
                                        <?php echo $i; ?>
                                    </th>
                                    <td>
                                        <?php echo $data_servis['jenis_servis']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data_sparepart['sparepart']; ?>
                                    </td>
                                    <td>
                                        <?php echo $s['keluhan']; ?>
                                    </td>
                                    <td>
                                        <a href="edit_keluhan.php?id=<?= $idkeluhan; ?>"><i
                                                class="bi bi-pencil-fill"></i></a>
                                        |
                                        <a style="text-decoration: none;"
                                            href="../controller/controller_keluhan.php?idkeluhan=<?= $idkeluhan; ?>"
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
                            <h4 class="modal-title">Input Keluhan</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="" method="post">
                            <!-- Modal body -->
                            <div class="modal-body">
                                <label for="idservis">Jenis Servis</label>
                                <select class="form-select" id="idservis" aria-label="Default select example"
                                    name="idservis">
                                    <option selected hidden value="">-- Pilih Servis --</option>
                                    <?php foreach ($servis as $k): ?>
                                        <option value="<?= $k['idservis']; ?>"><?= $k['jenis_servis']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>

                                <label for="idsparepart">Jenis Sparepart</label>
                                <select class="form-select" id="idsparepart" aria-label="Default select example"
                                    name="idsparepart">
                                    <option selected hidden value="">-- Pilih Sparepart --</option>
                                    <?php foreach ($sparepart as $s): ?>
                                        <option value="<?= $s['idsparepart']; ?>"><?= $s['sparepart']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>

                                <label for="keluhan">Keluhan :</label>
                                <textarea class="form-control" rows="3" id="keluhan" name="keluhan"></textarea>

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