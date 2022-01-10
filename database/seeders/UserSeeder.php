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
        DB::table('users')->insert([
            'firstname' => 'Gabriel',
            'lastname' => 'Fasano',
            'email' => 'gabriel.fasano@he-arc.ch',
            'password' => Hash::make('Abc123456'),
            'email_verified_at' => today(),
            'is_admin' => true
        ]);

        DB::table('users')->insert([
            'firstname' => 'Milan',
            'lastname' => 'Cervino',
            'email' => 'milan.cervino@he-arc.ch',
            'password' => Hash::make('Abc123456'),
            'email_verified_at' => today(),
            'is_admin' => true
        ]);

        DB::table('users')->insert([
            'firstname' => 'William',
            'lastname' => 'Bikuta',
            'email' => 'william.bikuta@he-arc.ch',
            'password' => Hash::make('Abc123456'),
            'email_verified_at' => today(),
            'is_admin' => true
        ]);

        DB::table('users')->insert([
            'firstname' => 'David',
            'lastname' => 'Grunenwald',
            'email' => 'david.grunenwald@he-arc.ch',
            'password' => Hash::make('Abc123456'),
            'email_verified_at' => today(),
            'is_admin' => true
        ]);

        DB::table('users')->insert([
            'firstname' => 'Alexander',
            'lastname' => 'Wohlfahrt',
            'email' => 'alxander.wohlfahrt@he-arc.ch',
            'password' => Hash::make('Abc123456'),
            'email_verified_at' => today(),
            'is_admin' => true
        ]);

        DB::table('users')->insert([
            'firstname' => 'Luca',
            'lastname' => 'Laissue',
            'email' => 'luca.laissue@he-arc.ch',
            'password' => Hash::make('Abc123456'),
            'email_verified_at' => today(),
            'is_admin' => true
        ]);
    }
}
