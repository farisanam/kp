<?php namespace App\Controllers;

use App\Models\TransaksiModel;

class Laporan extends BaseController
{
    protected $transaksiModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
    }

    public function index()
    {
        $txtTglAwal = $this->request->getVar('txtTglAwal');
        $txtTglAkhir = $this->request->getVar('txtTglAkhir');
        
        $data = [
            'txtTglAwal' => $txtTglAwal, // Pastikan nama variabel konsisten
            'txtTglAkhir' => $txtTglAkhir, // Pastikan nama variabel konsisten
            'transaksi' => $this->transaksiModel->getTransaksi($txtTglAwal, $txtTglAkhir)
        ];
        return view('laporan/laporan', $data);
    }
}
