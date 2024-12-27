<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\CategoryFactory;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CategoryFactory::factory(10)->create();
        ProductFactory::factory(10)->create();

       $this->call([
////           UserSeeder::class,
//           CategorySeeder::class,
//           ProductSeeder::class,
       ]);
    }
}
