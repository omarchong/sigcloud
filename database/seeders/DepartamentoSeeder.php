<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('departamentos')->insert([
            'abreviatura' => 'RH',
            'nombre' => 'Recursos humanos',
            'descripcion' => 'El area que no hace nada',
            'estatus' => 'Activo',
            'n_empleados' => '10'
        ]);
        DB::table('departamentos')->insert([
            'abreviatura' => 'TIC',
            'nombre' => 'Tecnologias de la información',
            'descripcion' => 'Los mejores',
            'estatus' => 'Activo',
            'n_empleados' => '20'
        ]);
        DB::table('departamentos')->insert([
            'abreviatura' => 'MCV',
            'nombre' => 'Compras y ventas',
            'descripcion' => 'Area de ventas y compras',
            'estatus' => 'Inactivo',
            'n_empleados' => '6'
        ]);
        DB::table('departamentos')->insert([
            'abreviatura' => 'SEC',
            'nombre' => 'Seguridad',
            'descripcion' => 'Segurida de la empresa',
            'estatus' => 'Inactivo',
            'n_empleados' => '10'
        ]);
        DB::table('departamentos')->insert([
            'abreviatura' => 'ALM',
            'nombre' => 'Almacen',
            'descripcion' => 'Alamcen de insumos',
            'estatus' => 'Inactivo',
            'n_empleados' => '4'
        ]);
    }
}
