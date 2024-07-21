<?php namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'no_order';
    protected $allowedFields = ['tgl_masuk', 'jenis', 'paket', 'jumlah', 'status', 'tgl_ambil', 'harga_satuan', 'total'];
    protected $useTimestamps = true;

    public function getTransaksi()
    {
        return $this->select('transaksi.*, pelanggan.nama')
                    ->join('pelanggan', 'transaksi.no_order = pelanggan.id_pelanggan', 'left')
                    ->findAll();
    }

    // Method lainnya sesuai kebutuhan
}
