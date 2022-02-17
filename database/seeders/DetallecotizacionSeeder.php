<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetallecotizacionSeeder extends Seeder
{
    public function run()
    {
        DB::table('detalle_cotizacion')->insert([
            'precio_bruto' => '1500',
            'precio_iva' => '240',
            'total' => '1740',
            'descuento_general' => '5',
            'cotizacion_id' => 1,
            'estatuscotizacion_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
    }
}
