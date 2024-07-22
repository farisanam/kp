<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use App\Models\PaketModel;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    public function index()
    {
        $transaksiModel = new TransaksiModel();
        $data['transaksi'] = $transaksiModel->getTransaksi();
        return view('transaksi/transaksi', $data);
    }

    public function tambah()
    {
        $pelangganModel = new PelangganModel();
        $paketModel = new PaketModel();
        $data['pelanggan'] = $pelangganModel->findAll();
        $data['paket'] = $paketModel->getPaket();
        return view('transaksi/tambah_transaksi', $data);
    }

    public function simpan()
    {
        $paketModel = new PaketModel();
        $transaksiModel = new TransaksiModel();

        $id_pelanggan = $this->request->getPost('id_pelanggan');
        $kode_paket = $this->request->getPost('paket'); // Perbaiki key untuk paket
        $jumlah = $this->request->getPost('jumlah');

        // Mendapatkan harga dari paket
        $paket = $paketModel->where('kode_paket', $kode_paket)->first();

        if ($paket) {
            $harga_satuan = $paket['harga'];
            $total = $harga_satuan * $jumlah;

            $data = [
                'id_pelanggan' => $id_pelanggan,
                'tgl_masuk' => date('Y-m-d'), // Tanggal saat ini
                'jumlah' => $jumlah,
                'total' => $total,
            ];

            // Simpan transaksi ke database
            $transaksiModel->save($data);

            return redirect()->to('/transaksi')->with('message', 'Transaksi berhasil disimpan');
        } else {
            return redirect()->back()->with('error', 'Paket tidak ditemukan');
        }
    }

    public function edit($no_order)
    {
        $transaksiModel = new TransaksiModel();
        $pelangganModel = new PelangganModel();
        $paketModel = new PaketModel();
        $data['transaksi'] = $transaksiModel->find($no_order);
        $data['pelanggan'] = $pelangganModel->findAll();
        $data['paket'] = $paketModel->getPaket();
        return view('transaksi/edit_transaksi', $data);
    }

    public function update($no_order)
    {
        $transaksiModel = new TransaksiModel();
        $data = [
            'id_pelanggan' => $this->request->getPost('id_pelanggan'),
            'kode_paket' => $this->request->getPost('kode_paket'),
            'tgl_masuk' => $this->request->getPost('tgl_masuk'),
            'tgl_ambil' => $this->request->getPost('tgl_ambil'),
            'jumlah' => $this->request->getPost('jumlah'),
            'total' => $this->request->getPost('total'),
        ];
        $transaksiModel->update($no_order, $data);
        return redirect()->to('/transaksi');
    }

    public function delete($no_order)
    {
        $transaksiModel = new TransaksiModel();

        // Hapus data transaksi berdasarkan no_order
        $transaksiModel->delete($no_order);

        // Redirect ke halaman transaksi dengan pesan sukses
        return redirect()->to('/transaksi')->with('message', 'Transaksi berhasil dihapus');
    }
    
    public function konfirmasi_ambil($no_order)
{
    $transaksiModel = new TransaksiModel();

    // Update transaksi untuk menambahkan tgl_ambil
    $data = [
        'tgl_ambil' => date('Y-m-d'),
    ];

    // Pastikan bahwa data ini valid dan eksis
    if ($transaksiModel->update($no_order, $data)) {
        return redirect()->to('/transaksi');
    } else {
        // Jika gagal, Anda bisa menambahkan penanganan error disini
        return redirect()->back()->with('error', 'Gagal mengkonfirmasi tanggal ambil');
    }
}


}
