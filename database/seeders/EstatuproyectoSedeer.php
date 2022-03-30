<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatuproyectoSedeer extends Seeder
{

    public function run()
    {
        DB::table('estatuproyectos')->insert([
            'nombre' => 'Iniciado',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s') 
        ]);
        DB::table('estatuproyectos')->insert([
            'nombre' => 'Cancelado',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s') 
        ]);
        DB::table('estatuproyectos')->insert([
            'nombre' => 'En pausa',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s') 
        ]);
        DB::table('estatuproyectos')->insert([
            'nombre' => 'Tentativo',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s') 
        ]);
    }
}
