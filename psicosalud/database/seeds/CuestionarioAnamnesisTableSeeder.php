<?php

use Illuminate\Database\Seeder;

class CuestionarioAnamnesisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cuestionario_anamnesis')->insert(array(
            array('pregunta'=>'IVA Credito 10','aclaracion_pregunta'=>'10'),
            
        ));  
    }
}
