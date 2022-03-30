<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatuordenSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('estatuordens')->insert([
        'nombre' => 'Pagado',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s') 
        ]);
        DB::table('estatuordens')->insert([
        'nombre' => 'Pendiente',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s') 
        ]);
        DB::table('estatuordens')->insert([
        'nombre' => 'Enviado',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s') 
        ]);
    }
}
