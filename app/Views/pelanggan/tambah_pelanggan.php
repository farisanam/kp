<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">Tambah Pelanggan</div>
                    <div class="panel-body">
                        <!-- Tampilkan Pesan Kesalahan -->
                        <?php if (session()->getFlashdata('errors')) : ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php endif ?>

                        <form id="pelangganForm" class="form-horizontal" role="form" action="<?= base_url('pelanggan/simpan') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nama :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" value="<?= old('nama') ?>" placeholder="Nama Pelanggan" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Alamat :</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat" placeholder="Alamat" required><?= old('alamat') ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">No Telp :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="telepon" value="<?= old('telepon') ?>" placeholder="08xxxxxxxxxx" pattern="[0-9]{10,14}" title="Masukkan angka antara 10-14 digit tanpa spasi" maxlength="14" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" name="tambah" value="Tambah" type="submit">Tambah</button>
                                <?= anchor('pelanggan', 'Batal', ['class' => 'btn btn-default']) ?>
                            </div>
                        </form>                                    
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
