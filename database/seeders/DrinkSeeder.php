<?php

namespace Database\Seeders;

use App\Models\Drink;
use Illuminate\Database\Seeder;

class DrinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $drinks = [
            ['name' => 'Coca-Cola', 'price' => 3.5],
            ['name' => 'Fanta orange', 'price' => 3.5],
            ['name' => 'San Pellegrino', 'price' => 4.5],
            ['name' => 'Heineken', 'price' => 4.0]
        ];

        foreach ($drinks as $drink){
            Drink::create(array(
                'name' => $drink['name'],
                'price' => $drink['price']
            ));
        }
    }
}
