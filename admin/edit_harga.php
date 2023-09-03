<?php
    require_once('../controller/controller_harga.php');
    validasi_admin();

    $idharga = dekripsi($_GET['id']);
    $data = query("SELECT * FROM harga_sparepart WHERE idharga = $idharga")[0];

    $sparepart = query("SELECT * FROM sparepart");
    $kendaraan = query("SELECT * FROM jenis_kendaraan");

    if (isset($_POST['submit_harga'])) {
        if (edit_harga($_POST) > 0) {
            echo "
                    <script>
                    alert('Data Berhasil Diubah');
                    document.location.href='harga_sparepart.php';
                    </script>
                ";
        } else {
            echo "
                    <script>
                    alert('Data Gagal Diubah');
                    document.location.href='harga_sparepart.php';
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
    <!-- Navbar -->
    <?php require_once('../navbar/navbar_admin.php') ?>
    <!-- Navbar Selesai -->

    <!-- Content -->
    <div class="container">
        <div class="content py-3">
            <div class="title text-center text-uppercase">
                <h4>EDIT DATA HARGA SPAREPART</h4>
            </div>
            <div class="box mt-4 mx-4">
                <form method="post" action="">
                    <input type="hidden" name="idharga" value="<?= $data['idharga']; ?>">
                    <input type="hidden" name="idkendaraanold" value="<?= $data['idkendaraan']; ?>">
                    <input type="hidden" name="idsparepartold" value="<?= $data['idsparepart']; ?>">

                    <div class="mb-3">
                        <label for="idsparepart">Jenis Sparepart</label>
                        <select class="form-select" id="idsparepart" aria-label="Default select example" name="idsparepart">
                            <?php foreach ($sparepart as $s): ?>
                                <option value="<?= $s['idsparepart']; ?>" <?php echo ($s['idsparepart'] == $data['idsparepart']) ? 'selected' : ''; ?>><?= $s['sparepart']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="idkendaraan">Jenis Kendaraan</label>
                        <select class="form-select" id="idkendaraan" aria-label="Default select example" name="idkendaraan">
                            <?php foreach ($kendaraan as $k): ?>
                                <option value="<?= $k['idkendaraan']; ?>" <?php echo ($k['idkendaraan'] == $data['idkendaraan']) ? 'selected' : ''; ?>><?= $k['nama_kendaraan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga">Harga :</label>
                        <input class="form-control" id="harga" value="<?= $data['harga']; ?>"
                            name="harga">
                    </div>

                    <button type="submit" name="submit_harga" class="btn btn-primary w-100">
                        Update
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