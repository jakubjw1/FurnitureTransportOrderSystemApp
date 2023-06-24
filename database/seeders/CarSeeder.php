<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Car;
use Carbon\Carbon;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Car::truncate();

        Car::insert([
            [
                'brand' => 'Ford',
                'model' => 'Transit',
                'transport_capacity' => 1000,
                'height' => 200,
                'width' => 150,
                'length' => 300,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'brand' => 'Ford',
                'model' => 'Transit',
                'transport_capacity' => 1000,
                'height' => 200,
                'width' => 150,
                'length' => 300,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'brand' => 'Ford',
                'model' => 'Transit',
                'transport_capacity' => 1000,
                'height' => 200,
                'width' => 150,
                'length' => 300,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'brand' => 'Renault',
                'model' => 'Master',
                'transport_capacity' => 1500,
                'height' => 220,
                'width' => 155,
                'length' => 345,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);

        Schema::enableForeignKeyConstraints();
    }
}
