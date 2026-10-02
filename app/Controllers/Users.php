<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    // Display all users
    public function index()
    {
        $data['title'] = 'User Accounts';

        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        return view('users', $data);
    }


    // Display New User form
    public function new()
    {
        $data['title'] = 'Add New User';

        return view('users/new', $data);
    }


    // Create new user
    public function create()
    {
        $rules = [
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required'  => 'Username is required.',
                    'is_unique' => 'This username is already in use.'
                ]
            ],

            'full_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Full name is required.'
                ]
            ],

            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required'   => 'Password is required.',
                    'min_length' => 'Password must be at least 8 characters long.'
                ]
            ]
        ];


        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }


        $userModel = new UserModel();


        $userModel->insert([
            'username' => $this->request->getPost('username'),

            'full_name' => $this->request->getPost('full_name'),

            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),

            'created_at' => date('Y-m-d H:i:s')
        ]);


        return redirect()
            ->to('/users')
            ->with('success', 'User added successfully.');
    }


    // Display Edit User form
    public function edit($id)
    {
        $userModel = new UserModel();

        $user = $userModel->find($id);

        if (!$user) {
            return redirect()
                ->to('/users')
                ->with('error', 'User not found.');
        }


        $data = [
            'title' => 'Edit User',
            'user'  => $user
        ];


        return view('users/edit', $data);
    }


    // Update existing user
    public function update($id)
    {
        $userModel = new UserModel();

        $user = $userModel->find($id);


        if (!$user) {
            return redirect()
                ->to('/users')
                ->with('error', 'User not found.');
        }


        $rules = [
            'username' => [
                'rules' => 'required|is_unique[users.username,id,' . $id . ']',
                'errors' => [
                    'required'  => 'Username is required.',
                    'is_unique' => 'This username is already in use.'
                ]
            ],

            'full_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Full name is required.'
                ]
            ],

            'avatar' => [
                'rules' => [
                    'max_size[avatar,2048]',
                    'ext_in[avatar,jpg,jpeg,png]',
                    'mime_in[avatar,image/jpg,image/jpeg,image/png]'
                ],
                'errors' => [
                    'max_size' => 'Avatar must not be larger than 2MB.',
                    'ext_in'   => 'Avatar must be a JPG or PNG image.',
                    'mime_in'  => 'Avatar must be a valid JPG or PNG image.'
                ]
            ]
        ];


        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }


        $updateData = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name')
        ];


        // Get uploaded avatar
        $avatar = $this->request->getFile('avatar');


        // Process avatar only if a new image was uploaded
        if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {

            // Generate safe random filename
            $newName = $avatar->getRandomName();


            // Save avatar
            $avatar->move(
                FCPATH . 'uploads/avatars',
                $newName
            );


            // Store only filename in database
            $updateData['avatar'] = $newName;
        }


        // Update user
        $userModel->update($id, $updateData);


        return redirect()
            ->to('/users')
            ->with('success', 'User updated successfully.');
    }
}