<?php

use Illuminate\Database\Seeder;

class ConceptoFacturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('factura_concepto')->insert(array(
            array('descripcion'=>'Consulta'),
            array('descripcion'=>'Otros'),
        ));  
    }
}
