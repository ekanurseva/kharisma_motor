<?php
    require_once 'vendor/autoload.php'; // Mengimpor DomPDF
    require_once 'controller/controller_transaksi.php';

    $idantrian = dekripsi($_GET['id']);
    $antrian = query("SELECT * FROM antrian WHERE id_antrian = $idantrian")[0];

    $idkendaraan = $antrian['id_kendaraan'];
    $kendaraan = query("SELECT * FROM jenis_kendaraan WHERE idkendaraan = $idkendaraan")[0];

    $transaksi = query("SELECT * FROM transaksi WHERE idantrian = $idantrian");

    $total = total($idkendaraan, $transaksi);

    $waktu = date("d F Y", strtotime($transaksi[0]['tanggal_pelunasan']));


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
            <h2 style="margin: 0;">"KHARISMA MOTOR"</h2>
            <h4 style="margin: 0;">Bengkel Mobil Bensin & Diesel</h4>
            <h4 style="margin: 0;">Jl. Raya Playangan-Gebang-Cirebon</h4>
            <h4 style="margin: 0;">(Seb. Timur Pom Bensin Playangan)</h4>
            
            <h4 style="margin: 0; text-align: right;">Playangan, '; $html .= $waktu . '</h4>
            <h4 style="margin: 0; text-align: right;">Jenis Kendaraan: '; $html .= $kendaraan['nama_kendaraan'] . '</h4>

            <h4 style="margin-top: 7px">No Nota. '; $html .= $transaksi[0]['kode_transaksi'] . '<h4>

            <table>
            <tr>
                <th>NO</th>
                <th>SERVIS</th>
                <th>SPAREPART</th>
                <th>JUMLAH</th>
            </tr>';
            $i = 1;
            foreach($transaksi as $tr) {
                if($tr['idservis'] != NULL) {
                    $idservis = $tr['idservis'];
                    $servis = query("SELECT * FROM servis WHERE idservis = $idservis")[0];
                    $html .= '<tr>
                        <td>' . $i . '</td>
                        <td>' . $servis['jenis_servis'] . '</td>
                        <td>-</td>
                        <td>Rp ' . number_format($servis['harga_jasa']) .'</td>
                    </tr>';
                    $i++;
                }
            }

            foreach($transaksi as $trans) {
                if($trans['idsparepart'] != NULL) {
                    $idsparepart = $trans['idsparepart'];
                    $sparepart = query("SELECT * FROM sparepart WHERE idsparepart = $idsparepart")[0];

                    $harga = query("SELECT * FROM harga_sparepart WHERE idkendaraan = $idkendaraan AND idsparepart = $idsparepart")[0];
                    $html .= '<tr>
                        <td>' . $i . '</td>
                        <td>-</td>
                        <td>' . $sparepart['sparepart'] .'</td>
                        <td>Rp ' . number_format($harga['harga']) .'</td>
                    </tr>';
                    $i++;
                }
            }
            
            $html .= '<tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <th style="text-align: right">TOTAL Rp.</th>
                <th>'; $html .= number_format($total) . '</th>
            </tr>
            </table>

            <br>
            <h4 style="font-style: italic; margin: 0">Terima Kasih</h4>
            <h4 style="font-style: italic; margin: 0">Atas Kunjungan & Kepercayaan Anda</h4>

            <h4 style="font-weight: bold;">Kepala Mekanik,</h4><br>
            <h4 style="font-weight: bold; margin: 0;">KASMARI</h4>
            <h4 style="font-weight: bold; margin: 0;">(Mas Kas)</h4>

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