<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- Page Content -->
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
                            <?= form_input(['name' => 'tgl_masuk', 'id' => 'tgl_masuk', 'type' => 'date', 'class' => 'form-control', 'required' => true]) ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Jenis', 'jenis') ?>
                            <?= form_input(['name' => 'jenis', 'id' => 'jenis', 'class' => 'form-control', 'required' => true]) ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Paket', 'paket') ?>
                            <?= form_input(['name' => 'paket', 'id' => 'paket', 'class' => 'form-control', 'required' => true]) ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Jumlah', 'jumlah') ?>
                            <?= form_input(['name' => 'jumlah', 'id' => 'jumlah', 'type' => 'number', 'class' => 'form-control', 'required' => true]) ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Harga Satuan', 'harga_satuan') ?>
                            <?= form_input(['name' => 'harga_satuan', 'id' => 'harga_satuan', 'type' => 'number', 'class' => 'form-control', 'required' => true]) ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Tanggal Ambil', 'tgl_ambil') ?>
                            <?= form_input(['name' => 'tgl_ambil', 'id' => 'tgl_ambil', 'type' => 'date', 'class' => 'form-control']) ?>
                        </div>
                        <div class="form-group text-center">
                            <?= form_submit('submit', 'Simpan', ['class' => 'btn btn-primary']) ?>
                            <a href="<?= site_url('transaksi') ?>" class="btn btn-secondary">Kembali</a>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
