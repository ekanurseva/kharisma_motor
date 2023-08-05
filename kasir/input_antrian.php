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
    <?php require_once('../navbar/navbar_kasir.php') ?>
    <!-- Navbar Selesai -->

    <!-- Content -->
    <div class="container">
        <div class="content py-3">
            <div class="title text-center text-uppercase">
                <h4>INPUT DAFTAR ANTRIAN</h4>
            </div>
            <div class="row">
                <div class="col-6">
                    <p style="text-align: justify; padding: 20px 13px;">Pilih Jenis Keluhan Mengenai Permasalahan
                        Kendaraan Anda, Sistem Akan
                        Mendiagnosa Jenis Servis yang Perlu Dilakukan dan Data Sparepart yang Dibutuhkan yang
                        Ditunjukkan pada Estimasi Nota</p>
                    <div class="row">
                        <div class="col-6">
                            <div class="keluhan px-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="keluhan1" id="keluhan1">
                                    <label class="form-check-label" for="keluhan1">
                                        Keluhan 1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="keluahan2" id="keluahan2"
                                        checked>
                                    <label class="form-check-label" for="keluahan2">
                                        Keluhan 2
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="keluhan px-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="keluhan3" id="keluhan3">
                                    <label class="form-check-label" for="keluhan3">
                                        Keluhan 3
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="keluhan4" id="keluhan4" checked>
                                    <label class="form-check-label" for="keluhan4">
                                        Keluhan 4
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tombol text-center pt-4">
                        <p style="font-size: 12px;">Klik Submit untuk melihat Estimasi Nota</p>
                        <button type="button" class="btn btn-outline-success w-100 mx-3" style="margin-top: -10px;">
                            Submit
                        </button>
                    </div>
                    <h6 class="px-3 mt-4">Estimasi Nota</h6>
                    <div class="nota px-3 ms-3 me-3">
                        <p class="fw-semibold mt-3">Kharisma Motor</p>
                        <p class="text-end" style="margin-top: -10px;">Playangan, 01 Juli 2023</p>
                        <div class="row text-center fw-semibold">
                            <div class="col-6">
                                <p>Eka Nurseva</p>
                            </div>
                            <div class="col-6">
                                <p>Honda</p>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Jenis Servis</th>
                                    <th scope="col">Sparepart</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Benerin Ban</td>
                                    <td>Ban</td>
                                    <td>Rp 200.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Benerin Ban</td>
                                    <td>Ban</td>
                                    <td>Rp 200.000</td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Total Pembayaran</th>
                                    <th>Rp 400.000</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-6">
                    <p style="text-align: justify; padding: 20px 13px;">Setelah Memilih Jenis Keluhan, Masukkan
                        Identitas dan Data Kendaraan Anda Di Sini Untuk Mendaftar Antrian dan Mendapat Nomor Antrian</p>
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
                    <div class="tombol text-center px-3">
                        <button type="button" class="btn btn-success w-100">
                            <a href="antrian.php" style="text-decoration: none; color: white;">
                                Daftar
                            </a>
                        </button>
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
    <script src="../script.js"></script>
</body>

</html>