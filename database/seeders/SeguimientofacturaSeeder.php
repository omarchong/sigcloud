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
            'factura_creada' => date('Y-m-d'),
            'cantidadtotal'  => 1700,
            'num_pago'  => 1,
            'saldorestante'  => 850,
            'fecha_vencimiento' => date('Y-m-d'),
            'estatufacturas_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s') 
        ]);
    }
}
