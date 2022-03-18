<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CronogramaSeeder extends Seeder
{

    public function run()
    {
        DB::table('cronogramas')->insert([
            'actividad' => 'Diseño logo',
            'fecha_inicio' => date('Y-m-d H:i:s'),
            'fecha_fin' => date('Y-m-d H:i:s'),
            'hora_entrega' => date('Y-m-d H:i:s'),
            'usuario_id' => 1,
            'estatutarea_id' => 1,
            'proyecto_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
