<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PegawaiModel;
use CodeIgniter\Controller;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/auth/login');
        }

        $userModel = new UserModel();
        $pegawaiModel = new PegawaiModel();

        $totalUser = $userModel->countAll();
        $totalPegawai = $pegawaiModel->countAll();

        $data = [
            'totalUser' => $totalUser,
            'totalPegawai' => $totalPegawai,
        ];

        return view('dashboard', $data);
    }
}
