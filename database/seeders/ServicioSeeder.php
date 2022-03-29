<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
   
    public function run()
    {
        DB::table('servicios')->insert([
            'nombre' => 'E-commerce',
            'descripcion' => 'E-commerce sencillo',
            'precio_inicial' => '6000',
            'precio_final' => '55000',
            'estatuservicio_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
