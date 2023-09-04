<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employees';
    protected $allowedFields = ['id', 'name', 'email', 'photo', 'position', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getEmployee($id = false) {
        if ($id === false) {
            return $this->findAll();
        } 

        return $this->where(['id' => $id])->first();
    }

    public function saveEmployee($data) {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateEmployee($id, $data) {
        $builder = $this->db->table($this->table);
        $builder->where('id', $id);
        return $builder->update($data);
    }

    public function deleteEmployee($id) {
        $builder = $this->db->table($this->table);
        $builder->where('id', $id);
        return $builder->delete();
    }
}
