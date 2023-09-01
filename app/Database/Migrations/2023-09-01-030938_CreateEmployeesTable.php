<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'contstraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'position' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ] 
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('employee');
    }

    public function down()
    {
        $this->forge->dropTable('employee');
    }
}
