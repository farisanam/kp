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
                        <form action="<?= site_url('transaksi/update/' . $transaksi['no_order']) ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="id_pelanggan">Nama Pelanggan</label>
                                <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
                                    <?php foreach ($pelanggan as $p): ?>
                                        <option value="<?= $p['id_pelanggan'] ?>" <?= ($transaksi['id_pelanggan'] == $p['id_pelanggan']) ? 'selected' : '' ?>>
                                            <?= esc($p['nama']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kode_paket">Paket</label>
                                <select name="kode_paket" id="kode_paket" class="form-control" required>
                                    <?php foreach ($paket as $p): ?>
                                        <option value="<?= $p['kode_paket'] ?>" <?= ($transaksi['kode_paket'] == $p['kode_paket']) ? 'selected' : '' ?>>
                                            <?= esc($p['paket']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control" value="<?= esc($transaksi['jumlah']) ?>" min="1" required>
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="text" name="total" id="total" class="form-control" value="<?= esc($transaksi['total']) ?>" readonly>
                            </div>
                            <input type="hidden" name="tgl_masuk" id="tgl_masuk" value="<?= esc($transaksi['tgl_masuk']) ?>">
                            <input type="hidden" name="tgl_ambil" id="tgl_ambil" value="<?= esc($transaksi['tgl_ambil']) ?>">

                            <?php if (!$transaksi['tgl_ambil']): ?>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            <?php else: ?>
                                <div class="form-group">
                                    <p class="text-danger">Tanggal ambil sudah dikonfirmasi dan tidak dapat diubah.</p>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript untuk menghitung total otomatis
    document.addEventListener('DOMContentLoaded', function() {
        const paketSelect = document.getElementById('kode_paket');
        const jumlahInput = document.getElementById('jumlah');
        const totalInput = document.getElementById('total');

        function updateTotal() {
            const paketId = paketSelect.value;
            const jumlah = parseInt(jumlahInput.value) || 0;

            if (paketId) {
                fetch(`<?= site_url('transaksi/getPaketPrice') ?>/${paketId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data && data.harga) {
                            const hargaSatuan = data.harga;
                            totalInput.value = hargaSatuan * jumlah;
                        } else {
                            totalInput.value = 0;
                        }
                    });
            } else {
                totalInput.value = 0;
            }
        }

        paketSelect.addEventListener('change', updateTotal);
        jumlahInput.addEventListener('input', updateTotal);

        // Initialize total
        updateTotal();
    });
</script>

<?= $this->endSection() ?>
