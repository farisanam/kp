<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Paket</div>
                    <div class="panel-body">
                        <?= form_open('paket/update/' . $paket['kode_paket']) ?>
                        <div class="form-group">
                            <?= form_label('Kode Paket', 'kode_paket') ?>
                            <?= form_input('kode_paket', set_value('kode_paket', $paket['kode_paket']), ['class' => 'form-control', 'id' => 'kode_paket', 'readonly' => 'readonly']) ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Paket', 'paket') ?>
                            <?= form_input('paket', set_value('paket', $paket['paket']), ['class' => 'form-control', 'id' => 'paket']) ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Jenis', 'jenis') ?>
                            <?= form_input('jenis', set_value('jenis', $paket['jenis']), ['class' => 'form-control', 'id' => 'jenis']) ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Harga', 'harga') ?>
                            <?= form_input(['type' => 'number', 'name' => 'harga', 'value' => set_value('harga', $paket['harga']), 'class' => 'form-control', 'id' => 'harga', 'min' => '0', 'step' => '1']) ?>
                        </div>
                        <div class="text-center">
                            <?= form_submit('submit', 'Simpan', ['class' => 'btn btn-primary']) ?>
                            <?= anchor('paket', 'Batal', ['class' => 'btn btn-default']) ?>
                        </div>

                        <?= form_close() ?>
                    </div>
                </div>                                                            
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
