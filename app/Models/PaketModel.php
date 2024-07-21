<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table = 'paket';
    protected $primaryKey = 'kode_paket'; 

    protected $allowedFields = ['kode_paket', 'paket', 'jenis', 'harga']; 

    protected $validationRules = [
        'kode_paket' => 'required|is_unique[paket.kode_paket]', 
        'paket'      => 'required',
        'jenis'      => 'required',
        'harga'      => 'required|integer'
    ];

    protected $validationMessages = [
        'kode_paket' => [
            'is_unique' => 'Kode paket ini sudah ada. Mohon gunakan kode lain.'
        ]
    ];
}
