<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  
    public function run()
    {
        $this->call(RolSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(ContactoSeeder::class);
        $this->call(ClientesSeeder::class);
        $this->call(ServicioSeeder::class);
    }
}
