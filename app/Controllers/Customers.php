<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
        $data['title'] = 'Customer Accounts';

        $customerModel = new CustomerModel();
        $data['customers'] = $customerModel->findAll();

        return view('customers', $data);
    }
}