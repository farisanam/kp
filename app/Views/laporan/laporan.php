<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Laporan Transaksi KICKBATH</div>
                    <div class="panel-body">
                        <div class="form-container">
                            <form action="<?= site_url('laporan') ?>" method="post" name="form10" target="_self">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <input name="txtTglAwal" type="date" class="form-control" value="<?= esc($txtTglAwal) ?>" size="10" />
                                    </div>
                                    <div class="col-lg-3">
                                        <input name="txtTglAkhir" type="date" class="form-control" value="<?= esc($txtTglAkhir) ?>" size="10" />
                                    </div>
                                    <div class="col-lg-3">
                                        <input name="btnTampil" class="btn btn-success" type="submit" value="Tampilkan" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. Order</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($transaksi) && is_array($transaksi)): ?>
                                    <?php $no = 1; foreach ($transaksi as $item): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= esc($item['no_order']) ?></td>
                                        <td><?= esc($item['nama']) ?></td>
                                        <td><?= esc($item['status']) ?></td>
                                        <td><?= esc($item['total']) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data transaksi untuk periode ini.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="text-center mt-3">
                            <a href="<?= site_url('rekap/cetak?awal=' . urlencode($txtTglAwal) . '&akhir=' . urlencode($txtTglAkhir)) ?>" target="_blank" class="btn btn-primary">Cetak Laporan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
