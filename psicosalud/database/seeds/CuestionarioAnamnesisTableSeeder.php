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
            array('pregunta'=>'Similares','aclaracion_pregunta'=>''),
            array('pregunta'=>'Patológicos', 'aclaracion_pregunta'=>
                'enfermedades psiquiatricas, neurológicas, genéticas, etc'),
            array('pregunta'=>'Componentes familiares','aclaracion_pregunta'=>''),
            array('pregunta'=>'Desarrollo gestacional',
                'aclaracion_pregunta'=>'embarazo controlado, dolores con contracciones, sangrado, fiebre, 
                infecciones: TORSCH, infección urinaria, aumento de más de 15 kg., 
                presión alta, diabetes gestacional, consumo de medicamentos, tabaco, alcohol, etc'),
            array('pregunta'=>'Nacimiento',
                'aclaracion_pregunta'=>'sufrimiento fetal: taquicardia, bradicardia, cianosis, hipoactividad; 
                expulsivo prolongado: distocia de dilatación ,	distocia de cordón umbilical , incompatibilidad cefalopélvica, 
                alteraciones placentarias: pp, dpp, rpm; distocia de presentación, instrumentación, cesárea, traumatismo obstétrico,
                 embarazo prolongado: mayor de 42 semanas, prematurez'),
            array('pregunta'=>'Neonatales',
                'aclaracion_pregunta'=>'inmadurez, peso, incompatibilidad sanguínea: rh, grupo o sub-grupo; infecciones neonatales, 
                desórdenes metabólicos: desequilibrio hidroelectrolítico, neurometabólicos; o endocrinopatías primarias: hiperglicemia,
                 hipoglicemia, hipotiroidismo, hipoparatiroidismo) sueño, llanto, alimentación(succión, deglución, vomitos'),
            array('pregunta'=>'Patológicos',
                'aclaracion_pregunta'=>'accidentes con compromiso craneoencefálico, cirugías, hospitalizaciones, convulsiones, enfermedades, 
            alergias, fobias, cefalea etc'),
            array('pregunta'=>'C.C.','aclaracion_pregunta'=>''),
            array('pregunta'=>'C.T.','aclaracion_pregunta'=>''),
            array('pregunta'=>'G.T.','aclaracion_pregunta'=>''),
            array('pregunta'=>'B.D.','aclaracion_pregunta'=>''),
            array('pregunta'=>'Caminó','aclaracion_pregunta'=>''),
            array('pregunta'=>'Habló primeras palabras','aclaracion_pregunta'=>''),
            array('pregunta'=>'Habló claro','aclaracion_pregunta'=>''),
            array('pregunta'=>'C.E.','aclaracion_pregunta'=>''),
            array('pregunta'=>'Juegos','aclaracion_pregunta'=>'organizado, socializado, recreativo'),
            array('pregunta'=>'Historia Escolar','aclaracion_pregunta'=>''),
            array('pregunta'=>'HISTORIA DE REHABILITACIÓN','aclaracion_pregunta'=>''),
            array('pregunta'=>'Alimentación','aclaracion_pregunta'=>'apetito, come sólo, intolerancia algún alimento, sed, evacuación'),
            array('pregunta'=>'Sueño','aclaracion_pregunta'=>'horas de sueño, sueño tardío, interrumpido, despertar precoz, 
                    crisis de terror nocturno, pesadillas recurrentes, sonambulismo, somniloquio'),
            array('pregunta'=>'Actividad motriz','aclaracion_pregunta'=>'es inquieto o muy pasivo, torpeza motriz, 
                    dificultades en motricidad fina, lateralidad'),
            array('pregunta'=>'Actividad emocional','aclaracion_pregunta'=>'es inquieto o muy pasivo, torpeza motriz, 
                dificultades en motricidad fina, lateralidad'),
            array('pregunta'=>'Socialización','aclaracion_pregunta'=>'interacción con sus pares, niños mayores o menores, acepta normas,
             interacción con adultos, timidez, dificultades de adaptación, liderazgo etc'),
            array('pregunta'=>'ACTITUD DE LOS PADRES FRENTE A LA CONSULTA Y EXPECTATIVAS ANTE LA INTERVENCIÓN DEL PROFESIONAL',''),
                       
        ));  
    }
}
