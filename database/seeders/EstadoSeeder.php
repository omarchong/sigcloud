<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
   
    public function run()
    {
        DB::table('estados')->insert([
            'clave' => '01',
            'nombre' => 'Aguascalientes',
            'abrev' => 'Ags.',
            'Activo' => '1'
        ]);
        DB::table('estados')->insert([
            'clave' => '02',
            'nombre' => 'Baja California',
            'abrev' => 'BC.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '03',
            'nombre' => 'Baja California Sur',
            'abrev' => 'BCS.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '04',
            'nombre' => 'Campeche',
            'abrev' => 'Camp.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '05',
            'nombre' => 'Coahuila de Zaragoza',
            'abrev' => 'Coah.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '06',
            'nombre' => 'Colima',
            'abrev' => 'Col.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '07',
            'nombre' => 'Chiapas',
            'abrev' => 'Chis.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '08',
            'nombre' => 'Chihuahua',
            'abrev' => 'Chih.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '09',
            'nombre' => 'Ciudad de México',
            'abrev' => 'CDMX.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '10',
            'nombre' => 'Durango',
            'abrev' => 'Dgo.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '11',
            'nombre' => 'Guanajuato',
            'abrev' => 'Gto..',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '12',
            'nombre' => 'Guerrero',
            'abrev' => 'Gro.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '13',
            'nombre' => 'Hidalgo',
            'abrev' => 'Hgo.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '14',
            'nombre' => 'Jalisco',
            'abrev' => 'Jal..',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '15',
            'nombre' => 'México',
            'abrev' => 'Mex.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '16',
            'nombre' => 'Michoacán de Ocampo',
            'abrev' => 'Mich..',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '17',
            'nombre' => 'Morelos',
            'abrev' => 'Mor..',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '18',
            'nombre' => 'Nayarit',
            'abrev' => 'Nay.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '19',
            'nombre' => 'Nuevo León',
            'abrev' => 'NL.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '20',
            'nombre' => 'Oaxaca',
            'abrev' => 'Oax..',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '21',
            'nombre' => 'Puebla',
            'abrev' => 'Pue..',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '22',
            'nombre' => 'Querétaro',
            'abrev' => 'Qro..',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '23',
            'nombre' => 'Quintana Roo',
            'abrev' => 'Q. Roo.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '24',
            'nombre' => 'San Luis Potosí',
            'abrev' => 'SLP.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '25  ',
            'nombre' => 'Sinaloa',
            'abrev' => 'Sin..',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '26',
            'nombre' => 'Sonora',
            'abrev' => 'Son.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '27',
            'nombre' => 'Tabasco.',
            'abrev' => 'Tab.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '28',
            'nombre' => 'Tamaulipas',
            'abrev' => 'Tamps.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '29',
            'nombre' => 'Tlaxcala',
            'abrev' => 'Tlax.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '30',
            'nombre' => 'Veracruz de Ignacio de la Llave',
            'abrev' => 'Ver.',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '31',
            'nombre' => 'Yucatán',
            'abrev' => 'Yuc..',
            'Activo' => '1'
        ]);DB::table('estados')->insert([
            'clave' => '32',
            'nombre' => 'Zacatecas',
            'abrev' => 'Zac.',
            'Activo' => '1'
        ]);
    }
}
