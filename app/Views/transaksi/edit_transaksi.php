<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Transaksi</div>
                    <div class="panel-body">
                        <!-- Form Edit Transaksi -->
                        <form action="<?= site_url('transaksi/update/' . esc($transaksi['no_order'])) ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="POST">
                            <div class="form-group">
                                <label for="id_pelanggan">Pelanggan</label>
                                <select class="form-control" name="id_pelanggan" id="id_pelanggan" required>
                                    <?php foreach ($pelanggan as $pelangganItem): ?>
                                        <option value="<?= esc($pelangganItem['id_pelanggan']) ?>"
                                            <?= isset($transaksi['id_pelanggan']) && $transaksi['id_pelanggan'] == $pelangganItem['id_pelanggan'] ? 'selected' : '' ?>>
                                            <?= esc($pelangganItem['nama']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="paket">Paket</label>
                                <select class="form-control" name="paket" id="paket" required>
                                    <?php if (isset($paket) && is_array($paket)): ?>
                                        <?php foreach ($paket as $paketItem): ?>
                                            <option value="<?= esc($paketItem['kode_paket']) ?>"
                                                data-harga="<?= esc($paketItem['harga']) ?>"
                                                <?= isset($transaksi['paket']) && $transaksi['paket'] == $paketItem['kode_paket'] ? 'selected' : '' ?>>
                                                <?= esc($paketItem['paket']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <option value="">No packages available</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah" min="1" value="<?= esc($transaksi['jumlah']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="text" class="form-control" name="total" id="total" value="<?= esc($transaksi['total']) ?>" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= site_url('transaksi') ?>" class="btn btn-default">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const paketSelect = document.getElementById('paket');
    const jumlahInput = document.getElementById('jumlah');
    const totalInput = document.getElementById('total');

    function updateTotal() {
        const selectedOption = paketSelect.options[paketSelect.selectedIndex];
        const harga = selectedOption ? parseFloat(selectedOption.getAttribute('data-harga')) : 0;
        const jumlah = parseFloat(jumlahInput.value) || 0;
        const total = harga * jumlah;
        totalInput.value = total.toFixed(0); // Format total sebagai integer
    }

    paketSelect.addEventListener('change', updateTotal);
    jumlahInput.addEventListener('input', updateTotal);

    // Update total on page load if already set
    updateTotal();
});
</script>

<?= $this->endSection() ?>
