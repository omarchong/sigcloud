<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{

    public function run()
    {
        DB::table('usuarios')->insert([
            'nombre' => 'Omar',
            'app' => 'Chong',
            'apm' => 'Lopez',
            'telefono' => '7291039802',
            'usuario' => 'Chong',
            'email' => 'omar.13.chong@gmail.com',
            'contrasena' => bcrypt('omar1234'),
            'contrasena_confirmar' => bcrypt('omar1234'),
            'imagen' => 'imagen',
            'estatus' => 'Si',
            'departamento_id' => 1, 
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        DB::table('usuarios')->insert([
            'nombre' => 'Cristhian',
            'app' => 'Zacarias',
            'apm' => 'Diaz',
            'telefono' => '7223608148',
            'usuario' => 'Cris',
            'email' => 'cristhian.zacarias@dswestudio.com',
            'contrasena' => bcrypt('cris12345'),
            'contrasena_confirmar' => bcrypt('cris12345'),
            'imagen' => 'imagen',
            'estatus' => 'Si',
            'departamento_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        DB::table('usuarios')->insert([
            'nombre' => 'Hector',
            'app' => 'Bastida',
            'apm' => 'Barcenas',
            'telefono' => '1234567890',
            'usuario' => 'Hector',
            'email' => 'hector.bastida@dswestudio.com',
            'contrasena' => bcrypt('hector12345'),
            'contrasena_confirmar' => bcrypt('hector12345'),
            'imagen' => 'imagen',
            'estatus' => 'Si',
            'departamento_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        DB::table('usuarios')->insert([
            'nombre' => 'Karla',
            'app' => 'Pastrana',
            'apm' => 'Pastrana',
            'telefono' => '7237213902',
            'usuario' => 'Karlapastrana',
            'email' => 'karla.pastrana@dswestudio.com',
            'contrasena' => bcrypt('karla12345'),
            'contrasena_confirmar' => bcrypt('karla12345'),
            'imagen' => 'imagen',
            'estatus' => 'Si',
            'departamento_id' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        DB::table('usuarios')->insert([
            'nombre' => 'Monse',
            'app' => 'Quiroz',
            'apm' => 'Quiroz',
            'telefono' => '7298912345',
            'usuario' => 'Monse',
            'email' => 'monse.quiroz@dswestudio.com',
            'contrasena' => bcrypt('monse12345'),
            'contrasena_confirmar' => bcrypt('monse12345'),
            'imagen' => 'imagen',
            'estatus' => 'Si',
            'departamento_id' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
    }
}
