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

    public function new()
    {
        $data['title'] = 'Add New Customer';

        return view('customers/new', $data);
    }

    public function create()
    {
        $rules = [
            'full_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Full name is required.'
                ]
            ],

            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required'    => 'Email is required.',
                    'valid_email' => 'Please enter a valid email address.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $customerModel = new CustomerModel();

        $customerModel->insert([
            'full_name'  => $this->request->getPost('full_name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()
            ->to('/customers')
            ->with('success', 'Customer added successfully.');
    }

    public function edit($id)
    {
        $customerModel = new CustomerModel();

        $customer = $customerModel->find($id);

        if (!$customer) {
            return redirect()
                ->to('/customers')
                ->with('error', 'Customer not found.');
        }

        $data = [
            'title'    => 'Edit Customer',
            'customer' => $customer
        ];

        return view('customers/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'full_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Full name is required.'
                ]
            ],

            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required'    => 'Email is required.',
                    'valid_email' => 'Please enter a valid email address.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $customerModel = new CustomerModel();

        $customerModel->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone')
        ]);

        return redirect()
            ->to('/customers')
            ->with('success', 'Customer updated successfully.');
    }
}