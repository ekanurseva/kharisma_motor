<?php
//koneksi ke database mysql, isi parameter sesuai web server masing-masing
$conn = mysqli_connect("localhost", "root", "", "kharisma_motor");

//cek jika koneksi ke mysql gagal, maka akan tampil pesan error
if (mysqli_connect_errno()) {
    echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function jumlah_data($data)
{
    global $conn;
    $query = mysqli_query($conn, $data);

    $jumlah_data = mysqli_num_rows($query);

    return $jumlah_data;
}
function dekripsi($teks)
{
    $text = $teks;
    $kunci = 'kharisma_motor';
    $key = hash('sha256', $kunci);
    $pkey = "123";

    $method = "aes-192-cfb1";
    $iv = substr(hash('sha256', $pkey), 0, 16);

    $dekripsi = base64_decode($text);
    $dekripsi = openssl_decrypt($dekripsi, $method, $key, 0, $iv);

    return $dekripsi;
}
function enkripsi($teks)
{
    $text = $teks;
    $kunci = 'kharisma_motor';
    $key = hash('sha256', $kunci);
    $pkey = "123";

    $method = "aes-192-cfb1";
    $iv = substr(hash('sha256', $pkey), 0, 16);

    $enkripsi = openssl_encrypt($text, $method, $key, 0, $iv);
    $enkripsi = base64_encode($enkripsi);

    return $enkripsi;
}

function validasi()
{
    global $conn;
    if (!isset($_COOKIE['KMmz19'])) {
        echo "<script>
                document.location.href='logout.php';
              </script>";
        exit;
    }

    $id = dekripsi($_COOKIE['KMmz19']);

    $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE idpengguna = '$id'");

    if (mysqli_num_rows($result) !== 1) {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    }
}

function validasi_admin()
{
    global $conn;
    if (!isset($_COOKIE['KMmz19'])) {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    }

    $id = dekripsi($_COOKIE['KMmz19']);

    $cek = query("SELECT * FROM pengguna WHERE idpengguna = $id")[0];

    $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE idpengguna = '$id'");

    if (mysqli_num_rows($result) !== 1) {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    } elseif ($cek['level'] !== "Admin") {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    }
}


function validasi_kasir()
{
    global $conn;
    if (!isset($_COOKIE['KMmz19'])) {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    }

    $id = dekripsi($_COOKIE['KMmz19']);

    $cek = query("SELECT * FROM pengguna WHERE idpengguna = $id")[0];

    $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE idpengguna = '$id'");

    if (mysqli_num_rows($result) !== 1) {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    } elseif ($cek['level'] !== "Kasir") {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    }
}

function validasi_no_user()
{
    global $conn;
    if (!isset($_COOKIE['KMmz19'])) {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    }

    $id = dekripsi($_COOKIE['KMmz19']);

    $cek = query("SELECT * FROM pengguna WHERE idpengguna = $id")[0];

    $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE idpengguna = '$id'");

    if (mysqli_num_rows($result) !== 1) {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    } elseif ($cek['level'] == "User") {
        echo "<script>
                document.location.href='../logout.php';
              </script>";
        exit;
    }
}

?>