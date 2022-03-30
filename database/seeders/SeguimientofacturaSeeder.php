<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeguimientofacturaSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('seguimientofacturas')->insert([
            'ordenpagos_id' => 1,
            'factura_creada' => date('Y-m-d H:i:s'),
            'num_pago'  => 1,
            'fecha_vencimiento' => date('Y-m-d H:i:s'),
            'estatufactura_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s') 
        ]);
    }
}
