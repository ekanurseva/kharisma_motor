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
    </script>";
        exit();
    }

    if ($password !== $password2) {
        echo "<script>
        alert('Password Tidak Sesuai!');
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

// Fungsi Registrasi Admin
function edit_admin($data)
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
    </script>";
        exit();
    }

    if ($password !== $password2) {
        echo "<script>
        alert('Password Tidak Sesuai!');
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
    </script>";
        exit();
    }

    if ($password !== $password2) {
        echo "<script>
        alert('Password Tidak Sesuai!');
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

?>