<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipioSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('municipios')->insert([
            'clave' => '001',
            'nombre' => 'Aguascalientes',
            'activo' => '1',
            'estado_id' => 1
        ]);
        DB::table('municipios')->insert([
            'clave' => '002',
            'nombre' => 'Asientos',
            'activo' => '1',
            'estado_id' => 1
        ]);DB::table('municipios')->insert([
            'clave' => '003',
            'nombre' => 'Baja Calvillo',
            'activo' => '1',
            'estado_id' => 1
        ]);DB::table('municipios')->insert([
            'clave' => '004',
            'nombre' => 'Cosío', 
            'activo' => '1',
            'estado_id' => 1
        ]);DB::table('municipios')->insert([
            'clave' => '005',
            'nombre' => 'Jesús María',
            'activo' => '1',
            'estado_id' => 1
        ]);DB::table('municipios')->insert([
            'clave' => '006',
            'nombre' => 'Pabellón de Arteaga',
            'activo' => '1',
            'estado_id' => 1
        ]);DB::table('municipios')->insert([
            'clave' => '007',
            'nombre' => 'Rincón de Romos',
            'activo' => '1',
            'estado_id' => 1
        ]);DB::table('municipios')->insert([
            'clave' => '008',
            'nombre' => 'San José de Gracia',
            'activo' => '1',
            'estado_id' => 1
        ]);DB::table('municipios')->insert([
            'clave' => '009',
            'nombre' => 'Tepezalá',
            'activo' => '1',
            'estado_id' => 1
        ]);DB::table('municipios')->insert([
            'clave' => '010',
            'nombre' => 'El Llano',
            'activo' => '1',
            'estado_id' => 1
        ]);DB::table('municipios')->insert([
            'clave' => '011',
            'nombre' => 'San Francisco de los Romo',
            'activo' => '1',
            'estado_id' => 1
        ]);DB::table('municipios')->insert([
            'clave' => '012',
            'nombre' => 'Ensenada',
            'activo' => '1',
            'estado_id' => 2
        ]);DB::table('municipios')->insert([
            'clave' => '013',
            'nombre' => 'Mexicali',
            'activo' => '1',
            'estado_id' => 2
        ]);DB::table('municipios')->insert([
            'clave' => '014',
            'nombre' => 'Tecate',
            'activo' => '1',
            'estado_id' => 2
        ]);DB::table('municipios')->insert([
            'clave' => '015',
            'nombre' => 'Tijuana',
            'activo' => '1',
            'estado_id' => 2
        ]);DB::table('municipios')->insert([
            'clave' => '016',
            'nombre' => 'Playas de Rosarito',
            'activo' => '1',
            'estado_id' => 2
        ]);DB::table('municipios')->insert([
            'clave' => '017',
            'nombre' => 'San Quintín',
            'activo' => '1',
            'estado_id' => 2
        ]);DB::table('municipios')->insert([
            'clave' => '018',
            'nombre' => 'Comondú',
            'activo' => '1',
            'estado_id' => 3
        ]);DB::table('municipios')->insert([
            'clave' => '019',
            'nombre' => 'Mulegé',
            'activo' => '1',
            'estado_id' => 3
        ]);DB::table('municipios')->insert([
            'clave' => '20',
            'nombre' => 'La Paz',
            'activo' => '1',
            'estado_id' => 3
        ]);DB::table('municipios')->insert([
            'clave' => '21',
            'nombre' => 'Los Cabos',
            'activo' => '1',
            'estado_id' => 3
        ]);DB::table('municipios')->insert([
            'clave' => '22',
            'nombre' => 'Loreto',
            'activo' => '1',
            'estado_id' => 3
        ]);DB::table('municipios')->insert([
            'clave' => '23',
            'nombre' => 'Calkiní Roo',
            'activo' => '1',
            'estado_id' => 4
        ]);DB::table('municipios')->insert([
            'clave' => '24',
            'nombre' => 'Campeche',
            'activo' => '1',
            'estado_id' => 4
        ]);DB::table('municipios')->insert([
            'clave' => '25  ',
            'nombre' => 'Carmen',
            'activo' => '1',
            'estado_id' => 4
        ]);DB::table('municipios')->insert([
            'clave' => '26',
            'nombre' => 'Champotón',
            'activo' => '1',
            'estado_id' => 4
        ]);DB::table('municipios')->insert([
            'clave' => '27',
            'nombre' => 'Hecelchakán.',
            'activo' => '1',
            'estado_id' => 4
        ]);DB::table('municipios')->insert([
            'clave' => '28',
            'nombre' => 'Hopelchén',
            'activo' => '1',
            'estado_id' => 4
        ]);DB::table('municipios')->insert([
            'clave' => '29',
            'nombre' => 'Palizada',
            'activo' => '1',
            'estado_id' => 4
        ]);DB::table('municipios')->insert([
            'clave' => '30',
            'nombre' => 'Tenabo',
            'activo' => '1',
            'estado_id' => 4
        ]);DB::table('municipios')->insert([
            'clave' => '31',
            'nombre' => 'Escárcega',
            'activo' => '1',
            'estado_id' => 4
        ]);DB::table('municipios')->insert([
            'clave' => '32',
            'nombre' => 'Candelaria',
            'activo' => '1',
            'estado_id' => 4
        ]);
        DB::table('municipios')->insert([
            'clave' => '32',
            'nombre' => 'Seybaplaya',
            'activo' => '1',
            'estado_id' => 4
        ]);
        
    }
}
