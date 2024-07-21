<?php namespace App\Controllers;

use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    public function index()
    {
        $transaksiModel = new TransaksiModel();
        $data['transaksi'] = $transaksiModel->findAll();
        return view('/transaksi/transaksi', $data);
    }

    public function tambah_transaksi()
    {
        return view('tambah_transaksi');
    }

    public function simpan()
    {
        $transaksiModel = new TransaksiModel();
        $transaksiModel->save([
            'tgl_masuk' => $this->request->getPost('tgl_masuk'),
            'jenis' => $this->request->getPost('jenis'),
            'paket' => $this->request->getPost('paket'),
            'jumlah' => $this->request->getPost('jumlah'),
            'status' => $this->request->getPost('status'),
            'tgl_ambil' => $this->request->getPost('tgl_ambil'),
            'harga_satuan' => $this->request->getPost('harga_satuan'),
            'total' => $this->request->getPost('total'),
        ]);
        return redirect()->to('/transaksi');
    }

    public function edit($no_order)
    {
        $transaksiModel = new TransaksiModel();
        $data['transaksi'] = $transaksiModel->find($no_order);
        return view('edit_transaksi', $data);
    }

    public function update($no_order)
    {
        $transaksiModel = new TransaksiModel();
        $transaksiModel->update($no_order, [
            'tgl_masuk' => $this->request->getPost('tgl_masuk'),
            'jenis' => $this->request->getPost('jenis'),
            'paket' => $this->request->getPost('paket'),
            'jumlah' => $this->request->getPost('jumlah'),
            'status' => $this->request->getPost('status'),
            'tgl_ambil' => $this->request->getPost('tgl_ambil'),
            'harga_satuan' => $this->request->getPost('harga_satuan'),
            'total' => $this->request->getPost('total'),
        ]);
        return redirect()->to('/transaksi');
    }

    public function delete($no_order)
    {
        $transaksiModel = new TransaksiModel();
        $transaksiModel->delete($no_order);
        return redirect()->to('/transaksi');
    }
}
