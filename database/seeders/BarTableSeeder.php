<?php

namespace Database\Seeders;

use App\Models\BarTable;
use Illuminate\Database\Seeder;

class BarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $places = [
            ['name' => 'table 1'],
            ['name' => 'table 2'],
            ['name' => 'table 3'],
            ['name' => 'table 4'],
            ['name' => 'table 5']
        ];

        foreach ($places as $place){
            BarTable::create(array(
                'name' => $place['name'],
            ));
        }
    }
}
