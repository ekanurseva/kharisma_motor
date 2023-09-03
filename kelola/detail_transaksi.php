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

    $jumlah_keluhan = jumlah_data("SELECT * FROM transaksi_keluhan WHERE idantrian = $idantrian");

    if($jumlah_keluhan > 0) {
        $data_keluhan = query("SELECT * FROM transaksi_keluhan WHERE idantrian = $idantrian");
    }

    $total = 0;

    $estimasi_waktu = estimasi_waktu($data_antrian);

    $waktu = date('Y-m-d H:i:s', $estimasi_waktu);

    if(isset($_POST['status_antrian'])) {
        if(ubah_status($_POST) > 0) {
            echo "
                <script>
                    alert('Status berhasil diubah');
                    document.location.href='antrian.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Status gagal diubah');
                    document.location.href='antrian.php';
                </script>
            ";
        }
    }

    if(isset($_POST['bayar'])) {
        if($_POST['jumlah'] > $_POST['uang']) {
            echo "
                <script>
                    alert('Jumlah yang dibayarkan kurang');
                    document.location.href='antrian.php';
                </script>
            ";
        } else {
            if(transaksi($_POST) > 0) {
                echo "
                <script>
                    alert('Transaksi Berhasil');
                    document.location.href='antrian.php';
                </script>
            ";
            } else {
                echo "
                <script>
                    alert('Transaksi Gagal');
                    document.location.href='antrian.php';
                </script>
            ";
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
                                <h6>: <?= $data_antrian['status']; ?>
                                    <button type="button" style="border: none; background: none;" data-bs-toggle="modal" data-bs-target="#statusModal"><i class="bi bi-pencil-fill"></i></button>
                                </h6>
                            </div>
                        </div>
                    </div>

                    <?php if($data_transaksi[0]['status_transaksi'] == "Lunas") : ?>
                        <div class="col-2">
                            <button class="btn btn-sm btn-success">
                                <a class="text-decoration-none text-white" href="../cetak_struk.php?id=<?= $_GET['id']; ?>" target="_blank">Cetak Struk</a>
                            </button>
                        </div>
                    <?php endif; ?>
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

                <?php if($data_transaksi[0]['status_transaksi'] != "Lunas") : ?>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <h6>Estimasi Tanggal Selesai</h6>
                            </div>
                            <div class="col-5">
                                <h6>:
                                    <?= $waktu; ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <h6>Tanggal Pelunasan</h6>
                            </div>
                            <div class="col-5">
                                <h6>:
                                    <?= $data_transaksi[0]['tanggal_pelunasan']; ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($data_antrian['status'] != "Selesai") : ?>
                    <a href="input_detail_transaksi.php?key=<?= $_GET['id']; ?>" class="btn btn-primary mt-3 px-5">
                        Input Servis & Separepart Tambahan
                    </a>
                <?php endif; ?>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Servis</th>
                        <th>Sparepart</th>
                        <th>Total</th>
                        <?php if($data_antrian['status'] != "Selesai") : ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 1;
                        foreach ($data_transaksi as $daksi) : 
                            if($daksi['idservis'] != NULL) :
                                $idservis = $daksi['idservis'];
                                $data_servis = query("SELECT * FROM servis WHERE idservis = $idservis")[0];
                                $enkripsi_id = enkripsi($daksi['idtransaksi']);
                    ?>
                        <tr>
                            <th><?= $i; ?></th>
                            <td><?= $data_servis['jenis_servis']; ?></td>
                            <td>-</td>
                            <td>Rp <?= number_format($data_servis['harga_jasa']); ?></td>
                            <?php if($data_antrian['status'] != "Selesai") : ?>
                                <td>
                                    <a style="text-decoration: none;" href="delete.php?idtransaksi=<?= $enkripsi_id; ?>"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data?')">
                                        <i class="bi bi-trash-fill"></i></a>
                                </td>
                            <?php endif; ?>
                            <?php $total += $data_servis['harga_jasa']; ?>
                        </tr>
                    <?php 
                                $i++;
                            endif;
                        endforeach; 
                    ?>

                    <?php 
                        foreach($data_transaksi as $trans) : 
                            if($trans['idsparepart'] != NULL) :
                                $idsparepart = $trans['idsparepart'];
                                $data_sparepart = query("SELECT * FROM sparepart WHERE idsparepart = $idsparepart")[0];
                                $enkripsi_idtrans = enkripsi($trans['idtransaksi']);

                                $data_harga = query("SELECT * FROM harga_sparepart WHERE idkendaraan = $idkendaraan AND idsparepart = $idsparepart")[0];
                    ?>
                        <tr>
                            <th><?= $i; ?></th>
                            <td>-</td>
                            <td><?= $data_sparepart['sparepart']; ?></td>
                            <td>Rp <?= number_format($data_harga['harga']); ?></td>
                            <?php if($data_antrian['status'] != "Selesai") : ?>
                                <td>
                                    <a style="text-decoration: none;" href="delete.php?idtransaksi=<?= $enkripsi_idtrans; ?>"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data?')">
                                        <i class="bi bi-trash-fill"></i></a>
                                </td>
                            <?php endif; ?>
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
            <?php if($data_transaksi[0]['status_transaksi'] == "Belum") : ?>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bayar">Bayar</button>
                </div>
            <?php endif; ?>

            <h3>Keluhan</h3>
            <ul>
                <?php 
                    if($jumlah_keluhan > 0) :
                        foreach($data_keluhan as $dakel) : 
                            $idkeluhan = $dakel['idkeluhan'];
                            $keluhan = query("SELECT * FROM jenis_keluhan WHERE idkeluhan = $idkeluhan")[0];
                ?>
                    <li><?= $keluhan['keluhan']; ?></li>
                <?php 
                            
                        endforeach; 
                    endif;
                ?>
            </ul>
        </div>
    </div>
    <!-- Content Selesai -->

    <!-- Modal Status -->
    <div class="modal fade modal-dialog-scrollable" id="statusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Status Antrian</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="idantrian" value="<?= $data_antrian['id_antrian']; ?>">

                        <label for="status" class="form-label">Pilih status antrian</label>
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option selected hidden value="<?= $data_antrian['status']; ?>"><?= $data_antrian['status']; ?></option>
                            <option value="Menunggu Antrian">Menunggu Antrian</option>
                            <option value="Diproses">Diproses</option>
                            <option value="Dalam Pengerjaan">Dalam Pengerjaan</option>
                            <option value="Menunggu Suku Cadang">Menunggu Suku Cadang</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="status_antrian">Pilih</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Status selesai -->

    <!-- Modal Bayar -->
    <div class="modal fade modal-dialog-scrollable" id="bayar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="idantrian" value="<?= $data_antrian['id_antrian']; ?>">
                        <input type="hidden" name="jumlah" value="<?= $total; ?>">

                        <label for="jumlah2" class="form-label">Jumlah yang harus dibayar</label>
                        <input type="text" class="form-control" id="jumlah2" name="jumlah2" readonly placeholder="" value="Rp <?= number_format($total); ?>">
                        
                        <label for="uang" class="form-label">Uang yang dibayarkan</label>
                        <input type="number" class="form-control" id="uang" name="uang">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="bayar">Bayar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Bayar selesai -->

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