<?php

require_once('function.php');

// Fungsi Registrasi Admin
function register_admin($data)
{
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["pwd"]);
    $password2 = mysqli_real_escape_string($conn, $data["pwd2"]);
    $no_hp = $data['no_hp'];
    $level = "Admin";

    $result = mysqli_query($conn, "SELECT username FROM pengguna WHERE username = '$username'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username Sudah Dipakai! Silahkan gunakan username lain');
        document.location.href='input_admin.php';
    </script>";
        exit();
    }

    if ($password !== $password2) {
        echo "<script>
        alert('Password Tidak Sesuai!');
        document.location.href='input_admin.php';
    </script>";
        exit();
    }

    //enkripsi password
    $password = password_hash($password2, PASSWORD_DEFAULT);

    //jika password sama, masukkan data ke database
    mysqli_query($conn, "INSERT INTO pengguna VALUES (NULL, '$username', '$password', '$nama', '$no_hp', '$level')");
    return mysqli_affected_rows($conn);
}
// Fungsi Registrasi Admin Selesai

// Fungsi Edit Pengguna
function edit_pengguna($data)
{
    global $conn;

    $idpengguna = $data['idpengguna'];
    $oldnama = htmlspecialchars($data['oldnama']);
    $oldusername = strtolower(stripslashes($data["oldusername"]));
    $oldpassword = mysqli_real_escape_string($conn, $data["oldpwd"]);
    $nama = htmlspecialchars($data['nama']);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["pwd"]);
    $password2 = mysqli_real_escape_string($conn, $data["pwd2"]);
    $no_hp = $data['nohp'];

    $id = enkripsi($idpengguna);

    if (isset($data['oldlevel'])) {
        $level = $data['oldlevel'];
    } else {
        $level = $data['level'];
    }

    if ($username !== $oldusername) {
        $result = mysqli_query($conn, "SELECT username FROM pengguna WHERE username = '$username'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('Username pengguna Sudah Digunakan! Silahkan pakai username lain.');
                document.location.href='edit_admin_kasir.php?id=" . $id . "';
            </script>";
            return false;
        }
    }

    if ($password !== $oldpassword) {
        if ($password !== $password2) {
            echo "<script>
                    alert('Password Tidak Sesuai!');
                    document.location.href='edit_admin_kasir.php?id=" . $id . "';
                  </script>";
            return false;
        }

        $password = password_hash($password2, PASSWORD_DEFAULT);
    }

    $query = "UPDATE pengguna SET 
                    username = '$username',
                    password = '$password',
                    nama = '$nama',
                    no_hp = '$no_hp',
                    level = '$level'
              WHERE idpengguna = '$idpengguna'
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Fungsi Edit Pengguna Selesai

// Fungsi Registrasi Kasir
function register_kasir($data)
{
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["pwd"]);
    $password2 = mysqli_real_escape_string($conn, $data["pwd2"]);
    $no_hp = $data['no_hp'];
    $level = "Kasir";

    $result = mysqli_query($conn, "SELECT username FROM pengguna WHERE username = '$username'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username Sudah Dipakai! Silahkan gunakan username lain');
        document.location.href='input_kasir.php';
    </script>";
        exit();
    }

    if ($password !== $password2) {
        echo "<script>
        alert('Password Tidak Sesuai!');
        document.location.href='input_kasir.php';
    </script>";
        exit();
    }

    //enkripsi password
    $password = password_hash($password2, PASSWORD_DEFAULT);

    //jika password sama, masukkan data ke database
    mysqli_query($conn, "INSERT INTO pengguna VALUES (NULL, '$username', '$password', '$nama', '$no_hp', '$level')");
    return mysqli_affected_rows($conn);
}
// Fungsi Registrasi Kasir Selesai

// Fungsi Registrasi User
function register_user($data)
{
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["pwd"]);
    $password2 = mysqli_real_escape_string($conn, $data["pwd2"]);
    $no_hp = $data['no_hp'];
    $level = "User";

    $result = mysqli_query($conn, "SELECT username FROM pengguna WHERE username = '$username'") or die(mysqli_error($conn));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username Sudah Dipakai! Silahkan gunakan username lain');
        document.location.href='registrasi.php';
    </script>";
        exit();
    }

    if ($password !== $password2) {
        echo "<script>
        alert('Password Tidak Sesuai!');
        document.location.href='registrasi.php';
    </script>";
        exit();
    }

    //enkripsi password
    $password = password_hash($password2, PASSWORD_DEFAULT);

    //jika password sama, masukkan data ke database
    mysqli_query($conn, "INSERT INTO pengguna VALUES (NULL, '$username', '$password', '$nama', '$no_hp', '$level')");
    return mysqli_affected_rows($conn);
}
// Fungsi Registrasi User Selesai

if (isset($_GET['idpengguna'])) {
    global $conn;
    $idpengguna = dekripsi($_GET['idpengguna']);

    mysqli_query($conn, "DELETE FROM pengguna WHERE idpengguna = $idpengguna");

    if (mysqli_affected_rows($conn) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='../admin/admin_kasir.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Dihapus');
                    document.location.href='../admin/admin_kasir.php';
                </script>
            ";
    }
}

    function login($data) {
        global $conn;

        $username = $data["username"];
        $password = $data["password"];

        //cek username apakah ada di database atau tidak
        $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$username'");

        if (mysqli_num_rows($result) === 1) {
            //cek password
            $row = mysqli_fetch_assoc($result);
            //password_verify() untuk mengecek apakah sebuah password itu sama atau tidak dengan hash nya
            //parameternya yaitu string yang belum diacak dan string yang sudah diacak
            if (password_verify($password, $row["password"])) {
                $enkripsi = enkripsi($row['idpengguna']);

                setcookie('KMmz19', $enkripsi, time() + 10800);

                if($row['level'] == "Admin") {
                    echo "<script>
                            document.location.href='admin';
                        </script>";
                    exit;
                } elseif($row['level'] == "Kasir") {
                    echo "<script>
                            document.location.href='kasir';
                        </script>";
                    exit;
                } else {
                    echo "<script>
                            document.location.href='user';
                        </script>";
                    exit;
                }
            }
        }

        $error = true;

        return $error;
    }
?>