<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            //add setup seeder
            TagSeeder::class,
            MaterialSeeder::class,
            //sample projects (contributions)
        ]);
    }
}
