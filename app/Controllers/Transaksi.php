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
        $data['transaksi'] = $transaksiModel->getTransaksiOrdered(); // Mengambil data yang terurut
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
        $kode_paket = $this->request->getPost('paket');
        $jumlah = $this->request->getPost('jumlah');

        // Mendapatkan harga dari paket
        $paket = $paketModel->where('kode_paket', $kode_paket)->first();

        if ($paket) {
            $harga_satuan = $paket['harga'];
            $total = $harga_satuan * $jumlah;

            $data = [
                'id_pelanggan' => $id_pelanggan,
                'tgl_masuk' => date('Y-m-d'),
                'paket' => $kode_paket,
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

    $transaksi = $transaksiModel->find($no_order);
    $pelanggan = $pelangganModel->findAll();
    $paket = $paketModel->getPaket(); // Mendapatkan data paket

    if (!$transaksi) {
        return redirect()->to('/transaksi')->with('error', 'Transaksi tidak ditemukan');
    }

    $data = [
        'transaksi' => $transaksi,
        'pelanggan' => $pelanggan,
        'paket' => $paket,
    ];

    return view('transaksi/edit_transaksi', $data);
}

    public function update($no_order)
    {
        $transaksiModel = new TransaksiModel();
        $paketModel = new PaketModel();

        $id_pelanggan = $this->request->getPost('id_pelanggan');
        $kode_paket = $this->request->getPost('paket');
        $jumlah = $this->request->getPost('jumlah');

        // Mendapatkan harga dari paket
        $paket = $paketModel->where('kode_paket', $kode_paket)->first();
        if (!$paket) {
            return redirect()->back()->with('error', 'Paket tidak ditemukan');
        }

        $harga_satuan = $paket['harga'];
        $total = $harga_satuan * $jumlah;

        $data = [
            'id_pelanggan' => $id_pelanggan,
            'paket' => $kode_paket,
            'jumlah' => $jumlah,
            'total' => $total,
        ];

        $transaksiModel->update($no_order, $data);

        return redirect()->to('/transaksi')->with('message', 'Transaksi berhasil diupdate');
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

    // Update transaksi untuk menambahkan tgl_ambil dan status
    $data = [
        'tgl_ambil' => date('Y-m-d'),
        'status' => 'sudah diambil'  // Menetapkan status sebagai "sudah diambil"
    ];

    // Pastikan bahwa data ini valid dan eksis
    if ($transaksiModel->update($no_order, $data)) {
        return redirect()->to('/transaksi')->with('message', 'Tanggal ambil dikonfirmasi dan status diupdate');
    } else {
        // Jika gagal, Anda bisa menambahkan penanganan error disini
        return redirect()->back()->with('error', 'Gagal mengkonfirmasi tanggal ambil');
        }
    }
}
