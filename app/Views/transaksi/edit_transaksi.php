<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Transaksi</div>
                    <div class="panel-body">                                    
                        <?= form_open('transaksi/update/' . $transaksi->no_order) ?>
                            <div class="form-group">
                                <?= form_label('Tanggal Masuk', 'tgl_masuk') ?>
                                <?= form_input(['name' => 'tgl_masuk', 'class' => 'form-control', 'type' => 'date', 'value' => $transaksi->tgl_masuk, 'required' => 'required']) ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Jenis', 'jenis') ?>
                                <?= form_input(['name' => 'jenis', 'class' => 'form-control', 'value' => $transaksi->jenis, 'required' => 'required']) ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Paket', 'paket') ?>
                                <?= form_input(['name' => 'paket', 'class' => 'form-control', 'value' => $transaksi->paket, 'required' => 'required']) ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Jumlah', 'jumlah') ?>
                                <?= form_input(['name' => 'jumlah', 'class' => 'form-control', 'type' => 'number', 'value' => $transaksi->jumlah, 'required' => 'required']) ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Status', 'status') ?>
                                <?= form_input(['name' => 'status', 'class' => 'form-control', 'value' => $transaksi->status]) ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Tanggal Ambil', 'tgl_ambil') ?>
                                <?= form_input(['name' => 'tgl_ambil', 'class' => 'form-control', 'type' => 'date', 'value' => $transaksi->tgl_ambil]) ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Harga Satuan', 'harga_satuan') ?>
                                <?= form_input(['name' => 'harga_satuan', 'class' => 'form-control', 'type' => 'number', 'value' => $transaksi->harga_satuan, 'required' => 'required']) ?>
                            </div>
                            <div class="form-group">
                                <?= form_label('Total', 'total') ?>
                                <?= form_input(['name' => 'total', 'class' => 'form-control', 'type' => 'number', 'value' => $transaksi->total, 'required' => 'required']) ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        <?= form_close() ?>
                    </div>
                </div>                                                            
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
