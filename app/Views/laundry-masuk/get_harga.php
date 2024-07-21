<?php
require('../koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kategori = $_POST['kategori'];
    $paket = $_POST['paket'];

    $query = "SELECT harga FROM harga_paket WHERE paket = '$paket' AND kategori = '$kategori'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo $row['harga'];
    } else {
        echo "0";
    }
}
?>
