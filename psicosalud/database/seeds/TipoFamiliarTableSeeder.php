<?php

use Illuminate\Database\Seeder;

class TipoFamiliarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_familiar')->insert(array(
            array('nombre'=>'Padre'),
            array('nombre'=>'Madre'),
            array('nombre'=>'Hijo'),
            array('nombre'=>'Hija'),
            array('nombre'=>'Hermano'),
            array('nombre'=>'Hermana'),
            array('nombre'=>'Primo'),
            array('nombre'=>'Prima'),
            array('nombre'=>'Tio'),
            array('nombre'=>'Tia'),
            array('nombre'=>'Tutor'),
            array('nombre'=>'Sobrino'),
            array('nombre'=>'Sobrina'),
            array('nombre'=>'Abuelo'),
            array('nombre'=>'Abuela'),
            array('nombre'=>'Nieto'),
            array('nombre'=>'Nieta'),
            array('nombre'=>'Padre'),   
      ));      
    }
}
