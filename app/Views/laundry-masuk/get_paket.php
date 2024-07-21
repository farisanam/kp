<?php
// get_paket.php
require('../koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kategori = $_POST['kategori'];

    $paketOptions = getPaketOptions($kategori);

    echo json_encode($paketOptions);
}

?>
