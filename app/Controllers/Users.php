<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $data['title'] = 'User Accounts';

        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        return view('users', $data);
    }
}