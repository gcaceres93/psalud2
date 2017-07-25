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
        $this->call('TipoFamiliarTableSeeder');
        $this->command->info("Se han cargado los datos a la tabla tipo_familiares :)");
        $this->call('CargosTableSeeder');
        $this->command->info("Se han cargado los datos a la tabla cargos :)");
        $this->call('SucursalesTableSeeder');
        $this->command->info("Se han cargado los datos a la tabla sucursales :)");
        $this->call('PersonasTableSeeder');
        $this->command->info("Se han cargado los datos a la tabla personas :)");
        $this->call('FamiliarPorPacienteTableSeeder');
        $this->command->info("Se han cargado los datos a la tabla familiar_por_paciente :)");
        $this->call('ModalidadTableSeeder');
        $this->command->info("Se han cargado los datos a la tabla modalidad:)");
        $this->call('RolTableSeeder');
        $this->command->info("Se han cargado los datos a la tabla rol:)");
        $this->call('AgendamientoTableSeeder');
        $this->command->info("Se han cargado los datos a la tabla agendamiento :)");
    }
    
}
