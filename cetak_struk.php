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