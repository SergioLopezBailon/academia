<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AlumnoSeeder::class);
        $this->call(ModuloSeeder::class);
        $this->call(AlumnoModuloSeeder::class);
        }
}
