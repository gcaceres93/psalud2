<?php

use Illuminate\Database\Seeder;

class SucursalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sucursal')->insert(array(
            array('telefono'=>'444-331','direccion'=>'Mcal. Lopez c/ Rca. Argentina','nombre'=>'Sucursal Mcal. Lopez'),
            array('telefono'=>'331-331','direccion'=>'Cacique Lambare 311 c/ paz del chaco','nombre'=>'Central'),
            array('telefono'=>'551-441','direccion'=>'Eusebio Ayala 8113 c/ alberto troche','nombre'=>'Sucursal San Lorenzo'),
            array('telefono'=>'801-124','direccion'=>'Herrera 331 c/ Mexico','nombre'=>'Sucursal Centro'),
        ));  
    }
}
