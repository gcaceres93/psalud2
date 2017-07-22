<?php

use Illuminate\Database\Seeder;

class PersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('persona')->insert(array(
            array('nombre'=>'Gabriel','email'=>'gcacerescabriza@gmail.com','apellido'=>'Caceres','direccion' => 'San Marcos 1582 c/paz del chaco',
            'telefono'=>'0961949421','cedula'=>'4480040','nacimiento'=>'12/18/1993'),
            array('nombre'=>'Lucas','email'=>'lucas@gmail.com','apellido'=>'Candia','direccion' => 'EEUU 1341 entre primera y segunda proyectada',
                'telefono'=>'0991331431','cedula'=>'4000130','nacimiento'=>'12/12/1993'),
            array('nombre'=>'Leo','email'=>'leo@gmail.com','apellido'=>'Aguero','direccion' => 'Eusebio Ayala 1331 c/ Bruno Guggiari',
                'telefono'=>'0982331313','cedula'=>'4231331','nacimiento'=>'05/18/1993'),
            array('nombre'=>'Cecilia','email'=>'cece_cv@gmail.com','apellido'=>'Candia','direccion' => 'Mcal. Lopez 331 c/Nanawa',
                'telefono'=>'0961455826','cedula'=>'3850113','nacimiento'=>'11/06/1992'),
            array('nombre'=>'Mario','email'=>'mariocaceres49@hotmail.com','apellido'=>'Caceres','direccion' => 'San Marcos 1582 c/paz del chaco',
                'telefono'=>'0982504874','cedula'=>'347626','nacimiento'=>'09/12/1949'),
            array('nombre'=>'Nery','email'=>'nerycandia@gmail.com','apellido'=>'Candia','direccion' => 'San Pedro Gonzalez 443 c/ de las cuartas',
                'telefono'=>'0981441313','cedula'=>'1500131','nacimiento'=>'04/18/1965'),
            array('nombre'=>'Diana','email'=>'dmlcabriza@gmail.com','apellido'=>'Cabriza','direccion' => 'San Marcos 1582 c/paz del chaco',
                'telefono'=>'0983442008','cedula'=>'2550131','nacimiento'=>'08/24/1962'),
            array('nombre'=>'Marcelo','email'=>'maalca@gmail.com','apellido'=>'Alborno','direccion' => 'San Marcos 1582 c/paz del chaco',
                'telefono'=>'0991797191','cedula'=>'3150341','nacimiento'=>'12/31/1983'),
            array('nombre'=>'Pedro','email'=>'pedro@gmail.com','apellido'=>'Gonzalez','direccion' => 'San Baltazar 155 c/paz del chaco',
                    'telefono'=>'0981949421','cedula'=>'4480045','nacimiento'=>'12/18/1992'),
            array('nombre'=>'Fabricio','email'=>'todkun@gmail.com','apellido'=>'Mendoza','direccion' => 'Nanemeza 112 c/paz del chaco',
                     'telefono'=>'0982703204','cedula'=>'4254214','nacimiento'=>'04/18/1993'),
            array('nombre'=>'Sebastian','email'=>'pedrosebastian@gmail.com','apellido'=>'Vidal','direccion' => 'San Baltazar 1553 c/fasto',
                'telefono'=>'098311313','cedula'=>'4483131','nacimiento'=>'12/01/1992'),
            array('nombre'=>'Raul','email'=>'raul@gmail.com','apellido'=>'Chavez','direccion' => 'San Pedro 190 c/ Las palmas',
                'telefono'=>'0981331341','cedula'=>'4254214','nacimiento'=>'04/18/1993'),
            array('nombre'=>'Eliana','email'=>'eli@gmail.com','apellido'=>'Prado','direccion' => 'San Miguel 155 c/paz del chaco',
                'telefono'=>'0961771313','cedula'=>'448031','nacimiento'=>'04/18/1992'),
            array('nombre'=>'Romina','email'=>'yumiaqu@gmail.com','apellido'=>'Aquino','direccion' => 'Mantalas 112 c/paz del berlin',
                'telefono'=>'098273134','cedula'=>'333131','nacimiento'=>'04/18/1990'),
            array('nombre'=>'Raquel','email'=>'rvitale@gmail.com','apellido'=>'Vitale','direccion' => 'Mcal Lopez 444 c/Nanawa',
                'telefono'=>'098133131','cedula'=>'1511000','nacimiento'=>'08/13/1962'),
            array('nombre'=>'Marco','email'=>'marco.apone@gmail.com','apellido'=>'Aponte','direccion' => 'Herrera 112 c/ berlin',
                'telefono'=>'0982131441','cedula'=>'3800000','nacimiento'=>'04/18/1991'),
            array('nombre'=>'Jorge','email'=>'jperis@gmail.com','apellido'=>'Peris','direccion' => 'Cacique lambare 331 c/ Molas Lopez',
                'telefono'=>'098451313','cedula'=>'4500131','nacimiento'=>'03/13/1993'),
            array('nombre'=>'Guillermo','email'=>'guillecandia05@gmail.com','apellido'=>'Candia','direccion' => 'Mcal Lopez 1331 c/ nanawa',
                'telefono'=>'0981445331','cedula'=>'4800000','nacimiento'=>'05/20/1995'),
            array('nombre'=>'Alvaro','email'=>'aaponte@gmail.com','apellido'=>'Aponte','direccion' => 'Cacique lambare 331 c/ Molas Lopez',
                'telefono'=>'098451411','cedula'=>'5100545','nacimiento'=>'05/20/1997'),
            array('nombre'=>'Genesis','email'=>'genesis.paredes@gmail.com','apellido'=>'Paredes','direccion' => 'Paz del chaco 1331 c/ San Marcos',
                'telefono'=>'0981332998','cedula'=>'4550322','nacimiento'=>'10/12/1994'),
            array('nombre'=>'Santiago','email'=>'santi.caceres@gmail.com','apellido'=>'Caceres','direccion' => 'San marcos 1582 c/ paz del chaco',
                'telefono'=>'0961949421','cedula'=>'5544323','nacimiento'=>'05/22/2015'),
            array('nombre'=>'Guillermo','email'=>'ancelma@gmail.com','apellido'=>'Aponte','direccion' => 'Herrera 112 c/ berlin',
                'telefono'=>'0982131441','cedula'=>'3800000','nacimiento'=>'04/18/1991'),
            array('nombre'=>'Ancelma','email'=>'ancelma.servi@gmail.com','apellido'=>'Servin','direccion' => 'Ita Enramada 331 c/ Pedro Guggiari',
                'telefono'=>'0991331441','cedula'=>'245877','nacimiento'=>'10/20/1940'),
            array('nombre'=>'Aracelly','email'=>'aracabriza13@gmail.com','apellido'=>'Cabriza','direccion' => 'Ita Enramada 331 c/ Pedro Guggiari',
                'telefono'=>'0991444313','cedula'=>'2550554','nacimiento'=>'10/30/1964'),
            array('nombre'=>'Marco','email'=>'marcoaponte64@gmail.com','apellido'=>'Aponte','direccion' => 'Ita Enramada 331 c/ Pedro Guggiari',
                'telefono'=>'0985587512','cedula'=>'2420554','nacimiento'=>'08/30/1964'),
            
      ));  
        
        DB::table('empleado')->insert(array(
            array('es_medico'=> true,'disponibilidad_hasta'=>'17:30:00','disponibilidad_desde'=>'08:00:00','codigo' => 'ES-01',
                'persona_id'=>1,'cargo_id'=>1),
            array('es_medico'=> true,'disponibilidad_hasta'=>'17:30:00','disponibilidad_desde'=>'08:00:00','codigo' => 'ES-02',
                'persona_id'=>2,'cargo_id'=>2),
            array('es_medico'=> true,'disponibilidad_hasta'=>'17:30:00','disponibilidad_desde'=>'08:00:00','codigo' => 'ES-03',
                'persona_id'=>3,'cargo_id'=>1),
            array('es_medico'=> true,'disponibilidad_hasta'=>'17:30:00','disponibilidad_desde'=>'08:00:00','codigo' => 'ES-04',
                'persona_id'=>4,'cargo_id'=>3),
            array('es_medico'=> true,'disponibilidad_hasta'=>'17:30:00','disponibilidad_desde'=>'08:00:00','codigo' => 'ES-05',
                'persona_id'=>5,'cargo_id'=>4),
            array('es_medico'=> true,'disponibilidad_hasta'=>'17:30:00','disponibilidad_desde'=>'08:00:00','codigo' => 'ES-06',
                'persona_id'=>6,'cargo_id'=>2),
            array('es_medico'=> true,'disponibilidad_hasta'=>'17:30:00','disponibilidad_desde'=>'08:00:00','codigo' => 'ES-07',
                'persona_id'=>7,'cargo_id'=>3),
            array('es_medico'=> false,'disponibilidad_hasta'=>'17:30:00','disponibilidad_desde'=>'08:00:00','codigo' => 'ES-08',
                'persona_id'=>8,'cargo_id'=>5),
            array('es_medico'=> false,'disponibilidad_hasta'=>'17:30:00','disponibilidad_desde'=>'08:00:00','codigo' => 'ES-09',
                'persona_id'=>9,'cargo_id'=>6),
           
        ));  
        DB::table('paciente')->insert(array(
            array('ruc'=> '347626-1','razon_social'=>'Las palomas','persona_id'=>10),
            array('ruc'=> '444880-1','razon_social'=>'Las chacras','persona_id'=>11),
            array('ruc'=> '555441-1','razon_social'=>'Las palomas','persona_id'=>12),
            array('ruc'=> '80012231-1','razon_social'=>'BDO','persona_id'=>13),
            array('ruc'=> '80012246-1','razon_social'=>'Casa Plomo','persona_id'=>14),
            array('ruc'=> '80011313-1','razon_social'=>'Casa rica','persona_id'=>15),
            array('ruc'=> '80013131-2','razon_social'=>'Todo Hierro','persona_id'=>16),
            array('ruc'=> '552441-1','razon_social'=>'','persona_id'=>17),
            array('ruc'=> '80013343-5','razon_social'=>'Guille Candia SA','persona_id'=>17),
            array('ruc'=> '4484484-1','razon_social'=>'Alvaro Aponte Servicios Personales','persona_id'=>18),   
        )); 
    }
}
