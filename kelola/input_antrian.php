<?php
require_once('../controller/function.php');

// Seluruh data keluhan dibagi menjadi 2 kolom
$data_keluhan = jumlah_data("SELECT * FROM jenis_keluhan");
$data1 = ceil($data_keluhan / 2);
$data2 = $data_keluhan - $data1;
$kumpul1 = query("SELECT * FROM jenis_keluhan LIMIT $data1");
$kumpul2 = query("SELECT * FROM jenis_keluhan LIMIT $data2 OFFSET $data1");

$id = dekripsi($_COOKIE['KMmz19']);
$user = query("SELECT * FROM pengguna WHERE idpengguna = $id")[0];

if (isset($_POST['submitBtn'])) {
    // Mengambil data servis dari database
    $idkeluhan = query("SELECT * FROM jenis_keluhan WHERE idjkeluhan")[0];
    $sql = "SELECT * FROM servis WHERE idservis = $idkeluhan";

    var_dump($sql);
    $result = mysqli_query($conn, $sql);

    // Mendapatkan elemen div yang berisi checkbox yang dipilih
    $selectedCheckboxes = $_POST['keluhan'];

    // Mendapatkan elemen tbody dari tabel hasil
    $resultTableBody = '';

    // Counter untuk nomor urut
    $counter = 1;

    // Loop melalui checkbox yang dipilih
    while ($row = mysqli_fetch_assoc($result)) {
        if (in_array($row['idservis'], $selectedCheckboxes)) {
            $jenisServis = $row['jenis_servis'];
            $harga = $row['harga_servis'];

            // Membuat baris baru dalam tabel hasil
            $resultTableBody .= '<tr>
                                    <td>' . $counter . '</td>
                                    <td>' . $jenisServis . '</td>
                                    <td>Rp ' . $harga . '</td>
                                 </tr>';

            $counter++;
        }
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

            <h6 class="mt-3">progress-bar</h6>
            <!-- Previous markup -->
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: 25%"
                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="mt-3">
                <p style="text-align: justify; padding: 0 13px; margin-top: 35px;">Masukkan Identitas dan Data Kendaraan
                    Anda Di Sini Untuk Mendaftar Antrian dan Mendapat Nomor
                    Antrian</p>
                <div class="identitas px-3">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="masukkan nama anda">
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">No. Handphone</label>
                        <input type="text" class="form-control" id="telepon" placeholder="masukkan nama anda">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="kendaraan" class="form-label">Jenis Kendaraan</label>
                                <input type="text" class="form-control" id="kendaraan"
                                    placeholder="masukkan kendaraan anda">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="no_pol" class="form-label">Nomor Polisi</label>
                                <input type="text" class="form-control" id="no_pol"
                                    placeholder="masukkan no polisi anda">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="3"
                            placeholder="masukkan alamat anda"></textarea>
                    </div>
                </div>
                <div class="tombol text-center px-3 justify-content-end">
                    <a href="estimasi.php" style="text-decoration: none; color: white;">
                        <button type="button" class="btn py-2 btn-success w-50">
                            NEXT
                        </button>
                    </a>
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
</body>

</html>