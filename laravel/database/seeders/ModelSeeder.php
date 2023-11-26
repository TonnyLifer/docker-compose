<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use App\Models\ModelAuto;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++){
            $manufact = Manufacturer::create([
                'name' => fake()->name(),
                'nickname' => fake()->firstName(),
                'description' => fake()->sentence()
            ]);

            for($j = 0; $j < 10; $j++){
                $model_auto = ModelAuto::create([
                    'name' => fake()->name(),
                    'nickname' => fake()->lastName(),
                    'description' => fake()->sentence()
                ]);

                for($h = 0; $h < 5; $h++){
                    Product::create([
                        'name' => fake()->name(),
                        'nickname' => fake()->postcode(),
                        'manufacturer_id' => $manufact->id,
                        'model_id' => $model_auto->id,
                        'diameter' => rand(1, 150),
                        'height' => rand(1, 150),
                        'width' => rand(1, 150)
                    ]);
                }
            }
        }
    }
}
