<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array('name'=>'Gabriel','email'=>'gcacerescabriza@gmail.com','password'=>bcrypt('12345')),
            array('name'=>'Leo','email'=>'leo@gmail.com','password'=>bcrypt('12345')),
            array('name'=>'Lucas','email'=>'lucas@gmail.com','password'=>bcrypt('12345')),
            array('name'=>'Demo','email'=>'demo@gmail.com','password'=>bcrypt('12345')),      
        ));     
    }
}
