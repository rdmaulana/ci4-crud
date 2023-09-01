<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    public function index() {
        $model = new UserModel();
        $data['users'] = $model->getUser();
        return view('list_users', $data);
    }

    public function add(){
        return view('create_user');
    }

    public function store() {
        $model = new UserModel();
        $request = service('request');

        if ($request->getMethod() === 'post' && $this->validate([
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'retype_password' => 'required|matches[password]',
            'role'     => 'required',
        ])) {
            $password = $request->getPost('password');
            $retypePassword = $request->getPost('retype_password');

            if ($password === $retypePassword) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $data = [
                    'username' => $this->request->getPost('username'),
                    'password' => $hashedPassword,
                    'role'     => $this->request->getPost('role'),
                ];

                $model->saveUser($data);

                return redirect()->to('/users')->with('success', 'User has been added');
            } else {
                return redirect()->to('/users/add')->with('error', 'Password and Retype password not matched');
            }
        } else {
            return view('create_user', ['validation' => $this->validator]);
        }
    }

    public function edit($id) {
        $model = new UserModel();
        $data['userData'] = $model->getUser($id);
    
        return view('edit_user', $data);
    }   

    public function update($id) {
        $model = new UserModel();
        $request = service('request');

        $rules = [
            'username' => 'required|min_length[3]|is_unique[users.username,id,' . $id . ']',
            'role' => 'required',
        ];

        $password = $request->getPost('password');
        $retypePassword = $request->getPost('retype_password');

        if (!empty($password)) {
            $rules['password'] = 'min_length[6]';
            $rules['retype_password'] = 'matches[password]';
        }

        if ($request->getMethod() === 'post' && $this->validate($rules)) {
            $userData = $model->getUser($id);

            if (empty($userData)) {
                return redirect()->to('/users')->with('error', 'User not found');
            }

            $data = [
                'username' => $this->request->getPost('username'),
                'role'     => $this->request->getPost('role'),
            ];

            if (!empty($password)) {
                if ($password === $retypePassword) {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $data['password'] = $hashedPassword;
                } else {
                    return redirect()->to('/users/edit/' . $id)->with('error', 'Password and Retype Password not matched');
                }
            }

            $updated = $model->update($id, $data);

            if ($updated) {
                return redirect()->to('/users')->with('success', 'User updated successfully.');
            } else {
                return redirect()->to('/users')->with('error', 'Failed to update user.');
            }
        } else {
            return view('edit_user', ['validation' => $this->validator, 'userData' => $model->getUser($id)]);
        }
    }

    public function delete($id) {
        $model = new UserModel();
        $employee = $model->getUser($id);
    
        if (!$employee) {
            return redirect()->to('/users')->with('error', 'User not found.');
        }
    
        $deleted = $model->delete($id);
    
        if ($deleted) {
            return redirect()->to('/users')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->to('/users')->with('error', 'Failed to delete User.');
        }
    }

}
