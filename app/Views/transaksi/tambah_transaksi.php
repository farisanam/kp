<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Tambah Transaksi</div>
                    <div class="panel-body">
                        <!-- Form Tambah Transaksi -->
                        <form action="<?= site_url('transaksi/simpan') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="id_pelanggan">Pelanggan</label>
                                <select class="form-control" name="id_pelanggan" id="id_pelanggan" required>
                                    <option value="">Pilih Pelanggan</option>
                                    <?php foreach ($pelanggan as $pelangganItem): ?>
                                        <option value="<?= esc($pelangganItem['id_pelanggan']) ?>"><?= esc($pelangganItem['nama']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="paket">Paket</label>
                                <select class="form-control" name="paket" id="paket" required>
                                    <option value="">Pilih Paket</option>
                                    <?php foreach ($paket as $paketItem): ?>
                                        <option value="<?= esc($paketItem['kode_paket']) ?>" data-harga="<?= esc($paketItem['harga']) ?>">
                                            <?= esc($paketItem['paket']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah" min="1" required>
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="text" class="form-control" name="total" id="total" readonly>
                            </div>
                            <div class="text-center">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <?= anchor('transaksi', 'Batal', ['class' => 'btn btn-default']) ?>
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
});
</script>

<?= $this->endSection() ?>
