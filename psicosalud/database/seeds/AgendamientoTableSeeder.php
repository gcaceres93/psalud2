<?php

use Illuminate\Database\Seeder;

class AgendamientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agendamiento')->insert(array(
            array('empleado_id'=>1,'paciente_id'=>2,'sucursal_id'=>1,'modalidad_id'=>3,'fecha_programada'=>'03/12/2017','hora_programada'=>'08:00:00'
                ,'comentario'=>'Solicita consulta por problemas particulares que son de mucha relevancia y por sobre todo personales','asistio'=>true),
            array('empleado_id'=>2,'paciente_id'=>1,'sucursal_id'=>2,'modalidad_id'=>5,'fecha_programada'=>'08/20/2017','hora_programada'=>'10:00:00'
                ,'comentario'=>'','asistio'=>true),
            array('empleado_id'=>4,'paciente_id'=>5,'sucursal_id'=>3,'modalidad_id'=>1,'fecha_programada'=>'01/15/2017','hora_programada'=>'09:00:00'
                ,'comentario'=>'Problemas con la hija','asistio'=>false),
            array('empleado_id'=>3,'paciente_id'=>6,'sucursal_id'=>1,'modalidad_id'=>7,'fecha_programada'=>'09/08/2017','hora_programada'=>'15:00:00'
                ,'comentario'=>'','asistio'=>true),
            array('empleado_id'=>7,'paciente_id'=>5,'sucursal_id'=>1,'modalidad_id'=>3,'fecha_programada'=>'10/12/2017','hora_programada'=>'14:00:00'
                ,'comentario'=>'','asistio'=>true),
            array('empleado_id'=>4,'paciente_id'=>1,'sucursal_id'=>1,'modalidad_id'=>9,'fecha_programada'=>'03/12/2017','hora_programada'=>'08:00:00'
                ,'comentario'=>'Solicita consulta por problemas particulares que son de mucha relevancia y por sobre todo personales','asistio'=>true),
            array('empleado_id'=>2,'paciente_id'=>7,'sucursal_id'=>1,'modalidad_id'=>3,'fecha_programada'=>'11/12/2017','hora_programada'=>'08:00:00'
                ,'comentario'=>'Solicita consulta por problemas particulares que son de mucha relevancia y por sobre todo personales','asistio'=>true),
            array('empleado_id'=>4,'paciente_id'=>1,'sucursal_id'=>1,'modalidad_id'=>3,'fecha_programada'=>'03/12/2017','hora_programada'=>'08:00:00'
                ,'comentario'=>'Solicita consulta por problemas particulares que son de mucha relevancia y por sobre todo personales','asistio'=>true),
            array('empleado_id'=>1,'paciente_id'=>2,'sucursal_id'=>1,'modalidad_id'=>3,'fecha_programada'=>'01/12/2017','hora_programada'=>'14:00:00'
                ,'comentario'=>'Solicita consulta por problemas escolares de la hija','asistio'=>true),
            array('empleado_id'=>2,'paciente_id'=>3,'sucursal_id'=>4,'modalidad_id'=>5,'fecha_programada'=>'09/22/2017','hora_programada'=>'16:00:00'
                ,'comentario'=>'Solicita consulta por problemas familiares','asistio'=>true),
            array('empleado_id'=>2,'paciente_id'=>10,'sucursal_id'=>1,'modalidad_id'=>3,'fecha_programada'=>'01/12/2017','hora_programada'=>'12:00:00'
                ,'comentario'=>'Solicita consulta por problemas particulares que son de mucha relevancia y por sobre todo personales','asistio'=>true),
            array('empleado_id'=>4,'paciente_id'=>2,'sucursal_id'=>1,'modalidad_id'=>9,'fecha_programada'=>'03/12/2017','hora_programada'=>'17:00:00'
                ,'comentario'=>'Solicita consulta por problemas particulares que son de mucha relevancia y por sobre todo personales','asistio'=>true),
            array('empleado_id'=>7,'paciente_id'=>2,'sucursal_id'=>1,'modalidad_id'=>3,'fecha_programada'=>'03/12/2017','hora_programada'=>'08:00:00'
                ,'comentario'=>'Solicita consulta por problemas particulares que son de mucha relevancia y por sobre todo personales','asistio'=>true),
            array('empleado_id'=>1,'paciente_id'=>8,'sucursal_id'=>2,'modalidad_id'=>10,'fecha_programada'=>'02/26/2017','hora_programada'=>'15:00:00'
                ,'comentario'=>'Solicita consulta por problemas particulares que son de mucha relevancia y por sobre todo personales','asistio'=>true),
            array('empleado_id'=>7,'paciente_id'=>2,'sucursal_id'=>4,'modalidad_id'=>3,'fecha_programada'=>'05/12/2017','hora_programada'=>'11:00:00'
                ,'comentario'=>'Solicita consulta por problemas particulares que son de mucha relevancia y por sobre todo personales','asistio'=>true),
            array('empleado_id'=>4,'paciente_id'=>7,'sucursal_id'=>1,'modalidad_id'=>13,'fecha_programada'=>'03/12/2017','hora_programada'=>'12:00:00'
                ,'comentario'=>'Solicita consulta por problemas particulares que son de mucha relevancia y por sobre todo personales','asistio'=>true),
            array('empleado_id'=>1,'paciente_id'=>10,'sucursal_id'=>1,'modalidad_id'=>13,'fecha_programada'=>'03/14/2017','hora_programada'=>'11:00:00'
                ,'comentario'=>'Solicita consulta','asistio'=>true),
            array('empleado_id'=>3,'paciente_id'=>4,'sucursal_id'=>1,'modalidad_id'=>3,'fecha_programada'=>'10/02/2017','hora_programada'=>'07:30:00'
                ,'comentario'=>'Solicita consulta por problemas particulares que son de mucha relevancia y por sobre todo personales','asistio'=>true),
            array('empleado_id'=>2,'paciente_id'=>2,'sucursal_id'=>1,'modalidad_id'=>13,'fecha_programada'=>'01/12/2017','hora_programada'=>'15:00:00'
                ,'comentario'=>'Solicita consulta por problemas particulares que son de mucha relevancia y por sobre todo personales','asistio'=>false),
            array('empleado_id'=>4,'paciente_id'=>7,'sucursal_id'=>2,'modalidad_id'=>12,'fecha_programada'=>'03/02/2017','hora_programada'=>'08:15:00'
                ,'comentario'=>'','asistio'=>true),
            array('empleado_id'=>1,'paciente_id'=>3,'sucursal_id'=>1,'modalidad_id'=>13,'fecha_programada'=>'03/30/2017','hora_programada'=>'14:00:00'
                ,'comentario'=>'Solicita consulta por problemas particulares que son de mucha relevancia y por sobre todo personales','asistio'=>true),
            array('empleado_id'=>4,'paciente_id'=>9,'sucursal_id'=>1,'modalidad_id'=>10,'fecha_programada'=>'07/28/2017','hora_programada'=>'08:00:00'
                ,'comentario'=>'Solicita consulta por problemas particulares que son de mucha relevancia y por sobre todo personales','asistio'=>true),
            array('empleado_id'=>1,'paciente_id'=>2,'sucursal_id'=>1,'modalidad_id'=>7,'fecha_programada'=>'07/28/2017','hora_programada'=>'09:00:00'
                ,'comentario'=>'Solicita consulta por problemas particulares que son de mucha relevancia y por sobre todo personales','asistio'=>true),
            array('empleado_id'=>1,'paciente_id'=>3,'sucursal_id'=>1,'modalidad_id'=>13,'fecha_programada'=>'07/28/2017','hora_programada'=>'11:00:00'
                ,'comentario'=>'Solicita consulta por problemas particulares que son de mucha relevancia y por sobre todo personales','asistio'=>true),
        )); 
    }
}
