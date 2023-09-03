<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'nama', 'alamat'];

    protected $validationRules = [
        'username' => 'required|alpha_numeric|min_length[5]|is_unique[users.username]',
        'password' => 'required|min_length[8]',
        'nama'     => 'required',
        'alamat'   => 'required',
    ];

    protected $validationMessages = [
        'username' => [
            'is_unique' => 'Username sudah digunakan.',
        ],
    ];

    protected $skipValidation = false;

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}
