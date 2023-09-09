<?php
require_once('../controller/controller_antrian.php');

// Seluruh data keluhan dibagi menjadi 2 kolom
$id = dekripsi($_COOKIE['KMmz19']);
$user = query("SELECT * FROM pengguna WHERE idpengguna = $id")[0];

$data_kendaraan = query("SELECT * FROM jenis_kendaraan");

$kode = kode_antrian();

if (isset($_POST['submit_antrian'])) {
    if (input_antrian($_POST) > 0) {
        $nopol = enkripsi($_POST['nopol']);
        header("Location: servis.php?key=" . $nopol);
    } else {
        header("Location: input_antrian.php");
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
    if ($user['level'] === "User") {
        require_once('../navbar/navbar_user.php');
    } elseif ($user['level'] === "Admin") {
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
                <h4>INPUT DAFTAR ANTRIAN</h4>
            </div>

            <div class="mt-3">
                <p style="text-align: justify; padding: 0 13px; margin-top: 35px;">Masukkan Identitas dan Data Kendaraan
                    Anda Di Sini Untuk Mendaftar Antrian dan Mendapat Nomor
                    Antrian
                </p>

                <form action="" method="post">
                    <input type="hidden" name="no_antrian" value="<?= $kode; ?>">
                    <div class="identitas px-3">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <?php if ($user['level'] == "User"): ?>
                                <input type="text" class="form-control" style="background-color:gainsboro;" id="nama"
                                    value="<?= $user['nama']; ?>" readonly name="nama_pelanggan">
                            <?php else: ?>
                                <input type="text" class="form-control" id="nama" placeholder="masukkan nama anda"
                                    name="nama_pelanggan" required>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label">No. Handphone</label>
                            <input type="text" class="form-control" id="telepon"
                                placeholder="masukkan No.Handphone yang bisa dihubungi" name="no_hp" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="kendaraan" class="form-label">Jenis Kendaraan</label>
                                    <select style="border: 0.5px solid black;" name="kendaraan" id=""
                                        class="form-control" required>
                                        <option value="" selected hidden>--Pilih Jenis Kendaraan Anda--</option>
                                        <?php 
                                            foreach ($data_kendaraan as $kendaraan): 
                                                $idkendaraan = $kendaraan['idkendaraan'];
                                                $jumlah_harga = jumlah_data("SELECT * FROM harga_sparepart WHERE idkendaraan = $idkendaraan");
                                                if($jumlah_harga > 0) :
                                        ?>
                                            <option value="<?= $kendaraan['idkendaraan']; ?>"><?= $kendaraan['nama_kendaraan']; ?></option>
                                        <?php 
                                                endif;
                                            endforeach; 
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="no_pol" class="form-label">Nomor Polisi</label>
                                    <input type="text" class="form-control" id="no_pol"
                                        placeholder="masukkan no polisi anda" name="nopol" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" rows="3" placeholder="masukkan alamat anda"
                                name="alamat" required></textarea>
                        </div>
                    </div>
                    <div class="tombol text-center px-3 justify-content-end">
                        <button type="submit" class="btn py-2 btn-success w-50" name="submit_antrian">
                            NEXT
                        </button>
                    </div>
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
</body>

</html>