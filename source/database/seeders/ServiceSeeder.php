<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Service::truncate();

        Service::insert([
            [
                'name' => 'Furniture Transport(city)',
                'description' => 'Furniture transport within the city.',
                'price' => 50.00,
                'image' => 'images/truck_service.png',
            ],
            [
                'name' => 'Furniture transport(province)',
                'description' => 'Furniture transport within the province.',
                'price' => 150.00,
                'image' => 'images/truck_service.png',
            ],
            [
                'name' => 'Furniture transport(country)',
                'description' => 'Furniture transport within the country.',
                'price' => 250.00,
                'image' => 'images/truck_service.png',
            ],
            [
                'name' => 'Disassembly + assembly',
                'description' => 'Disassembly and assembly of furniture.',
                'price' => 50.00,
                'image' => 'images/assembly.jpg',
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
