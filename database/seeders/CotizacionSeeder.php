<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CotizacionSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('cotizaciones')->insert([
            'descripcion' => 'Desarrollo de sitio web y logo',
            'fecha_estimadaentrega' => date('Y-m-d H:i:s'),
            'servicio_id' => 1,
            'cliente_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
