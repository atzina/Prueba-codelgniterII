<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EstadosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nombre' => 'Ciudad de México'],
            ['nombre' => 'Aguascalientes'],
            ['nombre' => 'Baja California'],
            ['nombre' => 'Baja California Sur'],
            ['nombre' => 'Campeche'],
            ['nombre' => 'ColimaCoahuila de Zaragoza'],
            ['nombre' => 'Colima'],
            ['nombre' => 'Chiapas'],
            ['nombre' => 'Chihuahua'],
            ['nombre' => 'Durango'],
            ['nombre' => 'Guanajuato'],
            ['nombre' => 'Guerrero'],
            ['nombre' => 'Hidalgo'],
            ['nombre' =>  'Jalisco'],
            ['nombre' => 'México'],
            ['nombre' => 'Michoacán de Ocampo'],
            ['nombre' => 'Morelos'],
            ['nombre' => 'Nayarit'],
            ['nombre' => 'Nuevo León'],
            ['nombre' => 'Oaxaca'],
            ['nombre' => 'Puebla'],
            ['nombre' => 'Querétaro'],
            ['nombre' => 'Quintana Roo'],
            ['nombre' => 'San Luis Potosí'],
            ['nombre' => 'Sinaloa'],
            ['nombre' => 'Sonora'],
            ['nombre' => 'Tabasco'],
            ['nombre' => 'Tamaulipas'],
            ['nombre' => 'Tlaxcala'],
            ['nombre' => 'Veracruz de Ignacio de la Llave'],
            ['nombre' => 'Yucatán'],
            ['nombre' => 'Zacatecas'],
       

        ];

        $this->db->table('estados')->insertBatch($data);
    }
}
