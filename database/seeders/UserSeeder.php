<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

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
                'first_name' => 'Admin',
                'last_name' => ' ',
                'company_name' => ' ',
                'tax_id' => 00000000000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Users
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'user',
                'first_name' => 'User',
                'last_name' => 'User',
                'company_name' => 'Company1',
                'tax_id' => 1234567890,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'pawel007',
                'email' => 'pawel007@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'user',
                'first_name' => 'Pawel',
                'last_name' => 'Pawlik',
                'company_name' => 'Company2',
                'tax_id' => 1321567890,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'dawid00',
                'email' => 'dawid00@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'user',
                'first_name' => 'Dawid',
                'last_name' => 'Dawidowicz',
                'company_name' => 'Company1',
                'tax_id' => 1134567890,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'moni123',
                'email' => 'moni123@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'user',
                'first_name' => 'Monika',
                'last_name' => 'Nowak',
                'company_name' => 'Company1',
                'tax_id' => 1234567800,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'arturoo1',
                'email' => 'arturoo1@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'user',
                'first_name' => 'Artur',
                'last_name' => 'Kowalski',
                'company_name' => ' ',
                'tax_id' => 1224567890,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);

        Schema::enableForeignKeyConstraints();
    }
}
