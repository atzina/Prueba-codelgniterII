<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Estados extends Migration
{
    public function up()
    {
        $this->forge->addField([


            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        // Asegúrate de definir la columna auto_increment como una clave primaria
        $this->forge->addKey('id', true);
        $this->forge->createTable('estados');
    }

    public function down()
    {
        $this->forge->dropTable('estados');
    }
}
