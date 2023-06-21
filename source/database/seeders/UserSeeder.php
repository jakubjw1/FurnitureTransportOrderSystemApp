<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        User::truncate();

        User::insert([

            // Admin acc
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'admin',
                'created_at' => now(),
                'first_name' => 'Admin',
                'last_name' => ' ',
                'company_name' => ' ',
                'tax_id' => 00000000000,
            ],
            // Users
            [
                'name' => 'jakubw11',
                'email' => 'jakubw11@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'user',
                'created_at' => now(),
                'first_name' => 'Jakub',
                'last_name' => 'Wojtowicz',
                'company_name' => 'Company1',
                'tax_id' => 1234567890,
            ],
            [
                'name' => 'pawel007',
                'email' => 'pawel007@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'user',
                'created_at' => now(),
                'first_name' => 'Pawel',
                'last_name' => 'Pawlik',
                'company_name' => 'Company2',
                'tax_id' => 1321567890,
            ],
            [
                'name' => 'dawid00',
                'email' => 'dawid00@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'user',
                'created_at' => now(),
                'first_name' => 'Dawid',
                'last_name' => 'Dawidowicz',
                'company_name' => 'Company1',
                'tax_id' => 1134567890,
            ],
            [
                'name' => 'moni123',
                'email' => 'moni123@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'user',
                'created_at' => now(),
                'first_name' => 'Monika',
                'last_name' => 'Nowak',
                'company_name' => 'Company1',
                'tax_id' => 1234567800,
            ],
            [
                'name' => 'arturoo1',
                'email' => 'arturoo1@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'user',
                'created_at' => now(),
                'first_name' => 'Artur',
                'last_name' => 'Kowalski',
                'company_name' => ' ',
                'tax_id' => 1224567890,
            ],

        ]);

        Schema::enableForeignKeyConstraints();
    }
}
