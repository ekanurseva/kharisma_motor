<?php
    require_once('../controller/controller_transaksi.php');
    cek_transaksi();

    // Seluruh data keluhan dibagi menjadi 2 kolom
    $nopol = dekripsi($_GET['key']);
    $antrian = query("SELECT * FROM antrian WHERE nopol = '$nopol' AND id_antrian = (SELECT MAX(id_antrian) FROM antrian WHERE nopol = '$nopol')") [0];
    $idantrian = $antrian['id_antrian'];

    $kode_transaksi = kode_transaksi();

    $data_servis = jumlah_data("SELECT * FROM servis");
    $data1 = ceil($data_servis / 2);
    $data2 = $data_servis - $data1;
    $kumpul1 = query("SELECT * FROM servis LIMIT $data1");
    $kumpul2 = query("SELECT * FROM servis LIMIT $data2 OFFSET $data1");

    $id = dekripsi($_COOKIE['KMmz19']);
    $user = query("SELECT * FROM pengguna WHERE idpengguna = $id")[0];

    if(isset($_POST['submit'])) {
        if(create_transaksi($_POST) > 0) {
            // $nopol = enkripsi($_POST['nopol']);
            // header("Location: servis.php?key=" . $nopol);
            header("Location: estimasi.php");
        } else {
            // header("Location: input_antrian.php");
            header("Location: servis.php?key=" . $_GET['key']);
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

            <div class="row">
                <div class="mt-2">
                    <p style="text-align: justify; padding: 0 13px; margin-top: 10px; margin-bottom: 5px;">Pilih Jenis
                        Keluhan Mengenai PermasalahanKendaraan Anda, Sistem Akan Mendiagnosa Jenis Servis yang Perlu
                        Dilakukan yang Ditunjukkan pada Estimasi Nota</p>
                    <form method="post" action="">
                        <input type="hidden" name="idantrian" value="<?= $idantrian; ?>">
                        <input type="hidden" name="kode_transaksi" value="<?= $kode_transaksi; ?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="keluhan px-3">
                                    <?php
                                    foreach ($kumpul1 as $k1):
                                        ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="servis[]" id="servis<?php echo $k1['idservis']; ?>" value="<?php echo $k1['idservis']; ?>">
                                            <label class="form-check-label" for="servis<?php echo $k1['idservis']; ?>">
                                                <?php echo $k1['jenis_servis']; ?>
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
                                            <input class="form-check-input" type="checkbox" name="servis[]" id="servis<?php echo $k2['idservis']; ?>" value="<?php echo $k2['idservis']; ?>">
                                            <label class="form-check-label" for="servis<?php echo $k2['idservis']; ?>">
                                                <?php echo $k2['jenis_servis']; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="tombol text-center px-3 justify-content-end mt-3">
                            <button type="submit" name="submit" class="btn py-2 btn-success w-50">
                                Lanjutkan
                            </button>
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
    <script>
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
    </script>

</body>

</html>