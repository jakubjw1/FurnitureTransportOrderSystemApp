<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Service;
use Carbon\Carbon;

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
                'description' => 'Our company offers professional furniture transportation services within the city. Whether you are planning a move to a new apartment, have purchased new furniture for your home, or need to relocate furniture within a room, we can assist you. Our experienced team will ensure the safe and efficient transfer of your furniture within the city, taking care to protect and secure them during transportation.',
                'price' => 50.00,
                'image' => '/images/truck_service.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Furniture transport(province)',
                'description' => 'Need to transport furniture across the province? Our furniture transportation services within the province are perfect for you. Whether you are planning a move to another city within the province or need to deliver furniture to your vacation home, our experienced carriers will provide fast and reliable furniture transport. You can rest assured that your furniture will be properly secured and arrive at its destination intact.',
                'price' => 150.00,
                'image' => '/images/truck_service.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Furniture transport(country)',
                'description' => 'If you are planning a larger-scale move, you require professional furniture transportation services across the country. Whether you are relocating to another city or region, our company offers comprehensive transport solutions. Our specialized fleet of vehicles and experienced crew will ensure the safe and efficient transfer of your furniture over long distances. We can take care of all stages of the process, allowing you to focus on other important aspects of your move.',
                'price' => 250.00,
                'image' => '/images/truck_service.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Disassembly + assembly',
                'description' => 'Whether you are moving to a new home, rearranging your living space, or updating your apartments decor, our furniture disassembly and assembly service is at your disposal. Our experienced teams are equipped with the tools and skills to quickly and precisely disassemble and assemble your furniture. You wont have to worry about complicated assembly instructions or missing parts. Trust us to provide you with convenience and time-saving solutions when moving or updating your furniture.',
                'price' => 50.00,
                'image' => '/images/assembly.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
