<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        helper('form');

        if (session()->get('isLoggedIn')) {
            return redirect()->to('/users');
        }

        $data = [
            'title' => 'Login',
        ];

        return view('templates/header', $data)
            . view('auth/login', $data)
            . view('templates/footer');
    }

    public function attemptLogin()
    {
        helper('form');

        $rules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username is required.',
                ],
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password is required.',
                ],
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();

        $username = trim($this->request->getPost('username'));
        $password = $this->request->getPost('password');

        $user = $userModel
            ->where('username', $username)
            ->first();

        if (! $user || ! password_verify($password, $user['password'])) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid username or password.');
        }

        session()->regenerate();

        session()->set([
            'user_id'    => $user['id'],
            'username'   => $user['username'],
            'full_name'  => $user['full_name'],
            'isLoggedIn' => true,
        ]);

        return redirect()->to('/users')
            ->with('success', 'Welcome, ' . $user['full_name'] . '!');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}