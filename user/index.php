<?php
require_once '../controller/controller_transaksi.php';
validasi();

$jumlah_antrian = jumlah_data("SELECT * FROM antrian WHERE status <> 'Selesai'");

$id = dekripsi($_COOKIE['KMmz19']);
$user = query("SELECT * FROM pengguna WHERE idpengguna = $id")[0];

$nama = $user['nama'];

$cari_antrian = jumlah_data("SELECT * FROM antrian WHERE nama_pelanggan = '$nama'");

if ($cari_antrian > 0) {
    $antrian = query("SELECT * FROM antrian WHERE nama_pelanggan = '$nama' AND id_antrian = (SELECT MAX(id_antrian) FROM antrian WHERE nama_pelanggan = '$nama')")[0];
    $idantrian = $antrian['id_antrian'];
    $idkendaraan = $antrian['id_kendaraan'];
    $nopol = enkripsi($antrian['nopol']);

    $cari_transaksi = jumlah_data("SELECT * FROM transaksi WHERE idantrian = $idantrian");
    if ($cari_transaksi > 0) {
        $data_transaksi = query("SELECT * FROM transaksi WHERE idantrian = $idantrian");

        $total = 0;
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <!-- Navbar -->
    <?php require_once('../navbar/navbar_user.php') ?>
    <!-- Navabar Selesai -->

    <!-- Content -->
    <div class="container">
        <div class="content py-3">
            <div class="title text-center text-uppercase">
                <h4>SELAMAT DATANG</h4>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="title text-center text-uppercase mt-3 mb-1">
                        <h5>BENGKEL MOBIL KHARISMA MOTOR</h5>
                    </div>
                    <div class="desk">
                        <div class="bg-image">
                        </div>
                        <h6 class="px-2 py-2" style="text-align: justify">Bengkel Mobil Kharisma Motor berdiri untuk
                            pertama
                            kalinya
                            pada tahun 1999 dengan nama Puji Motor yang terletak di jalan Raya Playangan, Gebang,
                            Cirebon.
                            Bengkel ini merupakan buah dari kerjakeras si pemilik bengkel tersebut yang bernama Bapak
                            Kasmari
                            yang merintis dari nol hingga saat ini.</h6>
                        <h6 class="px-2">Hubungi kontak ini : 0812-1419-7766</h6>
                        <span class="px-2 fw-semibold" style="color: black; font-size: 16px; text-align: justify">Untuk
                            menemukan alamat Bengkel Mobil Kharisma Motor <a
                                href="https://maps.app.goo.gl/hKiYp4xWJxwEM4ar7" style="text-decoration: none;"
                                target="_blank">Klik Di Sini</a></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="title text-center text-uppercase mt-3 mb-1">
                        <h5>DAFTAR ANTRIAN</h5>
                    </div>

                    <div class="card mt-3">
                        <h5 class="ms-3 mt-3 card-title">Jumlah Antrian Yang Ada</h5>
                        <div class="d-flex justify-content-between align-items-center mx-3">
                            <h1>
                                <?= $jumlah_antrian; ?>
                            </h1>
                            <i class="bi bi-people-fill" style="font-size: 100px;"></i>
                        </div>
                        <a href="../kelola/input_antrian.php" class="btn btn-primary mx-1 mb-1">Daftar Antrian</a>
                    </div>
                    <!-- <table class="tabel" id="example">
                        <thead>
                            <tr>
                                <th>No Antrian</th>
                                <th>Status Antrian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    1
                                </td>
                                <td>
                                    Dalam Pengerjaan
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    2
                                </td>
                                <td>
                                    Menunggu Suku Cadang
                                </td>
                            </tr>
                        </tbody>
                    </table> -->

                    <?php if ($cari_antrian > 0): ?>
                        <!-- Muncul ketika sudah daftar -->
                        <div class="title text-center text-uppercase mt-3 mb-1">
                            <h5>ANTRIAN TERAKHIR SAYA</h5>
                        </div>

                        <div class="row">
                            <div class="col-4 mt-3">
                                <div class="text-center mt-1">
                                    <h6 class="fw-bold">No Antrian</h6>
                                </div>
                                <div class="text-center">
                                    <h6>
                                        <?= $antrian['no_antrian']; ?>
                                    </h6>
                                </div>
                                <div class="text-center mt-3">
                                    <h6 class="fw-bold">Status Antrian</h6>
                                </div>
                                <div class="text-center">
                                    <span style="font-size: 14px; font-weight: 600;">
                                        <?= $antrian['status']; ?>
                                    </span>
                                </div>
                                <div class="text-center mt-3">
                                    <h6 class="fw-bold">Estimasi Waktu Selesai</h6>
                                </div>
                                <div class="text-center">
                                    <span style="font-size: 15px; font-weight: 600;">
                                        11.00
                                    </span>
                                </div>

                            </div>

                            <?php if ($cari_transaksi > 0): ?>
                                <div class="col-8">
                                    <h5 class="px-3 mt-3 d-flex justify-content-center">Estimasi Nota</h5>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis Servis</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($data_transaksi as $dat):
                                                if ($dat['idservis'] != NULL):
                                                    $idservis = $dat['idservis'];
                                                    $data_servis = query("SELECT * FROM servis WHERE idservis = $idservis")[0];
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?= $i; ?>
                                                        </td>
                                                        <td>
                                                            <?= $data_servis['jenis_servis']; ?>
                                                        </td>
                                                        <td>Rp
                                                            <?= number_format($data_servis['harga_jasa']); ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $total += $data_servis['harga_jasa'];
                                                    $i++;
                                                endif;
                                            endforeach;
                                            ?>
                                        </tbody>
                                    </table>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Sparepart</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $j = 1; foreach ($data_transaksi as $dt):
                                                if ($dt['idsparepart'] != NULL):
                                                    $idsparepart = $dt['idsparepart'];
                                                    $data_sparepart = query("SELECT * FROM sparepart WHERE idsparepart = $idsparepart")[0];

                                                    $data_harga = query("SELECT * FROM harga_sparepart WHERE idkendaraan = $idkendaraan AND idsparepart = $idsparepart")[0];
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?= $j; ?>
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
                                                    $j++;
                                                endif;
                                            endforeach;
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td class="fw-bold">Total</td>
                                                <td class="fw-bold">Rp
                                                    <?= number_format($total); ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else: ?>
                                <div class="col-8">
                                    <h5>Anda sudah mendaftar antrian, tapi belum memilih servis dan keluhan</h5>

                                    <a href="../kelola/servis.php?key=<?= $nopol; ?>" class="btn btn-primary">Klik disini untuk
                                        memilih servis</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
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
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        // data tables
        $(document).ready(function () {
            $("#example").DataTable();
        });
    </script>
</body>

</html>