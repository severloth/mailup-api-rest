<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            Product::create([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'image' => $faker->imageUrl(),
                'brand' => $faker->word,
                'price' => $faker->randomFloat(2, 10, 100),
                'price_sale' => $faker->randomFloat(2, 5, 90),
                'category' => $faker->word,
                'stock' => $faker->numberBetween(0, 100),
            ]);
        }

    }
}
