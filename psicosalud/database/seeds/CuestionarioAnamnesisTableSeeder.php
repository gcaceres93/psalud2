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
            array('pregunta'=>'Similares','aclaracion_pregunta'=>'','grupo'=>'ANTECEDENTES FAMILIARES','orden'=>1),
            array('pregunta'=>'Patológicos', 'aclaracion_pregunta'=>
                'enfermedades psiquiatricas, neurológicas, genéticas, etc','grupo'=>'ANTECEDENTES FAMILIARES','orden'=>2),
            array('pregunta'=>'Componentes familiares','aclaracion_pregunta'=>'','grupo'=>'ANTECEDENTES FAMILIARES','orden'=>3),
            array('pregunta'=>'Gestación',
                'aclaracion_pregunta'=>'embarazo controlado, dolores con contracciones, sangrado, fiebre, 
                infecciones: TORSCH, infección urinaria, aumento de más de 15 kg., 
                presión alta, diabetes gestacional, consumo de medicamentos, tabaco, alcohol, etc','grupo'=>'DESARROLLO','orden'=>4),
            array('pregunta'=>'Nacimiento',
                'aclaracion_pregunta'=>'sufrimiento fetal: taquicardia, bradicardia, cianosis, hipoactividad; 
                expulsivo prolongado: distocia de dilatación ,	distocia de cordón umbilical , incompatibilidad cefalopélvica, 
                alteraciones placentarias: pp, dpp, rpm; distocia de presentación, instrumentación, cesárea, traumatismo obstétrico,
                 embarazo prolongado: mayor de 42 semanas, prematurez','grupo'=>'DESARROLLO','orden'=>5),
            array('pregunta'=>'Neonatales',
                'aclaracion_pregunta'=>'inmadurez, peso, incompatibilidad sanguínea: rh, grupo o sub-grupo; infecciones neonatales, 
                desórdenes metabólicos: desequilibrio hidroelectrolítico, neurometabólicos; o endocrinopatías primarias: hiperglicemia,
                 hipoglicemia, hipotiroidismo, hipoparatiroidismo) sueño, llanto, alimentación(succión, deglución, vomitos'
                ,'grupo'=>'DESARROLLO','orden'=>6),
            array('pregunta'=>'Patológicos',
                'aclaracion_pregunta'=>'accidentes con compromiso craneoencefálico, cirugías, hospitalizaciones, convulsiones, enfermedades, 
            alergias, fobias, cefalea etc','grupo'=>'DESARROLLO','orden'=>7),
            array('pregunta'=>'C.C.','aclaracion_pregunta'=>'','grupo'=>'DESARROLLO MOTOR  Y DEL LENGUAJE:','orden'=>8),
            array('pregunta'=>'C.T.','aclaracion_pregunta'=>'','grupo'=>'DESARROLLO MOTOR  Y DEL LENGUAJE:','orden'=>9),
            array('pregunta'=>'G.T.','aclaracion_pregunta'=>'','grupo'=>'DESARROLLO MOTOR  Y DEL LENGUAJE:','orden'=>10),
            array('pregunta'=>'B.D.','aclaracion_pregunta'=>'','grupo'=>'DESARROLLO MOTOR  Y DEL LENGUAJE:','orden'=>11),
            array('pregunta'=>'Caminó','aclaracion_pregunta'=>'','grupo'=>'DESARROLLO MOTOR  Y DEL LENGUAJE:','orden'=>12),
            array('pregunta'=>'Habló primeras palabras','aclaracion_pregunta'=>'','grupo'=>'DESARROLLO MOTOR  Y DEL LENGUAJE:','orden'=>13),
            array('pregunta'=>'Habló claro','aclaracion_pregunta'=>'','grupo'=>'DESARROLLO MOTOR  Y DEL LENGUAJE:','orden'=>14),
            array('pregunta'=>'C.E.','aclaracion_pregunta'=>'','grupo'=>'DESARROLLO MOTOR  Y DEL LENGUAJE:','orden'=>15),
            array('pregunta'=>'Juegos','aclaracion_pregunta'=>'organizado, socializado, recreativo','grupo'=>'DESARROLLO MOTOR  Y DEL LENGUAJE:','orden'=>16),
            array('pregunta'=>'Historia Escolar','aclaracion_pregunta'=>'','grupo'=>'DESARROLLO MOTOR  Y DEL LENGUAJE:','orden'=>17),
            array('pregunta'=>'HISTORIA DE REHABILITACIÓN','aclaracion_pregunta'=>'','grupo'=>'DESARROLLO MOTOR  Y DEL LENGUAJE:','orden'=>18),
            array('pregunta'=>'Alimentación','aclaracion_pregunta'=>'apetito, come sólo, intolerancia algún alimento, sed, evacuación','grupo'=>'ASPECTOS GENERALES','orden'=>19),
            array('pregunta'=>'Sueño','aclaracion_pregunta'=>'horas de sueño, sueño tardío, interrumpido, despertar precoz, 
                    crisis de terror nocturno, pesadillas recurrentes, sonambulismo, somniloquio','grupo'=>'ASPECTOS GENERALES','orden'=>20),
            array('pregunta'=>'Actividad motriz','aclaracion_pregunta'=>'es inquieto o muy pasivo, torpeza motriz, 
                    dificultades en motricidad fina, lateralidad','grupo'=>'ASPECTOS GENERALES','orden'=>21),
            array('pregunta'=>'Actividad emocional','aclaracion_pregunta'=>'es inquieto o muy pasivo, torpeza motriz, 
                dificultades en motricidad fina, lateralidad','grupo'=>'ASPECTOS GENERALES','orden'=>22),
            array('pregunta'=>'Socialización','aclaracion_pregunta'=>'interacción con sus pares, niños mayores o menores, acepta normas,
             interacción con adultos, timidez, dificultades de adaptación, liderazgo etc','grupo'=>'ASPECTOS GENERALES','orden'=>23),
            array('pregunta'=>'ACTITUD DE LOS PADRES FRENTE A LA CONSULTA Y EXPECTATIVAS ANTE LA INTERVENCIÓN DEL PROFESIONAL','aclaracion_pregunta'=>'','grupo'=>' ','orden'=>24),
                       
        ));  
    }
}
