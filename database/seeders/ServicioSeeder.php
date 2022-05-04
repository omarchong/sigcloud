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
            'precio_inicial' => '5000',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('servicios')->insert([
            'nombre' => 'Desarrollo de software a la medida',
            'descripcion' => 'E-commerce sencillo',
            'precio_inicial' => '6000',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('servicios')->insert([
            'nombre' => 'ERP',
            'descripcion' => 'ERP tradicional empresariasl',
            'precio_inicial' => '10000',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);DB::table('servicios')->insert([
            'nombre' => 'CRM',
            'descripcion' => 'CRm tradicional para empresas de 10 empleados',
            'precio_inicial' => '9000',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);DB::table('servicios')->insert([
            'nombre' => 'Logotipo',
            'descripcion' => 'Logotipo basico en 3d',
            'precio_inicial' => '700',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);DB::table('servicios')->insert([
            'nombre' => 'Gestion redes sociales',
            'descripcion' => 'Seguimiento d eredes sociales',
            'precio_inicial' => '3700',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
