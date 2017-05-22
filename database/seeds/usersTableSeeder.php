<?php

use Illuminate\Database\Seeder;
use Faker\Factory;


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

       $faker = Factory::create();

       DB::table('users')->insert([

           [
               'name' => 'John Doe',
               'slug' => 'John-Doe',
               'email' => 'john@gmail.com',
               'password' => bcrypt('secret'),
               'bio' => $faker->text(rand(250, 300))
           ],

           [
               'name' => 'Jane Doe',
               'slug' => 'Jane-Doe',
               'email' => 'jane@gmail.com',
               'password' => bcrypt('secret'),
               'bio' => $faker->text(rand(250, 300))
            ],

           [
               'name' => 'Mark Dee',
               'slug' => 'Mark-Dee',
               'email' => 'mark@gmail.com',
               'password' => bcrypt('secret'),
               'bio' => $faker->text(rand(250, 300))
           ]

       ]);
    }
}
