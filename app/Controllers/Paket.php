<?php

namespace App\Controllers;

use App\Models\PaketModel;
use CodeIgniter\Controller;

class Paket extends Controller
{
    public function index()
    {
        $model = new PaketModel();
        $data['paket'] = $model->findAll();
        return view('paket/paket', $data);
    }

    public function tambah()
    {
        return view('paket/tambah_paket');
    }

    public function simpan()
    {
        $model = new PaketModel();
        $data = [
            'kode_paket' => $this->request->getPost('kode_paket'),
            'paket'      => $this->request->getPost('paket'),
            'jenis'      => $this->request->getPost('jenis'),
            'harga'      => $this->request->getPost('harga'),
        ];

        if ($model->insert($data) === false) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to(base_url('paket'));
    }

    public function edit($id)
    {
        $model = new PaketModel();
        $data['paket'] = $model->find($id);
        return view('paket/edit_paket', $data);
    }

    public function update($id)
    {
        $model = new PaketModel();
        $data = [
            'paket' => $this->request->getPost('paket'),
            'jenis' => $this->request->getPost('jenis'),
            'harga' => $this->request->getPost('harga'),
        ];

        if ($model->update($id, $data) === false) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to(base_url('paket'));
    }

    public function delete($id)
    {
        $model = new PaketModel();

        if ($model->find($id)) {
            $model->delete($id);
        } else {
            return redirect()->back()->with('error', 'Kode Paket tidak ditemukan.');
        }

        return redirect()->to(base_url('paket'));
    }
}
