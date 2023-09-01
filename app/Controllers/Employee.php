<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmployeeModel;

class Employee extends BaseController
{
    public function index() {
        $model = new EmployeeModel();
        $data['pegawai'] = $model->getEmployee();
        return view('list_employees', $data);
    }

    public function addEmployee() {
        return view('create_employee');
    }

    public function store() {
        $model = new EmployeeModel();

        $validationRules = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'photo' => 'uploaded[photo]|max_size[photo,300]|ext_in[photo,jpg,jpeg]'
        ];

        if ($this->validate($validationRules)) {
            $photo = $this->request->getFile('photo');
            $photoName = $photo->getRandomName();
            $photo->move(ROOTPATH.'public/assets/uploads/', $photoName);
            
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'photo' => $photoName,
                'position' => $this->request->getPost(('position')),
            ];

            $saved = $model->saveEmployee($data);

            if ($saved) {
                return redirect()->to('/employee')->with('success', 'Employee added successfully.');
            } else {
                return redirect()->to('/employee')->with('error', 'Failed to add employee.');
            }
        } else {
            return view('create_employee', ['validation' => $this->validator]);
        }
    }

    public function edit($id) {
        $model = new EmployeeModel();
        $data['employee'] = $model->getEmployee($id);
    
        return view('edit_employee', $data);
    }    

    public function update($id) {
        $model = new EmployeeModel();
    
        $validationRules = [
            'name' => 'required',
            'email' => 'required|valid_email'
        ];
    
        if ($this->validate($validationRules)) {
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'position' => $this->request->getPost('position')
            ];
    
            $photo = $this->request->getFile('photo');
            if ($photo->isValid() && !$photo->hasMoved()) {
                $photoName = $photo->getRandomName();
                $photo->move(ROOTPATH.'public/assets/uploads/', $photoName);
                $data['photo'] = $photoName;
            }
    
            $updated = $model->updateEmployee($id, $data);
    
            if ($updated) {
                return redirect()->to('/employee')->with('success', 'Employee updated successfully.');
            } else {
                return redirect()->to('/employee')->with('error', 'Failed to update employee.');
            }
        } else {
            return view('edit_employee', ['validation' => $this->validator, 'employee' => $model->getEmployee($id)]);
        }
    }

    public function delete($id) {
        $model = new EmployeeModel();
        $employee = $model->getEmployee($id);
    
        if (!$employee) {
            return redirect()->to('/employee')->with('error', 'Employee not found.');
        }
    
        $deleted = $model->deleteEmployee($id);
    
        if ($deleted) {
            if (!empty($employee['photo'])) {
                $photoPath = ROOTPATH.'public/assets/uploads/' . $employee['photo'];
                if (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }
            return redirect()->to('/employee')->with('success', 'Employee deleted successfully.');
        } else {
            return redirect()->to('/employee')->with('error', 'Failed to delete employee.');
        }
    }

    public function displayImage($imageName){
        $imagePath = ROOTPATH . 'public/assets/uploads/' . $imageName;

        if (file_exists($imagePath)) {
            $imageData = file_get_contents($imagePath);
            $mimeType = mime_content_type($imagePath);

            header('Content-Type: ' . $mimeType);
            echo $imageData;
        } else {
            return "Image not found.";
        }
    }
}
