<?php

use Illuminate\Database\Seeder;

class OcupacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ocupacion')->insert(array(
            array('nombre'=>'Herrero','descripcion'=>'Persona que tiene por oficio trabajar el hierro. Tradicionalmente, las manufacturas de los herreros son elementos de hierro forjado, rejas, para muebles, esculturas, herramientas, artículos decorativos y religiosos, campanas, utensilios de cocina y armas.'),
            array('nombre'=>'Electricista','descripcion'=>'profesional que realiza instalaciones y reparaciones relacionadas con la electricidad, especialmente en máquinas e iluminación (no debe confundirse con liniero, en algunos países también técnico electricista).'),
            array('nombre'=>'Analista de sistemas','descripcion'=>' profesional especializado del área de la informática, encargado del desarrollo de aplicaciones en lo que respecta a su diseño y obtención de los algoritmos, así como de analizar las posibles utilidades y modificaciones necesarias. '),
            array('nombre'=>'Psicólogo','descripcion'=>'Se trata de un especialista de la salud mental que, por esa razón, está interesado en estudiar y entender el comportamiento (o la conducta, según el punto de vista de otras terminologías).'),
            array('nombre'=>'Profesor','descripcion'=>'Es quien se dedica profesionalmente a la enseñanza, bien con carácter general, bien especializado en una determinada área de conocimiento, asignatura, disciplina académica, ciencia o arte. '),
            array('nombre'=>'Enfermero','descripcion'=>'El profesional de enfermería es tanto de nivel técnico (enfermero auxiliar, enfermero técnico superior) como de nivel universitario (enfermero diplomado, licenciado o graduado)..'),
            array('nombre'=>'Albañil','descripcion'=>'Persona con conocimientos profesionales y de experiencia que se dedica como oficio a la construcción, reforma, renovación y reparación de edificaciones, tanto viviendas como industriales.'),
            array('nombre'=>'Cerrajero','descripcion'=>'Persona dedicada a la reparación y mantenimiento de cerraduras, candados, cerrojos y cilindros, tanto de puertas comunes como así también de vehículos.'),
            array('nombre'=>'Carpintero','descripcion'=>'Su objetivo es cambiar la forma física de la materia prima para crear objetos útiles al desarrollo humano, como pueden ser muebles para el hogar, marcos para puertas, molduras, juguetes, escritorios, librerías y otros.'),
        ));  
    }
}
