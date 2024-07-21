<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">Tambah Transaksi</div>
                    <div class="panel-body">                                    
                        <?= form_open('transaksi/simpan') ?>
                            <div class="form-group">
                                <?= form_label('Tanggal Masuk', 'tgl_masuk') ?>
                                <?= form_input(['name' => 'tgl_masuk', 'class' => 'form-control', 'type' => 'date', 'required' => 'required']) ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Jenis', 'jenis') ?>
                                <?= form_input(['name' => 'jenis', 'class' => 'form-control', 'required' => 'required']) ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Paket', 'paket') ?>
                                <?= form_input(['name' => 'paket', 'class' => 'form-control', 'required' => 'required']) ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Jumlah', 'jumlah') ?>
                                <?= form_input(['name' => 'jumlah', 'class' => 'form-control', 'type' => 'number', 'required' => 'required']) ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Status', 'status') ?>
                                <?= form_input(['name' => 'status', 'class' => 'form-control']) ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Tanggal Ambil', 'tgl_ambil') ?>
                                <?= form_input(['name' => 'tgl_ambil', 'class' => 'form-control', 'type' => 'date']) ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Harga Satuan', 'harga_satuan') ?>
                                <?= form_input(['name' => 'harga_satuan', 'class' => 'form-control', 'type' => 'number', 'required' => 'required']) ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Total', 'total') ?>
                                <?= form_input(['name' => 'total', 'class' => 'form-control', 'type' => 'number', 'required' => 'required']) ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        <?= form_close() ?>
                    </div>
                </div>                                                            
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
