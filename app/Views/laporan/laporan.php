<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
    
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
                                        <input name="txtTglAwal" type="date" class="form-control" value="" size="10" /> 
                                    </div>
                                    <div class="col-lg-3">
                                        <input name="txtTglAkhir" type="date" class="form-control" value="" size="10" />
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
                        </table>
                        <div class="text-center">
                        <a href="../rekap/cetak.php?awal=&&akhir=" target="_blank" alt="Edit Data" class="btn btn-primary">Cetak Laporan</a>                        
                        </div>
                    </div>
                </div>                                                            
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>