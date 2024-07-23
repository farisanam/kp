<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'no_order';
    protected $allowedFields = ['id_pelanggan', 'tgl_masuk', 'tgl_ambil', 'jumlah', 'total', 'status'];

    public function getTransaksiByDate($tglAwal, $tglAkhir)
    {
        $builder = $this->db->table($this->table);
        $builder->select('transaksi.*, pelanggan.nama');
        $builder->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan');

        if ($tglAwal && $tglAkhir) {
            $builder->where('tgl_masuk >=', $tglAwal);
            $builder->where('tgl_masuk <=', $tglAkhir);
        }
        $builder->orderBy('transaksi.no_order', 'ASC');


        $query = $builder->get();
        return $query->getResultArray();
    }

    // Fungsi untuk mendapatkan semua transaksi dengan nama pelanggan
    public function getTransaksi()
    {
        return $this->select('transaksi.*, pelanggan.nama')
                    ->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan')
                    ->findAll();
    }

    public function getTransaksiOrdered()
{
    return $this->select('transaksi.*, pelanggan.nama')
                ->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan')
                ->orderBy('no_order', 'ASC') // Mengurutkan berdasarkan no_order secara menaik
                ->findAll();
}


    // Aturan validasi untuk model ini
    protected $validationRules = [
        'id_pelanggan' => 'required|integer',
        'tgl_masuk' => 'required|valid_date',
        'tgl_ambil' => 'permit_empty|valid_date',
        'jumlah' => 'required|integer',
        'total' => 'required|integer',
        'status' => 'permit_empty|string'
    ];
    
    // Pesan validasi kustom untuk model ini
    protected $validationMessages = [
        'id_pelanggan' => [
            'required' => 'ID pelanggan harus diisi.',
            'integer' => 'ID pelanggan harus berupa angka.'
        ],
        'tgl_masuk' => [
            'required' => 'Tanggal masuk harus diisi.',
            'valid_date' => 'Tanggal masuk harus berupa tanggal yang valid.'
        ],
        'tgl_ambil' => [
            'valid_date' => 'Tanggal ambil harus berupa tanggal yang valid jika diisi.'
        ],
        'jumlah' => [
            'required' => 'Jumlah harus diisi.',
            'integer' => 'Jumlah harus berupa angka.'
        ],
        'total' => [
            'required' => 'Total harus diisi.',
            'integer' => 'Total harus berupa angka.'
        ]
    ];

    // Pengaturan default validasi error message
    protected $skipValidation = false;
    
}
