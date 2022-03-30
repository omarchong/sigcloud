<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoproyectoSeeder extends Seeder
{
   
    public function run()
    {
        DB::table('tipoproyectos')->insert([
            'nombre' => 'Recurrente',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        DB::table('tipoproyectos')->insert([
            'nombre' => 'Pagina web',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        DB::table('tipoproyectos')->insert([
            'nombre' => 'Desarrollo de software ala medida',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        DB::table('tipoproyectos')->insert([
            'nombre' => 'Diseño',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
    }
}
