<?php
    require_once "../controller/controller_transaksi.php";

    $id = dekripsi($_COOKIE['KMmz19']);
    $user = query("SELECT * FROM pengguna WHERE idpengguna = $id")[0];
    $antrian = query("SELECT * FROM antrian");
    
    if(isset($_POST['cek_tanggal'])) {
        $antrian = cari_antrian($_POST);
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
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
                <h4>LAPORAN DATA TRANSAKSI</h4>
            </div>
            <div class="konten py-4">
                <div class="row">
                    <div class="col-8">
                        <h6>Tampil Berdasarkan</h6>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-success">
                            <a class="text-decoration-none text-white" href="#">Cetak Laporan</a>
                        </button>
                    </div>

                    <form action="" method="post">
                        <div class="tahun">
                            <div class="mb-3 row">
                                <label for="dari" class="col-sm-1 col-form-label">Dari</label>
                                <div class="col-sm-auto">
                                    <input type="date" class="form-control" id="dari" name="dari">
                                </div>
                            </div>
                        </div>
                        <div class="bulan">
                            <div class="mb-3 row">
                                <label for="sampai" class="col-sm-1 col-form-label">Sampai</label>
                                <div class="col-sm-auto">
                                    <input type="date" class="form-control" id="sampai" name="sampai">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <button type="submit" name="cek_tanggal" class="btn btn-primary col-sm-2">Cek</button>
                        </div>
                    </form>
                </div>
            </div>

            <table class="table table-hover" id="example">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Transaksi</th>
                        <th scope="col">Pelanggan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 1;
                        foreach($antrian as $ant) : 
                            $idantrian = $ant['id_antrian'];
                            $jumlah = jumlah_data("SELECT * FROM transaksi WHERE idantrian = $idantrian");

                            if($jumlah > 0 ) :
                                $transaksi = query("SELECT * FROM transaksi WHERE idantrian = $idantrian");
                                $idkendaraan = $ant['id_kendaraan'];

                                    if($transaksi[0]['status_transaksi'] == "Lunas") :
                                        $total = total($idkendaraan, $transaksi);
                                        $tanggal =  date("H:i:s / d-m-Y", strtotime($transaksi[0]['tanggal_pelunasan']));
                                        $idenkripsi = enkripsi($idantrian);
                    ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $transaksi[0]['kode_transaksi']; ?></td>
                            <td><?= $ant['nama_pelanggan']; ?></td>
                            <td><?= $tanggal; ?></td>
                            <td>Rp <?= number_format($total); ?></td>
                        </tr>
                    <?php 
                                    $i++;
                                endif;
                            endif;
                        endforeach; 
                    ?>
                </tbody>
            </table>
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
        $(document).ready(function () {
            $("#example").DataTable();
        });
    </script>
</body>

</html>