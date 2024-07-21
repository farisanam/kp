<?php
require('../koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kategori = $_POST['kategori'];

    $paketOptions = getPaketOptions($kategori);

    $optionsHTML = '';
    foreach ($paketOptions as $paket) {
        $optionsHTML .= '<option value="' . htmlspecialchars($paket) . '">' . htmlspecialchars($paket) . '</option>';
    }

    echo $optionsHTML;
}
?>
