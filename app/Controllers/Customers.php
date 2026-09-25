<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $data['title'] = 'Customer Accounts';

        $data['customers'] = [
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'juan@example.com',
                'phone' => '09171234567'
            ],
            [
                'name' => 'Maria Santos',
                'email' => 'maria@example.com',
                'phone' => '09181234567'
            ],
            [
                'name' => 'Pedro Reyes',
                'email' => 'pedro@example.com',
                'phone' => '09191234567'
            ],
            [
                'name' => 'Ana Garcia',
                'email' => 'ana@example.com',
                'phone' => '09201234567'
            ],
            [
                'name' => 'Carlo Mendoza',
                'email' => 'carlo@example.com',
                'phone' => '09211234567'
            ]
        ];

        return view('customers', $data);
    }
}