<?php namespace App\Controllers;

use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    public function index()
    {
        $transaksiModel = new TransaksiModel();
        $data['transaksi'] = $transaksiModel->getTransaksi();
        
        echo view('transaksi/transaksi', $data);
    }

    // Method lainnya sesuai kebutuhan
}
