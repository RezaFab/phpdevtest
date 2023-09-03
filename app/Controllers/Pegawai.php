<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use CodeIgniter\Controller;

class Pegawai extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $pegawaiModel = new PegawaiModel();
        $data['pegawai'] = $pegawaiModel->findAll();

        return view('pegawai', $data);
    }

    public function create()
    {
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'Tambah Pegawai',
            'header' => 'Tambah Pegawai',
            'submitButtonLabel' => 'Tambah',
            'formAction' => base_url('pegawai/create'),
        ];

        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama'   => 'required',
            'alamat' => 'required',
            'foto'   => 'uploaded[foto]|max_size[foto,300]|is_image[foto]|mime_in[foto,image/jpeg,image/jpg]',
        ]);

        if ($this->request->getMethod(true) === 'POST') {
            if (!$validation->withRequest($this->request)->run()) {
                $validation->setError('foto', 'File foto harus berformat JPEG/JPG dengan ukuran maksimal 300KB.');
            } else {
                $pegawaiModel = new PegawaiModel();
                $foto = $this->request->getFile('foto');

                if ($foto->isValid() && !$foto->hasMoved()) {
                    $fotoName = $foto->getRandomName();
                    $foto->move(ROOTPATH . 'public/uploads', $fotoName);

                    $pegawaiModel->save([
                        'nama' => $this->request->getPost('nama'),
                        'alamat' => $this->request->getPost('alamat'),
                        'foto' => $fotoName,
                    ]);

                    return redirect()->to('/pegawai')->with('success', 'Data pegawai berhasil ditambahkan');
                }
            }
        }

        if ($validation->getError('foto')) {
            $validation->setError('foto', 'File foto harus berformat JPEG/JPG dengan ukuran maksimal 300KB.');
        }

        $data['validation'] = $validation;

        return view('createpegawai', $data);
    }




    public function edit($id)
    {
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $pegawaiModel = new PegawaiModel();
        $data['pegawai'] = $pegawaiModel->find($id);

        if (!$data['pegawai']) {
            return redirect()->to('/pegawai')->with('error', 'Pegawai tidak ditemukan');
        }

        $data['title'] = 'Edit Pegawai';
        $data['header'] = 'Edit Pegawai';
        $data['submitButtonLabel'] = 'Update';
        $data['formAction'] = base_url('pegawai/edit/' . $id);

        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama'     => 'required',
            'alamat'   => 'required',
            'foto'     => 'max_size[foto,300]|is_image[foto]|mime_in[foto,image/jpeg,image/jpg]',
        ]);

        if ($this->request->getMethod(true) === 'POST' && $validation->withRequest($this->request)->run()) {
            $foto = $this->request->getFile('foto');
            if ($foto->isValid() && !$foto->hasMoved()) {
                $fotoName = $foto->getRandomName();
                $foto->move(ROOTPATH . 'public/uploads', $fotoName);
                $data['pegawai']['foto'] = $fotoName;
            }

            $pegawaiModel->update($id, [
                'nama' => $this->request->getPost('nama'),
                'alamat' => $this->request->getPost('alamat'),
                'foto' => $data['pegawai']['foto'] ?? $data['pegawai']['foto'],
            ]);

            return redirect()->to('/pegawai')->with('success', 'Data pegawai berhasil diperbarui');
        } else {
            $data['validation'] = $validation;
        }

        return view('createpegawai', $data);
    }

    public function delete($id)
    {
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $pegawaiModel = new PegawaiModel();
        $pegawai = $pegawaiModel->find($id);

        if (!$pegawai) {
            return redirect()->to('/pegawai')->with('error', 'Pegawai tidak ditemukan');
        }

        $fotoPath = ROOTPATH . 'public/uploads/' . $pegawai['foto'];
        if (file_exists($fotoPath)) {
            unlink($fotoPath);
        }

        $pegawaiModel->delete($id);

        return redirect()->to('/pegawai')->with('success', 'Data pegawai berhasil dihapus');
    }
}
