<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Data Paket</div>
                    <div class="panel-body">
                        <table id="paketTable" class="table table-striped table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Paket</th>
                                    <th>Paket</th>
                                    <th>Jenis</th>
                                    <th>Harga</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($paket) && is_array($paket)): ?>
                                    <?php foreach ($paket as $index => $p): ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= esc($p['kode_paket']) ?></td>
                                            <td><?= esc($p['paket']) ?></td>
                                            <td><?= esc($p['jenis']) ?></td>
                                            <td><?= number_format(esc($p['harga']), 0, ',', '.') ?></td>
                                            <td>
                                                <a href="<?= site_url('paket/edit/'.$p['kode_paket']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="<?= site_url('paket/delete/'.$p['kode_paket']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada data.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="text-center mt-3">
                            <a href="<?= site_url('paket/tambah_paket') ?>"><button type="button" class="btn btn-primary">Tambah Paket</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
