<?php
require_once "../controller/function.php";
validasi_no_user();

$id = dekripsi($_COOKIE['KMmz19']);
$user = query("SELECT * FROM pengguna WHERE idpengguna = $id")[0];

$antrian = query("SELECT * FROM antrian");

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
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
                <h4>DAFTAR ANTRIAN</h4>
            </div>
            <div class="konten py-4">
                <a href="input_antrian.php">
                    <button type="button" class="btn btn-primary">
                        Input Antrian
                    </button>
                </a>
            </div>

            <table class="table table-hover" id="example">
                <thead>
                    <tr>
                        <th scope="col">No Antrian</th>
                        <th scope="col">Atas Nama</th>
                        <th scope="col">Status Antrian</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($antrian as $s):
                        $enkripsi = enkripsi($s['id_antrian']);
                        ?>
                        <tr>
                            <th>
                                <?php echo $s['no_antrian']; ?>
                            </th>
                            <td>
                                <?php echo $s['nama_pelanggan']; ?>
                            </td>
                            <td>
                                <?= $s['status']; ?>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary"
                                    href="detail_transaksi.php?id=<?= $enkripsi; ?>">DETAIL</a>
                            </td>
                        </tr>
                        <?php
                    endforeach
                    ?>
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
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        // data tables
        $(document).ready(function () {
            $("#example").DataTable();
        });
    </script>
</body>

</html>