<?php
require 'vendor/autoload.php'; // Mengimpor DomPDF

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
        <h1 style="margin: 0;">LAPORAN TRANSAKSI</h1>

        <table>
        <tr>
            <th>NO</th>
            <th>KODE TRANSAKSI</th>
            <th>PELANGGAN</th>
            <th>TANGGAL TRANSAKSI</th>
            <th>TOTAL TRANSAKSI (Rp)</th>
        </tr>
        
        <tr>
            <td>1</td>
            <td>T-20230902-1</td>
            <td>Bambang</td>
            <td>2023-09-02</td>
            <td>200000</td>
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