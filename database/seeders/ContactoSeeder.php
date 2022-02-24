<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

class ContactoSeeder extends Seeder
{

    public function run()
    {
        DB::table('contactos')->insert([
            'nombre' => 'Omar',
            'email' => 'omar.13.chong@gmail.com',
            'telefono' => '7221923091',
            'descripcion' => 'Informacion servicios',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        DB::table('contactos')->insert([
            'nombre' => 'Diana',
            'email' => 'diana.lopez.chong@gmail.com',
            'telefono' => '234189741',
            'descripcion' => 'Cotizaciones',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        DB::table('contactos')->insert([
            'nombre' => 'Carlos',
            'email' => 'carlos.12.leon@gmail.com',
            'telefono' => '2233550011',
            'descripcion' => 'Informacion servicios',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        DB::table('contactos')->insert([
            'nombre' => 'Kenia',
            'email' => 'kenia.utvt@gmail.com',
            'telefono' => '5588774411',
            'descripcion' => 'Informacion servicios',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        DB::table('contactos')->insert([
            'nombre' => 'Juan',
            'email' => 'juan.13.utvt@gmail.com',
            'telefono' => '75544720',
            'descripcion' => 'Informacion servicios',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);

    }
}
