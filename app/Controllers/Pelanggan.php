<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    protected $pelangganModel;

    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $data['pelanggan'] = $this->pelangganModel->getPelanggan();
        return view('pelanggan/pelanggan', $data);
    }

    public function tambah()
    {
        return view('pelanggan/tambah_pelanggan');
    }

    public function simpan()
    {
        $model = new PelangganModel();

        if (!$this->validate($model->getValidationRules(), $model->getValidationMessages())) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->save([
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon')
        ]);

        return redirect()->to('/pelanggan');
    }

    public function edit($id_pelanggan)
    {
        $data['pelanggan'] = $this->pelangganModel->find($id_pelanggan);
        return view('pelanggan/edit_pelanggan', $data);
    }

    public function update($id_pelanggan)
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon')
        ];

        if ($this->pelangganModel->update($id_pelanggan, $data) === false) {
            return redirect()->back()->withInput()->with('errors', $this->pelangganModel->errors());
        }

        return redirect()->to('/pelanggan');
    }

    public function delete($id_pelanggan)
    {
        $this->pelangganModel->delete($id_pelanggan);
        return redirect()->to('/pelanggan');
    }
}
