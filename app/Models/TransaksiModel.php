<?php namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'no_order';
    protected $allowedFields = ['no_order', 'id_pelanggan', 'tgl_masuk', 'tgl_ambil', 'jenis', 'paket', 'jumlah', 'status', 'harga_satuan', 'total'];
    protected $useTimestamps = true;

    public function getTransaksi($tglAwal = null, $tglAkhir = null)
    {
        if ($tglAwal && $tglAkhir) {
            return $this->where('tgl_masuk >=', $tglAwal)
                        ->where('tgl_masuk <=', $tglAkhir)
                        ->findAll();
        }
        return $this->findAll();
    }
}
