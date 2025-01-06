<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            [
                'name' => 'Eye Art',
                'email' => 'admin@eyeart.design',
                'password' => Hash::make('eyeart')
            ],
            [
                'name' => 'Creative Tech Park',
                'email' => 'admin@creativetechpark.com',
                'password' => Hash::make('ctp')
            ]
        ]);
    }
}
