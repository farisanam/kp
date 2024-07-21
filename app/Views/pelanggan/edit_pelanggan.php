<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Pelanggan</div>
                    <div class="panel-body">
                        <?= form_open('pelanggan/update/' . $pelanggan['id_pelanggan']) ?>
                        <div class="form-group">
                            <?= form_label('ID Pelanggan', 'id_pelanggan') ?>
                            <?= form_input('id_pelanggan', set_value('id_pelanggan', $pelanggan['id_pelanggan']), ['class' => 'form-control', 'id' => 'id_pelanggan', 'readonly' => 'readonly']) ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Nama', 'nama') ?>
                            <?= form_input('nama', set_value('nama', $pelanggan['nama']), ['class' => 'form-control', 'id' => 'nama']) ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Alamat', 'alamat') ?>
                            <?= form_input('alamat', set_value('alamat', $pelanggan['alamat']), ['class' => 'form-control', 'id' => 'alamat']) ?>
                        </div>
                        <div class="form-group">
                            <?= form_label('No Telp', 'telepon') ?>
                            <?= form_input('telepon', set_value('telepon', $pelanggan['telepon']), ['class' => 'form-control', 'id' => 'telepon', 'pattern' => '[0-9]{10,14}', 'title' => 'Masukkan angka antara 10-14 digit tanpa spasi', 'maxlength' => '14']) ?>
                        </div>
                        <div class="text-center">
                            <?= form_submit('submit', 'Update', ['class' => 'btn btn-primary']) ?>
                            <?= anchor('pelanggan', 'Batal', ['class' => 'btn btn-default']) ?>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>                                                            
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var inputNoTelp = document.querySelector('input[name="telepon"]');
    
    inputNoTelp.addEventListener("input", function(event) {
        var value = event.target.value;
        event.target.value = value.replace(/\D/g, '');
    });
});
</script>

<?= $this->endSection() ?>
