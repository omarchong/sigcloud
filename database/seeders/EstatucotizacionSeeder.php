<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatucotizacionSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('estatucotizacions')->insert([
            'nombre' => 'Aprobada',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('estatucotizacions')->insert([
            'nombre' => 'Iniciado',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('estatucotizacions')->insert([
            'nombre' => 'Rechazado',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('estatucotizacions')->insert([
            'nombre' => 'Pendiente',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
