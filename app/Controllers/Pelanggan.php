<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use CodeIgniter\Controller;

class Pelanggan extends Controller
{
    public function index()
    {
        // Ambil data dari database
        $model = new PelangganModel();
        $data['pelanggan'] = $model->findAll();
        return view('pelanggan/pelanggan', $data);
    }

    public function tambah()
    {
        return view('pelanggan/tambah_pelanggan');
    }

    public function simpan()
    {
        $model = new PelangganModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
        ];
        
        $model->insert($data);
        
        return redirect()->to(base_url('pelanggan'));
    }

    public function edit($id)
    {
        $model = new PelangganModel();
        $data['pelanggan'] = $model->find($id);

        return view('pelanggan/edit_pelanggan', $data);
    }

    public function update($id)
    {
        $model = new PelangganModel();
        $data = [
            'nama'    => $this->request->getPost('nama'),
            'alamat'  => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
        ];

        $model->update($id, $data);

        return redirect()->to('pelanggan');
    }

    public function delete($id)
    {
        $model = new PelangganModel();
        $model->delete($id);

        return redirect()->to('pelanggan');
    }

}
