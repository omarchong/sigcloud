<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatufacturaSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('estatusfactura')->insert([
            'nombre' => 'Pagado',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('estatusfactura')->insert([
            'nombre' => 'Enviado',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('estatusfactura')->insert([
            'nombre' => 'Cancelado',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('estatusfactura')->insert([
            'nombre' => 'Revision',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
