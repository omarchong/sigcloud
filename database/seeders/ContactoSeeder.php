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
            'contacto1' => 'Omar',
            'email1' => 'omar.13.chong@gmail.com',
            'telefono1' => '7221923091',
            'descripcion' => 'Informacion servicios',
            'servicios_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        DB::table('contactos')->insert([
            'contacto1' => 'Sonia',
            'email1' => 'omar.13.chong@gmail.com',
            'telefono1' => '009823914',
            'descripcion' => 'Pruebas piloto',
            'servicios_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        DB::table('contactos')->insert([
            'contacto1' => 'Cristhian Zacarias Diaz',
            'email1' => 'cris.diaz@gmail.com',
            'telefono1' => '889123456',
            'descripcion' => 'diseño logos',
            'servicios_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        DB::table('contactos')->insert([
            'contacto1' => 'Karen Perez Juarez',
            'email1' => 'Karen.perez@gmail.com',
            'telefono1' => '7711223300',
            'descripcion' => 'Informacion servicios',
            'servicios_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        DB::table('contactos')->insert([
            'contacto1' => 'Hector Bastida Barcenas',
            'email1' => 'hector@dsw.com',
            'telefono1' => '0925712345',
            'descripcion' => 'Sitio web',
            'servicios_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);

    }
}
