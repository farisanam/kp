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
                        <!-- Tabel Data Transaksi -->
                        <table class="table table-striped table-responsive" id="transaksiTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. Order</th>
                                    <th>Nama</th>
                                    <th>Tgl Masuk</th>
                                    <th>Tgl Ambil</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($transaksi) && is_array($transaksi)): ?>
                                    <?php $no = 1; foreach ($transaksi as $item): ?>
                                    <tr>
                                        <td><?= esc($no++) ?></td>
                                        <td><?= esc($item['no_order']) ?></td>
                                        <td><?= esc($item['nama']) ?></td>
                                        <td><?= esc($item['tgl_masuk']) ?></td>
                                        <td><?= esc($item['tgl_ambil']) ?></td>
                                        <td><?= esc($item['jumlah']) ?></td>
                                        <td><?= number_format($item['total'], 0, ',', '.') ?></td>
                                        <td>
                                            <a href="<?= site_url('transaksi/edit/' . $item['no_order']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="<?= site_url('transaksi/delete/' . $item['no_order']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                            <?php if (is_null($item['tgl_ambil'])): ?>
                                                <button class="btn btn-success btn-sm" onclick="confirmPickup(<?= esc($item['no_order']) ?>)">Konfirmasi</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data transaksi</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <!-- Tombol Tambah Transaksi -->
                        <div class="text-center">
                            <a href="<?= site_url('transaksi/tambah_transaksi') ?>"><button type="button" class="btn btn-primary">Tambah Transaksi</button></a>
                        </div>
                    </div>
                </div>                                                            
            </div>
        </div>
    </div>
</div>

<script>
function confirmPickup(noOrder) {
    if (confirm('Apakah Anda yakin ingin mengkonfirmasi order ini?')) {
        window.location.href = '<?= site_url('transaksi/konfirmasi_ambil/') ?>' + noOrder;
    }
}
</script>

<?= $this->endSection() ?>
