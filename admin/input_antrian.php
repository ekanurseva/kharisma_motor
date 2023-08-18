<?php
require_once('../controller/function.php');

// Seluruh data keluhan dibagi menjadi 2 kolom
$data_keluhan = jumlah_data("SELECT * FROM jenis_keluhan");
$data1 = ceil($data_keluhan / 2);
$data2 = $data_keluhan - $data1;
$kumpul1 = query("SELECT * FROM jenis_keluhan LIMIT $data1");
$kumpul2 = query("SELECT * FROM jenis_keluhan LIMIT $data2 OFFSET $data1");


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
    <!-- Navbar -->
    <?php require_once('../navbar/navbar_admin.php') ?>
    <!-- Navbar Selesai -->

    <!-- Content -->
    <div class="container">
        <div class="content py-3">
            <div class="title text-center text-uppercase">
                <h4>INPUT DAFTAR ANTRIAN</h4>
            </div>
            <div class="row">
                <div class="mt-2">
                    <p style="text-align: justify; padding: 0 13px; margin-top: 10px; margin-bottom: 5px;">Pilih Jenis
                        Keluhan Mengenai Permasalahan
                        Kendaraan Anda, Sistem Akan
                        Mendiagnosa Jenis Servis yang Perlu Dilakukan dan Data Sparepart yang Dibutuhkan yang
                        Ditunjukkan pada Estimasi Nota</p>
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-6">
                                <div class="keluhan px-3">
                                    <?php
                                    foreach ($kumpul1 as $k1):
                                        ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="keluhan[]"
                                                data-idjkeluhan="<?php echo $k1['idjkeluhan']; ?>"
                                                id="keluhan<?php echo $k1['idjkeluhan']; ?>"
                                                value="<?php echo $k1['idjkeluhan']; ?>">
                                            <label class="form-check-label" for="keluhan<?php echo $k1['idjkeluhan']; ?>">
                                                <?php echo $k1['keluhan']; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="keluhan px-3">
                                    <?php foreach ($kumpul2 as $k2):
                                        ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="keluhan[]"
                                                data-idjkeluhan="<?php echo $k2['idjkeluhan']; ?>"
                                                id="keluhan<?php echo $k2['idjkeluhan']; ?>"
                                                value="<?php echo $k2['idjkeluhan']; ?>">
                                            <label class="form-check-label" for="keluhan<?php echo $k2['idjkeluhan']; ?>">
                                                <?php echo $k2['keluhan']; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="tombol text-center pt-4">
                        <p style="font-size: 12px;">Klik Submit untuk melihat Estimasi Nota</p>
                        <button type="button" class="btn btn-outline-success w-50 mx-3" style="margin-top: -10px;"
                            id="submitBtn">
                            Submit
                        </button>
                    </div>
                    <div style="margin: 0 70px;">
                        <h5 class="px-3 mt-4 d-flex justify-content-center">Estimasi Nota</h5>

                        <?php if (isset($_POST['submitBtn'])): ?>
                            <div class="nota px-3 ms-3 me-3">
                                <p class="fw-semibold mt-3">Kharisma Motor</p>
                                <p class="text-end" style="margin-top: -10px;">Playangan, 01 Juli 2023</p>
                                <div class="row text-center fw-semibold">
                                    <div class="col-6 text-start fw-bold">
                                        <p>Eka Nurseva S</p>
                                    </div>
                                </div>

                                <table class="tabel" id="resultTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Servis</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $resultTableBody; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <p style="text-align: justify; padding: 0 13px; margin-top: 35px;">Setelah Memilih Jenis Keluhan,
                    Masukkan Identitas dan Data Kendaraan Anda Di Sini Untuk Mendaftar Antrian dan Mendapat Nomor
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
                    <button type="button" class="btn py-2 btn-success w-50">
                        <a href="antrian.php" style="text-decoration: none; color: white;">
                            Daftar
                        </a>
                    </button>
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
    <!-- <script>
        document.getElementById("submitBtn").addEventListener("click", function () {
            // Mendapatkan elemen div yang berisi checkbox yang dipilih
            var checkboxes = document.querySelectorAll(".keluhan input[type=checkbox]:checked");

            // Mendapatkan elemen tbody dari tabel hasil
            var resultTableBody = document.getElementById("resultTable").getElementsByTagName('tbody')[0];

            // Menghapus data sebelumnya
            resultTableBody.innerHTML = "";

            // Counter untuk nomor urut
            var counter = 1;

            // Loop melalui checkbox yang dipilih
            checkboxes.forEach(function (checkbox) {
                // Mendapatkan nilai idjkeluhan dari data-attribute checkbox
                var idjkeluhan = checkbox.getAttribute("data-idjkeluhan");

                // Mendapatkan data jenis servis dan harga dari database berdasarkan idjkeluhan
                var jenisServis = $servis['jenis_servis']; // Isi dengan data jenis servis dari database berdasarkan idjkeluhan
                var harga = $servis['harga_jasa']; // Isi dengan data harga dari database berdasarkan idjkeluhan

                // Membuat baris baru dalam tabel hasil
                var newRow = resultTableBody.insertRow();

                // Membuat sel-sel dalam baris
                var noCell = newRow.insertCell(0);
                var jenisServisCell = newRow.insertCell(1);
                var jumlahCell = newRow.insertCell(2);

                // Menambahkan data ke dalam sel-sel
                noCell.innerHTML = counter;
                jenisServisCell.innerHTML = jenisServis;
                jumlahCell.innerHTML = "Rp " + harga;
                counter++;
            });
        });
    </script> -->

</body>

</html>