<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdenpagosSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('ordenpagos')->insert([
            'contacto1' => 'Sonia',
            'nombre_proyecto' => 'Red de voz y datos',
            'cantidadtotal' => 1740,
            'num_pago' => '2',
            'totalapagar' => 870,
            'primer_pago' =>date('Y-m-d'),
            'segundo_pago' =>date('Y-m-d'),
            'emite' => 'DSW',
            'cotizacion_id' => 1,
            'estatuorden_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
