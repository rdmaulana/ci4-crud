<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function index() {
        $data['users'] = $this->userModel->getUser();
        return view('list_users', $data);
    }

    public function getValidationRules($rules, $id = null) {
        if ($rules === 'edit') {
            return [
                'username' => 'required|min_length[3]|is_unique[users.username,id,' . $id . ']',
                'role' => 'required',
            ];
        };
        
        return [
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'retype_password' => 'required|matches[password]',
            'role'     => 'required'
        ];
    }

    public function add(){
        return view('create_user');
    }

    public function store() {
        $request = service('request');
        $rules = $this->getValidationRules('add');

        if ($request->getMethod() === 'post' && $rules) {
            $password = $request->getPost('password');
            $retypePassword = $request->getPost('retype_password');

            if ($password === $retypePassword) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $data = [
                    'username' => $this->request->getPost('username'),
                    'password' => $hashedPassword,
                    'role'     => $this->request->getPost('role'),
                ];

                $this->userModel->saveUser($data);

                return redirect()->to('/users')->with('success', 'User has been added');
            } else {
                return redirect()->to('/users/add')->with('error', 'Password and Retype password not matched');
            }
        } else {
            return view('create_user', ['validation' => $this->validator]);
        }
    }

    public function edit($id) {
        $data['userData'] = $this->userModel->getUser($id);

        return view('edit_user', $data);
    }   

    public function update($id) {
        $request = service('request');
        $rules = $this->getValidationRules('edit', $id);
        $password = $request->getPost('password');
        $retypePassword = $request->getPost('retype_password');

        if (!empty($password)) {
            $rules['password'] = 'min_length[6]';
            $rules['retype_password'] = 'matches[password]';
        }

        if ($request->getMethod() === 'post' && $this->validate($rules)) {
            $userData = $this->userModel->getUser($id);

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

            $updated = $this->userModel->updateUser($id, $data);

            if ($updated) {
                return redirect()->to('/users')->with('success', 'User updated successfully.');
            } else {
                return redirect()->to('/users')->with('error', 'Failed to update user.');
            }
        } else {
            return view('edit_user', ['validation' => $this->validator, 'userData' => $this->userModel->getUser($id)]);
        }
    }

    public function delete($id) {
        $employee = $this->userModel->getUser($id);
    
        if (!$employee) {
            return redirect()->to('/users')->with('error', 'User not found.');
        }
    
        $deleted = $this->userModel->deleteUser($id);
    
        if ($deleted) {
            return redirect()->to('/users')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->to('/users')->with('error', 'Failed to delete User.');
        }
    }

}
