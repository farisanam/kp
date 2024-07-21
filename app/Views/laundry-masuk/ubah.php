<?php 
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

$id = $_GET["id"];
$enter = tampil("SELECT * FROM transaksi WHERE id = $id")[0];

$kategori = isset($_POST['kategori']) ? $_POST['kategori'] : $enter["kategori"];
$paketOptions = getPaketOptions($kategori);

if (isset($_POST['update'])) {
    if (ubah($_POST) > 0) {
        header("Location: ubah-sukses.php");
        exit;
    } else {
        header("Location: ubah-gagal.php?id=$id");
        exit;
    }
}

function getPaketOptions($kategori) {
    $paketOptions = [
        'Shoes Bath' => [
            'SHOES BATH 1 DAY',
            'SHOES BATH 2 DAY',
            'SHOES BATH 3 DAY',
            'SHOES KIDS/JUNIOR BATH (UP TO SIZE 35)',
            'SHOES TRAIL BATH',
            'SANDAL BATH'
        ],
        'Unyellowing Bath' => [
            'UNYELLOWING RESULT 50%',
            'UNYELLOWING RESULT 100%'
        ],
        'Helmet Bath' => [
            'HELMET BATH 1 DAY',
            'HELMET BATH 2 DAY',
            'HELMET BATH 3 DAY'
        ],
        'Bag Bath' => [
            'LARGE BAG BATH',
            'MEDIUM BAG BATH',
            'SMALL BAG BATH'
        ],
        'Cap/Hat Bath' => [
            'CAP/HAT BATH'
        ],
        'Repair' => [
            'SIMPLY REPAIR',
            'MEDIUM REPAIR',
            'HARD REPAIR'
        ]
    ];
    return $paketOptions[$kategori] ?? [];
}

include ('../view/header.php');
?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">Ubah Data Laundry Masuk</div>
                    <div class="panel-body">                                    
                        <form id="laundryForm" class="form-horizontal" role="form" action="" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nama Konsumen :</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="id" value="<?= $enter["id"]; ?>">
                                    <input type="text" class="form-control" name="nama_konsumen" placeholder="Nama" value="<?= $enter["nama_konsumen"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">No Telp :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="no_telp" placeholder="08xxxxxxxxxx" value="<?= $enter["no_telp"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Kategori :</label>
                                <div class="col-sm-10">
                                    <select name="kategori" class="form-control" id="kategoriSelect" onchange="this.form.submit()">
                                        <option value="Shoes Bath" <?= ($kategori == 'Shoes Bath') ? 'selected' : '' ?>>Shoes Bath</option>
                                        <option value="Unyellowing Bath" <?= ($kategori == 'Unyellowing Bath') ? 'selected' : '' ?>>Unyellowing Bath</option>
                                        <option value="Helmet Bath" <?= ($kategori == 'Helmet Bath') ? 'selected' : '' ?>>Helmet Bath</option>
                                        <option value="Bag Bath" <?= ($kategori == 'Bag Bath') ? 'selected' : '' ?>>Bag Bath</option>
                                        <option value="Cap/Hat Bath" <?= ($kategori == 'Cap/Hat Bath') ? 'selected' : '' ?>>Cap/Hat Bath</option>
                                        <option value="Repair" <?= ($kategori == 'Repair') ? 'selected' : '' ?>>Repair</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Paket :</label>
                                <div class="col-sm-10">
                                    <select name="paket" class="form-control" id="paketSelect">
                                        <?php foreach ($paketOptions as $paket): ?>
                                            <option value="<?= $paket ?>" <?= ($enter['paket'] == $paket) ? 'selected' : '' ?>><?= $paket ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">PCS :</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pcs" class="form-control" placeholder="0" value="<?= $enter["pcs"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Harga :</label>
                                <div class="col-sm-10">
                                    <input type="text" name="harga" id="harga" class="form-control" placeholder="0" value="<?= $enter["harga_satuan"]; ?>" required>
                                </div>
                            </div>
                            <div class="text-center">
                            <a href="../laundry-masuk" class="btn btn-default">Kembali</a>
                                <button class="btn btn-primary" name="update" value="update" type="submit">Perbaharui</button>
                            </div>
                        </form>
                            </div>
                        </form>                                    
                    </div>
                </div>                                                            
            </div>
        </div>
    </div>
</div>

<?php
include('../view/footer.php');
?>

<script>
    document.getElementById('paketSelect').addEventListener('change', function() {
        var kategori = document.getElementById('kategoriSelect').value;
        var paket = this.value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'get_harga.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (this.status == 200) {
                document.getElementById('harga').value = this.responseText;
            }
        };
        xhr.send('kategori=' + kategori + '&paket=' + paket);
    });
</script>
