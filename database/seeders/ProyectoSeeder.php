<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProyectoSeeder extends Seeder
{

    public function run()
    {
        DB::table('proyectos')->insert([
            'nombre' => 'Desarrollo sitio web',
            'descripcion' => 'Sitio web con boton de mesenger',
            'fecha_inicio' =>  date('Y-m-d H:i:s'),
            'fecha_parciales' =>  date('Y-m-d H:i:s'),
            'fecha_entrega' =>  date('Y-m-d H:i:s'),
            'hora_entrega' => date('Y-m-d H:i:s'),
            'plan_pago' => '2 parcialidades',
            'usuario_id' => 1,
            'cliente_id' => 1,
            'estatusproyecto_id' => 1,
            'tipoproyecto_id' => 1,
            'detallecotizacion_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
