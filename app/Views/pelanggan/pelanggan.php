<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">Data Pelanggan</div>
                    <div class="panel-body">                                    
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>                                    
                                    <th>Id</th>                                    
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No Telp</th>                                  
                                    <th>Opsi</th>                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($pelanggan) && is_array($pelanggan)): ?>
                                    <?php foreach ($pelanggan as $index => $p): ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= esc($p['id_pelanggan']) ?></td>
                                            <td><?= esc($p['nama']) ?></td>
                                            <td><?= esc($p['alamat']) ?></td>
                                            <td><?= esc($p['telepon']) ?></td>
                                            <td>
                                                <?= anchor("pelanggan/edit/{$p['id_pelanggan']}", 'Edit', ['class' => 'btn btn-warning btn-sm']) ?>
                                                <?= anchor("pelanggan/delete/{$p['id_pelanggan']}", 'Hapus', ['class' => 'btn btn-danger btn-sm', 'onclick' => 'return confirm("Yakin ingin menghapus data ini?")']) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6">Belum ada data.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <?= anchor('pelanggan/tambah_pelanggan', '<button type="button" class="btn btn-primary">Tambah Data</button>') ?>
                        </div>
                    </div>
                </div>                                                            
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
