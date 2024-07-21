<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">Tambah Paket</div>
                    <div class="panel-body">                                    
                        <form id="paketForm" class="form-horizontal" role="form" action="<?= base_url('paket/simpan') ?>" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Kode Paket :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kode_paket" placeholder="Kode Paket" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Paket :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="paket" placeholder="Nama Paket" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Jenis :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="jenis" placeholder="Jenis Paket" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Harga :</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="harga" placeholder="Harga Paket" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" name="tambah" value="Tambah" type="submit">Tambah</button>
                                <a href="<?= base_url('paket') ?>" class="btn btn-default">Batal</a>
                            </div>
                        </form>                                    
                    </div>
                </div>                                                            
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
