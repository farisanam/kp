<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function index()
{
    $session = session();
    if ($session->get('logged_in')) {
        return redirect()->to('/');
    }
    helper(['form']);
    echo view('login/index');
}


    public function login()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $model->getUserByUsername($username);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $sessData = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'logged_in' => true
                ];
                $session->set($sessData);
                return redirect()->to('/');
            } else {
                $session->setFlashdata('msg', 'Password salah.');
                return redirect()->to('/auth');
            }
        } else {
            $session->setFlashdata('msg', 'Username tidak ditemukan.');
            return redirect()->to('/auth');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/auth');
    }
}
