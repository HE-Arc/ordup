<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //
        DB::table('users')->insert([
            'name' => 'Gabriel',
            'email' => 'gabriel.fasano@he-arc.ch',
            'password' => Hash::make('Abc123456'),
            'email_verified_at' => today()
        ]);

        DB::table('users')->insert([
            'name' => 'Milan',
            'email' => 'milan.cervino@he-arc.ch',
            'password' => Hash::make('Abc123456'),
            'email_verified_at' => today()
        ]);

        DB::table('users')->insert([
            'name' => 'William',
            'email' => 'william.bikuta@he-arc.ch',
            'password' => Hash::make('Abc123456'),
            'email_verified_at' => today()
        ]);
    }
}
