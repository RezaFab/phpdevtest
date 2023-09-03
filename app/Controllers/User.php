<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class User extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        return view('user', $data);
    }
    public function logout()
    {
        $session = session();
        $session->remove('user_id');
        $session->remove('username');

        return redirect()->to('/auth/login');
    }

    public function create()
    {
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $data['title'] = 'Tambah User';
        $data['header'] = 'Tambah User';
        $data['submitButtonLabel'] = 'Simpan';
        $data['formAction'] = base_url('user/create');
        $data['usernameDisabled'] = '';

        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|alpha_numeric|min_length[5]|is_unique[users.username]',
            'password' => 'required|min_length[8]',
            'nama'     => 'required',
            'alamat'   => 'required',
        ]);

        if ($this->request->getMethod(true) === 'POST') {
            if (!$validation->withRequest($this->request)->run()) {
                return view('createuser', ['validation' => $validation] + $data);
            }

            $userModel = new UserModel();
            $userModel->save([
                'username' => $this->request->getPost('username'),
                'password' => password_hash((string)$this->request->getPost('password'), PASSWORD_DEFAULT),
                'nama'     => $this->request->getPost('nama'),
                'alamat'   => $this->request->getPost('alamat'),
            ]);

            return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
        }

        return view('createuser', $data);
    }

    public function edit($id)
    {
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        if (!$data['user']) {
            return redirect()->to('/user')->with('error', 'User tidak ditemukan');
        }

        $data['title'] = 'Edit User';
        $data['header'] = 'Edit User';
        $data['submitButtonLabel'] = 'Update';
        $data['formAction'] = base_url('user/edit/' . $id);
        $data['usernameDisabled'] = 'readonly';

        $validation = \Config\Services::validation();
        $validation->setRules([
            'password' => 'required|min_length[8]',
            'nama'     => 'required',
            'alamat'   => 'required',
        ]);

        if ($this->request->getMethod(true) === 'POST') {
            if (!$validation->withRequest($this->request)->run()) {
                return view('createuser', ['validation' => $validation] + $data);
            }

            $userModel->update($id, [
                'password' => password_hash((string)$this->request->getPost('password'), PASSWORD_DEFAULT),
                'nama'     => $this->request->getPost('nama'),
                'alamat'   => $this->request->getPost('alamat'),
            ]);

            return redirect()->to('/user')->with('success', 'Data pengguna berhasil diperbarui');
        }

        return view('createuser', $data);
    }


    public function checkUsername()
    {
        if ($this->request->isAJAX()) {
            $username = $this->request->getPost('username');
            $userModel = new UserModel();

            if ($userModel->where('username', $username)->countAllResults() > 0) {
                echo '<span class="text-danger"><i class="fas fa-times-circle"></i> Username Sudah Terpakai</span>';
            } else {
                echo '<span class="text-success"><i class="fas fa-check-circle"></i> Username Tersedia</span>';
            }
        }
    }

    public function delete($id)
    {
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $userModel = new UserModel();

        $existingUser = $userModel->find($id);

        if (!$existingUser) {
            return redirect()->to('/user')->with('error', 'User tidak ditemukan');
        }

        $userModel->delete($id);

        return redirect()->to('/user')->with('success', 'User berhasil dihapus');
    }
}
