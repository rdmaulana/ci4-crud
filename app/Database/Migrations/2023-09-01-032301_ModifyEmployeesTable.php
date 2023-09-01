<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyEmployeesTable extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('employee', [
            'foto' => [
                'name' => 'photo',
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('employee', [
            'photo' => [
                'name' => 'foto',
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ]
        ]);
    }
}
