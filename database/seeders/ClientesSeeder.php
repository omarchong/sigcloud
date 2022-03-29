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
            'estado' => 'Edo Mex',
            'municipio' => 'Metepec',
            'cp' => '53273',
            'referencias' => 'Enfrente de la iglesia',
            'estadofiscal' => 'Edo Mex',
            'municipiofiscal' => 'Metepec',
            'cpfiscal' => '53273',
            'referenciasfiscal' => 'Enfrente de la iglesia',
            'estatuscliente' => 'Habitual',
            'giro' =>'Tic',
            'contacto_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('clientes')->insert([
            'tipocliente' => 'Empresarial',
            'nombreempresa' => 'Selkar',
            'rfc' => 'COLO9910230HMCHPM06',
            'estado' => 'Edo Mex',
            'municipio' => 'Metepec',
            'cp' => '53273',
            'referencias' => 'Enfrente de la iglesia',
            'estadofiscal' => 'Edo Mex',
            'municipiofiscal' => 'Metepec',
            'cpfiscal' => '53273',
            'referenciasfiscal' => 'Enfrente de la iglesia',
            'estatuscliente' => 'Habitual',
            'giro' =>'Tic',
            'contacto_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('clientes')->insert([
            'tipocliente' => 'Empresarial',
            'nombreempresa' => 'SIPRO',
            'rfc' => 'COLO9910230HMCHPM06',
            'estado' => 'Edo Mex',
            'municipio' => 'Metepec',
            'cp' => '53273',
            'referencias' => 'Enfrente de la iglesia',
            'estadofiscal' => 'Edo Mex',
            'municipiofiscal' => 'Metepec',
            'cpfiscal' => '53273',
            'referenciasfiscal' => 'Enfrente de la iglesia',
            'estatuscliente' => 'Habitual',
            'giro' =>'Tic',
            'contacto_id' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('clientes')->insert([
            'tipocliente' => 'Empresarial',
            'nombreempresa' => 'SIPRO',
            'rfc' => 'COLO9910230HMCHPM06',
            'estado' => 'Edo Mex',
            'municipio' => 'Metepec',
            'cp' => '53273',
            'referencias' => 'Enfrente de la iglesia',
            'estadofiscal' => 'Edo Mex',
            'municipiofiscal' => 'Metepec',
            'cpfiscal' => '53273',
            'referenciasfiscal' => 'Enfrente de la iglesia',
            'estatuscliente' => 'Habitual',
            'giro' =>'Tic',
            'contacto_id' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
