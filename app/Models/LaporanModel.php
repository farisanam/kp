<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'no_order';
    protected $allowedFields = ['no_order', 'id_pelanggan', 'tgl_masuk', 'tgl_ambil', 'jumlah', 'status', 'total'];

    public function getLaporanByDate($tglAwal, $tglAkhir)
    {
        return $this->select('transaksi.no_order, pelanggan.nama, transaksi.status, transaksi.total')
                    ->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan')
                    ->where('tgl_masuk >=', $tglAwal)
                    ->where('tgl_masuk <=', $tglAkhir)
                    ->findAll();
    }
}
