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
                    <table class="tabel" id="example">
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
                    </table>

                    <!-- Muncul ketika sudah daftar -->
                    <div class="title text-center text-uppercase mt-3 mb-1">
                        <h5>ANTRIAN SAYA</h5>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                                <h6>No Antrian</h6>
                            </div>
                            <div class="d-flex justify-content-center">
                                <h6>1</h6>
                            </div>
                            <div class="d-flex justify-content-center mt-2">
                                <h6>Status Antrian</h6>
                            </div>
                            <div class="d-flex justify-content-center">
                                <span style="font-size: 13px; font-weight: 600;">Dalam Pengerjaan</span>
                            </div>
                            <div class="text-center">
                                <span style="font-size: 13px; font-weight: 600;">Mobil Anda sedang
                                    diperbaiki.</span>
                            </div>
                        </div>
                        <div class="col-8">
                            <h5 class="px-3 mt-4 d-flex justify-content-center">Estimasi Nota</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Servis</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Servis Per</td>
                                        <td>Rp 300.000</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Spooring</td>
                                        <td>Rp 150.000</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <th>Total</th>
                                        <td>Rp 450.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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