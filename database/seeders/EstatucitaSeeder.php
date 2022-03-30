<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatucitaSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('estatucitas')->insert([
            'nombre' => 'Cancelada',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('estatucitas')->insert([
            'nombre' => 'Pospuesta',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('estatucitas')->insert([
            'nombre' => 'Finalizada',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
