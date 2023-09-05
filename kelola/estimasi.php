<?php
require_once('../controller/controller_transaksi.php');
validasi();

if (!isset($_GET['key'])) {
    header("Location: input_antrian.php");
}
$idantrian = dekripsi($_GET['key']);

$data_antrian = query("SELECT * FROM antrian WHERE id_antrian = $idantrian")[0];
$data_transaksi = query("SELECT * FROM transaksi WHERE idantrian = $idantrian");
$jumlah_transaksi = jumlah_data("SELECT * FROM transaksi WHERE idantrian = $idantrian");

$waktu = strftime('%d %B %Y', strtotime($data_antrian['tanggal']));

$idkendaraan = $data_antrian['id_kendaraan'];

$id = dekripsi($_COOKIE['KMmz19']);
$user = query("SELECT * FROM pengguna WHERE idpengguna = $id")[0];

if ($jumlah_transaksi == 0) {
    if ($user['level'] === "User") {
        echo "
                <script>
                    document.location.href='../user';
                </script>
            ";
    } elseif ($user['level'] === "Admin") {
        echo "
                <script>
                    document.location.href='../admin';
                </script>
            ";
    } elseif ($user['level'] === "Kasir") {
        echo "
                <script>
                    document.location.href='../kasir';
                </script>
            ";
    }
}

$total = 0;

$kode_transaksi = kode_transaksi();



if (isset($_POST['cek_estimasi'])) {
    $estimasi_waktu = estimasi_waktu($data_antrian);
    $waktu_estimasi = date('Y-m-d H:i:s', $estimasi_waktu);
    if (isset($_POST['keluhan'])) {
        $sparepart = cek_estimasi_sparepart($_POST);
    }
}

