<?php
include("../controller/controller_servis.php");
validasi_admin();

$data = query("SELECT * FROM servis");
$jumlah_servis = jumlah_data("SELECT * FROM servis");

if (isset($_POST["submit_servis"])) {
    if (input_servis($_POST) > 0) {
        echo "
        <script>
        alert('Data Berhasil Ditambah');
        document.location.href='servis.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('Data Gagal Ditambah');
        document.location.href='servis.php';
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
                <h4>KELOLA DATA SERVIS</h4>
            </div>
            <div class="row">
                <div class="col-3 me-3 ms-4">
                    <div class="card my-4">
                        <div class="card-body">
                            <a class="fw-medium text-decoration-none btn text-primary p-0" data-bs-toggle="modal"
                                data-bs-target="#myModal">
                                <i class="bi bi-plus-circle"></i>
                                <span>Input Servis</span>
                            </a>
                            <hr style="margin-top: 3px;  color: #0275d8; opacity: 1;">
                            <h6 class="card-subtitle ms-5">Jumlah Servis</h6>
                            <p class="card-text fw-bold">
                                <?php echo $jumlah_servis; ?>
                            </p>
                            <i class="icon bi bi-tools"></i>
                        </div>
                    </div>
                </div>
                <div class="col-8 mt-4">
                    <table class="table table-hover mt-3" id="example">
                        <thead>
                            <tr class="text-start">
                                <th scope="col">No</th>
                                <th scope="col">Jenis Servis</th>
                                <th scope="col">Harga Jasa</th>
                                <th scope="col">Waktu Pengerjaan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            <?php
                            $i = 1;
                            foreach ($data as $servis):
                                $idservis = enkripsi($servis['idservis']);
                                $waktu = ($servis['waktu_pengerjaan'] / 60) / 60;
                                ?>
                                <tr>
                                    <th>
                                        <?php echo $i; ?>
                                    </th>
                                    <td>
                                        <?php echo $servis['jenis_servis']; ?>
                                    </td>
                                    <td>
                                        Rp
                                        <?php echo number_format($servis['harga_jasa']); ?>
                                    </td>

                                    <td>
                                        <?php echo $waktu; ?> Jam
                                    </td>
                                    <td>
                                        <a href="edit_servis.php?id=<?= $idservis; ?>"><i class="bi bi-pencil-fill"></i></a>
                                        |
                                        <a style="text-decoration: none;"
                                            href="../controller/controller_servis.php?idservis=<?= $idservis; ?>"
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

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Input Servis</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="" method="post">
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="jservis" class="form-label">Jenis Servis</label>
                                <input type="text" class="form-control" id="jservis" name="jenis"
                                    placeholder="masukkan jenis servis">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                    placeholder="masukkan deskripsi servis"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga Jasa</label>
                                <input type="number" class="form-control" name="harga_jasa" id="harga"
                                    placeholder="masukkan nominal harga jasa servis">
                            </div>

                            <div class="mb-3">
                                <label for="waktu_pengerjaan" class="form-label">Waktu Pengerjaan (dalam menit)</label>
                                <input type="number" class="form-control" name="waktu_pengerjaan" id="waktu_pengerjaan"
                                    placeholder="masukkan waktu pengerjaan servis dalam menit">
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" name="submit_servis" class="btn btn-primary" data-bs-dismi
                                ss="modal">Kirim</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>

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