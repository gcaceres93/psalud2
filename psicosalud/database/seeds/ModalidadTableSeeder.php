<?php

use Illuminate\Database\Seeder;

class ModalidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modalidad')->insert(array(
            array('descripcion'=>'Terapia familiar'),
            array('descripcion'=>'Terapia por duelo'),
            array('descripcion'=>'Terapia por enfermedades terminales'),
            array('descripcion'=>'Terapia de pareja y sexualidad'),
            array('descripcion'=>'Estimulacion temprana'),
            array('descripcion'=>'Terapia de transtornos de la ansiedad y depresión'),
            array('descripcion'=>'Terapia de atención'),
            array('descripción'=>'Terapia de transtornos por estrés'),
            array('descripcion'=>'Terapia de retraso en el lenguaje'),
            array('descripcion'=>'Terapia del transtorno global del desarrollo'),
            array('descripcion'=>'Terapia de transtorno del esquema corporal'),
            array('descripcion'=>'Diagnósticos y consultas en general'),
            array('descripcion'=>'Otros'),
        ));    
    }
}
