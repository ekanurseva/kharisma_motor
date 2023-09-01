<?php
    require_once('../controller/controller_sparepart.php');

    $kendaraan = query("SELECT * FROM jenis_kendaraan");

    $keluhan = query("SELECT * FROM jenis_keluhan");

    if (isset($_POST["submit_sparepart"])) {
        if (input_sparepart($_POST) > 0) {
            echo "
            <script>
            alert('Data Berhasil Ditambah');
            document.location.href='sparepart.php';
            </script>
            ";
        } else {
            echo "<script>
            alert('Data Gagal Ditambah');
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

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <!-- Navbar -->
    <?php require_once('../navbar/navbar_admin.php') ?>
    <!-- Navbar Selesai -->

    <!-- Content -->
    <div class="container">
        <div class="content py-3">
            <div class="title text-center text-uppercase">
                <h4>INPUR DATA SPAREPART</h4>
            </div>
            <div class="box mt-4 mx-4">
                <form method="post" action="">
                    
                    <div class="mb-3">
                        <label for="kendaraan" class="form-label">Jenis Kendaraan</label>
                        <select class="form-control" name="kendaraan" require style="border: 0.3px solid black;" id="kendaraan">
                            <option hidden selected>--Pilih Jenis Kendaraan--</option>
                            <?php foreach ($kendaraan as $k): ?>
                                <option value="<?= $k['idkendaraan'] ?>"><?= $k['nama_kendaraan'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    

                    <div class="mb-3">
                        <label for="sparepart" class="form-label">Sparepart</label>
                        <input type="text" name="sparepart" class="form-control" id="sparepart"
                            placeholder="masukkan nama sparepart">
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"
                            placeholder="masukkan deskripsi sparepart"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" id="harga"
                            placeholder="masukkan nominal harga sparepart">
                    </div>

                    <button type="submit" name="submit_sparepart" class="btn btn-primary w-100">
                        Submit
                    </button>
                </form>
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