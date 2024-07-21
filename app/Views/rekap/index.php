<?php 
    session_start();
    
    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../login");
        exit;
    }        
    
    $SqlPeriode = ""; 
    $awalTgl    = ""; 
    $akhirTgl   = ""; 
    $tglAwal    = ""; 
    $tglAkhir   = "";

    if(isset($_POST['btnTampil'])) {
        $tglAwal    = isset($_POST['txtTglAwal']) ? $_POST['txtTglAwal'] : "01-".date('m-Y');
        $tglAkhir   = isset($_POST['txtTglAkhir']) ? $_POST['txtTglAkhir'] : date('d-m-Y');
        $SqlPeriode = " WHERE masuk BETWEEN '".$tglAwal."' AND '".$tglAkhir."' AND status = 'Sudah diambil'";
    }
    else {
        $awalTgl    = "01-".date('m-Y');
        $akhirTgl   = date('d-m-Y'); 
        $SqlPeriode = " WHERE masuk BETWEEN '".$awalTgl."' AND '".$akhirTgl."' AND status = 'Sudah diambil'";
    }

    $exits = tampil("SELECT * FROM transaksi".$SqlPeriode);

    include ('../view/header.php');
?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">Laporan Transaksi KICKBATH</div>
                    <div class="panel-body">                                    
                        <div class="form-container">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form10" target="_self">                                                              
                                <div class="row">
                                    <div class="col-lg-3">
                                        <input name="txtTglAwal" type="date" class="form-control" value="<?php echo $awalTgl; ?>" size="10" /> 
                                    </div>
                                    <div class="col-lg-3">
                                        <input name="txtTglAkhir" type="date" class="form-control" value="<?php echo $akhirTgl; ?>" size="10" />
                                    </div>
                                    <div class="col-lg-3">           
                                        <input name="btnTampil" class="btn btn-success" type="submit" value="Tampilkan" />
                                    </div>      
                                </div>
                            </form>
                        </div>
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Masuk</th>                                    
                                    <th>Nama Pelanggan</th>
                                    <th>No Telp</th>
                                    <th>Kategori</th>
                                    <th>Paket</th>
                                    <th>Harga (/pcs)</th>
                                    <th>PCS</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($exits as $exit) : ?>
                                <tr>
                                    <td><?= $no; ?>.</td>
                                    <?php
                                        $masuk = $exit['masuk'];
                                        $dateMasuk = date_create("$masuk");
                                    ?>
                                    <td><?= date_format($dateMasuk,"d/m/Y"); ?></td>
                                    <td><?= $exit["nama_konsumen"] ?></td>
                                    <td><?= $exit["no_telp"] ?></td>
                                    <td><?= $exit["kategori"] ?></td>
                                    <td><?= $exit["paket"] ?></td>
                                    <td><?= $exit["harga_satuan"] ?></td>
                                    <td><?= $exit["pcs"] ?></td>
                                    <td><?= $exit["harga_total"] ?></td>
                                </tr>               
                                <?php $no++; ?>                 
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="text-center">
                        <a href="../rekap/cetak.php?awal=<?php echo $tglAwal; ?>&&akhir=<?php echo $tglAkhir; ?>" target="_blank" alt="Edit Data" class="btn btn-primary">Cetak Laporan</a>                        
                        </div>
                    </div>
                </div>                                                            
            </div>
        </div>
    </div>
</div>

<?php
    include('../view/footer.php');
?>