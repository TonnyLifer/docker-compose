<?php

namespace Database\Seeders;

use App\Models\News;
use Carbon\Carbon;
use Faker\Factory;
use GuzzleHttp\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Factory::create('ru_RU');

        for($i = 0; $i < 100; $i++){
            News::create([
                'name' => fake()->firstName(),
                'nickname' => fake()->name(),
                'short_description' => fake()->sentence(),
                'description' => fake()->text(),
                'date' => fake()->dateTimeBetween(now()->subYear(), now()),
            ]);
        }
    }
}
