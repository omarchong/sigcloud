<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatufacturaSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('estatufacturas')->insert([
            'nombre' => 'Pagado',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('estatufacturas')->insert([
            'nombre' => 'Enviado',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('estatufacturas')->insert([
            'nombre' => 'Cancelado',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('estatufacturas')->insert([
            'nombre' => 'Revision',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
