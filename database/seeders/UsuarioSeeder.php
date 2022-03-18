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
            'contraseña' => bcrypt('omar1234'),
            'contraseña_confirmar' => bcrypt('omar1234'),
            'departamento' => 'Tic',
            'imagen' => 'imagen',
            'estatus' => 'Si',
            /* 'rol_id' => 1, */
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
            'contraseña' => bcrypt('cris12345'),
            'contraseña_confirmar' => bcrypt('cris12345'),
            'departamento' => 'Negocios',
            'imagen' => 'imagen',
            'estatus' => 'Si',
            /* 'rol_id' => 2, */
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
            'contraseña' => bcrypt('hector12345'),
            'contraseña_confirmar' => bcrypt('hector12345'),
            'departamento' => 'Ventas',
            'imagen' => 'imagen',
            'estatus' => 'Si',
            /* 'rol_id' => 3, */
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
            'contraseña' => bcrypt('karla12345'),
            'contraseña_confirmar' => bcrypt('karla12345'),
            'departamento' => 'Marketing',
            'imagen' => 'imagen',
            'estatus' => 'Si',
            /* 'rol_id' => 2, */
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
            'contraseña' => bcrypt('monse12345'),
            'contraseña_confirmar' => bcrypt('monse12345'),
            'departamento' => 'Tic',
            'imagen' => 'imagen',
            'estatus' => 'Si',
            /* 'rol_id' => 2, */
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
    }
}
