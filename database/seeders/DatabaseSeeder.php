<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        /* $this->call(RolSeeder::class); */
        $this->call(UsuarioSeeder::class);
        $this->call(ServicioSeeder::class);
        $this->call(ContactoSeeder::class);
        $this->call(ClientesSeeder::class);
        $this->call(CotizacionSeeder::class);
        $this->call(EstatuordenSeeder::class);
        $this->call(OrdenpagosSeeder::class);
        $this->call(EstatufacturaSeeder::class);
        $this->call(SeguimientofacturaSeeder::class);
        $this->call(EstatucotizacionSeeder::class);
        $this->call(DetallecotizacionSeeder::class);
        $this->call(TipoproyectoSeeder::class);
        $this->call(EstatuproyectoSedeer::class);
        $this->call(ProyectoSeeder::class);
        $this->call(EstatucitaSeeder::class);
        $this->call(CitaSeeder::class);
        $this->call(AgendaSeeder::class);
        $this->call(EstatutareaSeeder::class);
        $this->call(TareaSeeder::class);
        $this->call(CronogramaSeeder::class);
    }
}
