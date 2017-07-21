<?php

use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargo')->insert(array(
            array('descripcion'=>'Psicologo','profesional_salud'=>true),
            array('descripcion'=>'Fonoaudiologo','profesional_salud'=>true),
            array('descripcion'=>'Psicopedagogo','profesional_salud'=>true),
            array('descripcion'=>'Neurologo','profesional_salud'=>true),
            array('descripcion'=>'Secretario','profesional_salud'=>false),
            array('descripcion'=>'Administrador','profesional_salud'=>false),
            array('descripcion'=>'Director','profesional_salud'=>false),
            array('descripcion'=>'Tesorero','profesional_salud'=>false),
            array('descripcion'=>'Asistente','profesional_salud'=>false),
        ));  
    }
}
