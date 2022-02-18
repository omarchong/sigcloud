<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatutareaSeeder extends Seeder
{

    public function run()
    {
        DB::table('estatus_tareas')->insert([
            'nombre' => 'Asignada',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        DB::table('estatus_tareas')->insert([
            'nombre' => 'Finalizada',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        DB::table('estatus_tareas')->insert([
            'nombre' => 'En Proceso',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        DB::table('estatus_tareas')->insert([
            'nombre' => 'Revision',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
    }
}
