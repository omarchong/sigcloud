<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{

    public function run()
    {
        DB::table('clientes')->insert([
            'tipocliente' => 'Empresarial',
            'nombreempresa' => 'DSW',
            'rfc' => 'COLO9910230HMCHPM06',
            'estado_id' => 1,
            'cp' => '53273',
            'referencias' => 'Enfrente de la iglesia',
            'direccionfiscal' => 'Edo Mex',
            'estatuscliente' => 'Habitual',
            'contacto_id' => 2,
            'giro_id' =>1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('clientes')->insert([
            'tipocliente' => 'Empresarial',
            'nombreempresa' => 'Selkar',
            'rfc' => 'COLO9910230HMCHPM06',
            'estado_id' => 1,
            'cp' => '53273',
            'referencias' => 'Enfrente de la iglesia',
            'direccionfiscal' => 'Edo Mex',
            'estatuscliente' => 'Prospecto',
            'contacto_id' => 1,
            'giro_id' =>1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('clientes')->insert([
            'tipocliente' => 'Empresarial',
            'nombreempresa' => 'SIPRO',
            'rfc' => 'COLO9910230HMCHPM06',
            'estado_id' => 1,
            'cp' => '53273',
            'referencias' => 'Enfrente de la iglesia',
            'direccionfiscal' => 'Enfrente de la iglesia',
            'estatuscliente' => 'Ocacional',
            'contacto_id' => 3,
            'giro_id' =>1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('clientes')->insert([
            'tipocliente' => 'Empresa',
            'nombreempresa' => 'Barcel',
            'rfc' => 'COLO9910230HMCHPM06',
            'estado_id' => 1,
            'cp' => '53273',
            'referencias' => 'a 2 min de plaza sendero',
            'direccionfiscal' => 'Campeche',
            'estatuscliente' => 'Frecuente',
            'contacto_id' => 3,
            'giro_id' =>1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
