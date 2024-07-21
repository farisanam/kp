<?php namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'no_order';
    protected $allowedFields = ['tgl_masuk', 'jenis', 'paket', 'jumlah', 'status', 'tgl_ambil', 'harga_satuan', 'total'];
    
    // Jika `no_order` adalah auto-increment, Anda bisa menambahkan:
    // protected $useAutoIncrement = true;
    
    // Tambahkan validasi jika diperlukan
    protected $validationRules = [
        'tgl_masuk' => 'required|valid_date',
        'jenis' => 'required',
        'paket' => 'required',
        'jumlah' => 'required|integer',
        'status' => 'permit_empty',
        'tgl_ambil' => 'permit_empty|valid_date',
        'harga_satuan' => 'required|integer',
        'total' => 'required|integer'
    ];
}
