<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login() {
        return view('auth/login');
    }

    public function loginProcess(){
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $user = $model->getUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            session()->set('user', $user);
            return redirect()->to('/users');
        } else {
            return redirect()->to('login')->with('error', 'Login failed, please recheck your username and password.');
        }
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/login');
    }


}
