<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TareaSeeder extends Seeder
{

    public function run()
    {
        DB::table('tareas')->insert([
            'nombre' => 'Armar la base de datos de dsw',
            'descripcion' => 'Actualizar la base de datos y darle mantenimiento',
            'fecha_limite' =>  date('Y-m-d H:i:s'),
            'hora_limite' =>  date('Y-m-d H:i:s'),
            'tipo_tarea' => 'Cita',
            'usuario_id' => 1,
            'estatustareas_id' => 1,
            'cita_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
