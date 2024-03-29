<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('actividads')->insert([
            'nombre' => 'Llamar',
            'tipoactividad' => 'LLamada',
            'fecha' => date('Y-m-d'),
            'nota' => 'Realizar una llamada',
            'usuario_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('actividads')->insert([
            'nombre' => 'Correo',
            'tipoactividad' => 'Correo',
            'fecha' => date('Y-m-d'),
            'nota' => 'Realizar un correo',
            'usuario_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);DB::table('actividads')->insert([
            'nombre' => 'Reunion',
            'tipoactividad' => 'Reunion',
            'fecha' => date('Y-m-d'),
            'nota' => 'Realizar una reunion',
            'usuario_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
