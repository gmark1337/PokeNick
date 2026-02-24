<?php

namespace Database\Seeders;

use App\Models\Nickname;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Oscar Lowe',
                'email' => 'oscar.lowe@example.com',
                'nicknames' => ['Pikachu', 'Ditto']
            ],
            [
                'name' => 'Daisy Day',
                'email' => 'daisy.day@example.com',
                'nicknames' => ['Iron Moth']
            ],
            [
                'name' => 'Armando Shelton',
                'email' => 'armando.shelton@example.com',
                'nicknames' => ['Trapinch', 'Seaking','Whirlipede']
            ],
        ];
        foreach($users as $user){
            $us = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt('password')
            ]);

            foreach($user['nicknames'] as $nickname){
                Nickname::create([
                    'user_id' => $us->id,
                    'name' => $nickname
                ]);
            }
        }
    }
}
