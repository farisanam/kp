<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">Data Transaksi</div>
                    <div class="panel-body">                                    
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. Order</th>
                                    <th>Nama</th>
                                    <th>Tgl Masuk</th>                                    
                                    <th>Tgl Ambil</th>                                    
                                    <th>Jumlah</th>    
                                    <th>Total<th>                              
                                    <th>Opsi</th>                                  
                                </tr>
                            </thead>
                        </table>
                        <div class="text-center">
                            <a href="<?= site_url('transaksi/tambah_transaksi') ?>"><button type="button" class="btn btn-primary">Tambah Transaksi</button></a>
                        </div>
                    </div>
                </div>                                                            
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>