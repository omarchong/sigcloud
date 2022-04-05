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
            'contactos_id' => 2,
            'giros_id' =>1,
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
            'contactos_id' => 1,
            'giros_id' =>2,
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
            'contactos_id' => 3,
            'giros_id' =>3,
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
            'contactos_id' => 3,
            'giros_id' =>4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
