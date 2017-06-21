<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(usersTableSeeder::class);
        $this->call(postsTableSeeder::class);
        $this->call(categorySeeder::class);
//        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
    }
}
