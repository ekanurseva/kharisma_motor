<?php
    require_once "../controller/controller_transaksi.php";
    validasi_no_user();

    $id = dekripsi($_COOKIE['KMmz19']);
    $user = query("SELECT * FROM pengguna WHERE idpengguna = $id")[0];

    $idtransaksi = dekripsi($_GET['id']);
    $data_antrian = query("SELECT * FROM antrian WHERE id_antrian = '$idtransaksi'")[0];

    $idkendaraan = $data_antrian['id_kendaraan'];

    $idantrian = $data_antrian['id_antrian'];
    $data_transaksi = query("SELECT * FROM transaksi WHERE idantrian = '$idantrian'");
    
    $servis = cari_servis($data_transaksi);

    $total = 0;
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
            <div class="title text-center text-uppercase">
                <h4>DETAIL TRANSAKSI</h4>
            </div>
            <div class="konten py-4">
                <div class="row">
                    <div class="col-6 mt-2">
                        <div class="row">
                            <div class="col-3">
                                <h6>Pelanggan</h6>
                            </div>
                            <div class="col-5">
                                <h6>:
                                    <?= $data_antrian['nama_pelanggan']; ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="row">
                            <div class="col-3">
                                <h6>Status Antrian</h6>
                            </div>
                            <div class="col-7">
                                <h6>: Menunggu Antrian
                                    <button style="border: none; background: none;"><i
                                            class="bi bi-pencil-fill"></i></button>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-sm btn-success">
                            <a class="text-decoration-none text-white" href="#">Cetak Struk</a>
                        </button>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-3">
                            <h6>Kode Transaksi</h6>
                        </div>
                        <div class="col-5">
                            <h6>:
                                <?= $data_transaksi[0]['kode_transaksi']; ?>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-3">
                            <h6>Tanggal Pendaftaran</h6>
                        </div>
                        <div class="col-5">
                            <h6>:
                                <?= $data_antrian['tanggal']; ?>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-3">
                            <h6>Estimasi Waktu Pengerjaan</h6>
                        </div>
                        <div class="col-5">
                            <h6>:
                                <?= $data_transaksi[0]['tanggal']; ?>
                            </h6>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary mt-3">
                    <a href="input_detail_transaksi.php" style="text-decoration: none; color: white; padding: 0 20px;">
                        Input Servis & Separepart Tambahan
                    </a>
                </button>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Servis</th>
                        <th>Sparepart</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 1;
                        foreach ($servis as $ser) : 
                            $data_servis = query("SELECT * FROM servis WHERE idservis = $ser")[0];
                    ?>
                        <tr>
                            <th><?= $i; ?></th>
                            <td><?= $data_servis['jenis_servis']; ?></td>
                            <td>-</td>
                            <td>Rp <?= number_format($data_servis['harga_jasa']); ?></td>
                            <td>
                                <a style="text-decoration: none;" href="#"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data?')">
                                    <i class="bi bi-trash-fill"></i></a>
                            </td>
                            <?php $total += $data_servis['harga_jasa']; ?>
                        </tr>
                    <?php 
                        $i++;
                        endforeach; 
                    ?>

                    <?php 
                        foreach($data_transaksi as $trans) : 
                            if($trans['idsparepart'] != NULL) :
                                $idsparepart = $trans['idsparepart'];
                                $data_sparepart = query("SELECT * FROM sparepart WHERE idsparepart = $idsparepart")[0];

                                $data_harga = query("SELECT * FROM harga_sparepart WHERE idkendaraan = $idkendaraan AND idsparepart = $idsparepart")[0];
                    ?>
                        <tr>
                            <th><?= $i; ?></th>
                            <td>-</td>
                            <td><?= $data_sparepart['sparepart']; ?></td>
                            <td>Rp <?= number_format($data_harga['harga']); ?></td>
                            <td>
                                <a style="text-decoration: none;" href="#"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data?')">
                                    <i class="bi bi-trash-fill"></i></a>
                            </td>
                            <?php $total += $data_harga['harga']; ?>
                        </tr>
                    <?php 
                            $i++;
                            endif;
                        endforeach;
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <th>Total Pembayaran</th>
                        <th>Rp <?= number_format($total); ?></th>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <button class="btn btn-success">Bayar</button>
            </div>

            <h3>Keluhan</h3>
            <ul>
                <?php 
                    foreach($data_transaksi as $datrans) : 
                        if($datrans['idkeluhan'] != NULL) :
                            $idkeluhan = $datrans['idkeluhan'];
                            $keluhan = query("SELECT * FROM jenis_keluhan WHERE idkeluhan = $idkeluhan")[0];
                ?>
                    <li><?= $keluhan['keluhan']; ?></li>
                <?php 
                        endif;
                    endforeach; 
                ?>
            </ul>
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