if (isset($_POST['submit_estimasi'])) {
    create_transaksi($_POST);
    echo "
            <script>
                alert('Antrian sudah terdaftar');
            </script>
        ";

    if ($user['level'] === "User") {
        echo "
                <script>
                    document.location.href='../user';
                </script>
            ";
    } elseif ($user['level'] === "Admin") {
        echo "
                <script>
                    document.location.href='../admin';
                </script>
            ";
    } elseif ($user['level'] === "Kasir") {
        echo "
                <script>
                    document.location.href='../kasir';
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
                        Keluhan Mengenai Permasalahan Servis Kendaraan Anda, Sistem Akan Mendiagnosa Jenis Servis yang
                        Perlu Dilakukan yang Ditunjukkan pada Estimasi Nota</p>
                    <form method="post" action="">
                        <input type="hidden" name="idantrian" value="<?= $idantrian; ?>">
                        <input type="hidden" name="kode_transaksi" value="<?= $kode_transaksi; ?>">
                        <div class="row">
                            <div class="col">
                                <div class="keluhan px-3">
                                    <?php
                                    foreach ($data_transaksi as $daan):
                                        if ($daan['idservis'] != NULL):
                                            $idservis = $daan['idservis'];
                                            $data_servis = query("SELECT * FROM servis WHERE idservis = $idservis")[0];
                                            $data_keluhan = query("SELECT * FROM jenis_keluhan WHERE idservis = $idservis");
                                            $jumlah_keluhan = jumlah_data("SELECT * FROM jenis_keluhan WHERE idservis = $idservis");
                                            ?>
                                            <?php
                                            if ($jumlah_keluhan > 0): ?>
                                                <h3 class="mt-3">
                                                    <?= $data_servis['jenis_servis']; ?>
                                                </h3>
                                                <?php foreach ($data_keluhan as $k2):

                                                    ?>

                                                    <?php
                                                    if (isset($_POST['keluhan'])):
                                                        $cek = in_array($k2['idkeluhan'], $_POST['keluhan']) ? "checked" : " ";
                                                        if ($cek == "checked"):
                                                            ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="keluhan[]"
                                                                    data-idjkeluhan="<?php echo $k2['idkeluhan']; ?>"
                                                                    id="keluhan<?php echo $k2['idkeluhan']; ?>"
                                                                    value="<?php echo $k2['idkeluhan']; ?>" checked>
                                                                <label class="form-check-label" for="keluhan<?php echo $k2['idkeluhan']; ?>">
                                                                    <?php echo $k2['keluhan']; ?>
                                                                </label>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="keluhan[]"
                                                                    data-idjkeluhan="<?php echo $k2['idkeluhan']; ?>"
                                                                    id="keluhan<?php echo $k2['idkeluhan']; ?>"
                                                                    value="<?php echo $k2['idkeluhan']; ?>">
                                                                <label class="form-check-label" for="keluhan<?php echo $k2['idkeluhan']; ?>">
                                                                    <?php echo $k2['keluhan']; ?>
                                                                </label>
                                                            </div>
                                                            <?php
                                                        endif;

                                                        ?>
                                                    <?php else: ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="keluhan[]"
                                                                data-idjkeluhan="<?php echo $k2['idkeluhan']; ?>"
                                                                id="keluhan<?php echo $k2['idkeluhan']; ?>"
                                                                value="<?php echo $k2['idkeluhan']; ?>">
                                                            <label class="form-check-label" for="keluhan<?php echo $k2['idkeluhan']; ?>">
                                                                <?php echo $k2['keluhan']; ?>
                                                            </label>
                                                        </div>
                                                        <?php
                                                    endif;
                                                endforeach;
                                            endif;
                                            ?>
                                            <?php
                                        endif;
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="tombol text-center pt-4">
                            <p style="font-size: 12px;">Klik Submit untuk melihat Estimasi Nota</p>
                            <button type="submit" class="btn btn-outline-success w-50 mx-3" style="margin-top: -10px;"
                                id="submitBtn" name="cek_estimasi">
                                Cek Estimasi Nota
                            </button>
                        </div>
                        <div style="margin: 0 70px;">
                            <?php if (isset($_POST['cek_estimasi'])): ?>
                                <h5 class="px-3 mt-4 d-flex justify-content-center">Estimasi Nota</h5>
                                <div class="nota px-3 ms-3 me-3">
                                    <p class="fw-semibold mt-3">Kharisma Motor</p>
                                    <p class="text-end" style="margin-top: -10px;">Playangan,
                                        <?= $waktu; ?>
                                    </p>
                                    <div class="row text-center fw-semibold">
                                        <div class="col-6 text-start fw-bold">
                                            <p>
                                                <?= $data_antrian['nama_pelanggan']; ?>
                                            </p>
                                        </div>
                                    </div>

                                    <p class="text-end">Estimasi selesai :
                                        <?= $waktu_estimasi; ?>
                                    </p>

                                    <table class="table" id="resultTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis Servis</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $j = 1; foreach ($data_transaksi as $dat):
                                                if ($dat['idservis'] != NULL):
                                                    $idservis2 = $dat['idservis'];
                                                    $data_servis2 = query("SELECT * FROM servis WHERE idservis = $idservis2")[0];
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?= $j; ?>
                                                        </td>
                                                        <td>
                                                            <?= $data_servis2['jenis_servis']; ?>
                                                        </td>
                                                        <td>Rp
                                                            <?= number_format($data_servis2['harga_jasa']); ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $total += $data_servis2['harga_jasa'];
                                                    $j++;
                                                endif;
                                            endforeach;
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php if (isset($_POST['keluhan'])): ?>
                                        <table class="table" id="resultTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Sparepart</th>
                                                    <th>Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($k = 0; $k < count($sparepart); $k++):
                                                    $idsparepart = $sparepart[$k];
                                                    $data_sparepart = query("SELECT * FROM sparepart WHERE idsparepart = $idsparepart")[0];

                                                    $data_harga = query("SELECT * FROM harga_sparepart WHERE idkendaraan = '$idkendaraan' AND idsparepart = '$idsparepart'")[0];

                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?= $k + 1; ?>
                                                        </td>
                                                        <td>
                                                            <?= $data_sparepart['sparepart']; ?>
                                                        </td>
                                                        <td>Rp
                                                            <?= number_format($data_harga['harga']); ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $total += $data_harga['harga'];
                                                endfor;
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>

                                    <h4 class="text-end my-3">Total : Rp
                                        <?= number_format($total); ?>
                                    </h4>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="tombol text-center px-3 justify-content-end mt-3">
                            <button type="submit" name="submit_estimasi" class="btn py-2 btn-success w-50">
                                Daftar
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