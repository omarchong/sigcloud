<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdenpagosSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('ordenpagos')->insert([
            'folio' => '170222FEB',
            'num_pago' => '1',
            'emite' => 'DSW',
            'fecha_limite' => date('Y-m-d H:i:s'),
            'cotizacion_id' => 1,
            'estatusorden_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
