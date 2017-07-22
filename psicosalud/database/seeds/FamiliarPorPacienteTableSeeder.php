<?php

use Illuminate\Database\Seeder;

class FamiliarPorPacienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('familiar_por_paciente')->insert(array(
            array('tipo_familiar_id'=> 1,'persona_id'=>25,'paciente_id'=>10),
            array('tipo_familiar_id'=> 2,'persona_id'=>24,'paciente_id'=>10),
            array('tipo_familiar_id'=> 14,'persona_id'=>23,'paciente_id'=>10),
        )); 
    }
}
