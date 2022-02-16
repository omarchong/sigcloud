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
       
    }
}
