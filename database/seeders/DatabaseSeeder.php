<?php

namespace Database\Seeders;

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
        // CategorySeeder will Automatically seed all related models

        $this->call([

            UserSeeder::class,
            AdminSeeder::class,
            CategorySeeder::class,
            
        ]);
    }
}
