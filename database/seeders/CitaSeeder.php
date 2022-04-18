<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitaSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('citas')->insert([
            'nombre' => 'Hacer una llamada al cliente',
            'fecha' => date('Y-m-d'),
            'tema' => 'Concretar proyecto',
            'hora' => date('H:i:s'),
            'duracion_cita' => '1 hora',
            'lugar' => 'Toluca',
            'tipo_cita' => 'Presencial',
            'usuarios_id' => 2,
            'clientes_id' => 1,
            'estatucitas_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}