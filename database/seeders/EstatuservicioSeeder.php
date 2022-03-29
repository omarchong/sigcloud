<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatuservicioSeeder extends Seeder
{
    public function run()
    {
        DB::table('estatuservicios')->insert([
            'nombre' => 'En negociacion',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('estatuservicios')->insert([
            'nombre' => 'Vendido',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
