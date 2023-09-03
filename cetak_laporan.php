<?php
    require_once 'vendor/autoload.php'; // Mengimpor DomPDF
    require_once 'controller/controller_transaksi.php';


    if(!isset($_POST['laporan'])) {
        header('Location: kelola/laporan.php');
    }
    $antrian = query("SELECT * FROM antrian");

    if($_POST['dari'] != "" && $_POST['sampai'] != "") {
        $antrian = cari_antrian($_POST);
    }
    $i = 1;

    $semua = 0;

    use Dompdf\Dompdf;

    // Membuat objek Dompdf
    $dompdf = new Dompdf();

    // Konten HTML yang akan diubah menjadi PDF
    $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>STRUK</title>

            <style>
                        table {
                            border-collapse: collapse;
                            width: 100%;
                        }

                        th, td {
                            border: 1px solid black;
                            padding: 8px;
                            text-align: center;
                            vertical-align: start;
                            font-size: 15px;
                        }

                        th {
                            background-color: #f2f2f2;
                        }

                        p {
                            text-align: justify; 
                            text-indent: 0.3in;
                            font-size: 14px;
                        }
                        li {
                            text-align: justify;
                            padding: 0;
                            padding: 0;
                            margin: 0;
                            left: 0;
                            font-size: 14px;
                        }
                    </style>
        </head>
        <body>
            <h1 style="margin: 0; text-align: center">LAPORAN TRANSAKSI</h1><br>

            <table>
            <tr>
                <th>NO</th>
                <th>KODE TRANSAKSI</th>
                <th>PELANGGAN</th>
                <th>TANGGAL TRANSAKSI</th>
                <th>TOTAL TRANSAKSI (Rp)</th>
            </tr>';
            foreach($antrian as $an) {
                $idantrian = $an['id_antrian'];
                $jumlah = jumlah_data("SELECT * FROM transaksi WHERE idantrian = $idantrian");

                if($jumlah > 0 ) {
                    $transaksi = query("SELECT * FROM transaksi WHERE idantrian = $idantrian");
                    $idkendaraan = $an['id_kendaraan'];

                    if($transaksi[0]['status_transaksi'] == "Lunas") {
                        $total = total($idkendaraan, $transaksi);
                        $tanggal =  date("H:i:s / d-m-Y", strtotime($transaksi[0]['tanggal_pelunasan']));
                        $idenkripsi = enkripsi($idantrian);

                        $html .= '<tr>
                            <td>' . $i . '</td>
                            <td>' . $transaksi[0]['kode_transaksi'] . '</td>
                            <td>' . $an['nama_pelanggan'] . '</td>
                            <td>' . $tanggal . '</td>
                            <td>Rp ' . number_format($total) . '</td>
                        </tr>';  
                        $i++;  
                        $semua += $total;
                    }
                }
            }
                $html .= '<tr>
                <td></td>
                <td></td>
                <td></td>
                <th>Total</th>
                <th>Rp ' . number_format($semua) . '</th>
            </tr>
        </table>

        </body>
        </html>';

    // Memasukkan konten HTML ke Dompdf
    $dompdf->loadHtml($html);

    // Merender PDF (mengubah HTML menjadi PDF)
    $dompdf->render();

    // Ambil output PDF
    $output = $dompdf->output();

    // Konversi output PDF menjadi data URI
    $pdfDataUri = 'data:application/pdf;base64,' . base64_encode($output);

    // Tampilkan pratinjau PDF di browser
    echo '<embed src="' . $pdfDataUri . '" type="application/pdf" width="100%" height="100%">';
?>