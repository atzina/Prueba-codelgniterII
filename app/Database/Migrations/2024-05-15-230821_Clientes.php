<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Clientes extends Migration
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
            'nombre_contacto' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false, // requerido
            ],
            'correo_electronico' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true, // único en la base de datos
                'null' => false, // requerido
            ],
            'nombre_empresa' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true, // único en la base de datos
                'null' => false, // requerido
            ],
            'estado_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true, // 
            ],
            'logotipo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false, // requerido
            ],
            'descripcion_producto' => [
                'type' => 'TEXT',
                'null' => true, // requerido si es CDM verificar
            ],
            'fecha_registro' => [
                'type' => 'DATE',
                'null' => true, // requerido si el estado es CDM verificar 
            ],
        ]);

        // Asegúrate de definir la columna auto_increment como una clave primaria
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('estado_id', 'estados', 'id');
        $this->forge->createTable('clientes');
    }

    public function down()
    {
        $this->forge->dropTable('clientes');
    }
}
