<?php
<<<<<<< HEAD
require 'vendor/autoload.php'; // Mengimpor DomPDF

use Dompdf\Dompdf;

// Membuat objek Dompdf
$dompdf = new Dompdf();

// Konten HTML yang akan diubah menjadi PDF
$html = '<!DOCTYPE html>
=======
    require 'vendor/autoload.php'; // Mengimpor DomPDF

    use Dompdf\Dompdf;

    // Membuat objek Dompdf
    $dompdf = new Dompdf();

    // Konten HTML yang akan diubah menjadi PDF
    $html = '<!DOCTYPE html>
>>>>>>> 2ffbe357c52360539615ded9697cd94d233eeba9
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
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
        
        <h4 style="margin: 0; text-align: right;">Playangan,  03 September 2023</h4>
        <h4 style="margin: 0; text-align: right;">Jenis Kendaraan: Toyota Avanza</h4>

        <h4 style="margin-top: 7px">No Nota. T-20230902-1<h4>

        <table>
        <tr>
            <th>NO</th>
            <th>SERVIS</th>
            <th>SPAREPART</th>
            <th>JUMLAH</th>
        </tr>
        
        <tr>
            <td>1</td>
            <td>Rem</td>
            <td>Rem</td>
            <td>200000</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <th style="text-align: right">TOTAL Rp.</th>
            <th>200000</th>
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
=======
        <title>Document</title>
    </head>
    <body>
        <h1 style="margin = 0px;">"KHARISMA MOTOR"</h1>
        <h4>Bengkel Mobil Bensin & Diesel</h4>
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
>>>>>>> 2ffbe357c52360539615ded9697cd94d233eeba9
