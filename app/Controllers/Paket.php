<?php

namespace App\Controllers;

use App\Models\PaketModel;

class Paket extends BaseController
{
    protected $paketModel;

    public function __construct()
    {
        $this->paketModel = new PaketModel();
    }

    public function index()
    {
        $data['paket'] = $this->paketModel->getPaket();
        return view('paket/paket', $data);
    }

    public function tambah()
    {
        return view('paket/tambah_paket');
    }

    public function simpan()
    {
        $data = [
            'kode_paket' => $this->request->getPost('kode_paket'),
            'paket' => $this->request->getPost('paket'),
            'jenis' => $this->request->getPost('jenis'),
            'harga' => $this->request->getPost('harga')
        ];

        if ($this->paketModel->insert($data) === false) {
            return redirect()->back()->withInput()->with('errors', $this->paketModel->errors());
        }

        return redirect()->to('/paket');
    }

    public function edit($kode_paket)
    {
        $data['paket'] = $this->paketModel->find($kode_paket);
        return view('paket/edit_paket', $data);
    }

    public function update($kode_paket)
    {
        $data = [
            'paket' => $this->request->getPost('paket'),
            'jenis' => $this->request->getPost('jenis'),
            'harga' => $this->request->getPost('harga')
        ];

        if ($this->paketModel->update($kode_paket, $data) === false) {
            return redirect()->back()->withInput()->with('errors', $this->paketModel->errors());
        }

        return redirect()->to('/paket');
    }

    public function delete($kode_paket)
    {
        $this->paketModel->delete($kode_paket);
        return redirect()->to('/paket');
    }
}
