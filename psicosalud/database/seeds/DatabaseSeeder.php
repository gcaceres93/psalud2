<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
        $this->command->info("Se han cargado los datos a la tabla usuarios :)");
        $this->call('PersonasTableSeeder');
        $this->command->info("Se han cargado los datos a la tabla personas :)");
        $this->call('CargosTableSeeder');
        $this->command->info("Se han cargado los datos a la tabla cargos :)");
        $this->call('SucursalesTableSeeder');
        $this->command->info("Se han cargado los datos a la tabla sucursales :)");
    }
    
}
