<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = DB::table('product_categories')->pluck('id', 'name');

        DB::table('products')->insert([
            [
                'name' => 'Smartphone',
                'description' => 'A high-quality smartphone.',
                'price' => 699.99,
                'image' => 'smartphone.jpeg',
                'category_id' => $categories['Electronics'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'T-shirt',
                'description' => 'Comfortable cotton t-shirt.',
                'price' => 19.99,
                'image' => 't-shirt.jpg',
                'category_id' => $categories['Fashion'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
