<?php

use Illuminate\Database\Seeder;

class ConsultaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consulta')->insert(array(
            array('empleado_id'=>1,'paciente_id'=>2,'cantidad_horas'=>1,'agendamiento_id'=>2,'fecha'=>'08/01/2017',
                'observaciones'=>'Se agenda consulta para la semana que viene','estado'=>'consulta'),
            array('empleado_id'=>2,'paciente_id'=>3,'cantidad_horas'=>1,'agendamiento_id'=>1,'fecha'=>'07/30/2017',
                'observaciones'=>'Se agenda consulta para la semana que viene','estado'=>'consulta'),
            array('empleado_id'=>3,'paciente_id'=>1,'cantidad_horas'=>1,'agendamiento_id'=>3,'fecha'=>'07/31/2017',
                'observaciones'=>'Se agenda consulta para la semana que viene','estado'=>'consulta'),
            array('empleado_id'=>1,'paciente_id'=>2,'cantidad_horas'=>1,'agendamiento_id'=>4,'fecha'=>'07/30/2017',
                'observaciones'=>'Se agenda consulta para la semana que viene','estado'=>'consulta'),
            array('empleado_id'=>4,'paciente_id'=>4,'cantidad_horas'=>1,'agendamiento_id'=>5,'fecha'=>'07/31/2017',
                'observaciones'=>'Se agenda consulta para la semana que viene','estado'=>'facturado'),
            array('empleado_id'=>4,'paciente_id'=>5,'cantidad_horas'=>2,'agendamiento_id'=>6,'fecha'=>'07/31/2017',
                'observaciones'=>'Se agenda consulta para la semana que viene','estado'=>'consulta'),
            array('empleado_id'=>4,'paciente_id'=>6,'cantidad_horas'=>1,'agendamiento_id'=>7,'fecha'=>'07/31/2017',
                'observaciones'=>'Se agenda consulta para la semana que viene','estado'=>'facturado'),
            array('empleado_id'=>2,'paciente_id'=>2,'cantidad_horas'=>1,'agendamiento_id'=>8,'fecha'=>'07/30/2017',
                'observaciones'=>'Se agenda consulta para la semana que viene','estado'=>'consulta'),
            array('empleado_id'=>6,'paciente_id'=>8,'cantidad_horas'=>1,'agendamiento_id'=>9,'fecha'=>'08/10/2017',
                'observaciones'=>'Se agenda consulta para la semana que viene','estado'=>'consulta'),
            array('empleado_id'=>6,'paciente_id'=>7,'cantidad_horas'=>1,'agendamiento_id'=>10,'fecha'=>'07/31/2017',
                'observaciones'=>'Se agenda consulta para la semana que viene','estado'=>'consulta'),
            array('empleado_id'=>5,'paciente_id'=>4,'cantidad_horas'=>1,'agendamiento_id'=>11,'fecha'=>'08/08/2017',
                'observaciones'=>'Se agenda consulta para la semana que viene','estado'=>'facturado'),
            array('empleado_id'=>7,'paciente_id'=>5,'cantidad_horas'=>1,'agendamiento_id'=>12,'fecha'=>'08/01/2017',
                'observaciones'=>'Se agenda consulta para la semana que viene','estado'=>'facturado'),
            array('empleado_id'=>5,'paciente_id'=>2,'cantidad_horas'=>1,'agendamiento_id'=>15,'fecha'=>'08/01/2017',
                'observaciones'=>'Se agenda consulta para la semana que viene','estado'=>'consulta'),
            array('empleado_id'=>7,'paciente_id'=>8,'cantidad_horas'=>1,'agendamiento_id'=>16,'fecha'=>'07/30/2017',
                'observaciones'=>'Se agenda consulta para la semana que viene','estado'=>'consulta'),
            array('empleado_id'=>8,'paciente_id'=>9,'cantidad_horas'=>0.5,'agendamiento_id'=>17,'fecha'=>'08/02/2017',
                'observaciones'=>'Se agenda consulta para la semana que viene','estado'=>'facturado'),
            array('empleado_id'=>8,'paciente_id'=>9,'cantidad_horas'=>1,'agendamiento_id'=>18,'fecha'=>'08/01/2017',
                'observaciones'=>'Se agenda consulta para la semana que viene','estado'=>'consulta'),
            array('empleado_id'=>4,'paciente_id'=>10,'cantidad_horas'=>1,'agendamiento_id'=>19,'fecha'=>'08/01/2017',
                'observaciones'=>'Se agenda consulta para la semana que viene','estado'=>'facturado'),
            array('empleado_id'=>1,'paciente_id'=>2,'cantidad_horas'=>1,'agendamiento_id'=>20,'fecha'=>'08/10/2017',
                'observaciones'=>'Se agenda consulta para la semana que viene','estado'=>'consulta'),
        )); 
    }
}
