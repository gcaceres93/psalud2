<?php

use Illuminate\Database\Seeder;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rol')->insert(array(
            array('nombre'=>'Administrador'),
            array('nombre'=>'Secretario'),
            array('nombre'=>'Tesorero'),
            array('nombre'=>'Reportes'),         
        ));    
    }
}
