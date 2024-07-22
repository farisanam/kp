<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $allowedFields = ['nama', 'alamat', 'telepon'];

    protected $validationRules = [
        'nama' => 'required',
        'alamat' => 'required',
        'telepon' => 'required|numeric'
    ];

    protected $validationMessages = [
        'nama' => [
            'required' => 'Nama pelanggan harus diisi.'
        ],
        'alamat' => [
            'required' => 'Alamat pelanggan harus diisi.'
        ],
        'telepon' => [
            'required' => 'Nomor telepon harus diisi.',
            'numeric' => 'Nomor telepon harus berupa angka.'
        ]
    ];

    public function getPelanggan()
    {
        return $this->findAll();
    }
}