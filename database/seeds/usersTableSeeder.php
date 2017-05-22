<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::statement('SET FOREIGN_KEY_CHECKS=0');
       DB::table('users')->truncate();

       DB::table('users')->insert([

           [
               'name' => 'John Doe',
               'slug' => 'John-Doe',
               'email' => 'john@gmail.com',
               'password' => bcrypt('secret')
           ],

           [
               'name' => 'Jane Doe',
               'slug' => 'Jane-Doe',
               'email' => 'jane@gmail.com',
               'password' => bcrypt('secret')
            ],

           [
               'name' => 'Mark Dee',
               'slug' => 'Mark-Dee',
               'email' => 'mark@gmail.com',
               'password' => bcrypt('secret')
           ]

       ]);
    }
}
