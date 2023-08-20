<?php
include("controller/controller_pengguna.php");

if (!isset($_COOKIE['KMmz19'])) {
    echo "<script>
                document.location.href='login.php';
              </script>";
    exit;
} else {
    echo "<script>
                document.location.href='logout.php';
              </script>";
    exit;
}
?>