<?php

use Illuminate\Database\Seeder;

class AnamnesisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anamnesis')->insert(array(
            array('paciente_id'=>7,'informantes'=>'La madre','motivo'=>'.Carácter del niño, solo se queda quieto con un factor distractorio, le retas y grita o llora (berrinches), dice que nadie le quiere que nadie le ama, cumple ordenes, en la escuela se porta bien (también cumple ordenes), no aprende las cosas, tiene que hacer la madre con el porque no logra objetivos, le cuesta mucho.','observacion'=>'No presenta rasgos muy llamativos durante la entrevista y el proceso de la anmanesis, es necesario una evaluacion mas amplia con respecto a sus conductas'),
        ));
           
    
        DB::table('respuesta_cuestionario')->insert(array(
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>1,'respuesta'=>'NO'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>2,'respuesta'=>'NO'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>3,'respuesta'=>'vive con la madre, la abuela, tia (misma edad), hermanito recién nacido'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>4,'respuesta'=>'Depresión durante el embarazo, problemas de pareja, preocupación y llanto.'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>5,'respuesta'=>'Cesárea, 39 semanas de gestación. Todo normal.'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>6,'respuesta'=>'Nada'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>7,'respuesta'=>'Alérgico al cambio de clima.'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>8,'respuesta'=>'3 meses'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>9,'respuesta'=>'5 meses'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>10,'respuesta'=>'6 meses'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>11,'respuesta'=>'11 meses'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>12,'respuesta'=>'1 año 2 meses'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>13,'respuesta'=>'1 año'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>14,'respuesta'=>'2 años y medio'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>15,'respuesta'=>'No recuerda'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>16,'respuesta'=>'Juega, prefiere hacerlo solo'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>17,'respuesta'=>'jardín, realiza todas sus tareas en clase y hace caso a las ordenes.'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>18,'respuesta'=>'nada'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>19,'respuesta'=>'Come bien, se alimenta solo pero aun utiliza biberon'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>20,'respuesta'=>'Duerme bien y mantiene un buen horario'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>21,'respuesta'=>'Buena actividad motriz, tanto fina como gruesa'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>22,'respuesta'=>'Frustración, bajo nivel de toleración, no controla impulsos, enojo fácil, grosero'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>23,'respuesta'=>'Dificil con niños, (egoísmo ante la presencia de objetos), es bruto también en presencia de adultos.'),
                array('anamnesis_id'=>1,'cuestionario_anamnesis_id'=>24,'respuesta'=>'Madre predispuesta, padre no está de acuerdo.'),
            ));      
    }
}
