<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('departamentos')->insert([
            'abreviatura' => 'Si',
            'nombre' => 'Sistemas',
            'descripcion' => '',
            'estatus' => 'Activo',
            'n_empleados' => '10'
        ]);
        DB::table('departamentos')->insert([
            'abreviatura' => 'DDS',
            'nombre' => 'Desarrollo de software',
            'descripcion' => '',
            'estatus' => 'Activo',
            'n_empleados' => '20'
        ]);
        DB::table('departamentos')->insert([
            'abreviatura' => 'DG',
            'nombre' => 'Diseño gráfico',
            'descripcion' => 'Area de ventas y compras',
            'estatus' => 'Inactivo',
            'n_empleados' => '6'
        ]);
        DB::table('departamentos')->insert([
            'abreviatura' => 'CONS',
            'nombre' => 'Consultoria',
            'descripcion' => '',
            'estatus' => 'Inactivo',
            'n_empleados' => '10'
        ]);
      
    }
}
