<?php
require_once('../controller/controller_keluhan.php');

$idkeluhan = dekripsi($_GET['id']);
$data = query("SELECT * FROM jenis_keluhan WHERE idkeluhan = $idkeluhan")[0];

$idservis = mysqli_query($conn, "SELECT * FROM servis ORDER BY idservis DESC");

if (isset($_POST['submit_keluhan'])) {
    if (edit_keluhan($_POST) > 0) {
        echo "
                <script>
                alert('Data Berhasil Diubah');
                document.location.href='keluhan.php';
                </script>
            ";
    } else {
        echo "
                <script>
                alert('Data Gagal Diubah');
                document.location.href='keluhan.php';
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
                <h4>EDIT DATA KELUHAN</h4>
            </div>
            <div class="box mt-4 mx-4">
                <form method="post" action="">
                    <input type="hidden" name="idkeluhan" value="<?php echo $data['idkeluhan']; ?>">
                    <input type="hidden" name="oldkeluhan" value="<?php echo $data['keluhan']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Jenis Servis</label>
                        <select class="form-control" name="idservis" require style="border: 0.3px solid black;">
                            <option value="" hidden selected>Servis 1</option>
                            <?php foreach ($idservis as $servis): ?>
                                <option value="<?php echo $servis['idservis'] ?>" <?php echo ($servis['idservis'] == $data['idservis']) ? 'selected' : ''; ?>><?php echo $servis['jenis_servis'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Sparepart</label>
                        <select class="form-control" name="idservis" require style="border: 0.3px solid black;">
                            <option value="" hidden selected>Sparepart 1</option>
                            <?php foreach ($idservis as $servis): ?>
                                <option value="<?php echo $servis['idservis'] ?>" <?php echo ($servis['idservis'] == $data['idservis']) ? 'selected' : ''; ?>><?php echo $servis['jenis_servis'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="keluhan" class="form-label">Jenis Keluhan</label>
                        <textarea type="text" name="keluhan" rows="3" class="form-control" id="keluhan"
                            placeholder="masukkan keluhan"><?php echo $data['keluhan']; ?></textarea>
                    </div>

                    <button type="submit" name="submit_keluhan" class="btn btn-primary w-100">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>\
</body>

</html>