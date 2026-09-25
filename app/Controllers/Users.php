<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $data['title'] = 'User Accounts';

        $data['users'] = [
            [
                'username' => 'admin01',
                'name' => 'John Reyes',
                'role' => 'Administrator'
            ],
            [
                'username' => 'cashier01',
                'name' => 'Maria Cruz',
                'role' => 'Cashier'
            ],
            [
                'username' => 'cashier02',
                'name' => 'Paolo Santos',
                'role' => 'Cashier'
            ],
            [
                'username' => 'staff01',
                'name' => 'Anna Garcia',
                'role' => 'Staff'
            ],
            [
                'username' => 'manager01',
                'name' => 'Mark Mendoza',
                'role' => 'Manager'
            ]
        ];

        return view('users', $data);
    }
}