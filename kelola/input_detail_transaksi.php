<?php
    require_once "../controller/controller_transaksi.php";
    validasi_no_user();

    $id = dekripsi($_COOKIE['KMmz19']);
    $user = query("SELECT * FROM pengguna WHERE idpengguna = $id")[0];

    $sparepart = query("SELECT * FROM sparepart");
    $servis = query("SELECT * FROM servis");

    $idantrian = dekripsi($_GET['key']);
    
    $data_transaksi = query("SELECT * FROM transaksi WHERE idantrian = $idantrian")[0];

    if(isset($_POST['submit_sparepart'])) {
        if(tambah_sparepart($_POST) > 0) {
            echo "
                <script>
                    alert('Sparepart berhasil ditambahkan');
                    document.location.href='antrian.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Sparepart gagal ditambahkan');
                    document.location.href='antrian.php';
                </script>
            ";
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
            <div class="row">
                <div class="title text-center text-uppercase">
                    <h4>INPUT DETAIL TRANSAKSI</h4>
                </div>
                <div class="box mt-4 mx-4">
                    <form method="post" action="">
                        <input type="hidden" name="idantrian" value="<?= $idantrian; ?>">
                        <input type="hidden" name="kode_transaksi" value="<?= $data_transaksi['kode_transaksi']; ?>">
                        <div class="row g-3 align-items-center">
                            <div class="col-2">
                                <label for="jservis" class="form-label">Jenis Servis</label>
                            </div>
                            <div class="col-4">
                                <select class="form-select" aria-label="Default select example" name="servis">
                                    <?php foreach ($servis as $s): ?>
                                        <option value="<?= $s['idservis']; ?>">
                                            <?= $s['jenis_servis']; ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-6 mt-3 mb-5">
                            <button type="button" class="btn btn-primary w-100">
                                Tambah Servis
                            </button>
                        </div>
                    </form>

                    <form action="" method="post">
                        <input type="hidden" name="idantrian" value="<?= $idantrian; ?>">
                        <input type="hidden" name="kode_transaksi" value="<?= $data_transaksi['kode_transaksi']; ?>">
                        <div class="row g-3 align-items-center mt-2">
                            <div class="col-2">
                                <label for="jservis" class="form-label">Sparepart</label>
                            </div>
                            <div class="col-4">
                                <select class="form-select" aria-label="Default select example" name="sparepart">
                                    <?php foreach ($sparepart as $spr): ?>
                                        <option value="<?= $spr['idsparepart']; ?>">
                                            <?= $spr['sparepart']; ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-6 mt-3">
                            <button type="submit" class="btn btn-primary w-100" name="submit_sparepart">
                                Tambah Sparepart
                            </button>
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
    <script src="../script.js"></script>
</body>

</html>