<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['id', 'username', 'password', 'role'];

    public function getUser($id = false) {
        if ($id === false) {
            return $this->findAll();
        } 

        return $this->where(['id' => $id])->first();
    }

    public function saveUser($data) {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateUser($id, $data) {
        $builder = $this->db->table($this->table);
        $builder->where('id', $id);
        return $builder->update($data);
    }

    public function getUsername($username){
        return $this->where(['username' => $username])->first();
    }

    public function deleteUser($id) {
        $builder = $this->db->table($this->table);
        $builder->where('id', $id);
        return $builder->delete();
    }
}
