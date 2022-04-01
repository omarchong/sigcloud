<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GiroSeeder extends Seeder
{

    public function run()
    {
        DB::table('giros')->insert([
            'nombre' => 'TIC',
            'descripcion' => 'Tecnologias de la informacion'
        ]);
        DB::table('giros')->insert([
            'nombre' => 'Marketing',
            'descripcion' => 'Ventas y mercadotecnia'
        ]);
        DB::table('giros')->insert([
            'nombre' => 'Deportes',
            'descripcion' => 'Deportes'
        ]);
        DB::table('giros')->insert([
            'nombre' => 'RH',
            'descripcion' => 'Recursos humanos'
        ]);
        DB::table('giros')->insert([
            'nombre' => 'Abarrotes',
            'descripcion' => 'Abarrotes'
        ]);
    }
}
