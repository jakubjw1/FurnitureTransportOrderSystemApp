<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Driver;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Driver::truncate();

        Driver::insert([
            [
                'first_name' => 'Adam',
                'last_name' => 'Kowalski',
            ],
            [
                'first_name' => 'Adrian',
                'last_name' => 'Nowak',
            ],
            [
                'first_name' => 'Marcin',
                'last_name' => 'Kowalski',
            ],
            [
                'first_name' => 'Filip',
                'last_name' => 'Szwacz',
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
