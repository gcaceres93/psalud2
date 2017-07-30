<?php

use Illuminate\Database\Seeder;

class ImpuestoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('impuesto')->insert(array(
            array('nombre'=>'IVA Credito 10','porcentaje'=>'10'),
            array('nombre'=>'IVA Debito 10','porcentaje'=>'10'),
			array('nombre'=>'IVA Credito 5','porcentaje'=>'5'),
			array('nombre'=>'IVA Debito 5','porcentaje'=>'5'),
			array('nombre'=>'Excenta','porcentaje'=>'0'),
        ));  
    }
}
