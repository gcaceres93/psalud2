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
            array('persona_id'=>25,'paciente_id'=>10,'tipo_familiar_id'=> 1),
            array('persona_id'=>24,'paciente_id'=>10,'tipo_familiar_id'=> 2),
            array('persona_id'=>23,'paciente_id'=>10,'tipo_familiar_id'=> 14),
        )); 
    }
}
